<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesControler extends Controller
{
    public function create_pc(){
		return view ('create_pc');
	}
	 public function create_user(){
		return view ('create_user');
	}
}
