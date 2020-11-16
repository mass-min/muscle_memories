<?php

namespace App\Http\Controllers;

use App\Domain\MuscleMemories\Domain\Repository\TraineeRepository;
use App\Domain\MuscleMemories\Domain\Repository\TrainingRepository;
use App\Domain\MuscleMemories\Domain\ValueObject\TrainingMenuId;
use App\Domain\MuscleMemories\Domain\ValueObject\UserId;
use App\Domain\MuscleMemories\UseCase\CreateTrainingUseCase;
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

        $createTrainingUseCase = new CreateTrainingUseCase(new TrainingRepository(), new TraineeRepository);
        $createTrainingUseCase->execute(
            new TrainingMenuId($request->get('training_menu')),
            new UserId($user->id)
        );

        return redirect(route('training.create'));
    }
}
