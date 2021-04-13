<?php

namespace App\Controllers;

class Pages extends BaseController
{
	// method
	public function index()
	{
		$data = [
			'title' => 'Home | Belajar CodeIgniter 4'
		];
		return view('pages/home', $data);
	}

	// method 2
	public function about()
	{
		$data = [
			'title' => 'About Me'
		];
		return view('pages/about', $data);
	}

	// method 3
	public function contact()
	{
		$data = [
			'title'  => 'Contact Us',
			'alamat' => [
				[
					'tipe' 		=> 'Rumah',
					'alamat' 	=> 'Jl.Raya Leces No. 32',
					'kota' 		=> 'Probolinggo'
				],
				[
					'tipe' 		=> 'Kantor',
					'alamat' 	=> 'Jl.Raya Leces No. 79',
					'kota' 		=> 'Probolinggo'
				]
			]
		];
		return view('pages/contact', $data);
	}
}