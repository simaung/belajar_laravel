<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(){
        // mengambil data dari table pegawai
        $pegawai = DB::table('pegawai')->get();
        
        // mengirim data pegawai ke view index
    	return view('index',['pegawai' => $pegawai]);
    }

    public function tambah(){
        return view('tambah');
    }

    public function store(Request $request){
        // insert data ke table pegawai
        DB::table('pegawai')->insert([
            'nama'      => $request->nama,
            'jabatan'   => $request->jabatan,
            'umur'      => $request->umur,
            'alamat'    => $request->alamat
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');
    }
}
