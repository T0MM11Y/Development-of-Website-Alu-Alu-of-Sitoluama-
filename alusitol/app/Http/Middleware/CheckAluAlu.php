<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\alualu;

class CheckAluAlu
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
        $user = auth()->user();
        $lastUsage = alualu::where('user_id', $user->id)->value('last_usage');

        if ($lastUsage && Carbon::parse($lastUsage)->addDay()->isFuture()) {
            return redirect()->back()->with('error', 'Anda hanya dapat membuat alu alu sekali sehari.');
        }

        return $next($request);
    }
}
