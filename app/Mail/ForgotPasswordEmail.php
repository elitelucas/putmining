<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;
use App\Content;
use App\Setting;

class ForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(Setting::where('key', 'Forgotpassword Email Subject')->first()->value)
            ->markdown('putmining.mail.forgotpassword')
            ->with([
                'user' => $this->user,
                'mailcontent' =>  Content::where('title', 'Forgotpassword Email')->first()->content,
            ]);
    }
}
