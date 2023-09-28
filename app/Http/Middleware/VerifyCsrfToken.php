<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'login',
        'register',
        'plan/paytm/*',
        'plan-pay-with-paytm/*',
        'plan-pay-with-paymentwall/*',
        'paymentwall/*',
        'iyzipay/callback/*',
        'plan-paytab-success/',
        '/aamarpay*',
        'get_dyn_phycard',
        'get_dyn_phy',
        'card_request',
        '/login' //Added By Anupam to remove session expiration issue during login
    ];
}
