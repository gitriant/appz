<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\m_kerusakan;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class kerusakan extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('id_it')) {
            return redirect('/login')->with('alert', 'Silahkan Login Terlebih Dahulu!');
        };
        $judul = "Data Jenis Kerusakan";
        return view('v_kerusakan', compact('judul'));
    }
    public function json()
    {
        $data = DB::table('kerusakan')
            ->get();

        return Datatables::of($data)
            ->addColumn('aksi', function ($data) {
                return
                    '<button id="edit" data-id="' . $data->id_kerusakan . '" class="btn btn-primary">Edit</button>
                    <button id="delete" data-id="' . $data->id_kerusakan . '" class="btn btn-danger">Delete</button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $post = new m_kerusakan();
        $post->jenis_kerusakan = $request->jenis_kerusakan;
        $post->save();

        $data = [$post];
        return response()->json($data);
    }
    public function edit(Request $request)
    {
        $get = DB::table('kerusakan')
            ->where('id_kerusakan', $request->id)
            ->first();
        //->first() = hanya menampilkan satu saja dari hasil query
        //->get() = returnnya berbentuk array atau harus banyak data
        return response()->json($get);
    }

    public function update(Request $request, $id)
    {

        $post = m_kerusakan::findOrFail($id);
        $post->jenis_kerusakan = $request->jenis_kerusakan;
        $post->save();

        $data = [$post];
        return response()->json($data);
    }
    public function destroy($id)
    {
        $post = m_kerusakan::findOrFail($id);
        $post->delete();

        return response()->json($post);
    }
}
