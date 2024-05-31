<?php

namespace ArtisanBuild\Support\CurrentEnvironment;

class InDirectory
{
    public function __invoke(string $directory, \Closure $do): void
    {
        $current = getcwd();
        chdir($directory);
        $do();
        chdir($current);
    }
}
