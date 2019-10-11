<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MalasngodingController extends Controller
{
    public function index($nama)
    {
        if($nama == "malasngoding"){
			return abort(403,'Anda tidak punya akses karena anda Malas Ngoding');
		}elseif($nama == "dede"){
			return "Halo, ".$nama;
		}else{
			return abort(404);
		}
    }
}
