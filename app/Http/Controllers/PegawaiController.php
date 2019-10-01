<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(){
        // mengambil data dari table pegawai
        $pegawai = DB::table('pegawai')->paginate(10);
        
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

    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $pegawai = DB::table('pegawai')->where('id',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('edit',['pegawai' => $pegawai]);
    }

    public function update(Request $request)
    {
        // update data pegawai
        DB::table('pegawai')->where('id',$request->id)->update([
            'nama'      => $request->nama,
            'jabatan'   => $request->jabatan,
            'umur'      => $request->umur,
            'alamat'    => $request->alamat
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');
    }

    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('pegawai')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');
    }
}
