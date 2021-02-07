<?php



namespace App\Http\Middleware;

use Closure;

class MemberMiddleware
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
        if(auth()->user()-> isMember()){

            return $next($request);

        }
        auth()->logout();
        $status = "<div class='alert alert-warning   show m-0 mt-2 mb-2 p-2' role='alert'>

                            You don't have member access

                            <button type='button' class='close pb-2' data-dismiss='alert' aria-label='Close'>

                                <span aria-hidden='true'>&times;</span>

                            </button>

                    </div>";

        return redirect('/sadmin-login')->with('status',$status);
        
 }
}
