<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailPurchase extends Mailable
{
    public $paymentInfo;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($paymentInfo)
    {
        //
        $this->paymentInfo=$paymentInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('sale@blogtest.com')
        ->view('email.purchase')->with([
            'paymentInfo'=>$this->paymentInfo
        ]);
    }
}
