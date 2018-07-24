<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_secure extends CI_Model {

	public function secure()
	{
		$username = $this->session->userdata('username');
        $this->session->set_flashdata('username',$username);

		if(!isset($username))
		{
			$this->session->sess_destroy();
			redirect('admin/login_admin');
		}
	}

}

/* End of file m_keamanan.php */
/* Location: ./application/models/m_keamanan.php */