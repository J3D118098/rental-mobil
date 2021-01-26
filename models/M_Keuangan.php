<?php 

class M_Keuangan extends Model{

    public function lihat(){
		$query = $this->setQuery("SELECT tbl_mobil.nama AS nama_mobil, 
								tbl_keuangan.keperluan, tbl_keuangan.harga FROM tbl_keuangan INNER JOIN tbl_mobil 
                                ON tbl_keuangan.id_mobil = tbl_mobil.id 
								");
		$query = $this->execute();
		return $query;
	}
	public function tambah($data){
		$query = $this->insert('tbl_keuangan', $data);
		$query = $this->execute();
		return $query;
	}
}