<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;
use App\Imports\FakultasImport;
use Maatwebsite\Excel\Facades\Excel;

class FakultasController extends Controller
{
    public function index(Request $request){
        $dataFakultas = Fakultas::when($request->search, function($query) use($request){
            $query->where('nama_fakultas', 'LIKE', '%'.$request->search.'%');
        })->paginate(5);
        return view('admin.fakultas.fakultas', compact('dataFakultas'));
    }

    public function create(){
        return view('admin.fakultas.createFakultas');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_fakultas' => 'required'
        ]);

        Fakultas::create([
            'nama_fakultas' => $request->nama_fakultas
        ]);

        return redirect('/fakultas');
    }

    public function delete($id_fakultas){
        $delete = Fakultas::find($id_fakultas);
        $delete->delete();

        return redirect('/fakultas');
    }

    public function update($id_fakultas){
        $dataFakultas = Fakultas::all()->where('id_fakultas', '=', $id_fakultas)
                                    ->first();
        return view('admin.fakultas.updateFakultas', compact('dataFakultas'));
    }

    public function updateStore($id_fakultas, Request $request){
        $this->validate($request, [
            'nama_fakultas' => 'required'
        ]);

        $id_fakultas = $request['id_fakultas'];
        $update = Fakultas::where('id_fakultas', $id_fakultas)->first();
        $update->nama_fakultas = $request['nama_fakultas'];
        $update->update();

        return redirect('/fakultas');
    }
        public function import(Request $request){
        $this->validate($request, [
            'excel' => 'required'
        ]);

        $file = $request->file('excel');
        $filename = rand(100, 999)."-fakultas.".$file->getClientOriginalExtension();
        $file->move('excel', $filename);

        Excel::import(new FakultasImport, public_path('/excel/').$filename);

        return redirect('/fakultas');
    }
}
