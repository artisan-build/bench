<?php

declare(strict_types=1);

namespace ArtisanBuild\Bench;

use ArtisanBuild\Bench\Console\Commands\Commit;
use ArtisanBuild\Bench\Console\Commands\FreshCommand;
use ArtisanBuild\Bench\Console\Commands\FreshId;
use ArtisanBuild\Bench\Console\Commands\GenerateCodeCoverageHtml;
use ArtisanBuild\Bench\Console\Commands\RelinkPackages;
use ArtisanBuild\Bench\Console\Commands\RunOnceCommand;
use ArtisanBuild\Bench\Console\Commands\Snowflake;
use ArtisanBuild\Bench\Console\Commands\StartIssue;
use ArtisanBuild\Bench\Console\Commands\Ulid;
use ArtisanBuild\Bench\Console\Commands\UnlinkPackages;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BenchServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('bench')
            ->hasConfigFile()
            ->hasCommand(Commit::class)
            ->hasCommand(FreshCommand::class)
            ->hasCommand(FreshId::class)
            ->hasCommand(GenerateCodeCoverageHtml::class)
            ->hasCommand(RunOnceCommand::class)
            ->hasCommand(Snowflake::class)
            ->hasCommand(StartIssue::class)
            ->hasCommand(Ulid::class)
            ->hasCommand(UnlinkPackages::class)
            ->hasCommand(RelinkPackages::class);
    }
}
