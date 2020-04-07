<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Boolean;

class User extends Authenticatable

    implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone','password',
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


    public function hasRole($role) {
        return User::where('role,$role')->get();
    }

    public function role() {
        return $this->belongsToMany(Role::class);
    }

     public function hasAccess(array $permissions) : bool
     {
       foreach ($this->role as $roles){
         if($roles->hasAccess($permissions)){
             return true;
          }
      }
      return false;
     }

    public function entry() {
        return $this->belongsTo(entry::class);
    }
}
