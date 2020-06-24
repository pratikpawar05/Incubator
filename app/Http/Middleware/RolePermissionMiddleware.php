<?php

namespace App\Http\Middleware;

use App\RolePermission;
use App\Permission;
use Exception;
use Closure;
use Auth;
use DB;

class RolePermissionMiddleware
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
        try {
            $data = explode(",", $request->identity);
            $rp = DB::select("SELECT permission FROM role_permissions JOIN permissions ON permissions.id = role_permissions.permission_id WHERE permissions.module = ? AND role_permissions.role_id = ? AND role_permissions.permission LIKE '%" . $data[1] . "%'", [$data[0], Auth::user()->role_id]);
            if (!empty($rp))
                    return $next($request);
            abort(401, "You are not authorized to see this page");
        }
        catch (Exception $e) {
            // abort(401, "You are not authorized to see this page");
            return redirect('/login');
        }
    }
}
