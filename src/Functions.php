<?php

use ArtisanBuild\Support\ConfigurationKeys;
use ArtisanBuild\Support\CurrentEnvironment\GetConfiguration;

if (! function_exists('bench_path')) {
    function bench_path(string $path = ''): string
    {
        return rtrim(implode(DIRECTORY_SEPARATOR, [
            app(GetConfiguration::class)(ConfigurationKeys::BenchPath),
            ltrim($path, DIRECTORY_SEPARATOR)]), DIRECTORY_SEPARATOR);
    }
}
