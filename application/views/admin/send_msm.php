<?php
$phone = $users['phone'] ?? '';
$id = $users['id'] ?? '';
$registration_no = $users['registration_no'] ?? '';
$nick_name = $users['nick_name'] ?? '';
$curl = curl_init();
$error = "";
$code = "";

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
    $accessToken = $responseData['access_token'];

    //mms 포토문자
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://sms.gabia.com/api/send/mms",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array(
            'phone' =>  $phone, 'callback' => '010-6674-2507',  'message' => '
안녕하십니까,
내일(10월31일)부터 진행되는 2024 대한내분비학회 추계학술대회 및 학연산 심포지엄 준비사무국 입니다.

원활한 학술대회 참석을 위해 일정 및 등록 QR코드를 전달 드리오니 사전에 확인해 주시면 감사하겠습니다.

상단 QR코드를 등록 데스크에 제시해 주시면 빠른 등록이 가능합니다. 

[2024 대한내분비학회 추계학술대회 및 학연산 심포지엄]
- 날짜: 2024년 10월 31일(목)~11월 2일(토)
- 장소: 호텔 인터불고 대구(만촌동 소재)
- 주차: 무료주차

[등록데스크 안내]
등록 및 명찰 수령을 위하여 등록데스크로 먼저 방문 부탁 드립니다.
- 위치: 3층 로비
- 운영시간: 31일(목): 13:00~20:30
               1일(금): 08:00~20:30
               2일(토): 07:00~16:00

[대한내분비학회 추계학술대회 어플 다운로드 바로가기]
http://app.webeon.net/
* 로그인 안내: 사전등록 시, 기입하신 Email로 접속하시면 됩니다.
* 셔틀버스 안내: ‘앱 - 좌측 상단 메뉴바 - 행사장 안내 - 오시는 길’에서 확인이 가능합니다. 

감사합니다.

2024 대한내분비학회 추계학술대회 및 학연산 심포지엄 준비사무국 드림.
', 'refkey' => 'RESTAPITEST1548722798', 'subject' => '[2024 대한내분비학회 추계학술대회 및 학연산 심포지엄]', 'image_cnt' =>
            '1', '
             images0' => new CURLFILE('assets/images/QR/qrcode_' . $registration_no . '.jpg')
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
        echo $response;
        $responseData = json_decode($response, true);
        $code = $responseData['code'];
        $after = $responseData['data']['AFTER_SMS_QTY'];
    }
}

?>
<script src="https://cdn.tailwindcss.com"></script>
<div class="w-full h-full flex items-center justify-center">
    <?php if ($code == "200" && isset($responseData['data'])) : ?>
        <div class="w-3/4 h-2/4 bg-lime-500 flex flex-col items-center justify-center">
            <h1 class="text-white font-semibold text-3xl">MMS 전송이 성공하였습니다.</h1>
            <p class="text-xl font-semibold mt-5">문자 잔여량 : <?= $responseData['data']['AFTER_SMS_QTY'] ?> </p>
            <button id="closed" class="bg-white text-lime-500 py-3 px-5 translate-y-32 font-semibold rounded">확인</button>
        </div>


    <?php endif; ?>
    <?php if ($code != "200") : ?>
        <div class="w-3/4 h-3/4 bg-orange-500 flex flex-col items-center justify-center">
            <h1 class="text-white font-semibold text-3xl">MMS 전송이 실패하였습니다.</h1>
            <p class="text-xl font-semibold mt-5"><?= $error ? $error : null ?> </p>
            <button class=" bg-orange-500 p-3 font-semibold rounded">확인</button>
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