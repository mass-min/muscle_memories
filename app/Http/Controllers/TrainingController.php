<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingMenu;
use App\Models\TrainingSet;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $user = \Auth::user();

        return view('training.index', compact('user'));
    }

    public function show()
    {

    }

    public function create()
    {
        $trainingMenus = TrainingMenu::all()->mapToGroups(function ($item, $key) {
            return [$item['body_part'] => ['id' => $item['id'], 'name' => $item['name']]];
        })->toArray();
        return view('training.create', compact('trainingMenus'));
    }

    public function store(Request $request)
    {
        $user = \Auth::user();

        $training = Training::create([
            'user_id' => $user->id,
            'training_menu_id' => $request->get('training_menu'),
        ]);
        $trainingSet = TrainingSet::create([
            'training_id' => $training->id,
            'reps' => $request->get('reps'),
            'weight' => $request->get('weight'),
            'interval_seconds' => $request->get('interval_seconds'),
        ]);

        return redirect(route('training.create'));
    }
}
