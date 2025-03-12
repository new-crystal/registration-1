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

        
    
    .alert {
        width: 100%;
        height: 260px;
        background: #9c27b0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #FFF;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0.85;
        z-index: 999;
    }

    .alert>p{
        font-size: 8.5rem;
        font-weight: 700;
        position: relative;
        /* animation: fadeInUp 1s; */
        font-family: Gong;
        -webkit-text-stroke-width: 5px;
        -webkit-text-stroke-color: #004471;
    }

    .alert>h6 {
        font-size: 2.5rem;
        font-weight: 600;
        position: relative;
        /* animation: fadeInUp 1s; */
        font-family: Gong;
        -webkit-text-stroke-width: 3px;
        -webkit-text-stroke-color: #004471;
        }
        .access_btn{
            width: 150px;
            height: 50px;
            background-color: orangered;
            font-size: 20px;
            font-weight: 800;
            color:#FFF;
            float: right;
        }

    .access_btn:hover{
        background-color: red;
    }
    .rightT {
        text-align: right;
    }
</style>
<?php
    $onsite = "";
    if($item['onsite_reg'] == '0'){
        $onsite = "사전등록";
    }else if($item['onsite_reg'] == '1'){
        $onsite = "현장등록";
    }
?>
<!-- container section start -->
<section id="container" class="">

    <!--main content start-->
    <?php echo form_open('/admin/update_user?n=' . $item['registration_no'], 'id="updateForm" name="updateForm"') ?>

    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel form-horizontal">
                    <div class="panel-body">
                    <div class="alert" id="alert" style="display:none;">
                        <p class="time"></p>
                        <p class="alert_text">출결 체크 완료!</p>
                    </div>
                        <div class="detail_table">
                            <table>
                                <tr>
                                    <td colspan="2" class="flex_beteween">
                                        <button type="button" class="btn btn-primary" onclick="print('<?php echo $item['registration_no']; ?>')">QR Print</button>
                                        <button type="button" onclick="saveTime('<?php echo $item['registration_no']; ?>')" class="access_btn">출결</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background-color: #fb8500">네임택 하단택</th>
                                    <td><input class="form-control" type="text" name="remark1" id="remark1" value="<?php echo $item['remark1']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background-color: #fb8500">임원</th>
                                    <td>
                                        <input class="form-control" type="text" value="<?php echo $item['remark2']; ?>" name="remark2" id="remark2">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background-color: #fb8500">안내/심사표/Oral</th>
                                    <td><input class="form-control" type="text" name="remark3" value="<?php echo $item['remark3']; ?>" id="remark3">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background-color: #fb8500">welcome Reception</th>
                                    <td><input class="form-control" type="text" value="<?php echo $item['remark4']; ?>" name="remark4" id="remark4">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background-color: #fb8500">이름변경, 동명이인, 프리뷰</th>
                                    <td><input class="form-control" type="text" value="<?php echo $item['remark5']; ?>" name="remark5" id="remark5">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background-color: #fb8500">메모</th>
                                    <td><input class="form-control" type="text" value="<?php echo $item['remark6']; ?>" name="remark6" id="remark6">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background-color: #fb8500">중복역할</th>
                                    <td><input class="form-control" type="text" value="<?php echo $item['remark7']; ?>" name="remark7" id="remark7">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background-color: #fb8500">현장 메모</th>
                                    <td><input class="form-control" type="text" value="<?php echo $item['memo']; ?>" name="memo" id="memo">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background-color: #fb8500">등록 메모</th>
                                    <td><input class="form-control" type="text" value="<?php echo $item['deposit_memo']; ?>" name="deposit_memo" id="deposit_memo">
                                    </td>
                                </tr>
                            </table>


                            <table>
                                <tr>
                                    <th>등록비</th>
                                    <td>
                                        <input class="form-control" type="text" name="fee" value="<?php echo $item['fee']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>결제방법</th>
                                    <td>
                                        <input class="form-control" type="text" name="deposit_method" value="<?php echo $item['deposit_method']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>할인코드</th>
                                    <td>
                                        <input class="form-control" type="text" name="etc1" value="<?php echo $item['etc1']; ?>">
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <th>Welcome Reception 참석 여부</th>
                                    <td> <input id="dp1" type="text" value="<?php echo $item['welcome_reception_yn']; ?>" size="16" class="form-control yn" name="welcome_reception_yn">

                                    </td>
                                </tr>
                                <tr>
                                    <th>Satellite Symposium 참석 여부</th>
                                    <td> <input id="dp1" type="text" value="<?php echo $item['satellite_yn']; ?>" size="16" class="form-control yn" name="satellite_yn">

                                    </td>
                                </tr>
                                <tr>
                                    <th>Breakfast Symposium 참석 여부</th>
                                    <td> <input id="dp1" type="text" value="<?php echo $item['breakfast_yn']; ?>" size="16" class="form-control yn" name="breakfast_yn">

                                    </td>
                                </tr>
                                <tr>
                                    <th>Luncheon Symposium 참석 여부</th>
                                    <td> <input id="dp1" type="text" value="<?php echo $item['luncheon_yn']; ?>" size="16" class="form-control yn" name="luncheon_yn">

                                    </td>
                                </tr> -->

                                <tr>
                                    <th>참가유형</th>
                                    <td>
                                        <input class="form-control attendance_type" type="text" value="<?php echo $item['attendance_type']; ?>" name="attendance_type" id="attendance_type">
                                        <select class="form-control input-lg m-bot15" id="attendance_type_select">
                                            <option value="" selected="selected">직접입력</option>
                                            <option value="일반참석자">일반참석자</option>
                                            <option value="임원">임원</option>
                                            <option value="좌장">좌장</option>
                                            <option value="연자">연자</option>
                                            <option value="패널">패널</option>
                                            <option value="기자">기자</option>
                                            <option value="satellite1">Satellite 1 참가자</option>
                                            <option value="satellite2">Satellite 2 참가자</option>
                                           <!--   <option value="Satellite 3 참가자(대웅바이오)">Satellite 3 참가자(대웅바이오)</option>
                                            <option value="Satellite 4 참가자(오가논)">Satellite 4 참가자(오가논)</option> -->
                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>분야 구분</th>
                                    <td>
                                        <input class="form-control occupation_type" type="text" value="<?php echo $item['occupation_type']; ?>" name="occupation_type" id="occupation_type">
                                        <select class="form-control input-lg m-bot15" id="occupation_type_select">
                                            <option value="" selected="selected">직접입력</option>
                                            <option value="의료">의료</option>
                                            <option value="영양">영양</option>
                                            <option value="운동">운동</option>
                                            <option value="기타">기타</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>참석자구분</th>
                                    <td>
                                        <input class="form-control member_type" type="text" value="<?php echo $item['member_type']; ?>" name="member_type" id="member_type">
                                        <select class="form-control input-lg m-bot15" id="member_type_select">
                                            <option value="" selected="selected">직접입력</option>
                                            <option value="교수">교수</option>
                                            <option value="개원의">개원의</option>
                                            <option value="봉직의">봉직의</option>
                                            <option value="전임의">전임의</option>
                                            <option value="전공의">전공의</option> 
                                            <option value="영양사">영양사</option>
                                            <option value="운동사">운동사</option>
                                            <option value="간호사">간호사</option>
                                            <option value="군의관">군의관</option>
                                            <option value="공보의">공보의</option>
                                            <option value="연구원">연구원</option>
                                            <option value="학생">학생</option>
                                            <option value="기타">기타</option>
                                            <!-- <option value="개원의">개원의</option> -->
                                            <!-- <option value="기타">기타</option> -->
                                        </select>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <th>홈페이지인증ID</th>
                                    <td>
                                        <input class="form-control" type="text" name="member_id" value="<?php echo $item['member_id']; ?>">
                                    </td>
                                </tr> -->
<!--                               
                              
                                <tr>
                                    <th>qr print 여부(N/Y)</th>
                                    <td><input class="form-control yn" type="text" value="<?php echo $item['qr_print']; ?>" name="qr_print" id="phone" readonly></td>
                                </tr>
                                <tr>
                                    <th>day 1 출결여부(N/Y)</th>
                                    <td><input class="form-control yn" type="text" value="<?php echo $item['qr_chk_day_1']; ?>" name="qr_chk_day_1" id="phone" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>day 2 출결여부(N/Y)</th>
                                    <td><input class="form-control yn" type="text" value="<?php echo $item['qr_chk_day_2']; ?>" name="qr_chk_day_2" id="phone" readonly>
                                    </td>
                                </tr> -->
                            </table>
                        </div>
                        <div class="detail_table">
                            <table>
                                <tr>
                                    <th>Registration No.</th>
                                    <td style="background-color:#fafafa;"> <input class="form-control" type="text" value="<?php echo $item['registration_no']; ?>" name="registration_no" id="registration_no" readonly></td>
                                </tr>

                                <tr>
                                    <th>등록시간</th>
                                    <td> <input id="time" type="text" value="<?php echo substr($item['reg_date'], 0, 10) ?>" size="16" class="form-control" name="reg_date">
                                    </td>
                                </tr>

                                <tr>
                                    <th>이름</th>
                                    <td>
                                       <input class="form-control" type="text" style="width:230px" value="<?php echo $item['nick_name']; ?>" name="nick_name" id="nick_name">
                                    </td>
                                </tr>

                                <tr>
                                    <th>소속</th>
                                    <td style="background-color:#fafafa;"> <input class="form-control" type="text" value="<?php echo $item['org']; ?>" name="org" id="org" readonly>

                                    </td>
                                </tr>
                                <tr>
                                    <th>네임택용 소속</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['org_nametag']; ?>" name="org_nametag" id="org_nametag">
                                    </td>
                                </tr>
                                <tr>
                                    <th>국내학회 회원</th>
                                    <td> <input class="form-control" type="text" value="<?php echo $item['member']; ?>" name="member" id="member">
                                    </td>
                                </tr>

                                <!-- <tr>
                                    <th>등록구분(사전등록/현장등록)</th>
                                    <td> <input id="dp1" type="text" value="<?php echo $onsite; ?>" size="16" class="form-control" name="onsite_reg">

                                    </td>
                                </tr> -->
                                <tr>
                                    <th>대한의사협회 평점</th>
                                    <td>
                                        <div style="display:flex;  align-items: center;">
                                            <input class="form-control" type="text" value="<?php echo $item['is_score']; ?>" name="is_score" id="is_score">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>내과전공의 외부학술회의 평점</th>
                                    <td>
                                        <div style="display:flex;  align-items: center;">
                                            <input class="form-control" type="text" value="<?php echo $item['is_score1']; ?>" name="is_score1" id="is_score1">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>내과분과전문의 자격갱신 평점</th>
                                    <td>
                                        <div style="display:flex;  align-items: center;">
                                            <input class="form-control" type="text" value="<?php echo $item['is_score2']; ?>" name="is_score2" id="is_score2">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>한국영양교육평가원 평점</th>
                                    <td>
                                        <div style="display:flex;  align-items: center;">
                                            <input class="form-control" type="text" value="<?php echo $item['is_score3']; ?>" name="is_score3" id="is_score3">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>운동사 평점신청</th>
                                    <td>
                                        <div style="display:flex;  align-items: center;">
                                            <input class="form-control" type="text" value="<?php echo $item['is_score4']; ?>" name="is_score4" id="is_score4">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>의사면허번호</th>
                                    <td>
                                        <div style="display:flex;  align-items: center;">
                                            <input class="form-control" type="text" value="<?php echo $item['licence_number']; ?>" name="licence_number" id="phone">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>전문의번호</th>
                                    <td>
                                        <div style="display:flex;  align-items: center;">
                                            <input class="form-control" type="text" value="<?php echo $item['specialty_number']; ?>" name="specialty_number" id="phone">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>영양사면허번호</th>
                                    <td>
                                        <div style="display:flex;  align-items: center;">
                                            <input class="form-control" type="text" value="<?php echo $item['nutritionist_number']; ?>" name="nutritionist_number" id="nutritionist_number">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>임상영양사자격번호</th>
                                    <td>
                                        <div style="display:flex;  align-items: center;">
                                            <input class="form-control" type="text" value="<?php echo $item['dietitian_number']; ?>" name="dietitian_number" id="dietitian_number">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>생년월일(YYYY-MM-DD)</th>
                                    <td>
                                        <div style="display:flex;  align-items: center;">
                                            <input class="form-control" type="text" value="<?php echo $item['date_of_birth']; ?>" name="date_of_birth" id="date_of_birth">
                                        </div>
                                    </td>
                                </tr>
                             
                                <tr>
                                    <th>연락처</th>
                                    <td>
                                        <div style="display:flex;  align-items: center;">
                                            <input class="form-control" type="text" value="<?php echo $item['phone']; ?>" name="phone" id="phone">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>E-mail</th>
                                    <td><input class="form-control" type="text" value="<?php echo $item['email']; ?>" name="email" id="email"></td>
                                </tr>

                               
                                <!-- <tr>
                                    <th>개최정보습득방법</th>
                                    <td><input class="form-control" type="text" value="<?php echo $item['conference_info']; ?>" name="conference_info" id="phone"></td>
                                </tr>
                                <tr>
                                    <th>결제수단(신용카드/계좌이체)</th>
                                    <td> <input type="text" class="form-control" value="<?php echo $item['deposit_method']; ?>" name="deposit_method" id="etc4"></td>
                                </tr> -->
                                <tr>
                                    <th>결제상태(결제대기/결제완료)</th>
                                    <td> <input type="text" class="form-control" value="<?php echo $item['deposit']; ?>" name="deposit" id="deposit"></td>
                                </tr>
                                <!-- <tr>
                                    <th>결제일</th>
                                    <td> <input id="dp1" type="text" value="<?php echo $item['deposit_date']; ?>" size="16" class="form-control" name="deposit_date">

                                    </td>
                                </tr> -->
                                <!-- <tr>
                                    <th>숙박 신청여부</th>
                                    <td> <input id="committee" type="text" value="<?php echo $item['etc1'] ? $item['etc1'] : "-"; ?>" size="16" class="form-control" name="etc1">

                                    </td>
                                </tr>
                                <tr>
                                    <th>저녁 만찬 및 친교의 시간 신청여부</th>
                                    <td> <input id="committee" type="text" value="<?php echo $item['etc2'] ? $item['etc2'] : "-"; ?>" size="16" class="form-control" name="etc2">

                                    </td>
                                </tr> -->
                               
                            </table>

                        </div>

                        <div clss="btn_group" style="float: right;">
                            <button type="submit" data-toggle="modal" class="btn btn-primary">수정</button>
                            </form>
                            <button type="button" class="btn btn-danger" onclick="removeUser('<?php echo $item['registration_no']; ?>')">삭제</button>

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
        var registration_no = $('#registration_no').val();
        $("#updateForm").attr("action", "/admin/update_user?n=" + registration_no);
    });

    const attendance = document.querySelector(".attendance_type");
    const attendance_select = document.querySelector("#attendance_type_select")

    const member_type = document.querySelector(".member_type");
    const member_type_select = document.querySelector("#member_type_select")

    const ocupation_type = document.querySelector(".type1");
    const ocupation_type_select = document.querySelector("#type1_select")

    const ynList = document.querySelectorAll(".yn")


    // /**참가 유형 select box */
    // attendance_select.addEventListener("change", () => {
    //     attendance.value = attendance_select.options[attendance_select.selectedIndex].value;
    // })

    // /**참가자 구분 select box */
    // member_type_select.addEventListener("change", () => {
    //     member_type.value = member_type_select.options[member_type_select.selectedIndex].value;
    // })

    // /**분야구분 select box */
    // ocupation_type_select.addEventListener("change", () => {
    //     ocupation_type.value = ocupation_type_select.options[ocupation_type_select.selectedIndex].value;
    // })

    function removeUser(reg) {
        if (window.confirm("삭제하시겠습니까?")) {
            window.location.href = `/admin/delete_user?d=${reg}`
        }
    }

    function print(reg) {
        const url = `/qrcode/print_file?registration_no=${reg}`
        fetch(url).then((res) => window.open(res.url))
    }

    ynList.forEach((yn) => {
        yn.addEventListener("input", (e) => {
            ynRegExp(yn.value);
            e.target.value = yn.value.replace(/[^YN]/g, '');
        })
    })

    function ynRegExp(text) {
        const re = /^[YN]$/;
        if (!re.test(text)) {
            alert("Y, N만 입력 가능합니다.")
        }
    }

    function saveTime(qrvalue){
        
        const url = "/access/add_record"
        const data = {
            reg_no : qrvalue,
            type : 4
        }
        if(qrvalue){
            $.ajax({
                type: "POST",
                url : url,
                data: data,
                success: function(result){
                    console.log(result)
                    const alert = document.querySelector("#alert");
                    const alertText = document.querySelector(".alert_text");

                    alert.style.display = "";
                    const today = new Date();
                    const time = document.querySelector(".time");

                    time.innerText = `${today.toLocaleString()}`

                    setTimeout(() => {
                        alert.style.display = "none";
                    }, 1500)
                    // window.location.reload()
                },
                error:function(e){  
                    console.log(e)
                    alert("출결등록 이슈가 발생했습니다. 관리자에게 문의해주세요.")
                }
            })  
        }
    }
</script>


</body>

</html>