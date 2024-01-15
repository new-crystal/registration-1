<table width='750' style='border:1px solid #000; padding: 0;'>
    <tbody>
        <tr>
            <td colspan='3'>
                <img src='https://iscp2023.org/main/img/mail_header.png' width='750' style='width:750px;'>
            </td>
        </tr>
        <tr>
            <td colspan='3'>
                <div style='font-weight:bold; text-align:center;font-size: 21px; color: #00666B;padding: 20px 0;'>사전등록
                    신청이 아래와 같이 이루어졌습니다.</div>
            </td>
        </tr>
        <tr>
            <td width='74' style='width:74px;'></td>
            <td>
                <div>

                    <table width='586'
                        style='width:586px; border-collapse:collapse; border-top:2px solid #000; width:100%; margin:17px 0;'>
                        <tbody>
                            <tr>
                                <th
                                    style='width:150px; text-align:left; font-size:14px; padding:10px; border-bottom:1px solid #000;'>
                                    이름</th>
                                <td colspan='2'
                                    style='font-size:14px; padding:10px; border-left:1px solid #000; border-bottom:1px solid #000;'>
                                    <a href='mailto:{$to}'
                                        class='link font_inherit'><?php echo $users['nick_name'] ?></a>
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style='width:150px; text-align:left; font-size:14px; padding:10px; border-bottom:1px solid #000;'>
                                    소속</th>
                                <td colspan='2'
                                    style='font-size:14px; padding:10px; border-left:1px solid #000; width:165px; border-bottom:1px solid #000;'>
                                    <?php echo $users['org'] ?></td>

                            </tr>
                            <tr>
                                <th
                                    style='width:150px; text-align:left; font-size:14px; padding:10px; border-bottom:1px solid #000;'>
                                    접수번호</th>
                                <td colspan='2'
                                    style='font-size:14px; padding:10px; border-left:1px solid #000; width:165px; border-bottom:1px solid #000;'>
                                    <?php echo $users['registration_no'] ?></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
            <td width='74' style='width:74px;'></td>
        </tr>
        <tr>
            <td colspan='3' style="text-align: center;">
                <p>
                    2023년 서울아산병원 당뇨병개원의 연수강좌에 참석 해주셔서 감사합니다.<br>
                    현장 등록데스크에 방문하여 위 QR코드를 제시 후 네임택을 수령 부탁드립니다.
                </p>
            </td>
        </tr>
        <tr>
            <td colspan='3' style="text-align: center;">
                <img width="300px" height="300px"
                    src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents(getcwd() . '/assets/images/QR/qrcode_' . $users['registration_no'] . '.jpg')); ?>"
                    alt="" />
                <?php /*src="<?php echo '../assets/images/QR/qrcode_' . $users['registration_no'] . '.jpg'; ?>" alt=""
                />*/ ?>
            </td>
        </tr>
        <tr>
            <td colspan='3' style="text-align: center; color: red; font-weight: 600;">
                <p>
                    본 QR코드는 출석 태깅 QR코드가 아니며,<br>
                    출석 태킹은 네임택 수령 후 네임택 QR코드을 사용 부탁 드립니다.
                </p>
            </td>
        </tr>
        <tr>
            <td colspan='3' style='padding-top:50px;'>
                <img src='https://iscp2023.org/main/img/mail_footer.png' width='750' style='width:750px;'>
            </td>
        </tr>
    </tbody>
</table>
<div style="width:750px;display:flex; justify-content:center;">
    <input value="<?php echo $users['email'] ?>" class="email"/>
    <button id="sendMailLink" style="background-color: #fff; padding: 4px 8px; border:1px solid #ddd; cursor:pointer">메일발송</button>
</div>

<script>
// JavaScript 코드
document.addEventListener("DOMContentLoaded", function() {
    const sendMailLink = document.getElementById("sendMailLink");
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