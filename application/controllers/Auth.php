<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

public function __construct (){
	parent::__construct();
	$this->load->library('form_validation');
}

	public function index()
	{
		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');
			if ($this->form_validation->run()==false) {

		$this->load->view("auth/login");
	}else{
		$this->_login();
	}
	}

	private function  _login (){
	$email =	$this->input->post('email');
	$password =	$this->input->post('password');

		$user = $this->db->get_where('user',['email'=>$email])->row_array();
		//jika user ada
		if ($user != NULL) { 
			if ($user['is_active']==1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
					];
					$this->session->set_userdata($data);
					redirect('home/page');
				}else{
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah!</div>');
			redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email belum di aktivasi!</div>');
			redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email atau Password anda salah!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		date_default_timezone_set('Asia/Jakarta');
		// print_r(date('Y-m-d H:i:s'));die();
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
			'is_unique'=>'This email has already registred!'
		]);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
			'matches'=>'Password dont match!',
			'min_length'=>'Password too short',
			'required'=>'Password required',
		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
		if ($this->form_validation->run()==false) {
			# code...
		$this->load->view("auth/registration");
		}else{
			$data = [
				'nama'=> htmlentities($this->input->post('name',true)),
				'email'=> htmlspecialchars($this->input->post('email',true)),
				'image'=> 'default.jpg',
				'password'=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT) ,
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => date('Y-m-d H:i:s')
			];
			$this->db->insert('user',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat anda berhasil registrasi silahkan login !</div>');
			redirect('auth');

		}
	}
}
