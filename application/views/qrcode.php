<!-- 메인 페이지일 경우 class="main" 추가 -->
<div id="container" class="main">
    <div class="contents">
        <h2 class="subTit exin">출입 기록</h2>

        <div class="txtCon" style="min-height:500px;">
            <div class="txtCon regist">

                <dl class="registInfo">

                    <script type="text/javascript">
                    $(function() {
                        $("#accessForm").submit(function() {
                            if (!$.trim($("#qrcode").val())) {
                                alert("QR CODE를 입력하세요.");
                                $("#qrcode").focus();
                                return false;
                            }

                            $("#accessForm").attr("action", "/qrcode/info");

                            return true;
                        });
                    });
                    </script>
                    <div class="txtCon regist">
                        <h3 class="hidden">QR CODE 입력</h3>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('/qrcode/info', 'id="accessForm" name="accessForm"') ?>
                        <fieldset>
                            <legend>QR CODE</legend>

                            <div class="registSearch">

                                <dl class="registInfo">
                                    <dt class="boldTit">
                                        <center>QR CODE 입력</center>
                                    </dt>
                                    <dd>
                                        <ul class="listBl">

                                            <li>
                                                <center>커서를 텍스트박스 안에 놓고 QR 코드 스캐너를 사용하세요.</center>
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt class="hidden">QR CODE</dt>
                                    <dd><input style="ime-mode:disabled" type="text" name="qrcode" id="qrcode"
                                            class="_placeholder" placeholder=""></dd>
                                </dl>
                                <dl class="boldTit qr_txt">
                                    <?php
                                           /*
											echo "<dt><h1>$entrance</h1></dt>";
                                            */
											?>
                                </dl>

                                <div class="btn btnSubm">
                                    <input type="submit" value="등록" class="btnPoint">
                                </div>
                            </div>
                            <div class="into_logo"><img src="/assets/images/logo.png"></div>
                            <!-- //bdArea -->
                        </fieldset>
                        </form>
                        <script type="text/javascript">
                        window.scrollTo(0, document.body.scrollHeight);
                        $("#qrcode").focus();
                        <?php
                                    /*
                                    $(document).ready(function(){
                                        setTimeout(function(){
                                            $('.qr_info input').val('');
                                            $('.qr_txt').hide();
                                        },10000);
                                    })
                                    */
                                    ?>
                        </script>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <!-- //contents -->

</div>
<!-- //container -->