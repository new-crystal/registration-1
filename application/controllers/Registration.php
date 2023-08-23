<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

class Registration extends CI_Controller
{
    private $sheets;
    private $data;

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Seoul');
        $this->load->model('users');
        $this->load->library("excel");
        $this->load->library("user_agent");
        $this->load->library("phpmailer_lib");
        $this->load->config('common');
        ini_set('memory_limit', '-1');
    }

    public function index()
    {
        $this->load->view('header');
        $where = array(
            'type2' => '일반참석자'
            //    'deposit !=' => '미결제'
        );
        $data['user_chk'] = $this->users->num_row($where);
        $data['limit_count'] = $this->config->item('limit_count');
        $this->load->view('registration/info', $data);
        $this->load->view('footer');
    }

    public function info()
    {
        $this->load->view('header');
        $where = array(
            'type2' => '일반참석자'
            //'deposit !=' => '미결제'
        );
        $data['user_chk'] = $this->users->num_row($where);
        $data['limit_count'] = $this->config->item('limit_count');
        $this->load->view('registration/info', $data);
        $this->load->view('footer');
    }

    public function search()
    {
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', '성명', 'required');
        $this->form_validation->set_rules('email', '이메일', 'required');
        //        $this->form_validation->set_rules('license', 'sn', 'required');
        //        $this->form_validation->set_rules('license', 'sn', 'callback_sn_check');
        //        $this->form_validation->set_message('sn_check', '<p style="color:red; text-align: center;">※ 사전등록된 내용이 없습니다. 사전등록을 진행 해 주세요.</p>');

        if ($this->form_validation->run() === FALSE) {
            $this->form_validation->set_message('name', '<p style="color:red; text-align: center;">※ 성명을 입력해 주세요.</p>');
            $this->form_validation->set_message('email', '<p style="color:red; text-align: center;">※ 이메일을 입력해 주세요.</p>');

            //            $license = $this->input->post('license');
            //            if(!empty($license)){
            //                echo "<script type='text/javascript'> alert('※ 사전등록된 내용이 없습니다. 사전등록을 진행 해 주세요.');</script>";
            //            }

            $this->load->view('header');
            $this->load->view('registration/search');
            $this->load->view('footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $info = array(
                'nick_name' => $name,
                'email' => $email
            );

            $this->load->view('header');
            $this->data['users'] = $this->users->get_user($info);
            if (!empty($this->data['users'])) {
                $this->load->view('registration/show', $this->data);
                //                echo var_export($this->data['users']);
            } else {
                echo "<script type='text/javascript'> alert('※ 일치하는 내용이 없습니다.');</script>";
                $this->load->view('registration/search', $this->data);
            }
            $this->load->view('footer');
        }
    }


    public function sn_check($sn)
    {

        $info = array(
            'sn' => preg_replace("/\s+/", "", $sn)
        );

        $rows = $this->users->num_row($info);

        if ($rows == 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


    function _sendEmail($email, $name)
    {
        $mail = $this->phpmailer_lib->load();
        $mail->IsSMTP();
        try {
            $mail->Host = "tls://smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Port = 587;
            $mail->SMTPSecure = "tls";
            $mail->Username   = "intoonit@gmail.com";
            $mail->Password   = "intoon2285!!";
            //          $mail->SMTPDebug = 2;
            $mail->CharSet = "utf-8";
            $mail->SetFrom('kscpmd@kscpmd.or.kr', '대한심뇌혈관질환예방학회');
            $mail->AddReplyTo('kscpmd@kscpmd.or.kr', '대한심뇌혈관질환예방학회');
            $mail->AddAddress($email, $name);
            $mail->Subject = 'KSCP 등록이 완료되었습니다.';
            $mail->isHTML(true);
            $mail->Body =
                "<html>
                    <body>
                        <p> 회원님! </p>
                        <p> 등록이 완료되었습니다! </p>
                    </body>
                 </html>";
            $mail->AltBody = "[텍스트 내용123]";

            //$mail->MsgHTML((string)$random);
            $mail->Send();
        } catch (phpmailerException $e) {
            //          echo $e->errorMessage();
            error_log(print_r($e->errorMessage(), TRUE), 3, '/tmp/errors.log');
            return false;
        } catch (Exception $e) {
            //          echo $e->getMessage();
            error_log(print_r($e->errorMessage(), TRUE), 3, '/tmp/errors.log');
            return false;
        }
        return true;
    }

    public function enroll()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', '이름', 'required');
        $this->form_validation->set_rules('license', '면허번호', 'required');
        $this->form_validation->set_rules('org', '소속', 'required');
        $this->form_validation->set_rules('phone', '전화번호', 'required');
        $this->form_validation->set_rules('email', '이메일주소', 'required');
        $this->form_validation->set_rules('type', '구분1', 'required');
        $this->form_validation->set_rules('type2', '구분2', 'required');
        $this->form_validation->set_rules('type3', '회원여부', 'required');
        $this->form_validation->set_rules('postcode', '주소', 'required');
        $this->form_validation->set_rules('deposit_date', '입금예정일', 'required');
        $this->form_validation->set_rules('deposit_name', '입금자명', 'required');
        $this->form_validation->set_rules('phone', '전화번호', 'callback_double_check');
        $this->form_validation->set_message('double_check', '<p style="color:red; text-align: center;">※ 이미 사전등록 완료된 내용이 있습니다.</p>');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('header');
            $where = array(
                'type2' => '일반참석자'
                //'deposit !=' => '미결제'
            );
            $data['user_chk'] = $this->users->num_row($where);
            $data['limit_count'] = $this->config->item('limit_count');
            $this->load->view('registration/enroll', $data);
            $this->load->view('footer');
        } else {
            $name = $this->input->post('name');
            $license = $this->input->post('license');
            $org = $this->input->post('org');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $type = $this->input->post('type');
            $type2 = $this->input->post('type2');
            $type3 = $this->input->post('type3');
            $postcode = $this->input->post('postcode');
            $address = $this->input->post('address');
            $detailAddress = $this->input->post('detailAddress');
            $extraAddress = $this->input->post('extraAddress');
            $deposit_date = $this->input->post('deposit_date');
            $deposit_name = $this->input->post('deposit_name');

            $addr = $address . " " . $detailAddress . " " . $extraAddress;

            $time = date("Y-m-d H:i:s");
            $uagent = $this->agent->agent_string();


            if ($type2 == '개원의' || $type2 == '봉직의' || $type2 == '전문의' || $type2 == '교수' || $type2 == '군의관') {
                if ($type == '좌장' || $type == '연자' || $type == '패널') {
                    $fee = 0;
                } else {
                    if ($type3 == '비회원') {
                        $fee = 50000;
                    } else {
                        $fee = 30000;
                    }
                }
            } else if ($type2 == '간호사' || $type2 == '영양사' || $type2 == '약사' || $type2 == '운동처방사' || $type2 == '연구원') {
                if ($type == '좌장' || $type == '연자' || $type == '패널') {
                    $fee = 0;
                } else {
                    if ($type3 == '비회원') {
                        $fee = 40000;
                    } else {
                        $fee = 20000;
                    }
                }
            } else {
                $fee = 0;
            }

            if ($fee == 0)
                $deposit = '입금완료';
            else
                $deposit = '미결제';

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
                'deposit_name' => $deposit_name
            );

            $this->load->view('header');
            $this->users->add_user($info);
            $data['users'] = $this->users->get_user($info);
            $this->load->view('registration/show', $data);
            //            $this->load->view('registration/success');
            //            $this->_sendEmail(trim($email), trim($name));
            $this->load->view('footer');
        }
    }

    public function double_check($phone)
    {

        $info = array(
            'phone' => preg_replace("/\s+/", "", $phone)
        );

        $rows = $this->users->num_row($info);

        if ($rows == 0) {
            return TRUE;
        } else {
            echo "<script type='text/javascript'> alert('※ 이미 사전등록 완료된 내용이 있습니다.');</script>";
            return FALSE;
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
}
