<?php

namespace Spatie\Harvest\Commands;

use Illuminate\Console\Command;

class HarvestCommand extends Command
{
    public $signature = 'laravel-harvest-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
