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
    <h1 class="text-6xl font-semibold text-orange-600 my-10">제59차 대한비만학회 춘계학술대회</h1>
    <h6 class="text-3xl font-semibold mb-20 ">현장 참석자 데이터</h6>
    <?php
    // print_r($statistics);
    $total_1 = 0;
    $total_2 = 0;
    $total_3 = 0;
    // for ($i = 0; $i < count($statistics); $i++) {
    //     $total_1 += $statistics[$i]['A_03'] + $statistics[$i]['R_03'];
    // }
    // print_r($statistics)
    ?>

    <table class="w-9/12 text-2xl mb-20">
        <tr class="bg-green-300 text-black">
            <th colspan="2">등록구분</th>
            <th>3월 8일(금)</th>
            <th>3월 9일(토)</th>
        </tr>
        <tr>
            <th class="bg-red-100" rowspan="4">사전등록</th>
            <th class="bg-red-100">좌장</th>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <th class="bg-red-100">패널</th>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <th class="bg-red-100">임원</th>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <th class="bg-red-100">일반 참가자</th>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <th class="bg-sky-200" rowspan="4">현장등록</th>
            <th class="bg-sky-200">좌장</th>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <th class="bg-sky-200">패널</th>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <th class="bg-sky-200">임원</th>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <th class="bg-sky-200">일반 참가자</th>
             <td>0</td>
             <td>0</td>
        </tr>
        <tr class="bg-green-300 text-black">
            <th colspan="2">합계</th>
            <th>0</th>
            <th>0</th>
        </tr>
    </table>
</div>
</div>
<!-- /page content -->

</div>
<!-- /page container -->