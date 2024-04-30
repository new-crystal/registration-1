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
</style>

<!-- container section start -->
<section id="container" class="">

    <!--main content start-->
    <?php 
        $sum = 0;
        $etc_sum = 0;
     $category_text = "";
     $category = $abstract["category"] ?? "-";
     switch ($category) {
         case 1:
         case 6:
             $category_text = "Diabetes/Obesity/Lipid (clinical)";
             break;
         case 2:
            case 7:
             $category_text = "Diabetes/Obesity/Lipid (basic)";
             break;
         case 3:
            case 8:
             $category_text = "Bone/Muscle";
             break;
         case 4:
            case 9:
             $category_text = "Thyroid";
             break;
         case 5:
            case 10:
             $category_text = "Pituitary/Adrenal/Gonad";
             break;
     }  

     //print_r($abstract_detail)
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
                                    <col width="20%">
                                    <col>
                                </colgroup>
                            <tr>
                                <th>초록 접수번호</th>
                                <th>초록 저자</th>
                                <th>초록 제목</th>
                                <th>초록 카테고리</th>
                                <th style="width:150px">국가</th>
                            </tr>
                                <tr>
                                    <td><?php echo $abstract['submission_code']; ?></td>
                                    <td><?php echo $abstract['nick_name']; ?></td>
                                    <td><?php echo $abstract['title']; ?></td>
                                    <td><?php echo $category_text; ?></td>
                                    <td><?php echo $abstract['nation']; ?></td>
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
                                    <col>
                                    <col>
                                </colgroup>
                                <tr>
                                    <th>평가자 성함</th>
                                    <th>평가자 소속</th>
                                    <th>평가자 코드</th>
                                    <th>연구의 <br>창의성</th>
                                    <th>방법의 <br>타당성</th>
                                    <th>결과의 <br>영향력</th>
                                    <th>발표의 <br>우수성</th>
                                    <th>COI</th>
                                    <th>총점</th>
                                    <th>조정점수</th>
                                </tr>
                                <?php foreach($abstract_detail as $detail){ 
                                    $sum += $detail['sum'];
                                    $etc_sum += $detail['etc1'];
                                    ?>
                                <tr>
                                    <td><?php echo $detail['reviewer_name']; ?></td>
                                    <td><?php echo $detail['reviewer_org']; ?></td>
                                    <td><?php echo $detail['reviewer_org']; ?></td>
                                    <td><?php echo $detail['code']; ?></td>
                                    <td><?php echo $detail['score2']; ?></td>
                                    <td><?php echo $detail['score3']; ?></td>
                                    <td><?php echo $detail['score4']; ?></td>
                                    <td><?php echo $detail['coi']; ?></td>
                                    <td><?php echo $detail['sum']; ?></td>
                                    <td><?php echo $detail['etc1']; ?></td>
                                </tr>
                            <?php } ?>
                            </table>

                        </div>
                        <div class="panel-body detail_table">
                        <table>
                                <tr>
                                    <th>총점</th>
                                    <th>조정점수 총합</th>
                                </tr>
                                <tr>
                                    <td><?php echo $sum; ?></td>
                                    <td><?php echo $etc_sum; ?></td>
                                </tr>  
                            </table>

                        </div>

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