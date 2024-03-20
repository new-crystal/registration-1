<script src="https://cdn.tailwindcss.com"></script>
<div class="w-full h-screen flex items-center justify-center flex-col">
    <form id="reviewer_form" action="/score" method="post" class="w-full h-screen flex items-center justify-center flex-col">
        <div class="w-2/5">
            <p class="font-semibold mb-1 font-sans">발표형식</p>
            <select id="oral"  class="border p-2 border-solid w-full">
                <option value="" selected hidden>Choose</option>
                <option value="Oral">Oral</option>
                <option value="Poster">Poster oral</option>
            </select>
            <input name="email" id="email" class="border p-2 border-solid w-full" hidden/>
        </div>
        <div class="w-2/5" style="display: none;" id="oral_select_box">
            <p class="font-semibold mb-1 font-sans">코드 번호</p>
            <select  class="border p-2 border-solid w-full" id="oral_select">
                <option value="" selected hidden>Choose</option>
                <option value="OP1">OP1</option>
                <option value="OP2">OP2</option>
                <option value="OP3">OP3</option>
                <option value="OP4">OP4</option>
                <option value="OP5">OP5</option>
                <option value="OP6">OP6</option>
            </select>
        </div>
        <div class="w-2/5" style="display: none;" id="poster_select_box">
            <p class="font-semibold mb-1 font-sans">코드 번호</p>
            <select  class="border p-2 border-solid w-full" id="poster_select">
                <option value="" selected hidden>Choose</option>
                <option value="PP1">PP1</option>
                <option value="PP2">PP2</option>
                <option value="PP3">PP3</option>
                <option value="PP4">PP4</option>
                <option value="PP5">PP5</option>
                <option value="PP6">PP6</option>
                <option value="PP7">PP7</option>
                <option value="PP8">PP8</option>
                <option value="PP9">PP9</option>
                <option value="PP10">PP10</option>
            </select>
            <input name="code" id="code" class="border p-2 border-solid w-full" hidden/>
        </div>
        <div class="mt-2 w-2/5">
            <p class="font-semibold mb-1 font-sans">심사자 번호</p>
            <select  class="border p-2 border-solid w-full" id="num_select">
                <option value="" selected hidden>Choose</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
                <option value="J">J</option>
            </select>
            <input name="num" id="num" class="border p-2 border-solid w-full" hidden/>
        </div>
        <div class="mt-2 w-2/5">
            <p class="font-semibold mb-1 font-sans">비밀번호</p>
            <input type="password" name="password" id="password" class="border p-2 border-solid w-full"/>
        </div>
        <button id="submit" class="mt-4 py-2 px-4 bg-neutral-300 hover:bg-cyan-400 font-semibold">로그인</button>
    </form>
</div>
<script>

    const submitBtn = document.querySelector("#submit");

    const oralSelect = document.querySelector("#oral");
    
    const oralBox = document.querySelector("#oral_select_box");
    const posterBox = document.querySelector("#poster_select_box");

    const oralCodeSelect = document.querySelector("#oral_select")
    const posterSelect = document.querySelector("#poster_select")
    const numSelect = document.querySelector("#num_select");

    let firstValue = "";

    oralSelect.addEventListener("change", (e)=>{

        firstValue = e.target.value;
        // console.log(firstValue)
        if(firstValue === "Oral"){
            oralBox.style.display = "";
            posterBox.style.display = "none";
        }else if(firstValue === "Poster"){
            oralBox.style.display = "none";
            posterBox.style.display = "";
        }
    })

    function getOralCode(){

        let oralCode = "";      

        if(firstValue === "Oral"){
            oralCode = (oralCodeSelect.options[oralCodeSelect.selectedIndex].value);
        }else if(firstValue === "Poster"){
            oralCode = (posterSelect.options[posterSelect.selectedIndex].value);
        }

        if(oralCode){
            return oralCode;
        }else{
            return false
        }
    }

    function getNumCode(){
        let num = "";

        num = numSelect.options[numSelect.selectedIndex].value;

        if(num){
            return num;
        }else{
            return false;
        }
    }

    
    document.querySelector("#reviewer_form").addEventListener("submit", (e)=>{
        e.preventDefault()
        const passwordInput = document.querySelector("#password");
        let submitStatus = true; 

        //비밀번호 확인 // 비밀번호 sicem
        if(passwordInput.value !== "sicem"){
            passwordInput.classList.add("border-rose-600");
            passwordInput.classList.add("border-2");
            alert("비밀번호를 확인해주세요.")
            submitStatus = false;
        }else if(passwordInput.value === "sicem"){
            submitStatus = true;
        }
        const code = getOralCode();
        const num = getNumCode();

        if(code === false){
            alert("코드 번호를 입력해주세요.")
            oralCodeSelect.classList.add("border-rose-600");
            oralCodeSelect.classList.add("border-2");
            submitStatus = false;
        }

        if(num === false){
            alert("심사자 번호를 입력해주세요.")
            numSelect.classList.add("border-rose-600");
            numSelect.classList.add("border-2");
            submitStatus = false;
        }

        if(submitStatus === true){
           
            const n = code+ "-" + num
            const data = {
                code: n
            }
            window.location.href = `/score/abstract_reviewer?n=${n}`;
        }
    })
</script>