<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pegawai;
use PDF;

class PegawaiController extends Controller
{
    public function index(){
        // mengambil data dari table pegawai
        $pegawai = Pegawai::all();
        
        // mengirim data pegawai ke view index
    	return view('pegawai',['pegawai' => $pegawai]);
    }

    public function tambah(){
        return view('pegawai_tambah');
    }

    public function store(Request $request){

        $this->validate($request,[
    		'nama' => 'required',
    		'alamat' => 'required'
    	]);
 
        Pegawai::create([
    		'nama' => $request->nama,
    		'alamat' => $request->alamat
    	]);
 
    	return redirect('/pegawai');
    }

    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $pegawai = Pegawai::find($id);
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('pegawai_edit',['pegawai' => $pegawai]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
    		'nama' => 'required',
    		'alamat' => 'required'
        ]);
        
        $pegawai = Pegawai::find($id);
        $pegawai->nama      = $request->nama;
        $pegawai->alamat    = $request->alamat;
        $pegawai->save();
       
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');
    }

    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
            
        // alihkan halaman ke halaman pegawai
        // return redirect('/pegawai');
        return redirect()->back();
    }

    public function cari(Request $request){
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari tabel pegawai sesuai pencarian data
        $pegawai = DB::table('pegawai')
        ->where('nama','like',"%".$cari."%")
        ->paginate(10);

        // mengirim data pegawai ke view index
    	return view('index',['pegawai' => $pegawai]);
    }

    public function cetak_pdf()
    {
        $pegawai = Pegawai::all();

        $pdf = PDF::loadview('pegawai_pdf', ['pegawai' => $pegawai]);
        // return $pdf->download('laporan-pegawai-pdf');    # untuk langsung di download
        return $pdf->stream();
    }
}
