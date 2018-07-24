<?php  
 
class M_anggota extends CI_Model {
	

	function get_anggota(){
		return $this->db->get('anggota')->result();
	}

	function get_anggota_by($id){
		$this->db->where('id',$id);
		$data = $this->db->get('anggota');
		return $data->row();
	}

	function get_anggota_delete($id){
		$this->db->where('id', $id);
		$this->db->delete('anggota');
	}

	function save_anggota($data){
		$this->db->insert('anggota',$data);
	}

	function update_anggota($data,$id){
		$this->db->where('id',$id);
		$this->db->update('anggota',$data);
	}

}
?>