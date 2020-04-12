<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Ruangan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    //ADMIN
    public function index(Request $request){
        $dataBarang = Barang::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_ruang', 'LIKE', '%'.$request->search.'%');
        })->join('ruangan', 'ruangan.id_ruang', '=', 'barang.id_ruang')
            ->orderBy('id_barang', 'asc')->paginate(5);
        return view('barang.barang', compact('dataBarang'));
    }

    public function create(){
        $dataRuangan = Ruangan::all()->sortBy('id_ruang');
        return view('barang.createBarang', compact('dataRuangan'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'id_ruang' => 'required',
            'nama_barang' => 'required',
            'total_barang' => 'required',
            'rusak_barang' => 'required',
            'created_by' => 'required',
            'updated_by' => 'required',
        ]);

        Barang::create([
            'id_ruang' => $request->id_ruang,
            'nama_barang' => $request->nama_barang,
            'total_barang' => $request->total_barang,
            'rusak_barang' => $request->rusak_barang,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
        ]);

        return redirect('/barang');
    }

    public function delete($id_barang){
        $delete = Barang::find($id_barang);
        $delete->delete();

        return redirect('/barang');
    }

    public function update($id_barang){
        $dataRuangan = Ruangan::all()->sortBy('id_ruang');
        $dataBarang = Barang::all()->where('id_barang', '=', $id_barang)
                                    ->first();
        return view('barang.updateBarang', compact('dataBarang', 'dataRuangan'));
    }

    public function updateStore($id_bar, Request $request){
        $this->validate($request, [
            'id_ruang' => 'required',
            'nama_barang' => 'required',
            'total_barang' => 'required',
            'rusak_barang' => 'required',
            'created_by' => 'required',
            'updated_by' => 'required',
        ]);

        $table = Barang::find($id_barang);
        $id_bar = $request['id_barang'];
        $update = Barang::where('id_barang', $id_bar)->first();
        $update->nama_barang = $request['nama_barang'];
        $update->total_barang = $request['total_barang'];
        $update->rusak_barang = $request['rusak_barang'];
        $update->created_by = $request['created_by'];
        $update->updated_by = $request['updated_by'];
        $update->update();

        return redirect('/barang');
    }

    //STAFF
    public function indexStaff(Request $request){
        $dataBarang = Barang::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_ruang', 'LIKE', '%'.$request->search.'%');
        })->join('ruangan', 'ruangan.id_ruang', '=', 'barang.id_ruang')
            ->orderBy('id_barang', 'asc')->paginate(5);
        return view('staff.barangStaff', compact('dataBarang'));
    }

    public function updateStaff($id_barang){
        $dataRuangan = Ruangan::all()->sortBy('id_ruang');
        $dataBarang = Barang::all()->where('id_barang', '=', $id_barang)
                                    ->first();
        return view('staff.updateBarangStaff', compact('dataBarang', 'dataRuangan'));
    }

    public function updateStoreStaff($id_barang, Request $request){
        $this->validate($request, [
            'id_ruang' => 'required',
            'nama_barang' => 'required',
            'total_barang' => 'required',
            'rusak_barang' => 'required',
            'created_by' => 'required',
            'updated_by' => 'required',
        ]);

        $table = Barang::find($id_barang);
        $id_barang = $request['id_barang'];
        $update = Barang::where('id_barang', $id_barang)->first();
        $update->nama_barang = $request['nama_barang'];
        $update->total_barang = $request['total_barang'];
        $update->rusak_barang = $request['rusak_barang'];
        $update->created_by = $request['created_by'];
        $update->updated_by = $request['updated_by'];
        $update->update();

        return redirect('/barangStaff');
    }
}
