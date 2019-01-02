<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
     protected $table = 'ingredients';

    public $primaryKey = 'id';

    public function recipes(){
    	return $this->hasMany('App\Recipes');
    }
}
