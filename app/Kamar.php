<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    //

    
	protected $fillable = [
        'status','types_id','namatipe'];
    //


public function Typekamar(){

	return $this->hasMany('App\Typekamar');
}
}
