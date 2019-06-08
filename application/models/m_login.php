<?php  
 
class M_login extends CI_Model {
	
    function m_save_admin($data_admin)
    {
        $this->db->insert('admin_laboratcall',$data_admin);
        $register_admin_silari = $this->db->affected_rows();

        if($register_admin_silari)
        {
            redirect('admin/login_admin');
        }else{
            redirect('admin/login_admin/register_admin');
            $this->session->set_flashdata('peringatan','Register anda di gagal, silahkan register kembali');
        }
    }

    function m_validation_admin($username,$password)
    {
        $this->db->where('username',$username);
        $usr_validation = $this->db->get('admin_laboratcall');
        
        if($usr_validation->num_rows() >0)
		{
			foreach ($usr_validation->result() as $row) {
				$sess = array(
                            'id' => $row->id,
							'nama' => $row->nama,
                            'username' => $row->username,
                            'pasword'=> $row->password
                            );
                // $password_encryption = $row->password;
                // $password_decryption = $this->encrypt->decode($password_encryption);
                $this->session->set_userdata($sess);
                foreach ($usr_validation->result() as $row) {
                $nama_admin = $row->nama;
                $this->session->set_flashdata('username',$nama_admin);
                }
                redirect('admin/main_admin');
			}
            // if($password == $password_decryption)
            // {
            //     $this->session->set_userdata($sess);
            //     foreach ($usr_validation->result() as $row) {
            //     $nama_admin = $row->nama;
            //     $this->session->set_flashdata('username',$nama_admin);
            //     }
            //     redirect('admin/main_admin');
            // }
            // else
            // {
            //     $this->session->set_flashdata('peringatan','Password salah, silahkan login lagi');
			//     redirect('admin/login_admin');
            // }
            
		}else{
            $this->session->set_flashdata('peringatan','Username salah, silahkan login lagi');
			redirect('admin/login_admin');
		}

        
    }
}
?>