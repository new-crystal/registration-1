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
        $this->load->library("excel");
        $this->load->library("user_agent");
        ini_set('memory_limit', '-1');
        $this->load->library("qrcode_e");
        $this->load->library("time_spent");
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

        $table_columns = array("회원여부", "구분1", "구분2", "면허번호", "이름", "전화번호", "이메일", "소속", "주소", "등록비", "입금자명", "입금예정일", "입금여부", "등록시각");

        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $excel_row = 2;

        $list = $this->users->get_users();

        foreach ($list as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['type3']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['type']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['type2']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['sn']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['nick_name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['phone']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['email']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['org']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['addr']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, number_format($row['fee']));
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['deposit_name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row['deposit_date']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row['deposit']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row['time']);

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
            $info = array(
                'deposit' =>  '입금완료'
            );
            $where = array(
                'registration_no' => $value,
                'deposit' => '미결제'
            );
            $this->users->update_deposit_status($info, $where);

            /* QR생성 */
            $info = array(
                'qr_generated' =>  'Y'
            );
            $where = array(
                'registration_no' => $value
            );

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
            $info = array(
                'deposit' => '입금완료'
            );
            $where = array(
                'registration_no' => $value,
            );
            $this->users->update_deposit_status($info, $where);


            /* QR생성 */
            $info = array(
                'qr_generated' =>  'Y'
            );
            $where = array(
                'registration_no' => $value
            );

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
                'deposit' =>  '미결제'
            );
            $where = array(
                'registration_no' => $value,
                'deposit' => '입금완료'
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



    public function qr_layout_all()
    {
        $this->load->view('admin/header');
        $userType = $_GET['type'];

        if ($userType == '03') {
            $where = array(
                'nick_name' => '이원영'
            );
        } else {
            if ($userType == '01') {
                $userType = '일반참가자';
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
                'type2' => $userType
            );
            $data['users'] = $this->users->get_users_order('nick_name', $where);
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
            $this->form_validation->set_rules('org', '소속', 'required');
            $this->form_validation->set_rules('phone', '전화번호', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/add_user');
            } else {
                $name = $this->input->post('nick_name');
                $license = $this->input->post('sn');
                $org = $this->input->post('org');
                $phone = $this->input->post('phone');
                $email = $this->input->post('email');
                $type = $this->input->post('type1');
                $type2 = $this->input->post('type2');
                $type3 = $this->input->post('type3');
                $postcode = $this->input->post('postcode');
                $address = $this->input->post('address');
                $detailAddress = $this->input->post('detailAddress');
                $extraAddress = $this->input->post('extraAddress');
                $deposit_date = $this->input->post('deposit_date');
                $deposit_name = $this->input->post('deposit_name');
                $memo = $this->input->post('memo');
                if ($type2 == '개원의' || $type2 == '봉직의' || $type2 == '전임의' || $type2 == '교수') {
                    if ($type3 == '비회원') {
                        $fee = 110000;
                    } else {
                        $fee = 90000;
                    }
                } else if ($type2 == '간호사' || $type2 == '기초의학자' || $type2 == '약사' || $type2 == '군의관') {
                    if ($type3 == '비회원') {
                        $fee = 90000;
                    } else {
                        $fee = 70000;
                    }
                } else if ($type2 == '전공의') {
                    if ($type3 == '비회원') {
                        $fee = 90000;
                    } else {
                        $fee = 70000;
                    }
                }

                if ($fee == 0)
                    $deposit = '미결제';
                else
                    $deposit = '미결제';

                $addr = $address . " " . $detailAddress . " " . $extraAddress;

                $time = date("Y-m-d H:i:s");
                $uagent = $this->agent->agent_string();

                //            error_log(print_r($name, TRUE), 3, '/tmp/errors.log');

                $info = array(
                    'nick_name' => preg_replace("/\s+/", "", $name),
                    'sn' => preg_replace("/\s+/", "", $license),
                    'org' => trim($org),
                    'org_nametag' => trim($org),
                    'phone' => preg_replace("/\s+/", "", $phone),
                    'email' => preg_replace("/\s+/", "", $email),
                    'postcode' => trim($postcode),
                    'addr' => trim($addr),
                    'type' => trim($type),
                    'type2' => trim($type2),
                    'type3' => trim($type3),
                    'fee' => $fee,
                    'time' => $time,
                    'uagent' => $uagent,
                    'deposit' => $deposit,
                    'deposit_date' => $deposit_date,
                    'deposit_name' => $deposit_name,
                    'memo' => $memo,
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

            $this->form_validation->set_rules('nick_name', '이름', 'required');
            $this->form_validation->set_rules('phone', '전화번호', 'required');
            $this->form_validation->set_rules('org', '소속', 'required');

            if ($this->form_validation->run() === FALSE) {
                //                $this->load->view('admin');
            } else {
                $type = $this->input->post('type1');
                $type2 = $this->input->post('type2');
                $type3 = $this->input->post('type3');
                $sn = $this->input->post('sn');
                $nick_name = $this->input->post('nick_name');
                $phone = $this->input->post('phone');
                $email = $this->input->post('email');
                $org = $this->input->post('org');
                $org_nametag = $this->input->post('org_nametag');
                $addr = $this->input->post('addr');
                $deposit_date = $this->input->post('deposit_date');
                $deposit_name = $this->input->post('deposit_name');
                $memo = $this->input->post('memo');
                $time = $this->input->post('time');
                if ($memo == "") {
                    $memo = null;
                }
                if ($type2 == '개원의' || $type2 == '봉직의' || $type2 == '전임의' || $type2 == '교수') {
                    if ($type3 == '비회원') {
                        $fee = 110000;
                    } else {
                        $fee = 90000;
                    }
                } else if ($type2 == '간호사' || $type2 == '기초의학자' || $type2 == '약사' || $type2 == '군의관') {
                    if ($type3 == '비회원') {
                        $fee = 90000;
                    } else {
                        $fee = 70000;
                    }
                } else if ($type2 == '전공의') {
                    if ($type3 == '비회원') {
                        $fee = 90000;
                    } else {
                        $fee = 70000;
                    }
                }
                //기존코드
                // if ($type2 == '개원의' || $type2 == '봉직의' || $type2 == '전문의' || $type2 == '교수' || $type2 == '군의관') {
                //     if ($type == '좌장' || $type == '연자' || $type == '패널') {
                //         $fee = 0;
                //     } else {
                //         if ($type3 == '비회원') {
                //             $fee = 50000;
                //         } else {
                //             $fee = 30000;
                //         }
                //     }
                // } else if ($type2 == '간호사' || $type2 == '영양사' || $type2 == '약사' || $type2 == '운동처방사' || $type2 == '연구원') {
                //     if ($type == '좌장' || $type == '연자' || $type == '패널') {
                //         $fee = 0;
                //     } else {
                //         if ($type3 == '비회원') {
                //             $fee = 40000;
                //         } else {
                //             $fee = 20000;
                //         }
                //     }
                // } else {
                //     $fee = 0;
                // }

                if ($fee == 0)
                    $deposit = '미결제';
                else
                    $deposit = '미결제';

                $updateTime = date("Y-m-d H:i:s");


                $info = array(
                    'type' => $type,
                    'type2' => $type2,
                    'type3' => $type3,
                    'fee' => $fee,
                    'sn' => preg_replace("/\s+/", "", $sn),
                    'nick_name' => preg_replace("/\s+/", "", $nick_name),
                    'phone' => preg_replace("/\s+/", "", $phone),
                    'email' => preg_replace("/\s+/", "", $email),
                    'org' => trim($org),
                    'org_nametag' => trim($org_nametag),
                    'addr' => trim($addr),
                    'deposit_date' => $deposit_date,
                    'deposit_name' => $deposit_name,
                    'updatetime' => $updateTime,
                    'memo' => $memo,
                    'time' => substr($time, 0, 10)
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

        $table_columns = array("NO", "참석여부", "구분1", "구분2", "이름", "의사면허번호", "소속", "우편번호", "주소", "핸드폰", "이메일", "등록비", "입실", "퇴실", "체류시간", "평점 인정시간 (점심, 휴식시간 제외)", "평점", "메모");

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
            if (empty($row['mintime'])) {
                $chk = '미참석';
            } else {
                $chk = '참석';
            }

            if ($row['d_format'] == '00시간 00분') {
                $row['d_format'] = '';
            }

            $enter = $row['mintime'];
            $leave = $row['maxtime'];

            $spent = $this->time_spent->time_spentcalc($enter, $leave, $start, $end, $breaks);

            $score = floor($spent / 60);
            $max_score = $this->schedule->get_maxscore();
            $score = min($max_score, $score);

            //            $excel->getActiveSheet()->getRowDimension ( 1 )->setRowHeight ( 35 );
            $object->getActiveSheet()->getStyle("F" . $excel_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $object->getActiveSheet()->getStyle("H" . $excel_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $excel_row - 1);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $chk);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['type']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['type2']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['nick_name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, (string)$row['sn']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['org']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, (string)$row['postcode']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['addr']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['phone']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['email']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, number_format($row['fee']));
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, date("H:i", strtotime($enter)));
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, date("H:i", strtotime($leave)));
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row['d_format']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, hoursandmins($spent));
            $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $score);
            $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, '');

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
            $this->users->update_msm_status($info, $where);
            $data['users'] = $this->users->get_user($where);
            $this->load->view('admin/send_msm', $data);
        }
    }

    public function send_all_msm()
    {
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $userId = $this->input->post('userId');
            $data['users'] = array(); // 배열로 초기화
            $wheres = array(
                'QR_SMS_SEND_YN' => 'N',
            );
            $users = $this->users->get_msm_user($wheres);
            $data['users'] = array_merge($data['users'], $users);
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

    public function send_all_mail()
    {
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $userId = $this->input->post('userId');
            $data['users'] = $this->users->get_mail_user();
            foreach ($data['users'] as $users) {
                // var_dump($value);
                $where = array(
                    'registration_no' => $users['registration_no']
                );
                $info = array(
                    'QR_MAIL_SEND_YN' =>  'Y'
                );
                if ($users['QR_MAIL_SEND_YN'] == 'N') {

                    $this->users->update_msm_status($info, $where);
                    $postdata = http_build_query(
                        array(
                            'CATEGORY_D_1'      => 'QrSystem',
                            'CATEGORY_D_2'      => 'kes',
                            'CATEGORY_D_3'      => '230903',
                            'SEND_ADDRESS'      => 'into-mail@into-on.com',
                            'SEND_NAME'         => 'Qr System test',
                            'RECV_ADDRESS'      =>  $users['email'],
                            'RECV_NAME'         =>  $users['nick_name'],
                            'REPLY_ADDRESS'     => 'myunghwan.lee@into-on.com',
                            'REPLY_NAME'        => 'Qr System test',
                            'EMAIL_SUBJECT'     => '2023년 QrSystem test sub',
                            'EMAIL_ALTBODY'     => '2023년 QrSystem test body',
                            'EMAIL_TEMPLETE_ID' => 'Qr_kes_230903',
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


    public function participant()
    {
        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $data['primary_menu'] = 'participant';
            $data['statistics'] = $this->users->get_access_statistics();

            $this->load->view('admin/left_side.php', $data);
            $this->load->view('admin/participant.php', $data);
        }
        $this->load->view('footer');
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
                'QR_MAIL_SEND_YN' =>  'N'
            );
            $info = array(
                'QR_MAIL_SEND_YN' =>  'Y'
            );
            $this->users->update_msm_status($info, $where);
            $data['users'] = $this->users->get_user($where);
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
                $time = date("Y-m-d H:i:s");

                // $info = array(
                //     'registration_no' => $qrcode,
                //     'time' => $time
                // );
                $infoqr = array(
                    'qr_chk' =>  'Y'
                );

                $where = array(
                    'registration_no' => $qrcode
                );
                $this->users->update_qr_status($infoqr, $where);
                //입장시간, 퇴장시간 기록
                // $this->entrance->record($info);
                $user = $this->users->get_user($where);
                $this->data['user'] = $user;

                $this->load->view('admin/access', $this->data);
            } else {
                $user = $this->users->get_users();
                $this->data['users'] = $user;
                $this->load->view('admin/access', $this->data);
            }
            $this->load->view('footer');
        }
    }
    public function loading()
    {

        $this->load->view('admin/loading');
    }

    public function sendMail()
    {
        $userId = $_GET['n'];
        $where = array(
            'registration_no' => $userId
        );
        $info = array(
            'QR_MAIL_SEND_YN' =>  'Y'
        );
        $this->users->update_msm_status($info, $where);
        $data['users'] = $this->users->get_user($where);

        $postdata = http_build_query(
            array(
                'CATEGORY_D_1'      => 'QrSystem',
                'CATEGORY_D_2'      => 'kes',
                'CATEGORY_D_3'      => '230903',
                'SEND_ADDRESS'      => 'into-mail@into-on.com',
                'SEND_NAME'         => 'Qr System test',
                'RECV_ADDRESS'      => $data['users']['email'],
                'RECV_NAME'         => $data['users']['nick_name'],
                'REPLY_ADDRESS'     => 'myunghwan.lee@into-on.com',
                'REPLY_NAME'        => 'Qr System test',
                'EMAIL_SUBJECT'     => '2023년 QrSystem test sub',
                'EMAIL_ALTBODY'     => '2023년 QrSystem test body',
                'EMAIL_TEMPLETE_ID' => 'Qr_kes_230903',
                'EMBED_IMAGE_GRID'  => 'null',
                'INSERT_TEXT_GRID'    => "{" .
                    '"$text1" : ' . '"' . $data['users']['nick_name'] . '",' .
                    '"$text2" : ' . '"' . $data['users']['org'] . '",' .
                    '"$text3" : ' . '"' . $data['users']['registration_no'] . '",' .
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
}
