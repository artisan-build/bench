<?php

namespace ArtisanBuild\Bench\Commands;

use ArtisanBuild\Support\CurrentEnvironment\InDirectory;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Process;


class TestCommand extends Command
{
    public $signature = 'bench:test {package?}';

    public $description = 'Run the test suite for a package or all packages if none specified';

    public function handle()
    {
        $packages = $this->argument('package') === null ?
            glob(config('bench.bench_directory') . '/*', GLOB_ONLYDIR)
            : Arr::wrap(implode('/', [config('bench.bench_directory'), $this->argument('package')]));


        foreach ($packages as $package) {
            if (!file_exists("{$package}/composer.json")) {
                continue;
            }

            $composer = json_decode(file_get_contents("{$package}/composer.json"), true);

            if (data_get($composer, 'scripts.test') === null) {
                continue;
            }

            app(InDirectory::class)($package, function() {
                Process::tty()->run('composer test');
            });
        }

        return self::SUCCESS;
    }
}
