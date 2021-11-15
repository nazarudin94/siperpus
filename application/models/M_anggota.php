<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_anggota extends CI_Model {
	function __construct()
	{
		parent::__construct();
	 //validasi jika user belum login
	}


	function insertanggota ($data){

		$tes = $this->db->insert('anggota', $data);


	}


	function getanggota (){

		$query = $this->db->get('user');
		return $query->result_array();
	

	}
     function update_table($table_name,$where,$id,$data)
   {
    // echo"<pre>";print_r($id);die('sda');
     $this->db->where($where,$id);
     $update = $this->db->update($table_name,$data);
     return $update;
   }

    function summary (){
$sql = "select count(*) as anggota from user tl ";
 $query = $this->db->query($sql);
// print_r($query->row());die('dsa');
    // $query = $this->db->get('tbl_login');
    return $query->row();
  

  }

	public function buat_kode($table_name,$kodeawal,$idkode,$orderbylimit)
  {
      $query = $this->db->query("select * from $table_name $orderbylimit"); // cek dulu apakah ada sudah ada kode di tabel.
      
		  if($query->num_rows() > 0){
        //jika kode ternyata sudah ada.
        $hasil = $query->row();
        $kd = $hasil->$idkode;
        $cd = $kd;
        $nomor = $query->num_rows();
        $kode = $cd + 1;
        $kodejadi = $kodeawal."00".$kode;    // hasilnya CUS-0001 dst.
        // print_r($kodejadi);die();
        // print_r($kodejadi);die('1');
        $kdj = $kodejadi;
		  }else {
        //jika kode belum ada
        $kode = 0+1;
        // print_r($_POST);die();
        $kodejadi = $kodeawal."00".$kode;    // hasilnya CUS-0001 dst.
        $kdj = $kodejadi;
      }
		  return $kdj;
  }

  public function buat_kode_join($table_name,$kodeawal,$idkode)
  {
      $query = $this->db->query($table_name); // cek dulu apakah ada sudah ada kode di tabel.
		  if($query->num_rows() > 0){
        //jika kode ternyata sudah ada.
        $hasil = $query->row();
        $kd = $hasil->$idkode;
        $cd = $kd;
        $kode = $cd + 1;
        $kodejadi = $kodeawal."00".$kode;    // hasilnya CUS-0001 dst.
        $kdj = $kodejadi;
		  }else {
        //jika kode belum ada
        $kode = 0+1;
        $kodejadi = $kodeawal."00".$kode;    // hasilnya CUS-0001 dst.
        $kdj = $kodejadi;
      }
		  return $kdj;
  }

     function get_tableid_edit($table_name,$where,$id)
   {
     $this->db->where($where,$id);
     $edit = $this->db->get($table_name);
     return $edit->row();
   }

      function delete_table($table_name,$where,$id)
   {
     $this->db->where($where,$id);
     $hapus = $this->db->delete($table_name);
     return $hapus;
   }


}
