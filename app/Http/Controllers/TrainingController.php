<?php

namespace App\Http\Controllers;

use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;
use App\Domain\MuscleMemories\UseCase\CreateTrainingUseCase;
use App\Domain\MuscleMemories\UseCase\GetUserTrainingsUseCase;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * Class TrainingController
 * @package App\Http\Controllers
 */
class TrainingController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $getUserTrainingsUseCase = app(GetUserTrainingsUseCase::class);
        $trainings = $getUserTrainingsUseCase->execute(new UserId($user->id));

        return view('training.index', compact('trainings'));
    }

    public function show()
    {

    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('training.create');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        $createTrainingUseCase = app(CreateTrainingUseCase::class);
        $createTrainingUseCase->execute(
            new TrainingMenuId($request->get('training_menu')),
            new UserId($user->id)
        );

        return redirect(route('training.index'));
    }
}
