<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanitizeInput
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $sanitized = $this->sanitize($request->all());

        $request->merge($sanitized);

        return $next($request);
    }

    protected function sanitize(array $data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->sanitize($value);
            } elseif (is_string($value)) {
                // Trim and strip control characters and tags as a lightweight sanitation
                $value = trim($value);
                $value = preg_replace('/[\x00-\x1F\x7F]/u', '', $value);
                $value = strip_tags($value);
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
