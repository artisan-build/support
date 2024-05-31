<?php

namespace ArtisanBuild\Support\Configuration;

use Illuminate\Support\Facades\File;

class FromJson
{
    public function __invoke(string $filename)
    {
        File::ensureDirectoryExists(base_path('.artisan_build'));

        return File::exists(base_path(".artisan_build/{$filename}"))
            ? json_decode(File::get(base_path(".artisan_build/{$filename}")), true, JSON_THROW_ON_ERROR)
            : [];
    }

}
