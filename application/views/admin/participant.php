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
    <h1 class="text-6xl font-semibold text-orange-600 my-10">대한내분비학회 2023년 개원의연수강좌</h1>
    <h6 class="text-3xl font-semibold mb-20 ">현장 참석자 데이터</h6>
    <?php
    // print_r($statistics);
    $total_1 = 0;
    $total_2 = 0;
    $total_3 = 0;
    for ($i = 0; $i < count($statistics); $i++) {
        $total_1 += $statistics[$i]['A_03'] + $statistics[$i]['R_03'];
    }
    // print_r($statistics)
    ?>

    <table class="w-9/12 text-2xl mb-20">
        <tr class="bg-green-300 text-black">
            <th colspan="2">등록구분</th>
            <th>9월 3일(일)</th>
            <!-- <th>7월 12일(금)</th>
            <th>7월 13일(토)</th> -->
        </tr>
        <tr>
            <th class="bg-red-100" rowspan="5">사전등록</th>
            <th class="bg-red-100">좌장</th>
            <td><?php echo isset($statistics[3]['R_03']) ? $statistics[3]['R_03']  : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-red-100">고문</th>
            <td><?php echo isset($statistics[0]['R_03']) ? $statistics[0]['R_03'] : 0; ?>
            </td>

        </tr>
        <tr>
            <th class="bg-red-100">패널</th>
            <td><?php echo isset($statistics[4]['R_03']) ? $statistics[4]['R_03'] : 0; ?>
            </td>

        </tr>
        <tr>
            <th class="bg-red-100">임원</th>
            <td><?php echo isset($statistics[2]['R_03']) ? $statistics[2]['R_03'] : 0; ?>
            </td>

        </tr>
        <tr>
            <th class="bg-red-100">일반 참가자</th>
            <td><?php echo isset($statistics[1]['R_03']) ? $statistics[1]['R_03']  : 0; ?>
            </td>

        </tr>
        <tr>
            <th class="bg-sky-200" rowspan="5">현장등록</th>
            <th class="bg-sky-200">좌장</th>
            <td><?php echo isset($statistics[3]['A_03']) ? $statistics[3]['A_03'] : 0; ?>
            </td>

        </tr>
        <tr>
            <th class="bg-sky-200">고문</th>
            <td><?php echo isset($statistics[0]['A_03']) ? $statistics[0]['A_03'] : 0; ?>
            </td>
        </tr>
        <tr>
            <th class="bg-sky-200">패널</th>
            <td><?php echo isset($statistics[4]['A_03']) ? $statistics[4]['A_03'] : 0; ?>
            </td>

        </tr>
        <tr>
            <th class="bg-sky-200">임원</th>
            <td><?php echo isset($statistics[2]['A_03']) ? $statistics[2]['A_03'] : 0; ?>
            </td>

        </tr>
        <tr>
            <th class="bg-sky-200">일반 참가자</th>
            <td><?php echo isset($statistics[1]['A_03']) ? $statistics[1]['A_03'] : 0; ?>
            </td>

        </tr>
        <tr class="bg-green-300 text-black">
            <th colspan="2">합계</th>
            <th><?php echo $total_1; ?></th>
        </tr>
    </table>
</div>
</div>
<!-- /page content -->

</div>
<!-- /page container -->