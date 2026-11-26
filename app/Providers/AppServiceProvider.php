<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\RoleInterface;
use App\Repositories\RoleRepository;


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(RoleInterface::class, RoleRepository::class);
    
        
    }

    public function boot(): void
    {
        
    }
}