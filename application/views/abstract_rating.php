<script src="https://cdn.tailwindcss.com"></script>
<div class="w-full h-screen flex items-center justify-center flex-col">
    <form id="reviewer_form" action="/score" method="post" class="w-full h-screen flex items-center justify-center flex-col">
        <div class="w-2/5">
            <p class="font-semibold mb-1 font-sans">E-mail</p>
            <input name="email" id="email" class="border p-2 border-solid w-full"/>
        </div>
        <div class="mt-2 w-2/5">
            <p class="font-semibold mb-1 font-sans">성함</p>
            <input name="nick_name" id="name" class="border p-2 border-solid w-full"/>
        </div>
        <button id="submit" class="mt-4 py-2 px-4 bg-neutral-300 hover:bg-cyan-400 font-semibold">로그인</button>
    </form>
</div>
<script>
    const emailInput = document.querySelector("#email");
    const nameInput = document.querySelector("#name");
    const submitBtn = document.querySelector("#submit");
    
    submitBtn.addEventListener("click", async()=>{
        let submitStatus = true; 

        //email input에 값이 비어있을 경우
        if(emailInput.value === ""){
            emailInput.classList.add("border-rose-600");
            emailInput.classList.add("border-2");
            submitStatus = false;
        }

        //email 조건식 
        if(emailInput.value !== ""){
            var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
            if (!regExp.test(emailInput.value)) {
                alert("이메일 형식을 확인해주세요.");
                emailInput.classList.add("border-rose-600");
                emailInput.classList.add("border-2");
                submitStatus = false;
            }
        }

        //이름의 값이 비어있을 경우
        if(nameInput.value === ""){
            nameInput.classList.add("border-rose-600");
            nameInput.classList.add("border-2");
            submitStatus = false;
        }

        if(submitStatus === true){
            document.querySelector("#reviewer_form").submit();
        }
    })
</script>