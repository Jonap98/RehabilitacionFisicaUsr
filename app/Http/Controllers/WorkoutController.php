<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exercise;
use App\Therapy;
use App\Assignment;
use App\Workout;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    public function index($id)
    {
        //dd($id);
        $usr = User::where("id", "=", $id)->get();
        $exercises = Exercise::where("active", "=", "1")->orderBy('active', 'ASC')->get();
        //dd($exercises);
        return view("workout", array(
            "users" => $usr,
            "exercises" => $exercises,
            "action" => action('WorkoutController@storeWorkout', $id)
        ));
    }

    public function storeWorkout(Request $request)
    {
        dd($request);
        //$th = Exercise::select('id_therapy')->where("id", "=", $request->id_exercise)->get()->first();
        //$th = (integer)$th['id_therapy'];

        /*$assignment = Assignment::where("id_exercise", "=", $request->id_exercise)->get()->first();
        $assignment = (integer)$assignment['id_exercise'];*/

        $bD = $request->get('date_range');
        $monthI = strtok ($bD,"/");
        $dayI = strtok ("/");
        $yearI = strtok (" - /");
        $beginDate=$yearI."-".$monthI."-".$dayI;

        $monthE = strtok ("-/ ");
        $dayE = strtok ("/");
        $yearE = strtok ("/");

        $endDate=$yearE."-".$monthE."-".$dayE;

        $workout = new Workout();

        $workout->initial_date = $beginDate;
        $workout->end_date = $endDate;
        //$workout->initial_date = $request->sartDate;
        //$workout->end_date = $request->endDate;
        $workout->id_exercise = $request->id_exercise;
        $workout->id_user = $request->id;

        $workout->save();

        $notification = array(
            'message' => 'Registro actualizado sactisfactoriamente', #creamos el mensaje y le damos valor
            'alert-type' => 'success' #elegimos el tipo de alerta(succes, error, warning, etc.)
        );

        return back()->with($notification);
    }

    public function selectionWorkout()
    {
        $id = Auth::user()->id;
        $exercise = Exercise::select('exercise.id as exercise_id',
        'exercise.name as exercise_name',
        'exercise.path as exercise_path',
        'workout.initial_date as initial_date',
        'workout.end_date as end_date')
        ->join('workout', 'workout.id_exercise', '=', 'exercise.id')
        ->where('workout.id_user', '=', $id)
        ->distinct()
        ->get();

        return view('selectionWorkout', array(
            'exercise' => $exercise
        ));
    }
}
