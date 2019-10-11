<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotifController extends Controller
{
    public function index()
    {
        return view('notifikasi');
    }

    public function sukses()
    {
        Session::flash('sukses', 'ini notifikasi SUKSES');
        return redirect('pesan');
    }

    public function peringatan()
    {
        Session::flash('peringatan', 'ini notifikasi PERINGATAN');
        return redirect('pesan');
    }

    public function gagal()
    {
        Session::flash('gagal', 'ini notifikasi GAGAL');
        return redirect('pesan');
    }
}
