<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    public function index(Request $request){
        $dataJurusan = Jurusan::when($request->search, function($query) use($request){
            $query->where('nama_jurusan', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_fakultas', 'LIKE', '%'.$request->search.'%');
        })->join('fakultas', 'fakultas.id_fakultas', '=', 'jurusan.id_fakultas')
            ->orderBy('id_jurusan', 'asc')->paginate(3);
        return view('admin.jurusan.jurusan', compact('dataJurusan'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(){
        $dataFakultas = Fakultas::all()->sortBy('nama_fakultas');
        return view('admin.jurusan.createJurusan', compact('dataFakultas'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'id_fakultas' => 'required',
            'nama_jurusan' => 'required'
        ]);

        Jurusan::create([
            'id_fakultas' => $request->id_fakultas,
            'nama_jurusan' => $request->nama_jurusan
        ]);

        return redirect('/jurusan');
    }

    public function delete($id_jurusan){
        $delete = Jurusan::find($id_jurusan);
        $delete->delete();

        return redirect('/jurusan');
    }

    public function update($id_jurusan){
        $dataJurusan = Jurusan::all()->where('id_jurusan', '=', $id_jurusan)
                                    ->first();
        $dataFakultas = Fakultas::all()->sortBy('nama_fakultas');
        return view('admin.jurusan.updateJurusan', compact('dataJurusan', 'dataFakultas'));
    }

    public function updateStore($id_jurusan, Request $request){
        $this->validate($request, [
            'id_jurusan' => 'required',
            'nama_jurusan' => 'required'
        ]);

        $table = Jurusan::find($id_jurusan);

        $id_jurusan = $request['id_jurusan'];
        $update = Jurusan::where('id_jurusan', $id_jurusan)->first();
        $update->id_fakultas = $request['id_fakultas'];
        $update->nama_jurusan = $request['nama_jurusan'];
        $update->update();

        return redirect('/jurusan');
    }

}
