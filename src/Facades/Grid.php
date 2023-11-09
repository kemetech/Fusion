<?php

namespace Fusion\Facades;

use Illuminate\Support\Facades\Facade;

class Grid extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'grid';
    }
}