<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OTPVerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $otpCode;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($otpCode)
    {
        $this->otpCode=$otpCode;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
      return  $this->subject('Votre code otp')->view('emails.Api.optEmail');
    }


}
