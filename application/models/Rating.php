<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends CI_Model
{
    private $abstracts = "abstracts";
	private $abstract_reviewer = "abstract_reviewer";
    private $abstract_score = "abstract_score";

   
    public function get_scores()
    {
        $query = $this->db->query("SELECT * FROM `abstract_score` ORDER BY `idx`");
        return $query->result_array();
    }

    public function get_abstracts()
    {
        $query = $this->db->query("SELECT * FROM `abstracts` ORDER BY  `idx` ");
        return $query->result_array();
    }

    public function get_abstracts_sum($where)
    {
        $type = $where["type"]; 
        $query = $this->db->query("SELECT a.abstract_idx, 
                        c.*,
                        SUM(a.score1 + a.score2 + a.score3 + a.score4) AS sum
                FROM abstract_score a
                LEFT JOIN (
                    SELECT *
                    FROM abstracts
                    WHERE type = '$type' 
                    GROUP BY idx
                ) c ON a.abstract_idx = c.idx
                GROUP BY a.abstract_idx
                ORDER BY sum DESC;");
        return $query->result_array();
    }
    

    public function get_abstract_category()
    {
        $query = $this->db->query("SELECT category
        FROM abstracts
        GROUP BY category;");
        return $query->result_array();
    }

    public function get_abstract($where)
    {
        $this->db->where($where);
		return $this->db->get($this->abstracts)->row_array();
    }

    public function get_reviewer($where)
    {
        $this->db->where($where);
		return $this->db->get($this->abstract_reviewer)->result_array();
    }

    public function add_score($info)
    {
        $this->db->insert($this->abstract_score, $info);
    }

    public function update_score($info, $where)
    {
        $this->db->where($where);
		$ret = $this->db->update($this->abstract_score, $info);
		return $ret;
    }

    public function update_score_sum($info, $where)
    {
        $this->db->where($where);
		$ret = $this->db->update($this->abstracts, $info);
		return $ret;
    }

    public function get_detail($where){
        $query = $this->db->query("
                SELECT a.*, b.*, c.*, (a.score1 + a.score2 + a.score3 + a.score4) AS sum
                FROM abstract_score a
                LEFT JOIN (
                SELECT *
                FROM abstract_reviewer
                ) b
                ON a.reviewer_idx = b.idx
                LEFT JOIN (
                SELECT *
                FROM abstracts
                GROUP BY idx
                ) c
                ON a.abstract_idx = c.idx
                WHERE c.idx = " . $where['idx']
        );
        return $query->result_array();
    }
    
    public function get_abstract_excel($where)
    {
        $type = $where["type"]; 
        $category = $where["category"]; 
        $query = $this->db->query("SELECT a.*, subquery.total_sum
        FROM abstracts a
        LEFT JOIN (
            SELECT c.idx, SUM(a.score1 + a.score2 + a.score3 + a.score4) AS total_sum
            FROM abstract_score a
            LEFT JOIN abstracts c ON a.abstract_idx = c.idx
            GROUP BY c.idx
        ) AS subquery ON a.idx = subquery.idx
        WHERE a.category = '$category' AND a.type = '$type'
        ORDER BY subquery.total_sum DESC;");
        return $query->result_array();
    }

    public function get_abstract_excel_title($where)
    {
        $type = $where["type"]; 
        $category = $where["category"]; 
        $query = $this->db->query("SELECT r.idx, r.nick_name
        FROM abstract_reviewer r
        LEFT JOIN abstract_score s ON r.idx = s.reviewer_idx
        LEFT JOIN abstracts a ON s.abstract_idx = a.idx
        WHERE a.type = '$type' AND a.category = '$category'
        ");
        return $query->result_array();
    }
   
}

?>
