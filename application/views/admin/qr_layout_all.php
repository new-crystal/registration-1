<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap" rel="stylesheet">

<style>
    @page {
        size: 10cm 24cm;
        margin: 0;
    }

    @font-face {
        font-family: NanumSquare;
        src: url("../../../assets/font/NanumSquare-Hv.otf");
    }

    #nick_name {
        font-family: NanumSquare;
    }

    #printThis {
        width: 10cm;
        height: 24cm;
        margin: 0;
        padding: 0;
    }
</style>

<!-- Main content -->
<div id="nametag_wrapper">
    <div class="edit_wrapper">
        <button id="btnPrint" type="button" class="btn btn-primary" style="margin-left:20px;">Print<?php $num_row ?></button>
    </div>

    <!-- Content area -->
    <div class="content" id="nametag">
        <div id="printThis">
            <?php
            $num_int = 1;
            foreach ($users as $item) {
                $lang = preg_match("/[\xE0-\xFF][\x80-\xFF][\x80-\xFF]/", $item['nick_name']);
                $nicknameLength = mb_strlen($item['nick_name'], "UTF-8");
                echo '<div class="a4_area">';
                echo '<div class="bg_area">';
                echo '<div class="txt_con">';
                if ($item['nt_info'] != '') {
                    echo '<div class="org" id="nt_info">' . $item['nt_info'] . '</div>';
                }
                if ($lang == 0) {
                    echo '<div class="nick_name lang_en" id="nick_name">' . $item['nick_name'] . '</div>';
                } else if ($lang !== 0 && $nicknameLength <= 3) {
                    echo '<div class="nick_name" id="nick_name">' . $item['nick_name'] . '</div>';
                } else if ($lang !== 0 && $nicknameLength > 3) {
                    echo '<div class="small_nickname" id="nick_name">' . $item['nick_name'] . '</div>';
                }
                echo '<div class="org" id="org">' . $item['org_nametag'] . '</div>';
                echo '<div id="qrcode" class=""><img src="/assets/images/QR/qrcode_' . $item['registration_no'] . '.jpg"></div>';
                echo '<div class="receipt receipt_num_1">' . $item['registration_no'] . '</div>';
                echo '<div class="receipt receipt_name">' . $item['nick_name'] . '</div>';
                echo '<div class="receipt receipt_price">' . number_format($item['fee']) . '</div>';
                echo '<div class="receipt receipt_num_2">' . $item['registration_no'] . '</div>';
                echo '<div class="receipt receipt_small small_nick">' . $item['nick_name'] . '</div>';
                echo '<div class="receipt receipt_small smaill_ln">' . $item['ln'] . '</div>';
                echo '<div class="receipt receipt_small small_sn">' . $item['sn'] . '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                $num_int = $num_int + 1;
            }
            ?>
        </div>
    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->
<style>
    body {
        background-color: #fff;
    }
</style>
<script>
    document.getElementById("btnPrint").onclick = function() {
        printElement(document.getElementById("printThis"));
    }

    function printElement(elem) {
        var domClone = elem.cloneNode(true);

        var $printSection = document.getElementById("printSection");

        if (!$printSection) {
            var $printSection = document.createElement("div");
            $printSection.style.width = "10cm";
            $printSection.style.height = "24cm";
            $printSection.id = "printSection";
            document.body.appendChild($printSection);
        }

        $printSection.innerHTML = "";
        $printSection.appendChild(domClone);
        window.print();
    }
</script>
</body>