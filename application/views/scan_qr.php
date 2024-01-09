<!-- 메인 페이지일 경우 class="main" 추가 -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@500&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
body {
    font-family: 'Gothic A1', sans-serif;
}

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


#accessForm {
    padding: 0 3rem;
    /* height: 60%; */
}

#qrcode:focus {
    outline: none;
}

.font_nanum {
    font-family: 'Nanum Gothic', sans-serif;
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
    width: 100%;
    height: 100%;
    /* border: 2px solid rgb(49 46 129); */
}

.info_content>input {
    width: 100%;
    height: 90%;
    padding: 0 2rem;
    z-index: 999;
}

.info_content>input:focus {
    outline: none
}

input {
    background-color: transparent;
    /* background-color: orangered; */
}

#text_box {
    font-size: 1.88rem;
}

.fresh {
    width: 90%;
    height: 200px;
    /* background-color: #ddd; */
    transform: translate(110px, 210px);
}

.input_box {
    transform: translate(58px, 867px);
    width: 861px;
    height: 611px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    margin: 0;
    padding: 0;
}

#qrcode {
    transform: translate(-15px, -169px);
}

.leave_time {
    transform: translateY(58px);
}

.name {
    transform: translateY(-102px);
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
    top: 40%;
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

.entrance_time {
    transform: translate(-13px, -62px);
}
</style>

<body id="body" class="flex items-center justify-center">
    <div id="container" class="w-full h-full flex items-center">
        <div class="alert">
            <p class="alert_text">Attendance Checked!</p>
        </div>
        <div class="h-full">
            <div>
                <div>
                    <img src="../../assets/images/app_loading_bg.png" onclick="replace()"
                        style="position: absolute;z-index: -999;width: 100vw;" />
                    <dl>

                        <script type="text/javascript">
                        $(function() {
                            $("#accessForm").submit(function() {
                                if (!$.trim($("#qrcode").val())) {
                                    alert("QR CODE를 입력하세요.");
                                    $("#qrcode").focus();
                                    return false;
                                }

                                $("#accessForm").attr("action", "/access/scan_qr");

                                return true;
                            });
                        });
                        </script>
                        <div>
                            <?php echo form_open('/access/scan_qr', 'id="accessForm" name="accessForm"') ?>
                            <fieldset>
                                <div class="fresh"></div>
                                <div class="input_box">
                                    <dl class="pl-2">
                                        <dd><input type="text" name="qrcode" id="qrcode"
                                                class="w-full h-20  px-3 py-3 mt-5 border-indigo-900 mx-auto"
                                                placeholder="" autofocus>
                                        </dd>
                                    </dl>

                                    <dl class="pl-2">
                                        <div id="qr_nick_name" class="qr_info_wrap">
                                            <div class="info_content"><input type="text" class="qr_info input name"
                                                    value="<?php if (isset($first_name)) echo $first_name . ' ' . $last_name ?>"
                                                    readonly>
                                            </div>
                                        </div>

                                    </dl>

                                    <dl class="pl-2">
                                        <div id="qr_entrance" class="qr_info_wrap">

                                            <div class="info_content">
                                                <input type="text" style="margin-top:3px"
                                                    class="qr_info input entrance_time" value="<?php if (isset($enter)) {
                                                                                                                                            $enter = date("Y-m-d H:i", strtotime($enter));
                                                                                                                                            echo $enter;
                                                                                                                                        } ?>
                                                " readonly>
                                            </div>

                                        </div>
                                        <div id="qr_exit" class="qr_info_wrap">

                                            <div class="info_content">
                                                <input type="text" style="margin-top:0" class="qr_info input leave_time"
                                                    value="<?php if (isset($leave)) {
                                                                                                                                    $leave = date("Y-m-d H:i", strtotime($leave));
                                                                                                                                    echo $leave;
                                                                                                                                } ?>
                                                " readonly>
                                            </div>
                                        </div>

                                    </dl>

                                    <div class="w-full flex items-center justify-center">
                                        <button type="submit" value="등록"
                                            class="btnPoint w-full flex items-center justify-center"
                                            style="    transform: translate(55px,434px);"></button>
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

function replace() {
    window.location.reload()
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
    checkAlert()
    clearTimeout(alertTime);
    clearTimeout(textTime)
    alertTime = setTimeout(() => {
        alert.style.display = "none";
    }, 3000)
    inputs.forEach((input) => {
        textTime = setTimeout(() => {
            input.value = ""
        }, 10000)
    })
}
/**우클릭 방지 */
document.addEventListener("contextmenu", function(event) {
    event.preventDefault();
}, false);
</script>