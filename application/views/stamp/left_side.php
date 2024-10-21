<script type="text/javascript" src="/assets/js/datatables/datatables.min.js"></script>
<link href="/assets/css/admin.css" rel="stylesheet" type="text/css" />

<body>
    <!-- Main navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="/admin"><img src="#" alt=""></a>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">


            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span>Admin</span>
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">

                        <li><a href="/admin/log_out"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->
    <!-- Page container -->
    <div class="page-container" style="min-height: calc(100vh - 46px)">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <div class="sidebar sidebar-main">
                <div class="sidebar-content">
                    <!-- Main navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-content no-padding">
                            <ul class="navigation navigation-main navigation-accordion">

                                <!-- Main -->
                                <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                                <li style="margin-bottom: 2rem;" <?php if ($primary_menu == 'users') echo 'class="active"' ?>>
                                    <a href="/event">
                                        <i class="icon-list-unordered"></i>
                                        <span> 등록 관리
                                        </span>
                                    </a>
                                </li>
                               
                                <li style="margin-bottom: 2rem;" <?php if ($primary_menu == 'stamp') echo 'class="active"' ?>>
                                    <a href="/event/access">
                                        <i class="icon-list-unordered"></i>
                                        <span> Event 관리
                                        </span>
                                    </a>
                                </li>
                                <li style="margin-bottom: 2rem;" >
                                    <a href="/event/excel_download_event" target="_blank">
                                        <i class="icon-download4"></i>
                                        <span>QR 기록 다운로드
                                        </span>
                                    </a>
                                </li>
                                </li>
                                <!-- /main -->
                            </ul>
                        </div>
                    </div>
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /main sidebar -->