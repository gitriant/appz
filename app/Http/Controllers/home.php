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

        return view('v_dashboard', [
            'ticket' => $ticket,
            'judul' => $judul,
        ]);
    }
}
