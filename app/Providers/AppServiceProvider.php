<?php

namespace App\Providers;

use App\Domain\MuscleMemories\Domain\Repository\MysqlTraineeRepository;
use App\Domain\MuscleMemories\Domain\Repository\MysqlTrainingMenuRepository;
use App\Domain\MuscleMemories\Domain\Repository\TraineeRepositoryInterface;
use App\Domain\MuscleMemories\Domain\Repository\MysqlTrainingRepository;
use App\Domain\MuscleMemories\Domain\Repository\TrainingMenuRepositoryInterface;
use App\Domain\MuscleMemories\Domain\Repository\TrainingRepositoryInterface;
use App\Domain\MuscleMemories\UseCase\CreateTrainingUseCase;
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
        $this->app->singleton(TrainingRepositoryInterface::class, MysqlTrainingRepository::class);
        $this->app->singleton(TraineeRepositoryInterface::class, MysqlTraineeRepository::class);
        $this->app->singleton(TrainingMenuRepositoryInterface::class, MysqlTrainingMenuRepository::class);
        $this->app->singleton(CreateTrainingUseCase::class, CreateTrainingUseCase::class);
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
