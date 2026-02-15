<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Symfony\Component\HttpFoundation\Response;

class LogActivity
{
    /**
     * Log setiap request yang masuk (hanya untuk route yang penting)
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Hanya log jika user sudah login dan method bukan GET
        if (Auth::check() && ! $request->isMethod('GET')) {
            activity()
                ->causedBy(Auth::user())
                ->withProperties([
                    'ip'     => $request->ip(),
                    'method' => $request->method(),
                    'url'    => $request->fullUrl(),
                    'agent'  => $request->userAgent(),
                ])
                ->log($request->method() . ' ' . $request->path());
        }

        return $response;
    }
}
