<?php 
    //print_r($users);
?>

<script src="https://cdn.tailwindcss.com"></script>
<section>
    <div class="w-full flex flex-col items-center justify-center">
        <div class="header w-full h-32 bg-amber-500 flex items-center justify-center">
            <h1 class="text-white text-5xl font-bold ">제59차 대한비만학회 춘계학술대회</h1>
        </div>
        <div class="w-full flex flex-col items-center justify-center mt-10">
            <img class="max-w-80 w-4/5" src="/assets/images/QR/qrcode_<?php echo $users['registration_no'] ?>.jpg">
            <p class="text-2xl font-semibold mt-10">QR 코드를 등록데스크에 제시해주세요.</p>
            <table class="mt-5 w-5/6 max-w-lg">
                <tr class="border-slate-400 border">
                    <th class="px-4 py-2">성함</th>
                    <td class="px-4 py-2"><?php echo $users['nick_name']; ?></td>
                </tr>
                <tr class="border-slate-400 border">
                    <th class="px-4 py-2">소속</th>
                    <td class="px-4 py-2"><?php echo $users['org']; ?></td>
                </tr>
                <tr class="border-slate-400 border">
                    <th class="px-4 py-2">휴대폰</th>
                    <td class="px-4 py-2"><?php echo $users['phone']; ?></td>
                </tr>
                <tr class="border-slate-400 border">
                    <th class="px-4 py-2">이메일</th>
                    <td class="px-4 py-2"><?php echo $users['email']; ?></td>
                </tr>
            </table>
            <p class="text-2xl font-semibold mt-10">등록해주셔서 감사합니다.</p>
        </div>
    </div>
</section>