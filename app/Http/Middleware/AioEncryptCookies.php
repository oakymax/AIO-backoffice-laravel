<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies;

class AioEncryptCookies extends EncryptCookies
{

    protected $except = [
        'PHPSESSID'
    ];
}