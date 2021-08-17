<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Parameter;
use App\Models\Registered_team;
use Auth;
use DB;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $user = Auth::user();
        $tournaments = Tournament::All();
        return view ('tournaments', compact('user','tournaments'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminTournaments ()
    {
        $tournaments = Tournament::All();

        return view ('admin.tournaments', compact('tournaments'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editTournament ($id)
    {
        $tournament = Tournament::findOrFail($id);
        return view ('admin.edit-tournaments', compact('tournament'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liveTournament ($id)
    {
        $tournament = Tournament::findOrFail($id);
        if($tournament->status === 2) {
            $teams = Registered_team::where('tournament_id', $tournament->id)->get();
            return view ('users.live-tournament', compact('tournament', 'teams'));
        } else {
            return $this->index();
        }
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tournamentInfo ($id)
    {
        $tournament = Tournament::findOrFail($id);
        $parameters = DB::table('parameters')->where('tournament_id',$id)->get();
        return view ('tournament-info', compact('tournament','parameters'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTournament ()
    {
        return view ('admin.add-tournament');
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
            if ($tournament = Tournament::create($request->all())) {
                $tournaments = Tournament::All();

                return view ('admin.tournaments', compact('tournaments'));
            }
            return redirect()->back()->with('error', 'We couldnt create the new member');
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tournament = Tournament::findOrFail($request['id']);

        $tournaments = Tournament::All();

        if ($tournament->update($request->all())) {
            return view ('admin.tournaments', compact('tournaments'));
        }
        return redirect()->back()->with('error','No se pudo actualizar el registro correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        //
    }
}
