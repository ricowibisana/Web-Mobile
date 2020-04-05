<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fakultas;

class Jurusan extends Model
{
    public $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    protected $fillable = ['id_fakultas', 'nama_jurusan'];

    public function fakultas(){
    	return $this->belongsTo(Fakultas::class, 'id_fakultas');
    }
}
