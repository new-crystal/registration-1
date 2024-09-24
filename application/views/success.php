<!-- success.php 뷰 파일 내부 -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>


    <style>
    @font-face {
        font-family: NanumSquare;
        src: url("../../../assets/font/NanumSquare.otf");
    }

    body {
        font-family: NanumSquare;
    }

    p {
        line-height: 27px;
    }

    #success_container {
        width: 100%;
        margin: 0 auto;
        text-align: center;
        display: flex;
        flex-direction: column;
        font-weight: 500;
    }

    .text_box {
        font-size: 1.25rem;
        line-height: 1.75rem;
        margin-top: 5rem;
    }

    @media screen and (max-width:500px) {
        #success_container {
            width: 100% !important;
            height: 100% !important;
        }

        .text_box {
            margin-top: 0rem;
            font-size: 1.1rem;
            line-height: 1.5rem;
        }

        .pre_btn {
            width: 25%;
            margin-top: 100px;
            font-size: 2rem;
        }

        .header_img {
            height: 80%;
        }

        .pre_btn {
            width: 25%;
            margin-top: 0;
            font-size: 1rem;
        }
    }
    </style>
</head>

<body class="flex items-center justify-center">
    <div id="success_container">
        <div>
            <div class="w-full">
                <img class="header_img" src="../../assets/images/access_header.jpg" class="h-full w-full" />
            </div>
            <div>
                <!-- <div class="text-zinc-400 text-xl sm:text-4xl">
                    <p>Field registration completed.</p>
                    <p>After paying the registration fee of <?php if (isset($fee)) echo $fee; ?></p>
                    <p>at the registration desk</p>
                    <p>Please enter after receiving the nametag.</p>
                </div> -->
                <div class="text_box text-zinc-400">
                    <p>현장 등록이 완료되었습니다</p>
                    <p>등록데스크에서 등록비 <span class="text-blue-900"><?php if (isset($fee)) echo $fee; ?></span> 결제 후</p>
                    <p>네임택을 수령하여 입장해주세요.</p>
                </div>
                <div class="text_box text-blue-900 mt-10">
                    <!-- <p>(대한내분비학회)</p>
                    <p>국민은행</p>
                    <p>803-25-0006-851</p> -->
                </div>
            </div>
            <div class="text_box text-red-500 font-semibold my-20">
                <p>※ 현장등록 참석자 분들은 수료증이 필요 하신 경우 <br>학회 운영사무국으로 연락 부탁드립니다.</p>
                <p>(현장 등록 참석자 학회 사이트 내에 다운로드 불가)</p>
            </div>
            <div>
                <button class="pre_btn py-4 px-5 border mb-3 hover:bg-slate-100" onclick="prev()">이전으로</button>
            </div>
        </div>
    </div>
</body>
<script>
function prev() {
    location.replace("/onSite/mobile_kes")
}
</script>

</html>