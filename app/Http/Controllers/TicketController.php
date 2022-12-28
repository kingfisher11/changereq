<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Category;
use App\Models\Priority;
use App\Models\TicketCategory;
use App\Models\TicketType;
use App\Models\Sts;
use App\Models\User;
use App\Models\Response;
use Mail;
use \App\Mail\FeedbackCreated;
use \App\Mail\FeedbackNotify;

class TicketController extends Controller
{
    public function index(Request $request)
    {

        $loginuserbranch = auth()->user()->branch_id;
        $ticketTypeReq = request()->ticketTypeReq;
        $ticketTypes = TicketType::get();
        if ($loginuserbranch == 8) {
            $tickets = Ticket::select('tickets.*')
            ->when(request()->ticketTypeReq, function($query) {
                $query->where('ticket_type_id', request()->ticketTypeReq);
            })
            ->where('status_id', '!=', 6)
            ->orderBy('id', 'desc')
            ->get();
        }else {
            $tickets = Ticket::select('tickets.*')
            ->when(request()->ticketTypeReq, function($query) {
                $query->where('ticket_type_id', request()->ticketTypeReq);
            })
            ->where('status_id', '!=', 6)
            ->where('branch_id', $loginuserbranch)
            ->get();
        }
        
        return view('tickets.index', compact('tickets', 'ticketTypes', 'ticketTypeReq'));
    }

    public function resolved(Request $request)
    {
        // $branches = Branch::get();
        // $departments = Department::orderby('name', 'asc')->get();
        // $categories = Category::get();
        // $priorities = Priority::get();
        // $ticketCategories = TicketCategory::get();
        $loginuserbranch = auth()->user()->branch_id;
        // dd($loginuserbranch);
        $ticketTypeReq = request()->ticketTypeReq;
        // $statuses = Status::get();
        $ticketTypes = TicketType::get();
        if ($loginuserbranch == 8) {
            $tickets = Ticket::select('tickets.*')
            ->when(request()->ticketTypeReq, function($query) {
                $query->where('ticket_type_id', request()->ticketTypeReq);
            })
            ->where('status_id', 6)
            ->orderBy('id', 'desc')
            ->get();
        }else {
            $tickets = Ticket::select('tickets.*')
            ->when(request()->ticketTypeReq, function($query) {
                $query->where('ticket_type_id', request()->ticketTypeReq);
            })
            ->where('status_id', 6)
            ->where('branch_id', $loginuserbranch)
            ->get();
        }

        // dd($ticketTypeReq);
        
        return view('tickets.resolve', compact('tickets', 'ticketTypes', 'ticketTypeReq'));
    }

    // create ticket
    public function create()
    {
        //check if user login or not
        // $loginuser = auth()->user();
        // if ($loginuser == null){
        //     return redirect()->route('login');
        // }
        // $departments = Department::get();
        // $positions = Position::get();
        // $statuss = Status::get();
        // $roles = Role::get();
        // // $religions = Religion::get();
        // // $schools = School::get();
        // // $postcodes = Postcode::get();
        // $user_id = auth()->user()->id;
        // // $this->authorize('view', $user);
        // $user = User::find($user_id);
        // $this->authorize('view', $user);
        $branches = Branch::get();
        $departments = Department::orderby('name', 'asc')->get();
        $categories = Category::get();
        $priorities = Priority::get();
        $ticketCategories = TicketCategory::get();
        $ticketTypes = TicketType::get();
        $statuses = Sts::get();
        
        return view('tickets.create', compact('branches', 'departments', 'categories', 'priorities', 'ticketCategories', 'ticketTypes', 'statuses'));
    }

    public function store(Request $request)
    {
        try{

            $tickets = Ticket::create([

                'branch_id'=> $request->branch,
                'priority_id'=> $request->ticketPriority,    
                'name' => $request->name,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'category_id' => $request->category,
                'ticket_type_id' => $request->ticketType,
                'ticket_category_id' => $request->ticketCategory,
                'title' => $request->subject,
                'details' => $request->details,
                // 'department_id'=> $request->department,
                'ack' => $request->ack,
                'attachment' => $request->attachment,
                $trackingCode = substr(base64_encode(sha1(mt_rand())), 0, 10),
                'tracking'=> $trackingCode,
                'status_id' => 1
                ]);
            
            // \Mail::to('muhdhanis08@gmail.com')->send(new \App\Mail\FeedbackCreated($newTicket));
            }catch(\Exception $e){
                dd('Message: ' .$e->getMessage());
                return false;
            }

            return redirect()->route('tickets.index')->with([
                'success' => 'Ticket successfully added.'
            ]);
    }

    public function show(Ticket $ticket)
    {
        //check if user login or not
        $loginuser = auth()->user();
        if ($loginuser == null){
            return redirect()->route('login');
        }

        
        // $departments = Department::orderby('name', 'asc')->get();
        $tickets = Ticket::find($ticket->id);
        $responses = Response::select('responses.*')
            ->where('ticket_id', $tickets->id)
            ->get();
        // $userRoles = UserRole::get();
        
        // dd($responses);

        return view('tickets.show', compact('tickets', 'responses'));
    }

    public function assign(Ticket $ticket)
    {
        //check if user login or not
        $loginuser = auth()->user();
        if ($loginuser == null){
            return redirect()->route('login');
        }

        $users = User::get();
        // $departments = Department::orderby('name', 'asc')->get();
        $tickets = Ticket::find($ticket->id);
        // $userRoles = UserRole::get();
        
        // dd($loginuser);

        return view('tickets.assign', compact('tickets', 'users'));
    }

    public function updateTicket(Request $request)
    {
        try{

            // $ticket = Ticket::find($request->ticketId);
            // dd($ticket->id);
            $response = Response::create([
                'remarks'=> $request->remarks,
                'user_id'=> $request->user,    
                'ticket_id' => $request->ticketId,
                'assigner'=> auth()->user()->id,
                'currentSts' => 2
                ]);
            // dd($user);

            $ticket = Ticket::find($request->ticketId);
            $ticket->update([
                'status_id' => 2,
            ]);


            }catch(\Exception $e){
                dd('Message: ' .$e->getMessage());
                return false;
            }

            return redirect()->route('ticket.show', $ticket->id)->with([
                'success' => 'Ticket successfully assigned.'
            ]);

    }

    public function showResponse($response)
    {
        // $responses = Response::select('responses.*')
        //     ->where('ticket_id', $tickets->id)
        //     ->get();
        // $userRoles = UserRole::get();
        $responses = Response::find($response);
        // $tickets = Ticket::find($ticket->id);
        
        // dd($responses);

        return view('tickets.response', compact('responses'));
    }

    public function reply($response)
    {
        // $ticketId = $request->ticketId;
        $loginuser = auth()->user();
        $responses = Response::find($response);
        $statuses = Sts::select('statuses.*')
            ->where('id', 4)
            ->orWhere('id', 5)
            ->orWhere('id', 6)
            ->get();

        // dd($loginuser);

        return view('tickets.reply', compact('responses', 'statuses', 'loginuser'));

    }

    public function storeReply(Request $request)
    { $ticketId = $request->ticketId;
        // dd($ticketId);
        try{

            $response = Response::create([
                'remarks'=> $request->remarks,  
                'user_id' => $request->responder,
                'ticket_id' => $request->ticketId,
                'assigner'=> auth()->user()->id,
                'currentSts' => $request->sts,
                'reply_to' => $request->response
                ]);

            $ticket = Ticket::find($request->ticketId);
            $ticket->update([
                'status_id' => $request->sts,
            ]);

            // dd($user);
            }catch(\Exception $e){
                dd('Message: ' .$e->getMessage());
                return false;
            }

            return redirect()->route('ticket.show', $ticketId)->with([
                'success' => 'Ticket successfully update.'
            ]);

    }

    public function guestCreate()
    {
        $branches = Branch::get();
        $departments = Department::orderby('name', 'asc')->get();
        $categories = Category::get();
        $priorities = Priority::get();
        $ticketCategories = TicketCategory::get();
        $ticketTypes = TicketType::get();
        $statuses = Sts::get();
        
        return view('guest.create', compact('branches', 'departments', 'categories', 'priorities', 'ticketCategories', 'ticketTypes', 'statuses'));
        
    }

    public function guestStore(Request $request)
    {
        try{

            $tickets = Ticket::create([

                'branch_id'=> $request->branch,
                'priority_id'=> $request->ticketPriority,    
                'name' => $request->name,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'category_id' => $request->category,
                'ticket_type_id' => $request->ticketType,
                'ticket_category_id' => $request->ticketCategory,
                'title' => $request->subject,
                'details' => $request->details,
                // 'department_id'=> $request->department,
                'ack' => $request->ack,
                'attachment' => $request->attachment,
                $trackingCode = substr(base64_encode(sha1(mt_rand())), 0, 10),
                'tracking'=> $trackingCode,
                'status_id' => 1

                ]);

                //get admin and admin branch email
                $userBranch = $request->branch;
                $getUserRole = User::select('users.*')
                                        // ->where('branch_id', $userBranch)
                                        ->where('user_role_id', 1)
                                        ->where(function ($q) use($userBranch) {
                                            $q->where('branch_id', 8)->orWhere('branch_id', $userBranch);
                                        })
                                        ->get();
                // dd($tickets);

                // if ($getUserRole->count() > 0) {
                //     foreach($getUserRole as $key => $userRole){
                //         if (!empty($userRole->email)) {
                //             // dd($tickets);
                //             Mail::to($userRole->email)->send(new FeedbackCreated($tickets));

                //         }
                //     }
                // }

                if ($getUserRole->count() > 0) {
                    foreach($getUserRole as $key => $userRole){
                        if (!empty($userRole->email)) {
                            // dd($tickets);
                            // print_r ($userRole->email);
                            Mail::to($userRole->email)->send(new FeedbackNotify($tickets));

                        }
                    }
                    
                }

            Mail::to($request->email)->send(new FeedbackCreated($tickets));
            }catch(\Exception $e){
                dd('Message: ' .$e->getMessage());
                return false;
            }

            $ticketId = $tickets->id;
            // dd($ticketId);

            return redirect()->route('guest.feedback.success', $ticketId)->with([
                'success' => 'Maklum balas diterima!'
            ]);

    }

    public function guestSuccess(Ticket $ticket)
    {
        $tickets = Ticket::find($ticket->id);
        $responses = Response::select('responses.*')
            ->where('ticket_id', $tickets->id)
            ->get();
        // $userRoles = UserRole::get();
        
        // dd($ticket);

        return view('guest.success', compact('tickets', 'responses'));

    }

    public function replySender(Ticket $ticket)
    {
        // $ticketId = $request->ticketId;
        $loginuser = auth()->user();
        $tickets = Ticket::find($ticket->id);
        // $responses = Response::find($response);
        $statuses = Sts::get();

        // dd($tickets);

        return view('tickets.replySender', compact('tickets', 'statuses', 'loginuser'));

    }

    public function searchFeedback(request $request)
    {
        $search = $request->input('tracking');
        // $tickets = Ticket::find('tracking', $search);
        $tickets = Ticket::select('tickets.*')
            ->where('tracking', $search)
            ->first();
        // $tickets = Ticket::find($getId);
        // dd($tickets);
        try{

            $responses = Response::select('responses.*', 'tickets.*')
                ->join('tickets', 'responses.ticket_id', '=', 'tickets.id')
                ->where('responses.ticket_id', $tickets->id)
                ->where('responses.currentSts', 6)
                ->get();
                // dd($responses);
            // $userRoles = UserRole::get();
        }catch(\Exception $e){
            $responses = null;
        }
        
        

        return view('guest.search', compact('tickets', 'responses'));
    }

    public function test()
    {
        return view('test');
    }


}
