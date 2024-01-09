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
                        foreach ($notice as $item) {
                            echo '<input class="notice" value="' .  $item['notice'] . '" readonly/>';
                        } ?>

                    </div>
                    <button class="w-[150px] h-[40px] bg-slate-300 mt-20 hover:bg-slate-400 active:bg-slate-500" type="button" id="open">새창</button>
                </div>
                <form action="/admin/access" id="qr_form" name="qr_form" class="w-full h-[88vh] flex flex-col items-center justify-center bg-slate-50">

                    <div class="w-2/5 flex flex-col items-center justify-center">
                        <h1 class="text-5xl mt-32 font-semibold ">QR CODE 입력 </h1>
                        <div class="w-[850px] flex justify-between">
                            <input id="qrcode_input" name="qrcode" class="w-[400px] h-[50px] mt-20 p-3 " type="text" autofocus placeholder="영문 확인해주세요!!" />
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
                                    <?php if (isset($user['nick_name'])) echo $user['nick_name'] ?></td>
                            </tr>
                            <tr>
                                <th>소속</th>
                                <td id="affiliation" class="qr_text">
                                    <?php if (isset($user['org'])) echo $user['org'] ?></td>
                            </tr>
                            <tr>
                                <th>참석 구분</th>
                                <td id="member_type" class="qr_text">
                                    <?php if (isset($user['member_type'])) echo $user['member_type']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>참가 유형</th>
                                <td id="attendance_type" class="qr_text">
                                    <?php if (isset($user['attendance_type'])) echo $user['attendance_type']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>등록비</th>
                                <td id="fee" class="qr_text">
                                    <?php if (isset($user['fee'])) echo $user['fee'] ?></td>
                            </tr>
                        </table>
                        <table class="qr-info-table mb-80 w-2/5" id="qrTable">
                            <colgroup>
                                <col width="30%" />
                                <col />
                            </colgroup>
                            <tr>
                                <th class="memoHeader">remark1</th>
                                <td id="remark1" class="qr_text">
                                    <?php if (isset($user['remark1'])) echo $user['remark1'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="memoHeader">remark2</th>
                                <td id="remark2" class="qr_text">
                                    <?php if (isset($user['remark2'])) echo $user['remark2'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="memoHeader">remark3</th>
                                <td id="remark3" class="qr_text">
                                    <?php if (isset($user['remark3'])) echo $user['remark3'] ?>
                                </td>
                            </tr>

                            <tr>
                                <th class="memoHeader">remark4</th>
                                <td id="remark4" class="qr_text">
                                    <?php if (isset($user['remark4'])) echo $user['remark4'] ?>
                                </td>
                            </tr>

                            <tr>
                                <th class="memoHeader">메모</th>
                                <td id="memo" class="qr_text"><?php
                                                                if (isset($user['memo'])) {
                                                                    echo $user['memo'] == 'null' ? "" : $user['memo'];
                                                                }
                                                                ?></td>

                            </tr>
                        </table>
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
<!-- /page container -->

<script>
    const form = document.querySelector("#qr_form");
    const qrcode = document.querySelector("#qrcode_input");
    const submit = document.querySelector("#submit");
    const qrTexts = document.querySelectorAll(".qr_text")
    const table = document.querySelector(".qr-info-table")
    const open = document.querySelector("#open")
    const name = document.querySelector("#name")
    const enName = document.querySelector("#en_name")
    const nation = document.querySelector("#nation")
    const affiliation = document.querySelector("#affiliation")
    const affiliation_kor = document.querySelector("#affiliation_kor")
    const ksso_member_status = document.querySelector("#ksso_member_status")
    const attendance_type = document.querySelector("#attendance_type")
    const category = document.querySelector("#member_type")
    // const member_type_s = document.querySelector("#member_type_s")
    const deposit = document.querySelector("#deposit")
    const fee = document.querySelector("#fee")
    const is_score = document.querySelector("#is_score")
    const memo = document.querySelector("#memo")
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
    var childWindow;
    let popUpWindow;
    let qrvalue = "";

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
        if (element.innerText !== "" && element.innerText !== "N") {
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
        qrvalue = qrcode.value
        qrvalue = qrcode.value.replace(/\s/g, "");
        fetchData(qrvalue)
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
                console.log(htmlDocument)
                if (htmlDocument.querySelector("#number").innerText) {
                    number.innerText = htmlDocument.querySelector("#number").innerText.replace(/<br\s*\/?>/gi, "")
                        .trim();  
                    name.innerText = htmlDocument.querySelector("#name").innerText.replace(/<br\s*\/?>/gi, "")
                        .trim();
                    affiliation.innerText = htmlDocument.querySelector("#affiliation").innerText.replace(/<br\s*\/?>/gi,
                            "")
                        .trim();
                    attendance_type.innerText = htmlDocument.querySelector("#attendance_type").innerText.replace(
                            /<br\s*\/?>/gi, "")
                        .trim();
                    category.innerText = htmlDocument.querySelector("#member_type").innerText.replace(
                            /<br\s*\/?>/gi, "")
                        .trim();
                    fee.innerText = htmlDocument.querySelector("#fee").innerText.replace(/<br\s*\/?>/gi, "")
                        .trim();
                    memo.innerText = htmlDocument.querySelector("#memo").innerText.replace(/<br\s*\/?>/gi, "")
                        .trim();
                    remark1.innerText = htmlDocument.querySelector("#remark1").innerText.replace(/<br\s*\/?>/gi, "")
                        .trim();
                    remark2.innerText = htmlDocument.querySelector("#remark2").innerText.replace(/<br\s*\/?>/gi, "")
                        .trim();
                    remark3.innerText = htmlDocument.querySelector("#remark3").innerText.replace(/<br\s*\/?>/gi,
                            "")
                        .trim();
                    remark4.innerText = htmlDocument.querySelector("#remark4").innerText.replace(/<br\s*\/?>/gi, "")
                        .trim();
                    notice.innerHTML = htmlDocument.querySelector("#notice").innerHTML
                } else {
                    number.innerText = qrvalue
                    name.innerText = "없는 QR입니다."
                    org.innerText = ""
                    category.innerText = ""
                    etc1.innerText = ""
                    throw new Error("없는 QR입니다.");
                }
            }).then((data) => {
                executeFunctionInChildWindow(qrcode);
            }).then(() => {
                window.open(`https://reg1.webeon.net/qrcode/print_file?registration_no=${qrvalue}`, "_blank")
            }).then(() => {

                changeBackgroundColorIfNotEmpty(memo);
                changeBackgroundColorIfNotEmpty(remark1);
                changeBackgroundColorIfNotEmpty(remark2);
                changeBackgroundColorIfNotEmpty(remark3);
                changeBackgroundColorIfNotEmpty(remark4);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }


    function executeFunctionInChildWindow(data) {

        if (childWindow && !childWindow.closed) {
            childWindow.postMessage({
                qrcode: data
            }, '*');
        } else {

        }
    }

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
</script>
</body>