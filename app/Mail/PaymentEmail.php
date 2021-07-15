<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $user, $plan, $payment_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $plan, $payment_id)
    {
        $this->user = $user;
        $this->plan = $plan;
        $this-> payment_id = $payment_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Payment')
            ->markdown('putmining.mail.payment')
            ->with([
                'user' =>  $this->user,
                'plan' =>  $this->plan,
                'payment_id' =>  $this-> payment_id,                
            ]);
    }
}
