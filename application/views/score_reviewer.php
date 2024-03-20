<script type="text/javascript" src="/assets/js/admin/lecture_history.js"></script>
<style>
table th {
    padding: 0;
    font-size: 1.2rem;
}

.loading_box {
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    transform: translateX(-200px);
    z-index: 9999;
}

.loading {
    position: absolute;
    top: 10%;
    left: 52%;
    transform: translate(-50%, -50%);
}
</style>
<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div style="display: none;" class="loading_box" onclick="alert('진행중입니다.')">

        <svg class="loading" version="1.1" id="L5" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100"
            enable-background="new 0 0 0 0" xml:space="preserve" width="70px" height="70px">
            <circle fill="#fff" stroke="none" cx="6" cy="50" r="6">
                <animateTransform attributeName="transform" dur="1s" type="translate" values="0 15 ; 0 -15; 0 15"
                    repeatCount="indefinite" begin="0.1" />
            </circle>
            <circle fill="#fff" stroke="none" cx="30" cy="50" r="6">
                <animateTransform attributeName="transform" dur="1s" type="translate" values="0 10 ; 0 -10; 0 10"
                    repeatCount="indefinite" begin="0.2" />
            </circle>
            <circle fill="#fff" stroke="none" cx="54" cy="50" r="6">
                <animateTransform attributeName="transform" dur="1s" type="translate" values="0 5 ; 0 -5; 0 5"
                    repeatCount="indefinite" begin="0.3" />
            </circle>
        </svg>
    </div>
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">초록 심사위원</span></h4>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">심사위원</h5>
                <div class="heading-elements">
                </div>
            </div>
            <!-- <?php print_r($reviewers) ?> -->
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th>성함</th>
                        <th>코드</th>
                        <th>소속</th>
                        <th>평가 완료 여부</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($reviewers as $item) {
                        echo '<tr>';
                        echo '<td><a href="/score/reviewer_detail?n=' . $item['idx'] . '"target="_top">' . $item['nick_name'] . '</a></td>';
                        echo '<td>' . $item['code'] . '</td>';
                        echo '<td>' . $item['org'] . '</td>';
                        echo '<td>' . $item['has_score'] . '</td>';
                        echo '</tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->
        <div class="footer text-muted">
            © 2024. <a href="#">온라인 학술대회</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">(주)인투온</a>
        </div>
    </div>
    <!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->

</body>