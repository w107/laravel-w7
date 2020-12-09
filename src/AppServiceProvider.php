<?php

namespace Inn20\LaravelWeiqin;

use Illuminate\Support\ServiceProvider;
use Inn20\LaravelWeiqin\W7\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('w7.config', Config::class);

        $this->initApp();
        $this->initDatabase();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    protected function initDatabase()
    {
        config([
            'database.connections.mysql.host' => w7_config('db.master.host'),
            'database.connections.mysql.port' => w7_config('db.master.port'),
            'database.connections.mysql.database' => w7_config('db.master.database'),
            'database.connections.mysql.username' => w7_config('db.master.username'),
            'database.connections.mysql.password' => w7_config('db.master.password'),
        ]);
    }

    protected function initApp()
    {
        $appKey = w7_config('db.master.password');
        $appKey = md5($appKey);
        $appKey = 'base64:'.base64_encode($appKey);
        config([
            'app.key' => $appKey,
        ]);
    }
}