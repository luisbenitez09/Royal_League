<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editTeam ($id)
    {
        $team = Team::findOrFail($id);
        return view ('admin.edit-teams', compact('team'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teamEdit ($id)
    {
        $team = Team::findOrFail($id);
        $members = DB::table('members')->where('access_code',$team->access_code)->get();
        return view ('users.edit-team', compact('team','members'));
    }

    /**
     * Edit team status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeTeamStatus(Request $request)
    {
        $team = Team::find($request['id']);

        if ($team->update($request->all())) {
            return redirect()->back()->with('success', 'El equipo se ha actualizado correctamente');
        }

        return redirect()->back()->with('error','No se pudo actualizar el registro correctamente');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->hasPermissionTo('create teams')) {
            if($member = Member::create($request->all())) {
                if($team = Team::create($request->all())) {
                    return redirect()->back()->with('success','Team created successfully');
                }
                return redirect()->back()->with('error','We couldnt create the new team');
                
            }
            return redirect()->back()->with('error','Member owner not added');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $team = Team::findOrFail($request['id']);

        if ($team->update($request->all())) {
            return redirect()->back()->with('success','Equipo actualizado correctamente');
        }
        return redirect()->back()->with('error','No se pudo actualizar el registro correctamente');
    }

}

