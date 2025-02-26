<script src="https://cdn.tailwindcss.com"></script>
<style>
     body, html {
            margin: 0;
            padding: 0;
            overflow: hidden; /* 스크롤 없애기 */
        }
    @font-face {
        font-family: Gong;
        src: url("../../../assets/font/Gong_Gothic_OTF_Bold.otf");
    }

    .text_box {
        font-size: 7rem;
        color: #000;
        z-index: 49;
        font-weight: 600;
        animation: fadeIn 2s;
        text-align: left;
    }

    .small_text_box {
        font-size: 7rem;
        color: #000;
        z-index: 49;
        font-weight: 600;
        animation: fadeIn 2s;
        position: relative;
        top: 0;
        left: 80px;
        text-align: left;
    }

    .long_small_text_box {
        font-size: 7rem;
        color: #000;
        z-index: 49;
        font-weight: 600;
        animation: fadeIn 2s;
        position: relative;
        top: 0;
        left: 80px;
        text-align: left;
    }

    .long_small_text_box #org {
        top: 172px;
    }

    .text_box #org {
        top: 141px;
    }

    #nickname {
        position: absolute;
        top: -121px;
        left: -500px;
        width: 1000px;
    }

    #org {
        position: absolute;
        top: 159px;
        left: -493px;
        width: 1050px;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translate3d(0, 0, -100%);
        }

        to {
            opacity: 1;
            transform: translateZ(0);
        }
    }

    .alert_modal {
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

    .alert_modal>p{
        font-size: 5.5rem;
        font-weight: 700;
        position: relative;
        /* animation: fadeInUp 1s; */
        font-family: Gong;
        -webkit-text-stroke-width: 4px;
        -webkit-text-stroke-color: #004471;
    }

    .alert_modal>h6 {
        font-size: 4.5rem;
        font-weight: 600;
        position: relative;
        /* animation: fadeInUp 1s; */
        font-family: Gong;
        -webkit-text-stroke-width: 4px;
        -webkit-text-stroke-color: #004471;
        }


    input #accessForm {
        padding: 0 3rem;
        /* height: 60%; */
    }

    #qrcode:focus {
        outline: none;
    }

    .qr_info_wrap {
        /* width: 800px; */
        display: flex;
        align-items: center;
        justify-content: space-between;
        /* height: 5.5rem; */
        /* margin: 1rem auto; */
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

    /* .info_content {
        width: 66%;
        height: 100%;
    } */

    .info_content>input {
        width: 700px;
        height: 86px;
        padding: 0 2rem;
        z-index: 999;
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

    .input_box {
        transform: translate(0px, 124px);
        height :322px;
        width:1780px; 
    }

    @keyframes slideUp {
    0% {
        transform: translate(-50%, 100%);
        opacity: 0;
    }
    100% {
        transform: translate(-50%, -50%);
        opacity: 0.85;
    }
}

.wating {
    width: 100%;
    height: 380px;
    background: #ffc425;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: #FFF;
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0.95;
    z-index: 999;
    animation: slideUp 1s ease-in;
    font-size: 11.5rem;
    font-weight: 700;
    font-family: Gong;
    -webkit-text-stroke-width: 4px;
    -webkit-text-stroke-color: #004471;
}


</style>
<div class="w-full h-screen flex flex-col items-center justify-center overflow-hidden">
    <div class="page_1 overflow-hidden">
        <img src="../../assets/images/2025/intro.jpg" />
        <div class="wating hidden">
        잠시만 기다려주세요.
        </div>
    </div>
 <!-- <div class="page_3"> -->
 <div class="page_3" style="display: none;">
    <div id="container" class="w-full h-full flex items-center">
        <div class="alert_modal">
            <p class="alert_text">출결 체크 완료!</p>
            <h6 class="alert_text">예상평점 : <?php echo $score; ?>점</h6>
        </div>
        <div class="h-full">
            <div>
                <div>
                    <img src="../../assets/images/2025/main_h.jpg" style="position: absolute;z-index: -999;width: 1920px;top:0;left:0;" />
                    <dl>
                        <div class="input_box">
                           <form>
                            <fieldset>
                                <div>
                                    <div>
                                    <dl class="pl-2 absolute">
                                        <dd><input type="text" name="qrcode" id="qrcode" class="h-20  px-3 py-3 mt-5 mx-auto" placeholder="" autofocus  autocomplete='off'>
                                        </dd>
                                    </dl>
                                <div>
                                    <div class="flex w-[700px] h-[440px] items-center justify-between flex-col ml-[320px] mt-[24px]">
                                <div class="h-full flex flex-col items-center justify-between">
                                    <dl class="pl-2">
                                        <div id="qr_nick_name" class="qr_info_wrap">
                                            <div class="info_content"><input type="text" class="qr_info input name" value="<?php if (isset($users['nick_name'])) echo $users['nick_name']; ?>" readonly  autocomplete='off'>
                                            </div>
                                        </div>
                                    </dl>

                                    <dl class="pl-2">
                                        <div id="qr_nick_org" class="qr_info_wrap">
                                            <div class="info_content"><input type="text" class="qr_info input org" value="<?php if (isset($users['org_nametag'])) echo $users['org_nametag'];  ?>" readonly  autocomplete='off'>
                                            </div>
                                        </div>
                                    </dl>

                                    <dl class="pl-2">
                                        <div id="qr_entrance" class="qr_info_wrap">
                                            <div class="info_content">
                                                <input type="text" class="qr_info input" value="<?php if(isset($times['min_time'])) { $enter = date("Y-m-d H:i", strtotime($times['min_time'])); echo $enter; } ?>
                                                " readonly  autocomplete='off'>
                                            </div>

                                        </div>
                                    </dl>

                                    <dl class="pl-2">
                                        <div id="qr_exit" class="qr_info_wrap">
                                            <div class="info_content">
                                                <input type="text" class="qr_info input" value="<?php if (isset($times['max_time'])) { $leave = date("Y-m-d H:i", strtotime($times['max_time'])); echo $leave;} ?>
                                                " readonly  autocomplete='off'>
                                            </div>
                                        </div>
                                    </dl>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </fieldset>
                            </form>
                        </div>
                    </dl>
                </div>
            </div>
    </div>
    <!-- <div class="alert"  id="alert"> -->
    <!-- <div class="alert_modal" style="display:none;" id="alert">
        <h6 class="alert_name"></h6>
        <h6 class="time"></h6>
        <p class="alert_text">Attendance Checked!</p>
    </div> -->
</div>
</div>
<script>
    const page1 = document.querySelector(".page_1");
    const page2 = document.querySelector(".page_2")
    const page3 = document.querySelector(".page_3")
    const nickname = document.querySelector("#nickname");
    const org = document.querySelector("#org");
    const watingBox = document.querySelector(".wating");
    const alert_modal = document.querySelector(".alert_modal");
    
    const bc = new BroadcastChannel("reg1");
    
    bc.onmessage = (data)=>{
        childFunction(data.data)
    }
    
    function childFunction(data) {

        if (data.qrcode && data.type !== 2) {
            window.location.href = `/qrcode/open?qrcode=${data.qrcode}`
        }else if(data.qrcode && data.type == 2){
            window.location.href = `/qrcode/open?qrcode=${data.qrcode}&type=2`
            // page3.style.display = "";
            // page1.style.display = "none";
            // const alertModal = document.querySelector(".alert_modal");
            // const alertText = document.querySelector(".alert_text");
            // //console.log(alert)
            // alertModal.style.display = "";
            // const today = new Date();
            // const time = document.querySelector(".time");
            // const alertName = document.querySelector(".alert_name")

            // const hours = ('0' + today.getHours()).slice(-2); 
            // const minutes = ('0' + today.getMinutes()).slice(-2);
            // const year = today.getFullYear();
            // const month = ('0' + (today.getMonth() + 1)).slice(-2);
            // const day = ('0' + today.getDate()).slice(-2);

            // const dateString = year + '-' + month  + '-' + day;

            // alertName.innerText = `${data.nickname}`;
            // time.innerText = `${dateString} ${hours}:${minutes}`;

            // setTimeout(() => {
            //     page3.style.display = "none";
            //     page1.style.display = "";
            //     //alertModal.style.display = "none";
            // }, 10000)

        }
    }

    window.onload = () => {
        // console.log(page1)
        // console.log(page3)
        page1.style.display = "";
        page3.style.display = "none";
        if (window.location.search?.split("type=")[1] === '2') {
            watingBox.classList.add("hidden")
            page1.style.display = "none";
            page3.style.display = "";

            setTimeout(()=>{
                alert_modal.style.display = "none";
            },8000)

            setTimeout(() => {
                page1.style.display = "";
                page3.style.display = "none";
            }, 10000)
        }else if(window.location.search?.split("type=")[1] !== '2' && window.location.search){
            watingBox.classList.remove("hidden");

            setTimeout(() => {
                watingBox.classList.add("hidden")
            }, 5000)
        }
    }



    window.addEventListener('message', function(event) {
        if (event.data) {
            childFunction(event.data);
        }
    });

    /**우클릭 방지 */
    document.addEventListener("contextmenu", function(event) {
        event.preventDefault();
    }, false);

    window.addEventListener("beforeunload", ()=>{
        bc.close()
    })
</script>