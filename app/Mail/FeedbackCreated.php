<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $tickets;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tickets)
    {
        $this->tickets = $tickets;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        // return $this->view('view.name');
        return $this->view('email.ticketCreated')
                    ->subject('Maklum Balas Baharu (Respon Tidak Diperlukan)');
    }
}
