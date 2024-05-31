<script src="https://cdn.tailwindcss.com"></script>
<style>
    th,
    td {
        text-align: center !important;
        border: 1px solid rgb(163 163 163);
        font-weight: 600;
        font-size: 1.5rem;
        line-height: 2rem;
        padding: 4px 8px;
    }

    tr {
        /* height: 3.7rem; */
        border: 1px solid rgb(163 163 163);
        font-weight: 600;
        font-size: 1.5rem;
        line-height: 2rem;
    }
 
    th{
        background-color: #DDD;
    }

</style>
<div class="text-center flex flex-col items-center justify-center">
    <h1 class="text-6xl font-semibold text-orange-600 my-10">대한내분비학회 제22회 분과정문의 연수강좌</h1>
    <h6 class="text-3xl font-semibold mb-20 ">현장 참석자 데이터</h6>
    <h6 class="text-3xl font-semibold mb-20 ">• 등록자 : 총 <?php echo count($users); ?>명</h6>
    <h6 class="text-3xl font-semibold mb-20 ">• 현장 출결인원(중복 제외) : 총 <?php echo count($item); ?>명</h6>
    <h6 class="text-3xl font-semibold mb-20 ">• 결제대기 인원 : 총 <?php echo count($no_deposit); ?>명</h6>
    <h6 class="text-3xl font-semibold mb-20 ">• 현장등록 인원 : 총 <?php echo count($onsite); ?>명</h6>
    <?php
        
    //qr_chk_day_1, 2 => d -> d1 day1 / d2 day2
    //attendance_type => a -> ap 일반참석자 / ac 임원 / ach 좌장 / as 연자 / apn 패널 / aj 심사자 / ao 외부초청
    //member_type => m -> m0 교수 / m1 개원의 / m2 봉직의 / m3 전임의 / m4 수련의 / m5 전공의 
                         //m6 영양사 / m7 운동사 / m8 간호사 / m9 군의관 / m10 공보의 
                         //m11 연구원 / m 12 학생 / m13 전시(부스) / m14 기타
    ?>

    <!-- <table class="w-2/4">
    <colgroup>
            <col width="20%">
            <col>
        </colgroup>
        <tr>
            <th></th>
            <th>03.08.</th>
            <th>03.09.</th>
        </tr>
        <tr>
            <th>현장 출결 인원<br>*중복인원 포함</th>
            <td class="add_day_1"><?php echo $add_d1_ap + $add_d1_ac + $add_d1_ach + $add_d1_as + $add_d1_apn + $add_d1_aj + $add_d1_ao;?></td>
            <td class="add_day_2"><?php echo $add_d2_ap + $add_d2_ac + $add_d2_ach + $add_d2_as + $add_d2_apn + $add_d2_aj + $add_d2_ao;?></td>
        </tr>
        <tr>
            <th>Total</th>
            <td class="sum" colspan="2"></td>
        </tr>
    </table> -->
    <div class="w-full flex justify-center mt-20 mb-52 gap-x-10">
        <div style="width:40%;">
            <table class="w-full">
                <colgroup>
                    <col width="13%">
                    <col>
                </colgroup>
                <tr>
                    <th class="text-3xl font-semibold" colspan="9">3월 8일</th>
                </tr>
                <tr>
                    <th>구분</th>
                    <th>일반참석자</th>
                    <th>임원</th>
                    <th>기자</th>
                    <th>좌장</th>
                    <th>연자</th>
                    <th>패널</th>
                    <th>심사자</th>
                    <th>외부초청</th>
                </tr>
                <tr>
                    <th>교수</th>
                    <td><?php echo $d1_ap_m0 == 0 ? "-" : $d1_ap_m0; ?></td>
                    <td><?php echo $d1_ac_m0 == 0 ? "-" : $d1_ac_m0; ?></td>
                    <td rowspan ="14">-</td>
                    <td rowspan="17"><?php echo $d1_ach == 0 ? "-" : $d1_ach; ?></td>
                    <td rowspan="17"><?php echo $d1_as == 0 ? "-" : $d1_as; ?></td>
                    <td rowspan="17"><?php echo $d1_apn == 0 ? "-" : $d1_apn; ?></td>
                    <td rowspan="17"><?php echo $d1_aj == 0 ? "-" : $d1_aj; ?></td>
                    <td rowspan="17"><?php echo $d1_ao == 0 ? "-" : $d1_ao; ?></td>
                </tr>
                <tr>
                    <th>개원의</th>
                    <td><?php echo $d1_ap_m1 == 0 ? "-" : $d1_ap_m1; ?></td>
                    <td><?php echo $d1_ac_m1 == 0 ? "-" : $d1_ac_m1; ?></td>
                </tr>
                <tr>
                    <th>봉직의</th>
                    <td><?php echo $d1_ap_m2 == 0 ? "-" : $d1_ap_m2; ?></td>
                    <td><?php echo $d1_ac_m2 == 0 ? "-" : $d1_ac_m2; ?></td>
                </tr>
                <tr>
                    <th>전임의</th>
                    <td><?php echo $d1_ap_m3 == 0 ? "-" : $d1_ap_m3; ?></td>
                    <td><?php echo $d1_ac_m3 == 0 ? "-" : $d1_ac_m3; ?></td>
                </tr>
                <tr>
                    <th>수련의</th>
                    <td><?php echo $d1_ap_m4 == 0 ? "-" : $d1_ap_m4; ?></td>
                    <td><?php echo $d1_ac_m4 == 0 ? "-" : $d1_ac_m4; ?></td>
                </tr>
                <tr>
                    <th>전공의</th>
                    <td><?php echo $d1_ap_m5 == 0 ? "-" : $d1_ap_m5; ?></td>
                    <td><?php echo $d1_ac_m5 == 0 ? "-" : $d1_ac_m5; ?></td>
                </tr>
                <tr>
                    <th>영양사</th>
                    <td><?php echo $d1_ap_m6 == 0 ? "-" : $d1_ap_m6; ?></td>
                    <td><?php echo $d1_ac_m6 == 0 ? "-" : $d1_ac_m6; ?></td>
                </tr>
                <tr>
                    <th>운동사</th>
                    <td><?php echo $d1_ap_m7 == 0 ? "-" : $d1_ap_m7; ?></td>
                    <td><?php echo $d1_ac_m7 == 0 ? "-" : $d1_ac_m7; ?></td>
                </tr>
                <tr>
                    <th>간호사</th>
                    <td><?php echo $d1_ap_m8 == 0 ? "-" : $d1_ap_m8; ?></td>
                    <td><?php echo $d1_ac_m8 == 0 ? "-" : $d1_ac_m8; ?></td>
                </tr>
                <tr>
                    <th>군의관</th>
                    <td><?php echo $d1_ap_m9 == 0 ? "-" : $d1_ap_m9; ?></td>
                    <td><?php echo $d1_ac_m9 == 0 ? "-" : $d1_ac_m9; ?></td>
                </tr>
                <tr>
                    <th>공보의</th>
                    <td><?php echo $d1_ap_m10 == 0 ? "-" : $d1_ap_m10; ?></td>
                    <td><?php echo $d1_ac_m10 == 0 ? "-" : $d1_ac_m10; ?></td>
                </tr>
                <tr>
                    <th>연구원</th>
                    <td><?php echo $d1_ap_m11 == 0 ? "-" : $d1_ap_m11; ?></td>
                    <td><?php echo $d1_ac_m11 == 0 ? "-" : $d1_ac_m11; ?></td>
                </tr>
                <tr>
                    <th>학생</th>
                    <td><?php echo $d1_ap_m12 == 0 ? "-" : $d1_ap_m12; ?></td>
                    <td><?php echo $d1_ac_m12 == 0 ? "-" : $d1_ac_m12; ?></td>
                </tr>
                <tr>
                    <th>전시(부스)<br/><span class="text-xs">*고객사 무료등록</span></th>
                    <td><?php echo $d1_ap_m13 == 0 ? "-" : $d1_ap_m13; ?></td>
                    <td><?php echo $d1_ac_m13 == 0 ? "-" : $d1_ac_m13; ?></td>
                </tr>
                <tr>
                    <th>기자</th>
                    <td colspan="2">-</td>
                    <td><?php echo $d1_ar == 0 ? "-" : $d1_ar; ?></td>
                </tr>
                <tr>
                    <th>기타<br/><span class="text-xs">(결제한 제약사<br>+ 기타(약사) 등)</span></th>
                    <td><?php echo $d1_ap_m14 == 0 ? "-" : $d1_ap_m14; ?></td>
                    <td><?php echo $d1_ac_m14 == 0 ? "-" : $d1_ac_m14; ?></td>
                    <td>-</td>
                </tr>
                <tr>
                    <th>현장등록</th>
                    <td><?php echo $d1_ap_on == 0 ? "-" : $d1_ap_on; ?></td>
                    <td><?php echo $d1_ac_on == 0 ? "-" : $d1_ac_on; ?></td>
                    <td><?php echo $d1_ar_on == 0 ? "-" : $d1_ar_on; ?></td>
                </tr>
                <tr>
                    <th>소계 (명)</th>
                    <td><?php echo $add_d1_ap == 0 ? "-" : $add_d1_ap; ?></td>
                    <td><?php echo $add_d1_ac == 0 ? "-" : $add_d1_ac; ?></td>
                    <td><?php echo $add_d1_ar == 0 ? "-" : $add_d1_ar; ?></td>
                    <td><?php echo $add_d1_ach == 0 ? "-" : $add_d1_ach; ?></td>
                    <td><?php echo $add_d1_as == 0 ? "-" : $add_d1_as; ?></td>
                    <td><?php echo $add_d1_apn == 0 ? "-" : $add_d1_apn; ?></td>
                    <td><?php echo $add_d1_aj == 0 ? "-" : $add_d1_aj; ?></td>
                    <td><?php echo $add_d1_ao == 0 ? "-" : $add_d1_ao; ?></td>
                </tr>
                <tr>
                    <th>합계 (명)</th>
                    <td colspan="8" class="add_1"><?php echo $add_d1_ap + $add_d1_ac + $add_d1_ar + $add_d1_ach + $add_d1_as + $add_d1_apn + $add_d1_aj + $add_d1_ao;?></td>
                </tr>
                <tr>
                    <th>정책<br>심포지엄<br>등록자</th>
                    <td colspan="8" class="add_2"><?php  echo $add_apo == 0 ? "-" : $add_apo; ?></td>
                </tr>
                <tr>
                    <th>TOTAL (명)<br><span class="text-xs">합계 + 정책 심포지엄</span></th>
                    <td colspan="8" class="sum"></td>
                </tr>
            </table>
        </div>

        <!-- =================================================================================== -->
        <div style="width:40%;">
            <table class="w-full">
                <colgroup>
                    <col width="13%">
                    <col>
                </colgroup>
                <tr>
                    <th class="text-3xl font-semibold" colspan="8">3월 9일</th>
                </tr>
                <tr>
                    <th>구분</th>
                    <th>일반참석자</th>
                    <th>임원</th>
                    <th>기자</th>
                    <th>좌장</th>
                    <th>연자</th>
                    <th>패널</th>
                    <th>심사자</th>
                </tr>
                <tr>
                    <th>교수</th>
                    <td><?php echo $d2_ap_m0 == 0 ? "-" : $d2_ap_m0; ?></td>
                    <td><?php echo $d2_ac_m0 == 0 ? "-" : $d2_ac_m0; ?></td>
                    <td rowspan ="14">-</td>
                    <td rowspan="17"><?php echo $d2_ach == 0 ? "-" : $d2_ach; ?></td>
                    <td rowspan="17"><?php echo $d2_as == 0 ? "-" : $d2_as; ?></td>
                    <td rowspan="17"><?php echo $d2_apn == 0 ? "-" : $d2_apn; ?></td>
                    <td rowspan="17"><?php echo $d2_aj == 0 ? "-" : $d2_aj; ?></td>
                </tr>
                <tr>
                    <th>개원의</th>
                    <td><?php echo $d2_ap_m1 == 0 ? "-" : $d2_ap_m1; ?></td>
                    <td><?php echo $d2_ac_m1 == 0 ? "-" : $d2_ac_m1; ?></td>
                </tr>
                <tr>
                    <th>봉직의</th>
                    <td><?php echo $d2_ap_m2 == 0 ? "-" : $d2_ap_m2; ?></td>
                    <td><?php echo $d2_ac_m2 == 0 ? "-" : $d2_ac_m2; ?></td>
                </tr>
                <tr>
                    <th>전임의</th>
                    <td><?php echo $d2_ap_m3 == 0 ? "-" : $d2_ap_m3; ?></td>
                    <td><?php echo $d2_ac_m3 == 0 ? "-" : $d2_ac_m3; ?></td>
                </tr>
                <tr>
                    <th>수련의</th>
                    <td><?php echo $d2_ap_m4 == 0 ? "-" : $d2_ap_m4; ?></td>
                    <td><?php echo $d2_ac_m4 == 0 ? "-" : $d2_ac_m4; ?></td>
                </tr>
                <tr>
                    <th>전공의</th>
                    <td><?php echo $d2_ap_m5 == 0 ? "-" : $d2_ap_m5; ?></td>
                    <td><?php echo $d2_ac_m5 == 0 ? "-" : $d2_ac_m5; ?></td>
                </tr>
                <tr>
                    <th>영양사</th>
                    <td><?php echo $d2_ap_m6 == 0 ? "-" : $d2_ap_m6; ?></td>
                    <td><?php echo $d2_ac_m6 == 0 ? "-" : $d2_ac_m6; ?></td>
                </tr>
                <tr>
                    <th>운동사</th>
                    <td><?php echo $d2_ap_m7 == 0 ? "-" : $d2_ap_m7; ?></td>
                    <td><?php echo $d2_ac_m7 == 0 ? "-" : $d2_ac_m7; ?></td>
                </tr>
                <tr>
                    <th>간호사</th>
                    <td><?php echo $d2_ap_m8 == 0 ? "-" : $d2_ap_m8; ?></td>
                    <td><?php echo $d2_ac_m8 == 0 ? "-" : $d2_ac_m8; ?></td>
                </tr>
                <tr>
                    <th>군의관</th>
                    <td><?php echo $d2_ap_m9 == 0 ? "-" : $d2_ap_m9; ?></td>
                    <td><?php echo $d2_ac_m9 == 0 ? "-" : $d2_ac_m9; ?></td>
                </tr>
                <tr>
                    <th>공보의</th>
                    <td><?php echo $d2_ap_m10 == 0 ? "-" : $d2_ap_m10; ?></td>
                    <td><?php echo $d2_ac_m10 == 0 ? "-" : $d2_ac_m10; ?></td>
                </tr>
                <tr>
                    <th>연구원</th>
                    <td><?php echo $d2_ap_m11 == 0 ? "-" : $d2_ap_m11; ?></td>
                    <td><?php echo $d2_ac_m11 == 0 ? "-" : $d2_ac_m11; ?></td>
                </tr>
                <tr>
                    <th>학생</th>
                    <td><?php echo $d2_ap_m12 == 0 ? "-" : $d2_ap_m12; ?></td>
                    <td><?php echo $d2_ac_m12 == 0 ? "-" : $d2_ac_m12; ?></td>
                </tr>
                <tr>
                    <th>전시(부스)<br/><span class="text-xs">*고객사 무료등록</span></th>
                    <td><?php echo $d2_ap_m13 == 0 ? "-" : $d2_ap_m13; ?></td>
                    <td><?php echo $d2_ac_m13 == 0 ? "-" : $d2_ac_m13; ?></td>
                </tr>
                <tr>
                    <th>기자</th>
                    <td colspan="2">-</td>
                    <td><?php echo $d2_ar == 0 ? "-" : $d2_ar; ?></td>
                </tr>
                <tr>
                    <th>기타<br/><span class="text-xs">(결제한 제약사<br>+ 기타(약사) 등)</span></th>
                    <td><?php echo $d2_ap_m14 == 0 ? "-" : $d2_ap_m14; ?></td>
                    <td><?php echo $d2_ac_m14 == 0 ? "-" : $d2_ac_m14; ?></td>
                    <td>-</td>
                </tr>
                <tr>
                    <th>현장등록</th>
                    <td><?php echo $d2_ap_on == 0 ? "-" : $d2_ap_on; ?></td>
                    <td><?php echo $d2_ac_on == 0 ? "-" : $d2_ac_on; ?></td>
                    <td><?php echo $d2_ar_on == 0 ? "-" : $d2_ar_on; ?></td>
                </tr>
                <tr>
                    <th>소계 (명)</th>
                    <td><?php echo $add_d2_ap == 0 ? "-" : $add_d2_ap; ?></td>
                    <td><?php echo $add_d2_ac == 0 ? "-" : $add_d2_ac; ?></td>
                    <td><?php echo $add_d2_ar == 0 ? "-" : $add_d2_ar; ?></td>
                    <td><?php echo $add_d2_ach == 0 ? "-" : $add_d2_ach; ?></td>
                    <td><?php echo $add_d2_as == 0 ? "-" : $add_d2_as; ?></td>
                    <td><?php echo $add_d2_apn == 0 ? "-" : $add_d2_apn; ?></td>
                    <td><?php echo $add_d2_aj == 0 ? "-" : $add_d2_aj; ?></td>
                </tr>
                <tr>
                    <th>TOTAL (명)</th>
                    <td colspan="7"><?php echo $add_d2_ap + $add_d2_ac + $add_d2_ar + $add_d2_ach + $add_d2_as + $add_d2_apn + $add_d2_aj; ?></td>
                </tr>
            </table>
        </div>
    </div>
    </div>
</div>
</div>
<!-- /page content -->

</div>
<!-- /page container -->

<script>
    const sum1 = document.querySelector(".add_1");
    const sum2 = document.querySelector(".add_2");
    const total = document.querySelector(".sum");

    if(sum2.innerText !== "-" && sum1.innerText !== "-"){
        total.innerText = sum1.innerText * 1 + sum2.innerText * 1;
    }


</script>
