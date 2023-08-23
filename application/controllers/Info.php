<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

class Info extends CI_Controller
{
    private $sheets;
    private $data;

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Seoul');
        $this->load->model('users');
        $this->load->config('common');
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
        $this->load->view('info', $data);
        $this->load->view('footer');
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
