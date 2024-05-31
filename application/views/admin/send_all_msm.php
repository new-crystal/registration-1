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
                'callback' => '01065492506',
                'message' => '
안녕하십니까,
제59차 대한비만학회 춘계학술대회 운영사무국 입니다. 

먼저 본 학술대회에 등록해 주셔서 감사 드립니다.
현장 방문 시, 원활한 등록을 위해 아래와 같이 안내를 드리오니 사전에 확인 부탁드립니다.  
                            
[제59차 대한비만학회 춘계학술대회] 
- 날짜: 2024년 3월 8일(금) ~ 9일(토)
- 장소: 그랜드 워커힐 서울
- 오시는 길: https://kosso.org/main/venue.php
- 등록데스크 위치: 비스타홀(B2) 로비
- 등록데스크 운영시간: 3월 8일(금), 13:00-18:30 / 3월 9일(토), 06:30-18:00
                
[등록 QR 코드]
*   등록데스크에 방문하여 상단 QR 코드를 제시 후 네임택을 수령 부탁드립니다.
                
[기타 안내사항]
*   본 학술대회에서는 인쇄된 초록집을 제공하지 않습니다. 참석에 필요한 모든 정보는 어플리케이션에서 확인하실 수 있습니다.
*   어플리케이션 상세 기능: 등록 및 출결, 프로그램 및 실시간 세션 확인, 연사 정보 확인, 초록집 다운로드
                
-   앱스토어: https://apps.apple.com/kr/app/ksso2024/id6476071605
-   구글 플레이: https://play.google.com/store/apps/details?id=com.intoon.ksso
-   앱스토어/구글 플레이에서 KSSO2024를 검색하세요!
                
감사합니다.
제59차 대한비만학회 춘계학술대회 운영사무국 드림. 

TEL: 82-2-2285-2582 / E-mail: ksso@into-on.com
                ', 'refkey' => 'RESTAPITEST1548722798', 'subject' => '[대한내분비학회 제22회 분과전문의 연수강좌]', 'image_cnt' =>
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
        alert('문자메시지를 전송할 유저가 없습니다.');
        window.location.href = "/admin/qr_user";
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