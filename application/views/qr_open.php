<script src="https://cdn.tailwindcss.com"></script>
<style>
    .text_box {
        font-size: 7rem;
        color: #000;
        z-index: 49;
        font-weight: 600;
        animation: fadeIn 2s;
        text-align: left;
    }

    .small_text_box {
        font-size: 7rem;
        color: #000;
        z-index: 49;
        font-weight: 600;
        animation: fadeIn 2s;
        position: relative;
        top: 0;
        left: 80px;
        text-align: left;
    }

    .long_small_text_box {
        font-size: 7rem;
        color: #000;
        z-index: 49;
        font-weight: 600;
        animation: fadeIn 2s;
        position: relative;
        top: 0;
        left: 80px;
        text-align: left;
    }

    .long_small_text_box #org {
        top: 172px;
    }

    .text_box #org {
        top: 141px;
    }

    #nickname {
        position: absolute;
        top: -121px;
        left: -500px;
        width: 1000px;
    }

    #org {
        position: absolute;
        top: 159px;
        left: -493px;
        width: 1000px;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translate3d(0, 0, -100%);
        }

        to {
            opacity: 1;
            transform: translateZ(0);
        }
    }
</style>
<div class="w-full h-screen flex flex-col items-center justify-center">
    <div class="page_1" style="display: none;">
        <img src="../../assets/images/index.png" />
    </div>
    <div class="page_2">
        <img class="absolute top-0 left-0" style="z-index: -99;" src="../../assets/images/name_org.png" />
        <?php if (mb_strlen($users['org']) > 7 && mb_strlen($users['org']) <= 14) { ?>
            <div class="small_text_box">
                <div id="nickname" class="z-50 block">
                    <?php if (isset($users['nick_name'])) echo $users['nick_name'] ?>
                </div>
            </div>
            <div class="small_text_box">
                <div id="org" class=" z-50 block" style=" font-size: 5rem;">
                    <?php if (isset($users['org'])) echo $users['org'] ?></div>
            </div>
    </div>
<?php } else if (mb_strlen($users['org']) >= 14) { ?>
    <div class="long_small_text_box">
        <div id="nickname" class=" z-50 block">
            <?php if (isset($users['nick_name'])) echo $users['nick_name'] ?>
        </div>
    </div>
    <div class="long_small_text_box">
        <div id="org" class=" z-50 block" style="font-size: 4rem;">
            <?php if (isset($users['org'])) echo $users['org'] ?></div>
    </div>
</div>
<?php } else if (mb_strlen($users['org']) <= 7) { ?>
    <div class="text_box" style="position: relative;left: 100px;">
        <div id="nickname" class=" z-50 block">
            <?php if (isset($users['nick_name'])) echo $users['nick_name'] ?>
        </div>
    </div>
    <div class="text_box" style="position: relative;left: 100px;">
        <div id="org" class=" z-50 block">
            <?php if (isset($users['org'])) echo $users['org'] ?></div>
    </div>
    </div>

<?php   } ?>

</div>

<script>
    const page1 = document.querySelector(".page_1");
    const page2 = document.querySelector(".page_2")
    const nickname = document.querySelector("#nickname")
    const org = document.querySelector("#org")

    function childFunction(data) {
        if (data.qrcode) {
            window.location.href = `/qrcode/open?qrcode=${data.qrcode}`
            window.opener.postMessage("child", '*');
        }
    }

    // window.onload = () => {
    //     page1.style.display = "";
    //     page2.style.display = "none";
    //     if (window.location.search) {
    //         page1.style.display = "none";
    //         page2.style.display = "";
    //         setTimeout(() => {
    //             page1.style.display = "";
    //             page2.style.display = "none";
    //         }, 10000)
    //     }
    // }



    window.addEventListener('message', function(event) {

        if (event.data) {
            childFunction(event.data);
        }
    });
</script>