<?php

class CommandExists
{
    public function __invoke(string $command): bool
    {
        $return = shell_exec(sprintf("which %s", escapeshellarg($command)));
        return !empty($return);
    }
}
