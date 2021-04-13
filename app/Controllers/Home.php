<?php

namespace App\Controllers;

class Home extends BaseController
{
	// method
	public function index()
	{
		return view('welcome_message');
		// echo "Prank";
	}

	// method
	public function coba()
	{
		echo "Hello Indonesia";
	}
}