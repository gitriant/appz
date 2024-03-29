<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\m_it;
use App\Models\m_suhu;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class it extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('id_it')) {
            return redirect('/login')->with('alert', 'Silahkan Login Terlebih Dahulu!');
        };
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


        $response = Http::post('https://laporanbotonline.gifevetclinic.com/insertdatauser', [
            'id' => $post->id_it,
            'email' => $request->email,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'passcode' => 'ANJINGGILACODING',
        ]);

        $data = [$post, $response];
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
        if ($request->password) {
            $post->password = bcrypt($request->password);
        }
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

    public function suhu_komp(Request $request)
    {
        $post = new m_suhu();
        $post->suhu = $request->suhu;
        $post->humid = $request->humid;
        $post->save();
    }

    public function get_suhu_komp()
    {
        $get = DB::table('suhu_komp')
            ->latest('created_at')
            ->first();
        //->first() = hanya menampilkan satu saja dari hasil query
        //->get() = returnnya berbentuk array atau harus banyak data
        return response()->json($get);
    }
}
