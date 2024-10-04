<?php

namespace ArtisanBuild\Bench\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class UnlinkPackages extends Command
{
    protected $signature = 'unlink-packages';

    protected $description = 'Unlink any linked packages';

    public function handle(): int
    {
        $json = File::json(bench_path('linked.json'));

        return self::SUCCESS;
    }

}
