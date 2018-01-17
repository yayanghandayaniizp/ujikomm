<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    //
     protected $fillable = [
        'nama','jabatan'];

        public function Transaksi(){

	return $this->hasMany('App\Transaksi');
}
}
