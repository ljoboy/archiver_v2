<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model
{
	function connectUser($pseudo, $mdp)
	{
		return $this->db->get_where('utilisateur', array('login' => $pseudo, 'mdp' => $mdp))->row();
	}
}
