<script src="https://cdn.tailwindcss.com"></script>

<?php echo form_open('/admin/memo?n=' . $item['registration_no'], 'id="memoForm" name="memoForm"');
?>
<div class="flex flex-col items-center justify-center w-full h-full">
    <input id="memo" name="memo" class="w-10/12 h-4/6 border p-5"
        value="<?php echo isset($item['memo']) && $item['memo'] != 'null' ? $item['memo'] : ''; ?>">
    </input>
    <div class="flex items-center justify-center w-full mt-5">
        <button type="submit" id="save" class="h-8 w-28 bg-pink-600 text-white mx-5">Save</button>
        <button id="close" type="button" class="h-8 w-28 border border-pink-600 text-pink-600">Close</button>
    </div>
</div>
</form>
<script>
const closeButton = document.querySelector("#close")
const saveButton = document.querySelector("#save")
const memo = document.querySelector("#memo")
const form = document.querySelector("#memoForm")

closeButton.addEventListener("click", () => {
    window.close()
})

form.addEventListener("submit", (event) => {
    event.preventDefault();
    saveMemo();
});

async function saveMemo() {
    const memoValue = memo.value;
    const url = form.action;
    const formData = new FormData(form);
    const registration_no = window.location.search.split("=")[1];

    if (memoValue === "") {
        formData.set('memo', null); // 메모 필드의 값을 공백으로 설정
    } else {
        formData.set('memo', memoValue);
    }
    try {
        const response = await fetch(url, {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            // 메모 저장 성공
            alert("메모 저장 성공");
            const parentWindow = window.opener;
            const buttons = parentWindow.document.querySelectorAll('.qr_btn.memo');

            if (buttons.length !== 0) {
                buttons.forEach((button) => {
                    if (button.dataset.id === registration_no && memoValue === "") {
                        button.classList.remove('bg-indigo-800');
                        button.classList.remove('text-white');
                        button.classList.add('bg-white');
                        button.classList.add('text-indigo-800');
                        button.classList.add('border-indigo-800');
                        window.close();

                    } else if (button.dataset.id === registration_no && memoValue !== "") {
                        button.classList.remove('bg-white');
                        button.classList.add('bg-indigo-800');
                        button.classList.add('text-white');
                        window.close();
                    }
                });
            } else if (buttons.length === 0) {
                window.opener.postMessage(memoValue, "*");
                window.close();
            }

        } else {
            // 메모 저장 실패
            alert("메모 저장 실패");
        }
    } catch (error) {
        console.log("메모 저장 중 오류 발생:", error);
    }
}
</script>