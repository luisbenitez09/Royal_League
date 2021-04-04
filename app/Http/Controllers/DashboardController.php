<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Team;
use App\Models\Member;
use App\Models\User;
use App\Models\Profile;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $userName;

    public function index ()
    {
        $teams = Team::with('member')->get();
        $members = Member::with('profile')->get();
        $profiles = Profile::All();
        $user = Auth::user();
        $users = User::All();

        if(Auth::user()->hasRole('Admin')) {
            return view ('admin.dashboard', compact('user', 'teams', 'members', 'profiles','users'));
        } else {
            return view ('users.dashboard');
        }
        
    }
}
