<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Role extends Model
{
    protected $casts = [
        "permissions"=>"array"
    ];

    public function user(){
        return $this -> belongsToMany(user::class);
    }

    public function hasAccess(array $permissions) : bool {

       foreach ($permissions as $permission){
           if($this->hasPermmission($permission))

            return true;;
      }

    return false;
     }


    private function hasPermmission(string $permission) : bool
    {
        return $this->permissions[$permission] ?? false;
    }

}
