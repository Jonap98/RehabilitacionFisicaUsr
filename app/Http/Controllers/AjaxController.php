<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playback;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }

    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();
        
        \Log::info($input);

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
}
