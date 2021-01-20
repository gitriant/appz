<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\m_ruangan;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class ruangan extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('id_it')) {
            return redirect('/login')->with('alert', 'Silahkan Login Terlebih Dahulu!');
        };
        $judul = "Data Ruangan";
        return view('v_ruangan', compact('judul'));
    }
    public function json()
    {
        $data = DB::table('ruangan')
            ->get();

        return Datatables::of($data)
            ->addColumn('aksi', function ($data) {
                return
                    '<button id="edit" data-id="' . $data->id_ruangan . '" class="btn btn-primary">Edit</button>
                    <button id="delete" data-id="' . $data->id_ruangan . '" class="btn btn-danger">Delete</button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $post = new m_ruangan();
        $post->nama_ruangan = $request->nama_ruangan;
        $post->jenis_ruangan = $request->jenis_ruangan;
        $post->save();

        $data = [$post];
        return response()->json($data);
    }
    public function edit(Request $request)
    {
        $get = DB::table('ruangan')
            ->where('id_ruangan', $request->id)
            ->first();
        //->first() = hanya menampilkan satu saja dari hasil query
        //->get() = returnnya berbentuk array atau harus banyak data
        return response()->json($get);
    }

    public function update(Request $request, $id)
    {

        $post = m_ruangan::findOrFail($id);
        $post->nama_ruangan = $request->nama_ruangan;
        $post->jenis_ruangan = $request->jenis_ruangan;
        $post->save();

        $data = [$post];
        return response()->json($data);
    }
    public function destroy($id)
    {
        $post = m_ruangan::findOrFail($id);
        $post->delete();

        return response()->json($post);
    }
}
