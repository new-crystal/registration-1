<style>
.notice {
    padding: 4px;
    border: none;
    border-bottom: 1px solid #ccc;
    background-color: transparent;
    width: 500px;
    height: 4rem;
}

#save {
    padding: 4px 8px;
    background-color: #FFF;
    border: 1px solid #ccc;
}

#save:hover {
    background-color: #ccc;
}
</style>

<div class="notice_container">
    <div class="notice_header">
        <button onclick="addNotice()">추가하기</button>
    </div>
    <div>
        <?php
        // print_r($notice) 
        foreach ($notice as $item) {
            echo '<form id="memoForm" action="/admin/edit_notice"><div style="text-align: center;">
            <input  id="notice" class="notice" value="' .  $item['notice'] . '" readonly/><button type="button" id="save" onclick="delNotice(\'' . $item['idx'] . '\')">삭제</button></div></form>';
        } ?>
    </div>
</div>

<script>
const saveButton = document.querySelector("#save")
const memo = document.querySelector("#notice")
const form = document.querySelector("#memoForm")

form.addEventListener("submit", (event) => {
    event.preventDefault();
    saveMemo();
});

async function saveMemo(idx) {
    const memoValue = memo.value;
    const url = form.action;
    const formData = new FormData(form);

    if (memoValue === "") {
        formData.append('memo', null); // 메모 필드의 값을 공백으로 설정
    } else {
        formData.append('memo', memoValue);
        formData.append('idx', idx);
    }
    try {
        const response = await fetch(url, {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            // 메모 저장 성공
            alert("메모 저장 성공");

        } else {
            // 메모 저장 실패
            alert("메모 저장 실패");
        }
    } catch (error) {
        console.log("메모 저장 중 오류 발생:", error);
    }
}

async function delNotice(idx) {
    const url = "/admin/del_notice"
    const formData = new FormData(form);
    formData.set("idx", idx)
    const response = await fetch(url, {
        method: 'POST',
        body: formData
    });

    if (response.ok) {
        // 메모 저장 성공
        alert("메모 삭제 성공");
        window.location.reload()
    } else {
        // 메모 저장 실패
        alert("메모 삭제 실패");
    }
}

function addNotice(id) {
    const url = `/admin/add_notice`;
    window.open(url, "Certificate", "width=500, height=300, top=30, left=30");
}
</script>