<?php

namespace ArtisanBuild\Bench;

use ArtisanBuild\Bench\Commands\BenchCheckoutCommand;
use ArtisanBuild\Bench\Commands\InstallCommand;
use ArtisanBuild\Bench\Commands\TestCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BenchServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('bench')
            ->hasConfigFile()
            ->hasCommand(BenchCheckoutCommand::class)
            ->hasCommand(InstallCommand::class)
            ->hasCommand(TestCommand::class);
    }
}
