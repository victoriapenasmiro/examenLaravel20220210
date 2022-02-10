<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        //validación de que el idioma cargado a través de la URL es alguno que soporte el site
        Gate::define('check-language', function ($user, $locale) {

            if (!in_array($locale, ['en', 'es'])) {
                abort(404);
            }

            App::setLocale($locale);

            return true;
        });

        //validación si el usuario propietario es quien intenta modificar el post
        Gate::define('edit-post', function ($user, Post $post) {

            if ($user->id === $post->user_id) {
                return true;
            }

            abort(403);
        });
    }
}
