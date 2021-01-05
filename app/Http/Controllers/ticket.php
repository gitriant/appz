<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\models\m_ticket;
use App\models\m_feedback;
use App\models\m_resolution;
use Illuminate\Foundation\Console\Presets\React;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ticket extends Controller
{
    public function index()
    {
        $judul  = "Ticket";
        return view('v_ticket', [
            'judul' => $judul,
        ]);
    }

    public function json_ticket($stat, $M, $Y)
    {
        $data = DB::table('ticket')
            ->join('it', 'ticket.id_it', '=', 'it.id_it')
            ->join('resolution', 'ticket.id_resolution', '=', 'resolution.id_resolution')
            ->join('feedback', 'ticket.id_feedback', '=', 'feedback.id_feedback')
            ->join('komputer', 'ticket.id_komputer', '=', 'komputer.id_komp')
            ->where('id_ticket', 'like', substr($Y, -2) . $M + 1 . '%')
            ->get();
        if ($stat != "all") {
            $data = $data->where('status', $stat);
        }

        return Datatables::of($data)
            ->addColumn('aksi', function ($data) {
                return
                    '<button id="edit" data-id="' . $data->id_ticket . '" class="btn btn-primary">Edit</button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function notif_ticket($java)
    {
        $get = DB::table('ticket')
            ->join('komputer', 'ticket.id_komputer', '=', 'komputer.id_komp')
            ->join('ruangan', 'komputer.id_ruangan', '=', 'ruangan.id_ruangan')
            ->whereNull('notif')
            ->get();

        $ticket = array();
        foreach ($get as $data) {
            $ticket[] = $data->id_ticket;
        }

        //return response()->json($get);
    }

    public function edit(Request $request)
    {
        $get = DB::table('ticket')
            ->join('it', 'ticket.id_it', '=', 'it.id_it')
            ->join('resolution', 'ticket.id_resolution', '=', 'resolution.id_resolution')
            ->join('feedback', 'ticket.id_feedback', '=', 'feedback.id_feedback')
            ->join('komputer', 'ticket.id_komputer', '=', 'komputer.id_komp')
            ->where('id_ticket', $request->ids)
            ->first();

        return response()->json($get);
    }
}
