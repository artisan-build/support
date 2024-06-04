<?php

use ArtisanBuild\Support\CurrentEnvironment\EnsureIgnored;

beforeEach(function () {
    $this->original = file_get_contents(__DIR__.'/.gitignore');
});

afterEach(function () {
    file_put_contents(__DIR__.'/.gitignore', $this->original);
});

it('adds an entry that does not exist', function () {
    expect($this->original)->not->toContain('nothere');

    app(EnsureIgnored::class)('nothere', __DIR__);

    $new = file_get_contents(__DIR__.'/.gitignore');

    expect($new)->toContain('nothere');
});

it('does not duplicate an entry that does exist', function () {
    app(EnsureIgnored::class)('here.txt', __DIR__);
    $new = file_get_contents(__DIR__.'/.gitignore');
    expect($new)->toBe($this->original);
});
