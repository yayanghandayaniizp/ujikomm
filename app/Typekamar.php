<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typekamar extends Model
{
    //
     protected $fillable = ['namatipe','harga'];
    //


public function Kamar(){

	return $this->belongsTo('App\Kamar');
}
}
