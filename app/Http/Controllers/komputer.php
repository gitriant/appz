<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\m_komputer;
use App\Models\m_spesifikasi;
use App\Models\m_ruangan;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class komputer extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('id_it')) {
            return redirect('/login')->with('alert', 'Silahkan Login Terlebih Dahulu!');
        };
        $judul = "Inventaris Komputer";
        $ruangan = DB::table('ruangan')
            ->get();
        return view('v_komputer', compact('judul'), [
            'ruangan' => $ruangan,
        ]);
    }
    public function json()
    {
        $data = DB::table('komputer')
            ->join('ruangan', 'komputer.id_ruangan', '=', 'ruangan.id_ruangan')
            ->get();

        return Datatables::of($data)
            ->addColumn('aksi', function ($data) {
                return
                    '<button id="edit" data-id="' . $data->id_komp . '" class="btn btn-primary">Edit</button>
                    <button id="delete" data-id="' . $data->id_komp . '" data-idspe="' . $data->id_spesifikasi . '" class="btn btn-danger">Delete</button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $save = new m_spesifikasi();
        $save->procesor = $request->procesor;
        $save->ram = $request->ram;
        $save->hardisk = $request->hardisk;
        $save->ssd = $request->ssd;
        $save->keyboard = $request->keyboard;
        $save->monitor = $request->monitor;
        $save->mouse = $request->mouse;
        $save->cpu = $request->cpu;
        $save->tahun = $request->tahun;
        $save->save();

        $post = new m_komputer();
        $post->nama_komp = $request->nama_komp;
        $post->ip = $request->ip;
        $post->mac = $request->mac;
        $post->user = $request->user;
        $post->email = $request->email;
        $post->id_ruangan = $request->id_ruangan;
        $post->id_spesifikasi = $save->id_spesifikasi;
        $post->keterangan = $request->keterangan;
        $post->status_komp = $request->status;
        $post->save();

        $data = [$save, $post];
        return response()->json($data);
    }
    public function edit(Request $request)
    {
        $get = DB::table('komputer')
            ->join('ruangan', 'komputer.id_ruangan', '=', 'ruangan.id_ruangan')
            ->join('spesifikasi', 'komputer.id_spesifikasi', '=', 'spesifikasi.id_spesifikasi')
            ->where('id_komp', $request->id)
            ->first();
        //->first() = hanya menampilkan satu saja dari hasil query
        //->get() = returnnya berbentuk array atau harus banyak data
        return response()->json($get);
    }

    public function update(Request $request, $id)
    {
        $save = m_spesifikasi::findOrFail($request->id_spesifikasi);
        $save->procesor = $request->procesor;
        $save->ram = $request->ram;
        $save->hardisk = $request->hardisk;
        $save->ssd = $request->ssd;
        $save->keyboard = $request->keyboard;
        $save->monitor = $request->monitor;
        $save->mouse = $request->mouse;
        $save->cpu = $request->cpu;
        $save->tahun = $request->tahun;
        $save->save();

        $post = m_komputer::findOrFail($id);
        $post->nama_komp = $request->nama_komp;
        $post->ip = $request->ip;
        $post->mac = $request->mac;
        $post->user = $request->user;
        $post->email = $request->email;
        $post->id_ruangan = $request->id_ruangan;
        $post->id_spesifikasi = $request->id_spesifikasi;
        $post->keterangan = $request->keterangan;
        $post->status_komp = $request->status;
        $post->save();

        $data = [$save, $post];
        return response()->json($data);
    }
    public function destroy($id, $idspe)
    {
        $post = m_komputer::findOrFail($id);
        $post->delete();
        $postt = m_spesifikasi::findOrFail($idspe);
        $postt->delete();
        $data = [$post, $postt];
        return response()->json($data);
    }
}
