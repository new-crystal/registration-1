<!-- 메인 페이지일 경우 class="main" 추가 -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translate3d(0, 100%, 0);
        }

        to {
            opacity: 1;
            transform: translateZ(0);
        }
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
        margin-left: 139px;
        margin-top: 10px;
        width: 157%;
        height: 90%;
        padding: 0 2rem;
        z-index: 999;
        transform: translate(-63px, 91px);
    }

    input {
        /* background-color: orange; */
        background-color: transparent;
        font-size: 3rem;
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
        transform: translate(1px, -92px);
    }

    .alert {
        width: 500px;
        height: 200px;
        background: #f9a21b;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #FFF;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 32px;
    }

    .alert>p {
        font-size: 3rem;
        font-weight: 700;
        position: relative;
        animation: fadeInUp 1s;
    }
</style>

<body id="body" class="flex items-center justify-center">
    <div id="container" class="w-full h-full flex items-center overflow-hidden">
        <div class="alert" style="display:none">
            <p class="alert_text">출결 체크 완료!</p>
        </div>
        <div class="h-full">
            <div>
                <div>
                    <img src="../../assets/images/row_app_loading_bg.png" onclick="window.location.replace()" style="position: absolute;z-index: -999;width: 1920px;" />
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
                        <div class="input_box">
                            <?php echo form_open('/access/row_scan_qr', 'id="accessForm" name="accessForm"') ?>
                            <fieldset>
                                <div class="fresh"></div>
                                <div>
                                    <dl class="pl-2">
                                        <dd><input type="text" name="qrcode" id="qrcode" class="h-20 px-3 py-3 mt-5 border-indigo-900 mx-auto" style="transform: translate(74px,-20px);width: 800px;" placeholder="" autofocus>
                                        </dd>
                                    </dl>

                                    <dl class="pl-2">
                                        <div id="qr_nick_name" class="qr_info_wrap">
                                            <div class="info_content"><input type="text" class="qr_info input name" value="<?php if (isset($nick_name)) echo $nick_name ?>" readonly>
                                            </div>
                                        </div>
                                    </dl>

                                    <dl class="pl-2">
                                        <div id="qr_entrance" class="qr_info_wrap">
                                            <div class="info_content">
                                                <input type="text"class="qr_info input" value="<?php if (isset($enter)) { $enter = date("Y-m-d H:i", strtotime($enter));echo $enter;} ?>" readonly>
                                            </div>

                                        </div>
                                        <div id="qr_exit" class="qr_info_wrap">
                                            <div class="info_content">
                                                <input type="text" style="margin-top:0; transform: translate(854px, -107px);" class="qr_info input" value="<?php if (isset($leave)) { $leave = date("Y-m-d H:i", strtotime($leave)); echo $leave; } ?>
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
    const name = document.querySelector(".name")
    let textTime;
    let alertTime;


    body.addEventListener("click", () => {
        qrcodeInput.focus()
    })

    function checkAlert() {
        if (name.value !== "") {
            alert.style.display = "";
        } else {
            alert.style.display = "none";
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
        alertTime = setTimeout(() => {
            alert.style.display = "none";
        }, 3000)
        inputs.forEach((input) => {
            textTime = setTimeout(() => {
                input.value = "";
                alert.style.display = "none";
            }, 10000)
        })
    }
    /**우클릭 방지 */
    document.addEventListener("contextmenu", function(event) {
        event.preventDefault();
    }, false);
</script>