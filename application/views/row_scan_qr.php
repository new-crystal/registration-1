<!-- 메인 페이지일 경우 class="main" 추가 -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    /* @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translate3d(0, 100%, 0);
        }

        to {
            opacity: 1;
            transform: translateZ(0);
        }
    } */

    @font-face {
        font-family: Gong;
        src: url("../../../assets/font/Gong_Gothic_OTF_Bold.otf");
    }


    body {
        font-family: 'Roboto', sans-serif;
    }

    input #accessForm {
        padding: 0 3rem;
        /* height: 60%; */
    }

    #qrcode:focus {
        outline: none;
    }

    .qr_info_wrap {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 5.5rem;
        /* border: 1px solid #eee; */
        margin: 1rem auto;
        font-weight: 500;
        font-size: 2.5rem;
    }

    .info_name {
        width: 33%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgb(49 46 129);
        color: white;

    }

    .info_content {
        width: 66%;
        height: 100%;
        /* border: 2px solid rgb(49 46 129); */
    }

    .info_content>input {
        margin-left: 155px;
        margin-top: -5px;
        width: 68%;
        height: 90%;
        padding: 0 2rem;
        z-index: 999;
        transform: translate(-63px, 91px);
        font-weight: 700;
    }

    input {
        /* background-color: orange; */
        background-color: transparent;
        font-size: 3rem;
        font-weight: 700;
        font-family: 'Roboto', sans-serif !important;
    }

    .info_content>input:focus {
        outline: none
    }

    #text_box {
        font-size: 1.88rem;
    }

    .fresh {
        width: 152%;
        height: 291px;
        /* background-color: #ddd; */
        transform: translate(71px, 114px);
    }

    .input_box {
        transform: translate(1012px, -87px);
        width: 1750px;
        height: 350px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .alert {
        width: 100%;
        height: 260px;
        background: #ffc425;
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

    .no_alert{
        width: 100%;
        height: 210px;
        background: rgba(255,0,0,0.85);
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* opacity: 0.85; */
        color: #fff;
    }

    .alert>p, .no_alert > p {
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

<?php
// print_r($list);
?>

<body id="body" class="flex items-center justify-center">
    <div id="container" class="w-full h-full flex items-center overflow-hidden">
        <div class="alert" style="display:none;">
            <p class="alert_text">출결 체크 완료!</p>
            <h6 class="alert_text">예상 평점 <?php echo $score ?>점</h6>
        </div>
        <div class="no_alert" style="display:none;">
            <p class="no_alert_text">QR코드를 확인해주세요.</p>
        </div>
        <div class="h-full">
            <div>
                <div>
                    <img src="../../assets/images/2024_row_app_loading_bg.jpg" onclick="window.location.replace()" style="position: absolute;z-index: -999;width: 1920px;" />
                    <dl>

                        <script type="text/javascript">
                            $(function() {
                                $("#accessForm").submit(function() {
                                    if (!$.trim($("#qrcode").val())) {
                                        alert("QR CODE를 입력하세요.");
                                        $("#qrcode").focus();
                                        return false;
                                    }

                                    $("#accessForm").attr("action", "/access/row_scan_qr");

                                    return true;
                                });
                            });
                        </script>
                        <div>
                            <?php echo form_open('/access/row_scan_qr', 'id="accessForm" name="accessForm"') ?>
                            <fieldset>
                                <div class="fresh"></div>
                                <div class="input_box">
                                    <dl class="pl-2">
                                        <dd>
                                            <input type="text" name="qrcode" id="qrcode" class="h-20 px-3 py-3 mt-5 border-indigo-900 mx-auto" style="width: 800px; color:transparent" placeholder="" autofocus autocomplete='off'/>
                                        </dd>
                                    </dl>

                                    <dl class="pl-2">
                                        <div id="qr_nick_name" class="qr_info_wrap">
                                            <div class="info_content"><input type="text" class="qr_info input name" value="<?php if (isset($nick_name)) echo $nick_name ?>" readonly>
                                            </div>
                                        </div>
                                    </dl>
                                    <dl class="pl-2">
                                        <div id="qr_org" class="qr_info_wrap">
                                            <div class="info_content">
                                                <input type="text" class="qr_info input name" value="<?php if (isset($entrance_org)) echo $entrance_org ?>" readonly />
                                            </div>
                                        </div>
                                    </dl>
                                    <dl class="pl-2">
                                        <div id="qr_entrance" class="qr_info_wrap">
                                            <div class="info_content">
                                                <input type="text"class="qr_info input" style="margin-top:0;" value="<?php if (isset($enter)) { $enter = date("Y-m-d H:i", strtotime($enter));echo $enter;} ?>" readonly>
                                            </div>

                                        </div>
                                      
                                    </dl>
                                    <dl class="pl-2">
                                        <div id="qr_exit" class="qr_info_wrap">
                                            <div class="info_content">
                                                <input type="text" style="margin-top:0;" class="qr_info input" value="<?php if (isset($leave)) { $leave = date("Y-m-d H:i", strtotime($leave)); echo $leave; } ?>
                                                " readonly>
                                            </div>
                                        </div>
                                    </dl>
                                    <div class="w-full flex items-center justify-center">
                                        <button type="submit" value="등록" class="btnPoint w-full flex items-center justify-center" style="transform: translate(55px,434px);"></button>
                                    </div>
                                </div>

                            </fieldset>
                            </form>
                            <script type="text/javascript">
                                window.scrollTo(0, document.body.scrollHeight);
                                $("#qrcode").focus();
                                $(document).ready(function() {
                                    setTimeout(function() {
                                        $('.qr_info input').val('');
                                        $('.qr_txt').hide();
                                        $("#qrcode").focus();
                                    }, 10000);
                                })
                                const qrcode = document.querySelector("#qrcode");
                                const accessForm = document.querySelector("#accessForm")
                                accessForm.addEventListener("submit", (e) => {
                                    // e.preventDefault();
                                    qrcdoe.valuea.replace(/ /g, "")
                                })
                            </script>
                        </div>
                    </dl>
                </div>
            </div>

</body>
<script>
    const inputs = document.querySelectorAll(".qr_info");
    const qrcodeInput = document.querySelector("#qrcode");
    const freshBtn = document.querySelector(".fresh")
    const body = document.querySelector("#body")
    const alert = document.querySelector(".alert")
    const alertText = document.querySelector(".alert_text")
    const noAlert = document.querySelector(".no_alert")
    const noAlertText = document.querySelector(".no_alert_text")
    const name = document.querySelector(".name")
    let textTime;
    let alertTime;


    body.addEventListener("click", () => {
        qrcodeInput.focus()
    })

    function checkAlert() {
        if (name.value !== "") {
            alert.style.display = "";
            noAlert.style.display = "none";
        } else {
            alert.style.display = "none";
            noAlert.style.display = "";
        }
    }


    freshBtn.addEventListener("touchstart", () => {
        window.location.reload()
    })

    qrcodeInput.addEventListener("input", (e) => {
        // 입력된 값에서 공백 제거
        const newValue = e.target.value.replace(/\s+/g, "");

        // 입력된 값 업데이트
        e.target.value = newValue;
    })

    window.onload = () => {
        qrcodeInput.focus()
        clearTimeout(alertTime);
        clearTimeout(textTime)
        checkAlert()
        // alertTime = setTimeout(() => {
        //     alert.style.display = "none";
        //     noAlert.style.display = "none";
        // }, 3000)
        // inputs.forEach((input) => {
        //     textTime = setTimeout(() => {
        //         input.value = "";
        //         alert.style.display = "none";
        //         noAlert.style.display = "none";
        //     }, 10000)
        // })
    }
    /**우클릭 방지 */
    document.addEventListener("contextmenu", function(event) {
        event.preventDefault();
    }, false);
</script>