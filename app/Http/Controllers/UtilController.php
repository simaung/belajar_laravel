<?php

namespace App\Http\Controllers;

use App\Gambar;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UtilController extends Controller
{
    public function enkripsi()
    {
        $encrypted = Crypt::encryptString('Belajar laravel di malasngoding.com');
        $decrypted = Crypt::decryptString($encrypted);

        echo "Hasil Enkripsi : " . $encrypted;
		echo "<br/>";
		echo "<br/>";
		echo "Hasil Dekripsi : " . $decrypted;
    }

    public function data()
    {
        $parameter =[
			'nama' => 'Dede Hermawan',
			'pekerjaan' => 'Programmer',
		];
		$enkripsi= Crypt::encrypt($parameter);
		echo "<a href='/data/".$enkripsi."'>Klik</a>";
    }

    public function data_proses($data){
		$data = Crypt::decrypt($data);
 
		echo "Nama : " . $data['nama'];
		echo "<br/>";
		echo "Pekerjaan : " . $data['pekerjaan'];
    }
    
    public function hash()
    {
        $hash_password_saya = Hash::make('halo123');
        echo $hash_password_saya;
    }

    public function upload()
    {
        $gambar = Gambar::get();

        return view('upload', ['gambar' => $gambar]);
    }

    public function proses_upload(Request $request){
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required',
        ]);
    
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        $nama_file = time()."_".$file->getClientOriginalName();
    
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

        Gambar::create([
            'file' => $nama_file,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back();
    }

    public function hapus($id)
    {
        $gambar = Gambar::where('id', $id)->first();
        File::delete('data_file/'.$gambar->file);

        Gambar::where('id', $id)->delete();

        return redirect()->back();
    }

    public function tampilkanSession(Request $request)
    {
        if($request->session()->has('nama')){
            echo $request->session()->get('nama');
        }else{
            echo 'tidak ada data dalam session';
        }
    }

    public function buatSession(Request $request)
    {
        $request->session()->put('nama','Aliaz');
		echo "Data telah ditambahkan ke session.";
    }

    public function hapusSession(Request $request)
    {
        $request->session()->forget('nama');
		echo "Data telah dihapus dari session.";
    }
}
