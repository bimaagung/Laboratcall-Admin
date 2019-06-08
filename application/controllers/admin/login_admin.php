<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_login");
	}


	public function index()
	{
		$data = array(
            'action' => site_url('admin/login_admin/validation_admin'),
            'username' => set_value('username'),
            'password' => set_value('password'),
           // 'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            //'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
        );
		$this->load->view('admin/admin_login.php',$data);
	}

	public function register_admin()
	{
		$this->load->view('admin/admin_signup.php');
	}

	public function validation_admin()
	{
		$this->form_validation->set_rules('username', ' ', 'trim|required');
        $this->form_validation->set_rules('password', ' ', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
       // $recaptcha = $this->input->post('g-recaptcha-response');
       // $response = $this->recaptcha->verifyResponse($recaptcha);
 
        // if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
        //     $this->index();
        // } else {
            $username = $this->input->post('username');
			$password = $this->input->post('password');

			$username = htmlentities($username);
			$password = htmlentities($password);

			$this->m_login->m_validation_admin($username,$password);
        // }

	} 

	public function save_admin()
	{
		$password = $this->input->post('password');
		$password_retype = $this->input->post('password_retype');
		
		
		if($password == $password_retype)
		{
			$data_admin = array(
				'id' => '',
				'nama' => $this->input->post('nama'),
				'gender' => $this->input->post('gender'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->encryption->encode($password)
			);

			$this->m_login->m_save_admin($data_admin);

		}else{
			$this->session->set_flashdata('peringatan','Password tidak sesuai, silahkan ulangi');
			redirect('admin/login_admin/register_admin');
		}

		
	}

	public function logout_admin()
	{
		$this->session->sess_destroy();
		redirect('admin/login_admin');
	}

	
}
