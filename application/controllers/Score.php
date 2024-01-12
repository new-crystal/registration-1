<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

class Score extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Seoul');
        $this->load->model('rating');
        $this->load->library("excel");
    }

    public function index()
    {
        $this->load->view('admin/header');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nick_name', '이름', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('abstract_rating');
        }else{
            $name = $this->input->post('nick_name');
            $email = $this->input->post('email');

            $where = array(
                'nick_name' => $name,
                'email' => $email
            );

            $data['reviewers'] = $this->rating->get_reviewer($where);
            if (empty($data['reviewers'])) {
                // If $data['reviewer'] is empty, load the 'fail' view
                $this->load->view('abstract_fail');
            } else {
                foreach( $data['reviewers'] as $reviewer){
                    $where1 = array(
                        'idx' => $reviewer['abstract1']
                    );
                    $data['abstract1'] = $this->rating->get_abstract($where1);

                    $where2 = array(
                        'idx' => $reviewer['abstract2']
                    );
                    $data['abstract2'] = $this->rating->get_abstract($where2);

                    $where3 = array(
                        'idx' => $reviewer['abstract3']
                    );
                    $data['abstract3'] = $this->rating->get_abstract($where3);

                    $where4 = array(
                        'idx' => $reviewer['abstract4']
                    );
                    $data['abstract4'] = $this->rating->get_abstract($where4);

                    $where5 = array(
                        'idx' => $reviewer['abstract5']
                    );
                    $data['abstract5'] = $this->rating->get_abstract($where5);

                    // If $data['reviewer'] is not empty, load the 'abstract_rating2' view
                    $this->load->view('abstract_rating2', $data);
                }
            }
        }
    }

    public function add_sum(){
        
        $abstract_idx = $_GET['abstract_idx'];
        $reviewer_idx = $_GET['reviewer_idx'];
        $sum = $_GET['sum'];
        $time = date("Y-m-d H:i:s");

        $info = array(
            'abstract_idx' => $abstract_idx,
            'reviewer_idx' => $reviewer_idx,
            'score' => $sum,
            'time' => $time
        );

        $data['score'] = $this->rating->get_scores();
        $data['abstracts'] = $this->rating->get_abstracts();

        $found = false;

        foreach($data['score'] as $score) {
            if($score['abstract_idx'] == $abstract_idx && $score['reviewer_idx'] == $reviewer_idx) {
                $where = array(
                    'idx' => $score['idx']
                );
                $this->rating->update_score($info, $where);
                $found = true;
                break; // 이미 찾았으니 루프 종료
            }
        }

        if (!$found) {

            foreach($data['abstracts'] as $abstract){
                
                if($abstract['idx'] == $abstract_idx){
                    $newSum = $abstract['sum'] + $sum;

                    $infoArr = array(
                        'sum' => $newSum
                    );
                    $wheres = array(
                        'idx' => $abstract_idx
                    );
                    $this->rating->update_score_sum($infoArr, $wheres);
                }
            }

            $this->rating->add_score($info);
        }

       
    }

    public function admin(){
        $this->load->view('admin/header');
        $data['abstracts'] = $this->rating-> get_abstracts();
        $data['scores'] = $this->rating-> get_sum();
        $this->load->view('score_admin', $data);
    }

    public function abstract_excel(){
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        $table_columns = array("순위", "초록번호", "성함", "소속", "국가", "초록 카테고리", "총점");

        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $excel_row = 2;

        $list = $this->rating->get_abstracts();

        foreach ($list as $row) {

            // $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, number_format($row['fee']));
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $excel_row - 1);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['submission_code']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['first_name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['org']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['nation']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['category']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['sum']);
         

            $excel_row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="초록집계현황.xlsx"');

        header('Cache-Control: max-age=0');

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $object_writer->save('php://output');
    }

    public function score_detail(){
        $this->load->view('admin/header');
        $idx = $_GET['n'];
        $where = array(
            'abstract_idx' => $idx
        );

        $wheres = array(
            'idx' => $idx
        );

        $data['abstract'] =  $this->rating-> get_abstract($wheres);
        $data['scores'] = $this->rating-> get_detail($where);
        $this->load->view('score_detail', $data);
    }
}
