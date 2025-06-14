<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientIdMiddleware
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
        // If client_id is provided in query, store it in session
        if ($request->has('client_id')) {
            session(['client_id' => $request->query('client_id')]);
        }
        // Get client_id from session or query parameter, fallback to default '1'
        $clientId = $request->query('client_id', session('client_id', '1'));
        // Store in session and merge into request
        session(['client_id' => $clientId]);
        $request->merge(['client_id' => $clientId]);
        
        return $next($request);
    }
} 