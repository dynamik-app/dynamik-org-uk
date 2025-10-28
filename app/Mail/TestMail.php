<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hello@dynamik.org.uk', 'DYNAMIK Mail Test') // **CRITICAL: Use your registered sender email**
        ->subject('Ce zici ma SMTP Relay Test Successful')
            ->html('
                        <h1>Ce zici ma?</h1>
                        <p>This message confirms that your Laravel application is correctly communicating with the Google Workspace SMTP Relay service, indicating that the IP validation is working.</p>
                        <p>-- DYNAMIK - The Power to Connect</p>
                    ');
    }
}