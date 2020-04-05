<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    public function index(Request $request){
        $dataFakultas = Fakultas::all();
        $dataJurusan = Jurusan::paginate(5);
        return view('admin.jurusan.jurusan', compact('dataJurusan', 'dataFakultas'));
    }

    public function create(){
        $dataFakultas = Fakultas::all();
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
        $dataFakultas = Fakultas::all();
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

    public function search(Request $request){
        $dataFakultas = Fakultas::all();
        $search = $request->search_jurusan;
        $searchFakultas = DB::table('fakultas')
                            ->select('id_fakultas')
                            ->where('nama_fakultas', 'LIKE', '%'.$search.'%')
                            ->first();

        if(is_object($searchFakultas)){
            $src = get_object_vars($searchFakultas);
            $dataJurusan = DB::table('jurusan')
                            ->where('id_fakultas', '=', $src)
                            ->paginate(5);

            return view('admin.jurusan.jurusan', compact('dataJurusan', 'dataFakultas'));
        } else{
            $dataJurusan = DB::table('jurusan')
                            ->where('id_fakultas', '=', null)
                            ->paginate(5);
            return view('admin.jurusan.jurusan', compact('dataJurusan', 'dataFakultas'));
        }

    }
}
