<?php

namespace Dagar\Warehouse\Providers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

use Dagar\Warehouse\Commands\DatabaseManager;
use Dagar\Warehouse\Commands\Paint;
use Dagar\Warehouse\Commands\Setup;

class Warehouse extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                DatabaseManager::class,
                Paint::class,
                Setup::class,
            ]);
        }

        $this->app->booted(function () {


            $schedule = $this->app->make(Schedule::class);
            // $schedule->command('log clear')->dailyAt("{$hour}:{$minute}");
            
        });
    }
}
