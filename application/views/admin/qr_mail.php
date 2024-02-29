<script>
    const currentURL = window.location.href;
    const params = new URLSearchParams(currentURL.split("?")[1]);
    const regNum = params.get("n");
    //console.log(params.get("n"))
</script>
<div align="center" style="width:800px;margin:0 auto;font-size:0;line-height:0;border:0">
      <div style="line-height:0;font-size:0;margin:0;padding:0">
        <img src="https://image.webeon.net/KSSO/240308/qr/KSSO_240229_01.png" alt="ksso1"/>
      </div>
      <div style="line-height:0;font-size:0;margin:0;padding:0">
          <img src="https://image.webeon.net/KSSO/240308/qr/KSSO_240229_02.png" alt="ksso2"/>
      </div>
      <div style="line-height:0;font-size:0;margin:0;padding:0;background-color: #FFF;">
        <img style="display: block;" width="200px" height="200px" alt="ksso4" id="qrcode"/>
      </div>
      <div style="line-height:0;font-size:0;margin:0;padding:0">
        <img src="https://image.webeon.net/KSSO/240308/qr/KSSO_240229_03.png" alt="ksso3"  usemap="#image-map"/>
        <map name="image-map" id="#image-map">
            <area target="_blank" alt="" title="" href="https://www.walkerhill.com/grandwalkerhillseoul/Map" coords="198,652,603,781" shape="rect">
        </map>
      </div>
      <div style="line-height:0;font-size:0;margin:0;padding:0">
        <img src="https://image.webeon.net/KSSO/240308/qr/KSSO_240229_04.png"alt="ksso5"/>
      </div>
      <div style="line-height:0;font-size:0;margin:0;padding:0">
        <img src="https://image.webeon.net/KSSO/240308/qr/KSSO_240229_05.png" alt="ksso6">
      </div>
      <div style="line-height:0;font-size:0;margin:0;padding:0">
        <img src="https://image.webeon.net/KSSO/240308/qr/KSSO_240229_06.png" alt="ksso7">
      </div>
    </div>
<div style="width:750px;display:flex; justify-content:center;">
    <input value="<?php echo $users['email'] ?>" class="email"/>
    <button id="sendMailLink" style="background-color: #fff; padding: 4px 8px; border:1px solid #ddd; cursor:pointer">메일발송</button>
</div>

<script>
// JavaScript 코드
document.addEventListener("DOMContentLoaded", function() {
    const sendMailLink = document.getElementById("sendMailLink");

    const qrcode = document.querySelector("#qrcode");

    qrcode.src = `/assets/images/QR/qrcode_${regNum}.png`;

    sendMailLink.addEventListener("click", function(event) {
        event.preventDefault();

        const registrationNo = document.querySelector(".email").value;
        const url = `https://reg1.webeon.net/admin/sendmail?n=${registrationNo}`;

        fetch(url, {
                method: 'POST',
            })
            .then(response => {
                // 응답 처리
                alert("email 발송 완료")
                //console.log(response);
            })
            .catch(error => {
                // 에러 처리
                console.error("POST 요청 실패", error);
            });
    });
});
</script>