<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\Faculties\FacultyRepository;
use App\Repositories\Faculties\FacultyRepositoryInterface;
use App\Repositories\Students\StudentRepository;
use App\Repositories\Students\StudentRepositoryInterface;
use App\Repositories\Subjects\SubjectRepository;
use App\Repositories\Subjects\SubjectRepositoryInterface;
use App\Repositories\Users\UserRepository;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(FacultyRepositoryInterface::class, FacultyRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(IUserRepository::class, UserRepository::class);
    }
}
