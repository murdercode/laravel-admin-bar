<?php

namespace Murdercode\LaravelAdminBar\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Murdercode\LaravelAdminBar\LaravelAdminBar
 */
class LaravelAdminBar extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Murdercode\LaravelAdminBar\LaravelAdminBar::class;
    }
}
