<?php

namespace ArtisanBuild\Support\CurrentEnvironment;

use ArtisanBuild\Support\ConfigurationKeys;
use Illuminate\Support\Facades\File;

class SetConfiguration
{
    public function __invoke(ConfigurationKeys $key, ?string $value): void
    {
        $value ??= '';

        $configuration = app(GetConfiguration::class);

        data_set($configuration, $key->name, $value);

        File::ensureDirectoryExists(base_path('.artisan-build'));

        file_put_contents(base_path('.artisan-build/config.json'), json_encode($configuration, JSON_PRETTY_PRINT));

    }
}
