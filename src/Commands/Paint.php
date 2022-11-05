<?php

namespace Dagar\Warehouse\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Support\Facades\Artisan;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class Paint extends Command
{
    use ConfirmableTrait;

    protected $signature = 'house:paint';

    protected $description = 'Run Pint for PSR 12.';

    public function handle()
    {

        $this->info("Useing Pint Version: LATEST");
        
        echo shell_exec('vendor\bin\pint --preset psr12');
                
        return Command::Success;

    }

}
