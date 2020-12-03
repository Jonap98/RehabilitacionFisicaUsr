<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercise;
use App\Therapy;
use App\Assignment;
use App\Playback;
use App\Access;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExerciseController extends Controller
{
    public function index()
    {
        $therapies = Therapy::where("active", "=", "1")->orderBy('active', 'ASC')->get();
        return view("exercise", array(
            "therapies" => $therapies
        ));
    }

    public function storeExercise(Request $request)
    {
        $exercise = new Exercise();

        $exercise->name = $request->name;
        $exercise->path = $request->path;
        $exercise->id_therapy = $request->id_therapy;

        $request->validate([
            'path' => 'required|file|max:10240000'
        ]);

        $video = $request->file('path')->store('public/videos');

        $url = Storage::url($video);

        Exercise::create([
            'name' => $exercise->name,
            'path' => $url,
            'id_therapy' => $exercise->id_therapy
        ]);

        return back();
    }

    public function selectionExercise(Request $request)
    {
        //dd($request);
        $id = Auth::user()->id;
        $id_usr = $id;
        $exerc = Exercise::select('exercise.id as exercise_id',
        'exercise.name as exercise_name',
        'exercise.path as exercise_path',
        'exercise.id_therapy as therapy_id',
        'assignment.favorite as favorite',)
        ->join('assignment', 'assignment.id_exercise', '=', 'exercise.id')
        ->where('exercise.id_therapy', '=', $request->id_therapy)
        ->where('assignment.id_user', '=', $id)
        ->distinct()
        ->get();

        $exerc2 = Exercise::select('exercise.id as exercise_id',
        'exercise.name as exercise_name',
        'exercise.path as exercise_path',
        'exercise.id_therapy as therapy_id',
        'therapy.id as therapy_id',
        'therapy.image as therapy_image',
        'assignment.favorite as favorite')
        ->join('therapy', 'therapy.id', '=', 'exercise.id_therapy')
        ->join('assignment', 'assignment.id_exercise', '=', 'exercise.id')
        ->where('exercise.id_therapy', '=', $request->id_therapy)
        ->where('assignment.id_user', '=', $id)
        ->distinct()
        ->get();

        $therap = Therapy::select('therapy.id as therapy_id',
        'therapy.name as therapy_name',
        'therapy.image as therapy_image')
        ->join('assignment', 'assignment.id_therapy', '=', 'therapy.id')
        ->where('assignment.id_user', '=', $id)
        ->distinct()
        ->get();

        /*
        $assignment = Assignment::select('id_exercise as exercise_id',
        'favorite as fav')
        ->where('id_user', '=', $id_usr)
        ->where('id_exercise', '=', $exerc->exercise_id)
        ->get();
        */
        return view('selectionE', array(
            "exercise" => $exerc,
            "therapy" => $therap,
            "exercise2" => $exerc2
        ));
    }

    public function exercise(Request $request)
    {
        $id = Auth::user()->id;
        $id_usr = $id;
        $exerc = Exercise::select('exercise.id as exercise_id',
        'exercise.name as exercise_name',
        'exercise.path as exercise_path',
        'exercise.id_therapy as therapy_id',
        'assignment.favorite as favorite',)
        ->join('assignment', 'assignment.id_exercise', '=', 'exercise.id')
        ->where('exercise.id', '=', $request->id_exercise)
        ->where('assignment.id_user', '=', $id)
        ->distinct()
        ->get();

        $access = Access::select('id')->where('id_user', '=', $id)->get()->last();

        $playback = new Playback();
        $playback->id_user = $id;
        $playback->id_exercise = $request->id_exercise;
        $playback->id_access = $access->id;
        $playback->save();



        return view('exercisevista', array(
            "exercise" => $exerc
        ));
    }

}
