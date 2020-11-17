<?php

namespace App\Http\Controllers;

use App\Domain\MuscleMemories\Domain\Entity\TrainingMenuEntity;
use App\Domain\MuscleMemories\Domain\Repository\TraineeRepositoryInterface;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;
use App\Domain\MuscleMemories\UseCase\CreateTrainingUseCase;
use App\Models\TrainingMenu;
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
        $userId = \Auth::user()->id;
        $traineeRepository = app(TraineeRepositoryInterface::class);
        $trainings = $traineeRepository->getAll();

        return view('training.index', compact('user'));
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
