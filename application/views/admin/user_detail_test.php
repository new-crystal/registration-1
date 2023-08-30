<style>
    .detail_table {
        display: flex;
        align-items: left;
        justify-content: space-between;
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

    .btn_box {
        width: 48%;
        display: flex;
        justify-content: right;
        margin-top: 1rem;
    }

    .btn_box>a {
        margin-left: 1rem;
    }
</style>

<!-- container section start -->
<section id="container" class="">

    <!--main content start-->
    <?php echo form_open('/admin/update_user?n=' . $item['registration_no'], 'id="updateForm" name="updateForm"') ?>
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel form-horizontal">
                    <div class="panel-body">
                        <div class="detail_table">
                            <table>
                                <tr>
                                    <th>참가유형</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['type2']; ?>" name="type2" id="type2"></td>
                                </tr>
                                <tr>
                                    <th>참가자구분</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['type']; ?>" name="type" id="type"></td>
                                </tr>
                                <tr>
                                    <th>참가자 detail</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['type1']; ?>" name="type1" id="type1"></td>
                                </tr>
                                <tr>
                                    <th>회원여부</th>
                                    <td> <select class="form-control input-lg m-bot15" name="type3" id="type3" data-select="<?php echo $item['type3']; ?>">
                                            <option value="회원">회원</option>
                                            <option value="비회원">비회원</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <th>평점신청여부</th>
                                    <td> <input type="text" class="form-control" value="<?php echo $item['etc1']; ?>" name="etc1" id="etc1"></td>
                                </tr>
                                <tr>
                                    <th>면허번호</th>
                                    <td> <input type="text" class="form-control" value="<?php echo $item['ln']; ?>" name="ln" id="ln"></td>
                                </tr>
                                <tr>
                                    <th>전문의번호</th>
                                    <td> <input type="text" class="form-control" value="<?php echo $item['sn']; ?>" name="sn" id="sn"></td>
                                </tr>
                                <tr>
                                    <th>이름</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['nick_name']; ?>" name="nick_name" id="nick_name">
                                    </td>
                                </tr>
                                <tr>
                                    <th>전화번호</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['phone']; ?>" name="phone" id="phone"></td>
                                </tr>
                                <tr>
                                    <th>등록번호</th>
                                    <td style="background-color:#fafafa;"> <input class="form-control" type="text" value="<?php echo $item['registration_no']; ?>" name="registration_no" id="registration_no" readonly></td>
                                </tr>
                                <tr>
                                    <th>E-mail</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['email']; ?>" name="email" id="email"></td>
                                </tr>
                                <tr>
                                    <th>소속</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['org']; ?>" name="org" id="org"></td>
                                </tr>
                                <tr>
                                    <th>소속(네임택용)</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['org_nametag']; ?>" name="org_nametag" id="org_nametag"></td>
                                </tr>
                                <tr>
                                    <th>주소</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['addr']; ?>" name="addr" id="addr"></td>
                                </tr>
                                <tr>
                                    <th>사전등록비</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['fee']; ?>" name="fee" id="fee"></td>
                                </tr>
                                <tr>
                                    <th>입금자명</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['deposit_name']; ?>" name="deposit_name" id="deposit_name"></td>
                                </tr>
                                <tr>
                                    <th>입금예정일</th>
                                    <td> <input id="dp1" type="text" value="<?php echo $item['deposit_date']; ?>" size="16" class="form-control" name="deposit_date"></td>
                                </tr>
                                <tr>
                                    <th>메모</th>
                                    <td> <?php if ($item['memo'] == 'null') { ?>
                                            <input id="memo" type="text" value="" size="16" class="form-control" name="memo">
                                        <?php  } else { ?>
                                            <input id="memo" type="text" value="<?php echo $item['memo']; ?>" size="16" class="form-control" name="memo">
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>등록시간</th>
                                    <td> <input id="time" type="text" value="<?php echo substr($item['time'], 0, 10) ?>" size="16" class="form-control" name="time"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="btn_box">
                            <button type="submit" data-toggle="modal" class="btn btn-primary">수정</button>
                            </form>
                            <a href="/admin/delete_user?d=<?php echo $item['registration_no']; ?>" class="btn btn-danger">삭제</a>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel form-horizontal">
                <div class="panel-body">
                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <p class="col-sm-2">입장</p>
                            <p class="col-sm-10">
                                <?php
                                if (empty($item2['min_time'])) {
                                    echo "태깅 기록이 없습니다.";
                                } else {
                                    echo $item2['min_time'];
                                };
                                ?>
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <p class="col-sm-2">퇴장</p>
                            <p class="col-sm-10">
                                <?php
                                if (empty($item2['max_time'])) {
                                    echo "태깅 기록이 없습니다.";
                                } else {
                                    echo $item2['max_time'];
                                };
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <p class="col-sm-2">총 시간</p>
                            <p class="col-sm-10">
                                <?php
                                if (empty($item2['duration'])) {
                                    echo "태깅 기록이 없습니다.";
                                } else {
                                    echo $item2['duration'] . '분';
                                };
                                ?>
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <p class="col-sm-2">총 평점</p>
                            <p class="col-sm-10">
                                <?php
                                if (empty($item2['duration'])) {
                                    echo "태깅 기록이 없습니다.";
                                } else {
                                    $score = $item2['duration'] / 60;
                                    echo round($score, 2) . '점';
                                };
                                ?>
                            </p>
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
<script>
    $(document).ready(function() {
        var type1_val = $('select#type1').attr('data-select');
        $('select#type1 option[value=' + type1_val + ']').attr('selected', 'selected');
        var type2_val = $('select#type2').attr('data-select');
        $('select#type2 option[value=' + type2_val + ']').attr('selected', 'selected');
        var type3_val = $('select#type3').attr('data-select');
        $('select#type3 option[value=' + type3_val + ']').attr('selected', 'selected');

        var registration_no = $('#registration_no').val();
        $("#updateForm").attr("action", "/admin/update_user?n=" + registration_no);
    });
</script>


</body>

</html>