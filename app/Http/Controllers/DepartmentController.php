<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Imports\DepartmentImport;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentController extends Controller
{
    public function index()
    {
        $loginuser = auth()->user();
        if ($loginuser == null){
            return redirect()->route('login');
        }
        
        $departments = Department::orderBy('name')->get();
    // dd($loginuser);
        return view('departments.index', compact('departments'));
    }

    public function import() 
    {
        Excel::import(new DepartmentImport,request()->file('file'));
             
        return back();
    }

    public function create()
    {
        return view('departments.create');
    }
}
