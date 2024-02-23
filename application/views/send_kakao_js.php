<!-- 카카오 알림톡으로 메시지 보내기(개별) Javascript 버전 - TEST 필요-->
<script>
    //1단계 OAuth 2.0 인증 -> 토큰 발급
    var myHeaders = new Headers();
    const base_url =  "stg-user.bizmsg.kakaoenterprise.com"; //스테이징 - 일반 / 변경 필요
    const client_id = "";
    const client_secret = "";

    myHeaders.append("Authorization", `Basic ${client_id} ${client_secret}`);

    var urlencoded = new URLSearchParams();
    urlencoded.append("grant_type", "client_credentials");

    var requestOptions = {
    method: 'POST',
    headers: myHeaders,
    body: urlencoded,
    redirect: 'follow'
    };

    fetch(`${base_url}/v2/oauth/token`, requestOptions)
    .then(response => response.text())
    .then(result => {
        console.log(result)
        postKakao(result.access_token)
    })
    .catch(error => console.log('error', error));

      //2단계 카카오톡 메시지 발송
    function postKakao(access_token){
        var myHeaders = new Headers();
        myheaders.append("Authorization", `Bearer ${access_token}`);
        myheaders.append("Content-Type", "application/json");
        
        const sender_key = ""; //비즈 사이트에서 채널 생성 시 발급
        const message = "알림톡 메시지 테스트"; // 1000자 이하
        const button =  {"type": "WL","name": "QR 코드 보기", "url_mobile": `reg1.webeon.net/qrcode/kakao?qrcode=${qr}`, "url_pc": `reg1.webeon.net/qrcode/kakao?qrcode=${qr}` };

        var body = new FormData();
            body.append("message_type", "AT");
            body.append("sender_key", sender_key);
            body.append("cid", cid); //고객사 정의 Key ID
            body.append("template_code", template_code); //실제 발송할 메시지 유형으로 등록된 템플릿의 코드
            body.append("phone_number", phone_number); //수신자 전화번호(국가코드(82) 포함)
            body.append("sender_no", "01040585269"); //고객사 발신 전화번호
            body.append("message", message);
            body.append("button", button); 

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: JSON.stringify(body),
            redirect: 'follow'
        };

        fetch(`${base_url}/v2/send/kakao`, requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));
    }

</script>
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