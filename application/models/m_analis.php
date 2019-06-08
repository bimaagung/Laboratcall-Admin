<?php  
 
class M_analis extends CI_Model {
	

	function get_analis(){
		return $this->db->get('analis')->result();
	}

	function get_analis_by($id){
		$this->db->where('id',$id);
		$data = $this->db->get('analis');
		return $data->row();
	}

	function get_analis_delete($id){
		$this->db->where('id', $id);
		$this->db->delete('analis');
	}

	function save_analis($data){
		$this->db->insert('analis',$data);
	}

	function update_analis($data,$id){
		$this->db->where('id',$id);
		$this->db->update('analis',$data);
	}

}
?>