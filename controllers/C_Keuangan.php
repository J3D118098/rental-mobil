<?php

class C_Keuangan extends Controller
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
		$this->keuangan = $this->model('M_Keuangan');
	}

	public function index()
	{
		$data = [
			'aktif' => 'keuangan',
			'judul' => 'Catatan Pengeluaran',
			'data_keuangan' => $this->keuangan->lihat(),
			'data_rugi' => $this->rugi->lihat(),
			'data_pesanan' => $this->pesanan->lihat(),
			'data_pemesan' => $this->pemesan->lihat(),
			'data_mobil' => $this->mobil->lihat(),
			'data_perjalanan' => $this->perjalanan->lihat(),
			'data_jenis_bayar' => $this->j_bayar->lihat(),
			'no' => 1
		];
		$this->view('keuangan/index', $data);
	}

	public function tambah()
	{
		if (!isset($_POST['tambah'])) redirect('keuangan');
		$data = [
			'id_mobil' => $this->req->post('id_mobil'),
			'keperluan' => $this->req->post('keperluan'),
			'harga' => $this->req->post('harga'),
		];

		if ($this->keuangan->tambah($data)) {
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('keuangan');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('keuangan');
		}
	}

	public function detail($id)
	{
		if (!isset($id) || $this->keuangan->cek($id)->num_rows == 0) redirect('keuangan');

		$data = [
			'aktif' => 'keuangan',
			'judul' => 'Detail Keuangan',
			'rugi' => $this->keuangan->detail($id)->fetch_object(),
		];

		$this->view('keuangan/detail', $data);
	}
}
