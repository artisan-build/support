<?php

use ArtisanBuild\Support\LocalEnvironment\CommandExists;

test('It finds a command that exists and returns true', function() {
    expect(app(CommandExists::class)('ls'))->toBeTrue();
});
