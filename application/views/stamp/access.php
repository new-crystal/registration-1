<script src="https://cdn.tailwindcss.com"></script>
<script type="text/javascript" src="/assets/js/admin/lecture_history.js"></script>
<style>
    .qr-info-table {
        margin-top: 1rem;
        border: 2px solid #eee;
        border-collapse: collapse;
        width: 40%;
    }

    .qr-info-table th {
        background-color: #1d3557;
        border-color: #1d3557;
        color: #fff !important;
        font-size: 1.7rem;
        line-height: 2.5rem;
        font-weight: 600;
    }

    .qr-info-table>tr,
    .qr-info-table th {
        border: 2px solid #eee;
        text-align: center;
        font-size: 1.25rem;
        line-height: 2.5rem;
    }

    .qr-info-table td {
        border: 1px solid #eee;
        text-align: left;
        font-size: 1.5rem;
        line-height: 2.5rem;
        padding-left: 4rem;
        /* display: flex; */
        align-items: center;
        /* height: 4rem; */
        font-weight: bold;
    }

    .qr-info-table tr {
        height: 4rem;
        padding: 4px;
    }

    #open {
        background-color: #1d3557;
        float: right;
    }

    .notice {
        width: 500px;
        padding: 4px;
        background-color: #ffbe0b;
    }

    .memoHeader {
        background-color: #fb8500 !important;
    }

    .event1.Y{
        background-color: rgb(252 211 77);
    }

    .event2.Y{
        background-color: rgb(196 181 253);
    }
</style>
<?php

$qrcode = $_GET["qrcode"] ?? "";

?>

<div class="page-container">
    <div class="page-content">

        <div class="content">
            <div class="panel panel-flat">
                <form action="/event/access" id="qr_form" name="qr_form" class="w-full h-[88vh] flex flex-col items-center justify-center bg-slate-50">

                    <div class="w-2/5 flex flex-col items-center justify-center">
                        <h1 class="text-5xl mt-32 font-semibold ">QR CODE 입력 </h1>
                        <div class="w-[850px] flex justify-between">
                            <input id="qrcode_input" name="qrcode" class="w-[400px] h-[50px] mt-20 p-3 " type="text" autofocus placeholder="영문 확인해주세요!!" />
                            <button class="w-[150px] h-[40px] bg-slate-300 mt-20 mb-20 hover:bg-slate-400 active:bg-slate-500 text-black" type="submit" id="submit">등록</button>
                            <button class="w-[150px] h-[40px] bg-indigo-950 mt-20 mb-20 hover:bg-slate-300 active:bg-slate-300 text-white" type="button" id="memo_btn">메모</button>
                        </div>
                    </div>

                    <!-- <div class="w-3/5 h-[1px] bg-slate-400 translate-y-24"></div> -->
                    <div class="w-full h-full bg-white flex flex-col items-left justify-around">
                        <div class="flex h-[80%] flex-col items-center justify-around">
                            <table class="qr-info-table w-2/5" id="qrTable">
                                <colgroup>
                                    <col width="30%" />
                                    <col />
                                </colgroup>
                                <tr>
                                    <th>QR CODE</th>
                                    <td id="" class="qr_text">
                                        <?php echo isset($qrcode) ? $qrcode : ''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>event 1(스탬프)수령 유무</th>
                                    <td id="event_1" class="qr_text">
                                        <?php echo isset($user['event1']) ? $user['event1'] : ''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>event 2(포스터) 수령 유무</th>
                                    <td id="event_2" class="qr_text">
                                        <?php echo isset($user['event2']) ? $user['event2'] : ''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>성함</th>
                                    <td id="en_name" class="qr_text">
                                        <?php echo isset($user['nick_name']) ? $user['nick_name'] : ''; ?>
                                    </td>
                                </tr>
            
                                <tr>
                                    <th>email</th>
                                    <td id="email" class="qr_text">
                                        <?php if (isset($user['email'])) echo $user['email']; ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>Event Memo</th>
                                    <td id="event_memo" class="qr_text">
                                        <?php if (isset($user['event_memo'])) echo $user['event_memo']; ?>
                                    </td>
                                </tr>
                            </table>

                        <div class="w-[550px] flex items-center justify-around *:w-[250px] *:h-[50px] *:border">
                            <button class="hover:bg-amber-300 event_btn event1 <?php echo $user['event1']; ?>" type="button" data-id="1">Event 1 상품 수령 완료</button>
                            <button class="hover:bg-violet-300 event_btn event2 <?php echo $user['event2']; ?>" type="button" data-id="2">Event 2 상품 수령 완료</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="footer text-muted mt-20">
    © 2023. <a href="#">온라인 학술대회</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">(주)인투온</a>
</div> -->

</div>
<!-- /page content -->

</div>

<script>

    const eventBtnList = document.querySelectorAll('.event_btn');
    const memo_btn = document.querySelector('#memo_btn');

    const event_1 = document.querySelector('#event_1');
    const event_2 = document.querySelector('#event_2');


    function yellowBackground(target){
        target.classList.add("bg-amber-300");
    }

    function violetBackground(target){
        target.classList.add("bg-violet-300");
    }

    eventBtnList.forEach((btn)=>{
        btn.addEventListener("click", (e)=>{
            console.log(e.target.classList)
            if(window.location.search !== "" && e.target.classList.contains !== "Y"){
                if(window.confirm(`event ${e.target.dataset.id} 상품 수령을 완료로 변경하시겠습니까`)){
                    window.location.href = `/event/update_gift?num=${e.target.dataset.id}&qrcode=${window.location.search.split("=")[1]}&status=Y`;
                }
            }else if(window.location.search !== "" && e.target.classList.contains == "Y"){
                if(window.confirm(`event ${e.target.dataset.id} 상품 수령을 취소로 변경하시겠습니까`)){
                    window.location.href = `/event/update_gift?num=${e.target.dataset.id}&qrcode=${window.location.search.split("=")[1]}&status=N`;
                }
            }
            else if(window.location.search == ""){
                alert('QR 코드를 입력해주세요!')
            }
        })
    })

    memo_btn.addEventListener('click', (e)=>{
        if(window.location.search !== ""){
            const registerNum = window.location.search?.split("=")[1];
            const url = `/event/add_memo?n=${registerNum}`;
            if (registerNum) {
                const memoWindow = window.open(url, "Certificate", "width=500, height=300, top=30, left=30");

                window.addEventListener("message", (event) => {
                    if (event.source === memoWindow) {
                        const childInputValue = event.data;
                        memo.innerText = childInputValue;
                    }
                });
            }
        }else{
            alert('QR 코드를 입력해주세요!')
        }
    })

    function getEvent(){
        const event1body = document.querySelector("#event_1");
        const event2body = document.querySelector("#event_2");

        if(event1body.innerText == "Y"){
            yellowBackground(event1body)
        }
        if(event2body.innerText == "Y"){
            violetBackground(event2body)
        }
    }

    window.onload = ()=>{
        getEvent()
    }
</script>