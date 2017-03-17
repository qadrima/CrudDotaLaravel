<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
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

    public function editPlayer()
    {
        return view('editPlayer');
    }
    public function editPlayerAction(Request $request)
    {

        $pasword = Hash::make($request->password);
        $player  = User::findOrFail($request->id);

        $player->name     = $request->name;
        $player->password = $pasword;
        $player->save();

        return redirect()->route('tournament.index')->with('alert-success','Success Edit Player!');
        //return $request->id.' - '.$request->name.' - '.$pasword;
    }
}
