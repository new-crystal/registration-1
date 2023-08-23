<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">


<!-- Mirrored from ezv.kr/kscp2020f/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Dec 2020 19:48:58 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Intoon_reg</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,Chrome=1" />
    <meta property="og:image" content="/assets/images/og_image.png" />
    <meta property="og:description" content="대한심뇌혈관질환예방학회 개원의 연수강좌 사전등록 홈페이지입니다" />
    <meta property="og:title" content="대한심뇌혈관질환예방학회 개원의 연수강좌" />

    <link type="text/css" rel="stylesheet" href="/assets/css/common_v1.1.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/allergyWs.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/allergyWs_sub.css" />
    <link type="text/css" rel="stylesheet" href="/assets/css/custom_abstract.css" />
    <!--script type="text/javascript" src="/assets/js/jquery.min.1.7.1.js"></script-->

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <!--script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script-->
    <script type="text/javascript" src="/assets/js/jquery.placeholder.js"></script>

    <link rel="stylesheet" href="/assets/css/jquery-ui.css">
    <script src="/assets/js/jquery-ui.min.js"></script>

    <script type="text/javascript" src="/assets/js/user.js"></script>
    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
    <script type="text/javascript">
    //<![CDATA[

    //]]>
    </script>

</head>

<body>
    <div class="wrapper">
        <div class="headerWrap">
            <dl id="skipNavi">
                <dt>Skip Navigation</dt>
                <dd><a href="#container">Skip to contents</a></dd>
            </dl>

            <div class="header">
                <h1><a href="/" title="홈으로 이동">대한심뇌혈관질환예방학회 개원의 연수강좌</a></h1>

                <div class="gnbWrap">
                    <ul id="gnb">
                        <li class="<?= ($this->uri->segment(1) === null) ? 'on' : '' ?>"><a href="/index.php">인사말</a>
                        </li>
                        <li class="<?= ($this->uri->segment(1) === 'info') ? 'on' : '' ?>"><a href="/info/">학술행사 안내</a>
                        </li>
                        <li class="<?= ($this->uri->segment(1) === 'program') ? 'on' : '' ?>"><a
                                href="/program/">프로그램</a></li>
                        <li class="<?= ($this->uri->segment(1) === 'registration') ? 'on' : '' ?>"><a
                                href="/registration/">사전등록
                                및 확인</a></li>
                        <!--li class="<?= ($this->uri->segment(1) === 'submission') ? 'on' : '' ?>"><a href="/submission/" >포스터 접수</a></li-->
                        <li class=" <?= ($this->uri->segment(1) === 'location') ? 'on' : '' ?>"><a href="/location/">오시는
                                길</a>
                        </li>
                        <li><a href="/onSite/">현장등록</a>
                        </li>
                        <!-- li><a href="http://kscp-live.com/" >강의시청</a></li -->
                    </ul>

                </div>
                <!-- //gnb -->



                <dl class="wsInfo">
                    <dt>대한심뇌혈관질환예방학회 개원의 연수강좌</dt>
                    <dd>
                        <p>일자 : 2023년 7월 2일(일) 09:00 ~ 17:30</p>
                        <p>장소 : 세종대학교 광개토관, 컨벤션홀(B2)</p>
                    </dd>
                </dl>
            </div>
            <!-- //header -->

        </div>
        <!-- //headerWrap -->
        <hr />

        <script type="text/javascript">
        $('.construction').click(function() {
            alert('업데이트 중 입니다.')
        })

        $(".gnbWrap").each(function() {
            var header = $('.gnbWrap');
            var headerOffset = header.offset().top;

            $(window).scroll(function() {
                //                console.log(header);
                var wScroll = $(this).scrollTop();
                if (wScroll > headerOffset) {
                    header.addClass("sticky");
                } else {
                    header.removeClass("sticky");
                }
            });
        });
        </script>