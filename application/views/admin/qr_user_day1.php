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
    top: 10%;
    left: 52%;
    transform: translate(-50%, -50%);
}
</style>
<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div style="display: none;" class="loading_box" onclick="alert('진행중입니다.')">

        <svg class="loading" version="1.1" id="L5" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100"
            enable-background="new 0 0 0 0" xml:space="preserve" width="70px" height="70px">
            <circle fill="#fff" stroke="none" cx="6" cy="50" r="6">
                <animateTransform attributeName="transform" dur="1s" type="translate" values="0 15 ; 0 -15; 0 15"
                    repeatCount="indefinite" begin="0.1" />
            </circle>
            <circle fill="#fff" stroke="none" cx="30" cy="50" r="6">
                <animateTransform attributeName="transform" dur="1s" type="translate" values="0 10 ; 0 -10; 0 10"
                    repeatCount="indefinite" begin="0.2" />
            </circle>
            <circle fill="#fff" stroke="none" cx="54" cy="50" r="6">
                <animateTransform attributeName="transform" dur="1s" type="translate" values="0 5 ; 0 -5; 0 5"
                    repeatCount="indefinite" begin="0.3" />
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
                    <!-- <form action="/admin/excel_download" method="post">
                        <button class="btn btn-primary pull-right"><i class="icon-download4"></i> QR기록 다운로드</button>
                    </form> -->
                    <!-- <form action="/admin/send_all_mail" method="post" id="deposit_mail_Form">
                        <button class="btn btn-primary pull-right"><i class="icon-checkmark"></i> 전체메일발송</button>
                    </form>
                    <form action="/admin/send_all_msm" method="post" id="depositForm">
                        <button class="btn btn-primary pull-right"><i class="icon-checkmark"></i> 전체문자발송</button>
                    </form> -->
                    <a class="btn btn-primary pull-right" href="/access/row_scan_qr" target="_blank"><i class="icon-qrcode"></i> 출결
                        QR</a>
                </div>
            </div>

            <table class="table datatable-basic">
                <colgroup>
                    <col width="1%">
                    <col width="5%">
                    <col width="4%">
                    <col width="2%">
                    <col width="5%">
                </colgroup>
                <thead>
                    <tr>
                        <th></th>
                        <th>접수번호</th>
                        <th style="min-width: 100px">참가자유형</th>
                        <th>이름</th>
                        <th>소속</th>

                        <th>day1 입장시간</th>
                        <th>day1 퇴장시간</th>

                        <th>day2 입장시간</th>
                        <th>day2 퇴장시간</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $item) {
                        echo '<tr>';
                        echo '<td style="text-align: center;"><input type="checkbox" name="depositChk" class="depositChk" value="' .  $item['registration_no'] . '"></td>';
                        echo '<td class="reg_num pointer">' . $item['registration_no'] . '</td>';
                        echo '<td>' . $item['attendance_type'] . '</td>';
                        echo '<td class="user_d"><a href="/admin/user_detail?n=' . $item['registration_no'] . '"target="_top">' . $item['last_name'] ." ". $item['first_name'] .'</a></td>';
                        echo '<td>' . $item['org_nametag'] . '</td>';
                        
                        //day 1 출결 시간
                         echo '<td style="text-align: center;">' .'<input type="time" class="mintime_input time_input day1" value="'. $item['mintime_day_1_formatted'] .'"/><button onclick="saveTime(this,`' . $item['registration_no'] . '`)">save</button></td>';
                         echo '<td style="text-align: center;">' .'<input type="time" class="maxtime_input time_input day1" value="'. $item['maxtime_day_1_formatted'] .'"/><button onclick="saveTime(this,`' . $item['registration_no'] . '`)">save</button></td>';

                         //day 2 출결 시간
                         echo '<td style="text-align: center;">' .'<input type="time" class="mintime_input time_input day2" value="'. $item['mintime_day_2_formatted'] .'"/><button onclick="saveTime(this,`' . $item['registration_no'] . '`)">save</button></td>';
                         echo '<td style="text-align: center;">' .'<input type="time" class="maxtime_input time_input day2" value="'. $item['maxtime_day_2_formatted'] .'"/><button onclick="saveTime(this,`' . $item['registration_no'] . '`)">save</button></td>';


                    }
                    ?>

                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->
        <div class="footer text-muted">
            © 2024. <a href="#">온라인 학술대회</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">(주)인투온</a>
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
const regNumList = document.querySelectorAll(".reg_num")

regNumList.forEach((num)=>{
    num.addEventListener("click", ()=>{
        copy(num.innerText)
    })
})

//sujeong / 시간 저장하기
function saveTime(button, reg_no){
    const timeInput = button.parentNode.querySelector('.time_input');
    // console.log(reg_no) //등록번호
    // console.log(timeInput.value) //선택한 시간
    // console.log(timeInput.classList) // day
    let date = ""
    if(timeInput.classList.contains("day1")){
        date = "2024-11-29"
    }
    else if(timeInput.classList.contains("day2")){
        date = "2024-11-30"
    }
    // else if(timeInput.classList.contains("day3")){
    //      date = "2024-11-02"
    // }

    const url = "/access/edit_record"
    const data = {
        date : date,
        time : timeInput.value,
        reg_no : reg_no
    }

    $.ajax({
		type: "POST",
		url : url,
		data: data,
		success: function(result){
            //console.log(result)
            alert('출결시간이 변경되었습니다.');
            window.location.reload()
        },
		error:function(e){  
            console.log(e)
            alert("출결등록 이슈가 발생했습니다. 관리자에게 문의해주세요.")
		}
	})  
    
}

function copy(text) {
    if (navigator.clipboard) {
        navigator.clipboard
            .writeText(text)
            .then(() => {
                alert('클립보드에 복사되었습니다.');
            })
            .catch(() => {
                alert('복사를 다시 시도해주세요.');
            });
    }
}
</script>
</body>