<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Team;
use App\Models\Member;
use App\Models\User;
use App\Models\Profile;
use App\Models\Tournament;

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
        $tournaments = Tournament::skip(0)->take(4)->get();
        $user = Auth::user();
        $users = User::All();
        $onlineTournament = false;
        $torneos = Tournament::All();
        foreach($torneos as $torneo) {
            if ($torneo ->status === 2) {
                $onlineTournament = true;
            }
        }


        if(Auth::user()->hasRole('Admin')) {
            $teamsOwner = Team::with('user')->get();
            return view ('admin.dashboard', compact('user', 'teams', 'members', 'profiles','users'));
        } else {
            $teamsIn = DB::table('teams')->where('owner',$user->id)->count();
            $profileNum = DB::table('profiles')->where('user_id',$user->id)->count();
            $userPoints = 0;
            foreach ($profiles as $profile) {
                if($profile->user_id === $user->id) {
                    $userPoints+=$profile->points;
                }
            }
            return view ('users.dashboard', compact('user', 'teams', 'members', 'profiles','users','teamsIn','profileNum', 'userPoints', 'tournaments','torneos','onlineTournament'));
        }
        
    }
}
