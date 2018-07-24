<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user_admin');
		// $this->load->model("m_secure");
		// $this->m_secure->secure();
	}


	public function index()
	{
		$content['main_content'] = 'admin/admin_user/admin_user_main.php';
		$this->load->view('admin/dashboard.php',$content);
	}

	public function add_user_admin()
	{
		$content['main_content'] = 'admin/admin_user/insert_admin_user.php';
		$this->load->view('admin/dashboard.php',$content);
	}

	public function get_user_admin_ajax()
	{
		$user_admin = $this->m_user_admin->get_user_admin();
		$data = array();
		$no = 1;
		foreach ($user_admin as $row) {
			$no++;
			$rows = array(
					$row->nama,
					$row->gender,
					$row->username,
					$row->password,
					$row->email,
					$row->last_login,

					'<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$row->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				     <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$row->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>',
			);
		}
		$data[] = $rows;

		$output = array(
						"data" => $data
				);
		
		echo json_encode($output);
	}

	
}
