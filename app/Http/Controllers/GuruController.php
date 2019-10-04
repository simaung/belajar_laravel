<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Guru;

class GuruController extends Controller
{
    // menampilkan data guru
    public function index()
    {
        $guru = Guru::all();

        return view('guru', ['guru' => $guru]);
    }

    public function hapus($id)
    {
        $guru = Guru::find($id);
        $guru->delete();

        return redirect('/guru');
    }

    public function trash()
    {
        // mengambil data guru yang sudah di hapus
        $guru = Guru::onlyTrashed()->get();

        return view('guru_trash', ['guru' => $guru]);
    }

    public function kembalikan($id)
    {
        $guru = Guru::onlyTrashed()->where('id', $id);
        $guru->restore();

        return redirect('guru/trash');
    }

    public function kembalikan_semua()
    {
        $guru = Guru::onlyTrashed();
        $guru->restore();

        return redirect('guru/trash');
    }

    public function hapus_permanen($id)
    {
        $guru = Guru::onlyTrashed()->where('id', $id);
        $guru->forceDelete();

        return redirect('guru/trash');
    }

    public function hapus_permanen_semua()
    {
        $guru = Guru::onlyTrashed();
        $guru->forceDelete();

        return redirect('guru/trash');
    }
}
