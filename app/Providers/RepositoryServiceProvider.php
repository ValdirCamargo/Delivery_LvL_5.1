<?php

namespace CodeDelivery\Providers;

use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'CodeDelivery\Repositories\CategoryRepository',
            'CodeDelivery\Repositories\CategoryRepositoryEloquent'
        );
    }
}