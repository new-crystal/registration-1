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
    <?php $sum = 0;
     $category_text = "";
     $category = $abstract["category"] ?? "-";
     switch ($category) {
         case 0:
             $category_text = "Diabetes/Obesity/Lipid (clinical)";
             break;
         case 1:
             $category_text = "Diabetes/Obesity/Lipid (basic)";
             break;
         case 2:
             $category_text = "Bone/Muscle";
             break;
         case 3:
             $category_text = "Thyroid";
             break;
         case 4:
             $category_text = "Pituitary/Adrenal/Gonad";
             break;
     }  
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
                                    <td><?php echo $abstract['first_name']; ?></td>
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
                                    <th>평가자 휴대폰 번호</th>
                                    <th>평가자 email</th>
                                    <th>연구의 <br>창의성</th>
                                    <th>방법의 <br>타당성</th>
                                    <th>결과의 <br>영향력</th>
                                    <th>발표의 <br>우수성</th>
                                    <th>COI</th>
                                    <th>총점</th>
                                </tr>
                                <?php foreach($abstract_detail as $detail){ 
                                    $sum += $detail['sum'];
                                    ?>
                                <tr>
                                    <td><?php echo $detail['nick_name']; ?></td>
                                    <td><?php echo $detail['org']; ?></td>
                                    <td><?php echo $detail['phone']; ?></td>
                                    <td><?php echo $detail['email']; ?></td>
                                    <td><?php echo $detail['score1']; ?></td>
                                    <td><?php echo $detail['score2']; ?></td>
                                    <td><?php echo $detail['score3']; ?></td>
                                    <td><?php echo $detail['score4']; ?></td>
                                    <td><?php echo $detail['coi']; ?></td>
                                    <td><?php echo $detail['sum']; ?></td>
                                </tr>
                            <?php } ?>
                            </table>

                        </div>
                        <div class="panel-body detail_table">
                        <table>
                                <tr>
                                    <th>총점</th>
                                </tr>
                                <tr>
                                    <td colspan="5"><?php echo $sum; ?></td>
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