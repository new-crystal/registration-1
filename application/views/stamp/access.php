<script src="https://cdn.tailwindcss.com"></script>
<script type="text/javascript" src="/assets/js/admin/lecture_history.js"></script>
<style>
    .qr-info-table {
        margin-top: 1rem;
        border: 2px solid #eee;
        border-collapse: collapse;
        width: 40%;
    }

    .qr-info-table th {
        background-color: #1d3557;
        border-color: #1d3557;
        color: #fff !important;
        font-size: 1.7rem;
        line-height: 2.5rem;
        font-weight: 600;
    }

    .qr-info-table>tr,
    .qr-info-table th {
        border: 2px solid #eee;
        text-align: center;
        font-size: 1.25rem;
        line-height: 2.5rem;
    }

    .qr-info-table td {
        border: 1px solid #eee;
        text-align: left;
        font-size: 1.5rem;
        line-height: 2.5rem;
        padding-left: 4rem;
        /* display: flex; */
        align-items: center;
        /* height: 4rem; */
        font-weight: bold;
    }

    .qr-info-table tr {
        height: 4rem;
        padding: 4px;
    }

    #open {
        background-color: #1d3557;
        float: right;
    }

    .notice {
        width: 500px;
        padding: 4px;
        background-color: #ffbe0b;
    }

    .memoHeader {
        background-color: #fb8500 !important;
    }

    .event1.Y{
        background-color: rgb(252 211 77);
    }

    .event2.Y{
        background-color: rgb(196 181 253);
    }
    .gift_box{
        position: absolute;
        top:32px;
        left: 40px;
        font-size: 24px;
        font-weight: 700;
    }
</style>
<?php

$qrcode = $_GET["qrcode"] ?? "";

//sujeong - 남은 선물 개수 
$total_gift_count = 350;

$gift_count = $gift_user;
// $gift_count = count($gift_user);

$remain_count = $total_gift_count - $gift_count;
?>

<div class="page-container">
    <div class="page-content">

        <div class="content">
            <div class="panel panel-flat">
                <div class="gift_box">나간 선물 수: <?php echo $gift_count; ?></div>
                <form action="/event/access" id="qr_form" name="qr_form" class="w-full h-[88vh] flex flex-col items-center justify-center bg-slate-50">

                    <div class="w-2/5 flex flex-col items-center justify-center">
                        <h1 class="text-5xl mt-32 font-semibold ">QR CODE 입력 </h1>
                        <div class="w-[850px] flex justify-between">
                            <input id="qrcode_input" name="qrcode" class="w-[400px] h-[50px] mt-20 p-3 " type="text" autofocus placeholder="상품 수령 버튼 눌러주세요~!!" />
                            <button class="w-[150px] h-[40px] bg-slate-300 mt-20 mb-20 hover:bg-slate-400 active:bg-slate-500 text-black" type="submit" id="submit">등록</button>
                            <button class="w-[150px] h-[40px] bg-indigo-950 mt-20 mb-20 hover:bg-slate-300 active:bg-slate-300 text-white" type="button" id="memo_btn">메모</button>
                        </div>
                    </div>

                    <!-- <div class="w-3/5 h-[1px] bg-slate-400 translate-y-24"></div> -->
                    <div class="w-full h-full bg-white flex flex-col items-left justify-around">
                        <div class="flex h-[80%] flex-col items-center justify-around">
                            <table class="qr-info-table w-2/5" id="qrTable">
                                <colgroup>
                                    <col width="30%" />
                                    <col />
                                </colgroup>
                                <tr>
                                    <th>QR CODE</th>
                                    <td id="" class="qr_text">
                                        <?php echo isset($qrcode) ? $qrcode : ''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>event 1(스탬프)수령 유무</th>
                                    <td id="event_1" class="qr_text">
                                        <?php echo isset($user['event1']) ? $user['event1'] : ''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>event 1 상품수령시간</th>
                                    <td id="event_1_time" class="qr_text">
                                        <?php echo isset($user['event1_time']) ? $user['event1_time'] : ''; ?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <th>event 2(포스터) 수령 유무</th>
                                    <td id="event_2" class="qr_text">
                                        <?php echo isset($user['event2']) ? $user['event2'] : ''; ?>
                                    </td>
                                </tr> -->
                                <tr>
                                    <th>성함</th>
                                    <td id="en_name" class="qr_text">
                                        <?php echo isset($user['nick_name']) ? $user['nick_name'] : ''; ?>
                                    </td>
                                </tr>
            
                                <tr>
                                    <th>소속</th>
                                    <td id="org" class="qr_text">
                                        <?php if (isset($user['org'])) echo $user['org']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>참석 구분</th>
                                    <td id="attendance_type" class="qr_text">
                                        <?php if (isset($user['attendance_type'])) echo $user['attendance_type']; ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>Event Memo</th>
                                    <td id="event_memo" class="qr_text">
                                        <?php if (isset($user['event_memo'])) echo $user['event_memo']; ?>
                                    </td>
                                </tr>
                            </table>

                        <div class="w-[550px] flex items-center justify-around *:w-[250px] *:h-[50px] *:border">
                            <button class="hover:bg-amber-300 event_btn event1 <?php echo $user['event1']; ?>" type="button" data-id="1">Event 1 (스탬프) 상품 수령</button>
                            <!-- <button class="hover:bg-violet-300 event_btn event2 <?php echo $user['event2']; ?>" type="button" data-id="2">Event 2 (포스터)  상품 수령 완료</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="footer text-muted mt-20">
    © 2023. <a href="#">온라인 학술대회</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">(주)인투온</a>
</div> -->

</div>
<!-- /page content -->

</div>

<script>

    const eventBtnList = document.querySelectorAll('.event_btn');
    const memo_btn = document.querySelector('#memo_btn');

    const event_1 = document.querySelector('#event_1');
    //const event_2 = document.querySelector('#event_2');

    const content = document.querySelector(".content")
    const qrForm = document.querySelector("#qr_form");
    const qrcode = document.querySelector("#qrcode_input");
    let qrvalue = "";
    
    content.addEventListener("click", () => {
        qrcode.focus();
    })

    qrcode.focus();

    qrForm.addEventListener("submit", (e) => {
        e.preventDefault();
        convertToEnglish();
        qrvalue = qrcode.value
        qrvalue = qrcode.value.replace(/\s/g, "");
        //qrcode.value = "";
        window.location.href=`/event/access?qrcode=${qrvalue}`;
        qrcode.focus();
    })

    function yellowBackground(target){
        target.classList.add("bg-amber-300");
    }

    function violetBackground(target){
        target.classList.add("bg-violet-300");
    }

    eventBtnList.forEach((btn)=>{
        btn.addEventListener("click", (e)=>{
            console.log(e.target.classList)
            if(window.location.search !== "" && !e.target.classList.contains("Y")){
                if(window.confirm(`event ${e.target.dataset.id} 상품 수령을 완료로 변경하시겠습니까`)){
                    window.location.href = `/event/update_gift?num=${e.target.dataset.id}&qrcode=${window.location.search.split("=")[1]}&status=Y`;
                }
            }
            //sujeong / 상품 수령 주석
            else if(window.location.search !== "" && e.target.classList.contains("Y")){
               alert('상품을 이미 수령했습니다.')
            }
            // else if(window.location.search !== "" && e.target.classList.contains("Y")){
            //     if(window.confirm(`event ${e.target.dataset.id} 상품 수령을 취소로 변경하시겠습니까`)){
            //         window.location.href = `/event/update_gift?num=${e.target.dataset.id}&qrcode=${window.location.search.split("=")[1]}&status=N`;
            //     }
            // }
            else if(window.location.search == ""){
                alert('QR 코드를 입력해주세요!')
            }
        })
    })

    memo_btn.addEventListener('click', (e)=>{
        if(window.location.search !== ""){
            const registerNum = window.location.search?.split("=")[1];
            const url = `/event/add_memo?n=${registerNum}`;
            if (registerNum) {
                const memoWindow = window.open(url, "Certificate", "width=500, height=300, top=30, left=30");

                window.addEventListener("message", (event) => {
                    if (event.source === memoWindow) {
                        const childInputValue = event.data;
                        memo.innerText = childInputValue;
                    }
                });
            }
        }else{
            alert('QR 코드를 입력해주세요!')
        }
    })

    function getEvent(){
        const event1body = document.querySelector("#event_1");
        //const event2body = document.querySelector("#event_2");

        const booth = document.querySelector("#attendance_type")

        if(event1body.innerText == "Y"){
            yellowBackground(event1body)
        }
        // if(event2body.innerText == "Y"){
        //     violetBackground(event2body)
        // }

        if(booth.innerText == "후원사"){
            booth.classList.add("bg-red-400")
        }
    }

    window.onload = ()=>{
        getEvent()

        let clearTimeOut = '';
        clearTimeout(clearTimeOut);
        
        clearTimeOut = setTimeout(()=>{
            //10초 마다 표 내용 지우는 함수 추가
            const eventTdList = document.querySelectorAll(".qr_text");

            eventTdList.forEach((td)=>{
                td.innerText = '';
                td.classList.remove("bg-amber-300");
            })
        },10000)
    }

     // 한글 음절 및 개별 자모에 대한 영문 자판 매핑
     const initialConsonant = ['r', 'R', 's', 'e', 'E', 'f', 'a', 'q', 'Q', 't', 'T', 'd', 'w', 'W', 'c', 'z', 'x', 'v', 'g'];
    const medialVowel = ['k', 'o', 'i', 'O', 'j', 'p', 'u', 'P', 'h', 'hk', 'ho', 'hl', 'y', 'n', 'nj', 'np', 'nl', 'b', 'm', 'ml', 'l'];
    const finalConsonant = ['', 'r', 'R', 'rt', 's', 'sw', 'sg', 'e', 'f', 'fr', 'fa', 'fq', 'ft', 'fx', 'fv', 'fg', 'a', 'q', 'qt', 't', 'T', 'd', 'w', 'c', 'z', 'x', 'v', 'g'];

    // 개별 자음과 모음에 대한 매핑 (분리된 상태로 입력된 경우 처리)
    const singleConsonantMap = {
      'ㄱ': 'r', 'ㄲ': 'R', 'ㄴ': 's', 'ㄷ': 'e', 'ㄸ': 'E', 'ㄹ': 'f', 'ㅁ': 'a',
      'ㅂ': 'q', 'ㅃ': 'Q', 'ㅅ': 't', 'ㅆ': 'T', 'ㅇ': 'd', 'ㅈ': 'w', 'ㅉ': 'W',
      'ㅊ': 'c', 'ㅋ': 'z', 'ㅌ': 'x', 'ㅍ': 'v', 'ㅎ': 'g'
    };
    
    const singleVowelMap = {
      'ㅏ': 'k', 'ㅐ': 'o', 'ㅑ': 'i', 'ㅒ': 'O', 'ㅓ': 'j', 'ㅔ': 'p',
      'ㅕ': 'u', 'ㅖ': 'P', 'ㅗ': 'h', 'ㅘ': 'hk', 'ㅙ': 'ho', 'ㅚ': 'hl',
      'ㅛ': 'y', 'ㅜ': 'n', 'ㅝ': 'nj', 'ㅞ': 'np', 'ㅟ': 'nl', 'ㅠ': 'b',
      'ㅡ': 'm', 'ㅢ': 'ml', 'ㅣ': 'l'
    };

    // 한글 음절을 자모로 분리하는 함수
    function decomposeHangul(syllable) {
      const hangulBase = 44032; // '가'의 유니코드 값
      const initialBase = 588;  // 초성 범위
      const medialBase = 28;    // 중성 범위

      const code = syllable.charCodeAt(0) - hangulBase;

      const initialIdx = Math.floor(code / initialBase);
      const medialIdx = Math.floor((code % initialBase) / medialBase);
      const finalIdx = code % medialBase;

      return [initialIdx, medialIdx, finalIdx];
    }


    // 한글 음절과 개별 자모를 모두 처리하여 영어 자판에 맞게 변환하는 함수
    function convertToEnglish() {
      const input = document.getElementById('qrcode_input').value;
      let result = '';

      for (let char of input) {
        const code = char.charCodeAt(0);

        // 한글 음절인지 확인
        if (code >= 44032 && code <= 55203) {
          const [initialIdx, medialIdx, finalIdx] = decomposeHangul(char);
          result += initialConsonant[initialIdx] + medialVowel[medialIdx] + finalConsonant[finalIdx];
        } 
        // 개별 자음 처리
        else if (singleConsonantMap[char]) {
          result += singleConsonantMap[char];
        } 
        // 개별 모음 처리
        else if (singleVowelMap[char]) {
          result += singleVowelMap[char];
        } 
        // 한글이 아닌 문자는 그대로 출력
        else {
          result += char;
        }
      }

      document.getElementById('qrcode_input').value = result;
    }
</script>