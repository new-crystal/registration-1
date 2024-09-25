<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Model
{
    public function get_speaker()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.attendance_status = 'Y' AND a.attendance_type = '연자'
            ORDER BY a.id ASC
            ");
            return $query->result_array();   
    }

    public function get_chairperson()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.attendance_status = 'Y' AND a.attendance_type = '좌장'
            ORDER BY a.id ASC
            ");
            return $query->result_array();   
    }
    
    public function get_fauclty()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.attendance_status = 'Y' AND a.attendance_type = '임원'
            ORDER BY a.id ASC
            ");
            return $query->result_array();   
    }

    public function get_participant()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.attendance_status = 'Y' AND a.attendance_type = '일반참가자' AND a.onsite_reg = 0
            ORDER BY a.id ASC
            ");
            return $query->result_array();   
    }

    public function get_on_participant()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.attendance_status = 'Y' AND a.attendance_type = '일반참가자' AND a.onsite_reg = 1
            ORDER BY a.id ASC
            ");
            return $query->result_array();   
    }

    public function get_other()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.attendance_status = 'Y' AND a.attendance_type != '연자' AND a.attendance_type != '좌장' AND a.attendance_type != '임원' AND a.attendance_type != '일반참가자' AND a.onsite_reg = 0
            ORDER BY a.id ASC
            ");
            return $query->result_array();   
    }

    public function get_on_other()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.attendance_status = 'Y' AND a.attendance_type = '일반참가자' AND a.onsite_reg = 1
            ORDER BY a.id ASC
            ");
            return $query->result_array();   
    }

}

?>
