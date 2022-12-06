<?php

namespace Murdercode\LaravelAdminBar\Commands;

use Illuminate\Console\Command;

class LaravelAdminBarCommand extends Command
{
    public $signature = 'laravel-admin-bar';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
