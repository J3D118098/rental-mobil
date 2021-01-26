<?php 

class M_Rugi extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_rugi', $data);
		$query = $this->execute();
		return $query;
	}
    public function lihat(){
		$query = $this->setQuery("SELECT tbl_rugi.id, tbl_pemesan.nama AS nama_pemesan, tbl_mobil.nama AS nama_mobil, 
									tbl_rugi.kondisi, tbl_rugi.biaya FROM tbl_rugi INNER JOIN tbl_pemesan ON tbl_rugi.id_pemesan = tbl_pemesan.id 
									INNER JOIN tbl_mobil ON tbl_rugi.id_mobil = tbl_mobil.id");
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

	public function lihat_id($id){
		$query = $this->get_where('tbl_rugi', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

}