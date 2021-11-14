<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct(){
		parent::__construct();	
		$this->load->database();

		$this->load->model('M_anggota');

	}

	public function page()
	{
		$this->load->view('auth/landingpage');
	
	}
	public function index()
	{
		// $this->load->view('template/sidebar');
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['nama'] = $data['user']['nama'];
		// print_r($data['nama']);die();
		$this->load->view('v_perpus/index',$data);
	}

	public function anggota()
	{
		// $this->load->view('template/sidebar');
		$data['anggota']= $this->M_anggota->getanggota();
		// print_r($data);die();
		$this->load->view('v_perpus/v_anggota',$data);
	}
	public function buku()
	{
		// $this->load->view('template/sidebar');
		$this->load->view('v_perpus/v_buku');
	}
	public function pinjam()
	{
		// $this->load->view('template/sidebar');
		$this->load->view('v_perpus/v_pinjam');
	}

	public function tambah(){
		$this->load->view('v_perpus/v_tambah');
	}

// 	public function insertdata()
// 	{
// 		move_uploaded_file("img", '/img');
// print_r($_POST);echo "</pre>";die();
// 		$data = [
// 			'nm_anggota' => $_POST['nama'],
// 			'kelas' => $_POST['kelas'],
// 			'alamat' => $_POST['alamat'],
// 			'tgl_lahir' => $_POST['tgl_lahir'],
// 			'nis' => $_POST['nis'],
// 			'no_anggota' => $_POST['no_anggota']
// 		];

// 		$this->M_anggota->insertanggota($data);

// 		echo"<pre>";print_r($result);die();
// 	}

	 public function add()
    {
		// format tabel / kode baru 3 hurup / id tabel / order by limit ngambil data terakhir
		$id = $this->M_anggota->buat_kode('tbl_login','AG','id_login','ORDER BY id_login DESC LIMIT 1'); 
        $nama = htmlentities($this->input->post('nama',TRUE));
        $user = htmlentities($this->input->post('user',TRUE));
        $pass = md5(htmlentities($this->input->post('pass',TRUE)));
        $level = htmlentities($this->input->post('level',TRUE));
        $jenkel = htmlentities($this->input->post('jenkel',TRUE));
        $telepon = htmlentities($this->input->post('telepon',TRUE));
        $status = htmlentities($this->input->post('status',TRUE));
        $alamat = htmlentities($this->input->post('alamat',TRUE));
		$email = $_POST['email'];
		
		$dd = $this->db->query("SELECT * FROM tbl_login WHERE user = '$user' OR email = '$email'");
		if($dd->num_rows() > 0)
		{

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
                'pass'=>$pass,
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
			$this->db->insert('tbl_login',$data);
			
            $this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
            <p> Daftar User telah berhasil !</p>
            </div></div>');
			redirect(base_url('home/anggota'));
		}    
      
    }
}
