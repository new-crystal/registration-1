<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap" rel="stylesheet">

<style>
    @page {
        size: 10cm 24cm;
        margin: 0;
    }

        
    @media print {
            #printThis {
            width: 10cm;
            height: 24cm;
            margin: 0;
            padding: 0;
        }

        .edit_wrapper{
            display: none;
        }
    }

    body {
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
        width: 23.7em;
        height: 56.9rem;
        margin: 0;
        padding: 0;
    }


</style>
<!-- Main content -->
  
    <!-- Content area -->

        <div id="printThis">

                <?php
                //영문일 경우 자간 간격 4px / 한글은 10px
                $only_letters = preg_match('/^[a-zA-Z\s]+$/', $users['nick_name']);
                $letter_spacing = ($only_letters) ? '0px' : '10px';
                $letter_spacing_receipt = ($only_letters) ? '0px' : '5px';
    
                $lang = preg_match("/[\xE0-\xFF][\x80-\xFF][\x80-\xFF]/", $users['nick_name']);
                $nicknameLength = mb_strlen($users['nick_name'], "UTF-8");
                $orgLength = mb_strlen($users['org_nametag'], "UTF-8");
                $reg_num = explode("-", $users['registration_no'])[1];
                // echo $nicknameLength;

                echo '<div class="bg_area">';
                echo '<div class="txt_con">';
                echo '<div class="reg_num_1">' . $reg_num . '</div>';
                //성함 조건식 
                //1. 3글자 //영문 letter_spacing = 0, 한글 = 10
                if ($nicknameLength <= 3) {
                    echo '<div class="nick_name" id="nick_name" style="letter-spacing: ' . $letter_spacing . ';margin-left: ' . $letter_spacing . ';">' . $users['nick_name'] . '</div>';
                } 
                //2. 4 ~ 6 글자 //영문 letter_spacing = 0, 한글 = 10
                else if ($nicknameLength > 3 && $nicknameLength <= 6) {
                    echo '<div class="small_nickname" id="nick_name" style="letter-spacing: ' . $letter_spacing . ';margin-left: ' . $letter_spacing . ';">' . $users['nick_name'] . '</div>';
                } 
                //3. 7 ~ 16 글자 //영문 letter_spacing = 0, 한글 = 10
                else if($nicknameLength > 6 && $nicknameLength <= 16){
                    echo '<div class="small_small_nickname" id="nick_name" style="letter-spacing: ' . $letter_spacing . ';margin-left: ' . $letter_spacing . ';">' . $users['nick_name'] . '</div>';
                }
                //4. 17 글자부터 ~ //영문 letter_spacing = 0, 한글 = 10
                else if($nicknameLength > 16){
                    echo '<div class="small_small_small_nickname" id="nick_name" style="letter-spacing: ' . $letter_spacing . ';margin-left: ' . $letter_spacing . ';">' . $users['nick_name'] . '</div>';
                }
                echo '<div class="org small_org" id="org">' . $users['org_nametag'] . '</div>';
                echo '<div id="qrcode" class=""><img src="/assets/images/QR/qrcode_' . $users['registration_no'] . '.jpg"></div>';
                echo '<div class="small_small_receipt">';
                echo '<div class="receipt receipt_price">' . number_format($users['fee']) . '</div>';

                //학회팀 요청 영수증 성함 한글일 때 letter_spacing = 5
                echo '<div class="receipt receipt_name" style="letter-spacing: ' . $letter_spacing_receipt . ';">' . $users['nick_name'] . '</div>';
                echo '<div class="receipt receipt_num">' . $reg_num . '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                ?>
            </div>
        </div>
    </div>

<!-- /content area -->


<!-- /main content -->

</div>
<!-- /page content -->


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
        //            console.log($printSection);
        window.print();
    }
</script>
</body>