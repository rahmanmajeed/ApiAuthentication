<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','check.roles']);
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

    public function useroles()
    {
        $data=Auth::user()->roles;
        $role=array();
        foreach($data as $d)
        {
           // echo $d->id;
            $role[]= $d->slug;
        }
        return response($role);
    }
}
