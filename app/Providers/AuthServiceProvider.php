<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();


        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Portfolio
        Gate::define('portfolio_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('portfolio_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('portfolio_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('portfolio_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('portfolio_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Categories
        Gate::define('category_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Portfolio management
        Gate::define('portfolio_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Menu
        Gate::define('programs_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Program
        Gate::define('program_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('program_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('program_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('program_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('program_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Subprogram
        Gate::define('subprogramme_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('subprogramme_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('subprogramme_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('subprogramme_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('subprogramme_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });


        // Auth gates for: Main menu
        Gate::define('main_menu_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('main_menu_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('main_menu_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('main_menu_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('main_menu_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Menu social
        Gate::define('menu_social_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('menu_social_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('menu_social_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('menu_social_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('menu_social_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Price
        Gate::define('price_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('price_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('price_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('price_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('price_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Price
        Gate::define('photo_image_page_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('photo_image_page_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('photo_image_page_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('photo_image_page_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('photo_image_page_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Comment
        Gate::define('comment_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('comment_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('comment_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('comment_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('comment_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
