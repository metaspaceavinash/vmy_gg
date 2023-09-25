<?php

namespace App\Mail;

use App\Models\Utility;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QueryMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
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
        //print_r( $this->user );die;
        $user = $this->user;
        //return $this->markdown('email.query')->subject('New Query From - '.env('APP_NAME'))->with('user', $this->user);
        return $this->subject('New Query From - '.env('APP_NAME'))->view('email.query', compact('user')); // This should match your actual email template view
    }
}
