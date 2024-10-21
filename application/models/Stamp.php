<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Stamp extends CI_Model
{
    private $stamp = "stamp";
    private $users = "users";
  

	public function get_stamp_counts()
	{
		$query = $this->db->query("
                    SELECT 
                        rr.email, 
                        rr.idx AS member_idx, 
                        CONCAT(rr.last_name, ' ', rr.first_name) AS nickname,
                        COUNT(*) AS total_count,
                        SUM(CASE WHEN eb.grade = 0 THEN 1 ELSE 0 END) AS jomes_count,
                        SUM(CASE WHEN eb.grade = 1 THEN 1 ELSE 0 END) AS poster_count,
                        SUM(CASE WHEN eb.grade = 2 THEN 1 ELSE 0 END) AS diamond_count,
                        SUM(CASE WHEN eb.grade = 3 THEN 1 ELSE 0 END) AS platinum_count,
                        SUM(CASE WHEN eb.grade = 4 THEN 1 ELSE 0 END) AS gold_count,
                        SUM(CASE WHEN eb.grade = 5 THEN 1 ELSE 0 END) AS silver_count,
                        SUM(CASE WHEN eb.grade = 6 THEN 1 ELSE 0 END) AS bronze_count
                    FROM icomes2024.e_booth_log AS ebl
                    LEFT JOIN icomes2024.e_booth AS eb ON ebl.booth_idx = eb.idx
                    LEFT JOIN icomes2024.request_registration AS rr ON rr.register = ebl.member_idx
                    WHERE rr.status IN (2, 5) AND rr.is_deleted = 'N'
                    GROUP BY rr.email, rr.idx, CONCAT(rr.last_name, ' ', rr.first_name);
	");
		return $query->result_array();
	}

    public function get_stamp_access($number){
        $query = $this->db->query("
                    SELECT 
                        rr.email, 
                        rr.idx AS member_idx, 
                        CONCAT(rr.last_name, ' ', rr.first_name) AS nickname,
                        COUNT(*) AS total_count,
                        SUM(CASE WHEN eb.grade = 0 THEN 1 ELSE 0 END) AS jomes_count,
                        SUM(CASE WHEN eb.grade = 1 THEN 1 ELSE 0 END) AS poster_count,
                        SUM(CASE WHEN eb.grade = 2 THEN 1 ELSE 0 END) AS diamond_count,
                        SUM(CASE WHEN eb.grade = 3 THEN 1 ELSE 0 END) AS platinum_count,
                        SUM(CASE WHEN eb.grade = 4 THEN 1 ELSE 0 END) AS gold_count,
                        SUM(CASE WHEN eb.grade = 5 THEN 1 ELSE 0 END) AS silver_count,
                        SUM(CASE WHEN eb.grade = 6 THEN 1 ELSE 0 END) AS bronze_count
                    FROM icomes2024.e_booth_log AS ebl
                    LEFT JOIN icomes2024.e_booth AS eb ON ebl.booth_idx = eb.idx
                    LEFT JOIN icomes2024.request_registration AS rr ON rr.register = ebl.member_idx
                    WHERE rr.status IN (2, 5) AND rr.is_deleted = 'N' AND rr.idx = {$number}
                    GROUP BY rr.email, rr.idx, CONCAT(rr.last_name, ' ', rr.first_name);

                    ");
      return $query -> row_array();
    }

    public function get_comment_access($number){
        $query = $this->db->query("
                    SELECT 
                        rr.idx, 
                        co.is_prize,
                        co.quiz_num
                    FROM 
                        icomes2024.request_registration AS rr
                    LEFT JOIN 
                        icomes2024.comments co ON rr.register = co.member_idx
                    WHERE 
                        rr.status IN (2, 5) 
                        AND rr.is_deleted = 'N' 
                        AND rr.idx = {$number}
                    GROUP BY 
                        rr.idx, co.is_prize, co.quiz_num;
                    ");
      return $query -> result_array();
    }

    public function update_event($info, $where)
	{
		$this->db->where($where);
		$ret = $this->db->update($this->users, $info);
		return $ret;
	}
}
