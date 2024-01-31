<script src="https://cdn.tailwindcss.com"></script>
<style>
    th,
    td {
        text-align: center !important;
        border: 2px solid rgb(163 163 163);
        font-weight: 600;
        font-size: 1.5rem;
        line-height: 2rem;
    }

    tr {
        height: 3.7rem;
        border: 2px solid rgb(163 163 163);
        font-weight: 600;
        font-size: 1.5rem;
        line-height: 2rem;
    }
 .total_table {
    width: 240px;
}

.tableWrap{
    width: 80%;
    height: 800px;
    overflow: auto;
}

.tableWrap table{
    width: 80%;
    border: 0px;
    border-collapse: collapse;
    margin : 0 auto;
}

.tableWrap table thead {
    position: sticky;
    top: 0px;
    z-index: 1; 
} 

</style>
<div class="text-center flex flex-col items-center justify-center">
    <h1 class="text-6xl font-semibold text-orange-600 my-10">제59차 대한비만학회 춘계학술대회</h1>
    <!-- <h6 class="text-3xl font-semibold mb-20 ">현장 참석자 데이터</h6> -->
    <!-- <h6 class="text-3xl font-semibold mb-20 ">• 등록자 : 총 <?php echo count($users); ?>명</h6> -->
    <h6 class="text-3xl font-semibold mb-20 ">• 현장 출결등록자(중복 제외) : 총 <?php echo count($item); ?>명</h6>
    <?php
    //print_r($users);
    //print_r(count($item));

    //echo $user_t0_d1_pre_ap_m0;

    //type1 => t -> t0 의료 / t1 영양 / t2 운동 / t3 기타
    //qr_chk_day_1, 2 => d -> d1 day1 / d2 day2
    //onsite_reg => pre 사전등록 0 / on 현장등록 1
    //attendance_type => a -> ap 일반참석자 / ac 임원
    //member_type => m -> m0 교수 / m1 개원의 / m2 봉직의 / m3 전임의 / m4 수련의 / m5 전공의 
                         //m6 영양사 / m7 운동사 / m8 간호사 / m9 군의관 / m10 공보의 
                         //m11 연구원 / m 12 학생 / m13 전시(부스) / m14 기타


?>
    <table>
        <tr>
            <th class="total_table bg-slate-300" rowspan=2>총합</th>
            <th rowspan=2 class="total_table bg-slate-300 total count_1"><?php echo $sum_d1 + $sum_d2; ?></th>
            <td class="total_table bg-sky-200">3월 8일(금)</td>
            <td class="total_table bg-amber-200">3월 9일(토)</td>
        </tr>
        <tr>
            <td><?php echo $sum_d1; ?></td>
            <td><?php echo $sum_d2; ?></td>
        </tr>
    </table>

    <table class="mt-20">
        <tr>
           <th class="total_table bg-slate-300"></th>
           <th class="total_table bg-sky-200" colspan="3">3월 8일(금)</th>
           <th class="total_table bg-amber-200" colspan="3">3월 9일(토)</th>
        </tr>
        <tr>
            <th class="bg-slate-300"></th>
            <th class="bg-purple-200">좌장</th>
            <th class="bg-red-200">연자</th>
            <th class="bg-orange-200">패널</th>
            <th class="bg-purple-200">좌장</th>
            <th class="bg-red-200">연자</th>
            <th class="bg-orange-200">패널</th>
        </tr>
        <tr>
            <th class="bg-slate-300"></th>
            <th><?php echo $user_d1_acp; ?></th>
            <th><?php echo $user_d1_asc; ?></th>
            <th><?php echo $user_d1_acpn; ?></th>
            <th><?php echo $user_d2_acp; ?></th>
            <th><?php echo $user_d2_asc; ?></th>
            <th><?php echo $user_d2_acpn; ?></th>
        </tr>
        <tr>
            <th class="bg-slate-300">합</th>
            <td colspan="3" class="count_2"><?php echo $user_d1_acp + $user_d1_asc + $user_d1_acpn; ?></td>
            <td colspan="3" class="count_3"><?php echo $user_d2_acp + $user_d2_asc + $user_d2_acpn; ?></td>
        </tr>
        <tr>
            <th class="bg-slate-300">총합</th>
            <td colspan="6" class="count_4"><?php echo $user_d1_acp + $user_d1_asc + $user_d1_acpn + $user_d2_acp + $user_d2_asc + $user_d2_acpn; ?></td>
        </tr>
    </table>

<div class="tableWrap">
    <table class="w-9/12 text-2xl mb-20 mt-20">
        <thead>
            <tr>
                <th class="sticky_header bg-neutral-200" colspan="2"></th>
                <th class="sticky_header bg-indigo-950 text-white" colspan="4">3월 8일(금)</th>
                <th class="sticky_header bg-purple-950 text-white" colspan="4">3월 9일(토)</th>
            </tr>
            <tr>
                <th class="sticky_header bg-neutral-200" rowspan="3">구분</th>
                <th class="sticky_header bg-neutral-200" rowspan="3">세부구분</th>
                <th class="sticky_header bg-neutral-200" colspan="4">등록자 수(명)</th>
                <th class="sticky_header bg-neutral-200" colspan="4">등록자 수(명)</th>
            </tr>
            <tr >
                <th class="sticky_header bg-amber-500" colspan="2">사전등록</th>
                <th class="sticky_header bg-sky-500" colspan="2">현장등록</th>
                <th class="sticky_header bg-amber-500" colspan="2">사전등록</th>
                <th class="sticky_header bg-sky-500" colspan="2">현장등록</th>
            </tr>
            <tr>
                <th class="sticky_header bg-amber-200">일반참석자</th>
                <th class="sticky_header bg-green-200">임원</th>

                <th class="sticky_header bg-amber-200">일반참석자</th>
                <th class="sticky_header bg-green-200">임원</th>

                <th class="sticky_header bg-amber-200">일반참석자</th>
                <th class="sticky_header bg-green-200">임원</th>

                <th class="sticky_header bg-amber-200">일반참석자</th>
                <th class="sticky_header bg-green-200">임원</th>
            </tr>
        </thead>
        <tbody class="table_body">
<!------------------------ 의료 -------------------------->

            <tr>
                <th class="bg-blue-200"></th>
                <th class="bg-blue-200">의료 총합</th>

                <td class="bg-blue-200" class="sum_t0_d1_pre_ap"><?php echo $sum_t0_d1_pre_ap; ?></td>
                <td class="bg-blue-200" class="sum_t0_d1_pre_ac"><?php echo $sum_t0_d1_pre_ac; ?></td>

                <td class="bg-blue-200" class="sum_t0_d1_on_ap"><?php echo $sum_t0_d1_on_ap; ?></td>
                <td class="bg-blue-200" class="sum_t0_d1_on_ac"><?php echo $sum_t0_d1_on_ac; ?></td>

                <td class="bg-blue-200" class="sum_t0_d2_pre_ap"><?php echo $sum_t0_d2_pre_ap; ?></td>
                <td class="bg-blue-200" class="sum_t0_d2_pre_ac"><?php echo $sum_t0_d2_pre_ac; ?></td>

                <td class="bg-blue-200" class="sum_t0_d2_on_ap"><?php echo $sum_t0_d2_on_ap; ?></td>
                <td class="bg-blue-200" class="sum_t0_d2_on_ac"><?php echo $sum_t0_d2_on_ac; ?></td>

            </tr>
            <tr>
                <th class="bg-blue-200"></th>
                <th class="bg-blue-200">영양 총합</th>

                <td class="bg-blue-200" class="sum_t1_d1_pre_ap"><?php echo $sum_t1_d1_pre_ap; ?></td>
                <td class="bg-blue-200" class="sum_t1_d1_pre_ac"><?php echo $sum_t1_d1_pre_ac; ?></td>

                <td class="bg-blue-200" class="sum_t1_d1_on_ap"><?php echo $sum_t1_d1_on_ap; ?></td>
                <td class="bg-blue-200" class="sum_t1_d1_on_ac"><?php echo $sum_t1_d1_on_ac; ?></td>

                <td class="bg-blue-200" class="sum_t1_d2_pre_ap"><?php echo $sum_t1_d2_pre_ap; ?></td>
                <td class="bg-blue-200" class="sum_t1_d2_pre_ac"><?php echo $sum_t1_d2_pre_ac; ?></td>

                <td class="bg-blue-200" class="sum_t1_d2_on_ap"><?php echo $sum_t1_d2_on_ap; ?></td>
                <td class="bg-blue-200" class="sum_t1_d2_on_ac"><?php echo $sum_t1_d2_on_ac; ?></td>

            </tr>

            <tr>
            <th class="bg-blue-200"></th>
            <th class="bg-blue-200">운동 총합</th>

            <td class="bg-blue-200" class="sum_t2_d1_pre_ap"><?php echo $sum_t2_d1_pre_ap; ?></td>
            <td class="bg-blue-200" class="sum_t2_d1_pre_ac"><?php echo $sum_t2_d1_pre_ac; ?></td>

            <td class="bg-blue-200" class="sum_t2_d1_on_ap"><?php echo $sum_t2_d1_on_ap; ?></td>
            <td class="bg-blue-200" class="sum_t2_d1_on_ac"><?php echo $sum_t2_d1_on_ac; ?></td>

            <td class="bg-blue-200" class="sum_t2_d2_pre_ap"><?php echo $sum_t2_d2_pre_ap; ?></td>
            <td class="bg-blue-200" class="sum_t2_d2_pre_ac"><?php echo $sum_t2_d2_pre_ac; ?></td>

            <td class="bg-blue-200" class="sum_t2_d2_on_ap"><?php echo $sum_t2_d2_on_ap; ?></td>
            <td class="bg-blue-200" class="sum_t2_d2_on_ac"><?php echo $sum_t2_d2_on_ac; ?></td>
        </tr>
        <tr>
            <th class="bg-blue-200"></th>
            <th class="bg-blue-200">기타 총합</th>

            <td class="bg-blue-200" class="sum_t3_d1_pre_ap"><?php echo $sum_t3_d1_pre_ap; ?></td>
            <td class="bg-blue-200" class="sum_t3_d1_pre_ac"><?php echo $sum_t3_d1_pre_ac; ?></td>

            <td class="bg-blue-200" class="sum_t3_d1_on_ap"><?php echo $sum_t3_d1_on_ap; ?></td>
            <td class="bg-blue-200" class="sum_t3_d1_on_ac"><?php echo $sum_t3_d1_on_ac; ?></td>

            <td class="bg-blue-200" class="sum_t3_d2_pre_ap"><?php echo $sum_t3_d2_pre_ap; ?></td>
            <td class="bg-blue-200" class="sum_t3_d2_pre_ac"><?php echo $sum_t3_d2_pre_ac; ?></td>

            <td class="bg-blue-200" class="sum_t3_d2_on_ap"><?php echo $sum_t3_d2_on_ap; ?></td>
            <td class="bg-blue-200" class="sum_t3_d2_on_ac"><?php echo $sum_t3_d2_on_ac; ?></td>
        </tr>
            <tr>
                <th class="bg-neutral-200" rowspan="15">의료</th>
                <th>교수</th>
                <td><?php echo $user_t0_d1_pre_ap_m0; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m0; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m0; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m0; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m0; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m0; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m0; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m0; ?></td>
            </tr>
            <tr>
                <th>개원의</th>
                <td><?php echo $user_t0_d1_pre_ap_m1; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m1; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m1; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m1; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m1; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m1; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m1; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m1; ?></td>
            </tr>
            <tr>
                <th>봉직의</th>
                <td><?php echo $user_t0_d1_pre_ap_m2; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m2; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m2; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m2; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m2; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m2; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m2; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m2; ?></td>
            </tr>
            <tr>
                <th>전임의</th>
                <td><?php echo $user_t0_d1_pre_ap_m3; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m3; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m3; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m3; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m3; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m3; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m3; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m3; ?></td>
            </tr>
            <tr>
                <th>수련의</th>
                <td><?php echo $user_t0_d1_pre_ap_m4; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m4; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m4; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m4; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m4; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m4; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m4; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m4; ?></td>
            </tr>
            <tr>
                <th>전공의</th>
                <td><?php echo $user_t0_d1_pre_ap_m5; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m5; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m5; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m5; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m5; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m5; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m5; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m5; ?></td>
            </tr>
            <tr>
                <th>영양사</th>
                <td><?php echo $user_t0_d1_pre_ap_m6; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m6; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m6; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m6; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m6; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m6; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m6; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m6; ?></td>
            </tr>
            <tr>
                <th>운동사</th>
                <td><?php echo $user_t0_d1_pre_ap_m7; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m7; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m7; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m7; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m7; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m7; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m7; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m7; ?></td>
            </tr>
            <tr>
                <th>간호사</th>
                <td><?php echo $user_t0_d1_pre_ap_m8; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m8; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m8; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m8; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m8; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m8; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m8; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m8; ?></td>
            </tr>
            <tr>
                <th>군의관</th>
                <td><?php echo $user_t0_d1_pre_ap_m9; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m9; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m9; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m9; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m9; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m9; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m9; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m9; ?></td>
            </tr>
            <tr>
                <th>공보의</th>
                <td><?php echo $user_t0_d1_pre_ap_m10; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m10; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m10; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m10; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m10; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m10; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m10; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m10; ?></td>
            </tr>
            <tr>
                <th>연구원</th>
                <td><?php echo $user_t0_d1_pre_ap_m11; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m11; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m11; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m11; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m11; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m11; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m11; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m11; ?></td>
            </tr>
            <tr>
                <th>학생</th>
                <td><?php echo $user_t0_d1_pre_ap_m12; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m12; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m12; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m12; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m12; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m12; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m12; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m12; ?></td>
            </tr>
            <tr>
                <th>전시(부스)</th>
                <td><?php echo $user_t0_d1_pre_ap_m13; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m13; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m13; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m13; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m13; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m13; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m13; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m13; ?></td>
            </tr>
            <tr>
                <th>기타</th>
                <td><?php echo $user_t0_d1_pre_ap_m14; ?></td>
                <td><?php echo $user_t0_d1_pre_ac_m14; ?></td>

                <td><?php echo $user_t0_d1_on_ap_m14; ?></td>
                <td><?php echo $user_t0_d1_on_ac_m14; ?></td>

                <td><?php echo $user_t0_d2_pre_ap_m14; ?></td>
                <td><?php echo $user_t0_d2_pre_ac_m14; ?></td>

                <td><?php echo $user_t0_d2_on_ap_m14; ?></td>
                <td><?php echo $user_t0_d2_on_ac_m14; ?></td>
            </tr>
            <tr>
                <th class="bg-blue-200"></th>
                <th class="bg-blue-200">의료 총합</th>

                <td class="bg-blue-200" class="sum_t0_d1_pre_ap"><?php echo $sum_t0_d1_pre_ap; ?></td>
                <td class="bg-blue-200" class="sum_t0_d1_pre_ac"><?php echo $sum_t0_d1_pre_ac; ?></td>

                <td class="bg-blue-200" class="sum_t0_d1_on_ap"><?php echo $sum_t0_d1_on_ap; ?></td>
                <td class="bg-blue-200" class="sum_t0_d1_on_ac"><?php echo $sum_t0_d1_on_ac; ?></td>

                <td class="bg-blue-200" class="sum_t0_d2_pre_ap"><?php echo $sum_t0_d2_pre_ap; ?></td>
                <td class="bg-blue-200" class="sum_t0_d2_pre_ac"><?php echo $sum_t0_d2_pre_ac; ?></td>

                <td class="bg-blue-200" class="sum_t0_d2_on_ap"><?php echo $sum_t0_d2_on_ap; ?></td>
                <td class="bg-blue-200" class="sum_t0_d2_on_ac"><?php echo $sum_t0_d2_on_ac; ?></td>

            </tr>

<!------------------------ 영양 -------------------------->

            <tr>
                <th class="bg-neutral-200" rowspan="15">영양</th>
                <th>교수</th>
                <td><?php echo $user_t1_d1_pre_ap_m0; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m0; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m0; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m0; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m0; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m0; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m0; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m0; ?></td>
            </tr>
            <tr>
                <th>개원의</th>
                <td><?php echo $user_t1_d1_pre_ap_m1; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m1; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m1; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m1; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m1; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m1; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m1; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m1; ?></td>
            </tr>
            <tr>
                <th>봉직의</th>
                <td><?php echo $user_t1_d1_pre_ap_m2; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m2; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m2; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m2; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m2; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m2; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m2; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m2; ?></td>
            </tr>
            <tr>
                <th>전임의</th>
                <td><?php echo $user_t1_d1_pre_ap_m3; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m3; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m3; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m3; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m3; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m3; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m3; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m3; ?></td>
            </tr>
            <tr>
                <th>수련의</th>
                <td><?php echo $user_t1_d1_pre_ap_m4; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m4; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m4; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m4; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m4; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m4; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m4; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m4; ?></td>
            </tr>
            <tr>
                <th>전공의</th>
                <td><?php echo $user_t1_d1_pre_ap_m5; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m5; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m5; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m5; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m5; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m5; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m5; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m5; ?></td>
            </tr>
            <tr>
                <th>영양사</th>
                <td><?php echo $user_t1_d1_pre_ap_m6; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m6; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m6; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m6; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m6; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m6; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m6; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m6; ?></td>
            </tr>
            <tr>
                <th>운동사</th>
                <td><?php echo $user_t1_d1_pre_ap_m7; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m7; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m7; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m7; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m7; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m7; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m7; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m7; ?></td>
            </tr>
            <tr>
                <th>간호사</th>
                <td><?php echo $user_t1_d1_pre_ap_m8; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m8; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m8; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m8; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m8; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m8; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m8; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m8; ?></td>
            </tr>
            <tr>
                <th>군의관</th>
                <td><?php echo $user_t1_d1_pre_ap_m9; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m9; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m9; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m9; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m9; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m9; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m9; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m9; ?></td>
            </tr>
            <tr>
                <th>공보의</th>
                <td><?php echo $user_t1_d1_pre_ap_m10; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m10; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m10; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m10; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m10; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m10; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m10; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m10; ?></td>
            </tr>
            <tr>
                <th>연구원</th>
                <td><?php echo $user_t1_d1_pre_ap_m11; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m11; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m11; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m11; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m11; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m11; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m11; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m11; ?></td>
            </tr>
            <tr>
                <th>학생</th>
                <td><?php echo $user_t1_d1_pre_ap_m12; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m12; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m12; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m12; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m12; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m12; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m12; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m12; ?></td>
            </tr>
            <tr>
                <th>전시(부스)</th>
                <td><?php echo $user_t1_d1_pre_ap_m13; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m13; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m13; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m13; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m13; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m13; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m13; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m13; ?></td>
            </tr>
            <tr>
                <th>기타</th>
                <td><?php echo $user_t1_d1_pre_ap_m14; ?></td>
                <td><?php echo $user_t1_d1_pre_ac_m14; ?></td>

                <td><?php echo $user_t1_d1_on_ap_m14; ?></td>
                <td><?php echo $user_t1_d1_on_ac_m14; ?></td>

                <td><?php echo $user_t1_d2_pre_ap_m14; ?></td>
                <td><?php echo $user_t1_d2_pre_ac_m14; ?></td>

                <td><?php echo $user_t1_d2_on_ap_m14; ?></td>
                <td><?php echo $user_t1_d2_on_ac_m14; ?></td>
            </tr>
            <tr>
                <th class="bg-blue-200"></th>
                <th class="bg-blue-200">영양 총합</th>

                <td class="bg-blue-200" class="sum_t1_d1_pre_ap"><?php echo $sum_t1_d1_pre_ap; ?></td>
                <td class="bg-blue-200" class="sum_t1_d1_pre_ac"><?php echo $sum_t1_d1_pre_ac; ?></td>

                <td class="bg-blue-200" class="sum_t1_d1_on_ap"><?php echo $sum_t1_d1_on_ap; ?></td>
                <td class="bg-blue-200" class="sum_t1_d1_on_ac"><?php echo $sum_t1_d1_on_ac; ?></td>

                <td class="bg-blue-200" class="sum_t1_d2_pre_ap"><?php echo $sum_t1_d2_pre_ap; ?></td>
                <td class="bg-blue-200" class="sum_t1_d2_pre_ac"><?php echo $sum_t1_d2_pre_ac; ?></td>

                <td class="bg-blue-200" class="sum_t1_d2_on_ap"><?php echo $sum_t1_d2_on_ap; ?></td>
                <td class="bg-blue-200" class="sum_t1_d2_on_ac"><?php echo $sum_t1_d2_on_ac; ?></td>

            </tr>
            
<!------------------------ 운동 -------------------------->

        <tr>
            <th class="bg-neutral-200" rowspan="15">운동</th>
            <th>교수</th>
            <td><?php echo $user_t2_d1_pre_ap_m0; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m0; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m0; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m0; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m0; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m0; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m0; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m0; ?></td>
        </tr>
        <tr>
        <th>개원의</th>
            <td><?php echo $user_t2_d1_pre_ap_m1; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m1; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m1; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m1; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m1; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m1; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m1; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m1; ?></td>
        </tr>
        <tr>
            <th>봉직의</th>
            <td><?php echo $user_t2_d1_pre_ap_m2; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m2; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m2; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m2; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m2; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m2; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m2; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m2; ?></td>
        </tr>
        <tr>
        <th>전임의</th>
            <td><?php echo $user_t2_d1_pre_ap_m3; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m3; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m3; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m3; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m3; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m3; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m3; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m3; ?></td>
        </tr>
        <tr>
        <th>수련의</th>
            <td><?php echo $user_t2_d1_pre_ap_m4; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m4; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m4; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m4; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m4; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m4; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m4; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m4; ?></td>
        </tr>
        <tr>
        <th>전공의</th>
            <td><?php echo $user_t2_d1_pre_ap_m5; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m5; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m5; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m5; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m5; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m5; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m5; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m5; ?></td>
        </tr>
        <tr>
        <th>영양사</th>
            <td><?php echo $user_t2_d1_pre_ap_m6; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m6; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m6; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m6; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m6; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m6; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m6; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m6; ?></td>
        </tr>
        <tr>
        <th>운동사</th>
            <td><?php echo $user_t2_d1_pre_ap_m7; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m7; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m7; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m7; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m7; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m7; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m7; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m7; ?></td>
        </tr>
        <tr>
        <th>간호사</th>
            <td><?php echo $user_t2_d1_pre_ap_m8; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m8; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m8; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m8; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m8; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m8; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m8; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m8; ?></td>
        </tr>
        <tr>
        <th>군의관</th>
            <td><?php echo $user_t2_d1_pre_ap_m9; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m9; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m9; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m9; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m9; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m9; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m9; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m9; ?></td>
        </tr>
        <tr>
        <th>공보의</th>
            <td><?php echo $user_t2_d1_pre_ap_m10; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m10; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m10; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m10; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m10; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m10; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m10; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m10; ?></td>
        </tr>
        <tr>
            <th>연구원</th>
            <td><?php echo $user_t2_d1_pre_ap_m11; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m11; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m11; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m11; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m11; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m11; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m11; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m11; ?></td>
        </tr>
        <tr>
        <th>학생</th>
            <td><?php echo $user_t2_d1_pre_ap_m12; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m12; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m12; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m12; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m12; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m12; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m12; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m12; ?></td>
        </tr>
        <tr>
        <th>전시(부스)</th>
            <td><?php echo $user_t2_d1_pre_ap_m13; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m13; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m13; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m13; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m13; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m13; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m13; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m13; ?></td>
        </tr>
        <tr>
        <th>기타</th>
            <td><?php echo $user_t2_d1_pre_ap_m14; ?></td>
            <td><?php echo $user_t2_d1_pre_ac_m14; ?></td>

            <td><?php echo $user_t2_d1_on_ap_m14; ?></td>
            <td><?php echo $user_t2_d1_on_ac_m14; ?></td>

            <td><?php echo $user_t2_d2_pre_ap_m14; ?></td>
            <td><?php echo $user_t2_d2_pre_ac_m14; ?></td>

            <td><?php echo $user_t2_d2_on_ap_m14; ?></td>
            <td><?php echo $user_t2_d2_on_ac_m14; ?></td>
        </tr>
        <tr>
            <th class="bg-blue-200"></th>
            <th class="bg-blue-200">운동 총합</th>

            <td class="bg-blue-200" class="sum_t2_d1_pre_ap"><?php echo $sum_t2_d1_pre_ap; ?></td>
            <td class="bg-blue-200" class="sum_t2_d1_pre_ac"><?php echo $sum_t2_d1_pre_ac; ?></td>

            <td class="bg-blue-200" class="sum_t2_d1_on_ap"><?php echo $sum_t2_d1_on_ap; ?></td>
            <td class="bg-blue-200" class="sum_t2_d1_on_ac"><?php echo $sum_t2_d1_on_ac; ?></td>

            <td class="bg-blue-200" class="sum_t2_d2_pre_ap"><?php echo $sum_t2_d2_pre_ap; ?></td>
            <td class="bg-blue-200" class="sum_t2_d2_pre_ac"><?php echo $sum_t2_d2_pre_ac; ?></td>

            <td class="bg-blue-200" class="sum_t2_d2_on_ap"><?php echo $sum_t2_d2_on_ap; ?></td>
            <td class="bg-blue-200" class="sum_t2_d2_on_ac"><?php echo $sum_t2_d2_on_ac; ?></td>
        </tr>

<!------------------------ 기타 -------------------------->
        <tr>
            <th class="bg-neutral-200" rowspan="15">기타</th>
            <th>교수</th>
            <td><?php echo $user_t3_d1_pre_ap_m0; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m0; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m0; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m0; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m0; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m0; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m0; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m0; ?></td>
        </tr>
        <tr>
        <th>개원의</th>
            <td><?php echo $user_t3_d1_pre_ap_m1; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m1; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m1; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m1; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m1; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m1; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m1; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m1; ?></td>
        </tr>
        <tr>
            <th>봉직의</th>
            <td><?php echo $user_t3_d1_pre_ap_m2; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m2; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m2; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m2; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m2; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m2; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m2; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m2; ?></td>
        </tr>
        <tr>
            <th>전임의</th>
            <td><?php echo $user_t3_d1_pre_ap_m3; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m3; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m3; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m3; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m3; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m3; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m3; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m3; ?></td>
        </tr>
        <tr>
            <th>수련의</th>
            <td><?php echo $user_t3_d1_pre_ap_m4; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m4; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m4; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m4; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m4; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m4; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m4; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m4; ?></td>
        </tr>
        <tr>
            <th>전공의</th>
            <td><?php echo $user_t3_d1_pre_ap_m5; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m5; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m5; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m5; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m5; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m5; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m5; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m5; ?></td>
        </tr>
        <tr>
            <th>영양사</th>
            <td><?php echo $user_t3_d1_pre_ap_m6; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m6; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m6; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m6; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m6; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m6; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m6; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m6; ?></td>
        </tr>
        <tr>
            <th>운동사</th>
            <td><?php echo $user_t3_d1_pre_ap_m7; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m7; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m7; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m7; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m7; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m7; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m7; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m7; ?></td>
        </tr>
        <tr>
            <th>간호사</th>
            <td><?php echo $user_t3_d1_pre_ap_m8; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m8; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m8; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m8; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m8; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m8; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m8; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m8; ?></td>
        </tr>
        <tr>
            <th>군의관</th>
            <td><?php echo $user_t3_d1_pre_ap_m9; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m9; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m9; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m9; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m9; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m9; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m9; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m9; ?></td>
        </tr>
        <tr>
            <th>공보의</th>
            <td><?php echo $user_t3_d1_pre_ap_m10; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m10; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m10; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m10; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m10; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m10; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m10; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m10; ?></td>
        </tr>
        <tr>
            <th>연구원</th>
            <td><?php echo $user_t3_d1_pre_ap_m11; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m11; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m11; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m11; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m11; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m11; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m11; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m11; ?></td>
        </tr>
        <tr>
            <th>학생</th>
            <td><?php echo $user_t3_d1_pre_ap_m12; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m12; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m12; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m12; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m12; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m12; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m12; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m12; ?></td>
        </tr>
        <tr>
            <th>전시(부스)</th>
            <td><?php echo $user_t3_d1_pre_ap_m13; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m13; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m13; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m13; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m13; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m13; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m13; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m13; ?></td>
        </tr>
        <tr>
            <th>기타</th>
            <td><?php echo $user_t3_d1_pre_ap_m14; ?></td>
            <td><?php echo $user_t3_d1_pre_ac_m14; ?></td>

            <td><?php echo $user_t3_d1_on_ap_m14; ?></td>
            <td><?php echo $user_t3_d1_on_ac_m14; ?></td>

            <td><?php echo $user_t3_d2_pre_ap_m14; ?></td>
            <td><?php echo $user_t3_d2_pre_ac_m14; ?></td>

            <td><?php echo $user_t3_d2_on_ap_m14; ?></td>
            <td><?php echo $user_t3_d2_on_ac_m14; ?></td>
        </tr>
        <tr>
            <th class="bg-blue-200"></th>
            <th class="bg-blue-200">기타 총합</th>

            <td class="bg-blue-200" class="sum_t3_d1_pre_ap"><?php echo $sum_t3_d1_pre_ap; ?></td>
            <td class="bg-blue-200" class="sum_t3_d1_pre_ac"><?php echo $sum_t3_d1_pre_ac; ?></td>

            <td class="bg-blue-200" class="sum_t3_d1_on_ap"><?php echo $sum_t3_d1_on_ap; ?></td>
            <td class="bg-blue-200" class="sum_t3_d1_on_ac"><?php echo $sum_t3_d1_on_ac; ?></td>

            <td class="bg-blue-200" class="sum_t3_d2_pre_ap"><?php echo $sum_t3_d2_pre_ap; ?></td>
            <td class="bg-blue-200" class="sum_t3_d2_pre_ac"><?php echo $sum_t3_d2_pre_ac; ?></td>

            <td class="bg-blue-200" class="sum_t3_d2_on_ap"><?php echo $sum_t3_d2_on_ap; ?></td>
            <td class="bg-blue-200" class="sum_t3_d2_on_ac"><?php echo $sum_t3_d2_on_ac; ?></td>
        </tr>

<!------------------------ total -------------------------->

            <tr>
                <th class="bg-neutral-200" colspan="2">합계</th>
                <td class="bg-neutral-200" class="sum_1"><?php echo $sum_t0_d1_pre_ap + $sum_t1_d1_pre_ap + $sum_t2_d1_pre_ap + $sum_t3_d1_pre_ap; ?></td>
                <td class="bg-neutral-200" class="sum_2"><?php echo $sum_t0_d1_pre_ac + $sum_t1_d1_pre_ac + $sum_t2_d1_pre_ac + $sum_t3_d1_pre_ac; ?></td>

                <td class="bg-neutral-200" class="sum_3"><?php echo $sum_t0_d1_on_ap + $sum_t1_d1_on_ap + $sum_t2_d1_on_ap + $sum_t3_d1_on_ap; ?></td>
                <td class="bg-neutral-200" class="sum_4"><?php echo $sum_t0_d1_on_ac + $sum_t1_d1_on_ac + $sum_t2_d1_on_ac + $sum_t3_d1_on_ac; ?></td>

                <td class="bg-neutral-200" class="sum_5"><?php echo $sum_t0_d2_pre_ap + $sum_t1_d2_pre_ap + $sum_t2_d2_pre_ap + $sum_t3_d2_pre_ap; ?></td>
                <td class="bg-neutral-200" class="sum_6"><?php echo $sum_t0_d2_pre_ac + $sum_t1_d2_pre_ac + $sum_t2_d2_pre_ac + $sum_t3_d2_pre_ac; ?></td>

                <td class="bg-neutral-200" class="sum_7"><?php echo $sum_t0_d2_on_ap + $sum_t1_d2_on_ap + $sum_t2_d2_on_ap + $sum_t3_d2_on_ap; ?></td>
                <td class="bg-neutral-200" class="sum_8"><?php echo $sum_t0_d2_on_ac + $sum_t1_d2_on_ac + $sum_t2_d2_on_ac + $sum_t3_d2_on_ac; ?></td>
            </tr>
            <tr>
                <th class="bg-yellow-400" colspan="2">Total</th>
                <td class="bg-yellow-400" colspan="4" class="count_5"></td>
                <td class="bg-yellow-400" colspan="4" class="count_6"></td>
            </tr>
        </tbody>
    </table>
    </div>
</div>
</div>
<!-- /page content -->

</div>
<!-- /page container -->

<script>
    const count_5 = document.querySelector(".count_5");
    const count_6 = document.querySelector(".count_6");

    const sum_1 = document.querySelector(".sum_1");
    const sum_2 = document.querySelector(".sum_2");
    const sum_3 = document.querySelector(".sum_3");
    const sum_4 = document.querySelector(".sum_4");

    const sum_5 = document.querySelector(".sum_5");
    const sum_6 = document.querySelector(".sum_6");
    const sum_7 = document.querySelector(".sum_7");
    const sum_8 = document.querySelector(".sum_8");

    function getSum(){
        console.log("hi")
        count_5.innerText = sum_1.innerText * 1 + sum_2.innerText * 1 + sum_3.innerText * 1 + sum_4.innerText * 1;
        count_6.innerText = sum_5.innerText * 1 + sum_6.innerText * 1 + sum_7.innerText * 1 + sum_8.innerText * 1;
    }

    // let timeout = setTimeout(()=>{
    //     getSum();
    // }, 10000)
        
    // window.addEventListener('beforeunload', function () {
    //     clearTimeout(timeout)
    // });
    
</script>