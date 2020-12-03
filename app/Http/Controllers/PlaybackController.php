<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playback;
use App\Access;

class PlaybackController extends Controller
{
    public function store(Request $request)
    {
        //dd($request);
        $usr = Auth::user()->id;
        $access = Access::select('id')->where('id_user', '=', $usr)->last();
        //$access = \DB::table('access')->select('id')->max('created_at');
        //dd($access);
        //$id_access = \DB::table('access')->max('created_at');
        //dd($id_access);
        $playback = new Playback();
        $playback->id_user = $usr;
        $playback->id_exercise = $request->id_exercise;
        $playback->id_access = 1;
        $playback->save();

        return back();
        //return response()->json(['success'=>'Registrado correctamente']);
    }
}
