<?php

namespace ArtisanBuild\Bench\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ArtisanBuild\Bench\Bench
 */
class Bench extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ArtisanBuild\Bench\Bench::class;
    }
}
