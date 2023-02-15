<?php

use Illuminate\Support\Facades\Route;
use Murdercode\LaravelAdminBar\LaravelAdminBar;

it('can test', function () {
    expect(true)->toBeTrue();
});

it('can get post edit link', function () {
    $link = 'http://localhost:8000/posts/1';

    // TODO: simulate the route

    $expectedLink = 'http://localhost:8000/nova/resources/posts/1';
    $linkGenerated = LaravelAdminBar::getPostEditLink();
    $this->assertEquals($expectedLink, $linkGenerated);
});
