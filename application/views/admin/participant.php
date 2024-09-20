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
    <h1 class="text-6xl font-semibold text-amber-600 my-10">2024 대한내분비학회 추계학술대회 및 학연산 심포지엄</h1>
    <h6 class="text-5xl font-semibold mb-20 ">현장 참석자 데이터</h6>
    <p class= "text-4xl font-semibold mb-20 ">총 등록 인원 : <?php echo count($users); ?></p>
    <p class= "text-4xl font-semibold mb-20 ">총 출결 인원 : <?php echo count($item); ?></p>

    <table class="w-1/2">
        <tr>
            <th class="total_table bg-slate-300" rowspan=2>Total</th>
            <th rowspan=2 class="total_table bg-slate-300 total">
                0
            </th>
            <td class="total_table bg-sky-200">9월 5일(목)</td>
            <td class="total_table bg-amber-200">9월 6일(금)</td>
            <td class="total_table bg-green-200">9월 7일(토)</td>
        </tr>
        <tr>
            <td class="count_9">0</td>
            <td class="count_10">0</td>
            <td class="count_11">0</td>
        </tr>
    </table>

    <table class="w-9/12 text-2xl mb-20">
        <tr class="bg-amber-200 text-black">
            <th colspan="2">등록구분</th>
            <th>10월 31일(목)</th>
            <th>11월 1일(토)</th>
            <th>11월 2일(일)</th>
        </tr>
        <tr>
            <th class="bg-red-100" rowspan="7">사전등록</th>
            <th class="bg-red-100">좌장</th>
            <td><?php echo isset($day1_chairperson) ? $day1_chairperson  : 0; ?></td>
            <td><?php echo isset($day2_chairperson) ? $day2_chairperson  : 0; ?></td>
            <td><?php echo isset($day2_chairperson) ? $day2_chairperson  : 0; ?></td>
        </tr>
        </tr>
        <tr>
            <th class="bg-red-100">임원</th>
            <td><?php echo isset($day1_chairman) ? $day1_chairman : 0; ?></td>
            <td><?php echo isset($day2_chairman) ? $day2_chairman : 0; ?></td>
            <td><?php echo isset($day2_chairman) ? $day2_chairman : 0; ?></td>

        </tr>
        <tr>
            <th class="bg-red-100">패널</th>
            <td><?php echo isset($day1_panel) ? $day1_panel : 0; ?></td>
            <td><?php echo isset($day2_panel) ? $day2_panel : 0; ?></td>
            <td><?php echo isset($day2_panel) ? $day2_panel : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">연자</th>
            <td><?php echo isset($day1_speaker) ? $day1_speaker : 0; ?></td>
            <td><?php echo isset($day2_speaker) ? $day2_speaker : 0; ?></td>
            <td><?php echo isset($day2_speaker) ? $day2_speaker : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">일반 참가자</th>
            <td><?php echo isset($day1_participants) ? $day1_participants  : 0; ?></td>
            <td><?php echo isset($day2_participants) ? $day2_participants  : 0; ?></td>
            <td><?php echo isset($day2_participants) ? $day2_participants  : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">후원사</th>
            <td><?php echo isset($day1_sponsor) ? $day1_sponsor  : 0; ?></td>
            <td><?php echo isset($day2_sponsor) ? $day2_sponsor  : 0; ?></td>
            <td><?php echo isset($day2_sponsor) ? $day2_sponsor  : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-red-100">기타</th>
            <td><?php echo isset($day1_etc) ? $day1_etc : 0; ?></td>
            <td><?php echo isset($day2_etc) ? $day2_etc : 0; ?></td>
            <td><?php echo isset($day2_etc) ? $day2_etc : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-amber-200 text-black" colspan="2" rowspan="2">합계</th>
            <td><?php echo $total_day1; ?></td>
            <td><?php echo $total_day2; ?></td>
            <td><?php echo $total_day2; ?></td>
        </tr>
        <tr>
            <td colspan="3" class="bg-amber-200"><?php echo $total_day1 + $total_day2; ?></td>
        </tr>

        <!-- 현장등록 -->

        <tr>
            <th class="bg-sky-200" rowspan="7">현장등록</th>
            <th class="bg-sky-200">좌장</th>
            <td><?php echo isset($day1_chairperson) ? $day1_chairperson  : 0; ?></td>
            <td><?php echo isset($day2_chairperson) ? $day2_chairperson  : 0; ?></td>
            <td><?php echo isset($day2_chairperson) ? $day2_chairperson  : 0; ?></td>
        </tr>
        </tr>
        <tr>
            <th class="bg-sky-200">임원</th>
            <td><?php echo isset($day1_chairman) ? $day1_chairman : 0; ?></td>
            <td><?php echo isset($day2_chairman) ? $day2_chairman : 0; ?></td>
            <td><?php echo isset($day2_chairman) ? $day2_chairman : 0; ?></td>

        </tr>
        <tr>
            <th class="bg-sky-200">패널</th>
            <td><?php echo isset($day1_panel) ? $day1_panel : 0; ?></td>
            <td><?php echo isset($day2_panel) ? $day2_panel : 0; ?></td>
            <td><?php echo isset($day2_panel) ? $day2_panel : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-sky-200">연자</th>
            <td><?php echo isset($day1_speaker) ? $day1_speaker : 0; ?></td>
            <td><?php echo isset($day2_speaker) ? $day2_speaker : 0; ?></td>
            <td><?php echo isset($day2_speaker) ? $day2_speaker : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-sky-200">일반 참가자</th>
            <td><?php echo isset($day1_participants) ? $day1_participants  : 0; ?></td>
            <td><?php echo isset($day2_participants) ? $day2_participants  : 0; ?></td>
            <td><?php echo isset($day2_participants) ? $day2_participants  : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-sky-200">후원사</th>
            <td><?php echo isset($day1_sponsor) ? $day1_sponsor  : 0; ?></td>
            <td><?php echo isset($day2_sponsor) ? $day2_sponsor  : 0; ?></td>
            <td><?php echo isset($day2_sponsor) ? $day2_sponsor  : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-sky-200">기타</th>
            <td><?php echo isset($day1_etc) ? $day1_etc : 0; ?></td>
            <td><?php echo isset($day2_etc) ? $day2_etc : 0; ?></td>
            <td><?php echo isset($day2_etc) ? $day2_etc : 0; ?></td>
        </tr>
        <tr>
            <th class="bg-amber-200 text-black" colspan="2" rowspan="2">합계</th>
            <td><?php echo $total_day1; ?></td>
            <td><?php echo $total_day2; ?></td>
            <td><?php echo $total_day2; ?></td>
        </tr>
        <tr>
            <td colspan="3" class="bg-amber-200"><?php echo $total_day1 + $total_day2; ?></td>
        </tr>
    </table>
</div>
</div>
<!-- /page content -->

</div>
<!-- /page container -->