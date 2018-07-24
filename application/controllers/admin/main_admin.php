<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_secure");
		$this->m_secure->secure();
	}

	public function index()
	{
		$content['main_content'] = 'admin/admin_main_dashboard.php';
		$this->load->view('admin/dashboard.php',$content);
	}
}
