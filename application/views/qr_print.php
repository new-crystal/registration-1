<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap" rel="stylesheet">

<style>
@page {
    size: 10cm 24cm;
    margin: 0;
}

body {
    margin: 0;
    padding: 0;
}

/* @media print {
        #printThis {
        width: 10cm;
        height: 24cm;
        margin: 0;
        padding: 0;
    }
} */

@font-face {
    font-family: NanumSquare;
    src: url("../../../assets/font/NanumSquare-Hv.otf");
}

#nick_name {
    font-family: NanumSquare, "Roboto", Helvetica Neue, Helvetica, Arial, sans-serif;
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
        <button id="btnPrint" type="button" class="btn btn-primary">Print</button>
        <!--
                    <div id="edit_area">
                        <textarea name="editor1" id="editor1" rows="10" cols="50">
                            This is my textarea to be replaced with CKEditor 4.
                        </textarea>
                    </div>
-->
    </div>
    <!-- Content area -->
    <div class="content" id="nametag">
        <div id="printThis">
            <div id="editor1" contenteditable="true">
            <?php
                //영문일 경우 자간 간격 4px / 한글은 10px
                $only_letters = preg_match('/^[a-zA-Z\s]+$/', $users['nick_name']);
                $letter_spacing = ($only_letters) ? '0px' : '10px';
    
                $lang = preg_match("/[\xE0-\xFF][\x80-\xFF][\x80-\xFF]/", $users['nick_name']);
                $nicknameLength = mb_strlen($users['nick_name'], "UTF-8");
                $orgLength = mb_strlen($users['org_nametag'], "UTF-8");
                $reg_num = explode("-", $users['registration_no'])[1];
                // echo $nicknameLength;
                echo '<div class="a4_area">';
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
                echo '<div class="receipt receipt_name">' . $users['nick_name'] . '</div>';
                echo '<div class="receipt receipt_num">' . $reg_num . '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                ?>
            </div>
        </div>
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
    //window.close();
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




$(function() {
    $("#btnPrint").trigger("click");


    if (window.matchMedia) {
        var mediaQueryList = window.matchMedia('print');
        mediaQueryList.addListener(function(mql) {
            if (mql.matches) {
                console.log('프린트 이전에 호출됩니다.');
            } else {
                console.log('프린트 이후에 호출됩니다.');
                window.close();
            }
        });
    }
});
</script>
<script>
//Make the DIV element draggagle:
dragElement(document.getElementById("qrcode"));
dragElement(document.getElementById("org"));
dragElement(document.getElementById("nick_name"));

function dragElement(elmnt) {
    var pos1 = 0,
        pos2 = 0,
        pos3 = 0,
        pos4 = 0;
    if (document.getElementById(elmnt.id)) {
        /* if present, the header is where you move the DIV from:*/
        document.getElementById(elmnt.id).onmousedown = dragMouseDown;
    } else {
        /* otherwise, move the DIV from anywhere inside the DIV:*/
        elmnt.onmousedown = dragMouseDown;
    }

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        // get the mouse cursor position at startup:
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        // call a function whenever the cursor moves:
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();
        // calculate the new cursor position:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        // set the element's new position:
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
    }

    function closeDragElement() {
        /* stop moving when mouse button is released:*/
        document.onmouseup = null;
        document.onmousemove = null;
    }
}
</script>
<script src="/ckeditor/ckeditor.js"></script>
<script>
// Replace the <textarea id="editor1"> with a CKEditor 4
// instance, using default configuration.
//        CKEDITOR.replace( 'editor1' );

// Turn off automatic editor creation first.
CKEDITOR.disableAutoInline = true;
CKEDITOR.inline('editor1');
</script>
</body>