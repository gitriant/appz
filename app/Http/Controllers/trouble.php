<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\m_ticket;
use App\Models\m_feedback;
use App\Models\m_resolution;
use App\Models\m_kerusakan;
use App\Models\m_ruangan;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class trouble extends Controller
{
    public function index(Request $request)
    {
        $ip_komp = DB::table('komputer')
            ->where('ip', $request->ip())
            ->first();

        if (!$ip_komp) {
            return abort(404);
        }
        $kerusakan = m_kerusakan::all();
        $ip = $request->ip();
        $recent = DB::table('komputer')
            ->join('ticket', 'komputer.id_komp', '=', 'ticket.id_komputer')
            ->where([
                ['ip', '=', $ip],
                ['status', '!=', 'close'],
            ])
            ->first();
        if (isset($recent->ip) == $request->ip()) {
            return view('v_trouble', [
                'kerusakan' => $kerusakan,
                'ticket' => '#' . $recent->id_ticket,
            ]);
        } else {
            return view('v_trouble', [
                'kerusakan' => $kerusakan,
                'ticket' => '',
            ]);
        }
    }

    public function create_ticket(Request $request)
    {
        $problem = str_replace('+', ' ', $request->problem);

        $ip = gethostname();

        $date = new \DateTime('now');
        $digits = 4;
        $ticket = $date->format('ymd') . "-" . rand(pow(10, $digits - 1), pow(10, $digits) - 1);

        $get = DB::table('komputer')
            ->where('ip', $request->ip())
            ->first();

        $get_k = DB::table('kerusakan')
            ->where('jenis_kerusakan', $problem)
            ->first();

        $save = new m_resolution();
        $save->id_kerusakan = $get_k->id_kerusakan;
        $save->save();

        $sape = new m_feedback();
        $sape->feedback = "-";
        $sape->save();

        $post = new m_ticket();
        $post->id_ticket = $ticket;
        $post->id_komputer = $get->id_komp;
        $post->problem = $problem;
        $post->id_resolution = $save->id_resolution;
        $post->id_feedback = $sape->id_feedback;
        $post->status = "open";
        $post->save();

        $response = Http::post('https://laporanbotonline.gifevetclinic.com/sendmassmessage', [
            'text' => 'http://calit.binus.local/progres/' . $ticket,
            'type' => 'kirimlaporan',
            'passcode' => 'ANJINGGILACODING'
        ]);

        $data = [$ticket, $request->ip(), $post->created_at, $get];
        return response()->json($data);
    }

    public function status_ticket(Request $request)
    {
        //if ($request->id_ticket) {
        $tiket = str_replace("#", "", $request->id_ticket);
        // } else {
        //     $tiket = str_replace("#", "", $ticket);
        // }

        $get = DB::table('ticket')
            ->join('it', 'ticket.id_it', '=', 'it.id_it')
            ->select('it.nama', 'ticket.status', 'ticket.created_at')
            ->where('id_ticket', $tiket)
            ->first();

        $get_sta = DB::table('ticket')
            ->where('id_ticket', $tiket)
            ->first();

        if ($get_sta->timer == null) {
            if (!$request->timer) {
                $str_time = $request->timer;

                sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

                $time_seconds = isset($hours) ? $hours * 3600 + $minutes * 60 + $seconds : $minutes * 60 + $seconds;
            } else {
                $datetime = date("Y-m-d H:i:s");
                $time_seconds = strtotime($get_sta->updated_at) - strtotime($get_sta->created_at);
                //$time_seconds = date("H:i:s", $time_second);
            }


            if ($get_sta->status == "close") {
                $save = m_ticket::findOrFail($tiket);
                $save->timer = $time_seconds;
                $save->save();
            }
        }

        if (!$get) {
            $data = ['status' => 'open', $get_sta];
        } else {
            $data = $get;
        }
        return response()->json($data);
    }

    public function close_ticket(Request $request)
    {
        $tiket = str_replace("#", "", $request->id_ticket);
        $feedback = str_replace("+", " ", $request->feedback);
        $get = DB::table('ticket')
            ->where('id_ticket', $tiket)
            ->first();

        $save = m_feedback::findOrFail($get->id_feedback);
        $save->feedback = $feedback;
        $save->stars = $request->stars;
        $save->save();

        //$this->status_ticket(Request $request);
        return response()->json($get);
    }

    public function it_progress($ticket, $it)
    {
        $ticket_data = DB::table('ticket')
            ->join('komputer', 'ticket.id_komputer',  '=', 'komputer.id_komp')
            ->join('ruangan', 'komputer.id_ruangan',  '=', 'ruangan.id_ruangan')
            ->where('id_ticket', $ticket)
            ->first();

        $ticket_dataa = DB::table('ticket')
            ->where('id_ticket', $ticket)
            ->first();



        if ($ticket_dataa->id_it == $it || $ticket_dataa->id_it == null || $ticket_dataa->id_it == 1) {
            $save = m_ticket::findOrFail($ticket);
            $save->id_it = $it;
            $save->status = "onprogres";
            $save->save();



            $ticket_dataaa = DB::table('it')
                ->where('id_it', $save->id_it)
                ->first();

            $response = Http::post('https://laporanbotonline.gifevetclinic.com/sendmassmessage', [
                'text' => 'Ticket dengan nomer #' . $ticket . ', sedang dikerjakan oleh ' . $ticket_dataaa->nama,
                'type' => 'close',
                'passcode' => 'ANJINGGILACODING'
            ]);

            return view('v_itprogress', [
                'ticket' => $ticket_data,
            ]);
        } else {
            $ticket_dataaaa = DB::table('it')
                ->where('id_it', $ticket_dataa->id_it)
                ->first();

            return view('v_itprogres', [
                'ticket' => $ticket_data,
            ])->with('alert', 'Ticket dengan nomer #' . $ticket . ', sedang dikerjakan oleh ' . $ticket_dataaaa->nama);
        }
    }

    public function solu_ticket(Request $request)
    {
        $ticket_data = DB::table('ticket')
            ->where('id_ticket', $request->id_ticket)
            ->first();

        $post = m_resolution::findOrFail($ticket_data->id_resolution);
        $post->resolution = $request->resolution;
        $post->save();

        // $response = Http::post('https://laporanbotonline.gifevetclinic.com/sendmassmessage', [
        //     'text' => 'Ticket dengan nomer #' . $request->id_ticket . ' telah selesai dikerjakan',
        //     'type' => 'close',
        //     'passcode' => 'ANJINGGILACODING'
        // ]);

        return response()->json($post);
    }

    public function ustatus_ticket(Request $request)
    {
        $save = m_ticket::findOrFail($request->id_ticket);
        $save->status = $request->status;
        $save->save();

        return response()->json($save);
    }
}
