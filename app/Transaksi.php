<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
     protected $fillable = [
       'petugas_id','pengunjungs_id','kamars_id','cekin','totalharga'];



public function Typekamar(){

	return $this->belongsTo('App\Typekamar');
}

public function Kamar(){

	return $this->belongsTo('App\Kamar');
}

public function Petugas(){

	return $this->belongsTo('App\Petugas');
}
public function Transaksi(){

	return $this->belongsTo('App\Transaksi');
}

}
