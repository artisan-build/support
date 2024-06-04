<?php

namespace ArtisanBuild\Support\CurrentEnvironment;

class WriteComposer
{
    public function __invoke(array $contents, ?string $directory = null, string $file = 'composer.json'): void
    {
        $directory ??= base_path();
        file_put_contents("{$directory}/{$file}", json_encode($contents, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}
