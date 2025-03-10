<?php
//print_r($users);
// echo $users['phone'];
$curl = curl_init();
$error = "";

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://sms.gabia.com/oauth/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "grant_type=client_credentials",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/x-www-form-urlencoded",
        "Authorization: Basic " . base64_encode("intowebinar:a756c0edd55b504a0c4138411ad41055")
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    //echo $response;
    $responseData = json_decode($response, true);
    //print_r($responseData);
    $accessToken = $responseData['access_token'];

    // DateTime 객체로 변환
    $datetime = DateTime::createFromFormat('H:i', $users['time_id']);

    // 한 시간 추가
    $datetime->modify('+1 hour');

    // 결과를 문자열로 변환
    $end_time = $datetime->format('H:i');
    //mms 포토문자
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://sms.gabia.com/api/send/lms",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array(
            'phone' =>  $users['phone'], 'callback' => '01030098530',
            'message' => '
[미팅룸 예약안내]
안녕하세요 ' .  $users['nickname'] .'님,
신청하신 미팅룸 예약은 ' . $users['time_id'] . ' - ' . $end_time . '입니다.
예약 시간 20분 전이니 시간에 늦지 않게 부스 앞으로 와주시면 감사하겠습니다.

※사용 시간 5분 전 미팅룸(그랜드홀6)앞에서
 스탭에게 예약 문자 확인을 부탁드립니다.

예약 취소를 원할 시 문자를 받으신 연락처로
취소 문자 발송 부탁드립니다. 

운영사무국 드림.
'
, 'refkey' => 'RESTAPITEST1548722798', 'subject' => '[대한비만학회 춘계학술대회 미팅룸 예약 안내]'
, 'image_cnt' =>'1'
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic " . base64_encode("intowebinar:" . $accessToken)
            ),
        ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;

        $error = $err;
        $error = json_decode($err, true);
    } else {
        //echo $response;
        $responseData = json_decode($response, true);
        $code = $responseData['code'];
        //$after = $responseData['data']['AFTER_SMS_QTY'];
    }
}

?>
<script src="https://cdn.tailwindcss.com"></script>
<div class="w-full h-full flex items-center justify-center">
    <?php if ($code == "200" && isset($responseData['data'])) : ?>
        <div class="w-2/4 h-2/4 bg-lime-500 flex flex-col items-center justify-center">
            <h1 class="text-white font-semibold text-3xl">MMS 전송이 성공하였습니다.</h1>
            <p class="text-xl font-semibold mt-5">문자 잔여량 : <?= $responseData['data']['AFTER_SMS_QTY'] ?> </p>
            <button id="closed" class="bg-white text-lime-500 py-3 px-5 translate-y-32 font-semibold rounded">확인</button>
        </div>


    <?php endif; ?>
    <?php if ($code != "200") : ?>
        <div class="w-2/4 h-3/4 bg-orange-500 flex flex-col items-center justify-center">
            <h1 class="text-white font-semibold text-3xl">MMS 전송이 실패하였습니다.</h1>
            <p class="text-xl font-semibold mt-5"><?= $error ? $error : null ?> </p>
            <button class="bg-white bg-orange-500 p-3 font-semibold rounded">확인</button>
        </div>
    <?php endif; ?>
</div>

<script>
    const closed = document.querySelector("#closed");

    closed.addEventListener("click", () => {
        window.close()
    })

    const parentWindow = window.opener;
    const buttons = parentWindow.document.querySelectorAll('.msm_btn');
    const id = window.location.search.split("=")[1]
    const code = <?php echo $code ?>;

    buttons.forEach((button) => {
        if (code == "200") {
            if (button.dataset.id === id) {
                button.classList.remove('btn-non-success');
                button.classList.add('btn-success');
                console.log(button.classList)
            }
        }
    });
</script>