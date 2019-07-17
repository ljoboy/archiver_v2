<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model
{
	private $table = 'utilisateur';

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
		$this->db->order_by('id', 'desc');
		if(isset($params) && !empty($params))
		{
			$this->db->limit($params['limit'], $params['offset']);
		}
		return $this->db->get($this->table)->result();
	}

	function get_user($id){
		return $this->db->get_where($this->table,array('id' => $id))->row();
	}
}
