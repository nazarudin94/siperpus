<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct(){
		parent::__construct();	
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('M_anggota');
		if($this->session->userdata('email') != true){
			var_dump($this->session->userdata('login') );
			redirect('auth');
		}

	}

	public function page()
	{

		$this->load->view('auth/landingpage');

	}
	public function index()
	{
// 		$tes =$this->session->userdata();
// var_dump($tes);
		// $this->load->view('template/sidebar');
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();

		// $data['nama'] = $data['user']['nama'];
		$data['summary']= $this->M_anggota->summary();
			// $data['anggota'] = $data['summary']->anggota
		// print_r($data);die();
		$this->load->view('v_perpus/index',$data);
	}

	public function anggota()
	{
		// $this->load->view('template/sidebar');
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();

		$data['anggota']= $this->M_anggota->getanggota();
		// print_r($data);die();
		$this->load->view('v_perpus/v_anggota',$data);
	}
	public function buku()
	{
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		// $this->load->view('template/sidebar');
		print_r($data);die();
		$this->load->view('v_perpus/v_buku',$data);
	}
	public function pinjam()
	{
		// $this->load->view('template/sidebar');
		$this->load->view('v_perpus/v_pinjam');
	}

	public function tambah(){
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]',[
			'min_length'=>'Password too short',
			'required'=>'Password required',
		]);
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('lahir','Lahir','required|trim');
		$this->form_validation->set_rules('tgl_lahir','Tgl Lahir','required|trim');
		$this->form_validation->set_rules('user','User','required|trim');
		$this->form_validation->set_rules('telepon','Telpon','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('alamat','Alamat','required|trim');
		// die();
		if ($this->form_validation->run()==false) {

			$this->load->view('v_perpus/v_tambah');
		}else{
			// format tabel / kode baru 3 hurup / id tabel / order by limit ngambil data terakhir
		$id = $this->M_anggota->buat_kode('user','AG','id','ORDER BY id DESC LIMIT 1'); 
		$nama = htmlentities($this->input->post('nama',TRUE));
		$user = htmlentities($this->input->post('user',TRUE));
		$pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		// print_r($pass);die();
		$level = htmlentities($this->input->post('level',TRUE));
		$jenkel = htmlentities($this->input->post('jenkel',TRUE));
		$telepon = htmlentities($this->input->post('telepon',TRUE));
		$status = htmlentities($this->input->post('status',TRUE));
		$alamat = htmlentities($this->input->post('alamat',TRUE));
		$email = $_POST['email'];
		
		$dd = $this->db->query("SELECT * FROM user WHERE user = '$user' OR email = '$email'");
		// print_r($dd->num_rows());die();
		if($dd->num_rows() > 0)
		{

		// die('dsa');
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
				<p> Gagal Update User : '.$nama.' !, Username / Email Anda Sudah Terpakai</p>
				</div></div>');
			redirect(base_url('home/tambah')); 
		}else{
            // setting konfigurasi upload
            // die();
			$nmfile = "user_".time();
			$config['upload_path'] = './assets_style/image/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name'] = $nmfile;
            // load library upload
			$this->load->library('upload', $config);
            // upload gambar 1
			$this->upload->do_upload('gambar');
			$result1 = $this->upload->data();
			$result = array('gambar'=>$result1);
    	// echo "<pre>";print_r($result1);die();
			$data1 = array('upload_data' => $this->upload->data());
			$data = array(
				'anggota_id' => $id,
				'nama'=>$nama,
				'user'=>$user,
				'password'=>$pass,
				'level'=>$level,
				'tempat_lahir'=>$_POST['lahir'],
				'tgl_lahir'=>$_POST['tgl_lahir'],
				'level'=>$level,
				'email'=>$_POST['email'],
				'telepon'=>$telepon,
				'foto'=>$data1['upload_data']['file_name'],
				'jenkel'=>$jenkel,
				'alamat'=>$alamat,
				'tgl_bergabung'=>date('Y-m-d')
			);
			// echo"<pre>";var_dump($data);die();
			$this->db->insert('user',$data);
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
				<p> Daftar User telah berhasil !</p>
				</div></div>');
			redirect(base_url('home/anggota'));
		}  
			

		}
	}

	public function edit($param){
		$data['user'] = $this->db->get_where('user', array('id' => $param))->row();
		// print_r($query);die();
		$this->load->view('v_perpus/v_edit',$data);
	}

	public function upd(){
		 $nama = htmlentities($this->input->post('nama',TRUE));
        $user = htmlentities($this->input->post('user',TRUE));
        $pass = htmlentities($this->input->post('password'));
        $level = htmlentities($this->input->post('level',TRUE));
        $jenkel = htmlentities($this->input->post('jenkel',TRUE));
        $telepon = htmlentities($this->input->post('telepon',TRUE));
        $status = htmlentities($this->input->post('status',TRUE));
        $alamat = htmlentities($this->input->post('alamat',TRUE));
        $id_login = htmlentities($this->input->post('id',TRUE));

        // setting konfigurasi upload
        $nmfile = "user_".time();
        $config['upload_path'] = './assets_style/image/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = $nmfile;
        // load library upload
        $this->load->library('upload', $config);
		// upload gambar 1
		
        
		if(!$this->upload->do_upload('gambar'))
		{
			if($this->input->post('password') !== ''){
				$data = array(
					'nama'=>$nama,
					'user'=>$user,
					'password'=>md5($pass),
					'tempat_lahir'=>$_POST['lahir'],
					'tgl_lahir'=>$_POST['tgl_lahir'],
					'level'=>$level,
					'email'=>$_POST['email'],
					'telepon'=>$telepon,
					'jenkel'=>$jenkel,
					'alamat'=>$alamat,
				);
				$this->M_anggota->update_table('user','id',$id_login,$data);
				if($this->session->userdata('level') == 'Petugas')
				{

					$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
					<p> Berhasil Update User : '.$nama.' !</p>
					</div></div>');
					redirect(base_url('home/anggota'));  
				}elseif($this->session->userdata('level') == 'Anggota'){

					$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
					<p> Berhasil Update User : '.$nama.' !</p>
					</div></div>');
					redirect(base_url('home/edit/'.$id_login)); 
				}
			}else{
				$data = array(
					'nama'=>$nama,
					'user'=>$user,
					'tempat_lahir'=>$_POST['lahir'],
					'tgl_lahir'=>$_POST['tgl_lahir'],
					'level'=>$level,
					'email'=>$_POST['email'],
					'telepon'=>$telepon,
					'jenkel'=>$jenkel,
					'alamat'=>$alamat,
				);
				$this->M_anggota->update_table('user','id',$id_login,$data);
				// echo "<pre>";print_r($data);die();
			
				if($this->session->userdata('level') == 'Petugas')
				{

					$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
					<p> Berhasil Update User : '.$nama.' !</p>
					</div></div>');
					redirect(base_url('home/anggota'));  
				}elseif($this->session->userdata('level') == 'Anggota'){

					$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
					<p> Berhasil Update User : '.$nama.' !</p>
					</div></div>');
					redirect(base_url('home/edit/'.$id_login)); 
				} 
			
			}
		}else{
			$result1 = $this->upload->data();
			$result = array('gambar'=>$result1);
			$data1 = array('upload_data' => $this->upload->data());
			unlink('./assets_style/image/'.$this->input->post('foto'));
			if($this->input->post('pass') !== ''){
				$data = array(
					'nama'=>$nama,
					'user'=>$user,
					'tempat_lahir'=>$_POST['lahir'],
					'tgl_lahir'=>$_POST['tgl_lahir'],
					'password'=>md5($pass),
					'level'=>$level,
					'email'=>$_POST['email'],
					'telepon'=>$telepon,
					'foto'=>$data1['upload_data']['file_name'],
					'jenkel'=>$jenkel,
					'alamat'=>$alamat
				);
				$this->M_anggota->update_table('user','id',$id_login,$data);
			
				if($this->session->userdata('level') == 'Petugas')
				{

					$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
					<p> Berhasil Update User : '.$nama.' !</p>
					</div></div>');
					redirect(base_url('user'));  
				}elseif($this->session->userdata('level') == 'Anggota'){

					$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
					<p> Berhasil Update User : '.$nama.' !</p>
					</div></div>');
					redirect(base_url('home/edit/'.$id_login)); 
				} 
		
			}else{
				$data = array(
					'nama'=>$nama,
					'user'=>$user,
					'tempat_lahir'=>$_POST['lahir'],
					'tgl_lahir'=>$_POST['tgl_lahir'],
					'level'=>$level,
					'email'=>$_POST['email'],
					'telepon'=>$telepon,
					'foto'=>$data1['upload_data']['file_name'],
					'jenkel'=>$jenkel,
					'alamat'=>$alamat
				);
				$this->M_anggota->update_table('user','id',$id_login,$data);
			
				if($this->session->userdata('level') == 'Petugas')
				{

					$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
					<p> Berhasil Update User : '.$nama.' !</p>
					</div></div>');
					redirect(base_url('home/anggota'));  
				}elseif($this->session->userdata('level') == 'Anggota'){

					$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
					<p> Berhasil Update User : '.$nama.' !</p>
					</div></div>');
					redirect(base_url('home/edit/'.$id_login)); 
				}
			}
		}
	}


	public function del()
	{
		if($this->uri->segment('3') == ''){ echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('user').'";</script>';}

		$user = $this->M_anggota->get_tableid_edit('user','id',$this->uri->segment('3'));
		unlink('./assets_style/image/'.$user->foto);
		$this->M_anggota->delete_table('user','id',$this->uri->segment('3'));
		
		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Berhasil Hapus User !</p>
			</div></div>');
		redirect(base_url('home/anggota'));  
	}
}
