<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_inventaris;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class inventaris extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('id_it')) {
            return redirect('/login')->with('alert', 'Silahkan Login Terlebih Dahulu!');
        };
        $judul = "Data Jenis Inventaris";
        return view('v_jenis_inventaris', compact('judul'));
    }
    public function json_jenis_inventaris()
    {
        $data = DB::table('jenis_inventaris')
            ->get();

        return Datatables::of($data)
            ->addColumn('aksi', function ($data) {
                return
                    '<button id="edit" data-id="' . $data->id_jenis_barang . '" class="btn btn-primary">Edit</button>
                    <button id="delete" data-id="' . $data->id_jenis_barang . '" class="btn btn-danger">Delete</button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function store_jenis_inventaris(Request $request)
    {
        $post = new m_inventaris();
        $post->kode_barang = $request->kode_barang;
        $post->jenis_barang = $request->jenis_barang;
        $post->save();

        $data = [$post];
        return response()->json($data);
    }
    public function edit_jenis_inventaris(Request $request)
    {
        $get = DB::table('jenis_inventaris')
            ->where('id_jenis_barang', $request->id)
            ->first();
        //->first() = hanya menampilkan satu saja dari hasil query
        //->get() = returnnya berbentuk array atau harus banyak data
        return response()->json($get);
    }

    public function update_jenis_inventaris(Request $request, $id)
    {

        $post = m_inventaris::findOrFail($id);
        $post->kode_barang = $request->kode_barang;
        $post->jenis_barang = $request->jenis_barang;
        $post->save();

        $data = [$post];
        return response()->json($data);
    }
    public function destroy($id)
    {
        $post = m_inventaris::findOrFail($id);
        $post->delete();

        return response()->json($post);
    }
}
