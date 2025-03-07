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

    .total_table {
        width: 240px;
    }
</style>
<?php

/**총 user 수 */
// print_r(count($users));

/**미출결 유저 수 */
$non_qr = count($users) - count($item);

/** day 1 출결 유저 수 */
$day_1_users = count($day_1) + count($on_day_1);

/** day 2 출결 유저 수 */
$day_2_users = count($day_2) + count($on_day_2);

/** day 3 출결 유저 수 */
// $day_3_users = count($day_3) + count($on_day_3);


?>
<div class="text-center flex flex-col items-center justify-center">
    <h1 class="text-6xl font-semibold text-orange-600 my-10">제61차 대한비만학회 춘계학술대회</h1>
    <h6 class="text-3xl font-semibold mb-20 ">현장 참석자 데이터</h6>
    <h6 class="text-3xl font-semibold mb-20 ">현장 총 등록 인원 : <?=count($users)?>명</h6>
    <h6 class="text-3xl font-semibold mb-20 ">현장 QR 출결 :
        <?php echo count($item) ?> 명 / 미출결:
        <?php echo $non_qr ?>
        명
        <!-- <?php echo count($day_2_e) ?> -->
    </h6>

    <table>
        <tr>
            <th class="total_table bg-slate-300" rowspan=2>Total</th>
            <th rowspan=2 class="total_table bg-slate-300 total">
                <?php echo $day_1_users + $day_2_users; ?>
            </th>
            <td class="total_table bg-sky-200">3월 14일(금)</td>
            <td class="total_table bg-amber-200">3월 15일(토)</td>

        </tr>
        <tr>
            <td class="count_9"> <?php echo $day_1_users ?></td>
            <td class="count_10"> <?php echo $day_2_users ?></td>
        </tr>
    </table>

    <table class="w-9/12 text-2xl mb-20 mt-20">
        <tr class="text-black">
            <th colspan="2" class="bg-sky-950 text-white">등록구분</th>
            <th class="bg-sky-200">3월 14일(금)</th>
            <th class="bg-amber-200">3월 15일(토)</th>
        </tr>
        
        <tr>
            <th class="bg-red-100" rowspan="8">사전등록</th>
            <th class="bg-red-100">연자</th>
            <td>
                <?php echo isset($speaker_1) ?  count($speaker_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($speaker_2) ?  count($speaker_2) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-red-100">좌장</th>
            <td>
                <?php echo isset($chairperson_1) ?  count($chairperson_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($chairperson_2) ?  count($chairperson_2) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-red-100">패널</th>
            <td>
                <?php echo isset($panel_1) ?  count($panel_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($panel_2) ?  count($panel_2) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-red-100">임원</th>
            <td>
                <?php echo isset($faculty_1) ?  count($faculty_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($faculty_2) ?  count($faculty_2) : 0; ?>
            </td>
        </tr>

        <tr>
            <th class="bg-red-100">일반참석자</th>
            <td>
                <?php echo isset($participant_1) ?  count($participant_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($participant_2) ?  count($participant_2) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-red-100">Satellite Symposium 1 참석자</th>
            <td>
                <?php echo isset($satellite_1_1) ?  count($satellite_1_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($satellite_2_1) ?  count($satellite_2_1) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-red-100">Satellite Symposium 2 참석자</th>
            <td>
                <?php echo isset($satellite_1_2) ?  count($satellite_1_2)  : 0; ?>
            </td>
            <td>
                <?php echo isset($satellite_2_2) ?  count($satellite_2_2) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-red-100">기타</th>
            <td>
                <?php echo isset($other_1) ?  count($other_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($other_2) ?  count($other_2) : 0; ?>
            </td>
        </tr>

        <tr>
            <th class="bg-red-100" colspan="2">계</th>
            <td class="day_1">
                <?php echo count($day_1); ?>
            </td>
            <td class="day_2">
                <?php echo count($day_2); ?>
            </td>
        </tr>
        <tr>
            <th class="bg-red-100" colspan="2">합계</th>
            <td colspan="3" class="count_1">
                <?php echo count($day_1) + count($day_2); ?>
            </td>
        </tr>

        <tr>
            <th class="bg-blue-100" rowspan="8">현장등록</th>
            <th class="bg-blue-100">연자</th>
            <td>
                <?php echo isset($on_speaker_1) ?  count($on_speaker_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_speaker_2) ?  count($on_speaker_2) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-blue-100">좌장</th>
            <td>
                <?php echo isset($on_chairperson_1) ?  count($on_chairperson_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_chairperson_2) ?  count($on_chairperson_2) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-blue-100">패널</th>
            <td>
                <?php echo isset($on_panel_1) ?  count($on_panel_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_panel_2) ?  count($on_panel_2) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-blue-100">임원</th>
            <td>
                <?php echo isset($on_faculty_1) ?  count($on_faculty_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_faculty_2) ?  count($on_faculty_2) : 0; ?>
            </td>
        </tr>

        <tr>
            <th class="bg-blue-100">일반참석자</th>
            <td>
                <?php echo isset($on_participant_1) ?  count($on_participant_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_participant_2) ?  count($on_participant_2) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-blue-100">Satellite Symposium 1 참석자</th>
            <td>
                <?php echo isset($on_satellite_1_1) ?  count($on_satellite_1_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_satellite_2_1) ?  count($on_satellite_2_1) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-blue-100">Satellite Symposium 2 참석자</th>
            <td>
                <?php echo isset($on_satellite_1_2) ?  count($on_satellite_1_2)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_satellite_2_2) ?  count($on_satellite_2_2) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-blue-100">기타</th>
            <td>
                <?php echo isset($on_other_1) ?  count($on_other_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_other_2) ?  count($on_other_2) : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-blue-100" colspan="2">계</th>
            <td class="on_day_1">
                <?php echo  count($on_day_1);  ?>
            </td>
            <td class="on_day_2">
                <?php echo  count($on_day_2);  ?>
            </td>
        </tr>
        <tr>
            <th class="bg-blue-100" colspan="2">합계</th>
            <td colspan="3" class="count_4">
                <?php echo count($on_day_1) + count($on_day_2) ?>
            </td>
        </tr>
    </table>
</div>
</div>
<!-- /page content -->

</div>
<!-- /page container -->

<script>
    const day_1_e = document.querySelector(".day_1_e")
    const day_1 = document.querySelector(".day_1")
    const on_day_1_e = document.querySelector(".on_day_1_e")
    const on_day_1 = document.querySelector(".on_day_1")

    const day_2_e = document.querySelector(".day_2_e")
    const day_2 = document.querySelector(".day_2")
    const on_day_2_e = document.querySelector(".on_day_2_e")
    const on_day_2 = document.querySelector(".on_day_2")

    const day_3_e = document.querySelector(".day_3_e")
    const day_3 = document.querySelector(".day_3")
    const on_day_3_e = document.querySelector(".on_day_3_e")
    const on_day_3 = document.querySelector(".on_day_3")

    const count_1 = document.querySelector(".count_1")
    const count_2 = document.querySelector(".count_2")
    const count_3 = document.querySelector(".count_3")
    const count_4 = document.querySelector(".count_4")
    const count_5 = document.querySelector(".count_5")
    const count_6 = document.querySelector(".count_6")

    const count_7 = document.querySelector(".count_7")
    const count_8 = document.querySelector(".count_8")

    const count_9 = document.querySelector(".count_9")
    const count_10 = document.querySelector(".count_10")
    const count_11 = document.querySelector(".count_11")
    const total = document.querySelector(".total")

    const addNum = () => {
        count_1.innerText = Number(day_1_e.innerText) + Number(day_1.innerText);
        count_2.innerText = Number(day_2_e.innerText) + Number(day_2.innerText);
        // count_3.innerText = Number(day_3_e.innerText) + Number(day_3.innerText);
        count_4.innerText = Number(on_day_1_e.innerText) + Number(on_day_1.innerText);
        count_5.innerText = Number(on_day_2_e.innerText) + Number(on_day_2.innerText);
        // count_6.innerText = Number(on_day_3_e.innerText) + Number(on_day_3.innerText);

        count_7.innerText = Number(count_1.innerText) + Number(count_2.innerText);
        count_8.innerText = Number(count_4.innerText) + Number(count_5.innerText);

        total.innerText = Number(count_9.innerText) + Number(count_10.innerText);
    }



    //addNum()
</script>