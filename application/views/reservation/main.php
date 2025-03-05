<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<title>예약 시스템</title>
<style>
    
    body {
        font-family: 'Roboto', sans-serif;
    }
    
    .container{
        width:100%;
        height:100%;
        padding-left : 5%;
        padding-right : 5%;
    }
    .person{
        width: 60px;
        height: 60px;
        border-radius: 50%;  
        background-color: #DDD;
    }

    .person_input, .phone_input{
        padding: 4px 16px;
        /* border-radius: 8px; */
        border: 1px solid #ddd;
        margin-top: 8px;
    }

    .person_input:focus, .phone_input:focus{
        outline: none;
    }

    .btn_box{
  
    }

    .btn_box > button{
        padding: 8px 16px;
    }

    .disabled{
        background-color: rgb(37 99 235);
       
    }
</style>
<div class="container">
    <?php 
        //print_r($users);
        for($i=1; $i<=5; $i++){ 
            $part = $i;
            $part_time = "";
            $detail_time1 = "";
            $detail_time2 = "";
            $detail_time3 = "";

            if($part == 1){
                $part_time = "10:30 - 11:30";
                $detail_time1 = "10:30 - 10:50";
                $detail_time2 = "10:50 - 11:10";
                $detail_time3 = "11:10 - 11:30";
            }
            else if($part == 2){
                $part_time = "11:30 - 12:30";
                $detail_time1 = "11:30 - 11:50";
                $detail_time2 = "11:50 - 12:10";
                $detail_time3 = "12:10 - 12:30";
            }
            else if($part == 3){
                $part_time = "13:30 - 14:30";
                $detail_time1 = "13:30 - 13:50";
                $detail_time2 = "13:50 - 14:10";
                $detail_time3 = "14:10 - 14:30";
            }
            else if($part == 4){
                $part_time = "14:30 - 15:30";
                $detail_time1 = "14:30 - 14:50";
                $detail_time2 = "14:50 - 15:10";
                $detail_time3 = "15:10 - 15:30";
            }
            else if($part == 5){
                $part_time = "15:30 - 16:30";
                $detail_time1 = "15:30 - 15:50";
                $detail_time2 = "15:50 - 16:10";
                $detail_time3 = "16:10 - 16:30";
            }         
            ?>
        <form class="flex flex-col items-start justify-center mt-10">
            <div class="font-bold text-4xl underline underline-offset-4 mb-4">Day 1</div>
            <div class="font-bold text-4xl underline underline-offset-4">Part <?php echo $part;?> <?php echo $part_time; ?></div>
            <div class="flex flex-col items-start">
                <div class="w-5/6 flex items-center justify-start mt-10">
                    <p class="text-xl my-10">• <?php echo $detail_time1; ?></p>
                    <div class="btn_box ml-20">
                        <button class="bg-cyan-400 text-white font-bold reservation" data-id="<?php echo substr($detail_time1, 0, 5); ?>" data-part="<?php echo $part;?>">예약하기</button>
                        <button type="button" class="bg-orange-600 text-white font-bold cancel" data-id="<?php echo substr($detail_time1, 0, 5); ?>" data-part="<?php echo $part;?>">수정하기</button>
                    </div>
                </div>

                <div class="flex items-center justify-center *:mx-10 *:flex *:flex-col *:items-center *:justify-between *:h-52">
                    <?php 
                    // 4개의 input을 생성
                    for ($j = 1; $j <= 4; $j++) {
                        // 기본값 설정
                        $nickname = "";
                        $phone = "";
                        $disabled = "";
                        $checked = "";

                        foreach ($users as $user) {
                            if(isset($user['chk_msm']) && $user['chk_msm'] == 'Y'){
                                $checked = "bg-rose-600 text-white";
                            }else{
                                $checked = "bg-green-600 text-white";
                            }
                            if ($user['time_id'] == substr($detail_time1, 0, 5) && $user['location'] == $j && $user['part'] == $part && $user['nickname']) {
                                $nickname = $user['nickname'];
                                $phone = $user['phone'];
                                $disabled = "disabled";  // 일치하는 값이 있으면 input을 disabled 처리
                                break;
                            }
                        }
                    ?>
                    <div>
                        <div class="person <?php echo $disabled; ?>"></div>
                        <input class="person_input" placeholder="예약자 성함" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time1, 0, 5); ?>" data-part="<?php echo $part; ?>" value="<?php echo $nickname; ?>" <?php echo $disabled; ?>/>
                        <input class="phone_input" placeholder="예약자 휴대폰 번호" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time1, 0, 5); ?>" data-part="<?php echo $part; ?>" value="<?php echo $phone; ?>" <?php echo $disabled; ?>/>
                        <button type="button" class="msm_btn font-bold px-4 py-2 mt-2 <?php echo $checked; ?>" data-id="<?php echo substr($detail_time1, 0, 5); ?>" data-location="<?php echo $j; ?>">문자발송</button>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col items-start">
                <div class="w-5/6 flex items-center justify-start mt-10">
                    <p class="text-xl my-10">• <?php echo $detail_time2; ?></p>
                    <div class="btn_box ml-20">
                        <button class="bg-cyan-400 text-white font-bold reservation" data-id="<?php echo substr($detail_time2, 0, 5); ?>" data-part="<?php echo $part;?>">예약하기</button>
                        <button type="button" class="bg-orange-600 text-white font-bold cancel" data-id="<?php echo substr($detail_time2, 0, 5); ?>" data-part="<?php echo $part;?>">수정하기</button>
                    </div>
                </div>
                <div class="flex items-center justify-center *:mx-10 *:flex *:flex-col *:items-center *:justify-between *:h-52">
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

                            if ($user['time_id'] == substr($detail_time2, 0, 5) && $user['location'] == $j && $user['part'] == $part && $user['nickname']) {
                                $nickname = $user['nickname'];
                                $phone = $user['phone'];
                                $disabled = "disabled";
                                break;
                            }
                        }
                    ?>
                    <div>
                        <div class="person <?php echo $disabled; ?>"></div>
                        <input class="person_input" placeholder="예약자 성함" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time2, 0, 5); ?>" data-part="<?php echo $part; ?>" value="<?php echo $nickname; ?>" <?php echo $disabled; ?>/>
                        <input class="phone_input" placeholder="예약자 휴대폰 번호" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time2, 0, 5); ?>" data-part="<?php echo $part; ?>" value="<?php echo $phone; ?>" <?php echo $disabled; ?>/>
                        <button type="button" class="msm_btn font-bold px-4 py-2 mt-2 <?php echo $checked; ?>" data-id="<?php echo substr($detail_time2, 0, 5); ?>" data-location="<?php echo $j; ?>">문자발송</button>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col items-start mb-10">
                <div class="w-5/6 flex items-center justify-start mt-10">
                    <p class="text-xl my-10">• <?php echo $detail_time3; ?></p>
                    <div class="btn_box ml-20">
                        <button class="bg-cyan-400 text-white font-bold reservation" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time3, 0, 5); ?>" data-part="<?php echo $part;?>">예약하기</button>
                        <button type="button" class="bg-orange-600 text-white font-bold cancel" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time3, 0, 5); ?>" data-part="<?php echo $part;?>">수정하기</button>
                    </div>
                </div>
                <div class="flex items-center justify-center *:mx-10 *:flex *:flex-col *:items-center *:justify-between *:h-52">
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

                            if ($user['time_id'] == substr($detail_time3, 0, 5) && $user['location'] == $j && $user['part'] == $part && $user['nickname']) {
                                $nickname = $user['nickname'];
                                $phone = $user['phone'];
                                $disabled = "disabled";
                               
                                break;
                            }
                        }
                    ?>
                    <div>
                        <div class="person <?php echo $disabled; ?>"></div>
                        <input class="person_input" placeholder="예약자 성함" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time3, 0, 5); ?>" data-part="<?php echo $part; ?>" value="<?php echo $nickname; ?>" <?php echo $disabled; ?>/>
                        <input class="phone_input" placeholder="예약자 휴대폰 번호" data-id="<?php echo $j ?>" data-idx="<?php echo substr($detail_time3, 0, 5); ?>" data-part="<?php echo $part; ?>" value="<?php echo $phone; ?>" <?php echo $disabled; ?>/>
                        <button type="button" class="msm_btn font-bold px-4 py-2 mt-2 <?php echo $checked; ?>" data-id="<?php echo substr($detail_time3, 0, 5); ?>" data-location="<?php echo $j; ?>">문자발송</button>

                    </div>
                    <?php } ?>
                </div>
            </div>
        </form>
    
    <?php
        }
    ?>  
</div>


<script>
    const reservationBtnList = document.querySelectorAll(".reservation");
    const cancelBtnList = document.querySelectorAll(".cancel");
    const msmBtnList = document.querySelectorAll(".msm_btn");

    const phoneInputList = document.querySelectorAll(".phone_input");

    reservationBtnList.forEach((reBtn) => {
        reBtn.addEventListener("click", (e) => {
         
            e.preventDefault();
            saveData(e)
        });
    });

    cancelBtnList.forEach((cancelBtn) => {
        cancelBtn.addEventListener("click", (e) => {
            //e.preventDefault();
            // 버튼의 data-id와 data-part를 가져옴
            const timeId = e.target.dataset.id;
            const part = e.target.dataset.part;

            // 해당 part와 time_id에 맞는 input 필드들을 가져옴
            const personInputs = document.querySelectorAll(`.person_input[data-idx="${timeId}"][data-part="${part}"]`);
            const phoneInputs = document.querySelectorAll(`.phone_input[data-idx="${timeId}"][data-part="${part}"]`);

            // input 필드의 disabled 속성 해제
            personInputs.forEach((personInput) => {
                personInput.disabled = false;
            });

            phoneInputs.forEach((phoneInput) => {
                phoneInput.disabled = false;
            });

            e.target.textContent = "수정완료";
            e.target.classList.remove("bg-orange-600")
            e.target.classList.remove("text-white")
            e.target.classList.add("bg-yellow-300")
            e.target.classList.add("confirm")

            const confirmBtn = document.querySelector(".confirm");

            confirmBtn.addEventListener("click", (e)=>{
                saveData(e)
                e.target.classList.add("bg-orange-600")
                e.target.classList.add("text-white")
                e.target.classList.remove("bg-yellow-300")
                e.target.classList.remove("confirm")
            })
        });
    });

    function saveData(e){
        let reservations = [];
        // 버튼의 data-id와 data-part를 가져옴
        const timeId = e.target.dataset.id;
        const part = e.target.dataset.part;

        // 해당 time_id에 해당하는 입력 필드만 가져오기 (data-id가 timeId와 일치하는 입력 필드)
        const personInputs = document.querySelectorAll(`.person_input[data-idx="${timeId}"][data-part="${part}"]`);
        const phoneInputs = document.querySelectorAll(`.phone_input[data-idx="${timeId}"][data-part="${part}"]`);

        personInputs.forEach((personInput, index) => {
            const phoneInput = phoneInputs[index]; // 동일 인덱스의 휴대폰 필드를 매칭

                reservations.push({
                    part: part,
                    name: personInput.value, 
                    phone: phoneInput.value, 
                    location: personInput.getAttribute('data-id')  // data-id를 location으로 사용
                });
     
        });

        const data = {
            time_id: timeId,  // 현재 클릭한 버튼의 time_id
            reservations: reservations
        }
    
        postData(data);  // 서버로 데이터 전송
    }

    function postData(data) {
        $.ajax({
            url: "/reservation/post_name",
            type: "POST",
            data: JSON.stringify(data),
            dataType: "JSON",
            contentType: "application/json",
            success: function(res) {
                //console.log(res.status);
                if(res.status == "success"){
                    window.location.reload();
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    msmBtnList.forEach((msmBtn)=>{
        msmBtn.addEventListener("click", (e)=>{
            const location = e.target.dataset.location;
            const timeId = e.target.dataset.id;

            const url = `/reservation/send_msm?n=${timeId}&m=${location}&d=day1`;
            if (window.confirm("※ 문자 전송을 하시겠습니까?")) {
                window.open(url, "Certificate", "width=800, height=1000, top=30, left=30")
            } else {
                window.location = "/reservation";
            }
        })
    })

    phoneInputList.forEach((phone)=>{
        phone.addEventListener("blur", (e)=>{
            const regPhone = /^(01[016789]{1})-?[0-9]{3,4}-?[0-9]{4}$/;
            if(!regPhone.test(e.target.value)){
                alert("휴대폰 번호를 확인해주세요.")
                e.target.value = "";
            }
        })
    })

</script>