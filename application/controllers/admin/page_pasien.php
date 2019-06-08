<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_pasien extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_pasien");
		// $this->load->model("m_secure");
		// $this->m_secure->secure();
	}

	function index()
	{
		$content['main_content'] = 'admin/admin_pasien/admin_pasien.php';
		$this->load->view('admin/dashboard.php',$content);
	}

	function get_pasien_ajax()
	{	
		$list_pasien = $this->m_pasien->get_pasien();
		echo json_encode($list_pasien);
		
	}

	function get_pasien_byid_ajax()
	{	
		$id = $this->input->get('id');
		$list_pasien_byid = $this->m_pasien->get_pasien_by($id);
		echo json_encode($list_pasien_byid);
		
	}

	function delete_pasien()
	{	
		$id = $this->uri->segment(4);  
		$this->m_pasien->get_pasien_delete($id);
		$this->session->set_flashdata('konfirmasi','Data pasien berhasil dihapus');
		redirect('/admin/page_pasien/','refresh');
		
	}

	function insert_pasien(){
		$id = $this->uri->segment(4);
		$data = array();
		if(isset($id)){
		$row = $this->m_pasien->get_pasien_by($id);

		$tgl_lahir = $row->tanggal_lahir;
		$inittgl_lahir = date_create($tgl_lahir);
		$tanggal_lahir = date_format($inittgl_lahir,"Y-m-d");
				$data = array(
						'labelpasien' => 'Edit Data Pasien',
						'id' => $row->id,
						'nama' =>  $row->nama,
						'jenis_kelamin' =>  $row->jenis_kelamin,
						'tanggal_lahir' =>  $tanggal_lahir,
						'tmp_lahir' =>  $row->tmp_lahir,
						'alamat' =>  $row->alamat,
						'username' =>  $row->username,
						'password' =>  $row->password,
						'retype_password' =>  $row->password,
						'foto' =>  $row->foto,
						'main_content' => 'admin/admin_pasien/insert_page_pasien.php'
						);
		
		}else{
				$data = array(
						'labelpasien' => 'Insert Data Pasien',
						'id' => '',
						'nama' => '',
						'jenis_kelamin' => '',
						'tanggal_lahir' => '',
						'tmp_lahir' =>  '',
						'alamat' => '',
						'username' => '',
						'password' => '',
						'retype_password' => '',
						'foto' => '',
						'main_content' => 'admin/admin_pasien/insert_page_pasien.php'
						);	
		}

		$this->load->view('admin/dashboard',$data);


	}

	function save_pasien(){
		
		$config['upload_path']          = './assets/img/anggota/';
		$config['allowed_types']        = 'jpg|png';
		$config['file_name']        	= time();
		$config['file_ext']      		= '.jpg';


		$this->load->library('upload', $config);
		$this->upload->do_upload('foto');
		
		if(!$this->upload->do_upload('foto'))
		{
			$file_name = $this->input->post('foto_lm');
			//$file_name = $this->input->post('foto_lm');
		}else{
			$file_name = $this->upload->data('file_name');
		}

		$id = $this->input->post('id');
		$password_br = $this->input->post('password');
		$password_rtp = $this->input->post('retype_password');
		

		$tanggal = $this->input->post('tanggal_lahir');
		$initdate = date_create($tanggal);
		$tanggal_lahir = date_format($initdate,"d-m-Y");

		if($password_br == $password_rtp)
		{
			$password = $password_br;
			$data = array(
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tanggal_lahir' => $tanggal_lahir,
				'tmp_lahir' => $this->input->post('tmp_lahir'),
				'alamat' => $this->input->post('alamat'),
				'username' => $this->input->post('username'),
				'password' => $password,
				'foto' => $file_name
				);
	
			if( $id == '' ){
				$this->m_pasien->save_pasien($data);
				$this->session->set_flashdata('konfirmasi','Data pasien berhasil ditambah');
				redirect('/admin/page_pasien/','refresh');
			}else{
				$this->m_pasien->update_pasien($data,$id);
				$this->session->set_flashdata('konfirmasi','Data pasien berhasil diupdate');
				redirect('/admin/page_pasien/','refresh');
			}
	
		}else{
			$this->session->set_flashdata('peringatan','Password tidak sesuai, silahkan ulangi');
			redirect('/admin/page_pasien/insert_pasien/'.$id,'refresh');
		}

	}

}
