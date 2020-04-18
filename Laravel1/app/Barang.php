<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['id_ruang', 'nama_barang', 'total_barang', 'rusak_barang', 'created_by', 'updated_by'];

    public function ruangan(){
    	return $this->belongsTo('App\Ruangan', 'id_ruang');
    }
    public function user_c(){
    	return $this->belongsTo('App\User', 'created_by', 'id');
    }
    public function user_u(){
    	return $this->belongsTo('App\User', 'updated_by', 'id');
    }
}
