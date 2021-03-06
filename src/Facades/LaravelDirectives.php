<?php

namespace CSSJockey\LaravelDirectives\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelDirectives extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-directives';
    }
}
