<?php

namespace App\Http\Controllers;

use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
    public function index()
    {
        //show data
        $tournaments   = DB::table('tournaments')->orderBy('id', 'desc')->get();
        //$tournaments = Tournament::all();
        return view('home',['send_tournaments' => $tournaments]);
    }

    //add tournament
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'title'       => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);

        //create new data
        $tournament              = new Tournament();
        $tournament->title       = $request->title;
        $tournament->description = $request->description;
        $tournament->date        = $request->date;
        $tournament->save();

        return redirect()->route('tournament.index')->with('alert-success','Data Hasbeen Saved!');
    }

    public function edit($id)
    {
        $tournament = Tournament::findOrFail($id);
        // return to the edit views
        return view('edit',compact('tournament'));
    }
    public function update(Request $request, $id)
    {
        // validation
        $this->validate($request,[
            'title'       => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);

        $tournament              = Tournament::findOrFail($id);
        $tournament->title       = $request->title;
        $tournament->description = $request->description;
        $tournament->date        = $request->date;
        $tournament->save();

        return redirect()->route('tournament.index')->with('alert-success','Data Hasbeen Saved!');
    }

    public function destroy($id)
    {
        // delete data
        $tournament = Tournament::findOrFail($id);
        $tournament->delete();
        return redirect()->route('tournament.index')->with('alert-success','Data Hasbeen Destroy!');
    }
}
