<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Model
{
    private $users = "users";

    //qr_chk_day_1, 2 => d -> d1 day1 / d2 day2
    //attendance_type => a -> ap 일반참석자 / ac 임원 / ach 좌장 / as 연자 / apn 패널 / aj 심사자 / ao 외부초청
    //member_type => m -> m0 교수 / m1 개원의 / m2 봉직의 / m3 전임의 / m4 수련의 / m5 전공의 
                         //m6 영양사 / m7 운동사 / m8 간호사 / m9 군의관 / m10 공보의 
                         //m11 연구원 / m 12 학생 / m13 전시(부스) / m14 기타

                         

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////// 일반참석자
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   public function get_d1_ap_m0()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }

   public function get_d1_ap_m1()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }

   public function get_d1_ap_m2()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }

   public function get_d1_ap_m3()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
   
   public function get_d1_ap_m4()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
      
   public function get_d1_ap_m5()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
         
   public function get_d1_ap_m6()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
         
   public function get_d1_ap_m7()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
            
   public function get_d1_ap_m8()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
               
   public function get_d1_ap_m9()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
                 
   public function get_d1_ap_m10()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }

   public function get_d1_ap_m11()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }

   public function get_d1_ap_m12()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
                    
   public function get_d1_ap_m13()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type LIKE '%전시(부스)%'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
                       
   public function get_d1_ap_m14()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type LIKE '%기타%'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }

   public function add_d1_ap()
   {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '일반참석자' 
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
   }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////// 임원
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_d1_ac_m0()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_d1_ac_m1()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_d1_ac_m2()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_d1_ac_m3()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_d1_ac_m4()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '수련의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_d1_ac_m5()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '전공의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
        
    public function get_d1_ac_m6()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '영양사'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
        
    public function get_d1_ac_m7()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '운동사'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
            
    public function get_d1_ac_m8()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '간호사'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
                
    public function get_d1_ac_m9()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '군의관'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
                
    public function get_d1_ac_m10()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '공보의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_d1_ac_m11()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '연구원'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_d1_ac_m12()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
                    
    public function get_d1_ac_m13()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type LIKE '%전시(부스)%'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
                        
    public function get_d1_ac_m14()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' AND a.member_type LIKE '%기타%'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function add_d1_ac()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '임원' 
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
    }

    

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////// 좌장
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_d1_ach()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '좌장'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function add_d1_ach()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '좌장' 
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////// 연자
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_d1_as()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '연자'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function add_d1_as()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '연자' 
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////// 패널
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_d1_apn()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '패널'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function add_d1_apn()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '패널' 
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////// 심사자
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_d1_aj()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type LIKE '%심사%'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function add_d1_aj()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type LIKE '%심사%'
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
    }
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////// 외부초청
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_d1_ao()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type LIKE '%외부초청%'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function add_d1_ao()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type LIKE '%외부초청%'
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////// 일반참석자
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   public function get_d2_ap_m0()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }

   public function get_d2_ap_m1()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }

   public function get_d2_ap_m2()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }

   public function get_d2_ap_m3()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
   
   public function get_d2_ap_m4()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
      
   public function get_d2_ap_m5()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
         
   public function get_d2_ap_m6()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
         
   public function get_d2_ap_m7()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
            
   public function get_d2_ap_m8()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
               
   public function get_d2_ap_m9()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
                 
   public function get_d2_ap_m10()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }

   public function get_d2_ap_m11()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }

   public function get_d2_ap_m12()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
                    
   public function get_d2_ap_m13()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type LIKE '%전시(부스)%'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }
                       
   public function get_d2_ap_m14()
   {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' AND a.member_type LIKE '%기타%'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
   }

   public function add_d2_ap()
   {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '일반참석자' 
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
   }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////// 임원
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_d2_ac_m0()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_d2_ac_m1()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_d2_ac_m2()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_d2_ac_m3()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_d2_ac_m4()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '수련의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_d2_ac_m5()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '전공의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
        
    public function get_d2_ac_m6()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '영양사'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
        
    public function get_d2_ac_m7()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '운동사'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
            
    public function get_d2_ac_m8()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '간호사'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
                
    public function get_d2_ac_m9()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '군의관'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
                
    public function get_d2_ac_m10()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '공보의'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_d2_ac_m11()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '연구원'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_d2_ac_m12()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
                    
    public function get_d2_ac_m13()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type LIKE '%전시(부스)%'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }
                        
    public function get_d2_ac_m14()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' AND a.member_type LIKE '%기타%'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function add_d2_ac()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '임원' 
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
    }

    

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////// 좌장
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_d2_ach()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '좌장'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function add_d2_ach()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '좌장' 
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////// 연자
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_d2_as()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '연자'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function add_d2_as()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '연자' 
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////// 패널
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_d2_apn()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '패널'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function add_d2_apn()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '패널' 
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////// 심사자
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_d2_aj()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type LIKE '%심사%'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function add_d2_aj()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type LIKE '%심사%'
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
    }
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////// 외부초청
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_d2_ao()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type LIKE '%외부초청%'
        ORDER BY a.id ASC
        ");
        $result = $query->result_array();
        return count($result); 
    }

    public function add_d2_ao()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type LIKE '%외부초청%'
            ORDER BY a.id ASC
            ");
            $result = $query->result_array();
            return count($result); 
    }
}

?>
