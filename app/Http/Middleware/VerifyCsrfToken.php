<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'api_warga/create', // berfungsi unutk mematikan csfr verify
        'api_warga/edit', // berfungsi unutk mematikan csfr verify
        'api_warga/delete' // berfungsi unutk mematikan csfr verify
    ];
}
