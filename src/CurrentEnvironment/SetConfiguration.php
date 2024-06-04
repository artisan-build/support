<?php

namespace ArtisanBuild\Support\CurrentEnvironment;

use ArtisanBuild\Support\ConfigurationKeys;

class SetConfiguration
{
    public function __invoke(ConfigurationKeys $key, ?string $value): void
    {
        $value ??= '';

        $configuration = app(GetConfiguration::class);

        data_set($configuration, $key->name, $value);

        file_put_contents(base_path('.artisan-build/config.json'), json_encode($configuration, JSON_PRETTY_PRINT));

    }
}
