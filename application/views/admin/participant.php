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
</style>
<div class="text-center flex flex-col items-center justify-center">
    <h1 class="text-6xl font-semibold text-orange-600 my-10">대한내분비학회 제22회 분과전문의 연수강좌</h1>
    <h6 class="text-5xl font-semibold mb-20 ">현장 참석자 데이터</h6>
    <p class= "text-4xl font-semibold mb-20 ">총 등록 인원 : <?php echo count($users); ?></p>
    <p class= "text-4xl font-semibold mb-20 ">총 출결 인원 : <?php echo count($item); ?></p>

    <table class="w-9/12 text-2xl mb-20">
        <tr class="bg-green-300 text-black">
            <th colspan="2">등록구분</th>
            <th>6월 15일(토)</th>
            <th>6월 16일(일)</th>
        </tr>
        <tr>
            <th class="bg-red-100" rowspan="7">사전등록</th>
            <th class="bg-red-100">좌장</th>
            <td><?php echo isset($day1_chairperson) ? $day1_chairperson  : 0; ?></td>
            <td><?php echo isset($day2_chairperson) ? $day2_chairperson  : 0; ?></td>
        </tr>
        </tr>
        <tr>
            <th class="bg-red-100">임원</th>
            <td><?php echo isset($day1_chairman) ? $day1_chairman : 0; ?></td>
            <td><?php echo isset($day2_chairman) ? $day2_chairman : 0; ?></td>

        </tr>
        <tr>
            <th class="bg-red-100">패널</th>
            <td><?php echo isset($day1_panel) ? $day1_panel : 0; ?></td>
            <td><?php echo isset($day2_panel) ? $day2_panel : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">연자</th>
            <td><?php echo isset($day1_speaker) ? $day1_speaker : 0; ?></td>
            <td><?php echo isset($day2_speaker) ? $day2_speaker : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">일반 참가자</th>
            <td><?php echo isset($day1_participants) ? $day1_participants  : 0; ?></td>
            <td><?php echo isset($day2_participants) ? $day2_participants  : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">후원사</th>
            <td><?php echo isset($day1_sponsor) ? $day1_sponsor  : 0; ?></td>
            <td><?php echo isset($day2_sponsor) ? $day2_sponsor  : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">기타</th>
            <td><?php echo isset($day1_etc) ? $day1_etc : 0; ?></td>
            <td><?php echo isset($day2_etc) ? $day2_etc : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-green-300 text-black" colspan="2" rowspan="2">합계</th>
            <td><?php echo $total_day1; ?></td>
            <td><?php echo $total_day2; ?></td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $total_day1 + $total_day2; ?></td>
        </tr>
    </table>
</div>
</div>
<!-- /page content -->

</div>
<!-- /page container -->