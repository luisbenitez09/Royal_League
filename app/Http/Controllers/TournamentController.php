<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Parameter;
use App\Models\Rule;
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
        $parameters = Parameter::where('tournament_id',$id)->get();
        $rules = Rule::where('tournament_id',$id)->get();
        return view ('admin.edit-tournaments', compact('tournament', 'parameters', 'rules'));
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
        $parameters = Parameter::where('tournament_id',$id)->get();
        $rules = Rule::where('tournament_id',$id)->get();
        return view ('tournament-info', compact('tournament','parameters', 'rules'));
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
            
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($tournament = Tournament::create($request->all())) {
                if($request->hasFile('image')){
                    $image = $request->file('image');
                    $name = 'torneo-'.$tournament->id.'.'.$image->getClientOriginalExtension();
                    $filePath = $request->file('image')->storeAs('img/torneos', $name, 'public');
                    $tournament->image = $name;
                }
                $tournament->save();
                
                $tournaments = Tournament::All();

                return view ('admin.tournaments', compact('tournaments'));
            }
            
            return redirect()->back()->with('error', 'We couldnt create the new tournament');
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


        if ($tournament->update($request->all())) {
            if($request->hasFile('image')){
                $image = $request->file('image');
                $name = 'torneo-'.$tournament->id.'.'.$image->getClientOriginalExtension();
                $filePath = $request->file('image')->storeAs('img/torneos', $name, 'public');
                $tournament->image = $name;
            }
            $tournament->save();
            
            
            $tournaments = Tournament::All();
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
