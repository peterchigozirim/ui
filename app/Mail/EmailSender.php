<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailSender extends Mailable
{
    use Queueable, SerializesModels;

    // public $email;
    public $sub;
    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $sub, $msg)
    {
        // $this->email = $email;
        $this->sub = $sub;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->sub)->view('emails.email')->markdown('mail.email-sender', ['message' => $this->msg]);
    }
}
