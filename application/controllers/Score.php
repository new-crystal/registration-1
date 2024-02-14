<?php
defined('BASEPATH') or exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

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
                $this->load->view('abstract_fail');
            } else {
                foreach( $data['reviewers'] as $reviewer){
                    $where1 = array(
                        'submission_code' => $reviewer['abstract1']
                    );
                    $data['abstract1'] = $this->rating->get_abstract($where1);

                    $where2 = array(
                        'submission_code' => $reviewer['abstract2']
                    );
                    $data['abstract2'] = $this->rating->get_abstract($where2);

                    $where3 = array(
                        'submission_code' => $reviewer['abstract3']
                    );
                    $data['abstract3'] = $this->rating->get_abstract($where3);

                    $where4 = array(
                        'submission_code' => $reviewer['abstract4']
                    );
                    $data['abstract4'] = $this->rating->get_abstract($where4);

                    $where5 = array(
                        'submission_code' => $reviewer['abstract5']
                    );
                    $data['abstract5'] = $this->rating->get_abstract($where5);

                    // If $data['reviewer'] is not empty, load the 'abstract_rating2' view
                    $this->load->view('abstract_rating2', $data);
                }
            }
        }
    }

    public function add_sum(){
        
        $abstract_idx = $_POST['abstract_idx'];
        $reviewer_idx = $_POST['reviewer_idx'];
        $score1 = $_POST['score1'];
        $score2 = $_POST['score2'];
        $score3 = $_POST['score3'];
        $score4 = $_POST['score4'];
        $coi = $_POST['coi'];
        $time = date("Y-m-d H:i:s");

        $info = array(
            'abstract_idx' => $abstract_idx,
            'reviewer_idx' => $reviewer_idx,
            'score1' => $score1,
            'score2' => $score2,
            'score3' => $score3,
            'score4' => $score4,
            'coi' => $coi,
            'time' => $time
        );

        $data['score'] = $this->rating->get_scores();
        $data['abstracts'] = $this->rating->get_abstracts();

        $found = false;

        //같은 초록, 같은 심사자 경우
        //점수 수정할 경우 위에 덮어 씌여지도록 
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
            $this->rating->add_score($info);
        }

       
    }

    public function admin(){
        $this->load->view('admin/header');
        $data['primary_menu'] = 'oral';
        $this->load->view('left_side_menu.php', $data);
        
        $where = array(
            'type' => 0
        );

        //초록 카테고리 리스트
        $data['abstracts_category'] = $this->rating-> get_abstract_category();
        //초록
        $data['abstracts'] = $this->rating-> get_abstracts_sum($where);
        
        $this->load->view('score_admin', $data);
    }

    public function admin_poster1(){
        $this->load->view('admin/header');
        $data['primary_menu'] = 'poster_1';
        $this->load->view('left_side_menu.php', $data);

        $where = array(
            'type' => 1
        );

        //초록 카테고리 리스트
        $data['abstracts_category'] = $this->rating-> get_abstract_category();
        //초록
        $data['abstracts'] = $this->rating-> get_abstracts_sum($where);
        
        $this->load->view('score_admin', $data);
    }

    public function admin_poster2(){
        $this->load->view('admin/header');
        $data['primary_menu'] = 'poster_2';
        $this->load->view('left_side_menu.php', $data);

        $where = array(
            'type' => 2
        );

        //초록 카테고리 리스트
        $data['abstracts_category'] = $this->rating-> get_abstract_category();
        //초록
        $data['abstracts'] = $this->rating-> get_abstracts_sum($where);
        
        $this->load->view('score_admin', $data);
    }

    //excel / 총합, 평균, 순위만 출력 / 5개 카테고리 모두 출력
    public function abstract_excel(){
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        //페이지별 type 받아오기
        $type =  $this->input->post('type');
    
        // 카테고리별로 반복하여 데이터 채우기
        for ($category = 0; $category <= 4; $category++) {
            // 카테고리명 출력
            $category_name = $this->getCategoryName($category); 
            $object->getActiveSheet()->setCellValue('A' . $this->getCategoryRow($category), $category_name);
            $object->getActiveSheet()->mergeCells('A' . $this->getCategoryRow($category) . ':I' . $this->getCategoryRow($category));
            
            // 카테고리별로 데이터 가져오기
            $where = array(
                'type' => $type,
                'category' => $category
            );
            $list = $this->rating->get_abstract_excel($where);
    
            // 테이블 헤더 설정
            $table_columns = array("NO.", "초록번호", "발표자", "소속", "국적", "초록 제목", "전체 총합", "평균", "순위");
            //$additional_columns = array("연구의 창의성", "방법의 타당성", "결과의 영향력", "발표의 우수성", "COI", "총점", "조정점수");
            $start_row = $this->getCategoryRow($category) + 1; 
            


            // 테이블 헤더 추가
            $column = 0;
            foreach ($table_columns as $field) {
                $object->getActiveSheet()->setCellValueByColumnAndRow($column, $start_row, $field);
                $column++;
            }
    
            // 데이터 채우기
            $excel_row = $start_row + 1;
            foreach ($list as $row) {
                $where_detail = array('idx' => $row['idx']);
                $detail_list = $this->rating->get_detail($where_detail); // 평균 얻기
                
                $average = 0; // 평균 초기화
    
                if (count($detail_list) > 0) {
                    $average = $row['total_sum'] / count($detail_list); // 평균 계산
                }
    
                // 행 데이터 채우기
                $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $excel_row - $start_row);
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['submission_code']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['first_name']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['org']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['nation']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['title']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['total_sum']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $average);
                $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $excel_row - $start_row);
    
                // 행 증가
                $excel_row++;
            }
        }
    
        // 엑셀 파일로 내보내기
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="초록집계현황.xlsx"');
        header('Cache-Control: max-age=0');
        
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $object_writer->save('php://output');
    }
    
    // 카테고리에 대한 행 위치를 반환하는 함수
    private function getCategoryRow($category) {
        return $category * 12 + 3;
    }
    
    // 카테고리에 대한 이름을 반환하는 함수 (예: 0 -> "Clinical", 1 -> "Basic")
    private function getCategoryName($category) {
        // 카테고리에 따라 다른 이름을 반환
        switch ($category) {
            case 0:
                return "Diabetes/Obesity/Lipid (clinical)";
                break;
            case 1:
                return "Diabetes/Obesity/Lipid (basic)";
                break;
            case 2:
                return "Bone/Muscle";
                break;
            case 3:
                return "Thyroid";
                break;
            case 4:
                return "Pituitary/Adrenal/Gonad";
                break;
        }
    }

 
    

    public function score_detail(){
        $this->load->view('admin/header');
        $idx = $_GET['n'];
        // $wheres = array(
        //     'abstract_idx' => $idx
        // );

        $where = array(
            'idx' => $idx
        );

        $data['abstract'] = $this->rating-> get_abstract($where);
        $data['abstract_detail'] =  $this->rating-> get_detail($where);
        $this->load->view('score_detail', $data);
    }

    //excel / table로 만들기(test) / 심사위원별 점수 출력 / 심사위원 이름 출력 필요
    public function scoreExcel()
{
    $html = '<table border="1">';
    $html .= '<thead><tr>';
    $html .= '<th>순위</th><th>초록번호</th><th>발표자</th><th>소속</th><th>국적</th><th>초록 제목</th>';
    $html .= '<th>연구의 창의성</th><th>방법의 타당성</th><th>결과의 영향력</th><th>발표의 우수성</th><th>COI</th><th>총점</th>';
    $html .= '<th>연구의 창의성</th><th>방법의 타당성</th><th>결과의 영향력</th><th>발표의 우수성</th><th>COI</th><th>총점</th>';
    $html .= '<th>연구의 창의성</th><th>방법의 타당성</th><th>결과의 영향력</th><th>발표의 우수성</th><th>COI</th><th>총점</th>';
    $html .= '<th>연구의 창의성</th><th>방법의 타당성</th><th>결과의 영향력</th><th>발표의 우수성</th><th>COI</th><th>총점</th>';
    $html .= '<th>연구의 창의성</th><th>방법의 타당성</th><th>결과의 영향력</th><th>발표의 우수성</th><th>COI</th><th>총점</th>';
    $html .= '<th>연구의 창의성</th><th>방법의 타당성</th><th>결과의 영향력</th><th>발표의 우수성</th><th>COI</th><th>총점</th>';
    $html .= '<th>연구의 창의성</th><th>방법의 타당성</th><th>결과의 영향력</th><th>발표의 우수성</th><th>COI</th><th>총점</th>';
    $html .= '<th>연구의 창의성</th><th>방법의 타당성</th><th>결과의 영향력</th><th>발표의 우수성</th><th>COI</th><th>총점</th>';
    $html .= '<th>전체 총합</th><th>평균</th><th>순위</th>';
    $html .= '</tr></thead>';
    $html .= '<tbody>';

    $excel_row = 1;

    $where = array(
        'type' => 0,
        'category' => 0
    );

    $list = $this->rating->get_abstract_excel($where);

    foreach ($list as $row) {
        $sum = 0;
        $html .= '<tr>';
        
        $where_detail = array(
            'type' => 0,
            'category' => 0,
            'idx' => $row['idx']
        );

        $html .= "<td>$excel_row</td>";
        $html .= "<td>{$row['submission_code']}</td>";
        $html .= "<td>{$row['first_name']}</td>";
        $html .= "<td>{$row['org']}</td>";
        $html .= "<td>{$row['nation']}</td>";
        $html .= "<td>{$row['title']}</td>";

        $list_detail = $this->rating->get_detail($where_detail);
        $index = 1;
        foreach ($list_detail as $detail) {
            $index +=1;
            $html .= "<td>{$detail['score1']}</td>";
            $html .= "<td>{$detail['score2']}</td>";
            $html .= "<td>{$detail['score3']}</td>";
            $html .= "<td>{$detail['score4']}</td>";
            $html .= "<td>{$detail['coi']}</td>";
            $html .= "<td>{$detail['sum']}</td>";
            $sum += $detail['sum'];
        }
        $html .= "<td>{$sum}</td>";
        $html .= "<td>평균</td>";
        $html .= "<td>순위</td>";
        $html .= '</tr>';
        $excel_row++;
    }
    
    $html .= '</tbody>';
    $html .= '</table>';
    
    // Excel 파일로 내보내기
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="초록집계현황.xls"');
    header('Cache-Control: max-age=0');
    
    echo $html;
}

}
