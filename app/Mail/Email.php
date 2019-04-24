<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $subject;
    public $msg;

    public function __construct($data)
    {
        $this->subject = "contacto web ".$data['asunto']. " de Ransa Security"; 
        $this->msg = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->view('emails.notificacion', [
            'data' => $this->msg
        ]);
    }
}
