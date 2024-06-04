<?php

namespace ArtisanBuild\Support\CurrentEnvironment;

use ArtisanBuild\Support\ConfigurationKeys;
use Illuminate\Support\Facades\File;

use function base_path;

class GetConfiguration
{
    public function __invoke(?ConfigurationKeys $key = null): array|string|null
    {
        File::ensureDirectoryExists(base_path('.artisan-build'));

        touch(base_path('.artisan-build/config.json'));

        $config = json_decode(file_get_contents(base_path('.artisan-build/config.json')), true);

        if ($config === null && $key === null) {
            return [];
        }

        return $key === null ? $config : data_get($config, $key->name);
    }
}
