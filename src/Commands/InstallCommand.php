<?php

namespace ArtisanBuild\Bench\Commands;

use ArtisanBuild\Support\CurrentEnvironment\EnsureIgnored;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

use function Laravel\Prompts\text;

class InstallCommand extends Command
{
    public $signature = 'bench:install';

    public $description = 'Set up your package building workbench';

    public function handle(): int
    {
        $bench = text(
            label: 'What directory would you like to use for your workbench',
            placeholder: 'packages',
            default: 'packages',
            required: true,
            validate: fn (string $value) => match (true) {
                strlen($value) < 3 => 'The name must be at least 3 characters.',
                strlen($value) > 255 => 'The name must not exceed 255 characters.',
                default => null
            },
            hint: 'This folder will be created in your project root if it does not exist and added to .gitignore'
        );

        File::ensureDirectoryExists(base_path($bench));

        app(EnsureIgnored::class)('/'.trim($bench, '/'));

        return self::SUCCESS;
    }
}
