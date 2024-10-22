<style>
    .detail_table {
        display: flex;
        align-items: left;
        justify-content: space-between;
        margin-top: 5rem;
    }

    .detail_table>table {
        width: 48%;
        border: 1px solid #ddd;
    }

    .detail_table>table th,
    .detail_table>table td {
        border: 1px solid #ddd;
        padding-left: 15px;
    }

    .detail_table table th {
        width: 25%;
        background-color: #eee;
    }

    .detail_table>table input {
        border: none
    }

    .detail_table>table input:focus {
        outline: 1px solid #000;
    }

    select {
        padding: 4px 8px;
    }
</style>
<?php

?>
<!-- container section start -->
<section id="container" class="">

    <!--main content start-->
    <form action="/event/update_user?n=<?php echo $item['registration_no']; ?>" id="updateForm" name="updateForm">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel form-horizontal">
                    <div class="panel-body">
                        <div class="detail_table">
                            <table>
                                <tr>
                                    <th>Event 1 수령 유무</th>
                                    <td> 
                                        <input id="" type="text" value="<?php echo $item['event1']; ?>" size="16" class="form-control event_1" name="event_1">
                                        <select class="form-control input-lg m-bot15" id="event_1_select">
                                            <option value="" selected="selected">직접입력</option>
                                            <option value="Y">Y</option>
                                            <option value="N">N</option>
                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>Event 1 수령 시간</th>
                                    <td> <input id="dp1" type="text" value="<?php echo $item['event1_time']; ?>" size="16" class="form-control yn" name="event_1_time" readonly>

                                    </td>
                                </tr>
                                <tr>
                                    <th>Event 2 수령 유무</th>
                                    <td> 
                                        <input id="dp1" type="text" value="<?php echo $item['event2']; ?>" size="16" class="form-control event_2" name="event_2">
                                        <select class="form-control input-lg m-bot15" id="event_2_select">
                                            <option value="" selected="selected">직접입력</option>
                                            <option value="Y">Y</option>
                                            <option value="N">N</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Event 2 수령 시간</th>
                                    <td> <input id="dp1" type="text" value="<?php echo $item['event2_time']; ?>" size="16" class="form-control yn" name="event_2_time" readonly>

                                    </td>
                                </tr>
                                <tr>
                                    <th>Event 메모</th>
                                    <td> <input id="dp1" type="text" value="<?php echo $item['event_memo']; ?>" size="16" class="form-control yn" name="event_memo">

                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="detail_table">
                            <table>
                                <tr>
                                    <th>Registration No.</th>
                                    <td style="background-color:#fafafa;"> <input class="form-control" type="text" value="<?php echo $item['registration_no']; ?>" name="registration_no" id="registration_no" readonly></td>
                                </tr>
                                <tr>
                                    <th>이름</th>
                                    <td style="background-color:#fafafa;"> <input class="form-control" type="text" value="<?php echo $item['nick_name']; ?>" name="nick_name" id="nick_name" disabled></td>
                                </tr>

                                <tr>
                                    <th>Affiliation</th>
                                    <td style="background-color:#fafafa;"> <input class="form-control" type="text" value="<?php echo $item['org_nametag']; ?>" name="affiliation" id="org" disabled>

                                    </td>
                                </tr> 
                                <tr>
                                    <th>연락처</th>
                                    <td>
                                        <div style="display:flex;  align-items: center;">
                                            <input class="form-control" type="text" value="<?php echo $item['phone']; ?>" name="phone" id="phone">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th>E-mail</th>
                                    <td><input class="form-control" type="text" value="<?php echo $item['email']; ?>" name="email" id="email"></td>
                                </tr>

                               
                            </table>

                        </div>

                        <div clss="btn_group" style="float: right;">
                            <button type="submit" data-toggle="modal" class="btn btn-primary submit_btn">수정</button>
                            </form>
                        </div>
                    </div>
            </div>
    </section>
    </div>
    </div>

    <!-- Basic Forms & Horizontal Forms-->

</section>
</section>
<script src="/assets/js/form-component.js"></script>
<script src="/assets/js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function() {
        var registration_no = $('#registration_no').val();
        const submitBtn = document.querySelector(".submit_btn")

        submitBtn.addEventListener("click", ()=>{
            $("#updateForm").submit();
        })

    });

    const event_1 = document.querySelector(".event_1");
    const event_1_select = document.querySelector("#event_1_select")

    const event_2 = document.querySelector(".event_2");
    const event_2_select = document.querySelector("#event_2_select")


    event_1_select.addEventListener("change", () => {
        event_1.value = event_1_select.options[event_1_select.selectedIndex].value;
    })

    event_2_select.addEventListener("change", () => {
        event_2.value = event_2_select.options[event_2_select.selectedIndex].value;
    })

</script>


</body>

</html>