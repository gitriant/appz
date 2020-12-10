<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\models\m_it;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class it extends Controller
{
    public function index()
    {
        $judul = "Data IT";
        return view('v_it', compact('judul'));
    }
    public function json()
    {
        $data = DB::table('it')
            ->get();

        return Datatables::of($data)
            ->addColumn('aksi', function ($data) {
                return
                    '<button id="edit" data-id="' . $data->id_it . '" class="btn btn-primary">Edit</button>
                    <button id="delete" data-id="' . $data->id_it . '" class="btn btn-danger">Delete</button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $post = new m_it();
        $post->nama = $request->nama;
        $post->email = $request->email;
        $post->password = bcrypt($request->password);
        $post->username = $request->username;
        $post->level = $request->level;
        $post->save();

        $data = [$post];
        return response()->json($data);
    }
    public function edit(Request $request)
    {
        $get = DB::table('it')
            ->where('id_it', $request->id)
            ->first();
        //->first() = hanya menampilkan satu saja dari hasil query
        //->get() = returnnya berbentuk array atau harus banyak data
        return response()->json($get);
    }

    public function update(Request $request, $id)
    {

        $post = m_it::findOrFail($id);
        $post->nama = $request->nama;
        $post->email = $request->email;
        $post->password = bcrypt($request->password);
        $post->username = $request->username;
        $post->level = $request->level;
        $post->save();

        $data = [$post];
        return response()->json($data);
    }
    public function destroy($id)
    {
        $post = m_it::findOrFail($id);
        $post->delete();

        return response()->json($post);
    }
}
