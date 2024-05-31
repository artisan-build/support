<?php

namespace ArtisanBuild\Support\CurrentEnvironment;

class RequireGitHubCLI
{
    /**
     * @throws \Throwable
     */
    public function __invoke()
    {
        throw_if(! app(CommandExists::class)('gh'), 'In order to use this feature, you must have the GitHub CLI installed. See https://cli.github.com/');
    }
}
