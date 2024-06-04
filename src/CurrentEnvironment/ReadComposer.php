<?php

namespace ArtisanBuild\Support\CurrentEnvironment;

class ReadComposer
{
    public function __invoke(?string $directory = null, string $file = 'composer.json'): array
    {
        $directory ??= base_path();

        return json_decode(file_get_contents("{$directory}/{$file}"), true, 512, JSON_THROW_ON_ERROR);
    }
}
