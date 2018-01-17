<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    //

    
	protected $fillable = [
        'status','types_id'];
    //


public function Typekamar(){

	return $this->hasMany('App\Typekamar');
}
}
