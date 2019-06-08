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
						'nama_lengkap' => $row->nama_lengkap,
						'ttl' => $row->ttl,
						'jenis_kelamin' => $row->jenis_kelamin,
						'nomer_hp' => $row->nomer_hp,
						'email' => $row->email,
						'bidang' => $row->bidang,
						'angkatan' => $row->angkatan,
						'alamat' => $row->alamat,
						'tempat_bekerja' => $row->tempat_bekerja,
						'jabatan' => $row->jabatan,
						'universitas' => $row->universitas,
						'fakultas' => $row->fakultas,
						'jurusan' => $row->jurusan,
						'semester' => $row->semester,
						'facebook' => $row->facebook,
						'instagram' => $row->instagram,
						'wa' => $row->wa,
						'telegram' => $row->telegram,
						'line' => $row->line,
						'twitter' => $row->twitter,
						'motto' => $row->motto,
						'pesan' => $row->pesan,
						'foto' => $row->foto,
						'main_content' => 'admin/admin_alumni/insert_page_alumni.php'
						);
		
		}else{
				$data = array(
						'labelalumni' => 'INSERT DATA ALUMNI',
						'id' => '',
						'nama' => '',
						'nama_lengkap' => '',
						'ttl' => '',
						'jenis_kelamin' => '',
						'nomer_hp' => '',
						'email' => '',
						'bidang' => '',
						'angkatan' => '',
						'alamat' => '',
						'tempat_bekerja' => '',
						'jabatan' => '',
						'universitas' => '',
						'fakultas' => '',
						'jurusan' => '',
						'semester' => '',
						'facebook' => '',
						'instagram' => '',
						'wa' => '',
						'telegram' => '',
						'line' => '',
						'twitter' => '',
						'motto' => '',
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
		//$config['file_name']        	= time().'.jpg';
		$config['file_ext']      		= '.jpg';


		$this->load->library('upload', $config);
		$this->upload->do_upload('foto');

		$id = $this->input->post('id');
		$foto_load = 'http://localhost/silari-admin/assets/img/'.$this->upload->data('file_name');

		$data = array(
			'nama' => $this->input->post('nama'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'ttl' => $this->input->post('ttl'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nomer_hp' => $this->input->post('nomer_hp'),
			'email' => $this->input->post('email'),
			'bidang' => $this->input->post('bidang'),
			'angkatan' => $this->input->post('angkatan'),
			'alamat' => $this->input->post('alamat'),
			'tempat_bekerja' => $this->input->post('tempat_bekerja'),
			'jabatan' => $this->input->post('jabatan'),
			'universitas' => $this->input->post('universitas'),
			'fakultas' => $this->input->post('fakultas'),
			'jurusan' => $this->input->post('jurusan'),
			'semester' => $this->input->post('semester'),
			'facebook' => $this->input->post('facebook'),
			'instagram' => $this->input->post('instagram'),
			'wa' => $this->input->post('wa'),
			'telegram' => $this->input->post('telegram'),
			'line' => $this->input->post('line'),
			'twitter' => $this->input->post('twitter'),
			'motto' => $this->input->post('motto'),
			'pesan' => $this->input->post('pesan'),
			'foto' => $this->upload->data('file_name'),
			'url_foto' => 'http://localhost/silari-admin/assets/img/'.$this->upload->data('file_name')
			//'foto' => $this->input->post('foto')
			);

		if( $id == '' ){
			$this->m_alumnus->save_alumnus($data);
			$this->session->set_flashdata('info','Data alumni berhasil diinput');
		}else{
			$this->m_alumnus->update_alumnus($data,$id);
			$this->session->set_flashdata('info','Data alumni berhasil diupdate');
		}

		redirect('/admin/page_alumni/','refresh');
	}

}
