<?php

namespace App\Providers;

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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update', function($user, $post){ //redaguoti galima tik savo papostinta posta
            return $user->id === $post->user_id;
        });

        Gate::define('delete', function($user, $post){ //trinti galima tik savo papostinta posta
            return $user->id === $post->user_id;
        });
    }
}
