<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::All();
        $user = Auth::user();
        $users = User::All();

        if (Auth::user()->hasRole('Admin')) {
            return view('admin.users', compact('user', 'profiles', 'users'));
        } else {
            return view('users.profile', compact('user', 'profiles'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-users', compact('user'));
    }


    /**
     * Edit user status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $user = User::find($request['id']);

        if ($user->update($request->all())) {
            return redirect()->back()->with('success', 'El usuario se ha actualizado correctamente');
        }

        return redirect()->back()->with('error','No se pudo actualizar el registro correctamente');
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
        if ($profile = Profile::create($request->all())) {
            return redirect()->back()->with('success', 'Member created successfully');
        }
        return redirect()->back()->with('error', 'We couldnt create the new member');
        //}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //if(Auth::user()->hasPermissionTo('delete movies')) {
        $profile = Profile::find($request['id']);
        if ($profile) {
            if ($profile->delete()) {
                return response()->json([
                    'message' => 'profile deleted successfully',
                    'code' => '200',
                ]);
            }
        }
        return response()->json([
            'message' => 'We couldt delete the profile',
            'code' => '400',
        ]);
        //}
    }
}
