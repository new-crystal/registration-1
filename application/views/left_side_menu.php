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
                                <li class="navigation-header"><span>Main</span> <i class="icon-menu"
                                        title="Main pages"></i></li>
                                <li style="margin-bottom: 2rem;"
                                    <?php if ($primary_menu == 'oral') echo 'class="active"' ?>>
                                    <a href="/score/admin">
                                        <i class="icon-list-unordered"></i>
                                        <span>Oral</span>
                                    </a>
                                </li>

                                <li style="margin-bottom: 2rem;"
                                    <?php if ($primary_menu == 'poster_1') echo 'class="active"' ?>>
                                    <a href="/score/admin_poster1">
                                        <i class="icon-list-unordered"></i>
                                        <span>Poster oral 1(Day 2)</span>
                                    </a>
                                </li>
                                
                                <li style="margin-bottom: 2rem;"
                                    <?php if ($primary_menu == 'poster_2') echo 'class="active"' ?>>
                                    <a href="/score/admin_poster2">
                                        <i class="icon-list-unordered"></i>
                                        <span>Poster oral 2(Day 3)</span>
                                    </a>
                                </li>
                                
                                <li style="margin-bottom: 2rem;"
                                    <?php if ($primary_menu == 'reviewer') echo 'class="active"' ?>>
                                    <a href="/score/reviewer">
                                        <i class="icon-list-unordered"></i>
                                        <span>심사위원</span>
                                    </a>
                                </li>
                            
                                <!-- /main -->
                            </ul>
                        </div>
                    </div>
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /main sidebar -->