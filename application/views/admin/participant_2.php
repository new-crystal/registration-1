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

?>
<div class="text-center flex flex-col items-center justify-center">
    <h1 class="text-6xl font-semibold text-orange-600 my-10">MRONJ 2024</h1>
    <h6 class="text-3xl font-semibold mb-20 ">현장 참석자 데이터</h6>
    <h6 class="text-3xl font-semibold mb-20 ">현장 QR 출결 :
        <?php echo count($item) ?> 명 / 미출결:
        <?php echo $non_qr ?>
        명
        <!-- <?php echo count($day_2_e) ?> -->
    </h6>

    <table>
        <tr>
            <td class="total_table bg-amber-200">10월 20일(일)</td>
        </tr>
        <tr>
            <td class="count_9"> <?php echo $day_1_users ?></td>
        </tr>
    </table>

    <table class="w-9/12 text-2xl mb-20 mt-20">
        <tr class="text-black">
            <th colspan="2" class="bg-sky-950 text-white">등록구분</th>
            <th  class="bg-amber-200">10월 20일(일)</th>
        </tr>
        
        <tr>
            <th class="bg-red-100" rowspan="6">사전등록</th>
            <th class="bg-red-100">연자</th>
            <td>
                <?php echo isset($speaker_1) ?  count($speaker_1)  : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-red-100">좌장</th>
            <td>
                <?php echo isset($chairperson_1) ?  count($chairperson_1)  : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-red-100">임원</th>
            <td>
                <?php echo isset($faculty_1) ?  count($faculty_1)  : 0; ?>
            </td>
        </tr>

        <tr>
            <th class="bg-red-100">일반참가자</th>
            <td>
                <?php echo isset($participant_1) ?  count($participant_1)  : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-red-100">기타</th>
            <td>
                <?php echo isset($other_1) ?  count($other_1)  : 0; ?>
            </td>
        </tr>

        <tr>
            <th class="bg-red-100">계</th>
            <td class="day_1 bg-amber-200">
                <?php echo count($day_1);   ?>
            </td>
        </tr>
       
        <tr>
            <th class="bg-blue-100" rowspan="3">현장등록</th>
            <th class="bg-blue-100">일반참가자</th>
            <td>
                <?php echo isset($on_participant_1) ?  count($on_participant_1)  : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-blue-100">기타</th>
            <td>
                <?php echo isset($on_other_1) ?  count($on_other_1)  : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-blue-100">계</th>
            <td class="on_day_1 bg-amber-200">
                <?php echo  count($on_day_1);  ?>
            </td>
        </tr>
      
    </table>
</div>
</div>
<!-- /page content -->

</div>
<!-- /page container -->

<script>
   
</script>