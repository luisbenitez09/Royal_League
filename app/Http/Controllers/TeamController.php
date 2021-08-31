<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Team;
use App\Models\Member;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Validation\ValidationException;


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
        
        if(Auth::user()->hasRole('Admin')) {
            return view ('admin.teams', compact('user', 'teams', 'members', 'profiles'));
        } else {
            $teams = Team::select('teams.id', 'teams.name', 'teams.points', 'teams.access_code', 'teams.owner', 'teams.bestResult', 'teams.tournaments')->join('members','members.access_code','=','teams.access_code')->join('profiles','profiles.id','=','members.profile_id')->join('users','users.id','=','profiles.user_id')->where('users.id', $user->id)->distinct()->get();
            
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
        $members = Member::where('access_code', $team->access_code)->get();
        return view ('admin.edit-teams', compact('team', 'members'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teamEdit ($id)
    {
        $team = Team::findOrFail($id);
        $user = Auth::user();

        if($team->owner === $user->id){
            $members = Member::where('access_code', $team->access_code)->get();
            return view ('users.edit-team', compact('team','members'));
        } else {
            return $this->index();
        }
        
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
        try {
            if(Auth::user()->hasPermissionTo('create teams')) {
                if($member = Member::create($request->all())) {
                    if($team = Team::create($request->all())) {
                        return redirect()->back()->with('success','Team created successfully');
                    }
                    return redirect()->back()->with('error','We couldnt create the new team');
                }
            }
        } catch (\Throwable $th) {
            throw ValidationException::withMessages([
                'team' => 'No se pudo crear el equipo. Intenta más tarde.'
            ]);
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


    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //if(Auth::user()->hasPermissionTo('delete movies')) {
        $team = Team::find($request['id']);
        if ($team) {
            if ($team->delete()) {
                return response()->json([
                    'message' => 'team deleted successfully',
                    'code' => '200',
                ]);
            }
        }
        return response()->json([
            'message' => 'We couldt delete the team',
            'code' => '400',
        ]);
        //}
    }

}

