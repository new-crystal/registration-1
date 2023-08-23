<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

class Home extends CI_Controller
{
	private $sheets;
	private $data;

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Seoul');
	}

	public function index()
	{
		if (!isset($this->session->user_data['logged_in'])) {
			$this->session->set_userdata('user_data', array(
				'serial_number' => ""
			));
		}
		$where['sn'] = $this->session->user_data['serial_number'];

		// session check
		if (isset($this->session->old_data)) {
			$different = time() - $this->session->old_data['register_time'];

			if ($different < 5) {
				$this->session->set_userdata('user_data', $this->session->old_data);
				unset($_SESSION["old_data"]);
			}
		}

		// $this->load->view('header');
		$this->load->view('home_2', $this->data);
		// $this->load->view('footer');
	}

	public function term()
	{

		$this->load->view('header');
		$this->load->view('term');
		$this->load->view('footer');
	}

	public function privacy()
	{
		$this->load->view('header');
		$this->load->view('privacy');
		$this->load->view('footer');
	}

	public function init_()
	{
	}


	public function check_session()
	{
		if (isset($this->session->user_data['logged_in'])) {
			echo "yes";
		} else {
			echo "no";
		}
	}

	public function kill_session()
	{
		unset($_SESSION["user_data"]);
		redirect();
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
