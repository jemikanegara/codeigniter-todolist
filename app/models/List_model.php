<?php

class List_model extends CI_Model
{
	public function get_lists()
	{
		$query = $this->db->get('lists');
		return $query->result();
	}

	public function get_list($id)
	{
		$query = $this->db->get_where('lists', array('id' => $id));
		return $query->row();
	}
}

?>
