<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    protected $table = 'recipes';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
