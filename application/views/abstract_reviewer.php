<script src="https://cdn.tailwindcss.com"></script>
<div class="w-full h-screen flex items-center justify-center flex-col">
    <form id="reviewer_form" action="/score" method="post" class="w-full h-screen flex items-center justify-center flex-col">
        <p id="code"></p>
        <div class="w-2/5">
            <p class="font-semibold mb-1 font-sans">성함</p>
            <input name="name" id="name" class="border p-2 border-solid w-full"/>
        </div>
        <div class="w-2/5">
            <p class="font-semibold mb-1 font-sans">소속</p>
            <input name="org" id="org" class="border p-2 border-solid w-full" />
        </div>
        <button id="submit" class="mt-4 py-2 px-4 bg-neutral-300 hover:bg-cyan-400 font-semibold">로그인</button>
    </form>
</div>
<script>

    const nameInput = document.querySelector("#name");
    const orgInput = document.querySelector("#org");
    const codeBox = document.querySelector("#code");

    let code = "";
    
    window.onload = ()=>{
        const params = new URLSearchParams(window.location.search);
        code = params.get("n");

        codeBox.innerText = code;
    }

    
    document.querySelector("#reviewer_form").addEventListener("submit", (e)=>{
        e.preventDefault()

        let submitStatus = true; 

        //이름의 값이 비어있을 경우
        if(nameInput.value === ""){
            nameInput.classList.add("border-rose-600");
            nameInput.classList.add("border-2");
            submitStatus = false;
        }

        //소속 값이 비어있을 경우
        if(orgInput.value === ""){
            orgInput.classList.add("border-rose-600");
            orgInput.classList.add("border-2");
            submitStatus = false;
        }


        if(submitStatus === true){
            
            //이름, 소속 공백 제거
            const data = {
                code,
                nick_name : nameInput.value.replace(/(\s*)/g, ""),
                org : orgInput.value.replace(/(\s*)/g, "")
            }

            //[TODO] 점수 판으로 페이지 이동
            $.ajax({
                type: "POST",
                url : "/score/add_reviewer",
                data: data,
                success: function(result){
                    window.location.href = `/score/abstarct_rating?n=${code}`
                },
                error:function(e){  
                    console.log(e)
                    alert("이슈가 발생했습니다. 관리자에게 문의해주세요.")
                }
	        })  
        }
    })
</script>