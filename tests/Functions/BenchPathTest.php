<?php

use ArtisanBuild\Support\ConfigurationKeys;
use ArtisanBuild\Support\CurrentEnvironment\SetConfiguration;

it('returns the correct path', function () {
    app(SetConfiguration::class)(ConfigurationKeys::BenchPath, __DIR__);
    expect(bench_path())->toBe(__DIR__)
        ->and(bench_path('support'))->toBe(__DIR__.'/support')
        ->and(bench_path('support/src/SomeClass.php'))->toBe(__DIR__.'/support/src/SomeClass.php');
});
