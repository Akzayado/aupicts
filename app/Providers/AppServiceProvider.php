<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        Builder::macro('whereLike', function($attributes, string $searchItem){
            foreach ($array_wrap($attributes) as $attribute) {
                $this->orWhere($attribute, 'LIKE', "%{$searchItem}%");
            }
            return $this;
        });

        //use
        // User::whereLike(['name', 'email'], $searchItem)->get();

    }
}
