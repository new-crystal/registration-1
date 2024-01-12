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
        $query = $this->db->query("SELECT * FROM `abstracts` ORDER BY `sum`desc");
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


    public function get_sum(){
        $query = $this->db->query("
            SELECT *
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
        ");
		return $query->result_array();
    }

    public function get_detail($where){
        $query = $this->db->query("
            SELECT *
            FROM abstract_score a
            LEFT JOIN (
                SELECT *
                FROM abstract_reviewer
            ) b ON a.reviewer_idx = b.idx
            LEFT JOIN (
                SELECT *
                FROM abstracts
                GROUP BY idx
            ) c ON a.abstract_idx = c.idx
            WHERE a.abstract_idx = " . $where['abstract_idx']
        );
        return $query->result_array();
    }
    

}

?>
