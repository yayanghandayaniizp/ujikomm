<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    //
     protected $fillable = ['nama','tlp','ktp','alamat'];

     public function Transaksi(){

	return $this->hasMany('App\Transaksi');
}
}
