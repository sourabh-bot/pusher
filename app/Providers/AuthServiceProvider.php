<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use App\Post;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
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
        Gate::define('create-post', function($user){
            return $user ? Response::allow("You are allow") 
                        : Response::deny('Please login first');
        });

        Gate::define('update-post', function($user){
            // return $user ? Response::allow() 
            //             : Response::deny('Please login first');

            return $user;
        });

        Gate::define('view-post', PostPolicy::class.'@viewAny');
        

        
        
    }
}
