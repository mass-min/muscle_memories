<?php

namespace App\Providers;

use App\Domain\MuscleMemories\Domain\Repository\MysqlTraineeRepository;
use App\Domain\MuscleMemories\Domain\Repository\MysqlTrainingMenuRepository;
use App\Domain\MuscleMemories\Domain\Repository\MysqlWorkoutRepository;
use App\Domain\MuscleMemories\Domain\Repository\TraineeRepositoryInterface;
use App\Domain\MuscleMemories\Domain\Repository\MysqlTrainingRepository;
use App\Domain\MuscleMemories\Domain\Repository\TrainingMenuRepositoryInterface;
use App\Domain\MuscleMemories\Domain\Repository\TrainingRepositoryInterface;
use App\Domain\MuscleMemories\Domain\Repository\WorkoutRepositoryInterface;
use App\Domain\MuscleMemories\UseCase\CreateWorkoutUseCase;
use App\Domain\MuscleMemories\UseCase\GetUserWorkoutsUseCase;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(WorkoutRepositoryInterface::class, MysqlWorkoutRepository::class);
        $this->app->singleton(TrainingRepositoryInterface::class, MysqlTrainingRepository::class);
        $this->app->singleton(TraineeRepositoryInterface::class, MysqlTraineeRepository::class);
        $this->app->singleton(TrainingMenuRepositoryInterface::class, MysqlTrainingMenuRepository::class);
        $this->app->singleton(CreateWorkoutUseCase::class, CreateWorkoutUseCase::class);
        $this->app->singleton(GetUserWorkoutsUseCase::class, GetUserWorkoutsUseCase::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
