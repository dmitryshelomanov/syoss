<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class DateHelper extends Facade
{
    protected static function getFacadeAccessor() { return 'dateservice'; }
}