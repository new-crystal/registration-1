<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Participant extends CI_Model
{
    private $users = "users";


	//참석자 현황 페이지 model!!

	 
    //type1 => t -> t0 의료 / t1 영양 / t2 운동 / t3 전시(부스) /t4 기타
    //qr_chk_day_1, 2 => d -> d1 day1 / d2 day2
    //onsite_reg => pre 사전등록 0 / on 현장등록 1
    //attendance_type => a -> ap 일반참석자 / ac 임원
    //member_type => m -> m0 교수 / m1 개원의 / m2 봉직의 / m3 전임의 / m4 수련의 / m5 전공의 
                         //m6 영양사 / m7 운동사 / m8 간호사 / m9 군의관 / m10 공보의 
                         //m11 연구원 / m 12 학생 / m13 전시(부스) / m14 기타

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
// 의료!!
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t0_d1_pre_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_pre_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_on_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_on_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_pre_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_pre_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_on_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_on_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t0_d1_pre_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_pre_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_on_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_on_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_pre_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_pre_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_on_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_on_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t0_d1_pre_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_pre_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_on_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_on_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_pre_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_pre_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_on_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_on_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t0_d1_pre_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_pre_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_on_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_on_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_pre_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_pre_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_on_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_on_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t0_d1_pre_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_pre_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_on_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t0_d1_on_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t0_d1_pre_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_pre_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_on_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t0_d1_on_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

            
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t0_d1_pre_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_pre_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_on_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t0_d1_on_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t0_d1_pre_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_pre_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_on_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t0_d1_on_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                            
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t0_d1_pre_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_pre_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_on_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t0_d1_on_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t0_d1_pre_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_pre_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_on_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t0_d1_on_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                                            
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t0_d1_pre_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_pre_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_on_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t0_d1_on_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                                                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t0_d1_pre_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_pre_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_on_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t0_d1_on_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t0_d1_pre_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_pre_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_on_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d1_on_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_pre_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_pre_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_on_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t0_d2_on_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t0_d1_pre_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_pre_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_on_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t0_d1_on_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t0_d1_pre_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_pre_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d1_on_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t0_d1_on_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_pre_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t0_d2_on_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
// 합계
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function sum_participants_t0_d1_pre_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t0_d1_pre_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t0_d1_on_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }
    
    public function sum_participants_t0_d1_on_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t0_d2_pre_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0 AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t0_d2_pre_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0 AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }
    
    public function sum_participants_t0_d2_on_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }
            
    public function sum_participants_t0_d2_on_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 영양!!
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m0()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_pre_ac_m0()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '교수'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_on_ap_m0()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_on_ac_m0()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '교수'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_pre_ap_m0()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_pre_ac_m0()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '교수'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_on_ap_m0()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_on_ac_m0()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '교수'
");
$result = $query->result_array();
return count($result); 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m1()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_pre_ac_m1()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '개원의'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_on_ap_m1()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_on_ac_m1()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '개원의'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_pre_ap_m1()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_pre_ac_m1()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '개원의'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_on_ap_m1()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_on_ac_m1()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '개원의'
");
$result = $query->result_array();
return count($result); 
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m2()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_pre_ac_m2()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_on_ap_m2()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_on_ac_m2()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_pre_ap_m2()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_pre_ac_m2()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_on_ap_m2()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_on_ac_m2()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m3()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_pre_ac_m3()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전임의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_on_ap_m3()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_on_ac_m3()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전임의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_pre_ap_m3()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_pre_ac_m3()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전임의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_on_ap_m3()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_on_ac_m3()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전임의'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m4()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_pre_ac_m4()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '수련의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ap_m4()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ac_m4()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '수련의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ap_m4()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ac_m4()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '수련의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ap_m4()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ac_m4()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '수련의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m5()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_pre_ac_m5()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전공의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ap_m5()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ac_m5()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전공의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ap_m5()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ac_m5()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전공의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ap_m5()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ac_m5()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전공의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

        
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m6()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_pre_ac_m6()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '영양사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ap_m6()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ac_m6()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '영양사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ap_m6()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ac_m6()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '영양사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ap_m6()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ac_m6()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '영양사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

                
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m7()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_pre_ac_m7()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '운동사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ap_m7()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ac_m7()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '운동사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ap_m7()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ac_m7()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '운동사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ap_m7()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ac_m7()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '운동사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

                        
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m8()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_pre_ac_m8()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '간호사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ap_m8()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ac_m8()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '간호사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ap_m8()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ac_m8()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '간호사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ap_m8()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ac_m8()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '간호사'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

                                
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m9()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_pre_ac_m9()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '군의관'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ap_m9()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ac_m9()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '군의관'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ap_m9()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ac_m9()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '군의관'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ap_m9()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ac_m9()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '군의관'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

                                        
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m10()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_pre_ac_m10()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '공보의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ap_m10()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ac_m10()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '공보의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ap_m10()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ac_m10()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '공보의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ap_m10()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ac_m10()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '공보의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

                                                
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m11()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_pre_ac_m11()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '연구원'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ap_m11()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ac_m11()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '의료' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '연구원'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ap_m11()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ac_m11()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '연구원'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ap_m11()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ac_m11()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '연구원'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m12()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_pre_ac_m12()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '학생'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_on_ap_m12()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d1_on_ac_m12()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '학생'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_pre_ap_m12()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_pre_ac_m12()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '학생'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_on_ap_m12()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

public function get_participants_t1_d2_on_ac_m12()
{
$query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '학생'
    ORDER BY a.id ASC
");
$result = $query->result_array();
return count($result); 
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m13()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_pre_ac_m13()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ap_m13()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ac_m13()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ap_m13()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ac_m13()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ap_m13()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ac_m13()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t1_d1_pre_ap_m14()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_pre_ac_m14()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '기타'
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ap_m14()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d1_on_ac_m14()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '기타'
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ap_m14()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_pre_ac_m14()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '기타'
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ap_m14()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t1_d2_on_ac_m14()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '기타'
");
    $result = $query->result_array();
    return count($result); 
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
// 합계
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function sum_participants_t1_d1_pre_ap()
{
    $query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자'
    ");
$result = $query->result_array();
return count($result); 
}

public function sum_participants_t1_d1_pre_ac()
{
    $query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원'
    ");
$result = $query->result_array();
return count($result); 
}

public function sum_participants_t1_d1_on_ap()
{
    $query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '일반참석자'
    ");
$result = $query->result_array();
return count($result); 
}

public function sum_participants_t1_d1_on_ac()
{
    $query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '임원'
    ");
$result = $query->result_array();
return count($result); 
}

public function sum_participants_t1_d2_pre_ap()
{
    $query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0 AND a.attendance_type = '일반참석자'
    ");
$result = $query->result_array();
return count($result); 
}

public function sum_participants_t1_d2_pre_ac()
{
    $query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0 AND a.attendance_type = '임원'
    ");
$result = $query->result_array();
return count($result); 
}

public function sum_participants_t1_d2_on_ap()
{
    $query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '일반참석자'
    ");
$result = $query->result_array();
return count($result); 
}
        
public function sum_participants_t1_d2_on_ac()
{
    $query = $this->db->query("
    SELECT *
    FROM users a
    WHERE a.type1 = '영양' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '임원'
    ");
$result = $query->result_array();
return count($result); 
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
// 운동!!
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t2_d1_pre_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_pre_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_on_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_on_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_pre_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_pre_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_on_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_on_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t2_d1_pre_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_pre_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_on_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_on_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_pre_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_pre_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_on_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_on_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t2_d1_pre_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_pre_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_on_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_on_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_pre_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_pre_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_on_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_on_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t2_d1_pre_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_pre_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_on_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_on_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_pre_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_pre_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_on_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_on_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t2_d1_pre_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_pre_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_on_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t2_d1_on_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t2_d1_pre_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_pre_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_on_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t2_d1_on_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

            
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t2_d1_pre_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_pre_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_on_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t2_d1_on_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t2_d1_pre_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_pre_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_on_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t2_d1_on_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                            
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t2_d1_pre_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_pre_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_on_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t2_d1_on_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t2_d1_pre_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_pre_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_on_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t2_d1_on_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                                            
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t2_d1_pre_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_pre_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_on_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t2_d1_on_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                                                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t2_d1_pre_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_pre_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_on_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t2_d1_on_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t2_d1_pre_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_pre_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_on_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d1_on_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_pre_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_pre_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_on_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t2_d2_on_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t2_d1_pre_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_pre_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_on_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t2_d1_on_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t2_d1_pre_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_pre_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d1_on_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t2_d1_on_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_pre_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t2_d2_on_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
// 합계
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function sum_participants_t2_d1_pre_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t2_d1_pre_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t2_d1_on_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }
    
    public function sum_participants_t2_d1_on_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t2_d2_pre_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0 AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t2_d2_pre_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0 AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }
    
    public function sum_participants_t2_d2_on_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }
            
    public function sum_participants_t2_d2_on_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '운동' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
// 전시(부스)!!
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function get_participants_t3_d1_pre_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_pre_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_on_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_on_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_pre_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_pre_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_on_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_on_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t3_d1_pre_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_pre_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_on_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_on_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_pre_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_pre_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_on_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_on_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t3_d1_pre_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_pre_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_on_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_on_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_pre_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_pre_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_on_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_on_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t3_d1_pre_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_pre_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_on_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_on_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_pre_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_pre_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_on_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_on_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t3_d1_pre_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_pre_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_on_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t3_d1_on_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t3_d1_pre_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_pre_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_on_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t3_d1_on_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

            
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t3_d1_pre_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_pre_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_on_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t3_d1_on_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t3_d1_pre_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_pre_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_on_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t3_d1_on_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                            
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t3_d1_pre_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_pre_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_on_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t3_d1_on_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t3_d1_pre_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_pre_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_on_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t3_d1_on_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                                            
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t3_d1_pre_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_pre_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_on_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t3_d1_on_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                                                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t3_d1_pre_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_pre_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_on_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t3_d1_on_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t3_d1_pre_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_pre_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_on_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d1_on_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_pre_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_pre_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_on_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t3_d2_on_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t3_d1_pre_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_pre_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_on_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t3_d1_on_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t3_d1_pre_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_pre_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d1_on_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t3_d1_on_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_pre_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t3_d2_on_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
// 합계
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function sum_participants_t3_d1_pre_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t3_d1_pre_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t3_d1_on_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }
    
    public function sum_participants_t3_d1_on_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t3_d2_pre_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0 AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t3_d2_pre_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0 AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }
    
    public function sum_participants_t3_d2_on_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }
            
    public function sum_participants_t3_d2_on_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '전시(부스)' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
// 기타!!
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t4_d1_pre_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_pre_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_on_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_on_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_pre_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_pre_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_on_ap_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_on_ac_m0()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '교수'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t4_d1_pre_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_pre_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_on_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_on_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_pre_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_pre_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_on_ap_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_on_ac_m1()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '개원의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t4_d1_pre_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_pre_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_on_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_on_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_pre_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_pre_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_on_ap_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_on_ac_m2()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '봉직의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t4_d1_pre_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_pre_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_on_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_on_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_pre_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_pre_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_on_ap_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_on_ac_m3()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전임의'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t4_d1_pre_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_pre_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_on_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t4_d1_on_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ap_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ac_m4()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '수련의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t4_d1_pre_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_pre_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_on_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t4_d1_on_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ap_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ac_m5()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전공의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

            
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t4_d1_pre_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_pre_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_on_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t4_d1_on_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ap_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ac_m6()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '영양사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t4_d1_pre_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_pre_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_on_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t4_d1_on_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ap_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ac_m7()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '운동사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                            
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t4_d1_pre_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_pre_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_on_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t4_d1_on_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ap_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ac_m8()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '간호사'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t4_d1_pre_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_pre_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_on_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t4_d1_on_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ap_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ac_m9()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '군의관'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                                            
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t4_d1_pre_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_pre_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_on_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t4_d1_on_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ap_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ac_m10()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '공보의'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

                                                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t4_d1_pre_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_pre_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_on_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t4_d1_on_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ap_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ac_m11()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '연구원'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function get_participants_t4_d1_pre_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_pre_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_on_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d1_on_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_pre_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_pre_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_on_ap_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

public function get_participants_t4_d2_on_ac_m12()
{
    $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '학생'
        ORDER BY a.id ASC
");
    $result = $query->result_array();
    return count($result); 
}

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t4_d1_pre_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_pre_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_on_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t4_d1_on_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ap_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ac_m13()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '전시(부스)'
            ORDER BY a.id ASC
    ");
        $result = $query->result_array();
        return count($result); 
    }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function get_participants_t4_d1_pre_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_pre_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d1_on_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }
    
    public function get_participants_t4_d1_on_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_pre_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ap_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '일반참석자' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }

    public function get_participants_t4_d2_on_ac_m14()
    {
        $query = $this->db->query("
            SELECT *
            FROM users a
            WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1  AND a.attendance_type = '임원' AND a.member_type = '기타'
    ");
        $result = $query->result_array();
        return count($result); 
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
// 합계
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function sum_participants_t4_d1_pre_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t4_d1_pre_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 0  AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t4_d1_on_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }
    
    public function sum_participants_t4_d1_on_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_1 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t4_d2_pre_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0 AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }

    public function sum_participants_t4_d2_pre_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 0 AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }
    
    public function sum_participants_t4_d2_on_ap()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '일반참석자'
        ");
    $result = $query->result_array();
    return count($result); 
    }
            
    public function sum_participants_t4_d2_on_ac()
    {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.type1 = '기타' AND a.qr_chk_day_2 = 'Y' AND a.onsite_reg = 1 AND a.attendance_type = '임원'
        ");
    $result = $query->result_array();
    return count($result); 
    }



 ///////////////////////////////////////////////////////////////////////////////////////////////////////////
 // 좌장, 연자, 패널 !!
 // acp,  acs,  acpn
 ///////////////////////////////////////////////////////////////////////////////////////////////////////////

 public function get_participants_d1_acp()
 {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '좌장'
        ");
    $result = $query->result_array();
    return count($result); 
 }

 public function get_participants_d1_asc()
 {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '연자'
        ");
    $result = $query->result_array();
    return count($result); 
 }

 public function get_participants_d1_acpn()
 {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_1 = 'Y' AND a.attendance_type = '패널'
        ");
    $result = $query->result_array();
    return count($result); 
 }

 public function get_participants_d2_acp()
 {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '좌장'
        ");
    $result = $query->result_array();
    return count($result); 
 }

 public function get_participants_d2_asc()
 {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '연자'
        ");
    $result = $query->result_array();
    return count($result); 
 }

 public function get_participants_d2_acpn()
 {
        $query = $this->db->query("
        SELECT *
        FROM users a
        WHERE a.qr_chk_day_2 = 'Y' AND a.attendance_type = '패널'
        ");
    $result = $query->result_array();
    return count($result); 
 }


 ///////////////////////////////////////////////////////////////////////////////////////////////////////////
 // day별 합계!!
 ///////////////////////////////////////////////////////////////////////////////////////////////////////////

 public function sum_participants_d1()
 {
        $query = $this->db->query("
        SELECT *
            FROM users a
            WHERE a.qr_chk_day_1 = 'Y' 
            AND (a.attendance_type = '일반참석자' OR a.attendance_type = '임원');
        ");
    $result = $query->result_array();
    return count($result); 
 }

 public function sum_participants_d2()
 {
        $query = $this->db->query("
        SELECT *
            FROM users a
            WHERE a.qr_chk_day_2 = 'Y' 
            AND (a.attendance_type = '일반참석자' OR a.attendance_type = '임원');
        ");
    $result = $query->result_array();
    return count($result); 
 }


}

?>
