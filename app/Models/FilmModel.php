<?php 

namespace App\Models;

use CodeIgniter\Model;

class FilmModel extends Model
{
	protected $table 		 = 'film';
	protected $useTimestamps = true;
	protected $allowedFields = ['judul', 'slug', 'produser', 'sutradara', 'tahun', 'gambar'];

	// method
	public function getFilm($slug = false)
	{
		if ($slug == false) {
			return $this->findAll();
		}

		return $this->where(['slug' => $slug])->first();
	}
}