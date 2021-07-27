<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NoPageZero
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Log::info('==================================');

        if ($request->input('page') <= 0) {
            $request->attributes->add(['page' => '5']);
        }

        Log::info($request->input('page'));

        $response = $next($request);

        Log::info($request->page);


        //dump ($response);

        return $response;
    }
}
