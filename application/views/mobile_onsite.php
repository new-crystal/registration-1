<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On-site registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    input:focus {
        outline: none;
    }

    input[type=checkbox] {
        width: 18px;
        height: 18px;
        margin-right: 10px;
        transform: translateY(0.5px);
    }

    input[type=radio] {
        width: 18px;
        height: 18px;
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
    }

    th {
        height: 50px;
        background-color: rgb(186 230 253);
        ;
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
        transform: translateY(6rem);
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
        p {
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
    </style>
</head>

<body class="flex items-center justify-center">
    <div id="scroll"
        class="w-full h-full flex items-center justify-center overflow-x-hidden overflow-y-scroll relative max-w-5xl">
        <div class="w-full max-w-5xl ">
            <div
                class="w-full max-w-5xl text-center text-2xl font-semibold bg-gradient-to-r from-green-400 to-blue-500 p-3 text-white fixed z-10">
                <h1>On-site registration<br>(현장 등록)</h1>
            </div>
            <section id="container" class="">

                <form action="/onSite/mobile" method="GET" id="mobile_form"
                    class="w-11/12 translate-y-48 mx-auto px-3 h-screen">
                    <div id="page_1" class="py-1">
                        <div class="mo_wrap">
                            <img src="../../assets/images/circle.png" class="inline-block" />
                            <p class="inline-block">Name(이름)<span>*</span></p>
                            <div style="display: none;" class="flex justify-between w-full mb-2">
                                <input type="text" id="firstName" name="firstName" class="w-[49%]"
                                    placeholder="*First name(영문 이름)" />
                                <input type="text" id="lastName" name="lastName" class="w-[49%]"
                                    placeholder="*Last name(영문 성)" />
                            </div>
                            <input type="text" id="KoreanName" name="nick_name" class="w-full" placeholder="국문이름">
                        </div>
                        <div style="display: none;" class="mo_wrap">
                            <img src="../../assets/images/circle.png" class="inline-block" />
                            <p class="inline-block">Country(국가)<span>*</span></p>
                            <select id="nation_no" name="nation_no" class="px-2 py-1 w-full h-9 border">
                                <option value="" selected="" hidden="" data-nt="82">Contry</option>
                                <option data-nt="82" value="25">Republic of Korea</option>
                                <option data-nt="93" value="122">Afghanistan</option>
                                <option data-nt="355" value="124">Albania</option>
                                <option data-nt="213" value="125">Algeria</option>
                                <option data-nt="1684" value="117">American Samoa</option>
                                <option data-nt="376" value="123">Andorra</option>
                                <option data-nt="244" value="126">Angola</option>
                                <option data-nt="1264" value="128">Anguilla</option>
                                <option data-nt="1268" value="127">Antigua and Barbuda</option>
                                <option data-nt="54" value="116">Argentina</option>
                                <option data-nt="374" value="115">Armenia</option>
                                <option data-nt="297" value="114">Aruba</option>
                                <option data-nt="61" value="138">Australia</option>
                                <option data-nt="43" value="139">Austria</option>
                                <option data-nt="994" value="121">Azerbaijan</option>
                                <option data-nt="1242" value="70">Bahamas</option>
                                <option data-nt="973" value="67">Bahrain</option>
                                <option data-nt="880" value="71">Bangladesh</option>
                                <option data-nt="1246" value="68">Barbados</option>
                                <option data-nt="375" value="77">Belarus</option>
                                <option data-nt="32" value="76">Belgium</option>
                                <option data-nt="501" value="78">Belize</option>
                                <option data-nt="229" value="73">Benin</option>
                                <option data-nt="1441" value="72">Bermuda</option>
                                <option data-nt="975" value="84">Bhutan</option>
                                <option data-nt="591" value="81">Bolivia</option>
                                <option data-nt="387" value="79">Bosnia and Herzegovina</option>
                                <option data-nt="267" value="80">Botswana</option>
                                <option data-nt="55" value="87">Brazil</option>
                                <option data-nt="673" value="88">Brunei</option>
                                <option data-nt="359" value="86">Bulgaria</option>
                                <option data-nt="226" value="83">Burkina Faso</option>
                                <option data-nt="257" value="82">Burundi</option>
                                <option data-nt="855" value="172">Cambodia</option>
                                <option data-nt="237" value="168">Cameroon</option>
                                <option data-nt="1" value="173">Canada</option>
                                <option data-nt="238" value="169">Cape Verde</option>
                                <option data-nt="1345" value="175">Cayman Islands</option>
                                <option data-nt="236" value="159">Central Africa</option>
                                <option data-nt="235" value="165">Chad</option>
                                <option data-nt="56" value="167">Chile</option>
                                <option data-nt="86" value="161">China</option>
                                <option data-nt="57" value="179">Colombia</option>
                                <option data-nt="242" value="180">Congo</option>
                                <option data-nt="682" value="184">Cook Islands</option>
                                <option data-nt="506" value="177">Costa Rica</option>
                                <option data-nt="385" value="185">Croatia</option>
                                <option data-nt="53" value="182">Cuba</option>
                                <option data-nt="357" value="188">Cyprus</option>
                                <option data-nt="420" value="166">Czech</option>
                                <option data-nt="45" value="26">Denmark</option>
                                <option data-nt="253" value="162">Djibouti</option>
                                <option data-nt="1767" value="28">Dominica</option>
                                <option data-nt="1809" value="27">Dominican R.</option>
                                <option data-nt="850" value="157">DPR of Korea</option>
                                <option data-nt="243" value="181">DR Congo</option>
                                <option data-nt="670" value="30">East Timor</option>
                                <option data-nt="593" value="132">Ecuador</option>
                                <option data-nt="20" value="149">Egypt</option>
                                <option data-nt="503" value="134">El Salvador</option>
                                <option data-nt="240" value="156">Equatorial Guinea</option>
                                <option data-nt="291" value="129">Eritrea</option>
                                <option data-nt="372" value="131">Estonia</option>
                                <option data-nt="268" value="130">Eswatini</option>
                                <option data-nt="251" value="133">Ethiopia</option>
                                <option data-nt="500" value="208">Falkland Islands</option>
                                <option data-nt="679" value="212">Fiji</option>
                                <option data-nt="358" value="213">Finland</option>
                                <option data-nt="33" value="211">France</option>
                                <option data-nt="241" value="1">Gabon</option>
                                <option data-nt="220" value="3">Gambia</option>
                                <option data-nt="995" value="158">Georgia</option>
                                <option data-nt="49" value="29">Germany</option>
                                <option data-nt="350" value="163">Gibraltar</option>
                                <option data-nt="30" value="8">Greece</option>
                                <option data-nt="299" value="9">Greenland</option>
                                <option data-nt="1473" value="7">Grenada</option>
                                <option data-nt="590" value="5">Guadeloupe</option>
                                <option data-nt="1671" value="4">Guam</option>
                                <option data-nt="502" value="6">Guatemala</option>
                                <option data-nt="224" value="10">Guinea</option>
                                <option data-nt="245" value="11">Guinea-Bissau</option>
                                <option data-nt="592" value="2">Guyana</option>
                                <option data-nt="509" value="119">Haiti</option>
                                <option data-nt="504" value="140">Honduras</option>
                                <option data-nt="852" value="216">Hong Kong</option>
                                <option data-nt="36" value="215">Hungary</option>
                                <option data-nt="354" value="118">Iceland</option>
                                <option data-nt="91" value="151">India</option>
                                <option data-nt="62" value="152">Indonesia</option>
                                <option data-nt="98" value="147">Iran</option>
                                <option data-nt="964" value="146">Iraq</option>
                                <option data-nt="353" value="120">Ireland</option>
                                <option data-nt="972" value="148">Israel</option>
                                <option data-nt="39" value="150">Italy</option>
                                <option data-nt="225" value="178">Ivory Coast</option>
                                <option data-nt="1876" value="154">Jamaica</option>
                                <option data-nt="81" value="153">Japan</option>
                                <option data-nt="962" value="141">Jordan</option>
                                <option data-nt="7" value="170">Kazakstan</option>
                                <option data-nt="254" value="174">Kenya</option>
                                <option data-nt="686" value="187">Kiribati</option>
                                <option data-nt="965" value="183">Kuwait</option>
                                <option data-nt="996" value="186">Kyrgizstan</option>
                                <option data-nt="856" value="31">Laos</option>
                                <option data-nt="371" value="33">Latvia</option>
                                <option data-nt="961" value="35">Lebanon</option>
                                <option data-nt="266" value="36">Lesotho</option>
                                <option data-nt="231" value="32">Liberia</option>
                                <option data-nt="218" value="40">Libya</option>
                                <option data-nt="423" value="42">Liechtenstein</option>
                                <option data-nt="370" value="41">Lithuania</option>
                                <option data-nt="352" value="38">Luxembourg</option>
                                <option data-nt="853" value="47">Macao</option>
                                <option data-nt="389" value="85">Macedonia</option>
                                <option data-nt="261" value="43">Madagascar</option>
                                <option data-nt="265" value="48">Malawi</option>
                                <option data-nt="60" value="49">Malaysia</option>
                                <option data-nt="960" value="60">Maldives</option>
                                <option data-nt="373" value="59">Maldova</option>
                                <option data-nt="223" value="50">Mali</option>
                                <option data-nt="356" value="61">Malta</option>
                                <option data-nt="692" value="45">Marshall Islands</option>
                                <option data-nt="596" value="44">Martinique</option>
                                <option data-nt="222" value="55">Mauritania</option>
                                <option data-nt="230" value="54">Mauritius</option>
                                <option data-nt="269" value="46">Mayotte</option>
                                <option data-nt="52" value="51">Mexico</option>
                                <option data-nt="691" value="65">Micronesia</option>
                                <option data-nt="377" value="52">Monaco</option>
                                <option data-nt="976" value="62">Mongolia</option>
                                <option data-nt="382" value="57">Montenegro</option>
                                <option data-nt="1664" value="58">Montserrat</option>
                                <option data-nt="212" value="53">Morocco</option>
                                <option data-nt="258" value="56">Mozambique</option>
                                <option data-nt="95" value="64">Myanmar</option>
                                <option data-nt="264" value="12">Namibia</option>
                                <option data-nt="674" value="13">Nauru</option>
                                <option data-nt="977" value="18">Nepal</option>
                                <option data-nt="687" value="20">New Caledonia</option>
                                <option data-nt="64" value="21">New Zealand</option>
                                <option data-nt="505" value="24">Nicaragua</option>
                                <option data-nt="227" value="23">Niger</option>
                                <option data-nt="234" value="14">Nigeria</option>
                                <option data-nt="683" value="22">Niue</option>
                                <option data-nt="47" value="19">Norway</option>
                                <option data-nt="968" value="137">Oman</option>
                                <option data-nt="92" value="202">Pakistan</option>
                                <option data-nt="680" value="204">Palau</option>
                                <option data-nt="507" value="200">Panama</option>
                                <option data-nt="675" value="203">Papua New Guinea</option>
                                <option data-nt="595" value="201">Paraguay</option>
                                <option data-nt="51" value="206">Peru</option>
                                <option data-nt="48" value="209">Poland</option>
                                <option data-nt="351" value="207">Portugal</option>
                                <option data-nt="1787" value="210">Puerto Rico</option>
                                <option data-nt="974" value="171">Qatar</option>
                                <option data-nt="40" value="37">Romania</option>
                                <option data-nt="7" value="34">Russia</option>
                                <option data-nt="250" value="39">Rwanda</option>
                                <option data-nt="290" value="98">Saint Helena</option>
                                <option data-nt="1758" value="97">Saint Lucia</option>
                                <option data-nt="508" value="92">Saint Pierre and Miquelon</option>
                                <option data-nt="685" value="89">Samoa</option>
                                <option data-nt="378" value="91">San Marino</option>
                                <option data-nt="966" value="90">Saudi Arabia</option>
                                <option data-nt="221" value="94">Senegal</option>
                                <option data-nt="381" value="95">Serbia</option>
                                <option data-nt="248" value="96">Seychelles</option>
                                <option data-nt="232" value="110">Sierra Leone</option>
                                <option data-nt="65" value="112">Singapore</option>
                                <option data-nt="1721" value="111">Sint Maarten</option>
                                <option data-nt="421" value="107">Slovakia</option>
                                <option data-nt="386" value="108">Slovenia</option>
                                <option data-nt="677" value="100">Solomon Islands</option>
                                <option data-nt="252" value="99">Somalia</option>
                                <option data-nt="27" value="16">South Africa</option>
                                <option data-nt="211" value="15">South Sudan</option>
                                <option data-nt="34" value="106">Spain</option>
                                <option data-nt="94" value="103">Sri Lanka</option>
                                <option data-nt="970" value="205">State of Palestine</option>
                                <option data-nt="249" value="101">Sudan</option>
                                <option data-nt="597" value="102">Suriname</option>
                                <option data-nt="46" value="104">Sweden</option>
                                <option data-nt="41" value="105">Switzerland</option>
                                <option data-nt="963" value="109">Syria</option>
                                <option data-nt="886" value="160">Taiwan</option>
                                <option data-nt="992" value="189">Tajikistan</option>
                                <option data-nt="255" value="190">Tanzania</option>
                                <option data-nt="66" value="191">Thailand</option>
                                <option data-nt="269" value="176">the Comoros</option>
                                <option data-nt="31" value="17">the Netherlands</option>
                                <option data-nt="63" value="214">the Philippines</option>
                                <option data-nt="228" value="193">Togo</option>
                                <option data-nt="690" value="194">Tokelau</option>
                                <option data-nt="676" value="195">Tonga</option>
                                <option data-nt="1868" value="199">Trinidad and Tobago</option>
                                <option data-nt="216" value="198">Tunisia</option>
                                <option data-nt="90" value="192">Turkey</option>
                                <option data-nt="993" value="196">Turkmenistan</option>
                                <option data-nt="688" value="197">Tuvalu</option>
                                <option data-nt="256" value="142">Uganda</option>
                                <option data-nt="380" value="145">Ukraine</option>
                                <option data-nt="971" value="113">United Arab Emirates</option>
                                <option data-nt="44" value="135">United Kingdom</option>
                                <option data-nt="1" value="63">United States of America</option>
                                <option data-nt="598" value="143">Uruguay</option>
                                <option data-nt="998" value="144">Uzbekistan</option>
                                <option data-nt="678" value="66">Vanuatu</option>
                                <option data-nt="379" value="69">Vatican</option>
                                <option data-nt="58" value="74">Venezuela</option>
                                <option data-nt="84" value="75">Vietnam</option>
                                <option data-nt="212" value="93">Western Sahara</option>
                                <option data-nt="967" value="136">Yemen</option>
                                <option data-nt="260" value="155">Zambia</option>
                                <option data-nt="263" value="164">Zimbabwe</option>
                            </select>
                        </div>
                        <div class="mo_wrap">
                            <img src="../../assets/images/circle.png" class="inline-block" />
                            <p class="inline-block">Affiliation(소속 / 근무처)<span>*</span></p>
                            <input type="text" id="affiliation" name="org" class="w-full" placeholder="*소속을 입력해주세요">
                        </div>
                        <div class="mo_wrap">
                            <img src="../../assets/images/circle.png" class="inline-block" />
                            <p class="inline-block">Mobile Phone Number(휴대전화번호)<span>*</span></p>
                            <input type="text" id="phoneNumber" name="phone" class="w-full"
                                placeholder="* -를 제외한 숫자만 입력해주세요" oninput="checkFirstDigit(event)">
                        </div>
                        <div class="mo_wrap">
                            <img src="../../assets/images/circle.png" class="inline-block" />
                            <p class="inline-block">E-mail(이메일)<span>*</span></p>
                            <div class="flex items-center justify-space">
                                <input type="text" name="email1" id="Email1" maxlength="64" value=""
                                    class="w-[40%] mr-2">
                                <p>@</p>
                                <input type="text" name="email2" id="Email2" maxlength="64" value=""
                                    class="w-[40%] ml-2">
                                <select name="email3" id="Email3" class="border w-[15%] h-9 ml-3"
                                    style="background-color:#ffffff;">
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
                                </select>
                            </div>
                            <!-- <div class="mo_wrap">
                            <img src="../../assets/images/circle.png" class="inline-block" />
                            <p class="inline-block">Member(학회 회원 여부)<span>*</span></p>
                            <div class="flex flex-nowrap flex-col">
                                <div class="block">
                                    <input type="radio" id="member" name="type4" />
                                    <label for="member">Member(회원)</label>
                                </div>
                                <div>
                                    <input type="radio" id="non_member" name="type5" />
                                    <label for="non_member">Non-Member(비회원)</label>
                                </div>
                            </div>
                        </div> -->

                            <div class="mo_wrap">
                                <img src="../../assets/images/circle.png" class="inline-block" />
                                <p class="inline-block">Type of Participation(참석유형)<span>*</span></p>
                                <div class="flex justify-between items-center">
                                    <select id="Participation_1" style="background-color:#ffffff;"
                                        class="px-2 py-1 w-full h-9 border" name="type2">
                                        <option value="" selected="selected">* 필수 선택사항</option>
                                        <option value="임원">Committee</option>
                                        <option value="연자">Speaker</option>
                                        <option value="좌장">Chairperson</option>
                                        <option value="패널">Panel</option>
                                        <option value="일반참가자">Paticipants</option>
                                    </select>
                                </div>
                            </div>

                            <div style="display: none;" class="mo_wrap">
                                <img src="../../assets/images/circle.png" class="inline-block" />
                                <p class="inline-block">Category(참석자 구분)<span>*</span></p>
                                <div class="flex justify-between items-center">
                                    <select id="Category_1" style="background-color:#ffffff;"
                                        class="px-2 py-1 w-full h-9 border">
                                        <option value="" selected="selected">* 필수 선택사항</option>
                                        <option value="개원의">Certified M.D.</option>
                                        <option value="전임의">Fellow</option>
                                        <option value="전공의">Resident</option>
                                        <option value="연구원">Researcher</option>
                                        <option value="영양사">Nutritionist</option>
                                        <option value="운동처방사">Exercise Specialist</option>
                                        <option value="간호사">Nurse</option>
                                        <option value="약사"> Pharmacist</option>
                                        <option value="군의관">Surgeon(Military)</option>
                                        <option value="공중보건의">Public Health Doctor</option>
                                        <option value="기업회원">Corporate Member</option>
                                        <option value="학생">Student</option>
                                        <option value="기타">Others</option>
                                        <input type="text" id="category_others" style="display: none;" />
                                    </select>
                                </div>
                            </div>

                            <div class="mo_wrap">
                                <img src="../../assets/images/circle.png" class="inline-block" />
                                <p class="inline-block">Only Korean(평점신청 여부)<span>*</span></p>
                                <div class="h-12">
                                    <input type="radio" id="need" />
                                    <label for="need">필요</label>
                                    <input type="radio" id="non_need" />
                                    <label for="non_need">불필요</label>
                                </div>
                                <div class="flex items-center w-12/12 justify-left flex-wrap">
                                    <div class="flex items-center">
                                        <p class="mx-2 text-xs ln">의사면허번호</p>
                                        <input name="ln" id="doctor" type="text" class="mx-2" />
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <p class="mr-[1.3rem] ml-4 text-xs ln"> 전문의번호 </p>
                                        <input name="sn" id="specialist" type="text" />
                                    </div>
                                    <span class="text-sm mt-5">*의사면허번호를 정확하게 입력하시지 않으시면, 의협보고시 누락될 수 있습니다.<br>
                                        *정확한 전문의 번호를 입력 부탁 드립니다.</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <table class="mo-table">
                                    <tr>
                                        <th>구분</th>
                                        <th>대한 내분비 학회 회원<br>(평생회원, 정회원/준회원,대기자 제외)</th>
                                        <th>비회원<br>(준회원, 회원 승인 대기자)</th>
                                    </tr>
                                    <tr>
                                        <th>전문의</th>
                                        <td>
                                            <input type="radio" id="type_1" class="type-1" name="category-1" />
                                            <label for="type_1">90000</label>
                                        </td>
                                        <td>
                                            <input type="radio" id="type_2" class="type-1" name="category-2" />
                                            <label for="type_2">110000</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>전공의</th>
                                        <td>
                                            <input type="radio" id="type_3" class="type-1" name="category-3" />
                                            <label for="type_3">70000</label>
                                        </td>
                                        <td>
                                            <input type="radio" id="type_4" class="type-1" name="category-4" />
                                            <label for="type_4">&nbsp;90000</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>기타</th>
                                        <td>
                                            <input type="radio" id="type_5" class="type-1" name="category-5" />
                                            <label for="type_5">70000</label>
                                        </td>
                                        <td>
                                            <input type="radio" id="type_6" class="type-1" name="category-6" />
                                            <label for="type_6">&nbsp;90000</label>
                                        </td>
                                    </tr>
                                    <tr id="type" style="display:none;">
                                        <th>세부구분<span>*</span></th>
                                        <td colspan="2">
                                            <div id="one_box">
                                                <input type="radio" id="type_7" class="type-2" name="category-7" />
                                                <label for="type_7">개원의</label>
                                                <input type="radio" id="type_8" class="type-2" name="category-8" />
                                                <label for="type_8" class="right">봉직의</label>
                                                <input type="radio" id="type_9" class="type-2" name="category-9" />
                                                <label for="type_9">교수</label>
                                                <input type="radio" id="type_10" class="type-2" name="category-10" />
                                                <label for="type_10">전임의</label>
                                            </div>
                                            <div id="two_box">
                                                <input type="radio" id="type_11" class="type-3" name="category-11" />
                                                <label for="type_11">기초의학자</label>
                                                <input type="radio" id="type_12" class="type-3" name="category-12" />
                                                <label for="type_12">간호사</label>
                                                <input type="radio" id="type_13" class="type-3" name="category-13" />
                                                <label for="type_13">약사</label>
                                                <input type="radio" id="type_14" class="type-3" name="category-14" />
                                                <label for="type_14" class="right">군의관</label>
                                                <input type="radio" id="type_15" class="type-3" name="category-15" />
                                                <label for="type_15">기타</label>
                                                <input class="border" id="other" name="category-16" />
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <button type="button" id="page_1_btn"
                                class="mx-auto w-60 h-15 bg-sky-900 text-white p-3 text-lg flex items-center justify-center mt-20 mb-20">Next</button>
                        </div>
                    </div>
                    <!-- ==========================================================================================================/ -->
                    <div id="page_2" class="flex flex-col items-center justify-center text-center my-20"
                        style="display: none;">
                        <div>
                            <img src="../../assets/images/circle.png" class="inline-block" />
                            <h2 class="inline-block">Session participation(세션참여 여부)<span>*</span></h2>
                        </div>

                        <p style="font-weight: 500;">Welcome Reception <br>- September 7(Thu) </p>
                        <div>
                            <input class="session_radio" type="radio" id="yes_1" />
                            <label for="yes_1">Yes</label>
                            <input class="session_radio" type="radio" id="no_1" />
                            <label for="no_1">NO</label>
                        </div>

                        <p style="font-weight: 500;">Day 2 Breakfast Symposium<br>- September 8(Fri) </p>
                        <div>
                            <input class="session_radio" type="radio" id="yes_2" />
                            <label for="yes_2">Yes</label>
                            <input class="session_radio" type="radio" id="no_2" />
                            <label for="no_2">NO</label>
                        </div>

                        <p style="font-weight: 500;">Day 2 Luncheon Symposium<br>- September 8(Fri) </p>
                        <div>
                            <input class="session_radio" type="radio" id="yes_3" />
                            <label for="yes_3">Yes</label>
                            <input class="session_radio" type="radio" id="no_3" />
                            <label for="no_3">NO</label>
                        </div>

                        <p style="font-weight: 500;">Day 3 Breakfast Symposium<br> - September 9(Sat) </p>
                        <div>
                            <input class="session_radio" type="radio" id="yes_4" />
                            <label for="yes_4">Yes</label>
                            <input class="session_radio" type="radio" id="no_4" />
                            <label for="no_4">NO</label>
                        </div>

                        <p style="font-weight: 500;">Day 3 Luncheon Symposium<br>- September 9(Sat) </p>
                        <div>
                            <input class="session_radio" type="radio" id="yes_5" />
                            <label for="yes_5">Yes</label>
                            <input class="session_radio" type="radio" id="no_5" />
                            <label for="no_5">NO</label>
                        </div>
                        <button type="button" id="page_2_btn"
                            class="mx-auto w-60 h-15 bg-sky-900 text-white p-3 my-5 text-lg flex items-center justify-center mt-20">Next</button>
                    </div>
                    <!-- ==========================================================================================================/ -->

                    <div id="page_3" class="mt-5 h-full" style="display: none;">
                        <div class="mb-4">
                            <img src="../../assets/images/circle.png" class="inline" />
                            <h2 class="mb-5 inline">Where did you get the information about the conference?(가입경로)</h2>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex items-center mb-4 ">
                                <input class="checkbox" type="checkbox" id="A" />
                                <label class="text-[0.8rem]" for="A">Website of the Korea Society of Obesity
                                </label>
                            </div>
                            <div class="flex items-center mb-4 ">
                                <input class="checkbox" type="checkbox" id="B" />
                                <label class="text-[0.8rem]" for="B">Promotional email <br>from the Korea Society of
                                    Obesity
                                </label>
                            </div>
                            <div class="flex items-center mb-4 ">
                                <input class="checkbox" type="checkbox" id="C" />
                                <label class="text-[0.8rem]" for="C">Advertising email or <br>the bulletin board from
                                    the
                                    relevant society
                                </label>
                            </div>
                            <div class="flex items-center mb-4 ">
                                <input class="checkbox" type="checkbox" id="D" />
                                <label class="text-[0.8rem]" for="D">Information about affiliated
                                    <br>companies/organizations
                                </label>
                            </div>
                            <div class="flex items-center mb-4 ">
                                <input class="checkbox" type="checkbox" id="E" />
                                <label class="text-[0.8rem]" for="E">Invited as a speaker, <br>moderator, and panelist
                                </label>
                            </div>
                            <div class="flex items-center mb-4 ">
                                <input class="checkbox" type="checkbox" id="F" />
                                <label class="text-[0.8rem]" for="F">Recommended by a professor
                                </label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input class="checkbox" type="checkbox" id="G" />
                                <label class="text-[0.8rem]" for="G">Recommended by acquaintances
                                </label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input class="checkbox" type="checkbox" id="H" />
                                <label class="text-[0.8rem]" for="H">Pharmaceutical company
                                </label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input class="checkbox" type="checkbox" id="I" />
                                <label class="text-[0.8rem]" for="I">Medical community <br>(MEDI:GATE, Dr.Ville, etc.)
                                </label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input class="checkbox" type="checkbox" id="J" />
                                <label class="text-[0.8rem]" for="J">Medical news and journal
                                </label>
                            </div>
                        </div>
                        <button type="button" id="page_3_btn"
                            class="mx-auto w-60 h-15 bg-sky-900 text-white p-3 my-5 text-lg flex items-center justify-center mt-20">Next</button>
                    </div>
                    <!-- ================================================================================================/ -->
                    <div id="page_4" class="wrap_2" style="display: none;">
                        <div class="confirm_box mt-10">
                            <div class="confirm_box_title flex items-center justify-center">
                                <h1 class="text-sm">Use of Personal Information <br>(개인정보활용동의)</h1>
                            </div>
                            <textarea style="height: 80px;" class="border text-center w-full" disabled="" readonly="">대한내분비학회 2023년 개원의 연수강좌 
본 학술대회의 주관사인 대한비만학회는 학술대회 등록시스템 서비스 제공을 위하여 관계 법령에 따라 아래와 같이 개인정보를 수집, 이용하는 내용을 알리오니 자세히 읽으신 후 동의 여부를 결정하여 주십시오.
                       
                        </textarea>
                        </div>
                        <div class="all_checkbox">
                            <input id="all_check" type="checkbox" />
                            <label for="all_check" class="sn">개인정보 수집 및 제공 동의에 모두 동의</label>
                        </div>
                        <div class="personal_checkbox">
                            <div>
                                <input id="first_check" class="check" type="checkbox" />
                                <label for="first_check" class="sn">개인정보 수집 동의 <span>(필수)</span></label>
                            </div>

                            <textarea class="border text-base" disabled="" readonly="">
개인정보 수집 및 이용 동의
1. 수집항목: 성명, 휴대폰번호, 바코드 입장 정보
2. 수집/이용 목적
참가자들의 편의와 참가업체 상호간의 유용한 정보 교류 서비스 제공을 위한 학술대회 출입증 발급 및 전
자명함시스템 제공에 이용되며, 본 학술대회에서 수집한 개인정보는 차기 학술대회 초대권 발송 및 안내
를 위한 용도 외의 다른 목적으로 사용되지 않습니다.

                        </textarea>
                        </div>

                        <div class="personal_checkbox">
                            <div>
                                <input id="second_check" class="check" type="checkbox" />
                                <label for="second_check" class="sn">개인정보 3자 제공 동의<span>(필수)</span></label>
                            </div>

                            <textarea class="border text-base" disabled="" readonly="">
개인정보 제3자 제공 동의
1. 개인정보 취급 업무의 위탁
본 학술대회는 서비스 향상을 위해서 아래와 같이 개인정보를 위탁하고 있으며, 관계 법령에 따라 위탁계
약 시 개인정보가 안전하게 관리될 수 있도록 필요한 사항을 규정하고 있습니다.
수탁 업체 : INTO-ON
위탁 업무내용 : 등록시스템 운영위탁, 전자명함 시스템 서비스 제공 등
이용 및 보유기간 : 위탁계약 종료 시까지
2. 이용, 보유기간 
개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기 합니다.
(단, 기타 법령에 따로 정하는 경우는 해당 기간까지 보관)
3. 기타 고지 사항
개인정보 보호법 제15조 제1항 제3호에 따라 정보주체의 동의 없이 개인정보를 수집‧이용합니다.
개인정보 처리사유 : 학술대회 인증 자료
개인정보 항목 : 성명, 소속, 직위, 전화번호(휴대폰 또는 회사전화), 이메일
수집 근거 : 「전시산업발전법」제22조
4. 동의거부 권리 및 불이익
필수항목을 기재하지 않거나 개인정보 수집·이용에 거부하는 경우, 본 학술대회에서 제공하는 서비스를
이용할 수 없습니다. 또한 학술대회 출입증 발급이 불가하여 재입장 등 입장의 제한이 발생될 수 있습니다.
                        </textarea>
                        </div>

                        <div class="personal_checkbox">
                            <div>
                                <input id="third_check" class="check" type="checkbox" />
                                <label for="third_check" class="sn"> 차기 학술대회 관련 안내 이메일 수신 동의 <span
                                        style="color: #7d8597;">(선택)</span>
                                </label>

                            </div>
                            <table class="tbl_type01" id="optionalAgreeInfoEmail">
                                <colgroup>
                                    <col width="40%">
                                    <col width="30%">
                                    <col width="30%">
                                </colgroup>
                                <tr>
                                    <th>수집 목적</th>
                                    <th class="line_th">수집 항목</th>
                                    <th class="line_th">보유 기간</th>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">학술대회 관람 설문조사<br /><br />
                                        학술대회 안내<br /><br />
                                        뉴스레터 발송</td>
                                    <td style="text-align: center;" class="line">이메일</td>
                                    <td style="text-align: center;" class="line">2년</td>
                                </tr>
                            </table>
                        </div>

                        <div class="personal_checkbox">
                            <div>
                                <input id="fourth_check" class="check" type="checkbox" />
                                <label for="fourth_check" class="sn"> 차기 학술대회 관련 안내 이메일 수신 동의 <span
                                        style="color: #7d8597;">(선택)</span>
                                </label>

                            </div>

                            <table class="tbl_type01" id="optionalAgreeInfoMobile" style="width: 100%;">
                                <colgroup>
                                    <col width="40%">
                                    <col width="30%">
                                    <col width="30%">
                                </colgroup>
                                <tr>
                                    <th>수집 목적</th>
                                    <th class="line_th">수집 항목</th>
                                    <th class="line_th">보유 기간</th>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">학술대회 안내 및<br /><br />
                                        모바일 초대권 발송</td>
                                    <td style="text-align: center;" class="line">휴대폰 번호</td>
                                    <td style="text-align: center;" class="line">2년</td>
                                </tr>
                            </table>
                        </div>
                        <div class="next_btn_box">

                            <button class="next_btn w-60 h-15 bg-sky-900 text-white p-3 my-5 text-lg"
                                type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    </div>
</body>
<script>
const wrap_1 = document.querySelector("#page_1")
const wrap_2 = document.querySelector("#page_2")
const wrap_3 = document.querySelector("#page_3")
const wrap_4 = document.querySelector("#page_4")

const firstName = document.querySelector("#firstName");
const LastName = document.querySelector("#lastName");
const KoreanName = document.querySelector("#KoreanName");

const contry = document.querySelector("#nation_no");

const affilation = document.querySelector("#affiliation");

const phone = document.querySelector("#phoneNumber")

const email_1 = document.querySelector("#Email1")
const email_2 = document.querySelector("#Email2")
const email_3 = document.querySelector("#Email3")

const member = document.querySelector("#member");
const nonMember = document.querySelector("#non_member")

// const participation = document.querySelector("#Participation");
const participationSelect = document.querySelector("#Participation_1")

// const category = document.querySelector("#Category")
const categorySelect = document.querySelector("#Category_1")
const categoryOthers = document.querySelector("#category_others")

const need = document.querySelector("#need");
const nonNeed = document.querySelector("#non_need")

const doctor = document.querySelector("#doctor");
const specialist = document.querySelector("#specialist")

const yes_1 = document.querySelector("#yes_1")
const no_1 = document.querySelector("#no_1")
const yes_2 = document.querySelector("#yes_2")
const no_2 = document.querySelector("#no_2")
const yes_3 = document.querySelector("#yes_3")
const no_3 = document.querySelector("#no_3")
const yes_4 = document.querySelector("#yes_4")
const no_4 = document.querySelector("#no_4")
const yes_5 = document.querySelector("#yes_5")
const no_5 = document.querySelector("#no_5")

const participationRadios = document.querySelectorAll('.session_radio');
const checkboxes = document.querySelectorAll('.checkbox');
const allCheck = document.querySelector("#all_check");
const checkedbox2 = document.querySelectorAll('.check');
const firstCheck = document.querySelector("#first_check");
const secondCheck = document.querySelector("#second_check");
const thirdCheck = document.querySelector("#third_check");
const fourthCheck = document.querySelector("#fourth_check");

const submitButton = document.querySelector("#page_3_btn")
const finalButton = document.querySelector(".next_btn")
const firstPageBtn = document.querySelector("#page_1_btn")
const secondPageBtn = document.querySelector("#page_2_btn")
const thirdPageBtn = document.querySelector("#page_3_btn")
const fourthPageBtn = document.querySelector("#page_4_btn")
const type = document.querySelector("#type")
const firstType = document.querySelectorAll(".type-1")
const secondType = document.querySelectorAll(".type-2")
const thridType = document.querySelectorAll(".type-3")
const oneBox = document.querySelector("#one_box")
const twoBox = document.querySelector("#two_box")
const type1 = document.querySelector("#type_1")
const type2 = document.querySelector("#type_2")
const type3 = document.querySelector("#type_3")
const type4 = document.querySelector("#type_4")
const type5 = document.querySelector("#type_5")
const type6 = document.querySelector("#type_6")
const type7 = document.querySelector("#type_7")
const type8 = document.querySelector("#type_8")
const type9 = document.querySelector("#type_9")
const type10 = document.querySelector("#type_10")
const type11 = document.querySelector("#type_11")
const type12 = document.querySelector("#type_12")
const type13 = document.querySelector("#type_13")
const type14 = document.querySelector("#type_14")
const type15 = document.querySelector("#type_15")
const otherInput = document.querySelector("#other")


/**영어 유효성 검사 */
firstName.addEventListener("input", (event) => {
    englishInput(event)
})
LastName.addEventListener("input", (event) => {
    englishInput(event)
})

function englishInput(event) {
    const inputValue = event.target.value;
    const onlyEnglish = /^[A-Za-z]+$/;

    if (!onlyEnglish.test(inputValue)) {
        event.target.value = inputValue.replace(/[^A-Za-z]/g, '');
    }
}


/**한국어 유효성 검사 */
KoreanName.addEventListener('input', (event) => {
    const inputValue = event.target.value;
    const onlyHangul = /^[ㄱ-ㅎㅏ-ㅣ가-힣]+$/;

    if (!onlyHangul.test(inputValue)) {
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

email_3.addEventListener("click", () => {
    email_2.value = email_3.options[email_3.selectedIndex].value
})


categorySelect.addEventListener("click", () => {
    const categoryValue = categorySelect.options[categorySelect.selectedIndex].value;
    if (categoryValue === "Others") {
        categoryOthers.style.display = "";
    } else {
        categoryOthers.style.display = "none";
    }
})

nonNeed.addEventListener("click", () => {
    if (nonNeed.checked) {
        need.checked = false;
        doctor.disabled = true;
        specialist.disabled = true;
    } else {
        need.checked = true
        doctor.disabled = false;
        specialist.disabled = false;
    }
})

need.addEventListener("click", () => {
    if (need.checked) {
        nonNeed.checked = false;
        doctor.disabled = false;
        specialist.disabled = false;
    }
})

const numArray = [1, 2, 3, 4, 5];
let one = false;
let two = false;
let three = false;
let four = false;
let five = false;

let first = false;
let second = false;
let third = false;
let fourth = false;
let fiveth = false;

type1.addEventListener("click", () => {

    if (type1.checked) {
        type2.checked = false
        type3.checked = false
        type4.checked = false
        type5.checked = false
        type6.checked = false
        type.style.display = "";
        oneBox.style.display = "";
        twoBox.style.display = "none"
    }
})

type2.addEventListener("click", () => {
    if (type2.checked) {
        type1.checked = false
        type3.checked = false
        type4.checked = false
        type5.checked = false
        type6.checked = false
        type.style.display = "";
        oneBox.style.display = "";
        twoBox.style.display = "none"
    }
})

type3.addEventListener("click", () => {
    if (type3.checked) {
        type2.checked = false
        type1.checked = false
        type4.checked = false
        type5.checked = false
        type6.checked = false
        type.style.display = "none";
        oneBox.style.display = "none";
        twoBox.style.display = "none"
    }
})

type4.addEventListener("click", () => {
    if (type4.checked) {
        type2.checked = false
        type1.checked = false
        type3.checked = false
        type5.checked = false
        type6.checked = false
        type.style.display = "none";
        oneBox.style.display = "none";
        twoBox.style.display = "none"
    }
})

type5.addEventListener("click", () => {
    if (type5.checked) {
        type1.checked = false
        type3.checked = false
        type4.checked = false
        type2.checked = false
        type6.checked = false
        type.style.display = "";
        oneBox.style.display = "none";
        twoBox.style.display = ""
    }
})

type6.addEventListener("click", () => {
    if (type6.checked) {
        type1.checked = false
        type3.checked = false
        type4.checked = false
        type2.checked = false
        type5.checked = false
        type.style.display = "";
        oneBox.style.display = "none";
        twoBox.style.display = ""
    }
})

type7.addEventListener("click", () => {
    if (type7.checked) {
        type8.checked = false
        type9.checked = false
        type10.checked = false
    }
})
type8.addEventListener("click", () => {
    if (type8.checked) {
        type7.checked = false
        type9.checked = false
        type10.checked = false
    }
})
type9.addEventListener("click", () => {
    if (type9.checked) {
        type8.checked = false
        type7.checked = false
        type10.checked = false
    }
})
type10.addEventListener("click", () => {
    if (type10.checked) {
        type8.checked = false
        type9.checked = false
        type7.checked = false
    }
})

type11.addEventListener("click", () => {
    if (type11.checked) {
        type12.checked = false
        type13.checked = false
        type14.checked = false
        type15.checked = false
        otherInput.disabled = true
    }
})
type12.addEventListener("click", () => {
    if (type12.checked) {
        type11.checked = false
        type13.checked = false
        type14.checked = false
        type15.checked = false
        otherInput.disabled = true
    }
})
type13.addEventListener("click", () => {
    if (type13.checked) {
        type12.checked = false
        type11.checked = false
        type14.checked = false
        type15.checked = false
        otherInput.disabled = true
    }
})
type14.addEventListener("click", () => {
    if (type14.checked) {
        type12.checked = false
        type13.checked = false
        type11.checked = false
        type15.checked = false
        otherInput.disabled = true
    }
})
type15.addEventListener("click", () => {
    if (type15.checked) {
        type12.checked = false
        type13.checked = false
        type14.checked = false
        type11.checked = false
        otherInput.disabled = false
    }
})

numArray.forEach((num) => {
    const yes_num = document.getElementById(`yes_${num}`);
    const no_num = document.getElementById(`no_${num}`);

    yes_num.addEventListener("click", () => {
        if (yes_num.checked) {
            no_num.checked = false;
        } else {
            yes_num.checked = true;
        }
        if (num === 1 && yes_num.checked) {
            one = true;
            first = true;
            return;
        }
        if (num === 2 && yes_num.checked) {
            two = true;
            second = true;
            return;
        }
        if (num === 3 && yes_num.checked) {
            three = true;
            third = true;
            return;
        }
        if (num === 4 && yes_num.checked) {
            four = true;
            fourth = true;
            return;
        }
        if (num === 5 && yes_num.checked) {
            five = true;
            fiveth = true;
            return;
        }
    });

    no_num.addEventListener("click", () => {
        if (no_num.checked) {
            yes_num.checked = false;
        } else {
            no_num.checked = true;
        }
        if (num === 1 && no_num.checked) {
            one = true;
            return;
        }
        if (num === 2 && no_num.checked) {
            two = true;
            return;
        }
        if (num === 3 && no_num.checked) {
            three = true;
            return;
        }
        if (num === 4 && no_num.checked) {
            four = true;
            return;
        }
        if (num === 5 && no_num.checked) {
            five = true;
            return;
        }
    });
});

let checkedArr = []

firstPageBtn.addEventListener("click", (e) => {
    e.preventDefault()
    onSubmit()
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
})
allCheck.addEventListener("click", () => selectAll());
/**모두 체크 눌렀을 때 */
function selectAll() {
    checkedbox2.forEach((checkbox) => {
        checkbox.checked = allCheck.checked
    })
    checkedArr = [firstCheck.checked, secondCheck.checked, thirdCheck.checked, fourthCheck.checked];
}


finalButton.addEventListener("submit", (e) => {
    e.preventDefault()
    onClickSubmit()
})

function onSubmit() {

    if (!KoreanName.value) {
        alert("invaild Name");
        firstName.focus()
        return;
    }

    if (!affilation.value) {
        alert("invaild affilation");
        affilation.focus()
        return;
    }
    if (!phone.value) {
        alert("invaild phone");
        phone.focus()
        return;
    }
    if (!email_1.value || !email_2.value) {
        alert("invaild email");
        email_1.focus()
        return;
    }

    if (!participationSelect.options[participationSelect.selectedIndex].value) {
        alert("invaild participation");
        participationSelect.focus()
        return;
    }

    if (categorySelect.options[categorySelect.selectedIndex].value === "Others" && !categoryOthers.value) {
        alert("invaild category");
        categoryOthers.focus()
        return;
    }
    if (!need.checked && !nonNeed.checked) {
        alert("invaild grade");
        need.focus()
        return;
    }

    if (need.checked && !doctor.value) {
        alert("invaild grade");
        need.focus()
        return;
    }

    if (!type1.checked && !type2.checked && !type3.checked && !type4.checked && !type5.checked && !type6.checked) {
        alert("invaild category")
        type1.focus()
        return;
    }
    if (type1.checked && !type7.checked && !type8.checked && !type9.checked && !type10.checked) {
        alert("invaild category")
        type1.focus()
        return;
    }
    if (type2.checked && !type7.checked && !type8.checked && !type9.checked && !type10.checked) {
        alert("invaild category")
        type1.focus()
        return;
    }
    if (type5.checked && !type11.checked && !type12.checked && !type13.checked && !type14.checked && !type15.checked) {
        alert("invaild category")
        type1.focus()
        return;
    }
    if (type6.checked && !type11.checked && !type12.checked && !type13.checked && !type14.checked && !type15.checked) {
        alert("invaild category")
        type1.focus()
        return;
    }

    wrap_1.style.display = "none"
    wrap_2.style.display = "none"
    wrap_3.style.display = "none"
    wrap_4.style.display = ""
    allCheck.focus()
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

function onClickSubmit() {

    const checkArray = []
    checkboxes.forEach((check) => {
        checkArray.push(check.checked)
    })

    let fee = 0;
    if (type1.checked) {
        fee = 90000
    }
    if (type2.checked) {
        fee = 110000
    }
    if (type3.checked || type5.checked) {
        fee = 70000
    }
    if (type4.checked || type6.ckeked) {
        fee = 90000
    }

    window.location.href = `/onSite/success?fee=${fee}`;

}
</script>

</html>