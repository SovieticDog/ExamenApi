<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\EventosInterface;
use APP\Interfaces\EventosRepository;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(EventosInterface::class, EventosRepository::class);
    }

 
    public function boot(): void
    {
        
    }
}

