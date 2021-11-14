<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {

	public function page()
	{
		$this->load->view('welcome_message');
	}
}
