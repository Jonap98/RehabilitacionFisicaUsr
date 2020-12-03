<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exercise;
use App\Therapy;
use App\Assignment;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    public function index($id)
    {
        $usr = User::where("id", "=", $id)->get();
        //$user = User::findOrFail($id);
        $exercises = Exercise::where("active", "=", "1")->orderBy('active', 'ASC')->get();
        //dd($exercises);
        return view("assignment", array(
            "users" => $usr,
            "exercises" => $exercises,
            "action" => action('AssignmentController@storeAssignment', $id)
        ));
    }

    public function storeAssignment(Request $request)
    {
        $th = Exercise::select('id_therapy')->where("id", "=", $request->id_exercise)->get()->first();
        $th = (integer)$th['id_therapy'];
        //dd($th);
        //dd($id);
        //dd($request->id_therapy);
        //dd($id);
        $assignment = new Assignment();

        $max = \DB::table('exercise')->max('id');

        $assignment->id_exercise = $request->id_exercise;
        $assignment->id_user = $request->id;
        $assignment->id_therapy = $th;
        
        $assignment->save();

        //User::find($id->storeAssignment($request->all(), $id));

        $notification = array(
            'message' => 'Registro actualizado sactisfactoriamente', #creamos el mensaje y le damos valor
            'alert-type' => 'success' #elegimos el tipo de alerta(succes, error, warning, etc.)
        );

        return back()->with($notification);
    }

    public function addFavorite(Request $request)
    {
        //dd($request);
        $id_usr = Auth::user()->id;
        \DB::table('assignment')->where('id_exercise', '=', $request->id_exercise)
        ->where('id_user', '=', $id_usr)->update(['favorite' => $request->favorite]);

        $notification = array(
            'message' => 'Registro actualizado sactisfactoriamente', #creamos el mensaje y le damos valor
            'alert-type' => 'success' #elegimos el tipo de alerta(succes, error, warning, etc.)
        );

        return back()->with($notification);
    }
}
