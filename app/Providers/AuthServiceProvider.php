<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Post;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var arrayPrivate Resources
Confidential Information
     */
    protected $policies = [
        Post::class => PostPolicy::class,       
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('admin-only', function ($user) 
        {
            if($user->isAdmin == 1)
            {
                return true;
            }
            return false;
        });
        Gate::define('adminGate', function($user){
            if ($user->isAdmin == 1){
                return true;
            }
            return false;
        });
    }
}
