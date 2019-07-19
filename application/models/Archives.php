<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Archives extends CI_Model
{
	private $table = 'archive';
	private $id = 'idArchi';

	function get_all_archives_count()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_all_archives($params = array())
	{
		$this->db->order_by($this->id, 'desc');
		if(isset($params) && !empty($params))
		{
			$this->db->limit($params['limit'], $params['offset']);
		}
		return $this->db->get($this->table)->result();
	}

	function get_archive($id){
		return $this->db->get_where($this->table,array($this->id => $id))->row();
	}

	function add_archive($archive){
		$this->db->insert($this->table, $archive);
		return $this->db->insert_id();
	}

	function update_archive($id, $archive){
		$this->db->where($this->id, $id);
		return $this->db->update($this->table, $archive);
	}

	function delete_archive($id){
		return $this->db->delete($this->table, array($this->id => $id));
	}
}
