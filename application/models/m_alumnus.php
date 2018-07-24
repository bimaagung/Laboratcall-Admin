<?php  
 
class M_alumnus extends CI_Model {
	

	function get_alumnus(){
		return $this->db->get('alumnus')->result();
	}

	function get_alumnus_by($id){
		$this->db->where('id',$id);
		$data = $this->db->get('alumnus');
		return $data->row();
	}

	function get_alumnus_delete($id){
		$this->db->where('id', $id);
		$this->db->delete('alumnus');
	}

	function save_alumnus($data){
		$this->db->insert('alumnus',$data);
	}

	function update_alumnus($data,$id){
		$this->db->where('id',$id);
		$this->db->update('alumnus',$data);
	}

}
?>