<?php namespace App\Http\Middleware;
use Closure;
use Auth;
class ClinicRole{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::user()->userRoles[0]->type==0 || Auth::user()->userRoles[0]->type==1 ) {
			return $next($request);
		} 
		return redirect('/error');

	}
}