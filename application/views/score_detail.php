<style>
    .detail_table {
        display: flex;
        align-items: left;
        justify-content: space-between;
        margin-top: 5rem;
    }

    .detail_table>table {
        width: 48%;
        border: 1px solid #ddd;
    }

    .detail_table>table th,
    .detail_table>table td {
        border: 1px solid #ddd;
        padding-left: 15px;
    }

    .detail_table table th {
        width: 25%;
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
    

    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel form-horizontal">
                    <div class="panel-body detail_table">
                        <table>
                            <tr>
                                <th>초록 접수번호</th>
                                <th>초록 저자</th>
                                <th>초록 제목</th>
                                <th>초록 카테고리</th>
                                <th>국가</th>
                            </tr>
                                <tr>
                                    <td><?php echo $abstract['submission_code']; ?></td>
                                    <td><?php echo $abstract['first_name']; ?></td>
                                    <td><?php echo $abstract['title']; ?></td>
                                    <td><?php echo $abstract['category']; ?></td>
                                    <td><?php echo $abstract['nation']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="panel-body detail_table">
                        <table>
                                <tr>
                                    <th>평가자 성함</th>
                                    <th>평가자 소속</th>
                                    <th>평가자 휴대폰 번호</th>
                                    <th>평가자 email</th>
                                    <th>평가 점수</th>
                                </tr>
                                <?php foreach($scores as $item){ ?>
                                <tr>
                                    <td><?php echo $item['nick_name']; ?></td>
                                    <td><?php echo $item['org']; ?></td>
                                    <td><?php echo $item['phone']; ?></td>
                                    <td><?php echo $item['email']; ?></td>
                                    <td><?php echo $item['score']; ?></td>
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
                                    <td colspan="5"><?php echo $abstract['sum']; ?></td>
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