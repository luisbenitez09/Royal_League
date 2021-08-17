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
        //ok
        $user = Auth::user();

        //admin
        $teams2 = DB::table('teams')->orderBy('points','DESC')->get();
        $members = Member::with('profile')->get();
        $profiles = Profile::All();
        $users = User::All();


        if(Auth::user()->hasRole('Admin')) {
            //vista admin

            $teamsOwner = Team::with('user')->get();
            return view ('admin.dashboard', compact('user', 'teams2', 'members', 'profiles','users'));
        } else { 
            //vista usuario
            $teams = Team::select('teams.id', 'teams.name', 'teams.points', 'teams.access_code')->join('members','members.access_code','=','teams.access_code')->join('profiles','profiles.id','=','members.profile_id')->join('users','users.id','=','profiles.user_id')->where('users.id', $user->id)->distinct()->get();
            $ownedTeams = Team::where('owner', $user->id)->count();
            $profileNum = Profile::where('user_id', $user->id)->count();
            $userPoints = 0;
            foreach ($profiles as $profile) {
                if($profile->user_id === $user->id) {
                    $userPoints+=$profile->points;
                }
            }
            $tournaments = Tournament::skip(0)->take(4)->get();
            $onlineTournament = false;
            $torneos = Tournament::All();
            foreach($torneos as $torneo) {
                if ($torneo ->status === 2) {
                    $onlineTournament = true;
                }
            }
            

            return view ('users.dashboard', compact('user', 'teams', 'ownedTeams', 'profileNum', 'userPoints', 'tournaments', 'onlineTournament'));
        }
        
    }
}
