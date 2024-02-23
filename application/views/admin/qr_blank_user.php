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
    }

    body {
        margin: 0;
        padding: 0;
    }

    @font-face {
        font-family: NanumSquare;
        src: url("../../../assets/font/NanumSquare-Hv.otf");
    }

    .txt_con {
        font-family: NanumSquare, "Roboto", Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size : 50px;
    }

    #printThis {
        width: 10cm;
        height: 24cm;
        margin: 0;
        padding: 0;
    }

    .small_receipt {
        position: relative;
        top: 37px;
    }
</style>
<!-- Main content -->
<div id="nametag_wrapper">
    <div class="edit_wrapper">
        <button id="btnPrint" type="button" class="btn btn-primary">Print</button>
    </div>
    <!-- Content area -->
    <div class="content" id="nametag">
        <div id="printThis">
            <div id="editor1" contenteditable="true">
                <?php
                echo '<div class="a4_area">';
                echo '<div class="bg_area">';
                echo '<div class="txt_con"></div>';
                echo '</div>';
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
        print_area("printThis");
    }
    //한 장만 프린터 하기 위해서 body 내용 변경하기
    function print_area($id) {
        var _body = document.body.innerHTML;
        window.onbeforeprint = function () {
            document.body.innerHTML = document.getElementById($id).innerHTML;
        }

        window.onafterprint = function () {
            document.body.innerHTML = _body;
        }
        window.print();
    }
 

</script>

<script src="/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.inline('editor1');
</script>
</body>