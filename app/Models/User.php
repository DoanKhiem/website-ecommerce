<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;
use function Symfony\Component\Translation\t;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'phone',
        'avatar',
        'sex',
        'birthday',
        'status',
    ];


    public function permissions(){
        return ['brand.index', 'admin.list-category', 'product.index', 'admin.dashboard' ];
    }

    public function hasPermission($route){
//        echo $route;
        $routes = $this->routes();

        return in_array($route, $routes) ? true : false;
    }
    //các route được gán cho người dùng
    public function routes(){
        $data = [];

        foreach ($this->getRoles as $role){
            $permission = json_decode($role->permissions);
            foreach ($permission as $per){
                if (!in_array($per, $data)){
                    array_push($data, $per);
                }
            }

        }
//        dd($data);
        return $data;
    }

    //kết nối table role and user
    public function getRoles(){
        return $this->belongsToMany(Role::class, 'user_roles','user_id','role_id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
