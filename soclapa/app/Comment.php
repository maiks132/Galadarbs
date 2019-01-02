<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function recipes(){
    	return $this->belongsTo('App\Recipes');
    }
    public function posts(){
    	return $this->belongsTo('App\Post');
    }
}
