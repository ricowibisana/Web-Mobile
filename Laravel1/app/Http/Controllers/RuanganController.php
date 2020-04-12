<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index(Request $request){
        $dataRuangan = Ruangan::when($request->search, function($query) use($request){
            $query->where('nama_ruang', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_jurusan', 'LIKE', '%'.$request->search.'%');
        })->join('jurusan', 'jurusan.id_jurusan', '=', 'ruangan.id_jurusan')
            ->orderBy('id_ruang', 'asc')->paginate(5);
        return view('admin.ruangan.ruangan', compact('dataRuangan'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(){
        $dataJurusan = Jurusan::all()->sortBy('id_jurusan');
        return view('admin.ruangan.createRuangan', compact('dataJurusan'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'id_jurusan' => 'required',
            'nama_ruang' => 'required'
        ]);

        Ruangan::create([
            'id_jurusan' => $request->id_jurusan,
            'nama_ruang' => $request->nama_ruang
        ]);

        return redirect('/ruangan');
    }

    public function delete($id_ruang){
        $delete = Ruangan::find($id_ruang);
        $delete->delete();

        return redirect('/ruangan   ');
    }

    public function update($id_ruang){
        $dataRuangan = Ruangan::all()->where('id_ruang', '=', $id_ruang)
                        ->first();
        $dataJurusan = Jurusan::all()->sortBy('id_jurusan');
        return view('admin.ruangan.updateRuangan', compact('dataRuangan', 'dataJurusan'));
    }

    public function updateStore($id_ruang, Request $request){
        $this->validate($request, [
            'id_ruang' => 'required',
            'nama_ruang' => 'required'
        ]);

        $table = Jurusan::find($id_ruang);

        $id_ruang = $request['id_ruang'];
        $update = Ruangan::where('id_ruang', $id_ruang)->first();
        $update->id_jurusan = $request['id_jurusan'];
        $update->nama_ruang = $request['nama_ruang'];
        $update->update();

        return redirect('/ruangan');
    }
}
