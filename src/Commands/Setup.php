<?php

namespace Dagar\Warehouse\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Support\Facades\Artisan;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class Setup extends Command
{
    use ConfirmableTrait;

    protected $signature = 'house:setup';

    protected $description = 'Set alias for artisan and other commands.';

    public function handle()
    {

        $cmd = <<<TEXT
        echo php ./artisan >> C:\Windows\System32\artisan.bat
        echo php ./artisan house >> C:\Windows\System32\house.bat
        TEXT;

        $bash = 
        <<<TEXT
        echo "\nalias artisan='php ./artisan'\n" >> ~/.bashrc 
        TEXT;

        $this->info("Operating System : ".PHP_OS);
        
        $prefAsliaLinuxs = $bash;

        if((PHP_OS == 'WINNT')) {

            $resp = shell_exec($cmd);
            if(strpos($resp, 'denied.') == -1){
                $this->info("Alias set for Command 'artisan' Enjoy!!!");
            } else {
                $this->error($resp);
                $this->error("Please Run This Command as Admin to add aliases.");
            }

        } else {

            shell_exec($bash);

        }

        return Command::SUCCESS;

    }

}
