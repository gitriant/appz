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
        $ticket_open = m_ticket::where('status', 'open')->count();
        $ticket_onprogres = m_ticket::where('status', 'onprogres')->count();
        $ticket_close = m_ticket::where('status', 'close')->count();

        return view('v_dashboard', [
            'ticket_open' => $ticket_open,
            'ticket_onprogres' => $ticket_onprogres,
            'ticket_close' => $ticket_close,
        ]);
    }
}
