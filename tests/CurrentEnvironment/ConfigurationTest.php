<?php

use ArtisanBuild\Support\ConfigurationKeys;
use ArtisanBuild\Support\CurrentEnvironment\GetConfiguration;
use ArtisanBuild\Support\CurrentEnvironment\SetConfiguration;
use Illuminate\Support\Facades\File;

beforeEach(function () {
    if (File::exists(base_path('.artisan-build/config.json'))) {
        file_put_contents(base_path('.artisan-build/config.json'), '');
    }
});

it('gets an empty array', function () {
    expect(app(GetConfiguration::class)())->toBe([]);
});

it('sets a configuration variable', function () {
    app(SetConfiguration::class)(ConfigurationKeys::BenchPath, 'packages');

    expect(app(GetConfiguration::class)(ConfigurationKeys::BenchPath))->toBe('packages');
});
