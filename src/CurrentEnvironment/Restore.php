<?php

namespace ArtisanBuild\Support\CurrentEnvironment;

use Exception;
use Illuminate\Support\Facades\File;

class Restore
{
    public function __invoke(string $path)
    {
        $backupPath = app(CalculateBackupPath::class)($path);

        if (File::isDirectory($path)) {
            File::copyDirectory($backupPath, $path);
            File::deleteDirectory($backupPath);

            return;
        }

        if (File::isFile($path)) {
            File::copy($backupPath, $path);
            File::delete($backupPath);

            return;
        }

        throw new Exception("No file or directory found at {$backupPath}");
    }
}
