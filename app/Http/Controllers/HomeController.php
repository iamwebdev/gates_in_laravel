<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use Auth;
use App\Data;
use Session;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function private()
    {
        if (Gate::allows('admin-only', auth()->user())) {
            return view('private');
        }
        return 'You are not admin!!!!';
    }

    public function showForm()
    {
        return view('add');
    }

    public function saveData(Request $request)
    {
        if (Gate::allows('adminGate')) {
           Data::create($request->all());
           Session::flash('done','Message');
           return redirect()->back();
        }
           Session::flash('undone','Message');
           return redirect()->back();
    }

    
}
