<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Registered_team;
use App\Models\Tournament;
use App\Models\Rule;
use App\Models\Parameter;
use App\Models\Team;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegisteredTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $tournament = Tournament::findOrFail($id);
        if($tournament) {
            $user = Auth::user();
            $teams = Team::where('owner',$user->id)->get();
            $profiles = Profile::where('user_id', $user->id)->get();

            return view ('users.register-t', compact('user', 'teams', 'profiles', 'tournament'));
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
        try {
            if($registeredTeam = Registered_team::create($request->all())) {
                
                //$tournament = Tournament::findOrFail($request['tournament_id']);
                //$parameters = Parameter::where('tournament_id',$request['tournament_id'])->get();
                //$rules = Rule::where('tournament_id',$request['tournament_id'])->get();
                //return view ('tournament-info', compact('tournament','parameters', 'rules'));

                return redirect()->back()->with('message', 'Registro Exitoso!');
            }
        } catch (\Throwable $th) {
            throw ValidationException::withMessages([
                'registered_team' => 'No se pudo regsitrar tu equipo seleccionado. Intenta más tarde'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registered_team  $registered_team
     * @return \Illuminate\Http\Response
     */
    public function show(Registered_team $registered_team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registered_team  $registered_team
     * @return \Illuminate\Http\Response
     */
    public function edit(Registered_team $registered_team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registered_team  $registered_team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registered_team $registered_team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registered_team  $registered_team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registered_team $registered_team)
    {
        //
    }
}
