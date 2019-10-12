<?php

namespace App\Http\Controllers;

use App\Mail\MalasngodingEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
	
	public function kirimEmail()
	{
		Mail::to('testing@malasngoding.com')->send(new MalasngodingEmail());

		return "Email telah dikirim";
	}
}
