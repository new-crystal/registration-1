<script src="https://cdn.tailwindcss.com"></script>
<script type="text/javascript" src="/assets/js/admin/lecture_history.js"></script>
<style>
    
@font-face {
        font-family: Gong;
        src: url("../../../assets/font/Gong_Gothic_OTF_Bold.otf");
    }

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
        width: 800px;
        padding: 4px;
        background-color: #f56e44;
        display: block;
        font-weight: bold;
        font-size: 16px;
        line-height: 1.4;
    }

    .memoHeader {
        background-color: #fb8500 !important;
    }
    .notice.red{
        background-color: #ffbe0b;
    }
    .access_btn{
        position:absolute;
        bottom: 150px;
        left:50%;
        transform: translateX(-50%);
        width: 150px;
        height: 50px;
        background-color: orangered;
        font-size: 20px;
        font-weight: 800;
        color:#FFF;
    }

    .access_btn:hover{
        background-color: red;
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


</style>

<div class="page-container">
    <div class="page-content">
        <!-- <div class="page-header">
            <div class="page-header-content">
                <div class="page-title flex items-center justify-between">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">QR code 등록</span>
                    </h4>
                </div>
            </div>
        </div> -->
        <div class="content">
            <div class="panel panel-flat">
                <div>
                    <div id="notice">
                    <?php
                        foreach ($notice as $i => $item) { // $i는 인덱스, $item은 배열의 값
                            $bg = '';
                            if($i % 2 == 0){
                                $bg = "red";
                            }
                            echo '<input class="notice '.$bg.'" value="※ ' .  $item['notice'] . '" readonly/>'; // $item['notice']로 접근
                        }
                    ?>

                    </div>
                    <button class="w-[150px] h-[40px] bg-slate-300 mt-20 hover:bg-slate-400 active:bg-slate-500" type="button" id="open">새창</button>
                </div>
                <form action="/admin/access" id="qr_form" name="qr_form" class="w-full h-[88vh] flex flex-col items-center justify-center bg-slate-50">

                    <div class="w-2/5 flex flex-col items-center justify-center">
                        <h1 class="text-5xl mt-32 font-semibold ">QR CODE 입력 </h1>
                        <div class="w-[850px] flex justify-between">
                            <input id="qrcode_input" name="qrcode" class="w-[400px] h-[50px] mt-20 p-3 " type="text" autofocus placeholder="꼭 출결 찍어주세요!!" />
                            <button class="w-[150px] h-[40px] bg-slate-300 mt-20 mb-20 hover:bg-slate-400 active:bg-slate-500 text-black" type="submit" id="submit">등록</button>
                            <button class="w-[150px] h-[40px] bg-indigo-950 mt-20 mb-20 hover:bg-slate-300 active:bg-slate-300 text-white" type="button" id="memo_btn">메모</button>
                        </div>
                    </div>

                    <!-- <div class="w-3/5 h-[1px] bg-slate-400 translate-y-24"></div> -->
                    <div class="w-full bg-white flex items-left justify-around">
                        <table class="qr-info-table mb-80 w-2/5" id="qrTable">
                            <colgroup>
                                <col width="30%" />
                                <col />
                            </colgroup>
                            <tr>
                                <th>등록번호</th>
                                <td id="number" class="qr_text">
                                    <?php if (isset($user['registration_no'])) echo $user['registration_no'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>성함</th>
                                <td id="name" class="qr_text">
                                    <?php if (isset($user['nick_name'])) echo $user['nick_name'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>소속</th>
                                <td id="affiliation" class="qr_text">
                                    <?php if (isset($user['org'])) echo $user['org'] ?></td>
                            </tr>
                            <tr>
                                <th>참가 유형</th>
                                <td id="attendance_type" class="qr_text">
                                    <?php if (isset($user['attendance_type'])) echo $user['attendance_type']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>참석 구분</th>
                                <td id="member_type" class="qr_text">
                                    <?php if (isset($user['member_type'])) echo $user['member_type']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>등록비</th>
                                <td id="fee" class="qr_text">
                                    <?php if (isset($user['fee'])) echo $user['fee'] ?>
                                </td>
                            </tr>
                        </table>
                        <table class="qr-info-table mb-80 w-2/5" id="qrTable">
                            <colgroup>
                                <col width="30%"/>
                                <col />
                            </colgroup>
                            <tr>
                                <th class="memoHeader">remark1<br/>(하단텍 및 구분)</th>
                                <td id="remark1" class="qr_text">
                                    <?php if (isset($user['remark1'])) echo $user['remark1'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="memoHeader">remark2<br/>(Lunch with experts)</th>
                                <td id="remark2" class="qr_text">
                                    <?php if (isset($user['remark2'])) echo $user['remark2'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="memoHeader">remark3<br/>(정보받기&안내)</th>
                                <td id="remark3" class="qr_text">
                                    <?php if (isset($user['remark3'])) echo $user['remark3'] ?>
                                </td>
                            </tr>

                            <!-- <tr>
                                <th class="memoHeader">remark4</th>
                                <td id="remark4" class="qr_text">
                                    <?php if (isset($user['remark4'])) echo $user['remark4'] ?>
                                </td>
                            </tr> -->

                            <tr>
                                <th class="memoHeader">메모</th>
                                <td id="memo" class="qr_text">
                                    <?php if (isset($user['memo'])) { echo $user['memo'] == 'null' ? "" : $user['memo'];}?>
                                </td>
                            </tr>

                            <tr>
                                <th class="memoHeader">등록메모</th>
                                <td id="deposit_memo" class="qr_text">
                                    <?php if (isset($user['deposit_memo'])) { echo $user['deposit_memo'] == 'null' ? "" : $user['deposit_memo'];}?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <button type="button" class="access_btn">출결</button>
                <!-- <button type="button" onclick="saveTime()" class="access_btn">출결</button> -->
            </div>
        </div>
        <div class="alert hidden" id="alert">
            <p class="time"></p>
            <p class="alert_text">출결 체크 완료!</p>
        </div>
    </div>
</div>
<!-- <div class="footer text-muted mt-20">
    © 2024. <a href="#">온라인 학술대회</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">(주)인투온</a>
</div> -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->

<script>
    const form = document.querySelector("#qr_form");
    const qrcode = document.querySelector("#qrcode_input");
    const submit = document.querySelector("#submit");
    const qrTexts = document.querySelectorAll(".qr_text")
    const table = document.querySelector(".qr-info-table")
    const open = document.querySelector("#open")
    const name = document.querySelector("#name")
    const enName = document.querySelector("#name")
    const nation = document.querySelector("#nation")
    const affiliation = document.querySelector("#affiliation")
    const affiliation_kor = document.querySelector("#affiliation_kor")
    const ksso_member_status = document.querySelector("#ksso_member_status")
    const attendance_type = document.querySelector("#attendance_type")
    const member_type = document.querySelector("#member_type")
    // const member_type_s = document.querySelector("#member_type_s")
    const deposit = document.querySelector("#deposit")
    const fee = document.querySelector("#fee")
    const is_score = document.querySelector("#is_score")
    const memo = document.querySelector("#memo")
    const deposit_memo = document.querySelector("#deposit_memo")
    const number = document.querySelector("#number")
    const remark1 = document.querySelector("#remark1")
    const remark2 = document.querySelector("#remark2")
    const remark3 = document.querySelector("#remark3")
    const remark4 = document.querySelector("#remark4")
    const remark5 = document.querySelector("#remark5")
    const special_request_food = document.querySelector("#special_request_food")
    // const remark6 = document.querySelector("#remark6")
    // const remark7 = document.querySelector("#remark7")
    // const remark8 = document.querySelector("#remark8")
    const memoBtn = document.querySelector("#memo_btn")
    const content = document.querySelector(".content")
    const notice = document.querySelector("#notice")
    const attendance_date = document.querySelector("#attendance_date")

    const accessBtn = document.querySelector(".access_btn");
    var childWindow;
    let popUpWindow;
    let qrvalue = "";
    let bc = "";

    content.addEventListener("click", () => {
        qrcode.focus();
    })

    qrcode.focus();

    function whiteBackGrond() {
        memo.style.backgrond = "#FFF"
    }



    function copy(text) {
        if (navigator.clipboard) {
            navigator.clipboard
                .writeText(text)
                .then(() => {
                    // alert('클립보드에 복사되었습니다.');
                })
                .catch(() => {
                    // alert('복사를 다시 시도해주세요.');
                });
        }
    }

    function changeBackgroundColorIfNotEmpty(element) {
        if (element.innerText !== "" && element.innerText !== "해당 없음") {
            element.style.backgroundColor = "#ffe566";
        } else {
            element.style.backgroundColor = "#fff";
        }
    }

    function openQR() {
        const url = `/qrcode/open`
        if (childWindow && !childWindow.closed) {
            childWindow = null;
        } else {
            childWindow = window.open(url, 'ChildWindow', 'width=400,height=300');
        }
    }

    function popUp(id) {
        const url = `/qrcode/pop_up?n=${id}`
        if (popUpWindow && !popUpWindow.closed) {
            popUpWindow = null;
        } else {
            popUpWindow = window.open(url, 'popUpWindow', 'width=500,height=500');
            popUpWindow.addEventListener("unload", () => {
                qrcode.focus();
            })
        }
    }


    form.addEventListener("submit", (e) => {
        e.preventDefault();
        convertToEnglish();
        qrvalue = qrcode.value
        qrvalue = qrcode.value.replace(/\s/g, "");
        if(qrvalue){
            fetchData(qrvalue)
        }else{
            alert("QR코드를 확인해주세요.")
        }
        qrcode.value = "";
        qrcode.focus();
    })

    function fetchData(qrcode) {
    // Ajax 요청 수행
    fetch(`/admin/access?qrcode=${qrcode}`)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const htmlDocument = parser.parseFromString(data, 'text/html');
            if (htmlDocument.querySelector("#number").innerText.replace(/<br\s*\/?>/gi, "").replace(/\s/g,
                    "")) {
                number.innerText = htmlDocument.querySelector("#number").innerText.replace(/<br\s*\/?>/gi, "")
                    .replace(
                        /\s/g, "");
                name.innerText = htmlDocument.querySelector("#name").innerText.replace(/<br\s*\/?>/gi, "").replace(
                    /\s/g, "");
                    affiliation.innerText = htmlDocument.querySelector("#affiliation").innerText.replace(/<br\s*\/?>/gi, "").replace(
                    /\s/g, "");
                    attendance_type.innerText = htmlDocument.querySelector("#attendance_type").innerText.replace(/<br\s*\/?>/gi, "")
                    .replace(/\s/g, "");
                    member_type.innerText = htmlDocument.querySelector("#member_type").innerText.replace(/<br\s*\/?>/gi, "")
                    .replace(/\s/g, "");
                
                    remark1.innerText = htmlDocument.querySelector("#remark1").innerText.replace(/<br\s*\/?>/gi, "").replace(
                    /\s/g, "");
                    remark2.innerText = htmlDocument.querySelector("#remark2").innerText.replace(/<br\s*\/?>/gi, "").replace(
                    /\s/g, "");
                    remark3.innerText = htmlDocument.querySelector("#remark3").innerText.replace(/<br\s*\/?>/gi, "").replace(
                        /\s/g, "");
                    memo.innerText = htmlDocument.querySelector("#memo").innerText.replace(/<br\s*\/?>/gi, "").replace(
                        /\s/g, "");
                        deposit_memo.innerText = htmlDocument.querySelector("#deposit_memo").innerText.replace(/<br\s*\/?>/gi, "").replace(
                            /\s/g, "");
            } else {
                number.innerText = qrvalue
                name.innerText = "없는 QR입니다."
                // org.innerText = ""
                // category.innerText = ""
                // etc1.innerText = ""
                throw new Error("없는 QR입니다.");
            }
        }).then((data) => {
            executeFunctionInChildWindow(qrcode);
        }).then(() => {
            window.open(`https://reg1.webeon.net/qrcode/print_file?registration_no=${qrvalue}`, "_blank")
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}
    function executeFunctionInChildWindow(data) {
        bc = new BroadcastChannel("reg1");

        bc.postMessage({
            qrcode: data
        });
        
    }

    // function executeFunctionInChildWindow(data) {

    //     if (childWindow && !childWindow.closed) {
    //         childWindow.postMessage({
    //             qrcode: data
    //         }, '*');
    //     } else {

    //     }
    // }

    // 자식 창으로부터의 메시지를 받아 처리하는 함수
    function receiveMessage(event) {
        if (event.data === "child") {

        }
    }


    function hideText() {
        qrTexts.forEach((text) => {
            text.textContent = "";
        })
    }

    open.addEventListener("click", () => {
        openQR()
    })

    // 메시지 이벤트 리스너 등록
    window.addEventListener('message', (e) => {
        // childWindow = null;
        receiveMessage(e)
    }, false);


    function saveTime(){
        // const qrvalue = window.location.search.split("=")[1]
        // console.log("wt", qrvalue)
        
        const url = "/access/add_record"
        const data = {
            reg_no : qrvalue,
            type: 2
        }
        if(qrvalue){
            $.ajax({
                type: "POST",
                url : url,
                data: data,
                success: function(result){
                    // console.log(result)
                    const alert = document.querySelector("#alert");
                    const alertText = document.querySelector(".alert_text");

                    alert.classList.remove("hidden");
                    const today = new Date();
                    const time = document.querySelector(".time");

                    time.innerText = `${today.toLocaleString()}`

                    setTimeout(() => {
                        alert.classList.add("hidden");
                    }, 1500)
                    // window.location.reload()
                    bc.postMessage({
                        qrcode: qrvalue,
                        type:2,
                        nickname:enName.innerText
                    });
                },
                error:function(e){  
                    console.log(e)
                    alert("출결등록 이슈가 발생했습니다. 관리자에게 문의해주세요.")
                }
            })  
        }else{
            alert('QR코드를 확인해주세요!')
        }
    }


    accessBtn.addEventListener("click", (e)=>{
        e.preventDefault()
        console.log("hello~")
        saveTime()
    })

    window.onload = () => {
        whiteBackGrond()
        if (qrvalue) {
            number.innerText = qrvalue
        }
    }

    memoBtn.addEventListener("click", () => {
        const registerNum = number.innerText;
        const url = `/admin/memo?n=${registerNum}`;
        if (registerNum) {
            const memoWindow = window.open(url, "Certificate", "width=500, height=300, top=30, left=30");

            window.addEventListener("message", (event) => {
                if (event.source === memoWindow) {
                    const childInputValue = event.data;
                    memo.innerText = childInputValue;
                }
            });
        }
    })


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
</body>