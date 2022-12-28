<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Category;
use App\Models\Priority;
use App\Models\TicketCategory;
use App\Models\TicketType;
use App\Models\Status;
use App\Models\UserRole;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function create()
    {
        $branches = Branch::get();
        $departments = Department::orderby('name', 'asc')->get();
        $userRoles = UserRole::get();

        
        return view('users.create', compact('branches', 'departments', 'userRoles'));
    }

    public function import()
    {
        
    } 

    public function store(Request $request)
    {
        try{
            //create application

            // $department = new Department();
            // $department->code =  $request->code;
            // $department->name =  $request->name;
            // $department->save();
            $user = User::create([

                    'name' => $request->name,
                    'email'=> $request->email,
                    'password' => Hash::make($request->password),
                    'nokp'=> $request->ic_no,
                    // 'staff_no'=> $request->staff_no,
                    'phone'=> $request->phone,
                    'branch_id'=> $request->branch,
                    // 'position_id'=> $request->position,
                    'department_id'=> $request->department,
                    'user_role_id'=> $request->role
                    // 'status_id'=> $request->status_id

                ]);
            // dd($user);
            }catch(\Exception $e){
                dd('Message: ' .$e->getMessage());
                return false;
            }

            return redirect()->route('user.index')->with([
                'success' => 'User successfully added.'
            ]);
    }

    public function show(User $user)
    {
        //check if user login or not
        $loginuser = auth()->user();
        if ($loginuser == null){
            return redirect()->route('login');
        }

        $branches = Branch::get();
        $departments = Department::orderby('name', 'asc')->get();
        $user = User::find($user->id);
        $userRoles = UserRole::get();
        
        // dd($user);

        return view('users.show', compact('user', 'branches', 'departments', 'userRoles'));
    }
}
