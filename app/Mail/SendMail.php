<?php

namespace App\Mail;

use App\Models\Contact;
use App\Models\user;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_text;
    public $mail_title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_text, $mail_title)
    {
        $this->mail_text = $mail_text;
        $this->mail_title = $mail_title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from('fugafuga@gmail.com')
        //             ->view('emails.contact')
        //             ->subject($this->subject);
        $mail_title = Contact::where('title')->first();
        return $this->from('from_address@example.com')
                    ->view('emails.contact')
                    ->subject($this->mail_title);
    }
}
