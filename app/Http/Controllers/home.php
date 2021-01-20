<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\models\m_ticket;
use Carbon\CarbonInterval;


class home extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('id_it')) {
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

            $timer = DB::table('ticket')
                ->avg('timer');

            $rate = DB::table('feedback')
                ->avg('stars');

            $tot_ticket = DB::table("ticket")
                ->select("id_ticket", DB::raw("(COUNT(*)) as total_ticket"))
                ->orderBy('created_at')
                ->groupBy(DB::raw("MONTH(created_at)"))
                ->get();

            $ticket_avg = CarbonInterval::seconds($timer)->cascade()->format('%H:%I:%s');

            $tot_ticket = DB::table("ticket")
                ->select(DB::raw("DATE_FORMAT(created_at, '%m-%Y') f_date"), DB::raw("(COUNT(*)) as total_ticket"))
                ->orderBy('created_at')
                ->groupBy(DB::raw("MONTH(created_at)"))
                ->get();


            return view('v_dashboard', [
                'ticket' => $ticket,
                'ticket_open' => $ticket_open,
                'ticket_onprogres' => $ticket_onprogres,
                'ticket_close' => $ticket_close,
                'ticket_avg' => $ticket_avg,
                'judul' => $judul,
                'rate' => round($rate, 2),
            ]);
        } else {
            return redirect('/login')->with('alert', 'Silahkan Login Terlebih Dahulu!');
        }
    }

    public function tot_ticket()
    {
        $tot_ticket = DB::table("ticket")
            ->select(DB::raw("DATE_FORMAT(created_at, '%m-%Y') f_date"), DB::raw("(COUNT(*)) as total_ticket"))
            ->orderBy('created_at')
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->get();


        print_r($tot_ticket);
    }
}
