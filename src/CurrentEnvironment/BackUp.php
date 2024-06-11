<?php

namespace ArtisanBuild\Support\CurrentEnvironment;

use Exception;
use Illuminate\Support\Facades\File;

class BackUp
{
    public function __invoke(string $path)
    {
        $backupPath = app(CalculateBackupPath::class)($path);

        File::ensureDirectoryExists(dirname($backupPath));

        if (File::isDirectory($path)) {
            File::copyDirectory($path, $backupPath);

            return;
        }

        if (File::isFile($path)) {
            File::copy($path, $backupPath);

            return;
        }

        throw new Exception("No file or directory found at {$path}");
    }
}
