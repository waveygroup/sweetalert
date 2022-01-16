<?php

namespace Wavey\Sweetalert;

use Illuminate\Support\Facades\Facade;

class Sweetalert extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'wavey.sweetalert';
    }
}
