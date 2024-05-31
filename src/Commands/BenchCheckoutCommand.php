<?php

namespace ArtisanBuild\Bench\Commands;

use ArtisanBuild\Bench\Traits\WorksWithPackages;
use Illuminate\Console\Command;

use function Laravel\Prompts\suggest;

class BenchCheckoutCommand extends Command
{
    use WorksWithPackages;

    public $signature = 'bench:checkout {package?}';
    public $description = 'Check out a package from GitHub and put it on the workbench';

    public function handle(): int
    {
        $package = $this->argument('package')
            ?? suggest(
                label: 'What package would you like to check out?',
                options: $this->getPackages(),
                default: '',
                required: true,
                validate: fn() => true
            );
        return self::SUCCESS;
    }


}
