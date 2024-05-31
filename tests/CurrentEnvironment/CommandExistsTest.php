<?php

use ArtisanBuild\Support\CurrentEnvironment\CommandExists;

test('It finds a command that exists and returns true', function () {
    expect(app(CommandExists::class)('ls'))->toBeTrue();
});

test('It does not find a command that does not exist and returns false', function () {
    expect(app(CommandExists::class)('thereisnowayanyoneouldhavethiscommand'))->toBeFalse();
});
