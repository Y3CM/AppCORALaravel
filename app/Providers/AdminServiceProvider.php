<?php

namespace App\Providers;

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\AdminLte;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $unverifiedPostsCount = Post::where('is_published', false)->count();

        View::share('unverifiedPostsCount', $unverifiedPostsCount);
        
    }
}
