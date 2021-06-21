<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{
    public function index()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $get = DB::table('it')
            ->where('email', $request->input('email') . '@binus.edu')
            ->first();

        $data = [
            'email'     => $request->input('email') . '@binus.edu',
            'password'  => $request->input('password'),
            'id_it'  => $get->id_it,
        ];

        Auth::attempt($data);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            $request->session()->put($data);
            return redirect()->action([home::class, 'index']);
        } else {
            return redirect('/login')->with('alert', 'Email atau Password anda salah!');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // menghapus session yang aktif
        $request->session()->flush();
        return redirect('/login');
    }

    function submitLogin(Request $request)
    {
        $login = DB::table('it')
            ->where('email', $request->email . '@binus.edu')
            //->where('password', bcrypt($request->password))
            ->first();

        //Dengan metode Json Array
        if (Hash::check($request->password, $login->password)) {
            $response["error"] = FALSE;
            $response["success"] = "1";
            $response["message"] = "Data Ditemukan";
            $response["logindata"] = array(
                'id_register' => $login->id_it,
                'nama_user' => $login->nama,
                'email' => $login->email,
                'username' => $login->username,
                'level' => $login->level
            );
            return response()->json($response);
        } else {
            $response["error"] = TRUE;
            $response["success"] = "0";
            $response["message"] = "Data Kosong";
            $response["logindata"] = array();
            return response()->json($response);
        }
    }
}
