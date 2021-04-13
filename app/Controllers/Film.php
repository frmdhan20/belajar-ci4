<?php

namespace App\Controllers;

// nyambung dengan line 20
use App\Models\FilmModel;

class Film extends BaseController
{
	protected $filmModel;
	public function __construct()
	{
		$this->filmModel = new FilmModel();
	}

	// method index > menampilkan data
	public function index()
	{
		// instansiasi class model
		// $film = $this->filmModel->findAll();

		$data = [
			'title' => 'Daftar Film',
			'film' 	=> $this->filmModel->getFilm()
		];

		return view('film/index', $data);
	}

	// method detail > melihat isi data lengkap
	public function detail($slug)
	{
		// $film = $this->filmModel->getFilm($slug);
		// dd($film);

		$data = [
			'title' => 'Detail Film',
			'film'  => $this->filmModel->getFilm($slug)
		];

		// jika film tidak ada di tabel
		if (empty($data['film'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul film ' . $slug . ' tidak ditemukan pak.');
		}

		return view('film/detail', $data);
	}

	// method create atau tambah data
	public function create()
	{
		// session ini dipindah ke BaseController.php line 50 
		// session();
		$data = [
			'title' 	 => 'Form Tambah Data Film',
			'validation' => \Config\Services::validation()
		];

		return view('film/create', $data);
	}

	// method save untuk mengelola data
	public function save()
	{

		// validasi input atau data tidak boleh kosong
		if (!$this->validate([
			'judul' 	=> [
				'rules'  => 'required|is_unique[film.judul]',
				'errors' => [
					'required'  => '{field} film harus diisi donk.',
					'is_unique' => '{field} film sudah terdaftar silahkan inputkan yang lain!'
				]
			],

			'produser'  => [
				'rules'  => 'required[film.produser]',
				'errors' => [
					'required' => '{field} film diisi juga ya.'
				]
			],

			'sutradara' => [
				'rules' => 'required[film.sutradara]',
				'errors' => [
					'required' => '{field} film belum diisi lho.'
				]
			],
			'tahun'  	=> [
				'rules' => 'required[film.tahun]',
				'errors' => [
					'required' => '{field} belum diisi'
				]
			],
			'gambar' => [
				'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors' 	=> [
					'max_size'  => 'Ukuran gambar terlalu besar',
					'is_image'  => 'Yang anda pilih bukan gambar',
					'mime_in'   => 'Yang anda pilih bukan gambar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// dd($validation);
			// return redirect()->to('/film/create')->withInput()->with('validation', $validation);
			return redirect()->to('/film/create')->withInput();
		}

		// ambil gambar
		$fileGambar = $this->request->getFile('gambar');
		// apakah tidak ada gambar yang diupload
		if($fileGambar->getError() == 4){
			$namaGambar = 'defa2.jpg';
		} else{
		// generate nama sampul random
		$namaGambar = $fileGambar->getRandomName();
		// pindahkan file ke folder img
		$fileGambar->move('img', $namaGambar);
		}
		// ambil nama file gambar
		// $namaGambar = $fileGambar->getName();

		// dd($fileGambar);
		// dd('berhasil');
		// dd($this->request->getVar());
		$slug = url_title($this->request->getVar('judul'), '-', true);
		$this->filmModel->save([
			'judul' 	=> $this->request->getVar('judul'),
			'slug'  	=> $slug,
			'produser' 	=> $this->request->getVar('produser'),
			'sutradara' => $this->request->getVar('sutradara'),
			'tahun' 	=> $this->request->getVar('tahun'),
			'gambar' 	=> $namaGambar
		]);

		// flash tambah data
		session()->setFlashdata('pesan', 'Selamat data berhasil ditambahkan.');

		// jika sudah berhasil, kembal ke halaman index / redirect
		return redirect()->to('/film');
	}

	// method delete
	public function delete($id)
	{
		// cari gambar berdasarkan id
		$film = $this->filmModel->find($id);

		// cek jika file gambarnya default
		if($film['gambar'] != 'defa2.jpg'){
		// hapus gambar
		unlink('img/' . $film['gambar']);
		}

		$this->filmModel->delete($id);
		// flash delete
		session()->setFlashdata('pesan', 'Hore data berhasil dihapus.');
		return redirect()->to('/film');
	}

	// method edit
	public function edit($slug)
	{
		$data = [
			'title' 	 => 'Form Edit Data Film',
			'validation' => \Config\Services::validation(),
			'film' 		 => $this->filmModel->getFilm($slug)
		];

		return view('film/edit', $data);
	}

	// method update
	public function update($id)
	{
		// cek judul menggunakan if
		$filmLama = $this->filmModel->getFilm($this->request->getVar('slug'));
		if ($filmLama['judul'] == $this->request->getVar('judul')) {
			$rule_judul = 'required';
		} else{
			$rule_judul = 'required|is_unique[film.judul]';
		}

		// validasi data
		if (!$this->validate([
			'judul' 	=> [
				'rules'  => $rule_judul,
				'errors' => [
					'required'  => '{field} film harus diisi donk.',
					'is_unique' => '{field} film sudah terdaftar silahkan inputkan yang lain!'
				]
			],

			'produser'  => [
				'rules'  => 'required[film.produser]',
				'errors' => [
					'required' => '{field} film diisi juga ya.'
				]
			],

			'sutradara' => [
				'rules' => 'required[film.sutradara]',
				'errors' => [
					'required' => '{field} film belum diisi lho.'
				]
			],
			'tahun'  	=> [
				'rules' => 'required[film.tahun]',
				'errors' => [
					'required' => '{field} belum diisi'
				]
			],
			'gambar' => [
				'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors' 	=> [
					'max_size'  => 'Ukuran gambar terlalu besar',
					'is_image'  => 'Yang anda pilih bukan gambar',
					'mime_in'   => 'Yang anda pilih bukan gambar'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// dd($validation);
			return redirect()->to('/film/edit/' . $this->request->getVar('slug'))->withInput();
						// ->with('validation', $validation);
			}

			// kelola nama gambar
			$fileGambar = $this->request->getFile('gambar');

			// cek gambar, apakah tetap gambar lama
			if($fileGambar->getError() == 4){
				$namaGambar = $this->request->getVar('gambarLama');
			} else{
				// generate nama file random
				$namaGambar = $fileGambar->getRandomName();
				// pindahkan gambar
				$fileGambar->move('img', $namaGambar);
				// hapus file lama
				unlink('img/' . $this->request->getVar('gambarLama'));
			}

		// dd($this->request->getVar());
		// bisa copas dari method save
		$slug = url_title($this->request->getVar('judul'), '-', true);
		$this->filmModel->save([
			'id'		=> $id,
			'judul' 	=> $this->request->getVar('judul'),
			'slug'  	=> $slug,
			'produser' 	=> $this->request->getVar('produser'),
			'sutradara' => $this->request->getVar('sutradara'),
			'tahun' 	=> $this->request->getVar('tahun'),
			'gambar' 	=> $namaGambar
		]);

		// flash tambah data
		session()->setFlashdata('pesan', 'Selamat data berhasil diubah.');

		// jika sudah berhasil, kembal ke halaman index / redirect
		return redirect()->to('/film');
	}
}

// jika data sudah berhasil ditangkap tinggal insert atau masukkan ke database