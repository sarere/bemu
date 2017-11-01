<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Announcement extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this -> subject($this->message['subject'])
                    ->markdown('emails.announcement')
                    ->with([
                        'greeting' => 'Hi '.$this->message['name'],
                        'message' => $this->message['content'],
                        'button' => $this->message['button'],
                        'url' => $this->message['url'],
                        'closing' => $this->message['closing']
                    ]);
    }
}
