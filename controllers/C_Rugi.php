<?php

class C_Rugi extends Controller
{
	public function __construct()
	{
		$this->addFunction('url');
		if (!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}

		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->rugi = $this->model('M_Rugi');
		$this->pesanan = $this->model('M_Pesanan');
		$this->j_bayar = $this->model('M_Jenis_Bayar');
		$this->mobil = $this->model('M_Mobil');
		$this->pemesan = $this->model('M_Pemesan');
		$this->perjalanan = $this->model('M_Perjalanan');
	}

	public function index()
	{
		$data = [
			'aktif' => 'rugi',
			'judul' => 'Data Ganti Rugi',
			'data_rugi' => $this->rugi->lihat(),
			'data_pesanan' => $this->pesanan->lihat(),
			'data_pemesan' => $this->pemesan->lihat(),
			'data_mobil' => $this->mobil->lihat(),
			'data_perjalanan' => $this->perjalanan->lihat(),
			'data_jenis_bayar' => $this->j_bayar->lihat(),
			'no' => 1
		];
		$this->view('rugi/index', $data);
	}

	public function tambah()
	{
		if (!isset($_POST['tambah'])) redirect('rugi');
		$data = [
			'id_pemesan' => $this->req->post('id_pemesan'),
			'id_mobil' => $this->req->post('id_mobil'),
			'kondisi' => $this->req->post('kondisi'),
			'biaya' => $this->req->post('biaya'),
		];

		if ($this->rugi->tambah($data)) {
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('rugi');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('rugi');
		}
	}

	public function detail($id)
	{
		if (!isset($id) || $this->rugi->cek($id)->num_rows == 0) redirect('rugi');

		$data = [
			'aktif' => 'rugi',
			'judul' => 'Detail Ganti Rugi',
			'rugi' => $this->rugi->detail($id)->fetch_object(),
		];

		$this->view('rugi/detail', $data);
	}
}
