<style>
    .detail_table {
        display: flex;
        align-items: left;
        justify-content: space-between;
        margin-top: 5rem;
    }

    .detail_table>table {
        width: 70%;
        border: 1px solid #ddd;
    }
    .reviewer_table > table{
        width: 80%;
        margin : 0 auto;
    }
    .reviewer_table > table th,
    .reviewer_table > table td{
        border: 1px solid #ddd;
        text-align: center;
        padding: 8px;
    }

    .reviewer_table table th {
        background-color: #eee;
    }

    .detail_table>table th,
    .detail_table>table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .detail_table table th {
        /* width: 25%; */
        background-color: #eee;
    }

    .detail_table>table input {
        border: none
    }

    .detail_table>table input:focus {
        outline: 1px solid #000;
    }

    select {
        padding: 4px 8px;
    }

    .score_table > table {
        width: 30%;
    }
</style>

<!-- container section start -->
<section id="container" class="">

    <!--main content start-->
    <?php 
    $etc_sum = 0;
    $user = 0;
    //   print_r($reviewer)
    ?>

    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel form-horizontal">
                    <div class="panel-body detail_table">
                        <table>
                                <colgroup>
                                    <col width="20%">
                                    <col width="20%">
                                    <col width="20%">
                                    <col>
                                </colgroup>
                            <tr>
                                <th>심사위원 성함</th>
                                <th>심사위원 코드</th>
                                <th>심사위원 소속</th>
                            </tr>
                                <tr>
                                    <td><?php echo $reviewer[0]['nick_name']; ?></td>
                                    <td><?php echo $reviewer[0]['code']; ?></td>
                                    <td><?php echo $reviewer[0]['org']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="panel-body reviewer_table">
                        <table>
                                <colgroup>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                </colgroup>
                                <tr>
                                    <th>초록 접수 번호</th>
                                    <th>연구의 <br>창의성</th>
                                    <th>방법의 <br>타당성</th>
                                    <th>결과의 <br>영향력</th>
                                    <th>발표의 <br>우수성</th>
                                    <th>COI</th>
                                    <th>총점</th>
                                    <th>조정점수</th>
                                </tr>
                                <?php foreach($reviewer as $detail){ 
                                     $etc_sum += $detail['etc1'];
                                     if($detail['coi'] === "N"){
                                        $user++;
                                     }
                                    ?>
                                <tr>
                                    <td><?php echo $detail['submission_code']; ?></td>
                                    <td><?php echo $detail['score1']; ?></td>
                                    <td><?php echo $detail['score2']; ?></td>
                                    <td><?php echo $detail['score3']; ?></td>
                                    <td><?php echo $detail['score4']; ?></td>
                                    <td><?php echo $detail['coi']; ?></td>
                                    <td><?php echo $detail['score1'] + $detail['score2'] + $detail['score3'] + $detail['score4']; ?></td>
                                    <td><?php echo $detail['etc1']; ?></td>
                                </tr>
                            <?php } ?>
                            </table>    
                        </div>
                        <div class="panel-body reviewer_table score_table">
                            <table>
                                <colgroup>
                                    <col width="40%">
                                    <col>
                                </colgroup>
                                <tr>
                                    <th>조정점수 총합</th>
                                    <td><?php echo $etc_sum; ?></td>
                                </tr>
                                <tr>
                                    <th>coi 제외 초록</th>
                                    <td><?php echo $user; ?></td>
                                </tr>
                                <tr>
                                    <th>조정점수 평균</th>
                                    <td><?php echo  $user != 0 ? $etc_sum / $user : 0; ?></td>
                                </tr>
                            </table>
                    </div>
            </div>
    </section>
    </div>
    </div>

    <!-- Basic Forms & Horizontal Forms-->

</section>
</section>
<script src="/assets/js/form-component.js"></script>
<script src="/assets/js/bootstrap-datepicker.js"></script>
</body>

</html>