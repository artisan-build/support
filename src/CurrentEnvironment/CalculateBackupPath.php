<?php

namespace ArtisanBuild\Support\CurrentEnvironment;

class CalculateBackupPath
{
    public function __invoke(string $path): string
    {
        return implode(DIRECTORY_SEPARATOR, [
            base_path('.artisan-build'),
            'backups',
            trim($path, DIRECTORY_SEPARATOR),
        ]);
    }
}
