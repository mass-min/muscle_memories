<?php

namespace App\Http\Controllers;

use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;
use App\Domain\MuscleMemories\UseCase\CreateWorkoutUseCase;
use App\Domain\MuscleMemories\UseCase\GetUserWorkoutsUseCase;
use App\Models\Training;
use App\Models\TrainingSet;
use App\Models\Workout;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * Class WorkoutsController
 * @package App\Http\Controllers
 */
class WorkoutsController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $workouts = $user->workouts;
//        $getUserWorkoutsUseCase = app(GetUserWorkoutsUseCase::class);
//        $workouts = $getUserWorkoutsUseCase->execute(new UserId($user->id));

        return view('workouts.index', compact('workouts'));
    }

    public function show()
    {

    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('workouts.create');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        $workout = new Workout([
            'user_id' => $user->id
        ]);
        $workout->save();

        foreach ($request->get('training') as $trainingParams) {
            $training = new Training([
                'workout_id' => $workout->id,
                'training_menu_id' => $trainingParams['menu']
            ]);
            $training->save();

            foreach ($trainingParams['sets'] as $set) {
                $trainingSet = new TrainingSet([
                    'training_id' => $training->id,
                    'reps' => $set['reps'],
                    'weight' => $set['weight'],
                    'interval_seconds' => $set['interval_seconds'],
                ]);
                $trainingSet->save();
            }
        }

//        $createWorkoutUseCase = app(CreateWorkoutUseCase::class);
//        $createWorkoutUseCase->execute(
//            new TrainingMenuId($request->get('training_menu')),
//            new UserId($user->id)
//        );

        return redirect(route('workouts.index'));
    }
}
