<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

class breaktime
{
    public $start;
    public $end;
}

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Seoul');
        $this->load->model('users');
        $this->load->model('entrance');
        $this->load->model('schedule');
        $this->load->model('participant');
        $this->load->model('table');
        $this->load->library("excel");
        $this->load->library("user_agent");
        ini_set('memory_limit', '-1');
        $this->load->library("qrcode_e");
        $this->load->library("time_spent");
        $this->load->config('common');
    }

    public function index()
    {

        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'users';
            $data['users'] = $this->users->get_users_time();

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/users', $data);
        }
        $this->load->view('footer');
    }

    public function qr_user()
    {
        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'user_qr';
            $data['users'] = $this->users->get_qr_user();

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/qr_user', $data);
        }
        $this->load->view('footer');
    }

      
    public function time_day1()
    {
        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'day1';
            $data['users'] = $this->users->get_qr_user();

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/qr_user_day1', $data);
        }
        $this->load->view('footer');
    }

      
    public function time_day2()
    {
        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'day2';
            $data['users'] = $this->users->get_qr_user();

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/qr_user_day2', $data);
        }
        $this->load->view('footer');
    }

      
    public function time_day3()
    {
        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'day3';
            $data['users'] = $this->users->get_qr_user();

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/qr_user_day3', $data);
        }
        $this->load->view('footer');
    }


    public function abstracts()
    {

        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'abstracts';
            $data['abstracts'] = $this->users->get_abstracts_users();

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/abstracts', $data);
        }
        $this->load->view('footer');
    }

    public function login()
    {
        $user_id = $this->input->post("user_id");
        $user_pass = $this->input->post("user_pass");

        if ($user_id == ADMIN_ID && $user_pass == ADMIN_PASS) {
            $this->session->set_userdata('admin_data', array(
                'logged_in' => true
            ));
        }
        redirect('admin');
    }

    public function log_out()
    {
        unset($_SESSION["admin_data"]);
        redirect('admin');
    }

    public function excel_download()
    {
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        $table_columns = array("등록번호", "이름", "의사면허번호", "전문의번호", "이메일",  "휴대폰번호", "근무처", "네임택용 근무처", "회원레벨", "참가유형","세부구분", "숙박신청", "저녁 만찬 및 친교의 시간", "등록금", "등록일","메모");

        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $excel_row = 2;

        $list = $this->users->get_users();

        foreach ($list as $row) {

            // $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, number_format($row['fee']));
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['registration_no']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['nick_name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['licence_number']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['specialty_number']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['email']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['phone']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['org']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['org_nametag']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['member']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['attendance_type']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['member_type']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row['etc1']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row['etc2']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row['fee']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row['time']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row['memo']);


            $excel_row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="학회등록명단.xlsx"');

        header('Cache-Control: max-age=0');

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $object_writer->save('php://output');
    }

    public function excel_download_abstract()
    {
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        $table_columns = array("이름", "이메일", "전화번호", "소속", "파일명", "파일경로", "파일이름", "등록시각");

        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $excel_row = 2;

        $list = $this->users->get_abstracts_users();

        foreach ($list as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['email']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['phone']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['org']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['orig_name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['file_path']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['file_name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['time']);

            $excel_row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="초록제출인원.xlsx"');

        header('Cache-Control: max-age=0');

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $object_writer->save('php://output');
    }


    function deposit_check()
    {

        $regNo = $this->input->post('userId');
       
        foreach ($regNo as $value) {
            // $info = array(
            //     'deposit' =>  '결제완료'
            // );
            // $where = array(
            //     'registration_no' => $value,
            // );
            
            /* QR생성 */
            $info = array(
                'qr_generated' =>  'Y',
                'deposit' => '결제완료'
            );
            $where = array(
                'registration_no' => $value,
                'onsite_reg' => 1
            );
            $this->users->update_deposit_status($info, $where);

            $str = $value;
            $dir = "./assets/images/QR";
            $upload_dir = $dir . '/';
            $filename =  'qrcode_' . $value . '.png';

            // echo getcwd();
            // echo $upload_dir;
            // echo $filename;

            if (is_dir($dir) != true) {
                mkdir($dir, 0700);
            }

            //유효성체크 제거
            $qr_dataUri = $this->qrcode_e->create_QRcode($str, $upload_dir . $filename);
            $this->users->update_qr_status($info, $where);
            /* QR생성 끝 */

            /* PNG to JPG 변환 */
            $image = imagecreatefrompng($upload_dir . 'qrcode_' . $value . '.png');
            $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
            imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
            imagealphablending($bg, TRUE);
            imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
            imagedestroy($image);
            $quality = 100; // 0 = worst / smaller file, 100 = better / bigger file 
            imagejpeg($bg, $upload_dir . 'qrcode_' . $value . '.jpg', $quality);
            imagedestroy($bg);
        }

        $this->load->view('admin/d_success');
    }

    function all_deposit_check()
    {
        $regNo = $this->input->post('userId');

        foreach ($regNo as $value) {
            // $info = array(
            //     'deposit' => '결제완료'
            // );
            // $where = array(
            //     'registration_no' => $value,
            // );
            
            
            /* QR생성 */
            $info = array(
                'qr_generated' =>  'Y',
                'deposit' => '결제완료'
            );
            $where = array(
                'registration_no' => $value,
                'onsite_reg' => 1
            );
            $this->users->update_deposit_status($info, $where);

            $str = $value;
            $dir = "./assets/images/QR";
            $upload_dir = $dir . '/';
            $filename =  'qrcode_' . $value . '.png';

            // echo getcwd();
            // echo $upload_dir;
            // echo $filename;

            if (is_dir($dir) != true) {
                mkdir($dir, 0700);
            }

            //유효성체크 제거
            $qr_dataUri = $this->qrcode_e->create_QRcode($str, $upload_dir . $filename);
            $this->users->update_qr_status($info, $where);
            /* QR생성 끝 */

            /* PNG to JPG 변환 */
            $image = imagecreatefrompng($upload_dir . 'qrcode_' . $value . '.png');
            $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
            imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
            imagealphablending($bg, TRUE);
            imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
            imagedestroy($image);
            $quality = 100; // 0 = worst / smaller file, 100 = better / bigger file 
            imagejpeg($bg, $upload_dir . 'qrcode_' . $value . '.jpg', $quality);
            imagedestroy($bg);
        }
        $this->load->view('admin/d_success');
    }

    function non_deposit_check()
    {
        $regNo = $this->input->post('userId');

        foreach ($regNo as $value) {
            $info = array(
                'deposit' =>  '결제대기'
            );
            $where = array(
                'registration_no' => $value,
                'deposit' => '결제완료'
            );
            $this->users->update_deposit_status($info, $where);
        }

        $this->load->view('admin/non_d_success');
    }


    function qr_generate()
    {
        $regNo = $_GET['n'];
        $info = array(
            'qr_generated' =>  'Y'
        );
        $where = array(
            'registration_no' => $regNo
        );

        $str = $regNo;
        $dir = "././assets/images/QR";
        $upload_dir = $dir . '/';
        $filename =  'qrcode_' . $regNo . '.jpg';

        if (is_dir($dir) != true) {
            mkdir($dir, 0700);
        }


        //유효성체크 제거
        //$rop = array( "options" => array("regexp"=>"/^(\d){9,10,11}$/"));
        //if(filter_var($userPhone, FILTER_VALIDATE_REGEXP, $rop)){
        $qr_dataUri = $this->qrcode_e->create_QRcode($str, $upload_dir . $filename);
        $this->users->update_qr_status($info, $where);
        $this->load->view('admin/qr_success');
        //}
    }


    function qr_generate_all()
    {
        $list = $this->users->get_users();
        $this->load->view('admin/loading');
        //        var_dump($list);

        $dir = "././assets/images/QR";
        $upload_dir = $dir . '/';
        foreach ($list as $row) {
            $regNo = $row['registration_no'];
            $info = array(
                'qr_generated' =>  'Y'
            );
            $where = array(
                'registration_no' => $regNo
            );


            $str = $regNo;
            $filename =  'qrcode_' . $regNo . '.png';

            if (is_dir($dir) != true) {
                mkdir($dir, 0700);
            }

            //유효성체크 제거
            //$rop = array( "options" => array("regexp"=>"/^(\d){9,10,11}$/"));
            //if(filter_var($userPhone, FILTER_VALIDATE_REGEXP, $rop)){
            $qr_dataUri = $this->qrcode_e->create_QRcode($str, $upload_dir . $filename);
            $this->users->update_qr_status($info, $where);
            //}
        }
        $this->load->view('admin/qr_success');
    }


    function qr_layout()
    {

        $this->load->view('admin/header');
        $regNo = $_GET['n'];
        $where = array(
            'registration_no' => $regNo
        );
        $data['users'] = $this->users->get_user($where);
        //                var_dump($data['users']);
        $this->load->view('admin/qr_layout', $data);
    }

    function qr_layout_test()
    {

        $this->load->view('admin/header');
        $regNo = $_GET['n'];
        $where = array(
            'registration_no' => $regNo
        );
        $data['users'] = $this->users->get_user($where);
        //                var_dump($data['users']);
        $this->load->view('admin/qr_layout_test', $data);
    }


    public function qr_layout_all()
    {
        $this->load->view('admin/header');
        $userType = $_GET['type'];

        if ($userType == '08') {
            $data['users'] = $this->users->get_users_etc();
            $this->load->view('admin/qr_layout_all', $data);
        } else {
            if ($userType == '01') {
                $userType = '일반 참가자';
            } else if ($userType == '02') {
                $userType = '임원';
            } else if ($userType == '04') {
                $userType = '패널';
            } else if ($userType == '05') {
                $userType = '연자';
            } else if ($userType == '06') {
                $userType = '좌장';
            } else if ($userType == '07') {
                $userType = '후원사';
            } 

            // if ($userType == '일반참가자') {
            //     // 데이터베이스 쿼리를 통해 '전문의', '전공의', '기타' 중 하나를 만족하는 데이터를 가져옵니다.
            //     $query = $this->db->query("
            //         SELECT *
            //         FROM users a
            //         WHERE a.type = '전문의' OR a.type = '전공의' OR a.type = '기타'
            //         ORDER BY nick_name
            //     ");

            //     // 결과 데이터를 배열로 가져옵니다.
            //     $result = $query->result_array();
            //     $this->load->view('admin/qr_layout_all', array('users' => $result));
            // } else {
            $where = array(
                'attendance_type' => $userType,
                'qr_generated' => "Y"
            );
            $data['item'] = $this->users->get_users_order('nick_name', $where);
            $this->load->view('admin/qr_layout_all', $data);
            // }
        }
    }

    public function qr_layout_post()
    {

        $this->load->view('admin/header');

        $userId = $this->input->post('userId');
        $data['users'] = $this->users->get_user_check($userId);

        //        var_dump($data['users']);

        $this->load->view('admin/qr_layout_all', $data);
    }

    public function user_detail()
    {

        $this->load->view('admin/header');

        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $this->load->helper('form');
            $this->load->library('form_validation');
            //
            $data['primary_menu'] = 'users';
            $userId = $_GET['n'];
            $where = array(
                'registration_no' => $userId
            );
            $data['item'] = $this->users->get_user($where);
            $data['item2'] = $this->entrance->access($where);

            //            var_dump($data['item2']);

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/user_detail', $data);
        }
        $this->load->view('footer');
    }



    public function user_detail_bak()
    {

        $this->load->view('admin/header');

        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $this->load->helper('form');
            $this->load->library('form_validation');
            //
            $data['primary_menu'] = 'users';
            $userId = $_GET['n'];
            $where = array(
                'registration_no' => $userId
            );
            $data['item'] = $this->users->get_user($where);
            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/user_detail_bak', $data);
        }
        $this->load->view('footer');
    }

    public function add_user()
    {

        $this->load->view('admin/header');

        if (!isset($this->session->admin_data['logged_in'])) {
            $this->load->view('admin/login');
        } else {
            //
            $data['primary_menu'] = 'users';
            $this->load->view('admin/left_side.php', $data);
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nick_name', '이름', 'required');
            // $this->form_validation->set_rules('org', '소속', 'required');
            // $this->form_validation->set_rules('phone', '전화번호', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/add_user');
            } else {
                $name = $this->input->post('nick_name');
                $org = $this->input->post('org');
                $phone = $this->input->post('phone') ?? "010-4058-5269";
                $email = $this->input->post('email')?? "sujeong.shin@into-on.com";
                $attendance_type = $this->input->post('attendance_type');
                $member_type = $this->input->post('member_type');
                $occupation_type = $this->input->post('type1');
                // $type1 = $this->input->post('type1');
                // $member = $this->input->post('member');
                $memo = $this->input->post('memo');

                $time = date("Y-m-d H:i:s");
                $uagent = $this->agent->agent_string();

                //            error_log(print_r($name, TRUE), 3, '/tmp/errors.log');

                $etc1 = "";
                if(strpos($attendance_type, "satellite") !== false){
                    $fee = 0;

                    if(strpos($attendance_type, "satellite1") !== false){
                        $attendance_type = "일반참석자";
                        $etc1 = "satellite1";
                    }
                    
                    if(strpos($attendance_type, "satellite2") !== false){
                        $attendance_type = "일반참석자";
                        $etc1 = "satellite2";
                    }
                    
                    // if(strpos($attendance_type, "대웅바이오") !== false){
                    //     $attendance_type = "세틀라이트 등록자";
                    //     $remark1 = "세틀라이트 3(대웅바이오)";
                    // }
                    
                    // if(strpos($attendance_type, "오가논") !== false){
                    //     $attendance_type = "세틀라이트 등록자";
                    //     $remark1 = "세틀라이트 4(오가논)";
                    // }
            }
                $info = array(
                    'nick_name' => preg_replace("/\s+/", "", $name),
                    'org' => trim($org),
                    'org_nametag' => trim($org),
                    'phone' => preg_replace("/\s+/", "", $phone),
                    'email' => preg_replace("/\s+/", "", $email),
                    'attendance_type' => trim($attendance_type),
                    'member_type' => trim($member_type),
                    'occupation_type' => trim($occupation_type),
                    // 'member' => trim($member),
                    'reg_date' => $time,
                    'deposit_date' => $time,
                    'uagent' => $uagent,
                    'deposit' => '결제대기',
                    'memo' => $memo,
                    'onsite_reg' => '1',
                    'etc1' => $etc1
                );
                //                var_dump($info);
                $this->users->add_onsite_user($info);
                $this->load->view('admin/add_success');
            }
        }
        $this->load->view('footer');
    }

    public function memo()
    {

        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $this->load->helper('form');
            $this->load->library('form_validation');
            // 
            $data['primary_menu'] = 'user_qr';
            $userId = $_GET['n'];
            $where = array(
                'registration_no' => $userId
            );
            $data['item'] = $this->users->get_user($where);

            $this->form_validation->set_rules('memo', 'Memo', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/memo', $data);
            } else {

                $memo = $this->input->post('memo');

                if ($memo === "") {
                    $info = array("memo" => null); // 메모 필드를 null로 설정하여 삭제
                } else {
                    $info = array("memo" => $memo);
                }


                $this->users->add_memo($info, $where);
            }
        }
    }

    //sujeong / 닉네임 변경 이벤트
    public function memo_nickname()
    {

        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $this->load->helper('form');
            $this->load->library('form_validation');
            // 
            $data['primary_menu'] = 'user_qr';
            $userId = $_GET['n'];
            $where = array(
                'registration_no' => $userId
            );
            $data['item'] = $this->users->get_user($where);

            $this->form_validation->set_rules('nickname', 'Memo', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/memo_nickname', $data);
            } else {

                $nickname = $this->input->post('nickname');

                if ($nickname === "") {
                    $info = array("nick_name" => null); // 메모 필드를 null로 설정하여 삭제
                } else {
                    $info = array("nick_name" => $nickname);
                }


                $this->users->add_memo($info, $where);
            }
        }
    }

    //sujeong / 소속 변경 이벤트
    public function memo_org()
    {

        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $this->load->helper('form');
            $this->load->library('form_validation');
            // 
            $data['primary_menu'] = 'user_qr';
            $userId = $_GET['n'];
            $where = array(
                'registration_no' => $userId
            );
            $data['item'] = $this->users->get_user($where);

            $this->form_validation->set_rules('org', 'Memo', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/memo_org', $data);
            } else {

                $org = $this->input->post('org');

                if ($org === "") {
                    $info = array("org_nametag" => null); // 메모 필드를 null로 설정하여 삭제
                } else {
                    $info = array("org_nametag" => $org);
                }


                $this->users->add_memo($info, $where);
            }
        }
    }

    public function delete_user()
    {

        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $userId = $_GET['d'];
            $where = array(
                'registration_no' => $userId
            );
            $del_chk = $this->users->num_row($where);
            if ($del_chk == 1) {
                $this->users->del_user($where);
                $this->load->view('admin/user_delete_success');
            } else {
                $this->load->view('admin/user_delete_fail');
            }
            $this->load->view('footer');
        }
    }

    public function update_user()
    {

        $this->load->view('admin/header');

        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $this->load->helper('form');
            $this->load->library('form_validation');
            //
            $data['primary_menu'] = 'users';
            $userId = $_GET['n'];
            $where = array(
                'registration_no' => $userId
            );
            $this->load->view('admin/left_side.php', $data);

            $this->form_validation->set_rules('registration_no', '등록번호', 'required');
            // $this->form_validation->set_rules('phone', '전화번호', 'required');
            // $this->form_validation->set_rules('org', '소속', 'required');

            if ($this->form_validation->run() === FALSE) {
                //                $this->load->view('admin');
            } else {
                $remark1 = $this->input->post('remark1');
                $remark2 = $this->input->post('remark2');
                $remark3 = $this->input->post('remark3');
                $remark4 = $this->input->post('remark4');
                $remark5 = $this->input->post('remark5');
                $remark6 = $this->input->post('remark6');
                $remark7 = $this->input->post('remark7');
                $memo = $this->input->post('memo');
                $deposit_memo = $this->input->post('deposit_memo');
                
                $fee = $this->input->post('fee');
                // $welcome_reception_yn = $this->input->post('welcome_reception_yn');
                // $satellite_yn = $this->input->post('satellite_yn');
                // $breakfast_yn = $this->input->post('breakfast_yn');
                // $luncheon_yn = $this->input->post('luncheon_yn');
                
                $member_type = $this->input->post('member_type');
                $attendance_type = $this->input->post('attendance_type');
                // $type1 = $this->input->post('type1');
                // $type2 = $this->input->post('type2');
                // $is_score1 = $this->input->post('is_score1');
        
                $time = $this->input->post('time');
                $nick_name = $this->input->post('nick_name');
                $org = $this->input->post('org');
                $org_nametag = $this->input->post('org_nametag');
                $member_id = $this->input->post('member_id');
                // $department = $this->input->post('department');

                $licence_number = $this->input->post('licence_number');
                $specialty_number = $this->input->post('specialty_number');
                // $nutritionist_number = $this->input->post('nutritionist_number');
                // $dietitian_number = $this->input->post('dietitian_number');
                // $date_of_birth = $this->input->post('date_of_birth');

                $phone = $this->input->post('phone');
                $email = $this->input->post('email');

                $qr_print = $this->input->post('qr_print');
                $qr_chk_day_1 = $this->input->post('qr_chk_day_1');
                $qr_chk_day_2 = $this->input->post('qr_chk_day_2');
               
                // $conference_info = $this->input->post('conference_info');
                // $deposit_method = $this->input->post('deposit_method');
                $deposit = $this->input->post('deposit');
                //$deposit_date = $this->input->post('deposit_date');
                //$onsite = $this->input->post('onsite_reg');
                $etc1 = $this->input->post('etc1');
                $etc2 = $this->input->post('etc2');
                $etc5 = $this->input->post('etc5');

                if ($memo == "") {
                    $memo = null;
                }

                if(strpos($attendance_type, "Satellite") !== false){
                    $fee = 0;

                    if(strpos($attendance_type, "동아ST") !== false){
                        $attendance_type = "세틀라이트 등록자";
                        $remark1 = "세틀라이트 1(동아ST)";
                    }
                    
                    if(strpos($attendance_type, "종근당") !== false){
                        $attendance_type = "세틀라이트 등록자";
                        $remark1 = "세틀라이트 2(종근당)";
                    }
                    
                    if(strpos($attendance_type, "대웅바이오") !== false){
                        $attendance_type = "세틀라이트 등록자";
                        $remark1 = "세틀라이트 3(대웅바이오)";
                    }
                    
                    if(strpos($attendance_type, "오가논") !== false){
                        $attendance_type = "세틀라이트 등록자";
                        $remark1 = "세틀라이트 4(오가논)";
                    }
            }
                $updateTime = date("Y-m-d H:i:s");
                $info = array(
                    'remark1' => $remark1,
                    'remark2' => $remark2,
                    'remark3' => $remark3,
                    'remark4' => $remark4,
                    'remark5' => $remark5,
                    'remark6' => $remark6,
                    'remark7' => $remark7,
                    'memo' => $memo,
                    'deposit_memo' => $deposit_memo,
                    'fee' => $fee,
                    // 'welcome_reception_yn' => $welcome_reception_yn,
                    // 'satellite_yn' => $satellite_yn,
                    // 'breakfast_yn' => $breakfast_yn,
                    // 'luncheon_yn' => $luncheon_yn,
                    'nick_name' => $nick_name,
                    'org' => $org,
                    'org_nametag' => $org_nametag,
                    'member_id' => $member_id,
                    // 'department' => $department,
                    'member_type' => $member_type,
                    'attendance_type' => $attendance_type,
                    // 'type1' => $type1,
                    // 'is_score1' => $is_score1,
                    'licence_number' => $licence_number,
                    'specialty_number' => $specialty_number,
                    // 'nutritionist_number' => $nutritionist_number,
                    // 'dietitian_number' => $dietitian_number,
                    // 'date_of_birth' => $date_of_birth,
                    'phone' => $phone,
                    'email' => $email,
                    'qr_print' => $qr_print,
                    'qr_chk_day_1' => $qr_chk_day_1,
                    'qr_chk_day_2' => $qr_chk_day_2,
                    // 'conference_info' => $conference_info,
                    // 'deposit_method' => $deposit_method,
                    'deposit' => $deposit,
                    //'deposit_date' => $deposit_date,
                    'updatetime' => $updateTime,
                    'memo' => $memo,
                    // 'onsite_reg' => $onsite_reg,
                    'time' => substr($time, 0, 10),
                    'etc1' => $etc1,
                    'etc2' => $etc2,
                    'etc5' => $etc5,
                );

                $this->users->update_user($info, $where);
                $data['item'] = $this->users->get_user($where);
                //                $this->load->view('admin/user_detail', $data);
                $this->load->view('admin/user_update_success', $data);
            }
        }
        $this->load->view('footer');
    }

    public function qr_excel_download()
    {

        function hoursandmins($time, $format = '%02d시간 %02d분')
        {
            if ($time < 1) {
                return;
            }
            $hours = floor($time / 60);
            $minutes = ($time % 60);
            return sprintf($format, $hours, $minutes);
        }


        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        $table_columns = array(
            "등록번호", "등록일", "학회 참석 여부" ,"사전등록여부", "ID(E-mail)", "KSSO 회원 여부", "성함", "소속", 
            "네임텍용 소속", "부서", "휴대폰 번호", "참가 유형", "분야 구분", "참석 구분", 
            "대한의사협회 평점", "의사면허번호", "내과전공의 외부학술회의 평점", 
            "내과분과전문의 자격갱신 평점", "전문의번호", "한국영양교육평가원 평점", 
            "영양사면허번호", "임상영양사자격번호", "생년월일", "운동사 평점", "결제 상태", 
            "등록비", "결제일", "결제방식", "등록 메모", "프로모션 코드", 
            "Welcome Reception", "Satellite Symposium", "Breakfast Symposium", "Luncheon Symposium", "개최 정보 습득 방법",
             "remark1", "remark2", "remark3", "remark4", "memo", 
             "Day 1 참석여부", "Day 1 입실 시간", "Day 1 퇴실 시간", "체류시간", "Break 제외 시간", "Day 1 예상대한의사협회평점", "Day 1 예상내과전공의평점", "Day 1 대한내과학회 분과전문의 자격갱신 평점", "Day 1 대한비만학회 비만전문인정의 (신규/갱신)",
             "Day 2 참석여부", "Day 2 입실 시간", "Day 2 퇴실 시간", "체류시간", "Break 제외 시간", "Day 2 예상대한의사협회평점", "Day 2 예상내과전공의평점", "Day 2 대한내과학회 분과전문의 자격갱신 평점", "Day 2 대한비만학회 비만전문인정의 (신규/갱신)", "한국영양교육평가원 임상영양사 전문연수교육 평점", "대한운동사협회 평점"
        );
    
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $object->getActiveSheet()->getStyle('B2')->getAlignment()->applyFromArray(
                array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                )
            );
            $column++;
        }

        $excel_row = 2;

        $list = $this->entrance->history_all();

        $duration = $this->schedule->get_duration();
        $start = $duration['start'];
        $end = $duration['end'];

        $allbreaks = $this->schedule->get_breaks();
        $breaks = [];

        foreach ($allbreaks as $brk) {
            $break = new breaktime();
            $break->start = $brk['start'];
            $break->end = $brk['end'];
            $breaks[] = $break;
        }

        foreach ($list as $row) {
            if (isset($row['mintime_day1']) || isset($row['mintime_day2']) || isset($row['mintime_day3']) ) {
                $chk = '참석';
            } else {
                $chk = '미참석';
            }

            if ($row['d_format'] == '00시간 00분') {
                $row['d_format'] = '';
            }

            $enter1 = $row['mintime_day1'];
            $leave1 = $row['maxtime_day1'];
            $spent1 = $this->time_spent->time_spentcalc($enter1, $leave1, $start, $end, $breaks);

            $enter2 = $row['mintime_day2'];
            $leave2 = $row['maxtime_day2'];
            $spent2 = $this->time_spent->time_spentcalc($enter2, $leave2, $start, $end, $breaks);

            $end_day2_am = "2025-03-15 12:10:00";
            $spent2_am = $this->time_spent->time_spentcalc($enter2, $leave2, $start, $end_day2_am, $breaks);
            $spent2_pm = $this->time_spent->time_spentcalc($enter2, $leave2, $end_day2_am, $end, $breaks);

            $enter3 = $row['mintime_day3'];
            $leave3 = $row['maxtime_day3'];
            $spent3 = $this->time_spent->time_spentcalc($enter3, $leave3, $start, $end, $breaks);
            
            $end_day3_am = "2024-11-02 12:40:00";
            $spent3_am = $this->time_spent->time_spentcalc($enter3, $leave3, $start, $end_day3_am, $breaks);
            $spent3_pm = $this->time_spent->time_spentcalc($enter3, $leave3, $end_day3_am, $end, $breaks);

            $enter4 = $row['mintime_day1'];
            $leave4 = $row['maxtime_day2'];
            $spent5 = $this->time_spent->time_spentcalc($enter4, $leave4, $start, $end, $breaks);

            // $spent = $this->time_spent->time_spentcalc($enter, $leave, $start, $end, $breaks);
            
            //DAY1 예상평점
            $score1 = floor($spent1 / 60);
            $score1 = min(4, $score1);

            //DAY1 예상 내과전공의 평점
            $score1_1 = floor($spent1 / 180);
            $score1_1 = min(1, $score1_1);

            //DAY1 대한내과학회 분과전문의 자격갱신
            $score1_2 = $row['mintime_day1'] ? 1 : "";

            //DAY2 예상평점
            $score2 = floor($spent2 / 60);
            $score2 = min(6, $score2);

            $score2_am = floor($spent2_am / 180);
            $score2_pm = floor($spent2_pm / 180);
            $score2_am = min(1, $score2_am);
            $score2_pm = min(1, $score2_pm);

            $score2_1 = $score2_am + $score2_pm;

            //DAY2 대한내과학회 분과전문의 자격갱신
            $score2_2 = $row['mintime_day2'] ? 1 : "";

            //임상영양사
            $score3 = 0;
            $score3 = floor($spent5 / 60);
            $score3 = min(5, $score3);

            //운동사
            // $score4 = 0;
            // $score4 = floor($spent5 / 60);
            // $score4 = min(40, $score4);
            $score4 =  $score1 + $score2;
            if($score4 >= 6){
                $score4 = 40;
            }else{
                $score4 = 0;
            }

            //DAY3 예상평점
            // $score3 = floor($spent3 / 60);
            // $score3 = min(6, $score3);
            
            // $score3_am = floor($spent3_am / 60);
            // $score3_pm = floor($spent3_pm / 60);
            // $score3_am = min(1, $score3_am);
            // $score3_pm = min(1, $score3_pm);

            //DAY2 예상 내과전공의 평점
            //$score3_1 = $score3_am + $score3_pm;

            // $score4 = floor($spent2 / 180);
            // $score4 = min(2, $score4);

            //[230312] sujoeng / 기존코드
            // $score = floor($spent / 60);
            // $max_score = $this->schedule->get_maxscore();
            // $score = min($max_score, $score);

            $onsite = "";            
            
            if($row['onsite_reg'] == 0){
                $onsite = "사전등록";            
            }else{
                $onsite = "현장등록";      
            }

            //            $excel->getActiveSheet()->getRowDimension ( 1 )->setRowHeight ( 35 );
            $object->getActiveSheet()->getStyle("F" . $excel_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $object->getActiveSheet()->getStyle("H" . $excel_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['registration_no']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['reg_date']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row,  $chk);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row,  $onsite);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['email']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['member']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['nick_name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['org']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['org_nametag']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['department']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['phone']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row['attendance_type']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row['occupation_type']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row['member_type']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row['is_score']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row['licence_number']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row['is_score1']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row['is_score2']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row['specialty_number']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row['is_score3']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row['nutritionist_number']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row['dietitian_number']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row['date_of_birth']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $row['is_score4']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $row['deposit']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $row['fee']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $row['deposit_date']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, $row['deposit_method']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(28, $excel_row, $row['deposit_memo']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(29, $excel_row, $row['etc1']); 
            $object->getActiveSheet()->setCellValueByColumnAndRow(30, $excel_row, $row['welcome_reception_yn']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(31, $excel_row, $row['satellite1_yn']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(32, $excel_row, $row['breakfast_yn']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(33, $excel_row, $row['luncheon_yn']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(34, $excel_row, $row['conference_info']);

            $object->getActiveSheet()->setCellValueByColumnAndRow(35, $excel_row, $row['remark1']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(36, $excel_row, $row['remark2']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(37, $excel_row, $row['remark3']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(38, $excel_row, $row['remark4']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(39, $excel_row, $row['memo']);
          
            $object->getActiveSheet()->setCellValueByColumnAndRow(40, $excel_row,  $row['qr_chk_day_1']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(41, $excel_row, date("H:i", strtotime($row['mintime_day1'])));  //DAY1입실
            $object->getActiveSheet()->setCellValueByColumnAndRow(42, $excel_row, date("H:i", strtotime($row['maxtime_day1'])));  //DAY1퇴실
            $object->getActiveSheet()->setCellValueByColumnAndRow(43, $excel_row, $row['d_format_day1']);                //DAY1체류시간
            $object->getActiveSheet()->setCellValueByColumnAndRow(44, $excel_row, hoursandmins($spent1));                  //DAY1 breack 제외 시간 
            $object->getActiveSheet()->setCellValueByColumnAndRow(45, $excel_row, $score1);                                 //DAY1 예상 평점
            $object->getActiveSheet()->setCellValueByColumnAndRow(46, $excel_row, $score1_1);                                 //DAY1 예상 평점
            $object->getActiveSheet()->setCellValueByColumnAndRow(47, $excel_row, $score1_2);                                 //DAY1 예상 평점
            $object->getActiveSheet()->setCellValueByColumnAndRow(48, $excel_row, $score1);                                 //DAY1 예상 평점

            $object->getActiveSheet()->setCellValueByColumnAndRow(49, $excel_row,  $row['qr_chk_day_2']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(50, $excel_row, date("H:i", strtotime($row['mintime_day2'])));  //DAY2입실
            $object->getActiveSheet()->setCellValueByColumnAndRow(51, $excel_row, date("H:i", strtotime($row['maxtime_day2'])));  //DAY2퇴실
            $object->getActiveSheet()->setCellValueByColumnAndRow(52, $excel_row, $row['d_format_day2']);                           //DAY2체류시간
            $object->getActiveSheet()->setCellValueByColumnAndRow(53, $excel_row, hoursandmins($spent2));                       //DAY2 breack 제외 시간 
            $object->getActiveSheet()->setCellValueByColumnAndRow(54, $excel_row, $score2);                       //DAY2 예상 평점
            $object->getActiveSheet()->setCellValueByColumnAndRow(55, $excel_row, $score2_1);                       //DAY2 예상 평점
            $object->getActiveSheet()->setCellValueByColumnAndRow(56, $excel_row, $score2_2);                       //DAY2 예상 평점
            $object->getActiveSheet()->setCellValueByColumnAndRow(57, $excel_row, $score2);      
                          
            $object->getActiveSheet()->setCellValueByColumnAndRow(58, $excel_row, $score3);                       //DAY2 예상 평점
            $object->getActiveSheet()->setCellValueByColumnAndRow(59, $excel_row, $score4);                       //DAY2 예상 평점

            // $object->getActiveSheet()->setCellValueByColumnAndRow(49, $excel_row, $row['qr_chk_day_3']);
            // $object->getActiveSheet()->setCellValueByColumnAndRow(50, $excel_row, date("H:i", strtotime($row['mintime_day3'])));  //DAY3입실
            // $object->getActiveSheet()->setCellValueByColumnAndRow(51, $excel_row, date("H:i", strtotime($row['maxtime_day3'])));  //DAY3퇴실
            // $object->getActiveSheet()->setCellValueByColumnAndRow(52, $excel_row, $row['d_format_day3']);                           //DAY3체류시간
            // $object->getActiveSheet()->setCellValueByColumnAndRow(53, $excel_row, hoursandmins($spent3));                       //DAY3 breack 제외 시간 
            // $object->getActiveSheet()->setCellValueByColumnAndRow(54, $excel_row, $score3); 
            // $object->getActiveSheet()->setCellValueByColumnAndRow(55, $excel_row, $score3_1); 
            $excel_row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="QR_History.xlsx"');

        header('Cache-Control: max-age=0');

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $object_writer->save('php://output');
    }

    public function new_abstracts()
    {

        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'new_abstracts';
            $data['new_abstracts'] = $this->users->get_new_abstracts_users();

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/new_abstracts.php', $data);
        }
        $this->load->view('footer');
    }

    public function new_abstract_detail()
    {

        $this->load->view('admin/header');

        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['primary_menu'] = 'new_abstracts';
            $idx = $_GET['n'];
            $where = array(
                'IDX' => $idx
            );
            $data['base'] = $this->users->get_abstract_base($where);

            $fileIdx = explode(",", $data['base']['FILE_NO']);
            $file = [];
            foreach ($fileIdx as $idx) {
                $where = array(
                    'idx' => $idx
                );
                array_push($file, $this->users->get_file_upload($where));
            }
            $data['file'] = $file;

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/new_abstract_detail.php', $data);
        }
        $this->load->view('footer');

        return;
    }

    public function new_abstract_2docx()
    {

        $idx = $_GET['n'];
        $where = array(
            'IDX' => $idx
        );
        $data['base'] = $this->users->get_abstract_base($where);

        $fileIdx = explode(",", $data['base']['FILE_NO']);
        $file = [];
        foreach ($fileIdx as $idx) {
            $where = array(
                'idx' => $idx
            );
            array_push($file, $this->users->get_file_upload($where));
        }
        $data['file'] = $file;

        $this->load->view('admin/new_abstract_2docx.php', $data);
    }

    public function new_abstract_update()
    {

        $this->load->view('admin/header');

        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['primary_menu'] = 'new_abstracts';
            $userId = $_GET['n'];
            $where = array(
                'SERIAL' => $serial
            );
            $this->load->view('admin/left_side.php', $data);
        }
        $this->load->view('footer');
    }

    public function send_msm()
    {
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $userId = $_GET['n'];
            $where = array(
                'registration_no' => $userId
            );
            $info = array(
                'QR_SMS_SEND_YN' =>  'Y'
            );
            $data['users'] = $this->users->get_user($where);
            $this->load->view('admin/send_msm', $data);
            $this->users->update_msm_status($info, $where);
        }
    }

    public function send_all_msm()
    {
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            //[240110] sujeong / 기존코드 -> 모든 유저 문자 발송
            // $userId = $this->input->post('userId');
            // $data['users'] = array(); // 배열로 초기화
            // $wheres = array(
            //     'qr_generated' => 'Y'
            // );
            // $users = $this->users->get_msm_user($wheres);
            // $data['users'] = array_merge($data['users'], $users);
            // foreach ($data['users'] as $users) {
            //     $where = array(
            //         'registration_no' => $users['registration_no'],
            //     );
            //     $info = array(
            //         'QR_SMS_SEND_YN' =>  'Y'
            //     );
            //     $this->users->update_msm_status($info, $where);
            // }

            // $this->load->view('admin/send_all_msm', $data);

            //[240110] sujeong / 현재코드 -> 페이지 유저 문자 발송
            $userId = $this->input->post('userId');
            // $data['users'] = array(); // 배열로 초기화
            foreach ($userId as $value) {
                $wheres = array(
                    'qr_generated' =>  'Y',
                    'registration_no' => $value
                );
                $data['users'] = $this->users->get_msm_user($wheres);
                // $data['users'] = array_merge($data['users'], $users);
                foreach ($data['users'] as $users) {
                    $where = array(
                        'registration_no' => $users['registration_no'],
                    );
                    $info = array(
                        'QR_SMS_SEND_YN' =>  'Y'
                    );
                    $this->users->update_msm_status($info, $where);
                }

                $this->load->view('admin/send_all_msm', $data);
            }
        }
    }
    //[240110] sujeong / 기존코드 -> 모든 유저 메일 발송
    // public function send_all_mail()
    // {
    //     if (!isset($this->session->admin_data['logged_in']))
    //         $this->load->view('admin/login');
    //     else {
    //         $userId = $this->input->post('userId');
    //         $data['users'] = $this->users->get_mail_user();
    //         foreach ($data['users'] as $users) {
    //             // var_dump($value);
    //             $where = array(
    //                 'registration_no' => $users['registration_no']
    //             );
    //             $info = array(
    //                 'QR_MAIL_SEND_YN' =>  'Y'
    //             );
    //             if ($users['QR_MAIL_SEND_YN'] == 'N') {

    //                 $this->users->update_msm_status($info, $where);
    //                 $postdata = http_build_query(
    //                     array(
    //                         'CATEGORY_D_1'      => 'QrSystem',
    //                         'CATEGORY_D_2'      => 'kes',
    //                         'CATEGORY_D_3'      => '230903',
    //                         'SEND_ADDRESS'      => 'into-mail@into-on.com',
    //                         'SEND_NAME'         => 'Qr System test',
    //                         'RECV_ADDRESS'      =>  $users['email'],
    //                         'RECV_NAME'         =>  $users['nick_name'],
    //                         'REPLY_ADDRESS'     => 'myunghwan.lee@into-on.com',
    //                         'REPLY_NAME'        => 'Qr System test',
    //                         'EMAIL_SUBJECT'     => '2023년 QrSystem test sub',
    //                         'EMAIL_ALTBODY'     => '2023년 QrSystem test body',
    //                         'EMAIL_TEMPLETE_ID' => 'Qr_kes_230903',
    //                         'EMBED_IMAGE_GRID'  => 'null',
    //                         'INSERT_TEXT_GRID'    => "{" .
    //                             '"$text1" : ' . '"' .  $users['nick_name'] . '",' .
    //                             '"$text2" : ' . '"' . $users['org'] . '",' .
    //                             '"$text3" : ' . '"' .  $users['registration_no'] . '",' .
    //                             '"$text4" : ' . '"' . base64_encode(file_get_contents(getcwd() . '/assets/images/QR/qrcode_' .  $users['registration_no'] . '.jpg')) . '"' .
    //                             "}"
    //                     )
    //                 );

    //                 $opts = array(
    //                     'http' =>
    //                     array(
    //                         'method' => 'POST',
    //                         'header' => 'Content-type: application/x-www-form-urlencoded',
    //                         'content' => $postdata
    //                     )
    //                 );
    //                 $context = stream_context_create($opts);
    //                 $result = file_get_contents('http://www.into-webinar.com/MailSenderApi', false, $context);
    //             }
    //         }
    //         $this->load->view('admin/send_all_mail', $data);
    //     }
    // }

    //[240110] sujeong / 현재코드 -> 페이지 유저 메일 발송!!!
    public function send_all_mail()
    {
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $userId = $this->input->post('userId');
            foreach ($userId as $value) {
                $wheres = array(
                    'registration_no' => $value,
                );
                $data['users'] = $this->users->get_msm_user($wheres);
                foreach ($data['users'] as $users) {
                    // var_dump($value);
                    $where = array(
                        'registration_no' => $users['registration_no'],
                        'qr_generated' =>  'Y'
                    );
                    $info = array(
                        'QR_MAIL_SEND_YN' =>  'Y'
                    );
                    $this->users->update_msm_status($info, $where);
                    $postdata = http_build_query(
                        array(
                            'CATEGORY_D_1'      => 'QrSystem',
                            'CATEGORY_D_2'      => 'ksso',
                            'CATEGORY_D_3'      => '250314',
                            'SEND_ADDRESS'      => 'ksso@into-on.com',
                            'SEND_NAME'         => '제61차 대한비만학회 춘계학술대회',
                            'RECV_ADDRESS'      =>  $users['email'],
                            'RECV_NAME'         =>  $users['nick_name'],
                            'REPLY_ADDRESS'     => 'ksso@into-on.com',
                            'REPLY_NAME'        => '제61차 대한비만학회 춘계학술대회',
                            'EMAIL_SUBJECT'     => '[제61차 대한비만학회 춘계학술대회] 현장 참석 안내',
                            'EMAIL_ALTBODY'     => '제61차 대한비만학회 춘계학술대회',
                            'EMAIL_TEMPLETE_ID' => 'Qr_ksso_250314',
                            'EMBED_IMAGE_GRID'  => 'null',
                            'INSERT_TEXT_GRID'    => "{" .
                                '"$text1" : ' . '"' .  $users['nick_name'] . '",' .
                                '"$text2" : ' . '"' . $users['org'] . '",' .
                                '"$text3" : ' . '"' .  $users['registration_no'] . '",' .
                                '"$text4" : ' . '"' . base64_encode(file_get_contents(getcwd() . '/assets/images/QR/qrcode_' .  $users['registration_no'] . '.jpg')) . '"' .
                                "}"
                        )
                    );

                    $opts = array(
                        'http' =>
                        array(
                            'method' => 'POST',
                            'header' => 'Content-type: application/x-www-form-urlencoded',
                            'content' => $postdata
                        )
                    );
                    $context = stream_context_create($opts);
                    $result = file_get_contents('http://www.into-webinar.com/MailSenderApi', false, $context);
                }
            }
            $this->load->view('admin/send_all_mail', $data);
        }
    }


    public function receipt()
    {
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $userId = $_GET['n'];
            $where = array(
                'registration_no' => $userId
            );
            $data['users'] = $this->users->get_user($where);
            $this->load->view('admin/receipt', $data);
        }
    }
    public function email()
    {
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $userId = $_GET['n'];
            $where = array(
                'registration_no' => $userId
            );
            $info = array(
                'MAIL_SEND_YN' =>  'Y'
            );
            $this->users->update_msm_status($info, $where);
            $data['users'] = $this->users->get_user($where);
            $this->load->view('admin/mail', $data);
        }
    }
    public function qr_email()
    {
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $userId = $_GET['n'];
            $where = array(
                'registration_no' => $userId,
            );
            $info = array(
                'QR_MAIL_SEND_YN' =>  'Y'
            );
            $data['users'] = $this->users->get_user($where);
            //$this->users->update_msm_status($info, $where);
            $this->load->view('admin/qr_mail', $data);
        }
    }

    public function access()
    {

        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in'])) {
            $this->load->view('admin/login');
        } else {
            // 
            $data['primary_menu'] = 'qrcode';
            $this->load->view('admin/left_side.php', $data);
            $qrcode = isset($_GET['qrcode']) ? $_GET['qrcode'] : null;

            if ($qrcode) {

                $day_1 = $this->config->item('day_1');
                $day_2 = $this->config->item('day_2');
                $day_3 = $this->config->item('day_3');
              
                $where = array(
                    'registration_no' => $qrcode
                );

                $qr_time = date("Y-m-d");
                if ($qr_time ==  $day_1 ) {
                    $infoqr = array(
                        'qr_chk_day_1' => 'Y',
                        'qr_chk' => 'Y',
                        'qr_print' => 'Y'
                    );
                    $this->users->update_qr_status($infoqr, $where);
                }
                if ($qr_time == $day_2 ) {
                    $infoqr = array(
                        'qr_chk_day_2' =>  'Y',
                        'qr_chk' => 'Y',
                        'qr_print' => 'Y'
                    );
                    $this->users->update_qr_status($infoqr, $where);
                }

                // if ($qr_time == '2024-11-30') {
                //     $infoqr = array(
                //         'qr_chk_day_3' =>  'Y',
                //         'qr_chk' => 'Y',
                //         'qr_print' => 'Y'
                //     );
                //     $this->users->update_qr_status($infoqr, $where);
                // }
                // $infoqr = array(
                //     'qr_chk' =>  'Y'
                // );
                //$this->users->update_qr_status($infoqr, $where);


                //입장시간, 퇴장시간 기록
                $time = date("Y-m-d H:i:s");
                $info = array(
                    'registration_no' => $qrcode,
                    'time' => $time,
                    'type' => 3
                );
                 $this->entrance->record($info);

                $data['notice'] = $this->schedule->get_notice();
                $data['user'] = $this->users->get_user($where);

                $this->load->view('admin/access', $data);
            } else {
                $data['notice'] = $this->schedule->get_notice();
                $this->load->view('admin/access', $data);
            }
            // $this->load->view('footer');
        }
    }
    public function loading()
    {

        $this->load->view('admin/loading');
    }

    //메일 개별 발송!!!
    public function sendMail()
    {
        $userId = $_GET['n'];
        $reg_num = $_GET['m'];
        $where = array(
            'registration_no' => $reg_num
        );
        $info = array(
            'QR_MAIL_SEND_YN' =>  'Y'
        );
        $this->users->update_msm_status($info, $where);
        $data['users'] = $this->users->get_user($where);

        $postdata = http_build_query(
            array(
                'CATEGORY_D_1'      => 'QrSystem',
                'CATEGORY_D_2'      => 'ksso',
                'CATEGORY_D_3'      => '250314',
                'SEND_ADDRESS'      => 'ksso@into-on.com',
                'SEND_NAME'         => '제61차 대한비만학회 춘계학술대회',
                'RECV_ADDRESS'      =>  $userId,
                'RECV_NAME'         =>  $userId,
                'REPLY_ADDRESS'     => 'ksso@into-on.com',
                'REPLY_NAME'        => '제61차 대한비만학회 춘계학술대회',
                'EMAIL_SUBJECT'     => '[제61차 대한비만학회 춘계학술대회] 현장 참석 안내',
                'EMAIL_ALTBODY'     => '제61차 대한비만학회 춘계학술대회',
                'EMAIL_TEMPLETE_ID' => 'Qr_ksso_250314',
                'EMBED_IMAGE_GRID'  => 'null',
                'INSERT_TEXT_GRID'    => "{" .
                    '"$text1" : ' . '"' .  $userId . '",' .
                    '"$text2" : ' . '"' .  $userId . '",' .
                    '"$text3" : ' . '"' .  $userId . '",' .
                    '"$text4" : ' . '"' . base64_encode(file_get_contents(getcwd() . '/assets/images/QR/qrcode_' . $data['users']['registration_no'] . '.jpg')) . '"' .
                    "}"
            )
        );

        $opts = array(
            'http' =>
            array(
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context = stream_context_create($opts);
        $result = file_get_contents('http://www.into-webinar.com/MailSenderApi', false, $context);
    }

    
    public function notice()
    {
        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'notice';
            $data['notice'] = $this->schedule->get_notice();
            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/notice', $data);
        }
        $this->load->view('footer');
    }

    public function add_notice()
    {

        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('notice', '공지사항', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/add_notice');
            } else {
                $notice = $_POST['notice'];
                // $notice = $this->input->post('notice');

                if ($notice === "") {
                    $info = array("notice" => null);
                } else {
                    $info = array(
                        "notice" => $notice,
                        "is_deleted" => 'N'
                    );
                }
               $data = $this->schedule->add_notice($info);
            }
        }
    }
    public function edit_notice()
    {

        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $this->load->helper('form');
            $this->load->library('form_validation');


            $data['notice'] = $this->schedule->get_notice();
            $this->form_validation->set_rules('notice', 'notice', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/notice', $data);
            } else {

                $notice = $this->input->post('notice');
                $userId =  $this->input->post('id');
                $where = array(
                    'id' => $userId
                );

                if ($notice === "") {
                    $info = array("notice" => null); // 메모 필드를 null로 설정하여 삭제
                } else {
                    $info = array("notice" => $notice);
                }
                $this->schedule->edit_notice($info, $where);
            }
        }
    }
    public function del_notice()
    {

        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {

            $this->load->view('admin/notice', $data);

            $userId =  $this->input->post('id');
            $where = array(
                'id' => $userId
            );

            $info = array("is_deleted" => 'Y');

            $this->schedule->edit_notice($info, $where);
        }
    }
    public function qr_blank_user()
    {
         $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'qr_blank_user';

            // $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/qr_blank_user');
        }
        // $this->load->view('footer');
    }

    public function faculty()
    {
        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'faculty';
            $data['users'] = $this->users->get_faculty();

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/faculty', $data);
        }
        $this->load->view('footer');
    }
    public function gala()
    {
        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'gala';
            $data['users'] = $this->users->get_faculty();

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/gala_table', $data);
        }
        $this->load->view('footer');
    }
    public function participant_2 ()
    {
        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $data['primary_menu'] = 'participant';

            $wheres = array(
                'qr_chk' => 'Y'
            );
            /**모든 유저 */
            $data['users'] = $this->users->get_users();

            /**qr access 총 유저 */
            $data['item'] = $this->users->get_qr_print_user();

            $where = array(
                'deposit' => '결제대기'
            );
            $data['no_deposit'] = $this->users->get_access_user($where);

            $where_1 = array(
                'onsite_reg' => 1
            );
            $data['onsite'] = $this->users->get_access_user($where_1);

            //qr_chk_day_1, 2 => d -> d1 day1 / d2 day2
            //attendance_type => a -> ap 일반참석자 / ac 임원 / ach 좌장 / as 연자 / apn 패널 / aj 심사자 / ao 외부초청/ ar 기자 / apo 정책심포지엄
            //member_type => m -> m0 교수 / m1 개원의 / m2 봉직의 / m3 전임의 / m4 수련의 / m5 전공의 
                                //m6 영양사 / m7 운동사 / m8 간호사 / m9 군의관 / m10 공보의 
                                //m11 연구원 / m 12 학생 / m13 전시(부스) / m14 기타

            /** day 1 && 일반참석자 */
            $data['d1_ap_m0'] = $this->table->get_d1_ap_m0();
            $data['d1_ap_m1'] = $this->table->get_d1_ap_m1();
            $data['d1_ap_m2'] = $this->table->get_d1_ap_m2();
            $data['d1_ap_m3'] = $this->table->get_d1_ap_m3();
            $data['d1_ap_m4'] = $this->table->get_d1_ap_m4();
            $data['d1_ap_m5'] = $this->table->get_d1_ap_m5();
            $data['d1_ap_m6'] = $this->table->get_d1_ap_m6();
            $data['d1_ap_m7'] = $this->table->get_d1_ap_m7();
            $data['d1_ap_m8'] = $this->table->get_d1_ap_m8();
            $data['d1_ap_m9'] = $this->table->get_d1_ap_m9();
            $data['d1_ap_m10'] = $this->table->get_d1_ap_m10();
            $data['d1_ap_m11'] = $this->table->get_d1_ap_m11();
            $data['d1_ap_m12'] = $this->table->get_d1_ap_m12();
            $data['d1_ap_m13'] = $this->table->get_d1_ap_m13();
            $data['d1_ap_m14'] = $this->table->get_d1_ap_m14();
            $data['add_d1_ap'] = $this->table->add_d1_ap();

             /** day 1 && 임원 */
             $data['d1_ac_m0'] = $this->table->get_d1_ac_m0();
             $data['d1_ac_m1'] = $this->table->get_d1_ac_m1();
             $data['d1_ac_m2'] = $this->table->get_d1_ac_m2();
             $data['d1_ac_m3'] = $this->table->get_d1_ac_m3();
             $data['d1_ac_m4'] = $this->table->get_d1_ac_m4();
             $data['d1_ac_m5'] = $this->table->get_d1_ac_m5();
             $data['d1_ac_m6'] = $this->table->get_d1_ac_m6();
             $data['d1_ac_m7'] = $this->table->get_d1_ac_m7();
             $data['d1_ac_m8'] = $this->table->get_d1_ac_m8();
             $data['d1_ac_m9'] = $this->table->get_d1_ac_m9();
             $data['d1_ac_m10'] = $this->table->get_d1_ac_m10();
             $data['d1_ac_m11'] = $this->table->get_d1_ac_m11();
             $data['d1_ac_m12'] = $this->table->get_d1_ac_m12();
             $data['d1_ac_m13'] = $this->table->get_d1_ac_m13();
             $data['d1_ac_m14'] = $this->table->get_d1_ac_m14();
             $data['add_d1_ac'] = $this->table->add_d1_ac();

             /** day 1 && 좌장 */
             $data['d1_ach'] = $this->table->get_d1_ach();
             $data['add_d1_ach'] = $this->table->add_d1_ach();

             /** day 1 && 연자 */
             $data['d1_as'] = $this->table->get_d1_as();
             $data['add_d1_as'] = $this->table->add_d1_as();

             /** day 1 && 패널 */
             $data['d1_apn'] = $this->table->get_d1_apn();
             $data['add_d1_apn'] = $this->table->add_d1_apn();

             /** day 1 && 심사 */
             $data['d1_aj'] = $this->table->get_d1_aj();
             $data['add_d1_aj'] = $this->table->add_d1_aj();

             /** day 1 && 외부초청 */
             $data['d1_ao'] = $this->table->get_d1_ao();
             $data['add_d1_ao'] = $this->table->add_d1_ao();

              /** day 1 && 기자*/
              $data['d1_ar'] = $this->table->get_d1_ar();
              $data['add_d1_ar'] = $this->table->add_d1_ar();


             /** day 2 && 일반참석자 */
            $data['d2_ap_m0'] = $this->table->get_d2_ap_m0();
            $data['d2_ap_m1'] = $this->table->get_d2_ap_m1();
            $data['d2_ap_m2'] = $this->table->get_d2_ap_m2();
            $data['d2_ap_m3'] = $this->table->get_d2_ap_m3();
            $data['d2_ap_m4'] = $this->table->get_d2_ap_m4();
            $data['d2_ap_m5'] = $this->table->get_d2_ap_m5();
            $data['d2_ap_m6'] = $this->table->get_d2_ap_m6();
            $data['d2_ap_m7'] = $this->table->get_d2_ap_m7();
            $data['d2_ap_m8'] = $this->table->get_d2_ap_m8();
            $data['d2_ap_m9'] = $this->table->get_d2_ap_m9();
            $data['d2_ap_m10'] = $this->table->get_d2_ap_m10();
            $data['d2_ap_m11'] = $this->table->get_d2_ap_m11();
            $data['d2_ap_m12'] = $this->table->get_d2_ap_m12();
            $data['d2_ap_m13'] = $this->table->get_d2_ap_m13();
            $data['d2_ap_m14'] = $this->table->get_d2_ap_m14();
            $data['add_d2_ap'] = $this->table->add_d2_ap();

             /** day 2 && 임원 */
             $data['d2_ac_m0'] = $this->table->get_d2_ac_m0();
             $data['d2_ac_m1'] = $this->table->get_d2_ac_m1();
             $data['d2_ac_m2'] = $this->table->get_d2_ac_m2();
             $data['d2_ac_m3'] = $this->table->get_d2_ac_m3();
             $data['d2_ac_m4'] = $this->table->get_d2_ac_m4();
             $data['d2_ac_m5'] = $this->table->get_d2_ac_m5();
             $data['d2_ac_m6'] = $this->table->get_d2_ac_m6();
             $data['d2_ac_m7'] = $this->table->get_d2_ac_m7();
             $data['d2_ac_m8'] = $this->table->get_d2_ac_m8();
             $data['d2_ac_m9'] = $this->table->get_d2_ac_m9();
             $data['d2_ac_m10'] = $this->table->get_d2_ac_m10();
             $data['d2_ac_m11'] = $this->table->get_d2_ac_m11();
             $data['d2_ac_m12'] = $this->table->get_d2_ac_m12();
             $data['d2_ac_m13'] = $this->table->get_d2_ac_m13();
             $data['d2_ac_m14'] = $this->table->get_d2_ac_m14();
             $data['add_d2_ac'] = $this->table->add_d2_ac();

            /** day 2 && 기자*/
            $data['d2_ar'] = $this->table->get_d2_ar();
            $data['add_d2_ar'] = $this->table->add_d2_ar();


             /** day 2 && 좌장 */
             $data['d2_ach'] = $this->table->get_d2_ach();
             $data['add_d2_ach'] = $this->table->add_d2_ach();

             /** day 2 && 연자 */
             $data['d2_as'] = $this->table->get_d2_as();
             $data['add_d2_as'] = $this->table->add_d2_as();

             /** day 2 && 패널 */
             $data['d2_apn'] = $this->table->get_d2_apn();
             $data['add_d2_apn'] = $this->table->add_d2_apn();

             /** day 2 && 심사 */
             $data['d2_aj'] = $this->table->get_d2_aj();
             $data['add_d2_aj'] = $this->table->add_d2_aj();

             /** day 2 && 외부초청 */
             $data['d2_ao'] = $this->table->get_d2_ao();
             $data['add_d2_ao'] = $this->table->add_d2_ao();

            /** day 1 && 현장등록 */
            $data['d1_ap_on'] = $this->table->get_d1_ap_on();
            $data['d1_ac_on'] = $this->table->get_d1_ac_on();
            $data['d1_ar_on'] = $this->table->get_d1_ar_on();

             /** day 2 && 현장등록 */
             $data['d2_ap_on'] = $this->table->get_d2_ap_on();
             $data['d2_ac_on'] = $this->table->get_d2_ac_on();
             $data['d2_ar_on'] = $this->table->get_d2_ar_on();

             /** 정책 심포지엄 */
             $data['add_apo'] = $this->table->add_apo();

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/participant_2.php', $data);
        }
        $this->load->view('footer');
    }

    public function participant()
    {
        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $data['primary_menu'] = 'participant';
            // $data['statistics'] = $this->users->get_access_statistics();
            $wheres = array(
                'qr_chk' => 'Y'
            );
               /**모든 유저 */
            $data['users'] = $this->users->get_users();

            /**qr access 총 유저 */
            $data['item'] = $this->users->get_qr_print_user($wheres);

            /**day1 ~ day3 access 각각 유저 */
            $data['speaker_1'] = $this->users->get_access_speaker_1();
            $data['speaker_2'] = $this->users->get_access_speaker_2();
            // $data['speaker_3'] = $this->users->get_access_speaker_3();
            $data['on_speaker_1'] = $this->users->get_access_on_speaker_1();
            $data['on_speaker_2'] = $this->users->get_access_on_speaker_2();
            // $data['on_speaker_3'] = $this->users->get_access_on_speaker_3();

            $data['chairperson_1'] = $this->users->get_access_chairperson_1();
            $data['chairperson_2'] = $this->users->get_access_chairperson_2();
            // $data['chairperson_3'] = $this->users->get_access_chairperson_3();
            $data['on_chairperson_1'] = $this->users->get_access_on_chairperson_1();
            $data['on_chairperson_2'] = $this->users->get_access_on_chairperson_2();
            // $data['on_chairperson_3'] = $this->users->get_access_on_chairperson_3();

            $data['panel_1'] = $this->users->get_access_panel_1();
            $data['panel_2'] = $this->users->get_access_panel_2();
            // $data['panel_3'] = $this->users->get_access_panel_3();
            $data['on_panel_1'] = $this->users->get_access_on_panel_1();
            $data['on_panel_2'] = $this->users->get_access_on_panel_2();
            // $data['on_panel_3'] = $this->users->get_access_on_panel_3();
            
            $data['faculty_1'] = $this->users->get_access_faculty_1();
            $data['faculty_2'] = $this->users->get_access_faculty_2();
            // $data['faculty_3'] = $this->users->get_access_faculty_3();
            $data['on_faculty_1'] = $this->users->get_access_on_faculty_1();
            $data['on_faculty_2'] = $this->users->get_access_on_faculty_2();
            // $data['on_faculty_3'] = $this->users->get_access_on_faculty_3();
            
            $data['participant_1'] = $this->users->get_access_participant_1();
            $data['participant_2'] = $this->users->get_access_participant_2();
            // $data['participant_3'] = $this->users->get_access_participant_3();
            $data['on_participant_1'] = $this->users->get_access_on_participant_1();
            $data['on_participant_2'] = $this->users->get_access_on_participant_2();
            // $data['on_participant_3'] = $this->users->get_access_on_participant_3();

            //Satellite 1 참가자(동아ST)
            $data['satellite_1_1'] = $this->users->get_access_satellite_1_1();
            $data['satellite_2_1'] = $this->users->get_access_satellite_2_1();
            // $data['satellite_3_1'] = $this->users->get_access_satellite_3_1();

            $data['on_satellite_1_1'] = $this->users->get_access_on_satellite_1_1();
            $data['on_satellite_2_1'] = $this->users->get_access_on_satellite_2_1();
            // $data['on_satellite_3_1'] = $this->users->get_access_on_satellite_3_1();


            //Satellite 2 참가자(종근당)
            $data['satellite_1_2'] = $this->users->get_access_satellite_1_2();
            $data['satellite_2_2'] = $this->users->get_access_satellite_2_2();
            // $data['satellite_3_2'] = $this->users->get_access_satellite_3_2();

            $data['on_satellite_1_2'] = $this->users->get_access_on_satellite_1_2();
            $data['on_satellite_2_2'] = $this->users->get_access_on_satellite_2_2();
            // $data['on_satellite_3_2'] = $this->users->get_access_on_satellite_3_2();


            //Satellite 3 참가자(대웅바이오)
            // $data['satellite_1_3'] = $this->users->get_access_satellite_1_3();
            // $data['satellite_2_3'] = $this->users->get_access_satellite_2_3();
            // $data['satellite_3_3'] = $this->users->get_access_satellite_3_3();
          
            // $data['on_satellite_1_3'] = $this->users->get_access_on_satellite_1_3();
            // $data['on_satellite_2_3'] = $this->users->get_access_on_satellite_2_3();
            // $data['on_satellite_3_3'] = $this->users->get_access_on_satellite_3_3();
    

            // //Satellite 4 참가자(오가논)
            // $data['satellite_1_4'] = $this->users->get_access_satellite_1_4();
            // $data['satellite_2_4'] = $this->users->get_access_satellite_2_4();
            // $data['satellite_3_4'] = $this->users->get_access_satellite_3_4();

            // $data['on_satellite_1_4'] = $this->users->get_access_on_satellite_1_4();
            // $data['on_satellite_2_4'] = $this->users->get_access_on_satellite_2_4();
            // $data['on_satellite_3_4'] = $this->users->get_access_on_satellite_3_4();

            
            $data['other_1'] = $this->users->get_access_other_1();
            $data['other_2'] = $this->users->get_access_other_2();
            // $data['other_3'] = $this->users->get_access_other_3();
            $data['on_other_1'] = $this->users->get_access_on_other_1();
            $data['on_other_2'] = $this->users->get_access_on_other_2();
            // $data['on_other_3'] = $this->users->get_access_on_other_3();

            $data['day_1'] = $this->users->get_access_day_1();
            $data['day_2'] = $this->users->get_access_day_2();
            // $data['day_3'] = $this->users->get_access_day_3();
            $data['on_day_1'] = $this->users->get_access_on_day_1();
            $data['on_day_2'] = $this->users->get_access_on_day_2();
            // $data['on_day_3'] = $this->users->get_access_on_day_3();
            
            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/participant.php', $data);
        }
        $this->load->view('footer');
    }
}
