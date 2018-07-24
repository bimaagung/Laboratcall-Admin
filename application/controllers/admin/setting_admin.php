<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_user_admin");
		$this->load->model("m_secure");
		$this->m_secure->secure();
	}

	public function index()
	{
		$content['main_content'] = 'admin/admin_setting.php';
		$this->load->view('admin/dashboard.php',$content);
	}

	function get_admin_byid_ajax()
	{	
		$id = $this->session->userdata('id');
		$row = $this->m_user_admin->get_admin_by($id);
		$password_encrypt = $row->password;
		$password_decrypt = $this->encrypt->decode($password_encrypt);

		$data_admin = array();
		$data_admin = array(
			'id' => $row->id,
			'nama' => $row->nama,
			'gender' => $row->gender,
			'username' => $row->username,
			'email' => $row->email,
			'password' => $password_decrypt
			);

		echo json_encode($data_admin);
	}

	public function update_admin()
	{
		$password = $this->input->post('password');
		$password_retype = $this->input->post('password_retype');

		$id = $this->session->userdata('id');

		if($password == $password_retype)
		{
			$data_admin = array(
				'nama' => $this->input->post('nama'),
				'gender' => $this->input->post('gender'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->encrypt->encode($password)
			);

		$this->m_user_admin->m_update_admin($data_admin,$id);
		}

	}


	
}
