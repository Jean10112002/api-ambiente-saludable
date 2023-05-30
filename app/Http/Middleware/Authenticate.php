<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Response;

class Authenticate extends Middleware
{

    public function handle($request, Closure $next, ...$guards){
        return response()->json(['error' => 'No estas autenticado.'], 401);
    }
}
