<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $loginuserbranch = auth()->user()->branch_id;
        $userId = auth()->user()->user_role_id;
        // dd($user->user_role_id);
        // $ticketTypeReq = request()->ticketTypeReq;
        // $ticketTypes = TicketType::get();
        if ($userId == 1) {
            $cadangan = Ticket::select('tickets.*')
            ->where('ticket_type_id', 4)
            ->count();
            $penghargaan = Ticket::select('tickets.*')
            ->where('ticket_type_id', 1)
            ->count();
            $pertanyaan = Ticket::select('tickets.*')
            ->where('ticket_type_id', 3)
            ->count();
        }else {
            $tickets = Ticket::select('tickets.*')
            ->where('status_id', '!=', 6)
            ->where('branch_id', $loginuserbranch)
            ->get();
        }
        
        // dd($cadangan);
        return view('dashboard.index', compact('cadangan', 'pertanyaan', 'penghargaan'));
    }


}
