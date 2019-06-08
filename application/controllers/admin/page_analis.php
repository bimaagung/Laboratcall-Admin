<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_analis extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_analis");
		// $this->load->model("m_secure");
		// $this->m_secure->secure();
	}

	function index()
	{
		$content['main_content'] = 'admin/admin_analis/admin_analis.php';
		$this->load->view('admin/dashboard.php',$content);
	}

	function get_analis_ajax()
	{	
		$list_analis = $this->m_analis->get_analis();
		echo json_encode($list_analis);
		
	}

	function get_analis_byid_ajax()
	{	
		$id = $this->input->get('id');
		$list_analis_byid = $this->m_analis->get_analis_by($id);
		echo json_encode($list_analis_byid);
		
	}

	function delete_analis()
	{	
		$id = $this->uri->segment(4);  
		$this->m_analis->get_analis_delete($id);
		$this->session->set_flashdata('konfirmasi','Data analis berhasil dihapus');
		redirect('/admin/page_analis/','refresh');
		
	}

	function insert_analis(){
		$id = $this->uri->segment(4);
		$data = array();
		if(isset($id)){
		$row = $this->m_analis->get_analis_by($id);

		$tgl_lahir = $row->tanggal_lahir;
		$inittgl_lahir = date_create($tgl_lahir);
		$tanggal_lahir = date_format($inittgl_lahir,"Y-m-d");
				$data = array(
						'labelanalis' => 'Edit Data Analis',
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
						'main_content' => 'admin/admin_analis/insert_page_analis.php'
						);
		
		}else{
				$data = array(
						'labelanalis' => 'Insert Data Analis',
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
						'main_content' => 'admin/admin_analis/insert_page_analis.php'
						);	
		}

		$this->load->view('admin/dashboard',$data);


	}

	function save_analis(){
		
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
				$this->m_analis->save_analis($data);
				$this->session->set_flashdata('konfirmasi','Data analis berhasil ditambah');
				redirect('/admin/page_analis/','refresh');
			}else{
				$this->m_analis->update_analis($data,$id);
				$this->session->set_flashdata('konfirmasi','Data analis berhasil diupdate');
				redirect('/admin/page_analis/','refresh');
			}
	
		}else{
			$this->session->set_flashdata('peringatan','Password tidak sesuai, silahkan ulangi');
			redirect('/admin/page_analis/insert_analis/'.$id,'refresh');
		}

	}

}
