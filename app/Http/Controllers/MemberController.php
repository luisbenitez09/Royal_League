<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Team;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $teams = Team::all();
        $user = Auth::user();
        return view ('users.teams', compact('user', 'teams'));
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
            try {
                if($member = Member::create($request->all())) {
                    return redirect()->back()->with('success','Member created successfully');
                }
            } catch (\Throwable $th) {
                throw ValidationException::withMessages([
                    'member' => 'No se pudo agregar tu perfil al equipo seleccionado. Intenta más tarde'
                ]);
            }
            
        //}
    }


    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $member = Member::find($request['id']);
        if ($member) {
            if ($member->delete()) {
                return response()->json([
                    'message' => 'Member deleted successfully',
                    'code' => '200',
                ]);
            }
        }
        return response()->json([
            'message' => 'We couldt delete the member',
            'code' => '400',
        ]);
        
    }
}
