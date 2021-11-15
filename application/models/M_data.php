<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_data extends CI_Model {
	function __construct()
	{
		parent::__construct();
	 //validasi jika user belum login
	}


	function getkategori (){
		$sql = "select * from tbl_kategori";

		 $result = $this->db->query($sql);
		 return $result->result_array();

// print_r($result->result_array());die();


	}

}