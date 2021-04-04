<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class TeamsUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $userName;

    public function index ()
    {
        if(Auth::user()->hasRole('Admin')) {
            return view ('admin.teams-users');
        } 
        
    }
}
