<?php  
 
class M_fungsionaris extends CI_Model {
	

	function get_fungsionaris(){
		return $this->db->get('fungsionaris')->result();
	}

	function get_fungsionaris_by($id){
		$this->db->where('id',$id);
		$data = $this->db->get('fungsionaris');
		return $data->row();
	}

	function get_fungsionaris_delete($id){
		$this->db->where('id', $id);
		$this->db->delete('fungsionaris');
	}

	function save_fungsionaris($data){
		$this->db->insert('fungsionaris',$data);
	}

	function update_fungsionaris($data,$id){
		$this->db->where('id',$id);
		$this->db->update('fungsionaris',$data);
	}

}
?>