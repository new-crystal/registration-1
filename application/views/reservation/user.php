<?php


//[Todo]
//1. 날짜 & 시간 맞춰서 스크롤 내리기

$date = date('m.d.');

$day = "";

if($date == "03.14."){
    $day = "day1";
}else if ($date == "03.15."){
    $day = "day2";
}

$day1_time_list = array(
    array(
        'time' => "15:00-16:00",
        'time_id' => '15:00',
        'day' => 'day1'
    ),
    array(
        'time' => "16:00-17:00",
        'time_id' => '16:00',
        'day' => 'day1'
    ),
);

$day2_time_list = array(
    array(
        'time' => "09:00-10:00",
        'time_id' => '09:00',
        'day' => 'day2'
    ),
    array(
        'time' => "10:00-11:00",
        'time_id' => '10:00',
        'day' => 'day2'
    ), 
    array(
        'time' => "11:00-12:00",
        'time_id' => '11:00',
        'day' => 'day2'
    ),
    array(
        'time' => "14:00-15:00",
        'time_id' => '14:00',
        'day' => 'day2'
    ),
    array(
        'time' => "15:00-16:00",
        'time_id' => '15:00',
        'day' => 'day2'
    ),
    array(
        'time' => "16:00-17:00",
        'time_id' => '16:00',
        'day' => 'day2'
    ),
);


//값 추가하기
function updateTimeList($time_list, $users_list) {
    // users_list 배열을 time_id 기준으로 매핑
    $users_map = [];
    foreach ($users_list as $user) {
        $users_map[$user['time_id']] = [
            'nickname' => $user['nickname'],
            'phone' => $user['phone'],
            'disabled' => !empty($user['nickname']) // 닉네임이 있으면 true, 없으면 false
        ];
    }

    // time_list를 수정하여 "nickname", "phone", "disabled" 추가
    foreach ($time_list as &$time_slot) {
        $time_id = $time_slot['time_id'];

        if (isset($users_map[$time_id])) {
            $time_slot['nickname'] = $users_map[$time_id]['nickname'];
            $time_slot['phone'] = $users_map[$time_id]['phone'];
            $time_slot['disabled'] = $users_map[$time_id]['disabled'];
        } else {
            $time_slot['nickname'] = ''; // 값이 없으면 빈 문자열
            $time_slot['phone'] = '';    // 값이 없으면 빈 문자열
            $time_slot['disabled'] = false; // 기본값 false
        }
    }

    return $time_list;
}

// day2 적용
$day2_time_list = updateTimeList($day2_time_list, $day2_users);

// day1도 동일한 방식으로 적용 가능
$day1_time_list = updateTimeList($day1_time_list, $day1_users);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=0.8, minimum-scale=0.8, maximum-scale=0.8, user-scalable=yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="/assets/css/reservation.css">
    <title>예약 시스템</title>
</head>
<body>
    <div class="time_wrap">
        <div class="header reload">
            <img src="/assets/images/2025/time_hdr.png"/>
            <div class="day day1">
                <span class="bold">DAY1</span>_2025.3.14.(Fri)
            </div>
        </div>
        <div class="time_container">
            <?php
                //  print_r($date);
                foreach($day1_time_list as $day1){ 
                    $nickname = $day1['nickname'] ? mb_substr($day1['nickname'], 0, 1) . '*' .mb_substr($day1['nickname'], -1): "";
                    $phone = $day1['phone'] ? substr($day1['phone'], 0, 3) . '****'.substr($day1['phone'], -4): "";
                    ?>
                <div class="<?=$day1['disabled'] ? "disabled":"" ?>">
                    <p class="time"><?=$day1['time']?></p>
                    <div class="input_box" data-day="day1">
                        <input type="text" class="nick_name person_input" placeholder="Your username" data-idx="<?=$day1['time_id']?>"<?=$day1['disabled'] ? "disabled":"" ?> value = "<?=$nickname?>">
                        <input type="text" class="phone phone_input" placeholder="Your phone number"<?=$day1['disabled'] ? "disabled":"" ?> value = "<?=$phone?>">
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
        <div class="day_footer">
            <label for="agree" class="agree">
                <input id="agree" type="checkbox" class="check"/>
                    위 정보는 예약 및 취소 확인으로 개인정보를 수집하고 있습니다. 개인정보 수집 및 이용에 동의합니다.
            </label>
            <button class="reservation_btn day1">예약하기</button>
        </div>

            <div class="day day2">
                <span class="bold">DAY2</span>_2025.3.15.(Sat)
            </div>

            <div class="time_container day2">
            <?php
                foreach($day2_time_list as $day2){ 
                    $nickname = $day2['nickname'] ? mb_substr($day2['nickname'], 0, 1) . '*' .mb_substr($day2['nickname'], -1) : "";
                    $phone = $day2['phone'] ?  substr($day2['phone'], 0, 3) . '****'.substr($day2['phone'], -4): "";
                    ?>
                <div class="<?=$day2['disabled'] ? "disabled":"" ?>">
                    <p class="time"><?=$day2['time']?></p>
                    <div class="input_box" data-day="day2">
                        <input type="text" class="nick_name person_input" placeholder="Your username" data-idx="<?=$day2['time_id']?>" <?=$day2['disabled'] ? "disabled":"" ?> value = "<?=$nickname?>">
                        <input type="text" class="phone phone_input" placeholder="Your phone number" <?=$day2['disabled'] ? "disabled":"" ?> value = "<?=$phone?>">
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
        <div class="day_footer">
            <label for="agree1" class="agree">
                <input id="agree1" type="checkbox" class="check"/>
                    위 정보는 예약 및 취소 확인으로 개인정보를 수집하고 있습니다. 개인정보 수집 및 이용에 동의합니다.
            </label>
            <button class="reservation_btn day2">예약하기</button>
        </div>
    </div>
</body>
</html>
<script>
    const dayList = document.querySelectorAll(".day")
    const phoneInputList = document.querySelectorAll(".phone_input");
    const day1ReservationBtn = document.querySelector(".reservation_btn.day1");
    const day2ReservationBtn = document.querySelector(".reservation_btn.day2");
    const reloadBtn = document.querySelector(".reload");

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

    day1ReservationBtn.addEventListener("click", (e)=>{
        const agreeCheckbox = document.querySelector("#agree");
        if(!agreeCheckbox.checked){
            alert("개인정보 수집 및 이용에 동의해주세요.");
        }else{
            saveData(e)
        }
    })


    day2ReservationBtn.addEventListener("click", (e)=>{
        const agreeCheckbox = document.querySelector("#agree1");
        if(!agreeCheckbox.checked){
            alert("개인정보 수집 및 이용에 동의해주세요.");
        }else{
            saveData(e)
        }
    })

    function saveData(e) {
            let reservations = [];
            const personInputs = document.querySelectorAll(`.person_input`);
            const phoneInputs = document.querySelectorAll(`.phone_input`);
            const dayList = document.querySelectorAll(`.input_box`);

            let isInvalid = false; // 유효성 검사 플래그

            personInputs.forEach((personInput, index) => {
                const phoneInput = phoneInputs[index];

                const nickname = personInput.value.trim();
                const phone = phoneInput.value.trim();

                // 닉네임 또는 전화번호가 하나만 입력된 경우
                if ((nickname && !phone) || (!nickname && phone)) {
                    isInvalid = true; // 잘못된 데이터가 있음을 표시
                }
            });

            // 잘못된 입력이 하나라도 있다면 alert을 한 번만 띄우고 종료
            if (isInvalid) {
                alert("닉네임과 전화번호를 모두 입력해주세요.");
                return; // 함수 실행 중단 (postData 실행 안 됨)
            }

            // 데이터 저장 로직 실행
            personInputs.forEach((personInput, index) => {
                const phoneInput = phoneInputs[index];
                const dayInput = dayList[index];

                reservations.push({
                    day: dayInput.dataset.day,
                    time_id: personInput.dataset.idx,
                    nickname: personInput.value,
                    phone: phoneInput.value
                });
            });

            const data = {
                reservations: reservations
            };

            postData(data); // 서버로 데이터 전송
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