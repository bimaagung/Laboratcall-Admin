<?php  
 
class M_user_admin extends CI_Model {

	
	function get_admin_by($id)
	{
		$this->db->where('id',$id);
		$data = $this->db->get('admin_silari');
		return $data->row();
	}

	function m_update_admin($data_admin,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('admin_silari',$data_admin);

		redirect('admin/setting_admin');
	}

}
?>