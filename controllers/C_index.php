<?php

class C_index extends Controller
{
	public function __construct()
	{
		$this->addFunction('url');
		if (!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}

		$this->addFunction('web');
		$this->mobil = $this->model('M_Mobil');
		$this->pemesan = $this->model('M_Pemesan');
		$this->pesanan = $this->model('M_Pesanan');
		$this->akun = $this->model('M_Akun');
	}
	public function index()
	{
		$data = [
			'aktif' => 'Index',
			'judul' => 'Index',
			'mobil' => $this->mobil->lihat(),
			'pemesan' => $this->pemesan->lihat(),
			'pesanan' => $this->pesanan->lihat(),
			'akun' => $this->akun->lihat(),
		];

		$this->view('index', $data);
		// $this->view('index', $data);
		// if (($_SESSION['login']['level']) == 'pemilik') {
		// 	$this->view('index', $data);
		// } else if (($_SESSION['login']['level']) == 'bendahara') {
		// 	$this->view('index_bendahara', $data);
		// } else if (($_SESSION['login']['level']) == 'kasir') {
		// 	$this->view('index_kasir', $data);
		// } else {
		// 	$this->view('index_kasir', $data);
		// }
	}

	public function cetak()
	{
		$this->view('export_transaksi');
	}
}
