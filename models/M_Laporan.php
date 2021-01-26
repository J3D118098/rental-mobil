<?php 

class M_Laporan extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_keuangan', $data);
		$query = $this->execute();
		return $query;
	}
    public function lihat(){
		$query = $this->setQuery("SELECT  tbl_mobil.nama AS nama_mobil, 
									tbl_keuangan.keperluan, tbl_keuangan.harga FROM tbl_keuangan 
									INNER JOIN tbl_mobil ON tbl_keuangan.id_mobil = tbl_mobil.id");
		$query = $this->execute();
		return $query;
	}
	public function detail($id){
		$query = $this->setQuery(
			"SELECT tbl_rugi.*, tbl_pemesan.nama AS nama_pemesan, tbl_mobil.nama AS nama_mobil, 
		tbl_perjalanan.asal, tbl_perjalanan.tujuan, tbl_jenis_bayar.jenis_bayar FROM tbl_pesanan 
		INNER JOIN tbl_pemesan ON tbl_rugi.id_pemesan = tbl_pemesan.id INNER JOIN tbl_mobil
		 ON tbl_rugi.id_mobil = tbl_mobil.id WHERE tbl_rugi.id = $id"
		 );

		$query = $this->execute();
		return $query;
	}


}