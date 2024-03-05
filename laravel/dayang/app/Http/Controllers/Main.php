<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\User;
use App\Models\User_tournament;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function create() {
        $tournaments = Tournament::latest()->paginate(5);
        $registrations = User_tournament::all();
        $users = User::all();
        return view('about', compact('tournaments', 'registrations', 'users'));
    }
    public function store(Request $request) {
        $user_id = User::where('username' , '=', $request->username)->get('id');
        $registration = new User_tournament();
        $registration->user_id = $user_id[0]->id;
        $registration->tournament_id = $request->tournament_id; 
        $registration->save();
        return Main::create();
    }
    public function update(Request $request){
        $user = User::where('id' , $request->user_id)->update(['username' => $request->username]);
        return Main::create();
    }
    public function destroy(User_tournament $registration){
        $registration->delete();

        return redirect()->route('about');
    }
}
