<style>
    .qr-info-container {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .qr-info-table {
        margin-top: 10rem;
        border: 2px solid #eee;
        border-collapse: collapse;
        width: 60%;
    }

    .qr-info-table th {
        background-color: #6c90fe;
        border-color: #6c90fe;
        color: #fff !important;
    }

    .qr-info-table>tr,
    .qr-info-table th,
    .qr-info-table td {
        border: 2px solid #eee;
        text-align: center;
        font-size: 1.25rem;
        line-height: 2.5rem;
    }

    .qr-info-table tr {
        height: 3rem;
        padding: 4px 8px;
    }

    .submit-box {
        width: 100%;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .submit_btn {
        padding: 4px 8px;
        height: 50px;
    }
</style>
<script type="text/javascript">
    $(function() {
        <?php
        $url = "https://reg1.webeon.net/qrcode/print_file?registration_no=" . $user['registration_no'] . "\"";
        echo "window.open(\"" . $url . ", \"_blank\");"
        ?>
    });
</script>
<div class="qr-info-container">
    <table class="qr-info-table">
        <colgroup>
            <col width="30%" />
            <col />
        </colgroup>
        <tr>
            <th>이름</th>
            <td><?php if (isset($user['nick_name'])) echo $user['nick_name'] ?></td>
        </tr>
        <tr>
            <th>참가구분</th>
            <td><?php
                if (isset($user['type'])) {
                    echo $user['type'];
                }
                ?></td>
        </tr>
        <tr>
            <th>소속</th>
            <td><?php if (isset($user['org'])) echo $user['org'] ?></td>
        </tr>
        <tr>
            <th>메모</th>
            <td><?php
                if (isset($user['memo'])) {
                    echo $user['memo'];
                }
                ?></td>
        </tr>

    </table>
</div>

<!-- 
<dl class="boldTit qr_cont">
    <div class="qr_info" id="qr_nick_name">
        <center>이　　름 <input type="text" value="<?php if (isset($user['nick_name'])) echo $user['nick_name'] ?>" readonly></center>
    </div>
    <div class="qr_info" id="qr_org">
        <center>소　　속
        <input type="text" value="<?php if (isset($user['org'])) echo $user['org'] ?>" readonly></center>
    </div>
    <div class="qr_info" id="" style="opacity:0;">
        <center>소속
        <input type="text" value="hidden" readonly></center>
    </div>
</dl>

<dl class="boldTit qr_cont">
    <div class="qr_info" id="qr_entrance">
        <center>참가구분
        <input type="text" value="<?php
                                    if (isset($user['type'])) {
                                        echo $user['type'];
                                    }
                                    ?>
        " readonly></center>
    </div>
    <div class="qr_info" id="qr_exit">
        <center>메　　모
        <input type="text" value="<?php
                                    if (isset($user['memo'])) {
                                        echo $user['memo'];
                                    }
                                    ?>
        " readonly></center>
    </div>
    <div class="qr_info" id="" style="opacity:0;">
        <center>소속
        <input type="text" value="hidden" readonly></center>
    </div>
</dl> -->

<form action="https://reg1.webeon.net/index.php/qrcode" id="accessForm" name="accessForm" method="post" accept-charset="utf-8">
    <fieldset>
        <div class="btn btnSubm submit-box">
            <input type="submit" value="돌아가기" class="btnPoint" style="padding:8px;height: 50px;font-size: 1rem;width: 100px;">
        </div>
        </div>
    </fieldset>
</form>