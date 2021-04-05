<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Team;
use App\Models\Member;
use App\Models\User;
use App\Models\Profile;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $teams = Team::with('member','user')->get();
        $members = Member::with('profile')->get();
        $profiles = Profile::All();
        $user = Auth::user();
        $users = User::All();
        if(Auth::user()->hasRole('Admin')) {
            return view ('admin.teams', compact('user', 'teams', 'members', 'profiles'));
        } else {
            return view ('users.teams', compact('user', 'teams', 'members', 'profiles'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if(Auth::user()->hasPermissionTo('create teams')) {
            if($team = Team::create($request->all())) {
                if($member = Member::create($request->all())) {
                    return redirect()->back()->with('success','Member created successfully');
                }
                return redirect()->back()->with('error','Member owner not added');
            }
            return redirect()->back()->with('error','We couldnt create the new team');
        //}
    }
}
