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

	public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Seoul');
        $this->load->model('users');
        $this->load->model('entrance');
        $this->load->model('schedule');
        ini_set('memory_limit', '-1');
        $this->load->library("time_spent");
        $this->load->config('common');
    }

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

	public function get_users_etc()
	{
		
		$query = $this->db->query("
		SELECT *
			FROM users a
			WHERE a.attendance_type != '좌장' AND a.attendance_type != '임원' AND a.attendance_type != '패널' AND a.attendance_type != '연자' AND a.attendance_type != '일반참석자' AND a.attendance_type != '후원사'
			ORDER BY a.id ASC;
		");
		return $query->result_array();
	}

	public function get_user($where)
	{
		$this->db->where($where);
		return $this->db->get($this->users)->row_array();
	}

	public function get_user_array($where)
	{
		// $this->db->where($where);
		// return $this->db->get($this->users)->result_array();
		$this->db->select('COUNT(*) as count');
		$this->db->from('users');
		$this->db->where('event1', 'Y');
		
		$query = $this->db->get();
		return $query->row()->count;

	}

	public function get_qr_print_user()
	{
		
		$query = $this->db->query("
		SELECT *
			FROM users a
			WHERE a.qr_chk_day_2 = 'Y' OR a.qr_chk_day_1 = 'Y' OR a.qr_chk_day_3 = 'Y'
			ORDER BY a.id ASC;
");
		return $query->result_array();
	}

	public function get_qr_user()
	{
		$day_1 = $this->config->item('day_1');
		$day_2 = $this->config->item('day_2');
		$day_3 = $this->config->item('day_3');

		$query = $this->db->query("
			SELECT a.*, 
			TIME_FORMAT(b.maxtime_day_1, '%H:%i') as maxtime_day_1_formatted,
			TIME_FORMAT(b.mintime_day_1, '%H:%i') as mintime_day_1_formatted,
			TIME_FORMAT(b1.maxtime_day_2, '%H:%i') as maxtime_day_2_formatted,
			TIME_FORMAT(b1.mintime_day_2, '%H:%i') as mintime_day_2_formatted
		FROM users a
		LEFT JOIN (
			SELECT registration_no as qr_registration_no,
				MAX(time) as maxtime_day_1,
				MIN(time) as mintime_day_1,
				TIMEDIFF(MAX(time), MIN(time)) as duration
			FROM access
			WHERE DATE(TIME) = '$day_1'
			GROUP BY registration_no
		) AS b ON a.registration_no = b.qr_registration_no
		LEFT JOIN (
			SELECT registration_no as qr_registration_no,
				MAX(time) as maxtime_day_2,
				MIN(time) as mintime_day_2,
				TIMEDIFF(MAX(time), MIN(time)) as duration
			FROM access
			WHERE DATE(TIME) = '$day_2'
			GROUP BY registration_no
		) AS b1 ON a.registration_no = b1.qr_registration_no
		WHERE a.qr_generated = 'Y' 
		ORDER BY a.id ASC;

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

	// !!! reg no 변경 필요 !!!
	public function add_user($info)
	{
		$this->db->insert($this->users, $info);

		$id = $this->db->insert_id();
		$registration_no = 'KSSO2025-0'. str_pad(substr($id, -3), 3, '0', STR_PAD_LEFT);
		$this->db->where('id', $id);
		$this->db->update($this->users, array('registration_no' => $registration_no));
	}
	// !!! reg no 변경 필요 !!!
	public function add_onsite_user($info)
	{
		$this->db->insert($this->users, $info);

		$id = $this->db->insert_id();
		$registration_no = 'KSSO2025-0'. str_pad(substr($id, -3), 3, '0', STR_PAD_LEFT);
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
		$this->db->where('attendance_type !=', '세틀라이트 등록자');
		return $this->db->get($this->users)->result_array();
	}

	//participant page 재사용 함수
	public function get_access_user($where)
	{
		$this->db->where($where);
		return $this->db->get($this->users)->result_array();
	}

	//날짜 변경 필요!!!
	//faculty page / 일반참석자, 기자 제외
	public function get_faculty()
	{
		$day_1 = $this->config->item('day_1');
		$day_2 = $this->config->item('day_2');
		$day_3 = $this->config->item('day_3');
		
		$query = $this->db->query("
		SELECT *, time_format(b.duration,'%H시간 %i분') as d_format
		FROM users a
		LEFT JOIN (
			SELECT registration_no as qr_registration_no,
				MIN(time) as mintime_day_1,
				TIMEDIFF(MAX(time), MIN(time)) as duration
			FROM access
			 WHERE DATE(TIME) = '$day_1'
			GROUP BY registration_no
		) b ON a.registration_no = b.qr_registration_no
		LEFT JOIN (
			SELECT registration_no as qr_registration_no,
				MIN(time) as mintime_day_2,
				TIMEDIFF(MAX(time), MIN(time)) as duration
			FROM access
			 WHERE DATE(TIME) = '$day_2'
			GROUP BY registration_no
		) b1 ON a.registration_no = b1.qr_registration_no
		LEFT JOIN (
			SELECT registration_no as qr_registration_no,
				MIN(time) as mintime_day_3,
				TIMEDIFF(MAX(time), MIN(time)) as duration
			FROM access
			 WHERE DATE(TIME) = ". $day_3 ."
			GROUP BY registration_no
		) b2 ON a.registration_no = b2.qr_registration_no
		WHERE a.qr_generated = 'Y' AND a.deposit = '결제완료' AND a.attendance_type != '일반참석자' AND a.attendance_type != '기자' AND a.attendance_type != '세틀라이트 등록자'
		ORDER BY a.id ASC
");
		return $query->result_array();
	}
		/**speaker */
		public function get_access_on_speaker_1()
		{
			$query = $this->db->query("
				SELECT *
				FROM users a
				WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '연자' AND a.onsite_reg = 1
		");
			return $query->result_array();
		}

		public function get_access_on_speaker_2()
		{
			$query = $this->db->query("
				SELECT *
				FROM users a
				WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '연자' AND a.onsite_reg = 1
		");
			return $query->result_array();
		}

		// public function get_access_on_speaker_3()
		// {
		// 	$query = $this->db->query("
		// 		SELECT *
		// 		FROM users a
		// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type = '연자' AND a.onsite_reg = 1
		// ");
		// 	return $query->result_array();
		// }

			/**day 1 access */
			public function get_access_speaker_1()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '연자' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			public function get_access_speaker_2()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '연자' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			// public function get_access_speaker_3()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type = '연자' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }


				/** chairperson */
		public function get_access_on_chairperson_1()
		{
			$query = $this->db->query("
				SELECT *
				FROM users a
				WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '좌장' AND a.onsite_reg = 1
		");
			return $query->result_array();
		}

		public function get_access_on_chairperson_2()
		{
			$query = $this->db->query("
				SELECT *
				FROM users a
				WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '좌장' AND a.onsite_reg = 1
		");
			return $query->result_array();
		}

		// public function get_access_on_chairperson_3()
		// {
		// 	$query = $this->db->query("
		// 		SELECT *
		// 		FROM users a
		// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type = '좌장' AND a.onsite_reg = 1
		// ");
		// 	return $query->result_array();
		// }

			/** chairperson */
			public function get_access_chairperson_1()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '좌장' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			public function get_access_chairperson_2()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '좌장' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			// public function get_access_chairperson_3()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type = '좌장' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }

			
				/** panel */
		public function get_access_on_panel_1()
		{
			$query = $this->db->query("
				SELECT *
				FROM users a
				WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '패널' AND a.onsite_reg = 1
		");
			return $query->result_array();
		}

		public function get_access_on_panel_2()
		{
			$query = $this->db->query("
				SELECT *
				FROM users a
				WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '패널' AND a.onsite_reg = 1
		");
			return $query->result_array();
		}

		// public function get_access_on_panel_3()
		// {
		// 	$query = $this->db->query("
		// 		SELECT *
		// 		FROM users a
		// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type = '패널' AND a.onsite_reg = 1
		// ");
		// 	return $query->result_array();
		// }

			/** panel */
			public function get_access_panel_1()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '패널' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			public function get_access_panel_2()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '패널' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			// public function get_access_panel_3()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type = '패널' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }

							/** faculty */
		public function get_access_on_faculty_1()
		{
			$query = $this->db->query("
				SELECT *
				FROM users a
				WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.onsite_reg = 1
		");
			return $query->result_array();
		}

		public function get_access_on_faculty_2()
		{
			$query = $this->db->query("
				SELECT *
				FROM users a
				WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.onsite_reg = 1
		");
			return $query->result_array();
		}

		// public function get_access_on_faculty_3()
		// {
		// 	$query = $this->db->query("
		// 		SELECT *
		// 		FROM users a
		// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type = '임원' AND a.onsite_reg = 1
		// ");
		// 	return $query->result_array();
		// }

			/** faculty */
			public function get_access_faculty_1()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			public function get_access_faculty_2()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			// public function get_access_faculty_3()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type = '임원' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }
	

			/** satellite 1 (동아ST)*/
			public function get_access_satellite_1_1()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.etc1 = 'satellite1' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			public function get_access_satellite_2_1()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.etc1 = 'satellite1' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			// public function get_access_satellite_3_1()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type = '일반참석자' AND a.remark1 LIKE '%세틀1%' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }

			
			/** satellite 2 (종근당)*/
			public function get_access_satellite_1_2()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.etc1 = 'satellite2' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			public function get_access_satellite_2_2()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.etc1 = 'satellite2' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			// public function get_access_satellite_3_2()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type = '일반참석자' AND a.remark1 LIKE '%세틀2%' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }

				
			/** satellite 3 (대웅바이오)*/
			// public function get_access_satellite_1_3()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type LIKE '%세틀라이트%'  AND a.remark1 LIKE '%대웅바이오%' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }
	
			// public function get_access_satellite_2_3()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type LIKE '%세틀라이트%'  AND a.remark1 LIKE '%대웅바이오%' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }
	
			// public function get_access_satellite_3_3()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type LIKE '%세틀라이트%'  AND a.remark1 LIKE '%대웅바이오%' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }
	
				
			// /** satellite 4 (오가논)*/
			// public function get_access_satellite_1_4()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type LIKE '%세틀라이트%' AND a.remark1 LIKE '%오가논%' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }
	
			// public function get_access_satellite_2_4()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type LIKE '%세틀라이트%' AND a.remark1 LIKE '%오가논%' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }
	
			// public function get_access_satellite_3_4()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type LIKE '%세틀라이트%' AND a.remark1 LIKE '%오가논%' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }
			/** satellite 1 (동아ST)*/
			public function get_access_on_satellite_1_1()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.etc1 = 'satellite1' AND a.onsite_reg = 1
			");
				return $query->result_array();
			}
	
			public function get_access_on_satellite_2_1()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.etc1 = 'satellite1' AND a.onsite_reg = 1
			");
				return $query->result_array();
			}
	
			// public function get_access_satellite_3_1()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type = '일반참석자' AND a.remark1 LIKE '%세틀1%' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }

			
			/** satellite 2 (종근당)*/
			public function get_access_on_satellite_1_2()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.etc1 = 'satellite2' AND a.onsite_reg = 1
			");
				return $query->result_array();
			}
	
			public function get_access_on_satellite_2_2()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.etc1 = 'satellite2' AND a.onsite_reg = 1
			");
				return $query->result_array();
			}
	
		/** Participant	 */
		public function get_access_on_participant_1()
		{
			$query = $this->db->query("
				SELECT *
				FROM users a
				WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.onsite_reg = 1 AND COALESCE(a.etc1, '') = '';
		");
			return $query->result_array();
		}

		public function get_access_on_participant_2()
		{
			$query = $this->db->query("
				SELECT *
				FROM users a
				WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.onsite_reg = 1 AND COALESCE(a.etc1, '') = '';
		");
			return $query->result_array();
		}

		// public function get_access_on_participant_3()
		// {
		// 	$query = $this->db->query("
		// 		SELECT *
		// 		FROM users a
		// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type  = '일반참석자' AND a.onsite_reg = 1
		// ");
		// 	return $query->result_array();
		// }

		

			/** Participant */
			public function get_access_participant_1()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.onsite_reg = 0 AND COALESCE(a.etc1, '') = '';
			");
				return $query->result_array();
			}
	
			public function get_access_participant_2()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type  = '일반참석자' AND a.onsite_reg = 0  AND COALESCE(a.etc1, '') = '';
			");
				return $query->result_array();
			}
	
			// public function get_access_participant_3()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type  = '일반참석자' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }
	
			
		/** other	 */
		public function get_access_on_other_1()
		{
			$query = $this->db->query("
				SELECT *
				FROM users a
				WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type != '연자' AND a.attendance_type != '좌장' AND a.attendance_type != '패널' AND a.attendance_type != '임원' AND a.attendance_type != '일반참석자' AND a.onsite_reg = 1
		");
			return $query->result_array();
		}

		public function get_access_on_other_2()
		{
			$query = $this->db->query("
				SELECT *
				FROM users a
				WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type != '연자' AND a.attendance_type != '좌장' AND a.attendance_type != '패널' AND a.attendance_type != '임원' AND a.attendance_type != '일반참석자'AND a.onsite_reg = 1
		");
			return $query->result_array();
		}

		// public function get_access_on_other_3()
		// {
		// 	$query = $this->db->query("
		// 		SELECT *
		// 		FROM users a
		// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type != '연자' AND a.attendance_type != '좌장' AND a.attendance_type != '패널' AND a.attendance_type != '임원' AND a.attendance_type != '일반참석자' AND a.onsite_reg = 1
		// ");
		// 	return $query->result_array();
		// }

			/** other */
			public function get_access_other_1()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type != '연자' AND a.attendance_type != '좌장' AND a.attendance_type != '패널' AND a.attendance_type != '임원' AND a.attendance_type != '일반참석자' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			public function get_access_other_2()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type != '연자' AND a.attendance_type != '좌장' AND a.attendance_type != '패널' AND a.attendance_type != '임원' AND a.attendance_type != '일반참석자' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
	
			// public function get_access_other_3()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.attendance_type != '연자' AND a.attendance_type != '좌장' AND a.attendance_type != '패널' AND a.attendance_type != '임원' AND a.attendance_type != '일반참석자' AND a.attendance_type NOT LIKE '%satellite%' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }

			/** day 1 */
			public function get_access_day_1()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
			
			/** day 1 */
			public function get_access_on_day_1()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1
			");
				return $query->result_array();
			}

			/** day 2 */
			public function get_access_day_2()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0
			");
				return $query->result_array();
			}
			
			/** day 2 */
			public function get_access_on_day_2()
			{
				$query = $this->db->query("
					SELECT *
					FROM users a
					WHERE a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1
			");
				return $query->result_array();
			}

			/** day 3 */
			// public function get_access_day_3()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.onsite_reg = 0
			// ");
			// 	return $query->result_array();
			// }
			
			/** day 3 */
			// public function get_access_on_day_3()
			// {
			// 	$query = $this->db->query("
			// 		SELECT *
			// 		FROM users a
			// 		WHERE a.qr_chk_day_3 = 'Y' AND a.onsite_reg = 1
			// ");
			// 	return $query->result_array();
			// }
	
}

/* SQL 오류 (1064): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM
		users u
	JOIN
		access a ON u.registration_no = a.registration_no
	GR' at line 5 */