<script type="text/javascript" src="/assets/js/admin/lecture_history.js"></script>
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">초록등록인원</span></h4>
						</div>
					</div>				
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">초록등록인원</h5>
							<div class="heading-elements">
                                <?php /*
								<form action="/admin/excel_download_abstract" method="post">
									<button class="btn btn-primary pull-right" ><i class="icon-download4"></i> &nbspExcel Download</button>
								</form>
                                */ ?>
<!--                                <a class="btn btn-primary pull-right" href="/admin/add_user"><i class="icon-add"></i> 등록</a>-->
                                <button class="btn btn-primary pull-right" id="wordDownload" ><i class="icon-download4"></i> &nbspWord Download</button>
		                	</div>
						</div>

						<table class="table datatable-basic">
							<thead>
								<tr>
<!--									<th></th>-->
									<th>논문번호</th>
									<th>이름</th>
									<th>이메일</th>
									<th>제목</th>
									<th>발표 유형</th>
									<th>등록일</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach($new_abstracts as $item){
									echo '<tr>';
//									echo '<td style="text-align: center;"><input type="checkbox" name="depositChk" class="depositChk" value="'.  $item['idx'] .'"></td>';
									echo '<td>' . $item['SERIAL'] . '</td>';
									echo '<td>' . $item['NAME'] . '</td>';
									echo '<td>' . $item['EMAIL'] . '</td>';
									echo '<td class="user_d"><a href="/admin/new_abstract_detail?n='. $item['IDX'] . '">' . $item['TITLE'] . '</a></td>';
									if ("1"==$item['PRESENT_TYPE']) {
										echo '<td>발표</td>';
									} else {
										echo '<td>전시</td>';
									}
									echo '<td>' . $item['TIME'] . '</td>';
									echo '</tr>';
								}
								?>
								
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->
					<div class="footer text-muted">
						© <a href="#">온라인 학술대회</a> by (주)인투온
					</div>
				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
    <script>

//        $('#allChk').click(function(){
//            if($('input:checkbox[id="allChk"]').prop('checked')){
//                $('input[type=checkbox]').prop('checked',true);
//            }else{
//                $('input[type=checkbox]').prop('checked',false);
//            }
//        })


        $('.depositChk').click(function(){
            var formName = $('#depositForm');
            var formName2 = $('#nametagForm');
            var userId = $(this).val();
            var checkHtml = '<input type="hidden" class="userId user'+userId+'" name="userId[]" value="'+userId+'" id="">'
            if($(this).prop('checked')){
                formName.append(checkHtml);
                formName2.append(checkHtml);
            }else{
                $('.user'+userId).remove();
            }
        })

        $('#wordDownload').click(function(){
            
            var blob = "";

            <?php
                foreach($new_abstracts as $item){
            ?>
            $.ajax({
                url:'/admin/new_abstract_2docx?n=<?php echo $item['IDX'];?>',
                type : "POST",
                enctype: 'multipart/form-data',
                cache: false,
                contentType:false,
                processData:false,
                async: false,
                success : function(res) {
                    blob += res
                },
                error: function( request, status, error ){
                    alert("error");
                    console.log("status : " + request.status + ", message : " + request.responseText + ", error : " + error);
                }
            });

            <?php
                }
            ?>

            
            customExport2Word(blob);
        });

        
        function customExport2Word(blob, filename = ''){
                var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
                var postHtml = "</body></html>";
                var html = preHtml+blob+postHtml;

                var blob = new Blob(['\ufeff', html], {
                    type: 'application/msword'
                });
                
                // Specify link url
                var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
                
                // Specify file name
                filename = filename?filename+'.doc':'document.doc';
                
                // Create download link element
                var downloadLink = document.createElement("a");

                document.body.appendChild(downloadLink);
                
                if(navigator.msSaveOrOpenBlob ){
                    navigator.msSaveOrOpenBlob(blob, filename);
                }else{
                    // Create a link to the file
                    downloadLink.href = url;
                    
                    // Setting the file name
                    downloadLink.download = filename;
                    
                    //triggering the function
                    downloadLink.click();
                }
                
                document.body.removeChild(downloadLink);
        }
    </script>
</body>
