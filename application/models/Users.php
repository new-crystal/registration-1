<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Model
{
	private $users = "users";
	private $abstracts = "abstracts";
	private $abstractsBase = "ABSTRACT_BASE";
	private $abstractsAffiliation = "ABSTRACT_AFFILIATION";
	private $abstractsAuthor = "ABSTRACT_AUTHOR";
	private $upload_file = "upload_file";

	public function get_users()
	{
		return $this->db->get($this->users)->result_array();
	}

	public function get_users_time()
	{
		$query = $this->db->query("
    SELECT *, time_format(b.duration,'%H시간 %i분') as d_format
    FROM users a
    LEFT JOIN (
        SELECT registration_no as qr_registration_no,
            MAX(time) as maxtime,
            MIN(time) as mintime,
            TIMEDIFF(MAX(time), MIN(time)) as duration
        FROM access
        GROUP BY registration_no
    ) b ON a.registration_no = b.qr_registration_no
    ORDER BY a.id ASC
");
		return $query->result_array();
	}


	public function get_abstracts_users()
	{
		$query = $this->db->query("select ab.*, uf.* from abstracts as ab left join upload_file as uf on ab.file_no = uf.idx");

		return $query->result_array();
	}


	public function get_user_check($userId)
	{
		$this->db->where_in('id', $userId);
		$this->db->order_by('nick_name');
		return $this->db->get($this->users)->result_array();
	}

	public function get_users_order($order_by, $where)
	{
		$this->db->where($where);
		$this->db->order_by($order_by);
		return $this->db->get($this->users)->result_array();
	}

	public function get_user($where)
	{
		$this->db->where($where);
		return $this->db->get($this->users)->row_array();
	}
	public function get_qr_print_user()
	{
		
		$query = $this->db->query("
		SELECT *
			FROM users a
			WHERE a.qr_chk_day_2 = 'Y' OR a.qr_chk_day_1 = 'Y'
			ORDER BY a.id ASC;
");
		return $query->result_array();
	}

	public function get_qr_user()
	{
		$query = $this->db->query("
		SELECT *, time_format(b.duration,'%H시간 %i분') as d_format
		FROM users a
		LEFT JOIN (
			SELECT registration_no as qr_registration_no,
				MAX(time) as maxtime,
				MIN(time) as mintime,
				TIMEDIFF(MAX(time), MIN(time)) as duration
			FROM access
			WHERE DATE(TIME) = CURDATE()
			GROUP BY registration_no
		) b ON a.registration_no = b.qr_registration_no
		WHERE a.qr_generated = 'Y' AND a.deposit = '결제완료'
		ORDER BY a.id ASC
");
		return $query->result_array();
	}

	public function get_mail_user()
	{
		$query = $this->db->query("
		SELECT *
		FROM users a
		WHERE a.QR_MAIL_SEND_YN = 'N'
		");

		return $query->result_array();
	}

	public function add_user($info)
	{
		$this->db->insert($this->users, $info);

		$id = $this->db->insert_id();
		$registration_no = 'KSSO2024-' . str_pad($id, 4, '0', STR_PAD_LEFT);
		$this->db->where('id', $id);
		$this->db->update($this->users, array('registration_no' => $registration_no));
	}

	public function add_onsite_user($info)
	{
		$this->db->insert($this->users, $info);

		$id = $this->db->insert_id();
		$registration_no = 'KSSO2024-' . str_pad($id, 4, '0', STR_PAD_LEFT);
		$this->db->where('id', $id);
		$this->db->update($this->users, array('registration_no' => $registration_no));
	}

	public function add_memo($info, $where)
	{
		$this->db->where($where);
		$ret = $this->db->update($this->users, $info);
		return $ret;
	}

	public function del_user($info)
	{
		$this->db->delete($this->users, $info);
	}

	public function num_row($info)
	{
		$this->db->where($info);
		return $this->db->get($this->users)->num_rows();
	}

	public function update_sub_time($info, $where)
	{
		$this->db->where($where);
		$this->db->update($this->users, $info);
	}

	public function update_deposit_status($info, $where)
	{
		$this->db->where($where);
		$this->db->update($this->users, $info);
	}
	public function update_all_deposit_status($info)
	{
		$this->db->update($this->users, $info);
	}

	public function update_qr_status($info, $where)
	{
		$this->db->where($where);
		$this->db->update($this->users, $info);
	}

	public function update_user($info, $where)
	{
		$this->db->where($where);
		$ret = $this->db->update($this->users, $info);
		return $ret;
	}

	public function save_upload($data)
	{
		$result = $this->db->insert($this->abstracts, $data);
		return $result;
	}

	public function insert_file_upload($data2)
	{
		$result = $this->db->insert($this->upload_file, $data2);
		return $result;
	}

	public function get_file_upload($where)
	{
		$this->db->where($where);
		return $this->db->get($this->upload_file)->row_array();
	}


	public function save_upload_abstract_base($data)
	{
		$result = $this->db->insert($this->abstractsBase, $data);
		return $this->db->insert_id();
	}

	public function update_abstract_base($id, $data)
	{
		$this->db->where($id);
		$result = $this->db->update($this->abstractsBase, $data);
		return $result;
	}

	public function get_last_index_abstract_base()
	{
		$query = $this->db->query("SELECT AUTO_INCREMENT AS NEXT_IDX FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'lecture-kscp2023s' AND TABLE_NAME = 'ABSTRACT_BASE'");
		return $query->result();
	}

	public function get_upload_abstract_base($idx)
	{
		$this->db->where_in('idx', $idx);
		return $this->db->get($this->abstractsBase)->result_array();
	}

	public function get_new_abstracts_users()
	{
		$query = $this->db->query("select * from ABSTRACT_BASE");

		return $query->result_array();
	}

	public function get_abstract_base($where)
	{
		$this->db->where($where);
		return $this->db->get($this->abstractsBase)->row_array();
	}

	public function update_msm_status($info, $where)
	{
		$this->db->where($where);
		$this->db->update($this->users, $info);
	}

	public function get_msm_user($where)
	{
		$this->db->where($where);
		return $this->db->get($this->users)->result_array();
	}

	//participant page 재사용 함수
	public function get_access_user($where)
	{
		$this->db->where($where);
		return $this->db->get($this->users)->result_array();
	}

	//날짜 변경 필요!!!
	public function get_faculty()
	{
		$query = $this->db->query("
		SELECT *, time_format(b.duration,'%H시간 %i분') as d_format
		FROM users a
		LEFT JOIN (
			SELECT registration_no as qr_registration_no,
				MIN(time) as mintime_day_1,
				TIMEDIFF(MAX(time), MIN(time)) as duration
			FROM access
			 WHERE DATE(TIME) = '2024-01-29'
			GROUP BY registration_no
		) b ON a.registration_no = b.qr_registration_no
		LEFT JOIN (
			SELECT registration_no as qr_registration_no,
				MIN(time) as mintime_day_2,
				TIMEDIFF(MAX(time), MIN(time)) as duration
			FROM access
			 WHERE DATE(TIME) = '2024-01-31'
			GROUP BY registration_no
		) b1 ON a.registration_no = b1.qr_registration_no
		WHERE a.qr_generated = 'Y' AND a.deposit = '결제완료' AND a.attendance_type != '일반참석자'
		ORDER BY a.id ASC
");
		return $query->result_array();
	}


}

/* SQL 오류 (1064): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM
		users u
	JOIN
		access a ON u.registration_no = a.registration_no
	GR' at line 5 */