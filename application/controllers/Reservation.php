<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

class Reservation extends CI_Controller {
	private $sheets;
	private $data;

	public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Seoul');
        $this->load->model('room');
    }

	public function login()
    {
        $user_id = $this->input->post("user_id");
        $user_pass = $this->input->post("user_pass");

        if ($user_id == RESERVATION_ID && $user_pass == RESERVATION_PASS) {
            $this->session->set_userdata('reservation_data', array(
                'logged_in' => true
            ));
        }
        redirect('reservation');
    }

	public function index()
	{
		if (!isset($this->session->reservation_data['logged_in']))
			$this->load->view('reservation/login');
		else {
			$data['day1_users'] = $this->room->get_reservations();
			$data['day2_users'] = $this->room->get_reservations2();
			$this->load->view('reservation/main.php', $data);
		}
	}
	public function send_msm()
    {
		$timeId = $_GET['n'];
		$day = $_GET['d'];
		
		$where = array(
			'time_id' => $timeId,
			'day' => $day
		);
		$info = array(
			'chk_msm' =>  'Y'
		);
		$this->room->update_msm_status($info, $where);
		$data['users'] = $this->room->get_user($where);
		$this->load->view('reservation/send_msm', $data);
    }

	public function user()
	{
		$data['day1_users'] = $this->room->get_reservations();
		$data['day2_users'] = $this->room->get_reservations2();
		$this->load->view('reservation/user.php', $data);
	}

	public function post_user1()
	{	
	   // UTF-8 인코딩 헤더 설정
	   header('Content-Type: application/json; charset=utf-8');

	   // JSON 데이터를 받음
	   $inputData = file_get_contents('php://input');
	   $decodedData = json_decode($inputData, true);
   
	   if ($decodedData) {
		   $reservations = $decodedData['reservations'];
   
		   // 예약자 정보를 저장할 배열
		   $info = [];
   
		   // 예약 정보를 배열에 추가
		   foreach ($reservations as $reservation) {
			   $info[] = array(
				   'time_id' => $reservation['time_id'],  // 모든 예약 항목에 time_id 추가
				   'day' => $reservation['day'],
				   'nickname' => $reservation['nickname'],
				   'phone' => $reservation['phone']
			   );
		   }
   
		   // DB 업데이트 실행
		   $this->room->insert_name($info);
   
		   // JSON 응답 전송
		   echo json_encode(array("status" => "success", "message" => "Data updated successfully"), JSON_UNESCAPED_UNICODE);
	   } else {
		   echo json_encode(array("status" => "error", "message" => "Invalid JSON data"), JSON_UNESCAPED_UNICODE);
	   }
	}

	public function fetch_user()
	{	
	   // UTF-8 인코딩 헤더 설정
	   header('Content-Type: application/json; charset=utf-8');

	   // JSON 데이터를 받음
	   $inputData = file_get_contents('php://input');
	   $decodedData = json_decode($inputData, true);
   
	   if ($decodedData) {
		//    $timeId = $decodedData['time_id'];
		   $reservations = $decodedData['reservations'];
		//    $day = $decodedData['day'];
   
		   // 예약자 정보를 저장할 배열
		   $info = [];
   
		   // 예약 정보를 배열에 추가
		   foreach ($reservations as $reservation) {
			   $info[] = array(
				   'time_id' => $reservation['time_id'],  // 모든 예약 항목에 time_id 추가
				   'day' => $reservation['day'],
				   'nickname' => $reservation['nickname'],
				   'phone' => $reservation['phone']
			   );
		   }
   
		   // DB 업데이트 실행
		   $this->room->update_name($info);
   
		   // JSON 응답 전송
		   echo json_encode(array("status" => "success", "message" => "Data updated successfully"), JSON_UNESCAPED_UNICODE);
	   } else {
		   echo json_encode(array("status" => "error", "message" => "Invalid JSON data"), JSON_UNESCAPED_UNICODE);
	   }
	}


}
