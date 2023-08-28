<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<style>
input[type=text] {
    border: 1px solid #ddd;
    padding: 8px 16px;
    height: 2.5rem;
    /* width: 300px; */
}

input[type=checkbox] {
    width: 18px;
    height: 18px;
    margin-right: 10px;
    transform: translateY(2.5px);
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

p {
    margin: 0;
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
    font-size: 1rem;
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
    height: 200px;
    text-align: center;
    border: 1px solid #eee;
}

.confirm_box_title {
    text-align: center;
    background-color: rgb(186 230 253);
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
    padding: 16px;
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
</style>
<script src="https://cdn.tailwindcss.com"></script>
<form action="/onSite" class="w-3/5 mx-auto">
    <!-- <img src="./mail_header.png" alt="header" class="w-full h-96" /> -->
    <div class="wrap_1">
        <div
            class="flex justify-center items-center text-white w-6/12 h-12 bg-sky-900 mx-auto mt-5 rounded-lg font-bold text-xl">
            <h1>On-site registration(현장 등록)</h1>
        </div>
        <div class="mt-10">
            <h1 class="text-sky-900 font-bold text-xl mt-10 mb-5">Participant Information(영문으로 기입 요청 드립니다.)</h1>
            <table class="tbl_type01">
                <colgroup>
                    <col width="20%">
                    <col width="*">
                </colgroup>
                <tr>
                    <th>Name<br>(이름)<span class="hit">*</span></th>
                    <td>
                        <div class="w-4/5 flex flex-col">
                            <div class="flex w-full justify-between  mb-3">
                                <input type="text" id="firstName" name="firstName" placeholder="First name"
                                    class="w-6/12" />
                                <input type="text" id="lastName" placeholder="Last name" id="lastName" name="lastName"
                                    type="text" class="w-6/12" />
                            </div>
                            <input id="koreanName" name="nick_name" id="koreanName" placeholder="국문 이름" type="text"
                                class="w-full">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Country<br> (국가)<span class="hit">*</span></th>
                    <td>
                        <select id="nation_no" name="nation_no" class="px-2 py-1 w-6/12 h-10">
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
                    </td>
                </tr>

                <tr>
                    <th>
                        Affiliation<br>(소속)
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <input type="text" id="affiliation" name="org" class="w-6/12" />
                    </td>
                </tr>
                <tr>
                    <th>
                        Mobile Phone Number<br>
                        (휴대전화번호)
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <div class="flex w-6/12">
                            <input type="text" id="contryNum" name="phone1" class="w-1/6" />
                            <input type="text" id="phoneNumber" name="phone2" class="w-5/6" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>
                        E-mail<br>(이메일)
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <div class="flex items-center w-7/12 justify-between">
                            <input type="text" name="email1" id="Email1" maxlength="64" value="" class="w-4/12">
                            <p>@</p>
                            <input type="text" name="email2" id="Email2" maxlength="64" value="" class="w-4/12">
                            <select name="Email3" id="Email3"
                                style="background-color:#ffffff;width:100px; height:40px;">
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
                    </td>
                </tr>
                <tr>
                    <th>
                        Member<br>(학회 회원 여부)
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <input type="radio" id="member" name="type4" />
                        <label for="member">Member(회원)</label>
                        <input type="radio" id="non_member" name="type5" />
                        <label for="non_member">Non-Member(비회원)</label>
                    </td>
                </tr>
                <tr>
                    <th>
                        Type of Participation<br>(참석유형)
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <div class="flex w-6/12 justify-between items-center">
                            <!-- <input type="text" id="Participation" maxlength="64" value="" class="w-11/12"> -->
                            <select id="Participation_1" style="background-color:#ffffff;" class="px-2 py-1 w-full h-10"
                                name="type1">
                                <option value="" selected="selected">선택사항</option>
                                <option value="임원">Committee</option>
                                <option value="연자">Speaker</option>
                                <option value="좌장">Chairperson</option>
                                <option value="Panel">Panel</option>
                                <option value="일반참가자">Paticipants</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Category<br>(참석자 구분)
                        <span class="hit">*</span>
                    </th>

                    <td>
                        <div class="flex w-6/12 justify-between items-center">
                            <!-- <input type="text" id="Category" maxlength="64" value="" class="w-11/12"> -->
                            <select id="Category_1" style="background-color:#ffffff;" class="px-2 py-1 w-full h-10"
                                name="type2">
                                <option value="" selected="selected">선택사항</option>
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
                    </td>
                </tr>

                <tr>
                    <th>
                        평점신청 여부<br>(Only Korean)
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <div class="h-12">
                            <input type="radio" id="need" />
                            <label for="need">필요</label>
                            <input type="radio" id="non_need" />
                            <label for="non_need">불필요</label>
                        </div>
                        <div class="flex items-center w-12/12 justify-left flex-wrap">
                            <div class="flex items-center">
                                <p class="mx-2">의사면허번호</p>
                                <input name="sn" id="doctor" type="text" class="mx-2" />
                            </div>
                            <div class="flex items-center">
                                <p class="mx-4"> 전문의번호 </p>
                                <input name="sn" id="specialist" type="text" />
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <table class="tbl_type01">
                <colgroup>
                    <col width="60%">
                    <col width="*">
                </colgroup>
                <tr>
                    <th colspan="2" class=" bg-sky-900 text-white">
                        Session participation(세션참여 여부)
                    </th>
                </tr>
                <tr>
                    <th>Welcome Reception
                        - September 7(Thu)
                        <span class="hit">*</span>
                    </th>

                    <td>
                        <div>
                            <input class="session_radio" type="radio" id="yes_1" />
                            <label for="yes_1">Yes</label>
                            <input class="session_radio" type="radio" id="no_1" />
                            <label for="no_1">NO</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Day 2 Breakfast Symposium
                        - September 8(Fri)
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <div>
                            <input class="session_radio" type="radio" id="yes_2" />
                            <label for="yes_2">Yes</label>
                            <input class="session_radio" type="radio" id="no_2" />
                            <label for="no_2">NO</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Day 2 Luncheon Symposium
                        - September 8(Fri)
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <div>
                            <input class="session_radio" type="radio" id="yes_3" />
                            <label for="yes_3">Yes</label>
                            <input class="session_radio" type="radio" id="no_3" />
                            <label for="no_3">NO</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Day 3 Breakfast Symposium
                        - September 9(Sat)
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <div>
                            <input class="session_radio" type="radio" id="yes_4" />
                            <label for="yes_4">Yes</label>
                            <input class="session_radio" type="radio" id="no_4" />
                            <label for="no_4">NO</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Day 3 Luncheon Symposium
                        - September 9(Sat)
                        <span class="hit">*</span>
                    </th>
                    <td>
                        <div>
                            <input class="session_radio" type="radio" id="yes_5" />
                            <label for="yes_5">Yes</label>
                            <input class="session_radio" type="radio" id="no_5" />
                            <label for="no_5">NO</label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th colspan="2" class=" bg-sky-900 text-white">
                        Where did you get the information about the conference?(가입경로)
                        <span class="hit">*</span>
                    </th>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="flex flex-col">
                            <div class="flex items-center mb-4 text-base">
                                <input class="checkbox" type="checkbox" id="A" />
                                <label for="A">Website of the Korea Society of Obesity
                                </label>
                            </div>
                            <div class="flex items-center mb-4 text-base">
                                <input class="checkbox" type="checkbox" id="B" />
                                <label for="B">Promotional email from the Korea Society of Obesity
                                </label>
                            </div>
                            <div class="flex items-center mb-4 text-base">
                                <input class="checkbox" type="checkbox" id="C" />
                                <label for="C">Advertising email or the bulletin board from the relevant society
                                </label>
                            </div>
                            <div class="flex items-center mb-4 text-base">
                                <input class="checkbox" type="checkbox" id="D" />
                                <label for="D">Information about affiliated companies/organizations
                                </label>
                            </div>
                            <div class="flex items-center mb-4 text-base">
                                <input class="checkbox" type="checkbox" id="E" />
                                <label for="E">Invited as a speaker, moderator, and panelist
                                </label>
                            </div>
                            <div class="flex items-center mb-4 text-base">
                                <input class="checkbox" type="checkbox" id="F" />
                                <label for="F">Recommended by a professor
                                </label>
                            </div>
                            <div class="flex items-center mb-4 text-base">
                                <input class="checkbox" type="checkbox" id="G" />
                                <label for="G">Recommended by acquaintances
                                </label>
                            </div>
                            <div class="flex items-center mb-4 text-base">
                                <input class="checkbox" type="checkbox" id="H" />
                                <label for="H">Pharmaceutical company
                                </label>
                            </div>
                            <div class="flex items-center mb-4 text-base">
                                <input class="checkbox" type="checkbox" id="I" />
                                <label for="I">Medical community (MEDI:GATE, Dr.Ville, etc.)

                                </label>
                            </div>
                            <div class="flex items-center mb-4 text-base">
                                <input class="checkbox" type="checkbox" id="J" />
                                <label for="J">Medical news and journal
                                </label>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="flex items-center justify-center">
                <button id="Submit" type="button"
                    class="w-60 h-15 bg-sky-900 text-white p-3 my-5 text-lg">Submit</button>
            </div>
        </div>
    </div>

    <!-- ==================================================================== -->
    <div class="wrap_2" style="display: none;">
        <div class="confirm_box mt-10">
            <div class="confirm_box_title h-10 flex items-center justify-center">
                <h1 class="text-xl font-bold">Use of Personal Information (개인정보활용동의)</h1>
            </div>
            <div class="flex flex-col items-center justify-center">
                <h3 class="mt-7 font-bold text-lg">ICOMES 2023 이용 약관</h3>
                <P class="text-base mt-5">
                    본 학술대회의 주관사인 대한비만학회는 학술대회 등록시스템 서비스 제공을 위하여 관계 법령에 따라
                    아래와 같이 <br>개인정보를 수집, 이용하는 내용을 알리오니 자세히 읽으신 후 동의 여부를 결정하여 주십시오.
                </P>
            </div>
        </div>
        <div class="all_checkbox">
            <input id="all_check" type="checkbox" />
            <label for="all_check">개인정보 수집 및 제공 동의에 모두 동의</label>
        </div>
        <div class="personal_checkbox">
            <div>
                <input id="first_check" class="check" type="checkbox" />
                <label for="first_check">개인정보 수집 동의 <span>(필수)</span></label>
            </div>

            <textarea class="border text-base" disabled="" readonly="">개인정보 수집 및 이용 동의
            개인정보 수집 및 이용 동의
            1. 수집항목: 성명, 휴대폰번호, 바코드 입장 정보
            2. 수집/이용 목적
            참가자들의 편의와 참가업체 상호간의 유용한 정보 교류 서비스 제공을 위한 학술대회 출입증 발급 및 전
            자명함시스템 제공에 이용되며, 본 학술대회에서 수집한 개인정보는 차기 학술대회 초대권 발송 및 안내
            를 위한 용도 외의 다른 목적으로 사용되지 않습니다.
            ※ 기타 개인정보 취급에 관한 상세한 사항은 본 학술대회 홈페이지
            (https://icomes.or.kr/main/signup.php)에 공개하고 있는 “개인정보 처리방침”을 참조 하십시오.
            </textarea>
        </div>

        <div class="personal_checkbox">
            <div>
                <input id="second_check" class="check" type="checkbox" />
                <label for="second_check">개인정보 2자 제공 동의<span>(필수)</span></label>
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
                <label for="third_check"> 차기 학술대회 관련 안내 이메일 수신 동의 <span style="color: #7d8597;">(선택)</span> </label>

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
                <label for="fourth_check"> 차기 학술대회 관련 안내 이메일 수신 동의 <span style="color: #7d8597;">(선택)</span>
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
            <button type="button" class="pre_btn w-60 h-15 bg-sky-900 text-white p-3 my-5 text-lg">Previous</button>
            <button type="submit" class="next_btn w-60 h-15 bg-sky-900 text-white p-3 my-5 text-lg">Submit</button>
        </div>
    </div>
</form>
<!-- </body>


</html> -->
<script>
const wrap_1 = document.querySelector(".wrap_1")
const wrap_2 = document.querySelector(".wrap_2")

const firstName = document.querySelector("#firstName");
const LastName = document.querySelector("#lastName");
const KoreanName = document.querySelector("#koreanName");

const contry = document.querySelector("#nation_no");

const affilation = document.querySelector("#affiliation");

const contryNumber = document.querySelector("#contryNum");
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

const submitButton = document.querySelector("#Submit")
const finalButton = document.querySelector(".next_btn")
const preButton = document.querySelector(".pre_btn")

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


// /**한국어 유효성 검사 */
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

contry.addEventListener("click", () => {

    contryNumber.value = contry.options[contry.selectedIndex].dataset.nt
})

email_3.addEventListener("click", () => {
    email_2.value = email_3.options[email_3.selectedIndex].value
})

member.addEventListener("click", () => {
    if (member.checked) {
        nonMember.checked = false;
    } else {
        member.checked = true;
    }
})

nonMember.addEventListener("click", () => {
    if (nonMember.checked) {
        member.checked = false;
    } else {
        nonMember.checked = true;
    }
})

// participationSelect.addEventListener("click", () => {
//     participation.value = participationSelect.options[participationSelect.selectedIndex].value
// })

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

preButton.addEventListener("click", () => {
    wrap_2.style.display = "none";
    wrap_1.style.display = "";
})

let checkedArr = []

submitButton.addEventListener("click", (e) => {
    onSubmit(e)
})
allCheck.addEventListener("click", () => selectAll());
/**모두 체크 눌렀을 때 */
function selectAll() {
    checkedbox2.forEach((checkbox) => {
        checkbox.checked = allCheck.checked
    })
    checkedArr = [firstCheck.checked, secondCheck.checked, thirdCheck.checked, fourthCheck.checked];
}


finalButton.addEventListener("click", () => onClickSubmit())

function onSubmit(e) {
    // e.preventDefault()
    if (!firstName.value || !LastName.value || !KoreanName.value) {
        alert("invaild Name");
        firstName.focus()
        return;
    }
    if (!contry.value) {
        alert("invaild contry");
        contry.focus()
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
    if (!email_1.value) {
        alert("invaild email");
        email_1.focus()
        return;
    }
    if (!member.checked && !nonMember.checked) {
        alert("invaild member");
        member.focus()
        return;
    }
    if (!participationSelect.options[participationSelect.selectedIndex].value) {
        alert("invaild participation");
        participationSelect.focus()
        return;
    }
    if (!categorySelect.options[categorySelect.selectedIndex].value) {
        alert("invaild category");
        categorySelect.focus()
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

    if (need.checked && !doctor.value && !specialist.value) {
        alert("invaild grade");
        need.focus()
        return;
    }

    if (!one || !two || !three || !four || !five) {
        alert("invaild  Session participation");

        return;
    }
    const isAnyCheckboxChecked = Array.from(checkboxes).some((checkbox) => checkbox.checked);

    if (!isAnyCheckboxChecked) {
        alert("Please select at least one option.");
        return;
    }

    wrap_1.style.display = "none";
    wrap_2.style.display = "";
    allCheck.focus()
}

function onClickSubmit() {
    if (!firstCheck.checked || !secondCheck.checked) {
        alert("필수항목을 체크해주세요.")
        firstCheck.focus()
        return;
    } else {
        checkedArr = [firstCheck.checked, secondCheck.checked, thirdCheck.checked, fourthCheck.checked];

    }
    const members = member.checked ? "회원" : "비회원"
    const needs = need.checked ? "필요" : "불필요"
    const checkArray = []
    checkboxes.forEach((check) => {
        checkArray.push(check.checked)
    })
    console.log("체크항목", checkedArr)
    console.log("이름", firstName.value, LastName.value, KoreanName.value)
    console.log("국가", contry.value)
    console.log("소속", affilation.value)
    console.log("휴대폰", phone.value)
    console.log("이메일", email_1.value, email_2.value)
    console.log("member", members)
    console.log("참석유형", participationSelect.options[participationSelect.selectedIndex].value)
    console.log("카테고리", categorySelect.options[categorySelect.selectedIndex].value)
    console.log("평점신청 여부", needs, doctor.value, specialist.value)
    console.log("세션참여 여부", [first, second, third, fourth, fiveth])
    console.log("가입경로", checkArray)
    // window.location.href = "/onsite/success";
    // const data = {
    //     type2: categorySelect.options[categorySelect.selectedIndex].value,
    //     nick_name: KoreanName.value ? KoreanName.value : firstName.value + LastName.value,
    //     country: contry.value,
    //     phone: phone.value,
    //     email: email_1.value + email_2.value,
    //     org: affilation.value,
    //     type1: participationSelect.options[participationSelect.selectedIndex].value,
    //     type3: members,
    //     sn: needs ? doctor.value || specialist.value : ""
    // };
}
</script>