<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(Request $request){
        $dataBarang = Barang::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_ruang', 'LIKE', '%'.$request->search.'%');
        })->join('ruangan', 'ruangan.id_rua', '=', 'barang.id_ruang')
            ->orderBy('id_barang', 'asc')->paginate(3);
        return view('staff.barangStaff', compact('dataBarang'));
    }
}
