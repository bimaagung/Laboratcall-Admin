<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_alumni extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_alumnus");
		// $this->load->model("m_secure");
		// $this->m_secure->secure();
	}

	function index()
	{
		$content['main_content'] = 'admin/admin_alumni/admin_page_alumni.php';
		$this->load->view('admin/dashboard.php',$content);
	}

	function get_alumnus_ajax()
	{	
		$list_alumnus = $this->m_alumnus->get_alumnus();
		echo json_encode($list_alumnus);
		
	}

	function get_alumnus_byid_ajax()
	{	
		$id = $this->input->get('id');
		$list_alumnus_byid = $this->m_alumnus->get_alumnus_by($id);
		echo json_encode($list_alumnus_byid);
		
	}

	function delete_alumnus_byid_ajax($id)
	{	
		$this->m_alumnus->get_alumnus_delete($id);
		echo json_encode(array("status" => TRUE));
		
	}

	function add_alumni()
	{
		$content['main_content'] = 'admin/admin_alumni/insert_page_alumni.php';
		$this->load->view('admin/dashboard.php',$content);
	}

	function insert_alumnus(){
		$id = $this->uri->segment(4);
		$data = array();
		if(isset($id)){
		$row = $this->m_alumnus->get_alumnus_by($id);
				$data = array(
						'labelalumni' => 'UPDATE DATA ALUMNI',
						'id' => $row->id,
						'nama' => $row->nama,
						'nim' => $row->nim,
						'prodi' => $row->prodi,
						'ttl' => $row->ttl,
						'alamatkos' => $row->alamatkos,
						'alamatrumah' => $row->alamatrumah,
						'posisiriptek' => $row->posisiriptek,
						'thn_masuk' => $row->thn_masuk, 
						'motto' => $row->motto,
						'hobi' => $row->hobi,
						'email' => $row->email,
						'nomorhp' => $row->nomorhp,
						'nomorwa' => $row->nomorwa,
						'sosmed' => $row->sosmed,
						'disukai' => $row->disukai,
						'tdksuka' => $row->tdksuka,
						'citacita' => $row->citacita,
						'pesan' => $row->pesan,
						'foto' => $row->foto,
						'main_content' => 'admin/admin_alumni/insert_page_alumni.php'
						);
		
		}else{
				$data = array(
						'labelalumni' => 'INSERT DATA ALUMNI',
						'id' => '',
						'nama' => '',
						'nim' => '',
						'prodi' => '',
						'ttl' => '',
						'alamatkos' => '',
						'alamatrumah' => '',
						'posisiriptek' => '',
						'thn_masuk' => '', 
						'motto' => '',
						'hobi' => '',
						'email' => '',
						'nomorhp' => '',
						'nomorwa' => '',
						'sosmed' => '',
						'disukai' => '',
						'tdksuka' => '',
						'citacita' => '',
						'pesan' => '',
						'foto' => '',
						'main_content' => 'admin/admin_alumni/insert_page_alumni.php'
						);	
		}

		$this->load->view('admin/dashboard',$data);


	}

	function save_alumnus(){
		
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'jpg|png';
		$config['file_name']        	= time();
		$config['file_ext']      		= '.jpg';


		$this->load->library('upload', $config);
		$this->upload->do_upload('foto');

		$id = $this->input->post('id');

		$data = array(
			'nama' => $this->input->post('nama'),
			'nim' => $this->input->post('nim'),
			'prodi' => $this->input->post('prodi'),
			'ttl' => $this->input->post('ttl'),
			'alamatkos' => $this->input->post('alamatkos'),
			'alamatrumah' => $this->input->post('alamatrumah'),
			'posisiriptek' => $this->input->post('posisiriptek'),
			'thn_masuk' => $this->input->post('thn_masuk'), 
			'motto' => $this->input->post('motto'),
			'hobi' => $this->input->post('hobi'),
			'email' => $this->input->post('email'),
			'nomorhp' => $this->input->post('nomorhp'),
			'nomorwa' => $this->input->post('nomorwa'),
			'sosmed' => $this->input->post('sosmed'),
			'disukai' => $this->input->post('disukai'),
			'tdksuka' => $this->input->post('tdksuka'),
			'citacita' => $this->input->post('citacita'),
			'pesan' => $this->input->post('pesan'),
			'foto' => $this->upload->data('file_name')
			);

		if( $id == '' ){
			$this->m_alumnus->save_alumnus($data);
		}else{
			$this->m_alumnus->update_alumnus($data,$id);
		}

		redirect('/admin/page_alumni/','refresh');
	}

}
