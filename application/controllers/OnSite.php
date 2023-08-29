<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

class OnSite extends CI_Controller
{
    private $sheets;
    private $data;

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Seoul');
        $this->load->model('users');
    }

    public function index()
    {

        $this->load->view('header');
        $this->load->view('on-site', $this->data);
        $this->load->view('footer');
        $type = isset($_GET['type1']) ? $_GET['type1'] : null;
        $type2 = isset($_GET['type2']) ? $_GET['type2'] : null;
        $type4 = isset($_GET['type4']) ? $_GET['type4'] : null;
        $type5 = isset($_GET['type5']) ? $_GET['type5'] : null;
        $name = isset($_GET['nick_name']) ? $_GET['nick_name'] : null;
        $phone1 = isset($_GET['phone1']) ? $_GET['phone1'] : null;
        $phone2 = isset($_GET['phone2']) ? $_GET['phone2'] : null;
        $email1 = isset($_GET['email1']) ? $_GET['email1'] : null;
        $email2 = isset($_GET['email2']) ? $_GET['email2'] : null;
        $org = isset($_GET['org']) ? $_GET['org'] : null;
        $license = isset($_GET['ln']) ? $_GET['ln'] : null;
        $special_license = isset($_GET['sn']) ? $_GET['sn'] : null;

        $phone =  $phone1 . $phone2;

        if (!empty($name) || !empty($firstName)) {
            if ($type4 == "on") {
                $type3 = "회원";
            } else {
                $type3 = "비회원";
            }
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
                $deposit = '미결제';
            else
                $deposit = '미결제';

            $time = date("Y-m-d H:i:s");
            // $uagent = $this->agent->agent_string();

            $email = $email1 . "@" . $email2;
            $info = array(
                'nick_name' => preg_replace("/\s+/", "", $name),
                'ln' => preg_replace("/\s+/", "", $license),
                'sn' => preg_replace("/\s+/", "", $special_license),
                'org' => trim($org),
                'org_nametag' => trim($org),
                'phone' => preg_replace("/\s+/", "", $phone),
                'email' => preg_replace("/\s+/", "", $email),
                'type' => trim($type),
                'type2' => trim($type2),
                'type3' => trim($type3),
                'fee' => $fee,
                'time' => $time,
                'deposit' => $deposit,
                // 'uagent' => $uagent,
            );
            $this->users->add_onsite_user($info);
        }
    }

    public function mobile()
    {


        if (isset($_GET['nick_name'])) {


            $type = isset($_GET['type1']) ? $_GET['type1'] : null;
            $type2 = isset($_GET['type2']) ? $_GET['type2'] : null;
            $name = isset($_GET['nick_name']) ? $_GET['nick_name'] : null;
            $phone = isset($_GET['phone']) ? $_GET['phone'] : null;
            $email1 = isset($_GET['email1']) ? $_GET['email1'] : null;
            $email2 = isset($_GET['email2']) ? $_GET['email2'] : null;
            $org = isset($_GET['org']) ? $_GET['org'] : null;
            $license = isset($_GET['ln']) ? $_GET['ln'] : null;
            $special_license = isset($_GET['sn']) ? $_GET['sn'] : null;
            $category_1 = isset($_GET['category-1']) ? $_GET['category-1'] : null;
            $category_2 = isset($_GET['category-2']) ? $_GET['category-2'] : null;
            $category_3 = isset($_GET['category-3']) ? $_GET['category-3'] : null;
            $category_4 = isset($_GET['category-4']) ? $_GET['category-4'] : null;
            $category_5 = isset($_GET['category-5']) ? $_GET['category-5'] : null;
            $category_6 = isset($_GET['category-6']) ? $_GET['category-6'] : null;
            $category_7 = isset($_GET['category-7']) ? $_GET['category-7'] : null;
            $category_8 = isset($_GET['category-8']) ? $_GET['category-8'] : null;
            $category_9 = isset($_GET['category-9']) ? $_GET['category-9'] : null;
            $category_10 = isset($_GET['category-10']) ? $_GET['category-10'] : null;
            $category_11 = isset($_GET['category-11']) ? $_GET['category-11'] : null;
            $category_12 = isset($_GET['category-12']) ? $_GET['category-12'] : null;
            $category_13 = isset($_GET['category-13']) ? $_GET['category-13'] : null;
            $category_14 = isset($_GET['category-14']) ? $_GET['category-14'] : null;
            $category_15 = isset($_GET['category-15']) ? $_GET['category-15'] : null;
            $category_16 = isset($_GET['category-16']) ? $_GET['category-16'] : null;
            $fee = 0;
            $type3 = 0;
            $etc1 = "신청";
            $type1 = "";
            if ($category_1) {
                $fee = 90000;
                $type3 = "회원";
                $type = "전문의";
            }
            if ($category_2) {
                $fee = 110000;
                $type3 = "비회원";
                $type = "전문의";
            }
            if ($category_3) {
                $fee = 70000;
                $type3 = "회원";
                $type = "전공의";
            }
            if ($category_4) {
                $fee = 90000;
                $type3 = "비회원";
                $type = "전공의";
            }
            if ($category_5) {
                $fee = 70000;
                $type3 = "회원";
                $type = "기타";
            }
            if ($category_6) {
                $fee = 90000;
                $type3 = "비회원";
                $type = "기타";
            }
            if ($category_7) {
                $type = "전문의";
                $type1 = "개원의";
            }
            if ($category_8) {
                $type = "전문의";
                $type1 = "봉직의";
            }
            if ($category_9) {
                $type = "전문의";
                $type1 = "교수";
            }
            if ($category_10) {
                $type = "전문의";
                $type1 = "전임의";
            }
            if ($category_11) {
                $type = "기타";
                $type1 = "기초의학자";
            }
            if ($category_12) {
                $type = "기타";
                $type1 = "간호사";
            }
            if ($category_13) {
                $type = "기타";
                $type1 = "약사";
            }
            if ($category_14) {
                $type = "기타";
                $type1 = "군의관";
            }
            if ($category_15) {
                $type = "기타";
                $type1 = "기타";
            }
            if ($category_16) {
                $type1 = $category_16;
            }

            if ($fee == 0)
                $deposit = '미결제';
            else
                $deposit = '미결제';

            $time = date("Y-m-d H:i:s");
            if ($license) {
                $etc1 = "신청";
            } else {
                $etc1 = "미신청";
            }
            // $uagent = $this->agent->agent_string();


            $email = $email1 . "@" . $email2;
            $info = array(
                'nick_name' => preg_replace("/\s+/", "", $name),
                'ln' => preg_replace("/\s+/", "", $license),
                'sn' => preg_replace("/\s+/", "", $special_license),
                'org' => trim($org),
                'org_nametag' => trim($org),
                'phone' => preg_replace("/\s+/", "", $phone),
                'email' => preg_replace("/\s+/", "", $email),
                'type' => trim($type),
                'type1' => trim($type1),
                'type2' => $type2,
                'type3' => trim($type3),
                'fee' => $fee,
                'time' => $time,
                'deposit' => $deposit,
                'etc1' => $etc1,
                // 'uagent' => $uagent,
            );
            $this->users->add_onsite_user($info);
            $data['fee'] = $fee;
            $this->load->view('success', $data);
        } else {
            $this->load->view('mobile_onsite');
        }
    }

    public function success()
    {
        $data['fee'] = $_GET['fee'];
        $this->load->view('success', $data);
    }
}
