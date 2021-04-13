<?php

namespace App\Controllers;

use App\Models\PendudukModel;

class Penduduk extends BaseController
{
	protected $pendudukModel;
	public function __construct()
	{
		$this->pendudukModel = new PendudukModel();
	}

	// method index > menampilkan data
	public function index()
	{
		// menampilkan kita berada di halaman berapa
		$currentPage = $this->request->getVar('page_penduduk') ? $this->request->getVar('page_penduduk') : 1;
		// cari data berdasarkan keyword
		$keyword = $this->request->getVar('keyword');
		if($keyword) {
			$penduduk = $this->pendudukModel->search($keyword);
		} else {
			$penduduk = $this->pendudukModel;
		}

		// d($this->request->getVar('keyword'));
		$data = [
			'title' 	=> 'Daftar Penduduk',
			// 'penduduk' 	=> $this->pendudukModel->findAll()
			// pagination
			'penduduk' 		=> $penduduk->paginate(7, 'penduduk'),
			'pager'    		=> $this->pendudukModel->pager,
			'currentPage' 	=> $currentPage
		];

		return view('penduduk/index', $data);
	}

	// edit
	// public function edit()
	// {
	// 	$data = [
	// 		'title' 	 => 'Form Edit Data Penduduk',
	// 		'validation' => \Config\Services::validation(),
	// 		'penduduk' 	 => $this->pendudukModel->getPenduduk($id)
	// 	];

	// 	return view('penduduk/edit', $data);
	// }

	// delete
	// method delete
	// public function delete()
	// {
	// 	// cari gambar berdasarkan id
	// 	$penduduk = $this->pendudukModel->find();

	// 	$this->pendudukModel->delete();
	// 	// flash delete
	// 	session()->setFlashdata('pesan', 'Hore data berhasil dihapus.');
	// 	return redirect()->to('/penduduk');
	// }
}