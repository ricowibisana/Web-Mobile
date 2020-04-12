<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fakultas;

class Ruangan extends Model
{
    public $table = 'ruangan';
    protected $primaryKey = 'id_ruang';
    protected $fillable = ['nama_ruang', 'id_jurusan'];

    public function jurusan(){
    	return $this->belongsTo('App\Jurusan', 'id_jurusan');
    }
}