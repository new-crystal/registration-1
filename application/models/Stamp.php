<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Stamp extends CI_Model
{
    private $stamp = "stamp";
    private $users = "users";
  

    public function update_event($info, $where)
	{
		$this->db->where($where);
		$ret = $this->db->update($this->users, $info);
		return $ret;
	}
}
