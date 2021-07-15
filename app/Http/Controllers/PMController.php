<?php

namespace App\Http\Controllers;

use App\User;
use App\Blog;
use App\Content;
use App\Plan;
use App\Payment;
use App\History;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Hash;
use Auth;
use Str;

class PMController extends Controller
{
    public function root()
    {
        if (Session::get('lang')) {
            App::setLocale(Session::get('lang'));
        }
        return redirect(url('/home'));
    }

    public function headerform(Request $request)
    {
        $email = $request->email;
        $action = $request->action;

        $user = User::where('email', $email)->first();
        if (!$user) {
            //Save new user
            $newuser = new User();
            $newuser->email = $email;
            $newuser->password = "";
            $newuser->save();
        }

        $user = User::where('email', $email)->first();
        if ($user->email_verified) {
            Session::flash('action', $action);
            Session::flash('email', $email);
            return redirect(url('/login'));
        } else {
            $user->verify_link = Str::random(10);
            $user->verify_expiry_date = date("Y-m-d H:i:s", strtotime('+30 minutes'));
            $user->save();
            // Send Email Verification
            EmailController::sendVerificationEmail($user);
            PMController::saveHistory($user, 'mail', $request);

            Session::flash('needverify', 'message');
            Session::flash('email', $email);
            return redirect(route('home'));
        }
    }

    public function pageHome()
    {
        $public_blog = Blog::where('paid', 0)->orderby('id', 'DESC')->first();
        $introduction = Content::where('title', 'Introduction')->first()->content;
        $about = Content::where('title', 'About Putmining')->first()->content;

        return view('putmining.home', [
            'public_blog' => $public_blog,
            'introduction' => $introduction,
            'about' => $about,
        ]);
    }

    public function pageContact()
    {
        return view('putmining.contact');
    }
    public function pageProfile()
    {
        return view('putmining.profile');
    }
    public function pageHowto()
    {
        if (!Auth::user()->paid)
            return redirect(url('/home'));
        $pagetitle = 'How To';
        $content = Content::where('title', 'How To')->first()->content;
        return view('putmining.static', ['content' => $content, 'pagetitle' => $pagetitle]);
    }

    public function pageActiveplays()
    {
        if (!Auth::user()->paid)
            return redirect(url('/home'));
        $pagetitle = 'Active Plays';
        $content = Content::where('title', 'Active Plays')->first()->content;
        return view('putmining.static', ['content' => $content, 'pagetitle' => $pagetitle]);
    }

    public function pageDisclaimer()
    {
        $pagetitle = 'Disclaimer';
        $content = Content::where('title', 'Disclaimer')->first()->content;
        return view('putmining.static', ['content' => $content, 'pagetitle' => $pagetitle]);
    }

    public function pagePublicBlog()
    {
        $paid = 0;
        $blogs = Blog::where('paid', $paid)->orderby('id', 'DESC')->get();
        return view('putmining.blog.list', ['paid' => $paid, 'blogs' => $blogs]);
    }

    public function pagePaidBlog()
    {
        if (Auth::user()->blocked)
            return redirect(url('/contact'));
        if (!Auth::user()->paid)
            return redirect(url('/home'));
        $paid = 1;
        $blogs = Blog::where('paid', $paid)->orderby('id', 'DESC')->get();
        return view('putmining.blog.list', ['paid' => $paid, 'blogs' => $blogs]);
    }

    public function pagePricing()
    {
        $plans = Plan::get();
        $paypal_clientID = Setting::where('key', 'Paypal Client ID')->first()->value;
        return view('putmining.pricing', ['plans' => $plans, 'paypal_clientID' => $paypal_clientID]);
    }

    public function paySubscription(Request $request)
    {
        $payment_id = $request->payment_id;

        $plan = Plan::find($request->plan_id);
        $start_date =  Auth::user()->expiry_date ?? date('Y-m-d');
        $expiry_date = date('Y-m-d', strtotime($start_date .  $plan->plus));

        $obj = new Payment();
        $obj->user_id = Auth::user()->id;
        $obj->payment_id = $payment_id;
        $obj->payment_date = date('Y-m-d');
        $obj->amount = $plan->price;
        $obj->subscriber = $plan->type;
        $obj->payment_method = 'paypal';
        $obj->start_date = $start_date;
        $obj->expiry_date = $expiry_date;
        $obj->save();

        Auth::user()->expiry_date = $expiry_date;
        Auth::user()->save();

        EmailController::sendPaymentEmail(Auth::user(), $plan, $payment_id);
        PMController::saveHistory(Auth::user(), 'pay', $request);

        return redirect(url('/profile'))->with('message', "Your expiry date is changed.");
    }

    public function pagePaymentHistory(Request $request)
    {
        $payments = Payment::where('user_id', Auth::user()->id)->get();
        return view('putmining.payment_history', ['payments' => $payments]);
    }

    public function settingPassword(Request $request)
    {
        $newpassword = $request->newpassword;
        $newpassword_confirm = $request->newpassword_confirm;

        if ($newpassword != $newpassword_confirm)
            return redirect(url('/profile'))->with('message', 'Please confirm new password exactly.');

        Auth::user()->password = Hash::make($newpassword);
        Auth::user()->save();

        PMController::saveHistory(Auth::user(), 'password', $request);

        return redirect(url('/profile'))->with('message', 'Password Changed Successfully.');
    }

    public function settingEmail(Request $request)
    {
        $newemail = $request->newemail;
        $newemail_confirm = $request->newemail_confirm;

        if ($newemail != $newemail_confirm)
            return redirect(url('/profile'))->with('message', 'The email addresses you entered do NOT match!');

        if (User::where('email', $newemail)->first())
            return redirect(url('/profile'))->with('message', 'That email already exsits!');

        PMController::saveHistory(Auth::user(), 'address', $request);
        Auth::user()->email = $newemail;
        Auth::user()->email_verified = false;
        Auth::user()->verify_link = Str::random(10);
        Auth::user()->verify_expiry_date = date("Y-m-d H:i:s", strtotime('+30 minutes'));
        Auth::user()->save();

        // Send Email Verification
        EmailController::sendVerificationEmail(Auth::user());

        Auth::logout();

        Session::flash('needverify', 'message');
        Session::flash('email', $newemail);
        return redirect(route('home'));
    }
    public function settingNotify(Request $request)
    {
        $new_notify_on_home = $request->notify_on_home ? 1 : 0;
        $new_notify_on_paid = $request->notify_on_paid ? 1 : 0;

        if (
            Auth::user()->notify_on_home == $new_notify_on_home
            && Auth::user()->notify_on_paid == $new_notify_on_paid
        )
            return redirect(url('/profile'));

        PMController::saveHistory(Auth::user(), 'notify', $request);
        Auth::user()->notify_on_home =  $new_notify_on_home;
        Auth::user()->notify_on_paid = $new_notify_on_paid;
        Auth::user()->save();

        return redirect(url('/profile'))->with('message', 'Notify Setting Changed Successfully.');
    }

    public function requestBIO(Request $request)
    {
        $bio = $request->bio;

        Auth::user()->bio = $bio;
        Auth::user()->save();

        //send Email Biorequest
        EmailController::sendBioRequestEmail(Auth::user());
        PMController::saveHistory(Auth::user(), 'bio', $request);

        return redirect(url('/profile'))->with('message', 'An email has been sent to confirm your FREE access as a BIO subscriber.  Please give us time to approve.');
    }

    public static function saveHistory($user, $action, $request)
    {
        $ip = $request->ip();
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        $country = $details->country ?? '';
        $city = $details->city ?? '';

        $obj = new History();
        $obj->user_id = $user->id;
        $obj->action = $action;
        $obj->ip = $ip;
        $obj->location = "$country $city";
        $obj->last_notify_on_home = $user->notify_on_home;
        $obj->last_notify_on_paid = $user->notify_on_paid;
        $obj->last_email = $user->email;
        $obj->last_password = $user->password;
        $obj->last_email_verification_date = $user->email_verified_date;

        $obj->save();
    }
}
