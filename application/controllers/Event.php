<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

class Event extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Seoul');
        $this->load->model('stamp');
        $this->load->model('users');
        $this->load->library("excel");
        ini_set('memory_limit', '-1');
    }

    public function index()
    {

        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'users';
            $data['users'] = $this->users->get_users();

            $this->load->view('stamp/left_side.php', $data);
            $this->load->view('stamp/users', $data);
        }
        $this->load->view('footer');
    }

    public function user_detail()
    {

        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $qrcode = isset($_GET['n']) ? $_GET['n'] : null;
            $where = array(
                'registration_no' => $qrcode 
            );
            $data['primary_menu'] = 'users';
            $data['item'] = $this->users->get_user($where);

            $this->load->view('stamp/left_side.php', $data);
            $this->load->view('stamp/user_detail', $data);
        }
        $this->load->view('footer');
    }

    public function update_user()
    {

        $this->load->view('admin/header');

        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $data['primary_menu'] = 'users';
            $userId = $_GET['registration_no'];
            $where = array(
                'registration_no' => $userId
            );
            $this->load->view('stamp/left_side.php', $data);
                
                $event_1 =  $_GET['event_1'];
                $event_2 =  $_GET['event_2'];
                $event_memo =  $_GET['event_memo'];

                $info = array(
                    'event_1' => $event_1,
                    'event_2' => $event_2,
                    'event_memo' => $event_memo
                );

                if($event_1 == 'Y'){
                    $event_1_time = date("Y-m-d H:i:s");
                    
                    $info['event1_time'] = $event_1_time;
                }
                if($event_2 == 'Y'){
                    $event_2_time = date("Y-m-d H:i:s");

                    $info['event2_time'] = $event_2_time;
                }

                $this->users->update_user($info, $where);

                $this->load->view('stamp/user_update_success');
            
        }
        $this->load->view('footer');
    }


    public function access()
    {
        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            $qrcode = isset($_GET['qrcode']) ? $_GET['qrcode'] : null;
            $data['primary_menu'] = 'stamp';

            $where = array(
                'registration_no' => $qrcode
            );    
            
            $this->load->view('stamp/left_side.php', $data);

            $data['event'] = $this->users-> get_user($where);
            
            $this->load->view('stamp/access', $data);
              
        }
        $this->load->view('footer');
    }

    public function add_memo()
    {
        
        $userId = $_GET['n'];
        $where = array(
            'registration_no' => $userId
        );

        $data['item'] = $this->users->get_user($where);
        $this->load->view('stamp/memo', $data);
        
        $memo = $this->input->post('memo');
        if ($memo === "") {
            $info = array("event_memo" => null); // 메모 필드를 null로 설정하여 삭제
        } else {
            $info = array("event_memo" => $memo);
        }
        $this->stamp->update_event($info, $where);
    }

    public function update_gift()
    {
        $qrcode = isset($_GET['qrcode']) ? $_GET['qrcode'] : null;
        $number = isset($_GET['num']) ? $_GET['num'] : null;
        $time = date("Y-m-d H:i:s");
        $where = array(
            'registration_no' => $qrcode
        );

        if($number == 1){
            $info = array(
                'event1' => 'Y',
                'event1_time' => $time
            );
        }else if($number == 2){
            $info = array(
                'event2' => 'Y',
                'event2_time' => $time
            );
        }

        $data['qr_code'] =  $qrcode;
        $this->stamp->update_event($info, $where);
        $this->load->view('stamp/success', $data);
    }

    public function excel_download_event()
    {
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
    
        $table_columns = array("등록번호", "이름", "이메일", "전화번호", "Event 1 수령 유무", "Event 1 수령 시간", "Event 2 수령 유무", "Event 2 수령 시간", "Event 메모");
    
        $column = 0;
    
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
    
        $excel_row = 2;
    
        $list = $this->users->get_users();
    
        foreach ($list as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['registration_no']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['nick_name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['email']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['phone']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['event1']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['event1_time']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['event2']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['event2_time']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['event_memo']);
    
            $excel_row++;
        }
    
        // 출력 버퍼 정리
        ob_end_clean();
    
        // HTTP 헤더 설정
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Event.xlsx"');
        header('Cache-Control: max-age=0');
    
        // 파일 작성 및 출력
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $object_writer->save('php://output');
    }

    public function not_received()
    {
        
        $this->load->view('admin/header');
        if (!isset($this->session->admin_data['logged_in']))
            $this->load->view('admin/login');
        else {
            // 
            $data['primary_menu'] = 'non_user';
            $data['users'] = $this->users->get_none_user();

            $this->load->view('stamp/left_side.php', $data);
            $this->load->view('stamp/non_users', $data);
        }
        $this->load->view('footer');
    }
  
}

?>