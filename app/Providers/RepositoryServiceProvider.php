<?php

namespace App\Providers;

use App\Repository\Eloquent\MarkRepository;
use App\Repository\Eloquent\StudentRepository;
use App\Repository\Eloquent\TermRepository;
use App\Repository\Interfaces\MarkRepositoryInterface;
use App\Repository\Interfaces\StudentRepositoryInterface;
use App\Repository\Interfaces\TermRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(MarkRepositoryInterface::class, MarkRepository::class);
        $this->app->bind(TermRepositoryInterface::class, TermRepository::class);
    }

   
    public function boot(): void
    {
        return;
    }
}
