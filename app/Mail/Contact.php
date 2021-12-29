<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        dd($this->contactData['email']);
        return $this->markdown('emails.mailForm')
                ->to('info@gotskillshub.com')
                ->subject('Message from GOSH')
                ->from($this->contactData['email'])
                ->with([
                    'contactData' => $this->contactData
                ]);
    }
}
