<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Response;

class RemoveMask
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isJson()) {
            $this->clean($request->json());
        } else {
            $this->clean($request->request);
        }

        return $next($request);
    }

    /**
     * Clean the request's data by removing mask from phonenumber.
     *
     * @param  \Symfony\Component\HttpFoundation\ParameterBag  $bag
     * @return void
     */
    private function clean(ParameterBag $bag): void
    {
        $bag->replace($this->cleanData($bag->all()));
    }

    /**
     * Check the parameters and clean the number
     *
     * @param  array  $data
     * @return array
     */
    private function cleanData(array $data)
    {
        return collect($data)->map(function ($value, $key) {
            switch ($key) {
                case 'phone':
                case 'zip_code':
                case 'nif':
                case 'username':
                    return removeMask($value);
                    break;

                default:
                    return $value;
                    break;
            }
        })->all();
    }
}
