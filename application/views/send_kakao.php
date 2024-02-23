<!-- 카카오 알림톡으로 메시지 보내기(개별) PHP 버전 - TEST 필요 -->
<?php
$base_url = "stg-user.bizmsg.kakaoenterprise.com"; //스테이징 - 일반 / 변경 필요
$clientID = "intowebinar"; //변경 필요
$clientSecret = "a756c0edd55b504a0c4138411ad41055"; //변경 필요

$curl = curl_init();

//1단계 OAuth 2.0 인증 -> 토큰 발급
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://$base_url/v2/oauth/token",
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
        "Authorization: Basic " . base64_encode("$clientID $clientSecret")
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
     echo "cURL Error #:" . $err;
} else if ($users) {
     echo $response;
    
    $responseData = json_decode($response, true);
    $accessToken = $responseData['access_token'];
    $senderKey = "{senderKey}"; //변경 필요

    foreach ($users as $item) {
    
        //2단계 카카오톡 메시지 발송
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://$base_url/v2/send/kakao",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode(array(
                "message_type" => "AT",
                "sender_key" => $senderKey,
                "cid" => "202210181600001",
                "template_code" => "TEMPLATE_001",
                "phone_number" => 82 . $item['phone'],
                "sender_no" => "01040585269",
                "message" => "알림톡 메시지 테스트",
                "fall_back_yn" => false
            )),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer $access_token"
            ),
        ));
        

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
            $responseData = json_decode($response, true);
            $code = $responseData['code'];
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
            <h1 class="text-white font-semibold text-3xl">카카오 알림톡 전송이 성공하였습니다.</h1>
            <a href="/admin/qr_user"><button class="bg-white text-lime-500 p-3 translate-y-32 font-semibold rounded">뒤로
                    가기</button></a>
        </div>
    <?php endif; ?>
    <?php if ($code != "200") : ?>
        <div class="w-2/4 h-3/4 bg-orange-500 flex flex-col items-center justify-center">
            <h1 class="text-white font-semibold text-3xl">카카오 알림톡 전송이 실패하였습니다.</h1>
            <p class="text-xl font-semibold mt-5"> <?= $code ?> </p>
            <a href="/admin/qr_user"><button class="bg-orange-500 p-3 font-semibold rounded">뒤로
                    가기</button></a>
        </div>
    <?php endif; ?>
</div>