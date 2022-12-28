<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class MailController extends Controller
{
    public function newTicket()
    {
        $tickets = [
            'name' => 'Mail from ItSolutionStuff.com',
            'email' => 'This is for testing email using smtp'
        ];
       
        \Mail::to('muhdhanis08@gmail.com')->send(new \App\Mail\FeedbackCreated($tickets));

    }
}
