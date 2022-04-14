<?php

namespace Armezit\GetCandy\Api;

use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    protected array $configFiles = ['system'];

    protected string $root = __DIR__ . '/..';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        collect($this->configFiles)->each(function ($config) {
            $this->mergeConfigFrom("{$this->root}/config/$config.php", "getcandy-api.$config");
        });
    }

    /**
     * Boot up the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'getcandy-api');
        $this->registerPublishables();
    }

    /**
     * Register our publishables.
     *
     * @return void
     */
    private function registerPublishables()
    {
        collect($this->configFiles)->each(function ($config) {
            $this->publishes([
                "{$this->root}/config/$config.php" => config_path("getcandy-api/$config.php"),
            ]);
        });

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/getcandy-api'),
        ]);
    }

}
