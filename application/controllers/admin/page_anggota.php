<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_anggota extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_anggota");
		// $this->load->model("m_secure");
		// $this->m_secure->secure();
	}

	function index()
	{
		$content['main_content'] = 'admin/admin_anggota/admin_page_anggota_robotik.php';
		$this->load->view('admin/dashboard.php',$content);
	}

	function data_pti()
	{
		$content['main_content'] = 'admin/admin_anggota/admin_page_anggota_pti.php';
		$this->load->view('admin/dashboard.php',$content);
	}

	function get_anggota_ajax()
	{	
		$list_anggota = $this->m_anggota->get_anggota();
		echo json_encode($list_anggota);
		
	}

	function get_anggota_byid_ajax()
	{	
		$id = $this->input->get('id');
		$list_anggota_byid = $this->m_anggota->get_anggota_by($id);
		echo json_encode($list_anggota_byid);
		
	}

	function delete_anggota_byid_ajax($id)
	{	
		$this->m_anggota->get_anggota_delete($id);
		echo json_encode(array("status" => TRUE));
		
	}

	function add_anggota()
	{
		$content['main_content'] = 'admin/admin_anggota/insert_page_anggota.php';
		$this->load->view('admin/dashboard.php',$content);
	}

	function insert_anggota(){
		$id = $this->uri->segment(4);
		$data = array();
		if(isset($id)){
		$row = $this->m_anggota->get_anggota_by($id);
				$data = array(
						'labelanggota' => 'UPDATE DATA anggota',
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
						'main_content' => 'admin/admin_anggota/insert_page_anggota.php'
						);
		
		}else{
				$data = array(
						'labelanggota' => 'INSERT DATA anggota',
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
						'main_content' => 'admin/admin_anggota/insert_page_anggota.php'
						);	
		}

		$this->load->view('admin/dashboard',$data);


	}

	function save_anggota(){
		
		$config['upload_path']          = './assets/img/anggota/';
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
			$this->m_anggota->save_anggota($data);
		}else{
			$this->m_anggota->update_anggota($data,$id);
		}

		redirect('/admin/page_anggota/','refresh');
	}

}
