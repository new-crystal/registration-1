<!-- <script src="https://cdn.tailwindcss.com"></script> -->
<style>
input[type=text] {
    border: 1px solid #ddd;
    padding: 4px 16px;
    width: 94%;
    font-weight: 600;
}

input[type=radio] {
    width: 15px;
    height: 15px;
    margin-right: 10px;
    transform: translateY(1px);
}

input[type=checkbox] {
    width: 18px;
    height: 18px;
    margin-right: 10px;
    transform: translateY(3px);
}

label {
    font-size: 1rem;
}

th {
    background-color: rgb(186 230 253);
    /* color: #fff; */
    padding: 1rem;
    text-align: center;
    font-size: 1rem;
}

td {
    padding: 1rem;
    height: 100%;
    font-weight: 600;
}

tr {
    border: 1px solid #7d8597;
}

span {
    color: #c1121f;
    font-weight: 600;
}
</style>
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

                                <div id="form" class="txtCon regist registration_form">
                                    <div class="registration_agree_container">
                                        <div>
                                            선생님의 개인 정보는 2023년 대한심뇌혈관질환예방학회 개원의 연수강좌에 대한 학술대회 활동 수행을 위한 목적으로만 활용됩니다.
                                            선생님의 개인 정보는 행사 진행 기간 동안 보유되며, 수집된 개인 정보는 암호화되어 처리 됩니다.
                                            선생님께서는 언제든지 제공한 개인 정보의 수집 및 이용에 대해 중지를 요청하실 수 있습니다.
                                        </div>
                                        <div class="registration_agree_checkbox">
                                            <input type="checkbox" id="agree" />
                                            <label for="agree">동의합니다</label>
                                        </div>
                                    </div>
                                    <div class="table_container">
                                        <!-- <h3 style="font-weight: 900;">온라인 사전 등록</h3> -->
                                        <table>
                                            <colgroup>
                                                <col width="30%">
                                                <col width="*">
                                            </colgroup>
                                            <tr>
                                                <th style="font-weight: 600;">
                                                    대한심뇌혈관질환 예방학회 <br>회원여부<span class="hit">*</span>
                                                </th>
                                                <td class="table_flex_td">
                                                    <div>
                                                        <input type="radio" id="member-y" />
                                                        <label for="member-y">회원</label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" id="member-n" />
                                                        <label for="member-n">비회원</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: 600;">
                                                    참석유형
                                                    <span class="hit">*</span>
                                                </th>
                                                <td>
                                                    <div class="table_select_box">
                                                        <!-- <input type="text" id="Participation" maxlength="64" value="" class="w-11/12"> -->
                                                        <select id="participation">
                                                            <option value="" selected="selected">*필수 선택사항</option>
                                                            <option value="Paticipants">일반참가자</option>
                                                            <option value="Chairperson">좌장</option>
                                                            <option value="Speaker">연자</option>
                                                            <option value="Panel">패널</option>
                                                            <option value="Committee">임원</option>
                                                            <option value="sponsor">후원사</option>
                                                        </select>
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: 600;">참석자 구분<span class="hit">*</span></th>
                                                <td>
                                                    <div class="table_select_box">
                                                        <select id="category" class="px-2 py-1 w-full h-10 border">
                                                            <option value="" selected="selected">*필수 선택사항</option>
                                                            <option value="개원의">개원의</option>
                                                            <option value="봉직의">봉직의</option>
                                                            <option value="전문의">전문의</option>
                                                            <option value="교수">교수</option>
                                                            <option value="전공의">전공의</option>
                                                            <option value="군의관">군의관</option>
                                                            <option value="간호사">간호사</option>
                                                            <option value="약사"> 약사</option>
                                                            <option value="운동처방사">운동처방사</option>
                                                            <option value="영양사">영양사</option>
                                                            <option value="연구원">연구원</option>
                                                            <option value="학생">학생</option>
                                                            <option value="기타">기타</option>
                                                            <input type="text" id="category_others"
                                                                style="display: none;" />
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: 600;">
                                                    성명
                                                    <span class="hit">*</span>
                                                </th>
                                                <td>
                                                    <input type="text" id="userName" name="name" placeholder="*성명" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: 600;">
                                                    면허번호
                                                </th>
                                                <td>
                                                    <input type="text" id="number" name="number" placeholder="면허번호" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: 600;">
                                                    소속
                                                    <span class="hit">*</span>
                                                </th>
                                                <td>
                                                    <input type="text" id="affiliation" name="affiliation"
                                                        placeholder="*소속" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: 600;">
                                                    연락처
                                                    <span class="hit">*</span>
                                                </th>
                                                <td>
                                                    <input type="text" id="phone" name="phone"
                                                        placeholder="*연락처('-'를 제외한 숫자만 입력하세요)" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: 600;">
                                                    이메일주소
                                                    <span class="hit">*</span>
                                                </th>
                                                <td>
                                                    <input type="text" id="email" name="email" placeholder="*이메일주소" />
                                                    <p class="email_msg" style="color: red;"></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: 600;">
                                                    입금예정일
                                                </th>
                                                <td>
                                                    <input type="text" id="deposit-date" name="deposit-date"
                                                        placeholder="무통장 입금시 필수 입력" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: 600;">
                                                    입금자명
                                                </th>
                                                <td>
                                                    <input type="text" id="deposit-name" name="deposit-name"
                                                        placeholder="무통장 입금시 필수 입력" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: 600;">
                                                    주소
                                                    <span class="hit">*</span>
                                                </th>
                                                <td class="address_box">
                                                    <input type="text" id="sample6_postcode" placeholder="*우편번호"
                                                        onclick="sample6_execDaumPostcode()">
                                                    <input type="text" id="sample6_address" placeholder="*주소"><br>
                                                    <input type="text" id="sample6_detailAddress" placeholder="*상세주소">
                                                    <input type="text" id="sample6_extraAddress" placeholder="*참고항목">
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="button_box">
                                            <button type="button" onclick="onSubmit()"
                                                class="confirm_button">확인</button>
                                            <button type="button" class="cancel_button">취소</button>
                                        </div>
                                    </div>
                                    </ㅇ>

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
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
function sample6_execDaumPostcode() {
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
                    extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                if (extraAddr !== '') {
                    extraAddr = ' (' + extraAddr + ')';
                }
                // 조합된 참고항목을 해당 필드에 넣는다.
                document.getElementById("sample6_extraAddress").value = extraAddr;

            } else {
                document.getElementById("sample6_extraAddress").value = '';
            }

            // 우편번호와 주소 정보를 해당 필드에 넣는다.
            document.getElementById('sample6_postcode').value = data.zonecode;
            document.getElementById("sample6_address").value = addr;
            // 커서를 상세주소 필드로 이동한다.
            document.getElementById("sample6_detailAddress").focus();
        }
    }).open();
}
</script>
<script>
const agree = document.querySelector("#agree")

const member = document.querySelector("#member-y");
const nonMember = document.querySelector("#member-n");

const participation = document.querySelector("#participation")

const category = document.querySelector("#category")

const name = document.querySelector("#userName")

const number = document.querySelector("#number")

const affiliation = document.querySelector("#affiliation")

const phone = document.querySelector("#phone")

const depositDate = document.querySelector("#deposit-date")
const depositName = document.querySelector("#deposit-name")

const email = document.querySelector("#email")
const emailmsg = document.querySelector(".email_msg")

const postcode = document.querySelector("#sample6_postcode")
const address = document.querySelector("#sample6_address")
const detailAddress = document.querySelector("#sample6_detailAddress")
const extraAddress = document.querySelector("#sample6_extraAddress")

const form = document.querySelector("#form")

/**휴대폰 유효성 검사 */
phone.addEventListener('input', (event) => {
    const inputValue = event.target.value;
    const onlyNumbers = /^[0-9]+$/;

    if (!onlyNumbers.test(inputValue)) {
        event.target.value = inputValue.replace(/\D/g, '');
    }
});

member.addEventListener("click", () => {
    if (member.checked) {
        nonMember.checked = false;
    } else {
        member.checked = true;
    }
})

nonMember.addEventListener("click", () => {
    if (nonMember.checked) {
        member.checked = false;
    } else {
        nonMember.checked = true;
    }
})

email.addEventListener("input", () => {
    onClickEmail()
})

phone.addEventListener("input", () => {
    onCheckPhone()
})

function onSubmit() {
    if (!agree.checked) {
        alert("이용약관에 동의해주세요.")
        agree.focus()
        return;
    }
    if (!member.checked && !nonMember.checked) {
        alert("회원여부에 체크해주세요.")
        member.focus()
        return;
    }
    if (!participation.options[participation.selectedIndex].value) {
        alert("참석 유형을 선택해주세요.")
        participation.focus()
        return;
    }
    if (!category.options[category.selectedIndex].value) {
        alert("참석자 구분을 선택해주세요.")
        category.focus()
        return;
    }
    if (!name.value) {
        alert("성명을 입력해주세요.")
        name.focus()
        return;
    }
    if (!affiliation.value) {
        alert("소속을 입력해주세요.")
        affiliation.focus()
        return;
    }
    if (!phone.value) {
        alert("연락처를 입력해주세요.")
        phone.focus()
        return;
    }
    const phoneValue = phone.value;
    const phoneRegex = /^\d{10}$/;

    if (!phoneRegex.test(phoneValue)) {
        alert("연락처를 형식에 맞게 입력해주세요");
        phone.focus();
        return;
    }

    if (!email.value) {
        alert("이메일 주소를 입력해주세요.")
        email.focus();
        return;
    }
    const inputValue = email.value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(inputValue)) {
        alert("이메일 형식에 맞게 입력해주세요.")
        email.focus();
        return;
    }

    if (!detailAddress.value) {
        alert("상세 주소를 입력해주세요.")
        postcode.focus();
        return;
    }

    console.log("member", member.checked);
    console.log("participation", participation.options[participation.selectedIndex].value)
    console.log("category", category.options[category.selectedIndex].value)
    console.log("name", name.value)
    console.log("number", number.value)
    console.log("affiliation", affiliation.value)
    console.log("phone", phone.value)
    console.log("email", email.value)
    console.log("입금예정일", depositDate.value)
    console.log("입금자명", depositName.value)
    console.log("주소", postcode.value, address.value, detailAddress.value, extraAddress.value)
}

function onClickEmail() {
    const inputValue = email.value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(inputValue)) {
        emailmsg.innerText = "이메일 형식을 확인해주세요."
        return;
    }
    if (emailRegex.test(inputValue)) {
        emailmsg.innerText = "";
        return;
    }
}

function onCheckPhone() {
    const phoneValue = phone.value;
    const phoneRegex = /^\d{10}$/;

    if (!phoneRegex.test(phoneValue)) {
        alert("연락처를 형식에 맞게 입력해주세요");
        phone.focus();
        return;
    }
}
</script>