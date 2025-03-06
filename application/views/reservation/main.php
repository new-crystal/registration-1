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
        width: 50px;
        height: 50px;
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

    .btn_box > button{
        padding: 8px 16px;
    }

    .disabled{
        background-color: rgb(37 99 235);
       
    }
</style>
    <div class="container">
        <form class="flex flex-col items-start justify-center mt-10">
            <div class="font-bold text-4xl underline underline-offset-4 mb-4">Day 1</div>
            <div class="btn_box ml-20">
                <button class="bg-cyan-400 text-white font-bold reservation" data-day="day1">예약하기</button>
                <button type="button" class="bg-orange-600 text-white font-bold cancel" data-day="day1">수정하기</button>
            </div>
            <div class="flex flex-col items-start">
                <div class="w-5/6 flex items-center justify-start mt-10">
                    <div class="btn_box ml-20">
                    </div>
                </div>

                <div class="flex items-center justify-center *:mx-10 *:flex *:flex-col *:items-center *:justify-between *:h-52">
                    <?php
                        $day1_list = array(
                            array(
                                'time' => '15:00-16:00'
                            ),
                            array(
                                'time' => '16:00-17:00'
                            ) 
                        );

                        foreach ($day1_list as $item) {
                            // 기본값 설정
                            $nickname = "";
                            $phone = "";
                            $disabled = "";
                            $checked = "bg-green-600 text-white"; // 기본값 (초기화)
                            $startTime = explode("-", $item['time'])[0];

                            // 닉네임이 존재하는 사용자 찾기
                            foreach ($day1_users as $user) {
                                if ($startTime == $user['time_id']) { // 정확한 시간 비교
                                    $nickname = $user['nickname'];
                                    $phone = $user['phone'];

                                    if($nickname){
                                        $disabled = "disabled";  
                                        $checked = (isset($user['chk_msm']) && $user['chk_msm'] == 'Y') 
                                                    ? "bg-rose-600 text-white" 
                                                    : "bg-green-600 text-white";
                                    }
                                    break; 
                                }
                            }
                        ?>
                            <div>
                                <div class="person <?php echo $disabled; ?>"></div>
                                <p><?php echo $item['time']; ?></p>
                                <input class="person_input day1" placeholder="예약자 성함" data-idx="<?php echo $startTime; ?>" value="<?php echo $nickname; ?>" <?php echo $disabled; ?>/>
                                <input class="phone_input day1" placeholder="예약자 휴대폰 번호" data-day="day1" value="<?php echo $phone; ?>" <?php echo $disabled; ?>/>
                                <button type="button" class="msm_btn font-bold px-4 py-2 mt-2 <?php echo $checked; ?>" data-id="<?php echo $startTime; ?>"  data-day="day1">문자발송</button>
                            </div>
                        <?php } ?>

                </div>
            </div>

            <div class="font-bold text-4xl underline underline-offset-4 mb-4 mt-12">Day 2</div>
            <div class="btn_box ml-20">
                <button class="bg-cyan-400 text-white font-bold reservation" data-day="day2" s>예약하기</button>
                <button type="button" class="bg-orange-600 text-white font-bold cancel" data-day="day2">수정하기</button>
            </div>
            <div class="flex flex-col items-start">
                <div class="w-5/6 flex items-center justify-start mt-10">
                    <div class="btn_box ml-20">
                    </div>
                </div>

                <div class="flex items-center justify-start flex-wrap gap-8 *:mx-10 *:flex *:flex-col *:items-center *:justify-between *:h-52">
                    <?php
                        $day2_list = array(
                            array(
                                'time' => '09:00-10:00'
                            ),
                            array(
                                'time' => '10:00-11:00'
                            ),
                            array(
                                'time' => '11:00-12:00'
                            ),
                            array(
                                'time' => '14:00-15:00'
                            ),
                            array(
                                'time' => '15:00-16:00'
                            ),
                            array(
                                'time' => '16:00-17:00'
                            )  
                        );

                        foreach ($day2_list as $item) {
                            // 기본값 설정
                            $nickname = "";
                            $phone = "";
                            $disabled = "";
                            $checked = "bg-green-600 text-white"; // 기본값 (초기화)
                            $startTime = explode("-", $item['time'])[0];

                            // 닉네임이 존재하는 사용자 찾기
                            foreach ($day2_users as $user) {
                                if ($startTime == $user['time_id']) { // 정확한 시간 비교
                                    $nickname = $user['nickname'];
                                    $phone = $user['phone'];

                                    if($nickname){
                                        $disabled = "disabled";  
                                        $checked = (isset($user['chk_msm']) && $user['chk_msm'] == 'Y') 
                                                    ? "bg-rose-600 text-white" 
                                                    : "bg-green-600 text-white";
                                    }
                                    break; 
                                }
                            }
                        ?>
                            <div>
                                <div class="person <?php echo $disabled; ?>"></div>
                                <p><?php echo $item['time']; ?></p>
                                <input class="person_input day2" placeholder="예약자 성함" data-idx="<?php echo $startTime; ?>" value="<?php echo $nickname; ?>" <?php echo $disabled; ?>/>
                                <input class="phone_input day2" placeholder="예약자 휴대폰 번호" data-day="day2" value="<?php echo $phone; ?>" <?php echo $disabled; ?>/>
                                <button type="button" class="msm_btn font-bold px-4 py-2 mt-2 <?php echo $checked; ?>" data-id="<?php echo $startTime; ?>" data-day="day2" >문자발송</button>
                            </div>
                        <?php } ?>

                </div>
            </div>
          
        </form>
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
            const day = e.target.dataset.day;

            const personInputs = document.querySelectorAll(`.person_input.${day}`);
            const phoneInputs = document.querySelectorAll(`.phone_input.${day}`);

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
        const day = e.target.dataset.day;

        const personInputs = document.querySelectorAll(`.person_input.${day}`);
        const phoneInputs = document.querySelectorAll(`.phone_input.${day}`);

        personInputs.forEach((personInput, index) => {
            const phoneInput = phoneInputs[index]; // 동일 인덱스의 휴대폰 필드를 매칭

                reservations.push({
                    time_id: personInput.dataset.idx,
                    day: phoneInput.dataset.day,
                    nickname: personInput.value, 
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
            url: "/reservation/fetch_user",
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
            const timeId = e.target.dataset.id;
            const day = e.target.dataset.day;

            const url = `/reservation/send_msm?n=${timeId}&d=${day}`;
            if (window.confirm("※ 문자 전송을 하시겠습니까?")) {
                window.open(url, "Certificate", "width=800, height=1000, top=30, left=30")
            } else {
                window.location = "/reservation";
            }
        })
    })

    // phoneInputList.forEach((phone)=>{
    //     phone.addEventListener("blur", (e)=>{
    //         const regPhone = /^(01[016789]{1})-?[0-9]{3,4}-?[0-9]{4}$/;
    //         if(!regPhone.test(e.target.value)){
    //             alert("휴대폰 번호를 확인해주세요.")
    //             e.target.value = "";
    //         }
    //     })
    // })

</script>