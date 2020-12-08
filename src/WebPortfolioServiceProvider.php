<?php

namespace Ales0sa\WebPortfolio;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class WebPortfolioServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/WebPortfolio.php', 'webportfolio');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'webportfolio');
        $this->publishes([            
            __DIR__.'/../resources/js/' => base_path('resources/js/Pages/WebPortfolio')
        ], 'assets');
        $this->publishConfig();

      if ($this->app->runningInConsole()) {
      // Export the migration
      if (! class_exists('CreateWebsTable')) {
        $this->publishes([
          __DIR__ . '/database/migrations/create_webs_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_webs_table.php'),
          // you can add any number of migrations here
        ], 'migrations');
      }
      }
        $this->registerRoutes();
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        });
    }

    /**
    * Get route group configuration array.
    *
    * @return array
    */
    private function routeConfiguration()
    {
        return [
            'namespace'  => "Ales0sa\WebPortfolio\Http\Controllers",
            'middleware' => 'web',
            'prefix'     => 'web'
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register facade
        $this->app->singleton('webportfolio', function () {
            return new WebPortfolio;
        });
    }

    /**
     * Publish Config
     *
     * @return void
     */
    public function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/WebPortfolio.php' => config_path('WebPortfolio.php'),
            ], 'config');
        }
    }
}
