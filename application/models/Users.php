<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model
{
	private $table = 'utilisateur';
	private $id = 'id';

	function connectUser($pseudo, $mdp)
	{
		return $this->db->get_where($this->table, array('login' => $pseudo, 'mdp' => $mdp))->row();
	}

	function get_all_users_count()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_all_users($params = array())
	{
		$this->db->order_by($this->id, 'desc');
		if(isset($params) && !empty($params))
		{
			$this->db->limit($params['limit'], $params['offset']);
		}
		return $this->db->get($this->table)->result();
	}

	function get_user($id){
		return $this->db->get_where($this->table,array($this->id => $id))->row();
	}

	function add_user($user){
		$this->db->insert($this->table, $user);
		return $this->db->insert_id();
	}

	function update_user($id, $user){
		$this->db->where($this->id, $id);
		return $this->db->update($this->table, $user);
	}

	function delete_user($id){
		return $this->db->delete($this->table, array($this->id => $id));
	}
}
