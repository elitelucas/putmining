<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use App\Mail\ForgotPasswordEmail;
use App\Mail\ContactEmail;
use App\Mail\NewBlogEmail;
use App\Mail\PaymentEmail;
use App\Mail\BioRequestEmail;
use App\User;
use App\Setting;
use Mail, Auth, Str, Log, Exception, Session;


class EmailController extends Controller
{
    public static function sendBioRequestEmail($user)
    {
        $alert_admin_email = Setting::where('key', 'Alert Administrator Email')->first()->value;
        try {
            Mail::to($alert_admin_email)->queue(new BioRequestEmail($user));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public static function sendPaymentEmail($user, $plan, $payment_id)
    {
        $alert_admin_email = Setting::where('key', 'Alert Administrator Email')->first()->value;
        try {
            Mail::to($alert_admin_email)->queue(new PaymentEmail($user, $plan, $payment_id));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public static function sendNewBlogEmail($blog)
    {
        try {
            if ($blog->paid)
                foreach (User::where('notify_on_paid', 1)->get() as $user)
                    Mail::to($user->email)->queue(new NewBlogEmail($user, $blog));
            else
                foreach (User::where('notify_on_home', 1)->get() as $user)
                    Mail::to($user->email)->queue(new NewBlogEmail($user, $blog));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public static function sendVerificationEmail($user)
    {
        try {
            Mail::to($user->email)->queue(new VerificationEmail($user));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public static function sendForgotPasswordEmail(Request $request)
    {

        $email = $request->email;

        $user = User::where('email', $email)->first();
        if (!$user) return redirect(url('/password/reset'))->with('message', 'That is not registered Email.');

        $user->passwordreset_link = Str::random(10);
        $user->passwordreset_expiry_date = date("Y-m-d H:i:s", strtotime('+30 minutes'));
        $user->save();
        try {
            Mail::to($email)->queue(new ForgotPasswordEmail($user));
            PMController::saveHistory($user, 'reset', $request);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return redirect(url('/password/reset'))->with('message', 'An email has been sent. Please click the link given in the email to reset your password.');
    }

    public function verifyEmail($link)
    {
        $user = User::where('verify_link', $link)->first();
        if (!$user) {
            Session::flash('whaterror', 'You visited non-significant verification link. Please try again.');
            return view('putmining.error');
        }
        if ($user->verify_expiry_date > date('Y-m-d H:i:s')) {
            $user->email_verified_date = date('Y-m-d H:i:s');
            $user->email_verified = 1;
            $user->save();

            Auth::login($user);
            return redirect(route('home'));
        } else {
            Session::flash('whaterror', 'The link used has expired. Please try again.');
            return view('putmining.error');         
        }
    }
    public function passwordReset($link)
    {
        $user = User::where('passwordreset_link', $link)->first();
        if (!$user) {
            Session::flash('whaterror', 'You visited non-significant password reset link. Please try again.');
            return view('putmining.error');         
        }
        if ($user->passwordreset_expiry_date > date('Y-m-d H:i:s')) {
            Auth::login($user);
            return redirect(url('/profile'))->with('message', 'Please reset your password.');
        } else {
            Session::flash('whaterror', 'The link used has expired. Please try again.');
            return view('putmining.error');         
        }
    }

    public function contactAdmin(Request $request)
    {
        PMController::saveHistory(Auth::user(), 'contact', $request);
        $alert_admin_email = Setting::where('key', 'Alert Administrator Email')->first()->value;
        $email = $request->email;
        $content = $request->content;
        try {
            Mail::to($alert_admin_email)->queue(new ContactEmail($email, $content));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return redirect(url('/profile'))->with('message', 'An email has been sent. We will respond as soon as possible.');
    }
}
