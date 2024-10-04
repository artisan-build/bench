<?php

declare(strict_types=1);

namespace ArtisanBuild\Bench\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class FreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up the system for local development';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if (App::isProduction()) {
            $this->error('You cannot run this command in production');
            return self::FAILURE;
        }

        $path = config('database.connections.sqlite.database');
        if (File::missing($path)) {
            $this->warn('The database does not exist.');
            $this->line('Creating an empty database at ' . $path);
            File::put($path, '');
        }

        foreach (config('bench.fresh-actions') as $action) {
            app($action)();
        }

        return self::SUCCESS;
    }
}
