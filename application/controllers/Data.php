<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {


	function __construct(){
		parent::__construct();	
		$this->load->database();

		$this->load->model('M_data');

	} 

	public function databuku(){
$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$this->load->view('v_data/v_databuku',$data);
	}

	public function tambahbuku(){
$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$this->load->view('v_data/v_tambahbuku');
	}

	public function kategori(){
		$data['kategori'] = $this->M_data->getkategori();
$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();

		$this->load->view('v_data/v_kategori',$data);
	}

	public function katproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_kategori'=>htmlentities($post['kategori']),
			);

			$this->db->insert('tbl_kategori', $data);

			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori'));  
		}
		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_kategori'=>htmlentities($post['kategori']),
			);
			$this->db->where('id_kategori',htmlentities($post['edit']));
			$this->db->update('tbl_kategori', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori')); 		
		}

		if(!empty($this->input->get('kat_id')))
		{
			$this->db->where('id_kategori',$this->input->get('kat_id'));
			$this->db->delete('tbl_kategori');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori')); 
		}
}




}