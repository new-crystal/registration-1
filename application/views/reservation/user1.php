<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=0.8, minimum-scale=0.8, maximum-scale=0.8, user-scalable=yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-capable" content="yes">
<title>예약 시스템 day 1</title>

<style>
     body {
        font-family: 'Roboto', sans-serif;
    }

    .header{
        width:100vw;
        height: 20vh;
        background-image: url('/assets/images/2025/time_hdr.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .reservation_header{
        position: absolute;
        top: 315px;
        left: 50%;
        transform: translateX(-50%);
        padding: 0 40px;
    }
    
    .reservation_time{
        width: 160px;
        height: 65px;
        background-image: url("/assets/images/reservation_time-1.png");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 24px;
        /* font-style: italic; */
        cursor:pointer;
        border: 1px solid #7a7979;
    }

    .selected{
        background-image: url("/assets/images/reservation_time_selected-1.png");
        color: #7a7979;
    }

    .reservation_body{
        width: 100%;
        height: 1200px;
        background-color: #FFF;
        /* border-radius: 40px; */
        position: absolute;
        top:420px;
        left: 50%;
        transform: translateX(-50%);
        padding: 40px;
    }

    .detail_time{
        font-size: 35px;
        /* font-style: italic; */
        font-weight: 900;
        margin-right: 12px;
    }

    .person{
        width:120px;
        height: 122px;
        /* background-image: url("/assets/images/sound-1.png"); */
        /* background-position: center;
        background-repeat: no-repeat;
        background-size: cover; */
        font-size: 100px;
        font-weight: bold;
        text-align: center;
        color:#000;
    }

    .disabled{
        /* background-image: url("/assets/images/reservation_disabled.png"); */
        color: #CECECE;
    }

    .person_input, .phone_input{
        width:100%;
        height: 40px;
        background-color: #EDEDED;
        /* border-radius: 14px; */
        padding: 12px 4px 12px 16px;
        font-weight: bold;
    }

    .person_input{
        /* background-image: url("/assets/images/person_input.png"); */
        /* background-position: 13px center;
        background-size: 18px 22px;
        background-repeat: no-repeat; */
        /* text-indent: 30px; */
    }


    .phone_input{
        /* background-image: url("/assets/images/phone_input.png"); */
        /* background-position: 14px center;
        background-size: 13px 28px;
        background-repeat: no-repeat;
        text-indent: 30px; */
    }

    .person_input:focus, .phone_input:focus{
        outline: none;
    }

    .reservation_btn{
        width: 364px;
        height: 67px;
        background-color: #FFF;
        border:1px solid #707070;
        color:#000;
        /* border-radius: 34px; */
        position: absolute;
        top:1700px;
        left: 50%;
        transform: translateX(-50%);
        display: block;
        margin : 0 auto 20px auto;
        font-size:25px;
        font-weight: bold;
    }

    .reservation_btn:hover{
        background-color: #B4B4B4;
    }

    .person_input.disabled, .phone_input.disabled{
        background-color: #eee;
        color:#FFF
    }

    input::placeholder{
        font-weight: bold;
        color: black !important;
    }

    .reload{
        width:90%;
        height: 300px;
        position: absolute;
        top:0;
    }
    .agree{
        width: 80%;
        font-size: 18px;
        color:#FFF;
        position: absolute;
        top:1650px;
        left: 50%;
        transform: translateX(-50%);
    }
</style>

<div class="w-full h-[1820px] mx-auto overflow-hidden">
    <div class="header">
        <!-- <img src="/assets/images/2025/time_hdr.png" class="mx-auto w-full"/> -->
    </div>
    <div class="reload"></div>
    <div class="reservation_body">
       
        <?php 
            $part_time = "";
            $detail_time1 = "";
            $detail_time2 = "";
            $detail_time3 = "";

            // if($part == 1){
            //     $part_time = "10:30 - 11:30";
            //     $detail_time1 = "10:30 - 10:50";
            //     $detail_time2 = "10:50 - 11:10";
            //     $detail_time3 = "11:10 - 11:30";
            // }
            // else if($part == 2){
            //     $part_time = "11:30 - 12:30";
            //     $detail_time1 = "11:30 - 11:50";
            //     $detail_time2 = "11:50 - 12:10";
            //     $detail_time3 = "12:10 - 12:30";
            // }
            // else if($part == 3){
            //     $part_time = "13:30 - 14:30";
            //     $detail_time1 = "13:30 - 13:50";
            //     $detail_time2 = "13:50 - 14:10";
            //     $detail_time3 = "14:10 - 14:30";
            // }
            // else if($part == 4){
            //     $part_time = "14:30 - 15:30";
            //     $detail_time1 = "14:30 - 14:50";
            //     $detail_time2 = "14:50 - 15:10";
            //     $detail_time3 = "15:10 - 15:30";
            // }
            // else if($part == 5){
            //     $part_time = "15:30 - 16:30";
                $detail_time1 = "15:30 - 15:50";
                $detail_time2 = "15:50 - 16:10";
                $detail_time3 = "16:10 - 16:30";
            // }       
            ?>
        <form class="flex flex-col items-start justify-center">

            <div class="w-full flex flex-col items-start justify-between">
                <div class="w-full flex items-center justify-start mb-[30px]">
                    <p class="detail_time">▶ <?php echo $detail_time1; ?></p>
                    <!-- <img src="/assets/images/time_dot.png"/>         -->
                </div>

                <div class="w-full flex items-center justify-between *:flex *:flex-col *:items-center *:justify-between">
                    <?php 
                    // 4개의 input을 생성
                    for ($j = 1; $j <= 4; $j++) {
                        // 기본값 설정
                        $nickname = "";
                        $phone = "";
                        $disabled = "";
                        $checked = "";

                        foreach ($users as $user) {
                            if($user['chk_msm'] == 'Y'){
                                $checked = "bg-rose-600 text-white";
                            }else{
                                $checked = "bg-green-600 text-white";
                            }
                            if ($user['time_id'] == substr($detail_time1, 0, 5) && $user['nickname']) {
                                $nickname = mb_substr($user['nickname'], 0, 1) . '*' .mb_substr($user['nickname'], -1);
                                $phone = substr($user['phone'], 0, 3) . '****'.substr($user['phone'], -4);
                                $disabled = "disabled";  // 일치하는 값이 있으면 input을 disabled 처리
                                break;
                            }
                        }
                    ?>
                    <div class="w-[22%] h-[222px] mb-[78px]">
                        <div class="person <?php echo $disabled; ?>">
                            <?php echo $j ?>
                        </div>
                        <div class="h-[85px] flex flex-col items-center justify-between">
                            <input class="person_input <?php echo $disabled; ?>" placeholder="Your username" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time1, 0, 5); ?>" value="<?php echo $nickname; ?>" <?php echo $disabled; ?>/>
                            <input class="phone_input <?php echo $disabled; ?>" placeholder="Your phone number" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time1, 0, 5); ?>" value="<?php echo $phone; ?>" <?php echo $disabled; ?>/>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col items-start">
                <div class="w-full flex items-center justify-start mb-[30px]">
                    <p class="detail_time">▶ <?php echo $detail_time2; ?></p>
                    <!-- <img src="/assets/images/time_dot.png"/>         -->
                </div>
                <div class="w-full flex items-center justify-between *:flex *:flex-col *:items-center *:justify-between">
                    <?php 
                    for ($j = 1; $j <= 4; $j++) {
                        $nickname = "";
                        $phone = "";
                        $disabled = "";
                        $checked = "";

                        foreach ($users as $user) {
                            if($user['chk_msm'] == 'Y'){
                                $checked = "bg-rose-600 text-white";
                            }else{
                                $checked = "bg-green-600 text-white";
                            }

                            if ($user['time_id'] == substr($detail_time2, 0, 5) && $user['nickname']) {
                                $nickname = mb_substr($user['nickname'], 0, 1) . '*' .mb_substr($user['nickname'], -1);
                                $phone = substr($user['phone'], 0, 3) . '****'.substr($user['phone'], -4);
                                $disabled = "disabled";
                                break;
                            }
                        }
                    ?>
                      <div class="w-[22%] h-[222px] mb-[78px]">
                        <div class="person <?php echo $disabled; ?>">
                            <?php echo $j ?>
                        </div>
                        <div class="h-[85px] flex flex-col items-center justify-between">
                            <input class="person_input <?php echo $disabled; ?>" placeholder="Your username" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time2, 0, 5); ?>" value="<?php echo $nickname; ?>" <?php echo $disabled; ?>/>
                            <input class="phone_input <?php echo $disabled; ?>" placeholder="Your phone number" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time2, 0, 5); ?>" value="<?php echo $phone; ?>" <?php echo $disabled; ?>/>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col items-start mb-10">
                <div class="w-full flex items-center justify-start mb-[30px]">
                    <p class="detail_time">▶ <?php echo $detail_time3; ?></p>
                    <!-- <img src="/assets/images/time_dot.png"/>         -->
                </div>
                <div class="w-full flex items-center justify-between *:flex *:flex-col *:items-center *:justify-between">
                    <?php 
                    for ($j = 1; $j <= 4; $j++) {
                        $nickname = "";
                        $phone = "";
                        $disabled = "";
                        $checked = "";

                        foreach ($users as $user) {
                            if($user['chk_msm'] == 'Y'){
                                $checked = "bg-rose-600 text-white";
                            }else{
                                $checked = "bg-green-600 text-white";
                            }

                            if ($user['time_id'] == substr($detail_time3, 0, 5) && $user['nickname']) {
                                $nickname = mb_substr($user['nickname'], 0, 1) . '*' .mb_substr($user['nickname'], -1);
                                $phone = substr($user['phone'], 0, 3) . '****'.substr($user['phone'], -4);
                                $disabled = "disabled";
                               
                                break;
                            }
                        }
                    ?>
                     <div class="w-[22%] h-[222px] mb-[78px]">
                        <div class="person <?php echo $disabled; ?>">
                            <?php echo $j ?>
                        </div>
                        <div class="h-[85px] flex flex-col items-center justify-between">
                            <input class="person_input <?php echo $disabled; ?>" placeholder="Your username" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time3, 0, 5); ?>" value="<?php echo $nickname; ?>" <?php echo $disabled; ?>/>
                            <input class="phone_input <?php echo $disabled; ?>" placeholder="Your phone number" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time3, 0, 5); ?>" value="<?php echo $phone; ?>" <?php echo $disabled; ?>/>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </form>
      
    </div>
    <div>
        <label for="agree" class="agree">
            <input id="agree" type="checkbox" class="check"/>
                위 정보는 예약 및 취소 확인으로 개인정보를 수집하고 있습니다. 개인정보 수집 및 이용에 동의합니다.
        </label>
        <button class="reservation_btn">예약하기</button>
    </div>  
              
</div>


<script>
    const timeList = document.querySelectorAll(".reservation_time");
    const phoneInputList = document.querySelectorAll(".phone_input");
    const reservationBtn = document.querySelector(".reservation_btn");
    const reloadBtn = document.querySelector(".reload");

    //getIndex();

    timeList.forEach((time)=>{
        time.addEventListener("click", (e)=>{
            timeList.forEach(el => el.classList.remove('selected'));
            e.target.classList.add("selected");
            window.location.href = `/reservation/user1?n=${e.target.dataset.id}`
        })
    })

    // function getIndex(){
    //     const part = window.location.search.split("=")[1] ?? 1;
    //     timeList.forEach((el, i) => { 
    //         if (i + 1 === Number(part)) {
    //             el.classList.add('selected');
    //         }}
    //     );
    // }

    phoneInputList.forEach((phone)=>{
        phone.addEventListener("blur", (e)=>{
            const regPhone = /^(01[016789]{1})-?[0-9]{3,4}-?[0-9]{4}$/;
            if(e.target.value){
                if(!regPhone.test(e.target.value)){
                    alert("휴대폰 번호를 확인해주세요.")
                    e.target.value = "";
                }
            }  
        })
    })

    reloadBtn.addEventListener("click", ()=>{
        window.location.reload();
    })

    reservationBtn.addEventListener("click", (e)=>{
        const agreeCheckbox = document.querySelector(".check");
        if(!agreeCheckbox.checked){
            alert("개인정보 수집 및 이용에 동의해주세요.");
        }else{
            saveData(e)
        }
    })

    function saveData(e){
        let reservations = [];

        // const part = window.location.search.split("=")[1] ?? 1;

        // 해당 time_id에 해당하는 입력 필드만 가져오기 (data-id가 timeId와 일치하는 입력 필드)
        const personInputs = document.querySelectorAll(`.person_input`);
        const phoneInputs = document.querySelectorAll(`.phone_input`);

        personInputs.forEach((personInput, index) => {
            const phoneInput = phoneInputs[index]; // 동일 인덱스의 휴대폰 필드를 매칭

                reservations.push({
                    time_id:personInput.dataset.idx,
                    name: personInput.value, 
                    phone: phoneInput.value
                });
     
        });

        const data = {
            reservations: reservations
        }
    
        postData(data);  // 서버로 데이터 전송
    }

    function postData(data) {
        $.ajax({
            url: "/reservation/post_user1",
            type: "POST",
            data: JSON.stringify(data),
            dataType: "JSON",
            contentType: "application/json",
            success: function(res) {
                //console.log(res.status);
                if(res.status == "success"){
                    alert("예약이 완료됐습니다.")
                    window.location.reload();
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    }
</script>