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
$day_3_users = count($day_3) + count($on_day_3);


?>
<div class="text-center flex flex-col items-center justify-center">
    <h1 class="text-6xl font-semibold text-orange-600 my-10">2024 대한내분비학회 추계학술대회 및 학연산 심포지엄</h1>
    <h6 class="text-3xl font-semibold mb-20 ">현장 참석자 데이터</h6>
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
                <?php echo $day_1_users + $day_2_users + $day_3_users; ?>
            </th>
            <td class="total_table bg-sky-200">10월 31일(목)</td>
            <td class="total_table bg-amber-200">11월 1일(금)</td>
            <td class="total_table bg-green-200">11월 2일(토)</td>
        </tr>
        <tr>
            <td class="count_9"> <?php echo $day_1_users ?></td>
            <td class="count_10"> <?php echo $day_2_users ?></td>
            <td class="count_11"> <?php echo $day_3_users ?></td>
        </tr>
    </table>

    <table class="w-9/12 text-2xl mb-20 mt-20">
        <tr class="text-black">
            <th colspan="2" class="bg-sky-950 text-white">등록구분</th>
            <th  class="bg-sky-200">10월 31일(목)</th>
            <th  class="bg-amber-200">11월 1일(금)</th>
            <th  class="bg-green-200">11월 2일(토)</th>
            <th  class=" bg-slate-300">Total</th>
        </tr>
        
        <tr>
            <th class="bg-red-100" rowspan="10">사전등록</th>
            <th class="bg-red-100">연자</th>
            <td>
                <?php echo isset($speaker_1) ?  count($speaker_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($speaker_2) ?  count($speaker_2) : 0; ?>
            </td>
            <td>
                <?php echo isset($speaker_3) ? count($speaker_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($speaker_1) && !isset($speaker_2) && !isset($speaker_3)) {
                    echo  count($speaker_1);
                }
                /**day 2 */
                else if (isset($speaker_1) && isset($speaker_2) && !isset($speaker_3)) {
                    echo  count($speaker_1) + count($speaker_2);
                }
                /**day 3 */
                else if (isset($speaker_1) && isset($speaker_2) && isset($speaker_3)) {
                    echo count($speaker_1) + count($speaker_2) + count($speaker_3);
                }
                ?>
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
            <td>
                <?php echo isset($chairperson_3) ? count($chairperson_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day 1 */
                if (isset($chairperson_1) && !isset($chairperson_2) && !isset($chairperson_3)) {
                    echo  count($chairperson_1);
                }
                /**day 2 */
                else if (isset($chairperson_1) && isset($chairperson_2) && !isset($chairperson_3)) {
                    echo  count($chairperson_1) + count($chairperson_2);
                }
                /**day3 */
                else if (isset($chairperson_1) && isset($chairperson_2) && isset($chairperson_3)) {
                    echo  count($chairperson_1) + count($chairperson_2) + count($chairperson_3);
                }
                ?>
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
            <td>
                <?php echo isset($panel_3) ? count($panel_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($panel_1) && !isset($panel_2) && !isset($panel_3)) {
                    echo  count($panel_1);
                }
                /**day 2 */
                else if (isset($panel_1) && isset($panel_2) && !isset($panel_3)) {
                    echo  count($panel_1) + count($panel_2);
                }
                /**day 3 */
                else if (isset($panel_1) && isset($panel_2) && isset($panel_3)) {
                    echo  count($panel_1) + count($panel_2) + count($panel_3);
                }
                ?>
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
            <td>
                <?php echo isset($faculty_3) ? count($faculty_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($faculty_1) && !isset($faculty_2) && !isset($faculty_3)) {
                    echo  count($faculty_1);
                }
                /**day 2 */
                else if (isset($faculty_1) && isset($faculty_2) && !isset($faculty_3)) {
                    echo count($faculty_1) + count($faculty_2);
                }
                /**day 3 */
                else if (isset($faculty_1) && isset($faculty_2) && isset($faculty_3)) {
                    echo  count($faculty_1) + count($faculty_2) + count($faculty_3);
                }
                ?>
            </td>
        </tr>

        <tr>
            <th class="bg-red-100">일반참가자</th>
            <td>
                <?php echo isset($participant_1) ?  count($participant_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($participant_2) ?  count($participant_2) : 0; ?>
            </td>
            <td>
                <?php echo isset($participant_3) ? count($participant_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($participant_1) && !isset($participant_2) && !isset($participant_3)) {
                    echo  count($participant_1);
                }
                /**day 2 */
                else if (isset($participant_1) && isset($participant_2) && !isset($participant_3)) {
                    echo  count($participant_1) + count($participant_2);
                }
                /**day 3 */
                else if (isset($participant_1) && isset($participant_2) && isset($participant_3)) {
                    echo  count($participant_1) + count($participant_2) + count($participant_3);
                }
                ?>
            </td>
        </tr>

        <tr>
            <th class="bg-red-100">Satellite 1 참가자(동아ST)</th>
            <td>
                <?php echo isset($satellite_1_1) ?  count($satellite_1_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($satellite_2_1) ?  count($satellite_2_1) : 0; ?>
            </td>
            <td>
                <?php echo isset($satellite_3_1) ? count($satellite_3_1) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($satellite_1_1) && !isset($satellite_2_1) && !isset($satellite_3_1)) {
                    echo  count($satellite_1_1);
                }
                /**day 2 */
                else if (isset($satellite_1_1) && isset($satellite_2_1) && !isset($satellite_3_1)) {
                    echo  count($satellite_1_1) + count($satellite_2_1);
                }
                /**day 3 */
                else if (isset($satellite_1_1) && isset($satellite_2_1) && isset($satellite_3_1)) {
                    echo  count($satellite_1_1) + count($satellite_2_1) + count($satellite_3_1);
                }
                ?>
            </td>
        </tr>

        <tr>
            <th class="bg-red-100">Satellite 2 참가자(종근당)</th>
            <td>
                <?php echo isset($satellite_1_2) ?  count($satellite_1_2)  : 0; ?>
            </td>
            <td>
                <?php echo isset($satellite_2_2) ?  count($satellite_2_2) : 0; ?>
            </td>
            <td>
                <?php echo isset($satellite_3_2) ? count($satellite_3_2) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($satellite_1_2) && !isset($satellite_2_2) && !isset($satellite_3_2)) {
                    echo  count($satellite_1_2);
                }
                /**day 2 */
                else if (isset($satellite_1_2) && isset($satellite_2_2) && !isset($satellite_3_2)) {
                    echo  count($satellite_1_2) + count($satellite_2_2);
                }
                /**day 3 */
                else if (isset($satellite_1_2) && isset($satellite_2_2) && isset($satellite_3_2)) {
                    echo  count($satellite_1_2) + count($satellite_2_2) + count($satellite_3_2);
                }
                ?>
            </td>
        </tr>

        <tr>
            <th class="bg-red-100">Satellite 3 참가자(대웅바이오)</th>
            <td>
                <?php echo isset($satellite_1_3) ?  count($satellite_1_3)  : 0; ?>
            </td>
            <td>
                <?php echo isset($satellite_2_3) ?  count($satellite_2_3) : 0; ?>
            </td>
            <td>
                <?php echo isset($satellite_3_3) ? count($satellite_3_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($satellite_1_3) && !isset($satellite_2_3) && !isset($satellite_3_3)) {
                    echo  count($satellite_1_3);
                }
                /**day 2 */
                else if (isset($satellite_1_3) && isset($satellite_2_3) && !isset($satellite_3_3)) {
                    echo  count($satellite_1_3) + count($satellite_2_3);
                }
                /**day 3 */
                else if (isset($satellite_1_3) && isset($satellite_2_3) && isset($satellite_3_3)) {
                    echo  count($satellite_1_3) + count($satellite_2_3) + count($satellite_3_3);
                }
                ?>
            </td>
        </tr>

        <tr>
            <th class="bg-red-100">Satellite 4 참가자(오가논)</th>
            <td>
                <?php echo isset($satellite_1_4) ?  count($satellite_1_4)  : 0; ?>
            </td>
            <td>
                <?php echo isset($satellite_2_4) ?  count($satellite_2_4) : 0; ?>
            </td>
            <td>
                <?php echo isset($satellite_3_4) ? count($satellite_3_4) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($satellite_1_4) && !isset($satellite_2_4) && !isset($satellite_3_4)) {
                    echo  count($satellite_1_4);
                }
                /**day 2 */
                else if (isset($satellite_1_4) && isset($satellite_2_4) && !isset($satellite_3_4)) {
                    echo  count($satellite_1_4) + count($satellite_2_4);
                }
                /**day 3 */
                else if (isset($satellite_1_4) && isset($satellite_2_4) && isset($satellite_3_4)) {
                    echo  count($satellite_1_4) + count($satellite_2_4) + count($satellite_3_4);
                }
                ?>
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
            <td>
                <?php echo isset($other_3) ? count($other_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($other_1) && !isset($other_2) && !isset($other_3)) {
                    echo  count($other_1);
                }
                /**day 2 */
                else if (isset($other_1) && isset($other_2) && !isset($other_3)) {
                    echo  count($other_1) + count($other_2);
                }
                /**day 3 */
                else if (isset($other_1) && isset($other_2) && isset($other_3)) {
                    echo  count($other_1) + count($other_2) + count($other_3);
                }
                ?>
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
            <td class="day_3">
                <?php echo count($day_3); ?>
            </td>
            <td rowspan="2" class="count_7"></td>
        </tr>
        <tr>
            <th class="bg-red-100" colspan="2">합계</th>
            <td colspan="3" class="count_1">
                <?php echo count($day_1) + count($day_2) + count($day_3); ?>
            </td>
            <!-- <td colspan="2" class="count_2"></td>
            <td colspan="2" class="count_3"></td> -->
        </tr>

        <tr>
            <th class="bg-blue-100" rowspan="10">현장등록</th>
            <th class="bg-blue-100">연자</th>
            <td>
                <?php echo isset($on_speaker_1) ?  count($on_speaker_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_speaker_2) ?  count($on_speaker_2) : 0; ?>
            </td>
            <td>
                <?php echo isset($on_speaker_3) ? count($on_speaker_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($on_speaker_1) && !isset($on_speaker_2) && !isset($on_speaker_3)) {
                    echo  count($on_speaker_1);
                }
                /**day 2 */
                else if (isset($on_speaker_1) && isset($on_speaker_2) && !isset($on_speaker_3)) {
                    echo  count($on_speaker_1) + count($on_speaker_2);
                }
                /**day 3 */
                else if (isset($on_speaker_1) && isset($on_speaker_2) && isset($on_speaker_3)) {
                    echo   count($on_speaker_1) + count($on_speaker_2) + count($on_speaker_3);
                }
                ?>

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
            <td>
                <?php echo isset($on_chairperson_3) ? count($on_chairperson_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($on_chairperson_1) && !isset($on_chairperson_2) && !isset($on_chairperson_3)) {
                    echo  count($on_chairperson_1);
                }
                /**day 2 */
                else if (isset($on_chairperson_1) && isset($on_chairperson_2) && !isset($on_chairperson_3)) {
                    echo  count($on_chairperson_1) + count($on_chairperson_2);
                }
                /**day 3 */
                else if (isset($on_chairperson_1) && isset($on_chairperson_2) && isset($on_chairperson_3)) {
                    echo  count($on_chairperson_1) + count($on_chairperson_2) + count($on_chairperson_3);
                }
                ?>
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
            <td>
                <?php echo isset($on_panel_3) ? count($on_panel_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($on_panel_1) && !isset($on_panel_2) && !isset($on_panel_3)) {
                    echo  count($on_panel_1);
                }
                /**day 2 */
                else if (isset($on_panel_1) && isset($on_panel_2) && !isset($on_panel_3)) {
                    echo count($on_panel_1) + count($on_panel_2);
                }
                /**day 3 */
                else if (isset($on_panel_1) && isset($on_panel_2) && isset($on_panel_3)) {
                    echo count($on_panel_1) + count($on_panel_2) + count($on_panel_3);
                }
                ?>
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
            <td>
                <?php echo isset($on_faculty_3) ? count($on_faculty_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($on_faculty_1) && !isset($on_faculty_2) && !isset($on_faculty_3)) {
                    echo count($on_faculty_1);
                }
                /**day 2 */
                else if (isset($on_faculty_1) && isset($on_faculty_2) && !isset($on_faculty_3)) {
                    echo  count($on_faculty_1) + count($on_faculty_2);
                }
                /**day 3 */
                else if (isset($on_faculty_1) && isset($on_faculty_2) && isset($on_faculty_3)) {
                    echo count($on_faculty_1) + count($on_faculty_2) + count($on_faculty_3);
                }
                ?>
            </td>
        </tr>

        <tr>
            <th class="bg-blue-100">일반참가자</th>
            <td>
                <?php echo isset($on_participant_1) ?  count($on_participant_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_participant_2) ?  count($on_participant_2) : 0; ?>
            </td>
            <td>
                <?php echo isset($on_participant_3) ? count($on_participant_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($on_participant_1) && !isset($on_participant_2) && !isset($on_participant_3)) {
                    echo  count($on_participant_1);
                }
                /**day 2 */
                else if (isset($on_participant_1) && isset($on_participant_2) && !isset($on_participant_3)) {
                    echo  count($on_participant_1) + count($on_participant_2);
                }
                /**day 3 */
                else if (isset($on_participant_1) && isset($on_participant_2) && isset($on_participant_3)) {
                    echo  count($on_participant_1) + count($on_participant_2) + count($on_participant_3);
                }
                ?>
            </td>
        </tr>

      
        <tr>
            <th class="bg-blue-100">Satellite 1 참가자(동아ST)</th>
            <td>
                <?php echo isset($on_satellite_1_1) ?  count($on_satellite_1_1)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_satellite_2_1) ?  count($on_satellite_2_1) : 0; ?>
            </td>
            <td>
                <?php echo isset($on_satellite_3_1) ? count($on_satellite_3_1) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($on_satellite_1_1) && !isset($on_satellite_2_1) && !isset($on_satellite_3_1)) {
                    echo  count($on_satellite_1_1);
                }
                /**day 2 */
                else if (isset($on_satellite_1_1) && isset($on_satellite_2_1) && !isset($on_satellite_3_1)) {
                    echo  count($on_satellite_1_1) + count($on_satellite_2_1);
                }
                /**day 3 */
                else if (isset($on_satellite_1_1) && isset($on_satellite_2_1) && isset($on_satellite_3_1)) {
                    echo  count($on_satellite_1_1) + count($on_satellite_2_1) + count($on_satellite_3_1);
                }
                ?>
            </td>
        </tr>

        <tr>
            <th class="bg-blue-100">Satellite 2 참가자(종근당)</th>
            <td>
                <?php echo isset($on_satellite_1_2) ?  count($on_satellite_1_2)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_satellite_2_2) ?  count($on_satellite_2_2) : 0; ?>
            </td>
            <td>
                <?php echo isset($on_satellite_3_2) ? count($on_satellite_3_2) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($on_satellite_1_2) && !isset($on_satellite_2_2) && !isset($on_satellite_3_2)) {
                    echo  count($on_satellite_1_2);
                }
                /**day 2 */
                else if (isset($on_satellite_1_2) && isset($on_satellite_2_2) && !isset($on_satellite_3_2)) {
                    echo  count($on_satellite_1_2) + count($on_satellite_2_2);
                }
                /**day 3 */
                else if (isset($on_satellite_1_2) && isset($on_satellite_2_2) && isset($on_satellite_3_2)) {
                    echo  count($on_satellite_1_2) + count($on_satellite_2_2) + count($on_satellite_3_2);
                }
                ?>
            </td>
        </tr>

        <tr>
            <th class="bg-blue-100">Satellite 3 참가자(대웅바이오)</th>
            <td>
                <?php echo isset($on_satellite_1_3) ?  count($on_satellite_1_3)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_satellite_2_3) ?  count($on_satellite_2_3) : 0; ?>
            </td>
            <td>
                <?php echo isset($on_satellite_3_3) ? count($on_satellite_3_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($on_satellite_1_3) && !isset($on_satellite_2_3) && !isset($on_satellite_3_3)) {
                    echo  count($on_satellite_1_3);
                }
                /**day 2 */
                else if (isset($on_satellite_1_3) && isset($on_satellite_2_3) && !isset($on_satellite_3_3)) {
                    echo  count($on_satellite_1_3) + count($on_satellite_2_3);
                }
                /**day 3 */
                else if (isset($on_satellite_1_3) && isset($on_satellite_2_3) && isset($on_satellite_3_3)) {
                    echo  count($on_satellite_1_3) + count($on_satellite_2_3) + count($on_satellite_3_3);
                }
                ?>
            </td>
        </tr>

        <tr>
            <th class="bg-blue-100">Satellite 4 참가자(오가논)</th>
            <td>
                <?php echo isset($on_satellite_1_4) ?  count($on_satellite_1_4)  : 0; ?>
            </td>
            <td>
                <?php echo isset($on_satellite_2_4) ?  count($on_satellite_2_4) : 0; ?>
            </td>
            <td>
                <?php echo isset($on_satellite_3_4) ? count($on_satellite_3_4) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($on_satellite_1_4) && !isset($on_satellite_2_4) && !isset($on_satellite_3_4)) {
                    echo  count($on_satellite_1_4);
                }
                /**day 2 */
                else if (isset($on_satellite_1_4) && isset($on_satellite_2_4) && !isset($on_satellite_3_4)) {
                    echo  count($on_satellite_1_4) + count($on_satellite_2_4);
                }
                /**day 3 */
                else if (isset($on_satellite_1_4) && isset($on_satellite_2_4) && isset($on_satellite_3_4)) {
                    echo  count($on_satellite_1_4) + count($on_satellite_2_4) + count($on_satellite_3_4);
                }
                ?>
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
            <td>
                <?php echo isset($on_other_3) ? count($on_other_3) : 0; ?>
            </td>
            <td>
                <?php
                /**day1 */
                if (isset($on_other_1) && !isset($on_other_2) && !isset($on_other_3)) {
                    echo  count($on_other_1);
                }
                /**day 2 */
                else if (isset($on_other_1) && isset($on_other_2) && !isset($on_other_3)) {
                    echo count($on_other_1) + count($on_other_2);
                }
                /**day 3 */
                else if (isset($on_other_1) && isset($on_other_2) && isset($on_other_3)) {
                    echo  count($on_other_1) + count($on_other_2) + count($on_other_3);
                }
                ?>
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
            <td class="on_day_3">
                <?php echo  count($on_day_3);  ?>
            </td>
            <td rowspan="2" class="count_8"></td>
        </tr>
        <tr>
            <th class="bg-blue-100" colspan="2">합계</th>
            <td colspan="3" class="count_4">
                <?php echo count($on_day_1) + count($on_day_2) + count($on_day_3); ?>
            </td>
            <!-- <td colspan="2" class="count_5"></td>
            <td colspan="2" class="count_6"></td> -->
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
        count_3.innerText = Number(day_3_e.innerText) + Number(day_3.innerText);
        count_4.innerText = Number(on_day_1_e.innerText) + Number(on_day_1.innerText);
        count_5.innerText = Number(on_day_2_e.innerText) + Number(on_day_2.innerText);
        count_6.innerText = Number(on_day_3_e.innerText) + Number(on_day_3.innerText);

        count_7.innerText = Number(count_1.innerText) + Number(count_2.innerText) + Number(count_3.innerText)
        count_8.innerText = Number(count_4.innerText) + Number(count_5.innerText) + Number(count_6.innerText)

        total.innerText = Number(count_9.innerText) + Number(count_10.innerText) + Number(count_11.innerText);
    }



    addNum()
</script>