<script type="text/javascript" src="/assets/js/admin/lecture_history.js"></script>
<style>
    table th {
        padding: 0;
        font-size: 1.2rem;
    }

    .loading_box {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        transform: translateX(-200px);
        z-index: 9999;
    }

    .loading {
        position: absolute;
        top: 20%;
        left: 52%;
        transform: translate(-50%, -50%);
    }
</style>
<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div style="display: none;" class="loading_box" onclick="alert('진행중입니다.')">

        <svg class="loading" version="1.1" id="L5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve" width="70px" height="70px">
            <circle fill="#fff" stroke="none" cx="6" cy="50" r="6">
                <animateTransform attributeName="transform" dur="1s" type="translate" values="0 15 ; 0 -15; 0 15" repeatCount="indefinite" begin="0.1" />
            </circle>
            <circle fill="#fff" stroke="none" cx="30" cy="50" r="6">
                <animateTransform attributeName="transform" dur="1s" type="translate" values="0 10 ; 0 -10; 0 10" repeatCount="indefinite" begin="0.2" />
            </circle>
            <circle fill="#fff" stroke="none" cx="54" cy="50" r="6">
                <animateTransform attributeName="transform" dur="1s" type="translate" values="0 5 ; 0 -5; 0 5" repeatCount="indefinite" begin="0.3" />
            </circle>
        </svg>
    </div>
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">학회등록인원</span></h4>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">등록 인원</h5>
                <div class="heading-elements">
                    <form action="/admin/excel_download" method="post">
                        <button class="btn btn-primary pull-right"><i class="icon-download4"></i> QR기록 다운로드</button>
                    </form>
                    <form action="/admin/send_all_mail" method="post" id="deposit_mail_Form">
                        <button class="btn btn-primary pull-right"><i class="icon-checkmark"></i> 전체메일발송</button>
                    </form>
                    <form action="/admin/send_all_msm" method="post" id="depositForm">
                        <button class="btn btn-primary pull-right"><i class="icon-checkmark"></i> 전체문자발송</button>
                    </form>

                    <a class="btn btn-primary pull-right" href="/access/scan_qr"><i class="icon-add"></i> 출결
                        QR페이지</a>

                </div>
            </div>

            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th></th>
                        <th>접수번호</th>
                        <th style="min-width: 100px">참석자유형</th>
                        <th>참석자구분</th>
                        <th>이름</th>
                        <th>소속</th>
                        <th>이메일</th>
                        <th>전화번호</th>
                        <th>QR 문자 전송</th>
                        <th>메일전송</th>
                        <th>입장시간</th>
                        <th>퇴장시간</th>
                        <th>QR생성</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $item) {
                        echo '<tr>';
                        echo '<td style="text-align: center;"><input type="checkbox" name="depositChk" class="depositChk" value="' .  $item['registration_no'] . '"></td>';
                        // echo '<td>' . $item['type3'] . '</td>';
                        // echo '<td>' . substr($item['time'], 0, 10) . '</td>';
                        echo '<td>' . $item['registration_no'] . '</td>';
                        echo '<td>' . $item['type'] . '</td>';
                        echo '<td>' . $item['type2'] . '</td>';
                        echo '<td class="user_d"><a href="/admin/user_detail?n=' . $item['registration_no'] . '"target="_blank">' . $item['nick_name'] . '</a></td>';
                        echo '<td>' . $item['org'] . '</td>';
                        echo '<td>' . $item['email'] . '</td>';
                        echo '<td>' . $item['phone'] . '</td>';
                        echo '<td>';

                        if ($item['QR_SMS_SEND_YN'] == "Y") {
                            echo '<a href="/admin/send_msm?n=' . $item['registration_no'] . '" target="_blank"><div class="btn btn-success qr_btn">문자발송</div></a>';
                        } else {
                            echo '<a href="/admin/send_msm?n=' . $item['registration_no'] . '"target="_blank" ><div class="btn btn-non-success qr_btn">문자발송</div></a>';
                        }
                        echo '</td>';
                        echo '<td>';
                        if ($item['QR_MAIL_SEND_YN'] == "Y") {
                            echo '<a href="/admin/qr_email?n=' . $item['registration_no'] . '" target="_blank"><div class="btn btn-non-warning qr_btn" >메일발송</div></a>';
                        } else {
                            echo '<a href="/admin/qr_email?n=' . $item['registration_no'] . '" target="_blank"><div class="btn btn-warning qr_btn" >메일발송</div></a>';
                        }

                        echo '</td>';
                        echo '<td style="text-align: center;">' . $item['mintime'] . '</td>';
                        echo '<td style="text-align: center;">' . $item['maxtime'] . '</td>';
                        echo '<td>';
                        echo '<a  href="/admin/qr_layout?n=' . $item['registration_no'] . '" target="_blank"><div class="btn btn-info qr_btn" >QR보기</div></a>';
                        echo '</td>';

                        // echo $item['deposit'] . '</td>';
                        // if ($item['qr_chk'] == "N") {
                        //     echo '<td style="color:red;">';
                        //     echo '<a href="/admin/qr_generate?n=' . $item['phone'] . '"><div class="btn btn-danger qr_btn" >QR 생성</div></a>';
                        //     echo '</td>';
                        // } else {
                        //     echo '<td style="color:red;">';
                        //     echo '<a href="/admin/qr_layout?n=' . $item['phone'] . '"><div class="btn btn-success" >QR 보기</div></a>';
                        //     echo '</td>';
                        // }


                        // echo '<td>' . $item['mintime'] . '</td>';
                        // echo '<td>' . $item['maxtime'] . '</td>';
                        // echo '<td>' . $item['memo'] . '</td>';
                        echo '</tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->
        <div class="footer text-muted">
            © 2023. <a href="#">온라인 학술대회</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">(주)인투온</a>
        </div>
    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->
<script>
    //        $('#allChk').click(function(){
    //            if($('input:checkbox[id="allChk"]').prop('checked')){
    //                $('input[type=checkbox]').prop('checked',true);
    //            }else{
    //                $('input[type=checkbox]').prop('checked',false);
    //            }
    //        })


    $('.depositChk').click(function() {
        // var formName = $('#depositForm');

        // var formName2 = $('#nametagForm');
        // var formName3 = $('#deposit_mail_Form');
        var userId = $(this).val();
        var checkHtml = '<input type="hidden" class="userId user' + userId + '" name="userId[]" value="' + userId +
            '" id="">'

        if ($(this).prop('checked')) {
            const loading = document.querySelector(".loading")
            loading.style.display = ""
            // formName.append(checkHtml);
            // formName3.append(checkHtml);
        } else {
            $('.user' + userId).remove();
        }
    })

    $('#depositForm').click(function() {
        var formName4 = $('#depositForm');
        $('.depositChk').prop('checked', true).each(function() {
            const loading = document.querySelector(".loading_box")
            loading.style.display = ""
            var userId = $(this).val();
            console.log(userId)
            var checkHtml = '<input type="hidden" class="userId user' + userId +
                '" name="userId[]" value="' + userId +
                '" id="">';
            formName4.append(checkHtml);
        });
    });

    $('#deposit_mail_Form').click(function(e) {
        var formName6 = $('#deposit_mail_Form');
        $('.depositChk').prop('checked', true).each(function() {
            const loading = document.querySelector(".loading_box")
            loading.style.display = ""
            var userId = $(this).val();
            var checkHtml = '<input type="hidden" class="userId user' + userId +
                '" name="userId[]" value="' + userId +
                '" id="">';
            formName6.append(checkHtml);
        });
    });
</script>
</body>