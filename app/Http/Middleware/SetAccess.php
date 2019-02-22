<?php

namespace Carsdy\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Closure;

class SetAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cur_user_id = Auth::user()->id;
        $req_user_id = $request->id;
        $set_id = $request->set_id;

        $set_access = DB::table('card_sets')->where('user_id', $req_user_id)->where('id', $set_id)->value('access');
        if($set_access == 'private' && $cur_user_id != $req_user_id){
            return redirect('/home');
        }
        
        return $next($request);
    }
}
