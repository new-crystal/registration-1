<!-- container section start -->
<section id="container" class="">

    <!--main content start-->
    <?php echo form_open('/admin/update_user?n=' . $item['registration_no'], 'id="updateForm" name="updateForm"') ?>
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel form-horizontal">
                    <div class="panel-body">
                        <div class="col-lg-6">
                            <div class="form-group form-inline">
                                <label class="col-sm-2 control-label">구분 1</label>
                                <div class="col-sm-10">
                                    <!--
                                    <select class="form-control input-lg m-bot15" name="type1" id="type1" data-select="<?php echo $item['type']; ?>">
                                        <option value="일반참가자">일반참가자</option>
                                        <option value="좌장">좌장</option>
                                        <option value="연자">연자</option>
                                        <option value="패널">패널</option>
                                        <option value="임원">임원</option>
                                        <option value="후원사">후원사</option>
                                    </select>
-->
                                    <input class="form-control" type="text" value="<?php echo $item['type2']; ?>" name="type2" id="type2">

                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="col-sm-2 control-label">구분 2</label>
                                <div class="col-sm-10">
                                    <!--
                                    <select class="form-control input-lg m-bot15" name="type2" id="type2" data-select="<?php echo $item['type2']; ?>">
                                        <option value="개원의">개원의</option>
                                        <option value="봉직의">봉직의</option>
                                        <option value="전공의">전공의</option>
                                        <option value="전문의">전문의</option>
                                        <option value="교수">교수</option>
                                        <option value="사회복지사">사회복지사</option>
                                        <option value="약사">약사</option>
                                        <option value="간호사">간호사</option>
                                        <option value="영양사">영양사</option>
                                        <option value="연구원">연구원</option>
                                        <option value="운동처방사">운동처방사</option>
                                        <option value="기타">기타</option>
                                    </select>
-->
                                    <input class="form-control" type="text" value="<?php echo $item['type']; ?>" name="type" id="type">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="col-sm-2 control-label">구분 3</label>
                                <div class="col-sm-10">
                                    <!--
                                    <select class="form-control input-lg m-bot15" name="type2" id="type2" data-select="<?php echo $item['type2']; ?>">
                                        <option value="개원의">개원의</option>
                                        <option value="봉직의">봉직의</option>
                                        <option value="전공의">전공의</option>
                                        <option value="전문의">전문의</option>
                                        <option value="교수">교수</option>
                                        <option value="사회복지사">사회복지사</option>
                                        <option value="약사">약사</option>
                                        <option value="간호사">간호사</option>
                                        <option value="영양사">영양사</option>
                                        <option value="연구원">연구원</option>
                                        <option value="운동처방사">운동처방사</option>
                                        <option value="기타">기타</option>
                                    </select>
-->
                                    <input class="form-control" type="text" value="<?php echo $item['type1']; ?>" name="type1" id="type1">
                                </div>
                            </div>
                            <!-- <div class="form-group form-inline"> -->
                            <!-- <label class="col-sm-2 control-label">구분 3</label>
                                <div class="col-sm-10"> -->
                            <!--
                                    <select class="form-control input-lg m-bot15" name="type2" id="type2" data-select="<?php echo $item['type2']; ?>">
                                        <option value="개원의">개원의</option>
                                        <option value="봉직의">봉직의</option>
                                        <option value="전공의">전공의</option>
                                        <option value="전문의">전문의</option>
                                        <option value="교수">교수</option>
                                        <option value="사회복지사">사회복지사</option>
                                        <option value="약사">약사</option>
                                        <option value="간호사">간호사</option>
                                        <option value="영양사">영양사</option>
                                        <option value="연구원">연구원</option>
                                        <option value="운동처방사">운동처방사</option>
                                        <option value="기타">기타</option>
                                    </select>
-->
                            <!-- <input class="form-control" type="text" value="<?php echo $item['type1']; ?>" name="type1" id="type1">
                                </div>
                            </div> -->
                            <div class="form-group form-inline">
                                <label class="col-sm-2 control-label">회원여부</label>
                                <div class="col-sm-10">
                                    <select class="form-control input-lg m-bot15" name="type3" id="type3" data-select="<?php echo $item['type3']; ?>">
                                        <option value="회원">회원</option>
                                        <option value="비회원">비회원</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">평점신청여부</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $item['etc1']; ?>" name="etc1" id="etc1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">면허번호</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $item['ln']; ?>" name="ln" id="ln">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">전문의번호</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $item['sn']; ?>" name="sn" id="sn">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">이름</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $item['nick_name']; ?>" name="nick_name" id="nick_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">전화번호</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $item['phone']; ?>" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">등록번호</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $item['registration_no']; ?>" name="registration_no" id="registration_no" readonly>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $item['email']; ?>" name="email" id="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">소속</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $item['org']; ?>" name="org" id="org">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">소속(네임택용)</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $item['org_nametag']; ?>" name="org_nametag" id="org_nametag">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">주소</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $item['addr']; ?>" name="addr" id="addr">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">사전등록비</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $item['fee']; ?>" name="fee" id="fee">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">입금자명</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $item['deposit_name']; ?>" name="deposit_name" id="deposit_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">입금예정일</label>
                                <div class="col-sm-10">
                                    <input id="dp1" type="text" value="<?php echo $item['deposit_date']; ?>" size="16" class="form-control" name="deposit_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">메모</label>
                                <div class="col-sm-10">
                                    <?php if ($item['memo'] == 'null') { ?>
                                        <input id="memo" type="text" value="" size="16" class="form-control" name="memo">
                                    <?php  } else { ?>
                                        <input id="memo" type="text" value="<?php echo $item['memo']; ?>" size="16" class="form-control" name="memo">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">등록시간</label>
                                <div class="col-sm-10">
                                    <input id="time" type="text" value="<?php echo substr($item['time'], 0, 10) ?>" size="16" class="form-control" name="time">
                                </div>
                            </div>
                            <div clss="btn_group" style="float: right;">
                                <button type="submit" data-toggle="modal" class="btn btn-primary">수정</button>
                                </form>
                                <a href="/admin/delete_user?d=<?php echo $item['registration_no']; ?>" class="btn btn-danger">삭제</a>
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