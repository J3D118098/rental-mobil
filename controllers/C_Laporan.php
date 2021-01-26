<?php

class C_Laporan extends Controller
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
		$this->laporan = $this->model('M_Laporan');
		$this->keuangan = $this->model('M_Keuangan');
		$this->pesanan = $this->model('M_Pesanan');
		$this->j_bayar = $this->model('M_Jenis_Bayar');
		$this->mobil = $this->model('M_Mobil');
		$this->pemesan = $this->model('M_Pemesan');
		$this->perjalanan = $this->model('M_Perjalanan');
	}

	public function index()
	{
		$data = [
			'aktif' => 'laopran',
			'judul' => 'Laporan Grafik Transaksi',
			'data_keuangan' => $this->keuangan->lihat(),
			'data_pesanan' => $this->pesanan->lihat(),
			'data_pemesan' => $this->pemesan->lihat(),
			'data_mobil' => $this->mobil->lihat(),
			'no' => 1
		];
		$this->view('laporan/index', $data);
	}

	public function tambah()
	{
		if (!isset($_POST['tambah'])) redirect('keuangan');
		$data = [
			'id_mobil' => $this->req->post('id_mobil'),
			'keperluan' => $this->req->post('keperluan'),
			'harga' => $this->req->post('harga')
		];

		if ($this->keuangan->tambah($data)) {
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('keuangan');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('keuangan');
		}
	}
}
