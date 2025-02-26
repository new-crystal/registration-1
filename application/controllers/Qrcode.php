<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';


class breaktime
{
    public $start;
    public $end;
}


class Qrcode extends CI_Controller
{
    private $sheets;
    private $data;

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Seoul');
        $this->load->library("qrcode_e");
        $this->load->model('users');
        $this->load->model('entrance');
        $this->load->model('schedule');
        
        ini_set('memory_limit', '-1');
        $this->load->library("time_spent");
    }

    public function index()
    {
        //$this->qrcode_e->create_QRcode("Hello, World!!", "qrcode.png");
        $this->load->helper('form');
        $this->load->library('form_validation');

        if ($this->form_validation->run() === FALSE) {
            $this->data['entrance'] = "";
            $this->data['entrance_org'] = '';
            $this->load->view('header');
            $this->load->view('qrcode', $this->data);
            $this->load->view('footer');
        } else {
            $qrcode = $this->input->post('qrcode');

            $where = array(
                'registration_no' => $qrcode
            );

            $user = $this->users->get_user($where);

            $this->data['user'] = $user;

            $this->load->view('header');
            $this->load->view('qrcode', $this->data);
            $this->load->view('footer');
        }
    }

    public function print_file()
    {
        $this->load->view('admin/header');
        $qrcode = $_GET['registration_no'];
        $where = array(
            'registration_no' => $qrcode
        );
        $info = array(
            'qr_print' =>  'Y'
        );

        /** day1 ~ day3 access 기록*/
        // $qr_time = date("Y-m-d");
        // if ($qr_time == '2024-11-29') {
        //     $infoqr = array(
        //         'qr_chk_day_1' => 'Y',
        //         'qr_chk' => 'Y'
        //     );
        //     $this->users->update_qr_status($infoqr, $where);
        // }
        // if ($qr_time == '2024-11-30') {
        //     $infoqr = array(
        //         'qr_chk_day_2' =>  'Y',
        //         'qr_chk' => 'Y'
        //     );
        //     $this->users->update_qr_status($infoqr, $where);
        // }
        // if ($qr_time == '2023-11-25') {
        //     $infoqr = array(
        //         'qr_chk_day_3' =>  'Y',
        //         'qr_chk' => 'Y'
        //     );
        //     $this->users->update_qr_status($infoqr, $where);
        // }

        $data['users'] = $this->users->get_user($where);
        $this->users->update_qr_status($info, $where);
        //                var_dump($data['users']);
        $this->load->view('/qr_print', $data);
    }

    public function info()
    {
        $qrcode = $this->input->post('qrcode');

        $where = array(
            'registration_no' => $qrcode
        );

        $user = $this->users->get_user($where);

        $this->data['user'] = $user;

        $this->load->view('header');
        $this->load->view('qr_info', $this->data);
    }

    public function init_()
    {
    }

    public function get_pagination($total_rows, $per_page = PER_PAGE_COUNT)
    {
        $this->load->library('pagination');

        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['num_links'] = 2;

        $config['page_query_string'] = TRUE;

        $config['base_url'] = site_url();

        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<div class="row" style="text-align: center; padding: 10px;"><ul class="pagination pagination-sm no-margin">';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = '<<';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '>>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '< 이전';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '다음 >';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

    public function open()
    {
        $qrcode = isset($_GET['qrcode']) ? $_GET['qrcode'] : null;
        $where = array(
            'registration_no' => $qrcode
        );
        $data['users'] = $this->users->get_user($where);
        $data['times'] = $this->entrance->access($where);

        $list = $this->entrance->access($where);
        $enter = $list['min_time'];
        $leave = $list['max_time'];

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

        $spent = $this->time_spent->time_spentcalc($enter, $leave, $start, $end, $breaks);

        $data['score'] = floor($spent / 60);

        $max_score = $this->schedule->get_maxscore();

        if ($data['score'] >= $max_score) {
            $data['score'] = $max_score;
        } else {
            $data['score'] = $data['score'];
        }

        $this->load->view('qr_open', $data);
    }

    public function pop_up()
    {
        $qrcode = $_GET['n'];
        $where = array(
            'registration_no' => $qrcode
        );
        $data['users'] = $this->users->get_user($where);
        $this->load->view('qr_pop', $data);
    }
    //카카오 알림톡 개별발송
    public function send_kakao()
    {
        $qrcode = isset($_GET['qrcode']) ? $_GET['qrcode'] : null;
        $where = array(
            'registration_no' => $qrcode
        );
        $data['users'] = $this->users->get_user($where);
        $this->load->view('send_kakao', $data);
    }

    //카카오 알림톡 단체발송
    public function send_all_kakao()
    {
        $userId = $this->input->post('userId');

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

            //php 버전
            $this->load->view('send_kakao', $data);

            //javascript 버전
            //$this->load->view('send_kakao_js', $data);
        }
    }

    public function kakao()
    {
        $qrcode = isset($_GET['qrcode']) ? $_GET['qrcode'] : null;
        $where = array(
            'registration_no' => $qrcode
        );
        $data['users'] = $this->users->get_user($where);
        $this->load->view('kakao_qr', $data);
    }
}
