<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
<style>
       #on-site *{
            font-family: "Nanum Gothic", sans-serif;
        }

        input[type=text] {
            border: 1px solid #ddd;
            padding: 8px 16px;
            height: 2.5rem;
            /* width: 300px; */
        }

        input[type=checkbox] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            transform: translateY(2.5px);
        }

        input[type=radio] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            transform: translateY(2.5px);
        }

        span {
            color: #c1121f;
            font-weight: 600;
        }

        label {
            font-weight: 600;
            font-size: 1rem;
            margin-right: 1rem;
        }

        textarea {
            height: 150px;
            background-color: #fff;
        }

        table {
            border-collapse: collapse;
        }

        p {
            margin: 0;
        }


        .tbl_type01 {
            border: 1px solid #7d8597;
            border-top: 2px solid #7d8597;
            text-align: center;
            border-collapse: collapse;
        }

        .tbl_type01 th,
        .tbl_type01 td {
            border: 1px solid #7d8597;
            font-size: 1rem;
            font-weight: 600;
        }

        .tbl_type01 th,
        .tbl_type01 td {
            border: 1px solid #000;
        }

        th {
            height: 50px;
            background-color: #ffe06e;
            text-align: center;
        }

        .container {
            width: 1300px;
            padding: 0;
            margin: 20px auto;
        }

        .confirm_box {
            width: 100%;
            height: 200px;
            text-align: center;
            border: 1px solid #eee;
        }

        .confirm_box_title {
            text-align: center;
            background-color: rgb(186 230 253);
        }

        .all_checkbox {
            display: flex;
            width: 100%;
            height: 100px;
            align-items: center;
            justify-content: center;
        }

        .personal_checkbox {
            display: flex;
            flex-direction: column;
            margin-bottom: 50px;
        }

        .personal_checkbox>div {
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: left;
        }

        .next_btn_box,
        .final_btn_box {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .next_btn_box>button,
        .final_btn {
            width: 30%;
            height: 50px;
            font-size: 24px;
            border: 1px solid #7d8597;
            margin: 20px;
        }

        .full_input {
            width: 70%;
        }

        .tbl_type01 td {
            padding: 16px;
            text-align: left;
        }

        .category {
            height: 80px;
        }

        .select_category {
            width: 95%;
            height: 40px;
            border: 1px solid #ddd;
        }

        .member {
            height: 40px;
            display: flex;
            align-items: center;
        }

        .submit_btn {
            width: 150px;
            height: 50px;
            background-color: #e1e1e1;
        }
        .term_wrap {
            width:90%;
            margin: 50px auto 30px auto;
        }

        .term_wrap .term_box{
            max-height: 200px;
            overflow-y: scroll;
            border: 1px solid #c6c4c4;
            padding: 20px;
            margin-bottom: 10px;
        }
        .term_wrap .title{
            font-weight: bold;
            font-size: 20px;
        }
        .term_label{
            float:right
        }
</style>
<script src="https://cdn.tailwindcss.com"></script>
<form action="/onSite" class="w-3/5 mx-auto" id="on-site">
    <!-- <img src="./mail_header.png" alt="header" class="w-full h-96" /> -->
    <div class="wrap_1">
        
        <div
            class="flex justify-center items-center text-white w-6/12 h-12 bg-sky-900 mx-auto mt-5 rounded-lg font-bold text-xl">
            <h1>On-site registration(현장 등록)</h1>
        </div>

        <div class="term_wrap">
                <h3 class="title mb-2">개인정보 수집 및 이용에 관한 안내</h3>
                <div class="term_box">
                    <h6>선생님의 개인 정보는 2024 MRONJ Expert Meeting & Symposium에 대한 학술대회 활동 수행을 위한 목적으로만 활용됩니다.</h6>
                    <h6>선생님의 개인 정보는 행사 진행 기간 동안 보유되며, 수집된 개인 정보는 암호화되어 처리 됩니다.</h6>
                    <h6>선생님께서는 언제든지 제공한 개인 정보의 수집 및 이용에 대해 중지를 요청하실 수 있습니다.</h6>
                </div>
                <div class="term_label flex items-center justify-end mb-10">
                    <label for="terms1" id="terms"><input type="checkbox" class="checkbox input required" data-name="terms 1" id="terms1" name="terms1" value="Y">개인정보 수집 및 이용에 동의합니다. </label>
                </div>	
            </div>
        <div class="mt-10">
            <table class="tbl_type01 w-full">
                <colgroup>
                    <col width="20%">
                    <col width="*">
                </colgroup>
                <tr>
                    <th>성명<span class="hit">*</span></th>
                    <td>
                        <div class="w-1/2 flex flex-col">
                            <input id="koreanName" name="nick_name" id="koreanName" placeholder="국문 이름" type="text"
                                class="w-full">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>
                    면허번호
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <div class="flex items-center w-6/12 justify-left flex-wrap">
                            <input name="sn" id="doctor" class="w-full" type="text" placeholder="의사면허번호"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>
                        소속
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <input type="text" id="affiliation" name="org" class="w-6/12" />
                    </td>
                </tr>
                <tr>
                    <th>
                        연락처
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <div class="flex w-6/12">
                            <input type="text" id="phoneNumber" name="phone2" class="w-full" placeholder="'-'를 제외한 숫자만 입력하세요"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>
                        이메일
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <div class="flex items-center w-6/12 justify-between">
                            <input type="text" name="email1" id="Email1" maxlength="64" value="" class="w-full">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>계좌이체시 <br/>입금자명 <span class="hit">*</span></th>
                    <td>
                        <div class="flex items-center w-6/12 justify-between">
                            <input type="text" name="bank" id="bank" maxlength="64" value="" class="w-full">
                        </div>
                    </td>
                </tr>
                <!-- <tr>
                    <th>주소 <span class="hit">*</span></th>
                    <td>
                        <div>
                        <a href="#" onclick="sample6_execDaumPostcode()" class="bg-sky-900 text-white px-3 py-2 hover:underline underline-offset-4">우편번호 찾기</a>
                            <input type="text" class="w-2/5 mb-2 mr-2 p-2" name="office_zip" id="office_zip" value="" autocomplete='off' placeholder="우편번호" />
                           
                            <div>
                                <input type="text" class="w-2/5 mt-2 mr-2 p-2" name="office_addr" id="office_addr" value="" class="clear" autocomplete='off' placeholder="주소" />
                                <input type="text" class="p-2 w-4/12" name="office_addr_etc" id="office_addr_etc" value="" placeholder="상세주소" autocomplete='off'/>
                            </div>
                        </div>
                    </td>
                </tr> -->
                <tr>
                    <th>식권 구매 <span class="hit">*</span></th>
                    <td>
                        <label>
                            <input name="type3" type="radio" value="구매" onclick="cal_fee()" id="type3_y"/>
                            구매(5000원)
                        </label>
                        <label>
                            <input name="type3" type="radio" value="비구매" onclick="cal_fee()" id="type3_n"/>
                            비구매
                        </label>
                        <p class="mt-4"><span class="hit">*</span>식권은 구매하신 분에 한에 제공됩니다.(1만원 상당)</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        구분 1
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <div class="flex w-6/12 justify-between items-center">
                            <!-- <input type="text" id="Participation" maxlength="64" value="" class="w-11/12"> -->
                            <select id="Participation_1" style="background-color:#ffffff;" class="px-2 py-1 w-full h-10 border"
                                name="type1">
                                <option value="" selected="selected">선택사항</option>
                                <option value="일반참가자">일반참가자</option>
                                <option value="연자">연자</option>
                                <option value="좌장">좌장</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>구분 2
                        <span class="hit">*</span>
                    </th>

                    <td>
                        <div class="flex w-6/12 justify-between items-center">
                            <!-- <input type="text" id="Category" maxlength="64" value="" class="w-11/12"> -->
                            <select id="Category_1" style="background-color:#ffffff;" class="px-2 py-1 w-full h-10 border"
                                name="type2" onchange="cal_fee()">
                                <option value="" selected="selected">선택사항</option>
                                <option value="치과의사">치과의사</option>
                                <option value="의사">의사</option>
                                <option value="전공의">전공의</option>
                                <option value="학생">학생</option>
                                <option value="군인">군인</option>
                                <option value="공보의">공보의</option>
                                <option value="후원사"> 후원사</option>
                                <option value="기타">기타</option>
                                <input type="text" id="category_others" style="display: none;" />
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>등록비</th>
                    <td>
                        <div class="fee" id="fee">0</div>
                    </td>
                </tr>
                
            </table>

            <div class="flex items-center justify-center">
                <button id="Submit" type="button"
                    class="w-60 h-15 bg-sky-900 text-white p-3 my-5 text-lg">등록</button>
            </div>
        </div>
    </div>

    <!-- ==================================================================== -->
</form>

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
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    document.getElementById("office_addr_etc").value = extraAddr;
                
                } else {
                    document.getElementById("office_addr_etc").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('office_zip').value = data.zonecode;
                document.getElementById("office_addr").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("office_addr_etc").focus();
            }
        }).open();
    }
</script>
<script>
const wrap_1 = document.querySelector(".wrap_1")

const KoreanName = document.querySelector("#koreanName");

const affilation = document.querySelector("#affiliation");

const phone = document.querySelector("#phoneNumber")

const email = document.querySelector("#Email1")

const participationSelect = document.querySelector("#Participation_1")

const categorySelect = document.querySelector("#Category_1")
const categoryOthers = document.querySelector("#category_others")

const doctor = document.querySelector("#doctor");
const specialist = document.querySelector("#specialist")

const submitButton = document.querySelector("#Submit")

// /**한국어 유효성 검사 */
KoreanName.addEventListener('input', (event) => {
    const inputValue = event.target.value;
    const onlyHangul = /^[ㄱ-ㅎㅏ-ㅣ가-힣]+$/;

    if (!onlyHangul.test(inputValue)) {
        event.target.value = inputValue.replace(/[^\uAC00-\uD7AF\u1100-\u11FF\u3130-\u318F]+/g, '');
    }
});

/**휴대폰 유효성 검사 */
phone.addEventListener('input', (event) => {
    const inputValue = event.target.value;
    const onlyNumbers = /^[0-9]+$/;

    if (!onlyNumbers.test(inputValue)) {
        event.target.value = inputValue.replace(/\D/g, '');
    }
});

categorySelect.addEventListener("click", () => {
    const categoryValue = categorySelect.options[categorySelect.selectedIndex].value;
    if (categoryValue === "기타") {
        categoryOthers.style.display = "";
    } else {
        categoryOthers.style.display = "none";
    }
})

function cal_fee(){
    const category = categorySelect.options[categorySelect.selectedIndex].value;
    const feeBox = document.querySelector("#fee");
    const type3_y = document.querySelector("#type3_y");
    const type3_n = document.querySelector("#type3_n");

    if(type3_y.checked){
        if(category == "치과의사" || category == "의사"){
        feeBox.innerHTML = 45000
        }else if(category == "전공의" || category == "학생" || category == "군인" || category == "공보의" || category == "기타" || category == "후원사"){
            feeBox.innerHTML = 35000
        }
    }else if (type3_n.checked){
        if(category == "치과의사" || category == "의사"){
        feeBox.innerHTML = 40000
        }else if(category == "전공의" || category == "학생" || category == "군인" || category == "공보의" || category == "기타" || category == "후원사"){
            feeBox.innerHTML = 30000
        }
    }
  
}

submitButton.addEventListener("click", (e) => {
    onSubmit(e)
})

function onSubmit(e) {
    // e.preventDefault()
    if (!KoreanName.value) {
        alert("성함을 확인해주세요");
        firstName.focus()
        return;
    }
    if (!affilation.value) {
        alert("소속을 확인해주세요.");
        affilation.focus()
        return;
    }
    if (!phone.value) {
        alert("연락처를 확인해주세요");
        phone.focus()
        return;
    }
    if (!email.value) {
        alert("이메일을 확인해주세요");
        email.focus()
        return;
    }
    if (!participationSelect.options[participationSelect.selectedIndex].value) {
        alert("참가 유형을 확인해주세요.");
        participationSelect.focus()
        return;
    }
    if (!categorySelect.options[categorySelect.selectedIndex].value) {
        alert("참석유형을 확인해주세요.");
        categorySelect.focus()
        return;
    }
    if (categorySelect.options[categorySelect.selectedIndex].value === "Others" && !categoryOthers.value) {
        alert("참석유형을 확인해주세요.");
        categoryOthers.focus()
        return;
    }

    // const isAnyCheckboxChecked = Array.from(checkboxes).some((checkbox) => checkbox.checked);
    onClickSubmit()
}

function onClickSubmit() {

    const url = "/onSite/mobile";
    const data = {
        nick_name: KoreanName.value,
        ln: doctor.value,
        org: affilation.value,
        phone: phone.value,
        email: email.value,
        bank : bank.vlaue,
        type1: participationSelect.options[participationSelect.selectedIndex].value,
        type2: categorySelect.options[categorySelect.selectedIndex].value,
        type3: $("input[name='type3']:checked").val(),
        fee : document.querySelector("#fee").innerText
    };

    $.ajax({
		type: "POST",
		url : url,
		data: data,
		success: function(result){
            console.log(result)
            //window.location.href = `onsite/success?fee=${data.fee}`;
        },
		error:function(e){  
            console.log(e)
            alert("현장등록 이슈가 발생했습니다. 관리자에게 문의해주세요.")
		}
	})  

    window.location.href = "/onsite/success";
}
</script>