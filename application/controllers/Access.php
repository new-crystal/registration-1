<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

class breaktime
{
    public $start;
    public $end;
}

class Access extends CI_Controller
{
    private $sheets;
    private $data;

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Seoul');
        $this->load->model('users');
        $this->load->model('entrance');
        $this->load->model('schedule');
        ini_set('memory_limit', '-1');
        $this->load->library("time_spent");
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('qrcode', 'text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->data['entrance'] = "";
            $this->data['entrance_org'] = '';
            $this->load->view('header');
            $this->load->view('access', $this->data);
            $this->load->view('footer');
        } else {
            $rop = array("options" => array("regexp" => "/[0-9]{5,10}$/"));
            $qrcode = $this->input->post('qrcode');
            $qrstr = explode('/', $qrcode);

            if ($qrcode) {
                $time = date("Y-m-d H:i:s");

                $info = array(
                    'registration_no' => $qrcode,
                    'time' => $time
                );

                $where = array(
                    'registration_no' => $qrcode
                );

                if ($this->entrance->record($info)) {
                    $userName = $this->users->get_user($where);
                    //                  var_dump($userName['nick_name']);
                    $this->data['entrance'] =  "";
                    $this->data['nick_name'] = $userName['nick_name'];
                    $this->data['entrance_org'] = $userName['org'];

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

                    $notice = "";
                    $score = floor($spent / 60);
                    $remains = $spent % 60;

                    $max_score = $this->schedule->get_maxscore();

                    if ($score >= $max_score) {
                        $score = $max_score;
                        $notice = "현재 평점 {$score}";
                    } else {
                        $next_score = $score + 1;
                        $to_go = 60 - $remains;
                        $notice = "현재 평점 {$score}점, 평점 {$next_score}점까지 {$to_go}분 남았습니다.";
                    }

                    //                  var_dump($spent);
                    $this->data['enter'] = $enter;
                    $this->data['leave'] = $leave;
                    $this->data['score'] = $score;

                    $this->data['entrance'] =  $this->data['entrance'] . $notice;
                } else {
                    $this->data['entrance'] =  "<span class='red'>등록 실패: </span>" . $phone;
                    $this->data['entrance_org'] = '';
                }
            } else if (count($qrstr) == 6) {
                $url = $qrstr[0] . $qrstr[1] . $qrstr[2] . $qrstr[3] . $qrstr[4];
                $phone = $qrstr[5];
                $time = date("Y-m-d H:i:s");

                $info = array(
                    'registration_no' => $phone,
                    'time' => $time
                );

                $where = array(
                    'registration_no' => $phone
                );

                if (filter_var($phone, FILTER_VALIDATE_REGEXP, $rop) and $this->entrance->record($info)) {
                    $userName = $this->users->get_user($where);
                    //                  var_dump($userName['nick_name']);
                    $this->data['entrance'] =  "";
                    $this->data['nick_name'] = $userName['nick_name'];
                    $this->data['entrance_org'] = $userName['org'];

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

                    $notice = "";
                    $score = floor($spent / 60);
                    $remains = $spent % 60;

                    $max_score = $this->schedule->get_maxscore();

                    if ($score >= $max_score) {
                        $score = $max_score;
                        $notice = "현재 평점 {$score}";
                    } else {
                        $next_score = $score + 1;
                        $to_go = 60 - $remains;
                        $notice = "현재 평점 {$score}점, 평점 {$next_score}점까지 {$to_go}분 남았습니다.";
                    }

                    //                  var_dump($spent);
                    $this->data['enter'] = $enter;
                    $this->data['leave'] = $leave;
                    $this->data['score'] = $score;

                    $this->data['entrance'] =  $this->data['entrance'] . $notice;
                } else {
                    $this->data['entrance'] =  "<span class='red'>등록 실패: </span>" . $phone;
                    $this->data['entrance_org'] = '';
                }
            } else if (filter_var($qrcode, FILTER_VALIDATE_REGEXP, $rop)) {
                $time = date("Y-m-d H:i:s");
                $info = array(
                    'registration_no' => $qrcode,
                    'time' => $time
                );

                $where = array(
                    'registration_no' => $qrcode
                );

                if ($this->entrance->record($info)) {
                    $userName = $this->users->get_user($where);
                    //                  var_dump($userName['nick_name']);
                    $this->data['entrance'] =  "";
                    $this->data['nick_name'] = $userName['nick_name'];
                    $this->data['entrance_org'] = $userName['org'];

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

                    $notice = "";
                    $score = floor($spent / 60);
                    $remains = $spent % 60;

                    $max_score = $this->schedule->get_maxscore();

                    if ($score >= $max_score) {
                        $score = $max_score;
                        $notice = "현재 평점 {$score}";
                    } else {
                        $next_score = $score + 1;
                        $to_go = 60 - $remains;
                        $notice = "현재 평점 <span class='bg_point'>{$score}점</span>, 평점 <span class='bg_point'>{$next_score}점</span>까지 <span class='bg_point'>{$to_go}분</span> 남았습니다.";
                    }

                    $this->data['enter'] = $enter;
                    $this->data['leave'] = $leave;
                    $this->data['score'] = $score;

                    $this->data['entrance'] =  $this->data['entrance'] . $notice;
                } else {
                    $this->data['entrance'] =  "<span class='red'>등록 실패:</span> " . $phone;
                    $this->data['entrance_org'] = '';
                }
            } else {
                $this->data['entrance'] =  "등록 실패: phone not found";
            }

            $this->load->view('header');
            $this->load->view('access', $this->data);
            $this->load->view('footer');
        }
    }

    public function record()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('qrcode', 'text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->data['entrance'] = "";
            $this->data['entrance_org'] = '';
            $this->load->view('header');
            $this->load->view('access', $this->data);
            $this->load->view('footer');
        } else {
            $qrcode = $this->input->post('qrcode');
            $qrstr = explode('/', $qrcode);

            if (count($qrstr) == 6) {
                $url = $qrstr[0] . $qrstr[1] . $qrstr[2] . $qrstr[3] . $qrstr[4];
                $phone = $qrstr[5];
                $time = date("Y-m-d H:i:s");

                $info = array(
                    'phone' => $phone,
                    'time' => $time
                );

                $where = array(
                    'phone' => $phone
                );

                if (filter_var($phone, FILTER_VALIDATE_REGEXP, $rop) and $this->entrance->record($info)) {
                    $userName = $this->users->get_user($where);
                    //                  var_dump($userName['nick_name']);
                    $this->data['entrance'] =  "";
                    $this->data['nick_name'] = $userName['nick_name'];
                    $this->data['entrance_org'] = $userName['org'];

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

                    $notice = "";
                    $score = floor($spent / 60);
                    $remains = $spent % 60;

                    $max_score = $this->schedule->get_maxscore();

                    if ($score >= $max_score) {
                        $score = $max_score;
                        $notice = "현재 평점 {$score}";
                    } else {
                        $next_score = $score + 1;
                        $to_go = 60 - $remains;
                        $notice = "현재 평점 {$score}점, 평점 {$next_score}점까지 {$to_go}분 남았습니다.";
                    }

                    //                  var_dump($spent);
                    $this->data['enter'] = $enter;
                    $this->data['leave'] = $leave;
                    $this->data['score'] = $score;

                    $this->data['entrance'] =  $this->data['entrance'] . $notice;
                } else {
                    $this->data['entrance'] =  "<span class='red'>등록 실패: </span>" . $phone;
                    $this->data['entrance_org'] = '';
                }
            } else if (filter_var($qrcode, FILTER_VALIDATE_REGEXP, $rop)) {
                $time = date("Y-m-d H:i:s");
                $info = array(
                    'phone' => $qrcode,
                    'time' => $time
                );

                $where = array(
                    'phone' => $qrcode
                );

                if ($this->entrance->record($info)) {
                    $userName = $this->users->get_user($where);
                    //                  var_dump($userName['nick_name']);
                    $this->data['entrance'] =  "";
                    $this->data['nick_name'] = $userName['nick_name'];
                    $this->data['entrance_org'] = $userName['org'];

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

                    $notice = "";
                    $score = floor($spent / 60);
                    $remains = $spent % 60;

                    $max_score = $this->schedule->get_maxscore();

                    if ($score >= $max_score) {
                        $score = $max_score;
                        $notice = "현재 평점 {$score}";
                    } else {
                        $next_score = $score + 1;
                        $to_go = 60 - $remains;
                        $notice = "현재 평점 {$score}점, 평점 {$next_score}점까지 {$to_go}분 남았습니다.";
                    }

                    $this->data['enter'] = $enter;
                    $this->data['leave'] = $leave;
                    $this->data['score'] = $score;

                    $this->data['entrance'] =  $this->data['entrance'] . $notice;
                } else {
                    $this->data['entrance'] =  "<span class='red'>등록 실패:</span> " . $phone;
                    $this->data['entrance_org'] = '';
                }
            } else {
                $this->data['entrance'] =  "등록 실패: phone not found";
            }

            $this->load->view('header');
            $this->load->view('access', $this->data);
            $this->load->view('footer');
        }
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

    public function scan_qr()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('qrcode', 'text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->data['entrance'] = "";
            $this->data['entrance_org'] = '';
            $this->load->view('scan_qr', $this->data);
        } else {
            $rop = array("options" => array("regexp" => "/[0-9]{5,10}$/"));
            $qrcode = $this->input->post('qrcode');
            $qrstr = explode('/', $qrcode);

            if ($qrcode) {
                $time = date("Y-m-d H:i:s");

                $info = array(
                    'registration_no' => $qrcode,
                    'time' => $time
                );

                $where = array(
                    'registration_no' => $qrcode
                );

                if ($this->entrance->record($info)) {
                    $userName = $this->users->get_user($where);
                    //                  var_dump($userName['nick_name']);
                    $this->data['entrance'] =  "";
                    $this->data['nick_name'] = $userName['nick_name'];
                    $this->data['entrance_org'] = $userName['org'];

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

                    $notice = "";
                    $score = floor($spent / 60);
                    $remains = $spent % 60;

                    $max_score = $this->schedule->get_maxscore();

                    if ($score >= $max_score) {
                        $score = $max_score;
                        $notice = "현재 평점 {$score}";
                    } else {
                        $next_score = $score + 1;
                        $to_go = 60 - $remains;
                        $notice = "현재 평점 {$score}점, 평점 {$next_score}점까지 {$to_go}분 남았습니다.";
                    }

                    //                  var_dump($spent);
                    $this->data['enter'] = $enter;
                    $this->data['leave'] = $leave;
                    $this->data['score'] = $score;

                    $this->data['entrance'] =  $this->data['entrance'] . $notice;
                } else {
                    $this->data['entrance'] =  "<span class='red'>등록 실패: </span>" . $phone;
                    $this->data['entrance_org'] = '';
                }
            } else if (count($qrstr) == 6) {
                $url = $qrstr[0] . $qrstr[1] . $qrstr[2] . $qrstr[3] . $qrstr[4];
                $phone = $qrstr[5];
                $time = date("Y-m-d H:i:s");

                $info = array(
                    'registration_no' => $phone,
                    'time' => $time
                );

                $where = array(
                    'registration_no' => $phone
                );

                if (filter_var($phone, FILTER_VALIDATE_REGEXP, $rop) and $this->entrance->record($info)) {
                    $userName = $this->users->get_user($where);
                    //                  var_dump($userName['nick_name']);
                    $this->data['entrance'] =  "";
                    $this->data['nick_name'] = $userName['nick_name'];
                    $this->data['entrance_org'] = $userName['org'];



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

                    $notice = "";
                    $score = floor($spent / 60);
                    $remains = $spent % 60;

                    $max_score = $this->schedule->get_maxscore();

                    if ($score >= $max_score) {
                        $score = $max_score;
                        $notice = "현재 평점 {$score}";
                    } else {
                        $next_score = $score + 1;
                        $to_go = 60 - $remains;
                        $notice = "현재 평점 {$score}점, 평점 {$next_score}점까지 {$to_go}분 남았습니다.";
                    }

                    //                  var_dump($spent);
                    $this->data['enter'] = $enter;
                    $this->data['leave'] = $leave;
                    $this->data['score'] = $score;

                    $this->data['entrance'] =  $this->data['entrance'] . $notice;
                } else {
                    $this->data['entrance'] =  "<span class='red'>등록 실패: </span>" . $phone;
                    $this->data['entrance_org'] = '';
                }
            } else if (filter_var($qrcode, FILTER_VALIDATE_REGEXP, $rop)) {
                $time = date("Y-m-d H:i:s");
                $info = array(
                    'registration_no' => $qrcode,
                    'time' => $time
                );

                $where = array(
                    'registration_no' => $qrcode
                );

                if ($this->entrance->record($info)) {
                    $userName = $this->users->get_user($where);
                    //                  var_dump($userName['nick_name']);
                    $this->data['entrance'] =  "";
                    $this->data['nick_name'] = $userName['nick_name'];
                    $this->data['entrance_org'] = $userName['org'];

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

                    $notice = "";
                    $score = floor($spent / 60);
                    $remains = $spent % 60;

                    $max_score = $this->schedule->get_maxscore();

                    if ($score >= $max_score) {
                        $score = $max_score;
                        $notice = "현재 평점 {$score}";
                    } else {
                        $next_score = $score + 1;
                        $to_go = 60 - $remains;
                        $notice = "현재 평점 <span class='bg_point'>{$score}점</span>, 평점 <span class='bg_point'>{$next_score}점</span>까지 <span class='bg_point'>{$to_go}분</span> 남았습니다.";
                    }

                    $this->data['enter'] = $enter;
                    $this->data['leave'] = $leave;
                    $this->data['score'] = $score;

                    $this->data['entrance'] =  $this->data['entrance'] . $notice;
                } else {
                    $this->data['entrance'] =  "<span class='red'>등록 실패:</span> " . $phone;
                    $this->data['entrance_org'] = '';
                }
            } else {
                $this->data['entrance'] =  "등록 실패: phone not found";
            }

            $this->load->view('scan_qr', $this->data);
        }
    }
}
