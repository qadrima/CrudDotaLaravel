<?php

namespace App\Http\Controllers;

use App\MatchPlayer;
use App\Tournament;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $tournament        = Tournament::findOrFail($id);
        $players           = User::all()->whereIn('id', $this->getArrMatchPlayer($id));

        return view('detail',['send_players' => $players],['send_tournament' => $tournament]);
    }

    public function addMatchPlayer($id)
    {
        $tournament  = Tournament::findOrFail($id);
        $users       = DB::table('users')->whereNotIn('id', $this->getArrMatchPlayer($id))->get();

        return view('addmatchplayer',['send_users' => $users],['send_tournament' => $tournament]);
    }
    public function addMatchPlayerAction($match_id,$player_id)
    {
        if ($this->countMaxMatchPlayerIf10($match_id) < 10)
        {
            $matchPlayer           = new MatchPlayer();
            $matchPlayer->matchID  = $match_id;
            $matchPlayer->playerID = $player_id;
            $matchPlayer->save();

            return redirect('detail/'.$match_id)->with('alert-success','Success add!');
        }
        else
        {
            return redirect('detail/'.$match_id)->with('alert-fail','Max players 10!');
        }
    }

    public function deleteMatchPlayer($match_id,$player_id)
    {
        DB::table('match_players')->where('matchID', '=', $match_id)->where('playerID', '=', $player_id)->delete();

        return redirect('detail/'.$match_id)->with('alert-success','Data Hasbeen Delete!');
    }

    private function getArrMatchPlayer($id)
    {
        $arr_match_players = array();
        $match_players     = MatchPlayer::all()->where('matchID', '=', $id);
        foreach ($match_players as $user) {
            array_push($arr_match_players,$user->playerID);
        }

        return $arr_match_players;
    }

    private function countMaxMatchPlayerIf10($match_id)
    {
        $match_players  = MatchPlayer::all()->where('matchID', '=', $match_id)->count();
        return $match_players;
    }
}
