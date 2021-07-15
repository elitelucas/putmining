<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Log;
use App\User;
use App\Content;
use App\Setting;

class NewBlogEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $user, $blog;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $blog)
    {
        $this->user = $user;
        $this->blog = $blog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info("New Blog Email to {$this->user->email}");

        if ($this->blog->paid) {
            $subject = Setting::where('key', 'PaidBlogUpdate Email Subject')->first()->value;
            $mailcontent = Content::where('title', 'PaidBlogUpdate Email')->first()->content;
        } else {
            $subject = Setting::where('key', 'PublicBlogUpdate Email Subject')->first()->value;
            $mailcontent = Content::where('title', 'PublicBlogUpdate Email')->first()->content;
        }

        return $this->subject($subject)
            ->markdown('putmining.mail.newblog')
            ->with([
                'user' => $this->user,
                'blog' => $this->blog,
                'mailcontent' =>  $mailcontent,
            ]);
    }
}
