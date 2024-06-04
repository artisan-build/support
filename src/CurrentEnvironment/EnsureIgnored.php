<?php

namespace ArtisanBuild\Support\CurrentEnvironment;

class EnsureIgnored
{
    public function __invoke(string $fileOrFolder, ?string $path = null): void
    {
        $path ??= base_path();

        $ignore = "{$path}/.gitignore";

        if (file_exists($ignore)) {
            touch($ignore);
        }

        $ignored = collect(explode(PHP_EOL, file_get_contents($ignore)))
            ->map(fn ($line) => trim($line))
            ->filter(fn ($line) => ! blank($line));

        if ($ignored->filter(fn ($item) => $item === $fileOrFolder)->isEmpty()) {
            $ignored->push($fileOrFolder);
        }

        file_put_contents($ignore, $ignored->implode(PHP_EOL).PHP_EOL);
    }
}
