<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap" rel="stylesheet">

<style>
    @page {
        /* size: 10cm 24cm; */
        size: 794px 960px;
        margin: 0;
    }

        
    @media print {
            #printThis {
            /* width: 10cm;
            height: 24cm; */
            width: 794px;
            height: 960px;
            margin: 0;
            padding: 0;
        }

        .edit_wrapper{
            display: none;
        }
    }

    body {
        background-color: #FFF;
        margin: 0;
        padding: 0;
    }

    @font-face {
        font-family: NanumSquare;
        src: url("../../../assets/font/NanumSquare-Hv.otf");
    }

    #nick_name {
        font-family: NanumSquare, "Roboto", Helvetica Neue, Helvetica, Arial, sans-serif;
    }

    #printThis {
        /* width: 10cm;
        height: 24cm; */
        width: 794px;
        height: 960px;
        margin: 0;
        padding: 0;
    }


</style>
<script>
    window.onload = ()=>{
        document.getElementById("btnPrint").onclick = function() {
            printElement(document.getElementById("printThis"));
        }

        function printElement(elem) {
            var domClone = elem.cloneNode(true);

            var $printSection = document.getElementById("printSection");

            if (!$printSection) {
                var $printSection = document.createElement("div");
                $printSection.style.width = "794px";
                $printSection.style.height = "960px";

                // $printSection.style.width = "10cm";
                // $printSection.style.height = "24cm";
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }

            $printSection.innerHTML = "";
            $printSection.appendChild(domClone);
            window.print();
        }
    }

</script>

<!-- Main content -->
<div id="nametag_wrapper">
    <div class="edit_wrapper">
        <button id="btnPrint" type="button" class="btn btn-primary"
            style="margin-left:20px;">Print<?php $num_row ?></button>
    </div>

    <!-- Content area -->
    <div class="content" id="nametag">
        <div id="printThis">
            <?php
            $num_int = 1;
            foreach ($users as $users) {
                   //영문일 경우 자간 간격 4px / 한글은 10px
                   $only_letters = preg_match('/^[a-zA-Z\s]+$/', $users['nick_name']);
                   $letter_spacing = ($only_letters) ? '0px' : '10px';
                   $letter_spacing_receipt = ($only_letters) ? '0px' : '5px';
       
                   $lang = preg_match("/[\xE0-\xFF][\x80-\xFF][\x80-\xFF]/", $users['nick_name']);
                   $nicknameLength = mb_strlen($users['nick_name'], "UTF-8");
                   $orgLength = mb_strlen($users['org_nametag'], "UTF-8");
                   // $reg_num = explode("-", $users['registration_no'])[1];
   
                   echo '<div class="a4_area">';
                   echo '<div class="bg_area">';
                   echo '<div class="txt_con">';
                   // echo '<div class="reg_num_1">' .$users['registration_no'] . '</div>';
                   //성함 조건식 
                   //1. 3글자 //영문 letter_spacing = 0, 한글 = 10
                   echo '<div class = "box_1_area">';
                 
                   echo '<div class="nick_name" id="nick_name" style="letter-spacing: ' . $letter_spacing . ';margin-left: ' . $letter_spacing . ';">' . $users['nick_name'] . '</div>';
                   
                   echo '<div class="org small_org" id="org">' . $users['org_nametag'] . '</div>';
                   echo '<div id="qrcode" class=""><img src="/assets/images/QR/qrcode_' . $users['registration_no'] . '.jpg"></div></div>';
   
                   echo '<div class="small_small_receipt">';
   
   
                   //학회팀 요청 영수증 성함 한글일 때 letter_spacing = 5
                   echo '<div class = "box_2_area">';
                   echo '<div class="receipt receipt_num">' .$users['registration_no'] . '</div>';
                   echo '<div class="receipt receipt_name">' . $users['nick_name'] . '</div>';
                   echo '<div class="receipt receipt_price">' . $users['fee']. '</div></div>';
   
   
                   echo '<div class ="box_3_area">';
                   echo '<div class="receipt receipt_num">' .$users['registration_no'] . '</div>';
                   echo '<div class="receipt receipt_name">' . $users['nick_name'] . '</div>';
                   echo '<div class="receipt ln">' . $users['licence_number']. '</div>';
                   echo '<div class="receipt sn">' . $users['specialty_number']. '</div></div>';
                   
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

<!-- </div> -->
<!-- /page content -->

<!-- </div> -->
<!-- /page container -->


</body>