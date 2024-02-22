<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

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
        ini_set('memory_limit', '-1');
    }

    public function index()
    {
        //$this->qrcode_e->create_QRcode("Hello, World!!!!!", "qrcode.png");
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
        $data['users'] = $this->users->get_user($where);
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
        $this->load->view('qr_open', $data);
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
