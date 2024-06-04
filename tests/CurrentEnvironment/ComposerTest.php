<?php

use ArtisanBuild\Support\CurrentEnvironment\ReadComposer;
use ArtisanBuild\Support\CurrentEnvironment\WriteComposer;

beforeEach(function () {
    $this->composer = file_get_contents(__DIR__.'/testcomposer.json');
});

afterEach(function () {
    file_put_contents(__DIR__.'/testcomposer.json', $this->composer);
});

it('reads a composer file', function () {
    $composer = app(ReadComposer::class)(__DIR__, 'testcomposer.json');
    expect(data_get($composer, 'name'))->toBe('artisan-build/support');
});

it('writes to a composer file', function () {
    // Get the original contents
    $composer = app(ReadComposer::class)(__DIR__, 'testcomposer.json');
    // Change a value and write it back
    data_set($composer, 'name', 'artisan-build/tested');
    expect(data_get($composer, 'name'))->toBe('artisan-build/tested');
    app(WriteComposer::class)($composer, __DIR__, 'testcomposer.json');
    // Get the current contents and assert that they have the correct new value
    $new = app(ReadComposer::class)(__DIR__, 'testcomposer.json');
    expect(data_get($new, 'name'))->toBe('artisan-build/tested');
});
