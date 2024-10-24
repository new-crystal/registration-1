<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On-site registration</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <style>
        #on-site *{
            font-family: "Nanum Gothic", sans-serif;
        }
        input:focus {
            outline: none;
        }

        input[type=checkbox] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            transform: translateY(4.5px);
        }

        input[type=radio] {
            width: 14px;
            height: 16px;
            margin-right: 10px;
            transform: translateY(2.5px);
        }

        span {
            color: #c1121f;
            font-weight: 600;
        }

        P {
            font-size: 1.1rem;
            line-height: 1.75rem;
            font-weight: 600;
            margin-top: 12px !important;
            margin-bottom: 8px !important;
            margin: 0;
        }

        p.inline-block::before{
            content: '';
            display: inline-block;
            width: 9px;
            height: 9px;
            background: transparent;
            border: 3px solid #c16500;
            margin-bottom: 2px;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
        }

        h2 {
            font-size: 18px !important;
            font-weight: 600 !important;
        }

        input[type=text] {
            border: 1px solid #ddd;
            padding: 8px 16px;
            height: 2.25rem;
            /* width: 300px; */
        }

        label {
            font-weight: 600;
            font-size: 1rem;
            margin-right: 1rem;
        }

        textarea {
            height: 150px;
            background-color: #fff;
        }

        table {
            border-collapse: collapse;
        }


        .tbl_type01 {
            border: 1px solid #7d8597;
            border-top: 2px solid #7d8597;
            text-align: center;
            border-collapse: collapse;
        }

        .tbl_type01 th,
        .tbl_type01 td {
            border: 1px solid #7d8597;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .tbl_type01 th,
        .tbl_type01 td {
            border: 1px solid #7d8597;
            padding : 8px;
        }

        .tbl_type01 th label,
        .tbl_type01 td label{
            font-size: 0.8rem;
        }

        th {
            height: 50px;
            background-color: #e0e3eb;
        }

        .container {
            width: 1300px;
            padding: 0;
            margin: 20px auto;
        }

        .confirm_box {
            width: 100%;
            /* height: 200px; */
            text-align: center;
            /* border: 1px solid #eee; */
        }

        .confirm_box_title {
            text-align: center;
            background-color: rgb(4, 151, 230);
            color: #fff;
            font-weight: 500;
        }

        .all_checkbox {
            display: flex;
            width: 100%;
            height: 100px;
            align-items: center;
            justify-content: center;
        }

        .personal_checkbox {
            display: flex;
            flex-direction: column;
            margin-bottom: 50px;
        }

        .personal_checkbox>div {
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: left;
        }

        .next_btn_box,
        .final_btn_box {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .next_btn_box>button,
        .final_btn {
            width: 30%;
            height: 50px;
            font-size: 24px;
            border: 1px solid #7d8597;
            margin: 20px;
        }

        .full_input {
            width: 70%;
        }

        .tbl_type01 td {
            padding: 8px;
            text-align: left;
        }

        .wrap_2_2>table {
            border: none;
        }

        .category {
            height: 80px;
        }

        .select_category {
            width: 95%;
            height: 40px;
            border: 1px solid #ddd;
        }

        .member {
            height: 40px;
            display: flex;
            align-items: center;
        }

        .submit_btn {
            width: 150px;
            height: 50px;
            background-color: #e1e1e1;
        }

        .mo_wrap {
            margin-bottom: 1rem;
        }

        #mobile_form {
            /* transform: translateY(6rem); */
            clear:both;
        }

        #scroll::-webkit-scrollbar {
            display: none;
        }

        #scroll {
            -ms-overflow-style: none;
            /* 인터넷 익스플로러 */
            scrollbar-width: none;
            /* 파이어폭스 */
        }

        .mo-table th,
        .mo-table td {
            padding: 1rem;
            border: 1px solid #eee;
            text-align: center;
        }

        .mo-table td {
            width: 27rem;
        }

        .mo-table th {
            width: 7rem;
        }

        .mo-table {
            margin-top: 5rem;
        }


        @media screen and (max-width:500px) {
            p, span, label {
                font-size: 0.9rem !important;
            }

            .ln {
                font-size: 0.65rem !important;
            }

            .mo-table td {
                padding: 0;
            }

            .right {
                margin-right: 2.9rem;
            }

            .sn {
                font-size: 0.73rem;
            }

            .tbl_type01 td {
                padding: 0;
                font-size: 0.7rem;
            }

            .next_btn_box>button,
            .final_btn {
                font-size: 20px;
                width: 15rem;
            }

            .text-base {
                font-size: 0.7rem;
                line-height: 1.5rem;
            }
        }

        .term_wrap {
            margin-top: 100px;
            width:90%;
            margin: 100px auto 0 auto;
        }

        .term_wrap .term_box{
            max-height: 200px;
            overflow-y: scroll;
            border: 1px solid #c6c4c4;
            padding: 20px;
            margin-bottom: 10px;
        }
        .term_wrap .title{
            font-weight: bold;
            font-size: 20px;
        }
        .term_label{
            float:right
        }
    </style>
</head>

<body id="on-site" class="flex items-center justify-center">
    
    <!-- <div id="scroll" class="w-full h-full flex items-center justify-center overflow-x-hidden overflow-y-scroll relative max-w-5xl"> -->
        <div class="w-full ">
            <div class="header fixed z-10">
                <img class="header_img" src="../../assets/images/access_header.jpg" />
                <div class="w-full text-center text-2xl font-semibold bg-gradient-to-r from-amber-400 to-amber-800 p-3 text-white mx-auto">
                    <h1>현장 등록</h1>
                </div>
            </div>
            <section id="container" class="w-full max-w-5xl mx-auto pt-60">
            <div class="term_wrap">
                <h3 class="title mb-2">개인정보 수집 및 이용에 관한 안내</h3>
                <div class="term_box">
                            <strong>목적</strong>
                                <h6>대한내분비학회는 2024 대한내분비학회 추계학술대회를 위한 온라인 현장 등록 서비스를 제공합니다. 귀하의 개인정보를 기반으로 회원가입 및 등록 비용 결제를 완료할 수 있습니다.</h6>
                            <strong>개인정보 수집</strong>
                                <h6>대한내분비학회는 2024 대한내분비학회 추계학술대회에서는 온라인 현장 등록을 완료하기 위해 귀하께서 개인정보를 제공하셔야 합니다. 이름, 신분증(ID) 이메일, 비밀번호, 생년월일, 소속 기관/단체, 부서, 휴대전화 및 전화번호를 입력하도록 요청됩니다.</h6>
                            <strong>개인정보 보관</strong>
                                <h6>대한내분비학회는 2024 대한내분비학회 추계학술대회는 귀하에게 회의 업데이트 및 뉴스레터와 같은 유용한 서비스를 제공하기 위해 귀하의 개인정보를 저장할 것입니다.</h6>
                </div>
                <div class="term_label flex items-center justify-center">
                    <label for="terms1" id="terms"><input type="checkbox" class="checkbox input required" data-name="terms 1" id="terms1" name="terms1" value="Y">개인정보 수집 및 이용에 동의합니다. </label>
                </div>	
            </div>
                <div id="mobile_form" class="w-11/12 mx-auto px-3 h-screen">
                    <div id="page_1" class="py-1">
                        <div class="mo_wrap">
                            <p class="inline-block">성명<span>*</span></p>
                            <input type="text" id="KoreanName" name="nick_name" class="w-full" placeholder="국문이름을 입력해주세요."  autocomplete='off'/>
                        </div>
                        <div class="mo_wrap">
                            <p class="inline-block">의사면허번호<span>*</span></p>
                            <div>
                                <input type="text" id="ln" name="ln" class="w-[49%]" placeholder="의사면허번호를 입력해주세요."  autocomplete='off'/>
                                <label for="non_ln"> <input type="checkbox" id="non_ln" value="N"/>없음</label>
                                <div>
                                    <span>* 의사면허번호를 정확하게 입력하시지 않으시면, 의협보고시 누락될 수 있습니다.</span>
                                </div>
                            </div>
                        </div>
                        <div class="mo_wrap">
                            <p class="inline-block">전문의번호</p>
                            <div>
                                <input type="text" id="sn" name="sn" class="w-[49%]" placeholder="전문의번호를 입력해주세요."  autocomplete='off'/>
                            </div>
                        </div>
                        <div class="mo_wrap">
                            <p class="inline-block">이메일<span>*</span></p>
                            <div class="flex items-center justify-space">
                                <input type="text" name="email1" id="Email1" maxlength="64" value="" class="w-[49%] mr-2" autocomplete='off'/>
                                <!-- <p>@</p>
                                <input type="text" name="email2" id="Email2" maxlength="64" value="" class="w-[40%] ml-2" autocomplete='off'/>
                                <select name="email3" id="Email3" class="border w-[15%] h-9 ml-3" style="background-color:#ffffff;">
                                    <option value="" selected="selected">직접입력</option>
                                    <option value="naver.com">naver.com</option>
                                    <option value="daum.net">daum.net</option>
                                    <option value="hotmail.com">hotmail.com</option>
                                    <option value="nate.com">nate.com</option>
                                    <option value="yahoo.co.kr">yahoo.co.kr</option>
                                    <option value="paran.com">paran.com</option>
                                    <option value="empas.com">empas.com</option>
                                    <option value="dreamwiz.com">dreamwiz.com</option>
                                    <option value="freechal.com">freechal.com</option>
                                    <option value="lycos.co.kr">lycos.co.kr</option>
                                    <option value="korea.com">korea.com</option>
                                    <option value="gmail.com">gmail.com</option>
                                    <option value="hanmir.com">hanmir.com</option>
                                </select> -->
                            </div>
                            

                        
                        <div class="mo_wrap">
                            <p class="inline-block">휴대폰번호<span>*</span></p>
                            <input type="text" id="phoneNumber" name="phone" class="w-full" placeholder="* -를 제외한 숫자만 입력해주세요" oninput="checkFirstDigit(event)" autocomplete='off'/>
                        </div>
                        <div class="mo_wrap">
                            <p class="inline-block">근무처<span>*</span></p>
                            <div>
                                <select name="office" id="office" class="border p-1 w-2/5 h-9">
					                    <option value="">선택</option>
										<option value="76" _addr="" _new_post="" >기타</option>	
										<option value="1" _addr="인천시 남동구 남동대로 774번길 21" _new_post="21565" >가천대학교 길병원</option>	
										<option value="110" _addr="인천광역시 서구 심곡로 100번길 25" _new_post="22711" >가톨릭관동대학교 국제성모병원</option>	
										<option value="2" _addr="대전시 중구 대흥로 64" _new_post="34943" >가톨릭대학교 대전성모병원</option>	
										<option value="3" _addr="경기 부천시 소사로 327" _new_post="14647" >가톨릭대학교 부천성모병원</option>	
										<option value="4" _addr="서울시 서초구 반포대로 222" _new_post="06591" >가톨릭대학교 서울성모병원</option>	
										<option value="6" _addr="경기도 수원시 팔달구 중부대로 93 " _new_post="16247" >가톨릭대학교 성빈센트병원</option>	
										<option value="5" _addr="서울시 영등포구 63로 10" _new_post="07345" >가톨릭대학교 여의도성모병원</option>	
										<option value="82" _addr="서울특별시 동대문구 왕산로 180" _new_post="02559" >가톨릭대학교 은평성모병원</option>	
										<option value="7" _addr="경기도 의정부시 천보로 271" _new_post="11765" >가톨릭대학교 의정부성모병원</option>	
										<option value="81" _addr="인천광역시 부평구 동수로 56" _new_post="21431" >가톨릭대학교 인천성모병원</option>	
										<option value="69" _addr="서울시 강동구 성안로 150" _new_post="05355" >강동성심병원</option>	
										<option value="84" _addr="강원 춘천시 백령로 156" _new_post="24289" >강원대학교병원</option>	
										<option value="102" _addr="충북 충주시 국원대로 82" _new_post="27376" >건국대학교 충주병원</option>	
										<option value="11" _addr="서울시 광진구 능동로 120-1" _new_post="05030" >건국대학교병원</option>	
										<option value="12" _addr="대전시 서구 관저동로 158" _new_post="35365" >건양대학교병원</option>	
										<option value="79" _addr="대구광역시 북구 학정동 474" _new_post="41404" >경북대학교 칠곡경북대병원</option>	
										<option value="13" _addr="대구시 중구 동덕로 130" _new_post="41944" >경북대학교병원</option>	
										<option value="83" _addr="경상남도 창원시 성산구 삼정자로 11" _new_post="51472" >경상대학교 창원경상대병원</option>	
										<option value="14" _addr="경남 진주시 경남로 79" _new_post="52727" >경상대학교병원</option>	
										<option value="15" _addr="서울시 강동구 동남로 892" _new_post="05278" >경희대학교 강동병원</option>	
										<option value="16" _addr="서울시 동대문구 경희대로 23" _new_post="02447" >경희대학교병원</option>	
										<option value="111" _addr="경상북도 경주시 봉황로 65" _new_post="38144" >계명대학교 경주동산병원</option>	
										<option value="103" _addr="대구 중구 달성로 56" _new_post="41931" >계명대학교 대구동산병원</option>	
										<option value="17" _addr="대구 달서구 달구벌대로 1035" _new_post="41931" >계명대학교 동산병원</option>	
										<option value="19" _addr="서울시 구로구 구로동로 148" _new_post="08308" >고려대학교 구로병원</option>	
										<option value="20" _addr="경기도 안산시 단원구 적금로 123" _new_post="15355" >고려대학교 안산병원</option>	
										<option value="86" _addr="" _new_post="" >고려대학교 안암병원</option>	
										<option value="21" _addr="부산시 서구 감천로 262" _new_post="49267" >고신대학교 복음병원</option>	
										<option value="22" _addr="경기 성남시 분당구 새마을로 177번길 81" _new_post="" >국군수도병원</option>	
										<option value="23" _addr="경기도 고양시 일산로 323" _new_post="10408" >국립암센터</option>	
										<option value="24" _addr="경기도 고양시 일산동구 일산로 100" _new_post="10444" >국민건강보험 일산병원</option>	
										<option value="25" _addr="충남 천안시 동남구 망향로 201" _new_post="31116" >단국대학교병원</option>	
										<option value="112" _addr="대구 북구 칠곡중앙대로 440" _new_post="41438" >대구가톨릭대학교 칠곡가톨릭병원</option>	
										<option value="26" _addr="대구시 남구 두류공원로 17길 33" _new_post="42472" >대구가톨릭대학교병원</option>	
										<option value="27" _addr="대구시 동구 아양로 99" _new_post="41199" >대구파티마병원</option>	
										<option value="97" _addr="경북 경주시 동대로 87" _new_post="" >동국대학교 경주병원</option>	
										<option value="28" _addr="경기도 고양시 일산동구 동국로 27" _new_post="10326" >동국대학교 일산병원</option>	
										<option value="29" _addr="부산시 서구 대신공원로 26" _new_post="49201" >동아대학교병원</option>	
										<option value="30" _addr="경기도 고양시 덕양구 화수로 14번길 55" _new_post="10475" >명지병원</option>	
										<option value="77" _addr="서울시 강서구 강서로 295" _new_post="07639" >미즈메디병원</option>	
										<option value="45" _addr="경남 양산시 물금읍 금오로 20" _new_post="50612" >부산대학교 양산부산대병원</option>	
										<option value="31" _addr="부산시 서구 구덕로 179" _new_post="49241" >부산대학교병원</option>	
										<option value="33" _addr="경기 성남시 분당구 서현로180번길 20" _new_post="13590" >분당제생병원</option>	
										<option value="100" _addr="서울 동대문구 망우로 82" _new_post="02500" >삼육서울병원</option>	
										<option value="32" _addr="경기도 성남시 분당구 구미로 173번길 82" _new_post="13620" >서울대학교 분당서울대병원</option>	
										<option value="36" _addr="서울시 동작구 보라매로 5길 20" _new_post="07061" >서울대학교 서울특별시보라매병원</option>	
										<option value="35" _addr="서울시 종로구 대학로 101" _new_post="03080" >서울대학교병원</option>	
										<option value="39" _addr="서울 중랑구 신내로 156" _new_post="06171" >서울특별시 서울의료원</option>	
										<option value="10" _addr="서울시 종로구 새문안로 29" _new_post="03181" >성균관대학교 강북삼성병원</option>	
										<option value="34" _addr="서울시 강남구 일원로 81" _new_post="06351" >성균관대학교 삼성서울병원</option>	
										<option value="104" _addr="경남 창원시 마산회원구 팔용로 158" _new_post="51353" >성균관대학교 삼성창원병원</option>	
										<option value="99" _addr="경상북도 구미시 1공단로 179" _new_post="39371" >순천향대학교 구미병원</option>	
										<option value="41" _addr="경기 부천시 조마루로 170" _new_post="14584" >순천향대학교 부천병원</option>	
										<option value="43" _addr="서울시 용산구 대사관로 59" _new_post="04401" >순천향대학교 서울병원</option>	
										<option value="42" _addr="충남천안시 동남구 순천향 6길 31" _new_post="31151" >순천향대학교 천안병원</option>	
										<option value="44" _addr="경기도 수원시 영통구 월드컵로 164" _new_post="16499" >아주대학교병원</option>	
										<option value="8" _addr="서울시 강남구 언주로 211" _new_post="06273" >연세대학교 강남세브란스병원</option>	
										<option value="40" _addr="서울시 서대문구 연세로 50-1" _new_post="03722" >연세대학교 세브란스병원</option>	
										<option value="105" _addr="경기 용인시 기흥구 동백죽전대로 363" _new_post="16995" >연세대학교 용인세브란스병원</option>	
										<option value="46" _addr="강원도 원주시 일산로 20" _new_post="26426" >연세대학교 원주세브란스기독병원</option>	
										<option value="113" _addr="경북 영천시 오수1길 10" _new_post="38840" >영남대학교 영천병원</option>	
										<option value="47" _addr="대구시 남구 현충로 170" _new_post="42415" >영남대학교병원</option>	
										<option value="101" _addr="전북 전주시 완산구 서원로 365" _new_post="54987" >예수병원</option>	
										<option value="9" _addr="강원도 강릉시 사천면 방동길 38" _new_post="25440" >울산대학교 강릉아산병원</option>	
										<option value="38" _addr="서울시 송파구 올림픽로 43길 88" _new_post="05505" >울산대학교 서울아산병원</option>	
										<option value="48" _addr="울산 동구 방어진순환도로 877" _new_post="44033" >울산대학교병원</option>	
										<option value="114" _addr="경기 군포시 산본로 321" _new_post="15865" >원광대학교 산본병원</option>	
										<option value="49" _addr="전북 익산시 무왕로 895" _new_post="54538" >원광대학교병원</option>	
										<option value="50" _addr="서울시 노원구 노원로 75" _new_post="01812" >원자력병원</option>	
										<option value="115" _addr="서울 강남구 도산대로 202" _new_post="06047" >을지대학교 강남을지대병원</option>	
										<option value="52" _addr="서울시 노원구 한글비석로 68" _new_post="01830" >을지대학교 노원을지대병원</option>	
										<option value="51" _addr="대전시 서구 둔산서로 95" _new_post="35233" >을지대학교 대전을지대병원</option>	
										<option value="106" _addr="경기 의정부시 동일로 712" _new_post="11759" >을지대학교 의정부을지대병원</option>	
										<option value="53" _addr="서울 양천구 안양천로 1071" _new_post="07985" >이화여자대학교 목동병원</option>	
										<option value="98" _addr="서울 강서구 공항대로 260" _new_post="07804" >이화여자대학교 서울병원</option>	
										<option value="54" _addr="부산시 부산진구 복지로 75" _new_post="47392" >인제대학교 부산백병원</option>	
										<option value="55" _addr="서울시 노원구 동일로 1342" _new_post="01757" >인제대학교 상계백병원</option>	
										<option value="56" _addr="서울시 중구 마른내로 9" _new_post="04551" >인제대학교 서울백병원</option>	
										<option value="57" _addr="경기도 고양시 일산서구 주화로 170" _new_post="10380" >인제대학교 일산백병원</option>	
										<option value="58" _addr="부산시 해운대구 해운대로 875" _new_post="48108" >인제대학교 해운대백병원</option>	
										<option value="59" _addr="인천시 중구 인항로 27" _new_post="22332" >인하대학교병원</option>	
										<option value="107" _addr="광주 남구 덕남길 80" _new_post="61748" >전남대학교 빛고을전남대병원</option>	
										<option value="75" _addr="전남 화순군 화순읍 서양로 322" _new_post="58128" >전남대학교 화순전남대병원</option>	
										<option value="60" _addr="광주시 동구 제봉로 42" _new_post="61469" >전남대학교병원</option>	
										<option value="61" _addr="전북 전주시 덕진구 건지로 20" _new_post="54907" >전북대학교병원</option>	
										<option value="85" _addr="제주특별자치도 제주시 아란13길 15" _new_post="63241" >제주대학교병원</option>	
										<option value="62" _addr="광주시 동구 필문대로 365" _new_post="61453" >조선대학교병원</option>	
										<option value="116" _addr="경기 광명시 덕안로 110" _new_post="14353" >중앙대학교 광명병원</option>	
										<option value="63" _addr="서울시 동작구 흑석로 102" _new_post="06973" >중앙대학교병원</option>	
										<option value="37" _addr="서울 강동구 진황도로61길 53" _new_post="05368" >중앙보훈병원</option>	
										<option value="109" _addr="서울 강남구 논현로 566 차병원" _new_post="06135" >차의과학대학교 강남차병원</option>	
										<option value="117" _addr="경북 구미시 신시로10길 12" _new_post="39295" >차의과학대학교 구미차병원</option>	
										<option value="65" _addr="경기도 성남시 분당구 야탑로 59" _new_post="13496" >차의과학대학교 분당차병원</option>	
										<option value="118" _addr="경기 고양시 일산동구 중앙로 1205" _new_post="10414" >차의과학대학교 일산차병원</option>	
										<option value="108" _addr="세종특별자치시 보듬7로 20" _new_post="30099" >충남대학교 세종충남대병원</option>	
										<option value="66" _addr="대전시 중구 문화로282" _new_post="35015" >충남대학교병원</option>	
										<option value="67" _addr="충북 청주시 서원구 1순환로 776" _new_post="28644" >충북대학교병원</option>	
										<option value="68" _addr="서울시 영등포구 신길로 1" _new_post="07441" >한림대학교 강남성심병원</option>	
										<option value="78" _addr="경기도 화성시 큰재봉길 7" _new_post="18450" >한림대학교 동탄성심병원</option>	
										<option value="72" _addr="경기도 안양시 동안구 관평로 170번길 22" _new_post="14068" >한림대학교 성심병원</option>	
										<option value="70" _addr="강원도 춘천시 삭주로 77" _new_post="24253" >한림대학교 춘천성심병원</option>	
										<option value="71" _addr="서울시 영등포구 버드나루로7길 12" _new_post="07247" >한림대학교 한강성심병원</option>	
										<option value="73" _addr="경기도 구리시 경춘로 153" _new_post="11923" >한양대학교 구리병원</option>	
										<option value="74" _addr="서울시 성동구 왕십리로 222" _new_post="04763" >한양대학교병원</option>	
									</select>
				                <input type="text" name="office_etc" id="office_etc" value="" class="office_disabled p-2 w-2/5" disabled placeholder="*소속을 입력해주세요" autocomplete='off'/>
                            </div>
                            <!-- <input type="text" id="affiliation" name="org" class="w-full" placeholder="*소속을 입력해주세요"> -->
                        </div>
                        <!-- <div class="mo_wrap">
                            <p class="inline-block">근무처 주소<span>*</span></p>
                            <div>
                                <input type="text" class="w-2/5 mb-2 mr-2 p-2" name="office_zip" id="office_zip" value="" autocomplete='off'/>
                                <a href="#" onclick="sample6_execDaumPostcode()" class="bg-sky-900 text-white px-3 py-2 hover:underline underline-offset-4">우편번호 찾기</a>
                                <div>
                                    <input type="text" class="w-2/5 mt-2 mr-2 p-2" name="office_addr" id="office_addr" value="" class="clear" autocomplete='off'/>
                                    <input type="text" class="p-2 w-4/12" name="office_addr_etc" id="office_addr_etc" value="" placeholder="상세주소를 입력해주세요." autocomplete='off'/>
                                </div>
                            </div>
                        </div> -->
                            <div class="mo_wrap">
                                <p class="inline-block">대한내분비학회 회원 유무<span>*</span></p>
                                <div class="">
                                    <label for="member_y"> <input type="radio" id="member_y" name="member" onchange="changeFee()"/>회원</label>
                                    <label for="member_n"> <input type="radio" id="member_n" name="member" onchange="changeFee()"/>비회원</label>
                                    <div class="member_wrap my-4 hidden">
                                        <input class="p-2 w-3/5 border" placeholder="대한내분비학회 홈페이지 아이디를 입력해주세요." id="kes_id"/>
                                        <!-- <button type="button" class="bg-sky-900 text-white px-3 py-2 ml-2 hover:underline underline-offset-4">인증하기</button> -->
                                        <span class="block my-4">*대한내분비학회 홈페이지 아이디를 입력해주세요.<br>준회원의 경우, 정회원 또는 평생회원으로 전환 후 신청하여 주시기 바랍니다.</span>
                                        <a type="button" class="bg-fuchsia-700 text-white px-3 py-2 hover:underline underline-offset-4" href='https://www.endocrinology.or.kr/member/info.php' target="_blank">대한내분비학회 회원 가입 바로가기</a>
                                    </div>
                                </div>
                            </div>
                            <div class="mo_wrap">
                                <p class="inline-block">참가자 구분<span>*</span></p>
                                <div>
                                    <select class="w-3/5 py-2 px-4 border" id="category_select" onchange="changeFee()">
                                        <option value="">선택해주세요</option>
                                        <option value="일반참가자">일반참가자</option>
                                        <option value="Satellite 1 참가자">Satellite 1 참가자(동아ST)</option> 
                                        <option value="Satellite 2 참가자">Satellite 2 참가자(종근당)</option> 
                                        <option value="Satellite 3 참가자">Satellite 3 참가자(대웅바이오)</option> 
                                        <option value="Satellite 4 참가자">Satellite 4 참가자(오가논)</option> 
                                    </select>
                                </div>
                            </div>
                            <div class="mo_wrap">
                                <p class="inline-block">등록구분<span>*</span></p>
                                <div>
                                    <select class="w-3/5 py-2 px-4 border" id="attendance_select" onchange="changeFee()">
                                        <option value="">선택해주세요</option>
                                        <option value="교수">교수(의사, 비의사)</option>
                                        <option value="전문의">전문의</option>
                                        <option value="개원의">개원의</option>
                                        <option value="봉직의">봉직의</option>
                                        <option value="전임의">전임의</option>
                                        <option value="기초의학자">기초의학자</option>
                                        <option value="공보의, 군의관">공보의, 군의관</option>
                                        <option value="간호사, 영양사">간호사, 영양사</option>
                                        <option value="연구원">연구원</option>
                                        <option value="약사">약사</option>
                                        <option value="기타">기타(기업 등)</option>
                                        <option value="학생">학생(대학생, 대학원생)</option>
                                        <option value="전공의">전공의</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="mo_wrap">
                                <p class="inline-block">Breakfast symposium 참석하시겠습니까?<span>*</span></p>
                                <div class="ml-8">
                                    <p>• 11월 02일(토) 07:30-08:00</p>
                                    
                                    <label for="breakfast_1"><input type="radio" name="breakfast" id="breakfast_1"/>Breakfast symposium 1</label>
                                    <br/>
                                   
                                    <label for="breakfast_2"> <input type="radio" name="breakfast" id="breakfast_2"/>Breakfast symposium 2</label>
                                    <br/>
                                    
                                    <label for="breakfast_3"><input type="radio" name="breakfast" id="breakfast_3"/>미참석</label>
                                </div>
                            </div> -->
<!-- 
                            <div class="mo_wrap">
                                <p class="inline-block">Satellite symposium 참석하시겠습니까?<span>*</span></p>
                                <div class="ml-8">
                                    <p>• 10월 31일(목) 19:00-20:00</p>
                                 
                                    <label for="satellite_1"><input type="radio" name="satellite1" id="satellite_1"/>Satellite symposium 1</label>
                                    <br/>
                                   
                                    <label for="satellite_2"> <input type="radio" name="satellite1" id="satellite_2"/>Satellite symposium 2</label>
                                    <br/>
                                   
                                    <label for="satellite_3"> <input type="radio" name="satellite1" id="satellite_3"/>미참석</label>

                                    <p>• 11월 1일(금) 19:00-20:00</p>
                                   
                                    <label for="satellite_4"> <input type="radio" name="satellite2" id="satellite_4"/>Satellite symposium 3</label>
                                    <br/>
                                    
                                    <label for="satellite_5"><input type="radio" name="satellite2" id="satellite_5"/>Satellite symposium 4</label>
                                    <br/>
                                    
                                    <label for="satellite_6"><input type="radio" name="satellite2" id="satellite_6"/>미참석</label>
                                </div>
                            </div> -->

<!-- 
                            <div class="mo_wrap">
                                <p class="inline-block">등록할인코드를 사용하시겠습니까?<span>*</span></p>
                                <div class="ml-8">
                                   
                                    <label for="promotion_code_y"> <input type="radio" id="promotion_code_y" name="promotion_code_yn"/>예</label>
                                   
                                    <label for="promotion_code_n"> <input type="radio" id="promotion_code_n" name="promotion_code_yn"/>아니오</label>
                                    <div class="mt-4 hidden promotion_wrap">
                                        <input class="p-2 w-3/5 border" placeholder="등록할인코드를 입력해주세요." id="promotion_code" autocomplete='off'/>
                                        <button type="button" class="bg-sky-900 text-white px-3 py-2 ml-2">등록확인</button>
                                    </div>
                                </div>
                            </div> -->

                            <div class="mo_wrap">
                                <p class="inline-block">학술대회 등록 경로는?<span>*</span></p>
                                <div class="">
                                    <div class="mt-4">
                                        <label for="conference_info_1"><input type="checkbox" id="내분비학회 이메일" name="conference_info"/>내분비학회 이메일</label>
                                        <label for="conference_info_2"><input type="checkbox" id="문자" name="conference_info"/>문자</label> 
                                    </div>
                                    <div class="mt-4">
                                        <label for="conference_info_3"> <input type="checkbox" id="유관단체 게시판" name="conference_info"/>유관단체 게시판</label>
                                        <label for="conference_info_4"> <input type="checkbox" id="의사협회 광고" name="conference_info"/>의사협회 광고</label>
                                    </div>
                                    <div class="mt-4">
                                        <label for="conference_info_5"><input type="checkbox" id="지인소개" name="conference_info"/>지인소개</label>
                                        <label for="conference_info_6"><input type="checkbox" id="자발적 참석" name="conference_info"/>자발적 참석</label>
                                    </div>
                                    <div class="mt-4">
                                        <label for="conference_info_7"> <input type="checkbox" id="기타" name="conference_info"/>기타</label>
                                        <input type="text" id="conference_info_etc"  autocomplete='off'/>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="mo_wrap">
                        <p class="inline-block">등록비</p>
                        <div id="fee" class="underline underline-offset-4 text-rose-700 font-bold text-lg"></div>
                    </div>
                    <button id="submit_btn" type="submit" class="block bg-amber-400 text-white font-bold px-3 py-4 mx-auto my-10 w-2/5 hover:underline underline-offset-4">제출하기</button></section>
                </div>
        <!-- </div> -->
    </div>
    </div>
</body>

<script>
    const mobileForm = document.querySelector("#mobile_form");

    const KoreanName = document.querySelector("#KoreanName");

    const phone = document.querySelector("#phoneNumber")

    const email_1 = document.querySelector("#Email1")
    //const email_2 = document.querySelector("#Email2")
    //const email_3 = document.querySelector("#Email3")

    const member = document.querySelector("#member");
    const nonMember = document.querySelector("#non_member")

    // const need = document.querySelector("#need");
    // const nonNeed = document.querySelector("#non_need")

    const affiliationSelect = document.querySelector("#office");
    const affiliationInput = document.querySelector("#office_etc");

    const member_y = document.querySelector("#member_y")
    const member_n = document.querySelector("#member_n")
    const memberWrap = document.querySelector(".member_wrap")
    const memeberInput = document.querySelector("#kes_id")

    const lnInput = document.querySelector("#ln");
    const lnCheckBox = document.querySelector("#non_ln");

    // const participation_n = document.querySelector("#participation_n");
    // const participation_y = document.querySelector("#participation_y");

    // const selectList = document.querySelectorAll(".select");
    // const select1 = document.querySelector(".select_1");
    // const select2 = document.querySelector(".select_2");
    const categorySelect = document.querySelector("#category_select");
    const attendance_select = document.querySelector("#attendance_select");

    const satellite1 = document.querySelector("#satellite_1");
    const satellite2 = document.querySelector("#satellite_2");
    const satellite3 = document.querySelector("#satellite_3");
    const satellite4 = document.querySelector("#satellite_4");
    const satellite5 = document.querySelector("#satellite_5");
    const satellite6 = document.querySelector("#satellite_6");

    const feeBox = document.querySelector("#fee")

    const submitBtn = document.querySelector("#submit_btn");


    let lnChecked = false;
    let selectedOption = "0";
    let selectedCategory = "0"

    /** 근무처 선택 -> 주소 자동 입력 */
    affiliationSelect.addEventListener("change", (event)=>{
        getAddress(event.currentTarget)
    })

    lnCheckBox.addEventListener("change", ()=>{

        lnChecked = lnCheckBox.checked;

        if(lnChecked){
            lnInput.disabled = true;
        }else{
            lnInput.disabled = false;
        }
    })


    /**참가 형태 선택 */
    // participation_n.addEventListener("change", ()=>{
    //     getSelect1Box()
    // })

    // participation_y.addEventListener("change", ()=>{
    //     getSelect1Box()
    // })

    // function getSelect1Box(){
    //     if(participation_n.checked && !participation_y.checked){
    //         select1.style.display = "";
    //         select2.style.display = "none";
    //     }else if(!participation_n.checked && participation_y.checked){
    //         select1.style.display = "none";
    //         select2.style.display = "";
    //     }
    // }
    // categoryList.forEach((category)=>{
    //     category.addEventListener("change",()=>{
    //         selectedCategory = category.value
    //         //console.log("category", category.value)
    //         if(categoryOther.checked){
    //             categoryOtherInput.disabled = false;
    //         }else{
    //             categoryOtherInput.disabled = true;
    //         }
    //     })
    // })

    // selectList.forEach((select)=>{
    //     select.addEventListener("change", ()=>{
    //         //console.log("select", select.value)
    //         selectedOption = select.value;
    //     })
    // })

    /**한국어 유효성 검사 */
    KoreanName.addEventListener('input', (event) => {
        const inputValue = event.target.value;
        const onlyHangul = /^[ㄱ-ㅎㅏ-ㅣ가-힣]+$/;

        if (!onlyHangul.test(inputValue)) {
            alert('국문으로 입력해주세요')
            event.target.value = inputValue.replace(/[^\uAC00-\uD7AF\u1100-\u11FF\u3130-\u318F]+/g, '');
        }
    });

    /**휴대폰 유효성 검사 */
    phone.addEventListener('input', (event) => {
        const inputValue = event.target.value;
        const onlyNumbers = /^[0-9]+$/;

        if (!onlyNumbers.test(inputValue)) {
            event.target.value = inputValue.replace(/\D/g, '');
        }
    });

    /**phone input 첫글자는 무조건 0으로 */
    function checkFirstDigit(event) {
        const inputValue = event.target.value;
        if (inputValue.length > 0 && inputValue[0] !== '0') {
            event.target.value = '';
        }
    }

    // email_3.addEventListener("click", () => {
    //     email_2.value = email_3.options[email_3.selectedIndex].value
    // })
    
    email_1.addEventListener("blur", ()=>{
        checkEmail()
    })

    //email 중복체크

    function checkEmail(){
        const url = '/onSite/checkEmail'
        const data = {
            email : email_1.value
        }
            $.ajax({
                type: "POST",
                url : url,
                data: data,
                success: function(result){
                    //console.log(result)
                    if(result.user !== null){
                        alert('중복된 이메일입니다.')
                        email_1.value = '';
                    }
                },
                error:function(e){  
                    console.log(e)
                    alert("현장등록 이슈가 발생했습니다. 관리자에게 문의해주세요.")
                }
            })
    }

    //회원 유무 check
    member_y.addEventListener("change", ()=>{
        if(member_y.checked){
            memberWrap.classList.remove("hidden")
        }else{
            memberWrap.classList.add("hidden")
        }
    })

    member_n.addEventListener("change", ()=>{
        if(member_y.checked){
            memberWrap.classList.remove("hidden")
        }else{
            memberWrap.classList.add("hidden")
        }
    })

   // let promotion_code_yn = 'N';
    //할인코드 유무 check
    // promotion_code_y.addEventListener("change", ()=>{
    //     if(promotion_code_y.checked){
    //         promotionWrap.classList.remove("hidden");
    //         promotion_code_yn = 'Y'
    //     }else{
    //         promotionWrap.classList.add("hidden")
    //         promotion_code_yn = 'N'
    //     }
    // })

    // promotion_code_n.addEventListener("change", ()=>{
    //     if(promotion_code_y.checked){
    //         promotionWrap.classList.remove("hidden")
    //         promotion_code_yn = 'Y'
    //     }else{
    //         promotionWrap.classList.add("hidden")
    //         promotion_code_yn = 'N'
    //     }
    // })

    submitBtn.addEventListener("click", ()=>{
        onSubmit()
    })

    let officeEtc = false;

    function getAddress(selectElement){
        const selectedIndex = selectElement.selectedIndex;
        const selectedOption = selectElement.options[selectedIndex];
        
        const postcodeInput = document.querySelector("#office_zip");
        const addressInput = document.querySelector("#office_addr");

        // postcodeInput.value = selectedOption.getAttribute('_new_post');
        // addressInput.value = selectedOption.getAttribute('_addr');

        if(selectedOption.getAttribute('_new_post') === ""){
            document.querySelector("#office_etc").disabled = false;
            officeEtc = true;
        }else{
            document.querySelector("#office_etc").disabled = true;
            officeEtc = false;
        }
    }

    //개최정보 선택된 값 가져오기
    function getSelectedCheckboxes() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="conference_info"]');
        let selectedIds = [];


        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                selectedIds.push(checkbox.id);
            }
        });
        return selectedIds;
    }
    
    function changeFee(){
        const attendanceType = attendance_select.options[attendance_select.selectedIndex].value;
        const category = categorySelect.options[categorySelect.selectedIndex].value;

        if(category == "일반참가자"){

            if(member_y.checked){
                    if(attendanceType == "교수" || attendanceType == "전문의" ||attendanceType == "개원의" || attendanceType == "봉직의" || attendanceType == "전임의" ||attendanceType == "기초의학자"){
                        feeBox.innerHTML = "120000원";
                    }
                    else if (attendanceType == "공보의, 군의관" || attendanceType == "간호사, 영양사" ||attendanceType == "연구원" || attendanceType == "약사" || attendanceType == "기타" ){
                        feeBox.innerHTML = "70000원";
                    }
                    else if (attendanceType == "학생" || attendanceType == "전공의"){
                        attendanceType = "0원";
                    }
                 }
                 else if(member_n.checked){
                    if(attendanceType == "교수" || attendanceType == "전문의" ||attendanceType == "개원의" || attendanceType == "봉직의" || attendanceType == "전임의" ||attendanceType == "기초의학자"){
                        feeBox.innerHTML = "170000원";
                    }
                    else if (attendanceType == "공보의, 군의관" || attendanceType == "간호사, 영양사" ||attendanceType == "연구원" || attendanceType == "약사" || attendanceType == "기타" ){
                        feeBox.innerHTML = "90000원";
                    }
                    else if (attendanceType == "학생" || attendanceType == "전공의"){
                        feeBox.innerHTML = "0원";
                    }
                 }
                 else{
                    feeBox.innerHTML = "0원";
                 }
            }else{
                feeBox.innerHTML = "0원";
            }
    }
    
    function onSubmit() {
        //e.preventDefault();
        
        if(!document.querySelector("#terms1").checked){
            alert("개인정보 수집 및 이용에 동의해주세요.");
            document.querySelector("#terms1").focus()
            return false;
        }
        
        if (!KoreanName.value) {
            alert("성함을 입력해주세요.");
            KoreanName.focus();
            window.scrollTo({
                top:0,
                left:0,
                behavior:"smooth"
            })
            return false;
        }

        if(!document.querySelector("#ln").value && !lnCheckBox.checked){
            alert("의사면허번호를 입력해주세요.");
            //lnCheckBox.focus()
            window.scrollTo({
                top:0,
                left:0,
                behavior:"smooth"
            })
            return false;
        }

        if (!email_1.value) {
            alert("이메일을 입력해주세요.");
            email_1.focus()
            return false;
        }

        if (!phone.value) {
            alert("휴대폰번호를 입력해주세요.");
            phone.focus()
            return false;
        }

        if (!affiliationSelect.value) {
            alert("근무처를 선택해주세요.");
            affiliationSelect.focus()
            window.scrollTo({
                top:50,
                left:0,
                behavior:"smooth"
            })
            return false;
        }

        if (officeEtc && !document.querySelector("#office_etc").value) {
            alert("근무처를 입력해주세요.");
            affiliationSelect.focus()
            return false;
        }

        if(!member_y.checked && !member_n.checked){
            alert("대한내분비학회 회원 유무를 확인해주세요.")
            member_y.focus();
            return false;
        }

        if(!member_y.checked && !member_n.checked){
            alert("대한내분비학회 회원 유무를 확인해주세요.")
            member_y.focus();
            return false;
        }

        if(!attendance_select.options[attendance_select.selectedIndex].value){
            alert("등록 구분을 확인해주세요.")
            attendance_select.focus();
            return false;
        }

        // if(!breakfast1.checked && !breakfast2.checked && !breakfast2.checked){
        //     alert("Breakfast symposium 참석여부를 확인해주세요.");
        //     breakfast1.focus();
        //     return false;
        // }

        // if(!satellite1.checked && !satellite2.checked && !satellite3.checked){
        //     alert("Satellite symposium참석여부를 확인해주세요.");
        //     satellite1.focus();
        //     return false;
        // }

        // if(!satellite4.checked && !satellite5.checked && !satellite6.checked){
        //     alert("Satellite symposium참석여부를 확인해주세요.");
        //     satellite1.focus();
        //     return false;
        // }

        if(!categorySelect.options[categorySelect.selectedIndex].value){
            alert("참석자 구분을 확인해주세요.")
            categorySelect.focus();
            return false;
        }

        if (!ln.value) {
            alert("의사면허번호를 입력해주세요.");
            ln.focus()
            return false;
        }

        let etc1 = "미참석";
        let etc2 = "미참석";
        let etc3 = "미참석";

        // if(breakfast1.checked){
        //     etc1 = "Breakfast symposium 1";
        // }else if (breakfast2.checked){
        //     etc1 = "Breakfast symposium 2";
        // }else if (breakfast3.checked){
        //     etc1 = "미참석";
        // }else{
        //      etc1 = "미참석";
        // }

        // if(satellite1.checked){
        //     etc2 = "Satellite symposium 1";
        // }else if (satellite2.checked){
        //     etc2 = "Satellite symposium 2";
        // }else if (satellite3.checked){
        //     etc2 = "미참석";
        // }else{
        //      etc2 = "미참석";
        // }
        
        // if(satellite4.checked){
        //     etc3 = "Satellite symposium 1";
        // }else if (satellite5.checked){
        //     etc3 = "Satellite symposium 2";
        // }else if (satellite6.checked){
        //     etc3 = "미참석";
        // }else{
        //      etc3 = "미참석";
        // }
        
        const url = "/onSite/mobile_kes";
        const data = {
            nick_name : KoreanName.value,
            ln : document.querySelector("#ln").value,
            sn : document.querySelector("#sn").value,
            email : email_1.value,
            phone:phone.value,
            //place: affiliationSelect.options[affiliationSelect.selectedIndex].innerText,
            //place_etc : document.querySelector("#office_etc").value,
            //address: document.querySelector("#office_addr").value + document.querySelector("#office_addr_etc").value,
            member : member_y.checked ? "Y" : "N",
            kes_id : document.querySelector("#kes_id").value,
            option : selectedOption,
            //etc1 : etc1, // Breakfast symposium
            //etc2 : etc2, // Satellite symposium 10월 31일(목)
            //etc3 : etc3, // Satellite symposium 11월 1일(금)
            //etc4 : promotion_code_yn, // 등록할인코드 Y/N
            //promotion_code :  document.querySelector("#promotion_code").value,
            confer_info : getSelectedCheckboxes(),
            type1 : attendance_select.options[attendance_select.selectedIndex].value,
            type2 : categorySelect.options[categorySelect.selectedIndex].value
        }

        $.ajax({
            type: "POST",
            url : url,
            data: data,
            success: function(result){
                window.location.href = `/onSite/success?fee=${feeBox.innerText}`;
            },
            error:function(e){  
                console.log(e)
                alert("현장등록 이슈가 발생했습니다. 관리자에게 문의해주세요.")
            }
	    })  
    }
    // mobileForm.addEventListener("submit", (e)=>{
    //     //e.preventDefault();
    //     onSubmit(e)
    // })
  

</script>

</html>