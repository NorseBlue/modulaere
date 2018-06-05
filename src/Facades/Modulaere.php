<?php

namespace NorseBlue\Modulaere\Facades;

use Illuminate\Support\Facades\Facade;

class Modulaere extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'modulaere';
    }
}
