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
        height: 4.5rem;
        border: 2px solid rgb(163 163 163);
        font-weight: 600;
        font-size: 1.5rem;
        line-height: 2rem;
    }

th,
td {
    text-align: center !important;
    border: 2px solid rgb(163 163 163);
    font-weight: 600;
    font-size: 1.5rem;
    line-height: 2rem;
}

tr {
    height: 4.5rem;
    border: 2px solid rgb(163 163 163);
    font-weight: 600;
    font-size: 1.5rem;
    line-height: 2rem;
}

.total_table {
    width: 240px;
}

</style>
<div class="text-center flex flex-col items-center justify-center">
    <h1 class="text-6xl font-semibold text-orange-600 my-10">제59차 대한비만학회 춘계학술대회</h1>
    <h6 class="text-3xl font-semibold mb-20 ">현장 참석자 데이터</h6>
    <h6 class="text-3xl font-semibold mb-20 ">• 등록자 : 총 <?php echo count($users); ?>명</h6>
    <h6 class="text-3xl font-semibold mb-20 ">• 현장 출결등록자(중복 제외) : 총 <?php echo count($item); ?>명</h6>
    <?php
    //print_r($users);
    //print_r(count($item));

    //print_r(count($day_1_pre)); //17
    //print_r(count($day_2_pre)); //13
    //print_r(count($day_1_on)); //8
    //print_r(count($day_2_on)); //7

    $participants_1 = 0;
    $participants_on_1 = 0;
    $participants_2 = 0;
    $participants_on_2 = 0;

    $member_1 = 0;
    $member_on_1 = 0;
    $member_2 = 0;
    $member_on_2 = 0;

    $chairpersons_1 = 0;
    $chairpersons_on_1 = 0;
    $chairpersons_2 = 0;
    $chairpersons_on_2 = 0;
    
    $speaker_1 = 0;
    $speaker_on_1 = 0;
    $speaker_2 = 0;
    $speaker_on_2 = 0;

    $penel_1 = 0;
    $penel_on_1 = 0;
    $penel_2 = 0;
    $penel_on_2 = 0;
    
    $others_1 = 0;
    $others_on_1 = 0;
    $others_2 = 0;
    $others_on_2 = 0;

    // foreach($day_1 as $day1){

    //     if($day1['attendance_type'] == '일반참석자'){
    //         if($day1['onsite_reg'] == "0"){
    //             $participants_1 = $participants_1 + 1;
    //         }else if($day1['onsite_reg'] == "1"){
    //             $participants_on_1 = $participants_on_1 + 1;
    //         }
    //     }else if($day1['attendance_type'] == '임원'){
    //         if($day1['onsite_reg'] == "0"){
    //             $member_1 = $member_1 + 1;
    //         }else if($day1['onsite_reg'] == "1"){
    //             $member_on_1 = $member_on_1 + 1;
    //         }
    //     }else if($day1['attendance_type'] == '좌장'){
    //         if($day1['onsite_reg'] == "0"){
    //             $chairpersons_1 = $chairpersons_1 + 1;
    //         }else if($day1['onsite_reg'] == "1"){
    //             $chairpersons_on_1 = $chairpersons_on_1 + 1;
    //         }
    //     }else if($day1['attendance_type'] == '연자'){
    //         if($day1['onsite_reg'] == "0"){
    //             $speaker_1 = $speaker_1 + 1;
    //         }else if($day1['onsite_reg'] == "1"){
    //             $speaker_on_1 = $speaker_on_1 + 1;
    //         }
    //     }else if($day1['attendance_type'] == '패널'){
    //         if($day1['onsite_reg'] == "0"){
    //             $penel_1 = $penel_1 + 1;
    //         }else if($day1['onsite_reg'] == "1"){
    //             $penel_on_1 = $penel_on_1 + 1;
    //         }
    //     }else {
    //         if($day1['onsite_reg'] == "0"){
    //             $others_1 = $others_1 + 1;
    //         }else if($day1['onsite_reg'] == "1"){
    //             $others_on_1 = $others_on_1 + 1;
    //         }
    //     }
    // }

    // foreach($day_2 as $day2){

    //     if($day2['attendance_type'] == '일반참석자'){
    //         if($day2['onsite_reg'] == "0"){
    //             $participants_2 = $participants_2 + 1;
    //         }else if($day2['onsite_reg'] == "1"){
    //             $participants_on_2 = $participants_on_2 + 1;
    //         }
    //     }else if($day2['attendance_type'] == '임원'){
    //         if($day2['onsite_reg'] == "0"){
    //             $member_2 = $member_2 + 1;
    //         }else if($day2['onsite_reg'] == "1"){
    //             $member_on_2 = $member_on_2 + 1;
    //         }
    //     }else if($day2['attendance_type'] == '좌장'){
    //         if($day2['onsite_reg'] == "0"){
    //             $chairpersons_2 = $chairpersons_2 + 1;
    //         }else if($day2['onsite_reg'] == "1"){
    //             $chairpersons_on_2 = $chairpersons_on_2 + 1;
    //         }
    //     }else if($day2['attendance_type'] == '연자'){
    //         if($day2['onsite_reg'] == "0"){
    //             $speaker_2 = $speaker_2 + 1;
    //         }else if($day2['onsite_reg'] == "1"){
    //             $speaker_on_2 = $speaker_on_2 + 1;
    //         }
    //     }else if($day2['attendance_type'] == '패널'){
    //         if($day2['onsite_reg'] == "0"){
    //             $penel_2 = $penel_2 + 1;
    //         }else if($day2['onsite_reg'] == "1"){
    //             $penel_on_2 = $penel_on_2 + 1;
    //         }
    //     }else {
    //         if($day2['onsite_reg'] == "0"){
    //             $others_2 = $others_2 + 1;
    //         }else if($day2['onsite_reg'] == "1"){
    //             $others_on_2 = $others_on_2 + 1;
    //         }
    //     }
    // }
    // ?>

<table>
        <tr>
            <th class="total_table bg-slate-300" rowspan=2>총합</th>
            <th rowspan=2 class="total_table bg-slate-300 total"> 0 </th>
            <td class="total_table bg-sky-200">3월 8일(금)</td>
            <td class="total_table bg-amber-200">3월 9일(토)</td>
        </tr>
        <tr>
            <td class="count_9">0</td>
            <td class="count_10">0</td>
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
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
        </tr>
        <tr>
            <th class="bg-slate-300">합</th>
            <td colspan="3">0</td>
            <td colspan="3">0</td>
        </tr>
        <tr>
            <th class="bg-slate-300">총합</th>
            <td colspan="6">0</td>
        </tr>
    </table>


    <table class="w-9/12 text-2xl mb-20 mt-20">
        <thead>
            <tr class="bg-green-300 text-black">
                <th colspan="2"></th>
                <th colspan="4">3월 8일(금)</th>
                <th colspan="4">3월 9일(토)</th>
            </tr>
            <tr class="bg-green-300 text-black">
                <th rowspan="3">구분</th>
                <th rowspan="3">세부구분</th>
                <th colspan="4">등록자 수(명)</th>
                <th colspan="4">등록자 수(명)</th>
            </tr>
            <tr class="bg-green-300 text-black">
                <th colspan="2">사전등록</th>
                <th colspan="2">현장등록</th>
                <th colspan="2">사전등록</th>
                <th colspan="2">현장등록</th>
            </tr>
            <tr class="bg-green-300 text-black">
                <th>일반참석자</th>
                <th>임원</th>
                <!-- <th>좌장</th>
                <th>연자</th>
                <th>패널</th> -->

                <th>일반참석자</th>
                <th>임원</th>
                <!-- <th>좌장</th>
                <th>연자</th>
                <th>패널</th> -->

                <th>일반참석자</th>
                <th>임원</th>
                <!-- <th>좌장</th>
                <th>연자</th>
                <th>패널</th> -->

                <th>일반참석자</th>
                <th>임원</th>
                <!-- <th>좌장</th>
                <th>연자</th>
                <th>패널</th> -->
            </tr>
        </thead>
        <tbody class="table_body">
        <!-- <tr>
            <th class="bg-red-100" rowspan="6">사전등록</th>
            <th class="bg-red-100">좌장</th>
            <td><?php echo $chairpersons_1; ?></td>
            <td><?php echo $chairpersons_2; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">패널</th>
            <td><?php echo $penel_1; ?></td>
            <td><?php echo $penel_2; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">임원</th>
            <td><?php echo $member_1; ?></td>
            <td><?php echo $member_2; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">일반 참가자</th>
            <td><?php echo $participants_1; ?></td>
            <td><?php echo $participants_2; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">연자</th>
            <td><?php echo $speaker_1; ?></td>
            <td><?php echo $speaker_2; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">기타</th>
            <td><?php echo $others_1; ?></td>
            <td><?php echo $others_2; ?></td>
        </tr>
        <tr>
            <th class="bg-sky-200" rowspan="6">현장등록</th>
            <th class="bg-sky-200">좌장</th>
            <td><?php echo $chairpersons_on_1; ?></td>
            <td><?php echo $chairpersons_on_2; ?></td>
        </tr>
        <tr>
            <th class="bg-sky-200">패널</th>
            <td><?php echo $penel_on_1; ?></td>
            <td><?php echo $penel_on_2; ?></td>
        </tr>
        <tr>
            <th class="bg-sky-200">임원</th>
            <td><?php echo $member_on_1; ?></td>
            <td><?php echo $member_on_2; ?></td>
        </tr>
        <tr>
            <th class="bg-sky-200">일반 참가자</th>
            <td><?php echo $participants_on_1; ?></td>
            <td><?php echo $participants_on_2; ?></td>
        </tr>
        <tr>
            <th class="bg-sky-200">연자</th>
            <td><?php echo $speaker_on_1; ?></td>
            <td><?php echo $speaker_on_2; ?></td>
        </tr>
        <tr>
            <th class="bg-sky-200">기타</th>
            <td><?php echo $others_on_1; ?></td>
            <td><?php echo $others_on_2; ?></td>
        </tr>
        <tr class="bg-green-300 text-black">
            <th colspan="2">합계</th>
            <th><?php echo count($day_1); ?></th>
            <th><?php echo count($day_2); ?></th> 
        </tr> -->
        </tbody>
    </table>
</div>
</div>
<!-- /page content -->

</div>
<!-- /page container -->

<script>

    //print_r(count($day_1_pre)); //17
    //print_r(count($day_2_pre)); //13
    //print_r(count($day_1_on)); //8
    //print_r(count($day_2_on)); //7
    const tbody = document.querySelector(".tbody");
    const day_1_pre = <?php echo json_encode($day_1_pre); ?>;
    const day_1_on = <?php echo json_encode($day_1_on); ?>;
    const day_2_pre = <?php echo json_encode($day_2_pre); ?>;
    const day_2_on = <?php echo json_encode($day_2_on); ?>;

    function showTr(){
        day_1_pre.map((d1p)=>{
            console.log(d1p)
            if(d1p.type1 === "의료"){

            }
        })
    }

    showTr();
</script>