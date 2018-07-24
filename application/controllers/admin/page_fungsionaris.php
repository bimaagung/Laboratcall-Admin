<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_fungsionaris extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_fungsionaris");
		// $this->load->model("m_secure");
		// $this->m_secure->secure();
	}

	function index()
	{
		$content['main_content'] = 'admin/admin_fungsionaris/admin_page_fungsionaris.php';
		$this->load->view('admin/dashboard.php',$content);
	}

	function get_fungsionaris_ajax()
	{	
		$list_fungsionaris = $this->m_fungsionaris->get_fungsionaris();
		echo json_encode($list_fungsionaris);
		
	}

	function get_fungsionaris_byid_ajax()
	{	
		$id = $this->input->get('id');
		$list_fungsionaris_byid = $this->m_fungsionaris->get_fungsionaris_by($id);
		echo json_encode($list_fungsionaris_byid);
		
	}

	function delete_fungsionaris_byid_ajax($id)
	{	
		$this->m_fungsionaris->get_fungsionaris_delete($id);
		echo json_encode(array("status" => TRUE));
		
	}

	function add_fungsionaris()
	{
		$content['main_content'] = 'admin/admin_fungsionaris/insert_page_fungsionaris.php';
		$this->load->view('admin/dashboard.php',$content);
	}

	function insert_fungsionaris(){
		$id = $this->uri->segment(4);
		$data = array();
		if(isset($id)){
		$row = $this->m_fungsionaris->get_fungsionaris_by($id);
				$data = array(
						'labelfungsionaris' => 'UPDATE DATA fungsionaris',
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
						'main_content' => 'admin/admin_fungsionaris/insert_page_fungsionaris.php'
						);
		
		}else{
				$data = array(
						'labelfungsionaris' => 'INSERT DATA fungsionaris',
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
						'main_content' => 'admin/admin_fungsionaris/insert_page_fungsionaris.php'
						);	
		}

		$this->load->view('admin/dashboard',$data);


	}

	function save_fungsionaris(){
		
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
			$this->m_fungsionaris->save_fungsionaris($data);
		}else{
			$this->m_fungsionaris->update_fungsionaris($data,$id);
		}

		redirect('/admin/page_fungsionaris/','refresh');
	}

}
