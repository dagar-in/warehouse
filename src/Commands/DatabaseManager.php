<?php

namespace Dagar\Warehouse\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Support\Facades\Artisan;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class DatabaseManager extends Command
{
    use ConfirmableTrait;

    protected $signature = 'house:dbm';

    protected $description = 'Execute a random command';

    public function handle()
    {
        $Admin = __DIR__.'/../Needs/Adminer.php';
        $this->info("Adminer now serving on http://localhost:9658/");
        shell_exec( "php -S 0.0.0.0:9658 $Admin"  );

        return Command::success;

    }

}
