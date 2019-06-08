<?php  
 
class M_pengguna extends CI_Model {
	

	function get_pasien(){
		return $this->db->get('pasien')->result();
	}

	function get_pasien_by($id){
		$this->db->where('id',$id);
		$data = $this->db->get('pasien');
		return $data->row();
	}

	function get_pasien_delete($id){
		$this->db->where('id', $id);
		$this->db->delete('pasien');
	}

	function save_pasien($data){
		$this->db->insert('pasien',$data);
	}

	function update_pasien($data,$id){
		$this->db->where('id',$id);
		$this->db->update('pasien',$data);
	}

}
?>