<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class Localization
{
    /**
    * Handle an incoming request.
    * @param \Illuminate\Http\Request $request
    * @param \Closure $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        if(session()->has('locale') && session()->get('locale')!='en'){
            App::setLocale(session()->get('locale'));
            session()->put('localeDB', '_'.session()->get('locale'));
        }else{
            session()->put('localeDB', '');
        }
        return $next($request);
    }
}