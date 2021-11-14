<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {


	function __construct(){
		parent::__construct();	
		$this->load->database();

		$this->load->model('M_anggota');

	} 

	public function databuku(){
		$this->load->view('v_data/v_databuku');
	}

	public function tambahbuku(){
		$this->load->view('v_data/v_tambahbuku');
	}

	public function kategori(){
		$this->load->view('v_data/v_kategori');
	}




}