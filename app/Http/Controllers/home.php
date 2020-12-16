<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\models\m_ticket;

class home extends Controller
{
    public function index()
    {
        $judul = "Dashboard";
        $ticket = DB::table('ticket')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when status = 'open' then 1 end) as open")
            ->selectRaw("count(case when status = 'onprogres' then 1 end) as onprogres")
            ->selectRaw("count(case when status = 'close' then 1 end) as close")
            ->first();
        $ticket_open = DB::table('ticket')
            ->join('komputer', 'ticket.id_komputer', '=', 'komputer.id_komp')
            ->join('ruangan', 'komputer.id_ruangan', '=', 'ruangan.id_ruangan')
            ->where('status', 'open')
            ->get();

        $ticket_onprogres = DB::table('ticket')
            ->join('komputer', 'ticket.id_komputer', '=', 'komputer.id_komp')
            ->join('ruangan', 'komputer.id_ruangan', '=', 'ruangan.id_ruangan')
            ->where('status', 'onprogres')
            ->get();

        $ticket_close = DB::table('ticket')
            ->join('komputer', 'ticket.id_komputer', '=', 'komputer.id_komp')
            ->join('ruangan', 'komputer.id_ruangan', '=', 'ruangan.id_ruangan')
            ->where('status', 'close')
            ->take(10)
            ->get();

        return view('v_dashboard', [
            'ticket' => $ticket,
            'ticket_open' => $ticket_open,
            'ticket_onprogres' => $ticket_onprogres,
            'ticket_close' => $ticket_close,
            'judul' => $judul,
        ]);
    }
}
