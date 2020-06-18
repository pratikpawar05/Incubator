<?php

namespace App;

use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_logo', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin() {
        // dd("s");
        $role = Role::find($this->role_id);
        // dd($role);
        $user_role = $role->role;
        // dd($user_role);
        if ($user_role == "admin")
            return true;
        else
            return false;
    }

    public function isSuperAdmin() {
        $role = Role::find($this->role_id);
        if ($role->role == "superadmin")
            return true;
        else
            return false;
    }

    public function isGuest() {
        $role = Role::find($this->role_id);
        if ($role->role == "Guest")
            return true;
        else
            return false;
    }

    public function isAuthenticated($module, $operation) {
        $rp = DB::select("SELECT permission FROM role_permissions JOIN permissions ON permissions.id = role_permissions.permission_id WHERE permissions.module = ? AND role_permissions.role_id = ? AND role_permissions.permission LIKE '%" . $operation . "%'", [$module, $this->role_id]);
        if (!empty($rp))
            return true;
        return false;
    }

}
