<style>
    #modal{
        background-color: #FFF;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999999999;
    }
    table th, table td{
        word-break: keep-all;
        text-align: center;
    }

    .button{
        background-color: #ddd;
        padding: 4px 8px;
    }

    .title_box{
        width: 100px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        word-break: break-all;
        cursor: pointer;
    }

    .modal_background{
        width: 100%;
        height: calc(100% + 125px);
        position: absolute;
        top: -125px;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999999;
    }

    #pdf_viewer{
        width: 500px;
        height: 800px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999999999;
    }

    #pdf_viewer iframe{
        width:100%;
        height: 100%;
    }

    #pdf_viewer .close_pdf {
        position: absolute;
        z-index: 9999999999;
        right: 0;
        top: -20px;
    }
</style>
<script src="https://cdn.tailwindcss.com"></script>
<?php
$type_text = "";
$category_text = "";

// print_r($abstract);
// print_r($reviewer);
echo $reviewer['code'];

$sliced_code = explode("-", $reviewer['code'])[0];

$type = $sliced_code[0];
switch ($type) {
	case 0:
		$type_text = "Oral";
		break;
	case 1:
		$type_text = "Poster oral I";
		break;
	case 2:
		$type_text = "Poster oral II";
		break;
}

$category = $sliced_code[2];
switch ($category) {
	case 1:
    case 6:
		$category_text = "Diabetes/Obesity/Lipid (clinical)";
		break;
	case 2:
    case 7:
		$category_text = "Diabetes/Obesity/Lipid (basic)";
		break;
	case 3:
    case 8:
		$category_text = "Bone/Muscle";
		break;
	case 4:
    case 9:
		$category_text = "Thyroid";
		break;
	case 5:
    case 10:
		$category_text = "Pituitary/Adrenal/Gonad";
		break;
}

?>
<div class="w-full h-screen flex items-center justify-center flex-col px-10">
    <h1 class="font-semibold text-2xl font-sans"><?php echo $type_text; ?> 채점표</h1>
    <div class="mt-10">
        <table class="border border-solid">
            <tr class="border border-solid">
                <td class="border border-solid py-2 px-4" colspan="3">심사위원정보</td>
            </tr>
            <tr>
                <td class="border border-solid py-2 px-4">파트구분</td>
                <td class="border border-solid py-2 px-4">성함</td>
                <td class="border border-solid py-2 px-4">소속</td>
            </tr>
            <tr>
                <input id="reviewer_idx" value="<?php echo $reviewer['idx']; ?>" hidden/>
                <td class="border border-solid py-2 px-4"> <div class="text_box"><?php echo $category_text; ?></div> </td>
                <td class="border border-solid py-2 px-4"> <?php echo $reviewer['nick_name']; ?> </td>
                <td class="border border-solid py-2 px-4"> <?php echo $reviewer['org']; ?> </td>
            </tr>
        </table>
    </div>
    <div class="mt-10">
        <table class="border border-solid">
            <tr class="border border-solid">
                <td class="border border-solid p-2">No.</td>
                <td class="border border-solid p-2">Abstract No.</td>
                <td class="border border-solid p-2">Presenter No.</td>
                <td class="border border-solid p-2">Affiliation</td>
                <td class="border border-solid p-2">Country</td>
                <td class="border border-solid p-2">Abstract Title</td>
                <td class="border border-solid p-2"></td>
            </tr>
            <?php if(isset($abstract1)){ ?>
                <tr>
                    <td class="border border-solid p-2">1</td>
                    <td class="border border-solid p-2"><?php echo $abstract1['submission_code'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract1['first_name'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract1['org'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract1['nation'];?></td>
                    <td class="border border-solid p-2"><div class="title_box text-blue-700 underline decoration-blue-700" data-id="<?php echo $abstract1['cv_file'];?>"><?php echo $abstract1['title'];?></div></td>
                    <td class="border border-solid p-2"><button class="rating button" id="0" data-id="<?php echo $abstract1['idx'];?>">채점하기</button></td>
                </tr>
                <?php  } ?>
            <?php if(isset($abstract2)){ ?>
                <tr>
                    <td class="border border-solid p-2">2</td>
                    <td class="border border-solid p-2"><?php echo $abstract2['submission_code'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract2['first_name'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract2['org'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract2['nation'];?></td>
                    <td class="border border-solid p-2"><div class="title_box text-blue-700 underline decoration-blue-700" data-id="<?php echo $abstract2['cv_file'];?>"><?php echo $abstract2['title'];?></div></td>
                    <td class="border border-solid p-2"><button class="rating button" id="1" data-id="<?php echo $abstract2['idx'];?>">채점하기</button></td>
                </tr>
                <?php  } ?>
            <?php if(isset($abstract3)){ ?>
                <tr>
                    <td class="border border-solid p-2">3</td>
                    <td class="border border-solid p-2"><?php echo $abstract3['submission_code'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract3['first_name'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract3['org'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract3['nation'];?></td>
                    <td class="border border-solid p-2"><div class="title_box text-blue-700 underline decoration-blue-700" data-id="<?php echo $abstract3['cv_file'];?>"><?php echo $abstract3['title'];?></div></td>
                    <td class="border border-solid p-2"><button class="rating button" id="2" data-id="<?php echo $abstract3['idx'];?>">채점하기</button></td>
                </tr>
                <?php  } ?>
            <?php if(isset($abstract4)){ ?>
                <tr>
                    <td class="border border-solid p-2">4</td>
                    <td class="border border-solid p-2"><?php echo $abstract4['submission_code'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract4['first_name'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract4['org'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract4['nation'];?></td>
                    <td class="border border-solid p-2"><div class="title_box text-blue-700 underline decoration-blue-700" data-id="<?php echo $abstract4['cv_file'];?>"><?php echo $abstract4['title'];?></div></td>
                    <td class="border border-solid p-2"><button class="rating button" id="3" data-id="<?php echo $abstract4['idx'];?>">채점하기</button></td>
                </tr>
                <?php  } ?>
            <?php if(isset($abstract5)){ ?>
                <tr>
                    <td class="border border-solid p-2">5</td>
                    <td class="border border-solid p-2"><?php echo $abstract5['submission_code'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract5['first_name'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract5['org'];?></td>
                    <td class="border border-solid p-2"><?php echo $abstract5['nation'];?></td>
                    <td class="border border-solid p-2"><div class="title_box text-blue-700 underline decoration-blue-700" data-id="<?php echo $abstract5['cv_file'];?>"><?php echo $abstract5['title'];?></div></td>
                    <td class="border border-solid p-2"><button class="rating button" id="4" data-id="<?php echo $abstract5['idx'];?>">채점하기</button></td>
                </tr>
                <?php  } ?>
        </table>
    </div>

    <div class="modal_background" style="display: none;"></div>
    <div id="modal" style="display: none;" class="p-4">
        <table>
            <tr>
                <th class="border border-solid py-2 px-4">연구의 창의성<br/>(1점~10점)</th>
                <th class="border border-solid py-2 px-4">방법의 타당성<br/>(1점~10점)</th>
                <th class="border border-solid py-2 px-4">결과의 영향력<br/>(1점~10점)</th>
                <th class="border border-solid py-2 px-4">발표의 우수성<br/>(1점~10점)</th>
                <th class="border border-solid py-2 px-4">COI</th>
                <th class="border border-solid py-2 px-4">총점<br/>(40점)</th>
                <th class="border border-solid py-2 px-4">채점</th>
            </tr>
            <tr>
                <td class="border border-solid py-2 px-4">
                    <select id="select1" onchange="getSum()">
                        <option value="1" selected>1점</option>
                        <option value="2">2점</option>
                        <option value="3">3점</option>
                        <option value="4">4점</option>
                        <option value="5">5점</option>
                        <option value="6">6점</option>
                        <option value="7">7점</option>
                        <option value="8">8점</option>
                        <option value="9">9점</option>
                        <option value="10">10점</option>
                    </select>
                </td>
                <td class="border border-solid py-2 px-4">
                <select id="select2" onchange="getSum()">
                        <option value="1" selected>1점</option>
                        <option value="2">2점</option>
                        <option value="3">3점</option>
                        <option value="4">4점</option>
                        <option value="5">5점</option>
                        <option value="6">6점</option>
                        <option value="7">7점</option>
                        <option value="8">8점</option>
                        <option value="9">9점</option>
                        <option value="10">10점</option>
                    </select>
                </td>
                <td class="border border-solid py-2 px-4">
                <select id="select3" onchange="getSum()">
                        <option value="1" selected>1점</option>
                        <option value="2">2점</option>
                        <option value="3">3점</option>
                        <option value="4">4점</option>
                        <option value="5">5점</option>
                        <option value="6">6점</option>
                        <option value="7">7점</option>
                        <option value="8">8점</option>
                        <option value="9">9점</option>
                        <option value="10">10점</option>
                    </select>
                </td>
                <td class="border border-solid py-2 px-4">
                    <select id="select4"  onchange="getSum()">
                        <option value="1" selected>1점</option>
                        <option value="2">2점</option>
                        <option value="3">3점</option>
                        <option value="4">4점</option>
                        <option value="5">5점</option>
                        <option value="6">6점</option>
                        <option value="7">7점</option>
                        <option value="8">8점</option>
                        <option value="9">9점</option>
                        <option value="10">10점</option>
                    </select>
                </td>
                <td class="border border-solid py-2 px-4">
                    <select id="select5"  onchange="getSum()" >
                        <option value="N" selected>X</option>
                        <option value="Y">O</option>
                    </select>
                </td>
                <td class="border border-solid py-2 px-4" id="sum">4</td>
                <td class="border border-solid py-2 px-4">
                    <button id="completed" class="button">채점 완료</button>
                </td>
            </tr>
        </table>
        <div>
            <h6 class="p-2 font-semibold">[현장 심사 안내]</h6>
            <p class="p-2">1. 초록의 발표자 또는 공저자인 경우 COI에 O로 체크하신 후 해당 초록에 대한 심사는 심사에서 제외하여 주십시오.</p>
            <p class="p-2">2. 각 심사 항목은 각각 10점 만점입니다. 각 항목의 중간 점수를 5점으로 고려하시어 심사를 진행하여 주십시오.</p>
            <p class="p-2">3. 동점자 최소화를 위해 변별력 있게 점수를 부여해 주십시오.</p>
            <p class="p-2">4. Poster oral 수상 예정 인원: 30명 (양일 기준, 5개 분야별 10인 발표)</p>
        </div>
    </div>

    <div id="pdf_viewer" style="display: none;">
        <button class="close_pdf"><i class="icon-cross2"></i>창닫기</button>
       <iframe class="iframe" frameborder="0" width="500" height="800"></iframe>      
    </div>
    
    <input name="etc1" class="etc1" hidden/>
    <button id="submit" class="mt-10 py-2 px-4 bg-neutral-300 hover:bg-cyan-400 font-semibold">제출하기</button>
</div>
<script>
    const rateBtnList = document.querySelectorAll(".rating");
    const modal = document.querySelector("#modal");
    const modalBackground = document.querySelector(".modal_background");
    const sumTd = document.querySelector("#sum");

    //채점완료 버튼
    const completedBtn = document.querySelector("#completed");
    //제출하기 버튼
    const submitBtn = document.querySelector("#submit");

    const titleList = document.querySelectorAll(".title_box")
    const pdfViewer = document.querySelector("#pdf_viewer");
    const iframe = document.querySelector(".iframe");
    const closedPdf = document.querySelector(".close_pdf");

    const select1 =  document.querySelector("#select1");
    const select2 =  document.querySelector("#select2");
    const select3 =  document.querySelector("#select3");
    const select4 =  document.querySelector("#select4");
    const select5 =  document.querySelector("#select5");

    let data = {};
    let sumList = [];
    let etc1 = 0;

    //채점하기 버튼 클릭 이벤트
   rateBtnList.forEach((btn)=>{
        btn.addEventListener("click", (e)=>{
            showModal(e)
        })
   })

   //modal 채점 완료 버튼 이벤트
   completedBtn.addEventListener("click", async ()=>{
 
        saveData(modal.dataset.index)
    
        modal.style.display = "none";
        modalBackground.style.display = "none";

        rateBtnList.forEach((btn)=>{
        if(modal.dataset.id === btn.dataset.id){
            btn.innerText = "채점완료";
            btn.style.background = "rgb(59 130 246)"
        }
    })

    sumList[modal.dataset.index] = sumTd.innerText * 1;
   })

   //data 저장함수
   function saveData(index) {

        const abstract_idx = modal.dataset.id;
        const reviewer_idx = document.querySelector("#reviewer_idx").value;

        let value1 =  select1.options[select1.selectedIndex].value;
        let value2 =  select2.options[select2.selectedIndex].value;
        let value3 =  select3.options[select3.selectedIndex].value;
        let value4 =  select4.options[select4.selectedIndex].value;
        let value5 =  select5.options[select5.selectedIndex].value;

        if(value5 === 'Y'){
            value1 = 0;
            value2 = 0;
            value3 = 0;
            value4 = 0;
        }

        data[index] = {
            abstract_idx: abstract_idx,
            reviewer_idx: reviewer_idx,
            score1: value1,
            score2: value2,
            score3: value3,
            score4: value4,
            coi: value5
        };
}

   //제출하기 버튼 이벤트
   submitBtn.addEventListener("click", ()=>{
        let submitStatus = true;
        rateBtnList.forEach((btn)=>{
            if(btn.innerText !== "채점완료"){
                btn.style.background = "rgb(225 29 72)";
                submitStatus = false;
            }
        })
        
        if(submitStatus === false){
            alert("채점을 완료해주세요.")
        }else{
            if (window.confirm("채점을 제출하시겠습니까?")) {
                postAjax();
            }
        }
   })

   //ajax 보내기
   function postAjax(){
    const url = `/score/add_sum`;

    //평균구하기
    const average = calculateAverage(sumList);
    const scoreList = [];
    
    //조정점수 구하기
    sumList.map((sum)=>{
        if(sum !== 0){
            scoreList.push(sum * 15 / average)
        }else{
            scoreList.push(0)
        }
    })

    // 조정점수 넣기
    scoreList.forEach((score, index) => {
        data[index]['etc1'] = score;
    });
    
    // console.log(sumList);
    // console.log(scoreList);

    $.ajax({
		type: "POST",
		url : url,
		data: data,
		success: function(result){
            alert("채점을 해주셔서 감사합니다.");
            window.location.href = "/score";
        },
		error:function(e){  
            console.log(e)
            alert("점수 저장 이슈가 발생했습니다. 관리자에게 문의해주세요.")
		}
	})  
   }

   //제목 클릭 => pdf 뷰어
   titleList.forEach((title)=>{
    title.addEventListener("click", (e)=>{
        showPdfViwer(e)
    })
   })

   //modal 보이는 함수
   function showModal(e){

        modal.style.display = "";
        modalBackground.style.display = "";
        modal.dataset.id = e.target.dataset.id;
        modal.dataset.index = e.target.id;

        const sel1 = select1.options;
        const sel2 = select2.options;
        const sel3 = select3.options;
        const sel4 = select4.options;
        const sel5 = select5.options;
        const selList = [sel1, sel2, sel3, sel4, sel5];

        //select box 초기화
        selList.map((sel)=>{
            for(let i = 0; i < sel.length; i++){
                if(sel[i].value == "1"){
                    sel[i].selected = true;
                }else{
                    sel[i].selected = false;
                }
            }
        })
        sumTd.innerText = "4";

        const index = modal.dataset.index; 

        //채점한 초록 수정할 경우 기존 점수 부여
        if(data[index]){
            const score1 = data[index].score1;
            const score2 = data[index].score2;
            const score3 = data[index].score3;
            const score4 = data[index].score4;
            const score5 = data[index].coi;

            //coi가 Y 일 때
            if(score5 === "Y"){
                sel5[1].selected = true;
                sel5[0].selected = false;

                sumTd.innerText = 0;

            //coi가 N 일 때
            }else if(score5 === "N"){
                sel5[0].selected = true;
                sel5[1].selected = false;

                sel1[score1*1 - 1].selected = true;     
                sel2[score2*1 - 1].selected = true;
                sel3[score3*1 - 1].selected = true;
                sel4[score4*1 - 1].selected = true;
                sumTd.innerText = score1*1 + score2*1 + score3*1 + score4*1;
            }    
        }
   }

   //점수 합계 구하는 함수
   function getSum(){
        const value1 =  select1.options[select1.selectedIndex].value;
        const value2 =  select2.options[select2.selectedIndex].value;
        const value3 =  select3.options[select3.selectedIndex].value;
        const value4 =  select4.options[select4.selectedIndex].value;
        const value5 =  select5.options[select5.selectedIndex].value;

        if(value5 === "N"){
            sumTd.innerText = value1*1 + value2*1 + value3*1 + value4*1;
        }else if(value5 === "Y"){
            sumTd.innerText = 0;
        }
   }

   //pdf 뷰어 보이는 함수
   function showPdfViwer(e){
        const url = e.target.dataset.id;
        modalBackground.style.display = "";
        pdfViewer.style.display = "";
        iframe.setAttribute("src", url)

        closedPdf.addEventListener("click", ()=>{
        modalBackground.style.display = "none";
        pdfViewer.style.display = "none";
   })
   }

   //평균 구하는 함수 -> COI가 Y(sum이 0)일 경우 제외
   function calculateAverage(arr) {
    let sum = 0;
    let count = 0; // 0이 아닌 값의 개수를 세기 위한 변수

    for (let i = 0; i < arr.length; i++) {
        if (arr[i] !== 0) {
            sum += arr[i];
            count++; // 0이 아닌 값일 때만 count를 증가시킴
        }
    }

    // 0이 아닌 값이 없을 경우 예외 처리
    if (count === 0) {
        return 0;
    }

    return sum / count;
}

</script>