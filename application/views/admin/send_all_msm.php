<?php
$curl = curl_init();

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
    // echo "cURL Error #:" . $err;
} else if ($users) {
    // echo $response;
    $responseData = json_decode($response, true);
    $accessToken = $responseData['access_token'];
    foreach ($users as $item) {
        // MMS 포토문자

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
                'phone' =>  $item['phone'],
                'callback' => '01030098530',
                'message' => '
안녕하십니까,
‘제61차 대한비만학회 춘계학술대회’ 운영사무국입니다.

본 학술대회에 등록해 주셔서 감사드리며, 빠르고 원활한 등록 진행을 위해 아래 사항을 안내드립니다.

[제61차 대한비만학회 춘계학술대회]
-일정: 3월 14일(금)-15일(토)
-장소: 그랜드 워커힐 서울
-오시는 길: https://kosso.org/main/venue.php

[등록안내]
*등록데스크에서 어플리케이션 내 QR코드를 제시 후 명찰을 수령해 주시기 바랍니다.
-위치: 그랜드홀 로비(B1)
-운영 시간: 3월 14일(금) 13:00-20:00 / 3월 15일(토) 07:00-17:20

[기타안내]
*사전에 ‘대한비만학회 춘계학술대회’ 어플리케이션을 설치하신 후 등록데스크를 방문하여 주시기를 요청드립니다.
*참석에 필요한 모든 정보(프로그램, 초록집 등)는 어플리케이션에서 확인 가능하며, 초록집은 인쇄본으로 제공되지 않습니다.
*초록집은 학술대회 시작일(3/14)부터 어플리케이션과 춘계학술대회 홈페이지에서 열람 및 다운로드하실 수 있습니다.
-어플리케이션: 메인 화면 > 로그인 > 초록보기 
-홈페이지: 메인 화면 > 로그인 > 마이 페이지 > 초록보기

[어플리케이션 다운로드 안내]
-구글플레이 / 앱스토어 검색: ‘KSSO2025’
-애플앱스토어: https://apps.apple.com/kr/app/ksso2025/id6476071605
-구글플레이: https://play.google.com/store/apps/details?id=com.intoon.ksso

문의사항이 있으시면 운영사무국으로 연락주시기 바랍니다.

감사합니다.
‘제61차 대한비만학회 춘계학술대회’ 운영사무국 올림
T. 02-3275-3050 / E. ksso@into-on.com
', 'refkey' => 'RESTAPITEST1548722798', 'subject' => '[제61차 대한비만학회 춘계학술대회]', 'image_cnt' =>
                '1', '
             images0' => new CURLFILE('assets/images/QR/qrcode_' . $item['registration_no'] . '.jpg')
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
        } else {
            // echo $response;
            $responseData = json_decode($response, true);
            $code = $responseData['code'];
            $after = $responseData['data']['AFTER_SMS_QTY'];
        }
    }
} else if (!$users) {
?>
    <script>
        //alert('문자메시지를 전송할 유저가 없습니다.');
        //window.location.href = "/admin/qr_user";
    </script>
<?php
}

?>
<script src="https://cdn.tailwindcss.com"></script>
<div class="w-full h-full flex items-center justify-center">
    <?php if ($code == "200") : ?>
        <div class="w-2/4 h-2/4 bg-lime-500 flex flex-col items-center justify-center">
            <h1 class="text-white font-semibold text-3xl">MMS 전송이 성공하였습니다.</h1>
            <p class="text-xl font-semibold mt-5">문자 잔여량 : <?= $after ?> </p>
            <a href="/admin/qr_user"><button class="bg-white text-lime-500 p-3 translate-y-32 font-semibold rounded">뒤로
                    가기</button></a>
        </div>
    <?php endif; ?>
    <?php if ($code != "200") : ?>
        <div class="w-2/4 h-3/4 bg-orange-500 flex flex-col items-center justify-center">
            <h1 class="text-white font-semibold text-3xl">MMS 전송이 실패하였습니다.</h1>
            <p class="text-xl font-semibold mt-5"> <?= $error_msg ?> </p>
            <a href="/admin/qr_user"><button class=" bg-orange-500 p-3 font-semibold rounded">뒤로
                    가기</button></a>
        </div>
    <?php endif; ?>
</div>