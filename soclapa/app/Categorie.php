<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';

    public $primaryKey = 'id';

    public $timestamps = false;

    public function recipes(){
    	return $this->hasMany('App\Recipes');
    }
}