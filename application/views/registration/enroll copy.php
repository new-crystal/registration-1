    <!-- 메인 페이지일 경우 class="main" 추가 -->
    <div id="container" class="main">
        <div style="display:none"><?php echo $user_chk ?> / <?php echo $limit_count ?></div>
        <div class="contents">
            <h2 class="subTit exin">온라인 사전등록 및 확인</h2>

            <div class="txtCon" style="min-height:500px;">
                <div class="txtCon regist">
                    <ul class="conMenu">
                        <li><a href="/registration/info/">사전등록 안내</a></li>
                        <li class="on"><a href="/registration/enroll/">사전등록(현장참석)</a></li>
                        <li><a href="/registration/search/">사전등록 확인</a></li>
                    </ul>

                    <dl class="registInfo">

                        <script type="text/javascript">
                        $(document).ready(function() {
                            $(".chk_area").click(function() {
                                if ($("#chk1").is(":checked") == false) {
                                    $("input").not("input#chk1").attr("disabled", true);
                                } else {
                                    $("input").removeAttr("disabled");
                                }
                            });
                            $(".radio_area").click(function() {
                                if ($('#chk1').is(":checked") == true)
                                    if ($('input[name=type3]:checked').length > 0)
                                        if (document.getElementById("nonmember").checked)
                                            document.getElementById("download-notice").style.display =
                                            "block";
                                        else
                                            document.getElementById("download-notice").style.display =
                                            "none";

                            });
                            <?php
                                if ($user_chk >= $limit_count) {
                                    echo '$("#rb2 input").click(function(){';
                                    echo 'var radio_val = $(this).val();';
                                    echo 'if(radio_val == "일반참가자"){';
                                    echo 'alert("일반 참가자의 사전등록이 마감되었습니다.");';
                                    echo '$("input").not("input#chk1, #rb2 input").attr("disabled",true);';
                                    echo '}else{';
                                    echo '$("input").removeAttr("disabled");';
                                    echo '}';
                                    echo '});';
                                }
                                ?>
                            $("#registerForm dd").not("dd.chk_agree").click(function() {
                                if ($("#chk1").is(":checked") == false) {
                                    alert("개인정보 활용 동의를 해주셔야 등록이 진행됩니다.");
                                }
                            })
                        })
                        $(function() {
                            $("#registerForm").submit(function() {
                                if ($('#chk1').is(":checked") == false) {
                                    alert('개인 정보 수집 및 이용에 동의해주세요!')
                                    $("#chk1").focus();
                                    return false;
                                }

                                if ($("input:radio[name=type3]:checked").length < 1) {
                                    alert("대한심뇌혈관질환 예방학회 회원여부를 선택해주세요.");
                                    $("input:radio[name=type3]").focus();
                                    return false;
                                }

                                if ($("input:radio[name=type]:checked").length < 1) {
                                    alert("구분1을 선택해주세요.");
                                    $("input:radio[name=type]").focus();
                                    return false;
                                }

                                if ($("input:radio[name=type2]:checked").length < 1) {
                                    alert("구분2를 선택해주세요.");
                                    $("input:radio[name=type2]").focus();
                                    return false;
                                }

                                if (!$.trim($("#name").val())) {
                                    alert("이름을 입력해주세요.");
                                    $("#name").focus();
                                    return false;
                                }
                                if (!$.trim($("#license").val())) {
                                    //                                        alert("면허번호를 입력해주세요.");
                                    //                                        $("#license").focus();
                                    //                                        return false;
                                    $("#license").val('00000');
                                }
                                if (!$.trim($("#org").val())) {
                                    alert("소속단체명을 입력해주세요.");
                                    $("#org").focus();
                                    return false;
                                }
                                if (!$.trim($("#phone").val())) {
                                    alert("연락처(전화번호)를 입력해주세요.");
                                    $("#phone").focus();
                                    return false;
                                }
                                if (!$.trim($("#email").val())) {
                                    alert("이메일을 입력해주세요.");
                                    $("#email").focus();
                                    return false;
                                }
                                if (!$.trim($("#postcode").val())) {
                                    alert("주소를 입력해주세요.");
                                    $("#addrbutton").focus();
                                    return false;
                                }
                                //입금예정일, 입금자명 선택입력으로 변경 21.09.14 hansol
                                if (!$.trim($("#deposit_date").val())) {
                                    //                                        alert("입금예정일을 입력해주세요.");
                                    //                                        $("#deposit_date").focus();
                                    //                                        return false;
                                    $("#deposit_date").val('0000-00-00');
                                }

                                if (!$.trim($("#deposit_name").val())) {
                                    //                                        alert("입금자명을 입력해주세요.");
                                    //                                        $("#deposit_name").focus();
                                    //                                        return false;
                                    $("#deposit_name").val('미입력');
                                }

                                $("#registerForm").attr("action", "/registration/enroll");

                                return true;
                            });
                        });
                        </script>
                        <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
                        <script type="text/javascript">
                        function execDaumPostcode() {
                            new daum.Postcode({
                                oncomplete: function(data) {
                                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                                    var addr = ''; // 주소 변수
                                    var extraAddr = ''; // 참고항목 변수

                                    //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                                    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                                        addr = data.roadAddress;
                                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                                        addr = data.jibunAddress;
                                    }

                                    // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                                    if (data.userSelectedType === 'R') {
                                        // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                                        // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                                        if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                                            extraAddr += data.bname;
                                        }
                                        // 건물명이 있고, 공동주택일 경우 추가한다.
                                        if (data.buildingName !== '' && data.apartment === 'Y') {
                                            extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data
                                                .buildingName);
                                        }
                                        // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                                        if (extraAddr !== '') {
                                            extraAddr = ' (' + extraAddr + ')';
                                        }
                                        // 조합된 참고항목을 해당 필드에 넣는다.
                                        document.getElementById("extraAddress").value = extraAddr;

                                    } else {
                                        document.getElementById("extraAddress").value = '';
                                    }

                                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                                    document.getElementById('postcode').value = data.zonecode;
                                    document.getElementById("address").value = addr;
                                    // 커서를 상세주소 필드로 이동한다.
                                    document.getElementById("detailAddress").focus();
                                }
                            }).open();
                        }
                        </script>

                        <?php
                        $timestamp = strtotime("Now");
                        if (date("Y-m-d", $timestamp) <= "2023-07-22") {
                        ?>
                        <div class="txtCon regist">
                            <h3 class="hidden">사전등록 확인</h3>
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('registration/enroll', 'id="registerForm" name="registerForm"') ?>
                            <fieldset>
                                <legend>온라인 사전등록</legend>

                                <div class="registSearch">

                                    <dl class="bdArea" id="privacy">
                                        <dd class="chk_agree">
                                            <p class="">선생님의 개인 정보는 2023년 대한심뇌혈관질환예방학회 개원의 연수강좌에 대한 학술대회 활동 수행을 위한 목적으로만
                                                활용됩니다.<br>선생님의 개인 정보는 행사 진행 기간 동안 보유되며, 수집된 개인 정보는 암호화되어 처리
                                                됩니다.<br>선생님께서는 언제든지 제공한 개인 정보의 수집 및 이용에 대해 중지를 요청하실 수 있습니다.</p>
                                            <p class="chk_area">
                                                <label><input type="checkbox" name="chk1" value="동의합니다" id="chk1" />
                                                    동의합니다</label>
                                            </p>
                                        </dd>
                                    </dl>

                                    <p>* 사전등록을 위한 절차입니다. <span class="fcPoint fwBold">아래 정보</span>를 입력해 주시기 바랍니다.</p>
                                    <p>
                                        <font color="red">* 표시된 부분은 필수 입력 사항입니다.</font>
                                    </p>
                                    <div class="tab_area">
                                        <div class="tab_inner" style="margin-top: 20px;">
                                            <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                                                <li><a href="#tab2">대한심뇌혈관질환 예방학회 회원여부</a></li>
                                            </ul>
                                            <section id="second-tab-group" class="tabgroup">
                                                <div id="tab3">
                                                    <dt class="hidden">대한심뇌혈관질환 예방학회 회원여부</dt>
                                                    <dd class="radio_area" id="rb3">
                                                        <label><input type="radio" name="type3" value="회원" disabled />
                                                            회원</label>
                                                        <label><input type="radio" name="type3" id="nonmember"
                                                                value="비회원" disabled /> 비회원</label>
                                                    </dd>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div align=center>
                                        <p id="download-notice" style="display: none;">
                                            * 비회원일경우 사전등록 진행시 회원 가입을 함께 진행하시는 경우 회원가입비 면제혜택을 드립니다.<br>
                                            <font color="red"><a href="/assets/download/regist_form.hwp">입회원서 다운로드</a>
                                            </font>
                                        </p>
                                    </div>
                                    <div class="tab_area">
                                        <div class="tab_inner">
                                            <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                                                <li><a href="#tab1" class="active">구분 1</a></li>
                                            </ul>
                                            <section id="second-tab-group" class="tabgroup">
                                                <div id="tab1">
                                                    <dt class="hidden">타입선택</dt>
                                                    <dd class="radio_area" id="rb2">
                                                        <label><input type="radio" name="type" value="일반참가자" disabled />
                                                            일반참가자</label>
                                                        <label><input type="radio" name="type" value="좌장" disabled />
                                                            좌장</label>
                                                        <label><input type="radio" name="type" value="연자" disabled />
                                                            연자</label>
                                                        <label><input type="radio" name="type" value="패널" disabled />
                                                            패널</label>
                                                        <label><input type="radio" name="type" value="임원" disabled />
                                                            임원</label>
                                                        <label><input type="radio" name="type" value="후원사" disabled />
                                                            후원사</label>
                                                    </dd>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="tab_area">
                                        <div class="tab_inner" style="margin-top: 20px;">
                                            <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                                                <li><a href="#tab2">구분 2</a></li>
                                            </ul>
                                            <section id="second-tab-group" class="tabgroup">
                                                <div id="tab2">
                                                    <dt class="hidden">타입선택</dt>
                                                    <dd class="radio_area" id="rb1">
                                                        <label><input type="radio" name="type2" value="개원의" disabled />
                                                            개원의</label>
                                                        <label><input type="radio" name="type2" value="봉직의" disabled />
                                                            봉직의</label>
                                                        <label><input type="radio" name="type2" value="전문의" disabled />
                                                            전문의</label>
                                                        <label><input type="radio" name="type2" value="교수" disabled />
                                                            교수</label>
                                                        <label><input type="radio" name="type2" value="전공의" disabled />
                                                            전공의</label>
                                                        <label><input type="radio" name="type2" value="군의관" disabled />
                                                            군의관</label>
                                                        <label><input type="radio" name="type2" value="간호사" disabled />
                                                            간호사</label>
                                                        <label><input type="radio" name="type2" value="약사" disabled />
                                                            약사</label>
                                                        <label><input type="radio" name="type2" value="운동처방사"
                                                                disabled /> 운동처방사</label>
                                                        <label><input type="radio" name="type2" value="영양사" disabled />
                                                            영양사</label>
                                                        <label><input type="radio" name="type2" value="연구원" disabled />
                                                            연구원</label>
                                                        <label><input type="radio" name="type2" value="학생" disabled />
                                                            학생</label>
                                                        <label><input type="radio" name="type2" value="기타" disabled />
                                                            기타</label>
                                                    </dd>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <dl>
                                        <dt class="hidden">성명</dt>
                                        <dd><input type="text" name="name" id="name" class="_placeholder"
                                                placeholder="*성명" disabled></dd>

                                        <dt class="hidden">면허번호</dt>
                                        <dd><input type="text" name="license" id="license" class="_placeholder"
                                                placeholder="면허번호" disabled></dd>

                                        <dt class="hidden">소속</dt>
                                        <dd><input type="text" name="org" id="org" class="_placeholder"
                                                placeholder="*소속" disabled></dd>

                                        <dt class="hidden">연락처</dt>
                                        <dd><input type="tel" name="phone" id="phone" class="_placeholder"
                                                placeholder="*연락처 ('-'를 제외한 숫자만 입력하세요)" disabled></dd>

                                        <dt class="hidden">이메일</dt>
                                        <dd><input type="text" name="email" id="email" class="_placeholder"
                                                placeholder="*이메일주소" disabled></dd>

                                        <dt class="hidden">입금예정일</dt>
                                        <dd><input type="text" name="deposit_date" id="deposit_date"
                                                class="_placeholder" placeholder="입금예정일 (무통장 입금시 필수입력)" disabled></dd>

                                        <dt class="hidden">입금자명</dt>
                                        <dd><input type="text" name="deposit_name" id="deposit_name"
                                                class="_placeholder" placeholder="입금자명 (무통장 입금시 필수입력)" disabled></dd>
                                        <dt class="hidden">주소</dt>
                                        <dd class="btn" id="addr"><input class="btnOrange" type="button" id="addrbutton"
                                                onclick="execDaumPostcode()" value="주소찾기"></dd>
                                        <dd><input type="text" name="postcode" id="postcode" placeholder="*우편번호"
                                                readonly disabled></dd>
                                        <dd><input type="text" name="address" id="address" placeholder="*주소" readonly
                                                disabled></dd>
                                        <dd><input type="text" name="detailAddress" id="detailAddress"
                                                placeholder="*상세주소" disabled></dd>
                                        <dd style="display:none;"><input type="text" name="extraAddress"
                                                id="extraAddress" placeholder="참고항목" readonly disabled></dd>
                                    </dl>

                                    <div class="btn btnArr">
                                        <input type="submit" value="확인" class="btnPoint">
                                        <input type="reset" value="취소" class="btnDef">
                                    </div>

                                </div>
                                <!-- //bdArea -->

                            </fieldset>
                            </form>

                        </div>
                        <?php
                        } else {
                        ?>
                        <div class="txtCon regist">
                            <div class="registSearch"
                                style="height:300px;display:flex;justify-content:center;align-items:center">
                                <h1>사전등록이 마감되었습니다.</h1>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </dl>
                </div>
            </div>
        </div>
        <!-- //contents -->

    </div>
    <!-- //container -->
    <script>
//        $(".tabgroup > div").hide();
//        $(".tabgroup > div:first-of-type").show();
//        $(".tabs a").click(function (e) {
//          e.preventDefault();
//          var $this = $(this),
//            tabgroup = "#" + $this.parents(".tabs").data("tabgroup"),
//            others = $this.closest("li").siblings().children("a"),
//            target = $this.attr("href");
//          others.removeClass("active");
//          $this.addClass("active");
//          $(tabgroup).children("div").hide();
//          $(target).show();
//        });

$('#phone').bind('keyup', function(event) {
    var regNumber = /^[0-9]*$/;
    var temp = $('#phone').val();
    if (!regNumber.test(temp)) {
        alert('숫자만 입력하세요!');
        $('#phone').val(temp.replace(/[^0-9]/g, ''));
    }
})

$(function() {
    $("#deposit_date").datepicker({
        inline: true,
        showOtherMonths: true,
        showMonthAfterYear: true,
        monthNames: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토']
    });

});

$(document).ready(function() {
    //            $('#rb2 input[type=radio]:first-child').prop('checked',true);
    //            $('#rb1 input[type=radio]:first-child').prop('checked',true);
    //            $('#rb3 input[type=radio]:first-child').prop('checked',true);
    //            $('#name').val('김한솔test');
    //            $('#license').val('12345');
    //            $('#org').val('인투온');
    //            $('#phone').val('01026232514');
    //            $('#email').val('hansol.kim@into-on.com');
    //            $('#deposit_date').val('2022-04-23');
    //            $('#deposit_name').val('김한솔');
    //            $('#postcode').val('00000');
    //            $('#address').val('백범로 341');
    //            $('#detailAddress').val('리첸시아');
})
    </script>