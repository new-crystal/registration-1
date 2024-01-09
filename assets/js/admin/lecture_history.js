
$(function() {

	// Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        stateSave: true,
        stateDuration:-1,
        autoWidth: false,
        lengthMenu: [
            [50, 100, 200], // 페이지 당 레코드 수 옵션
            [50, 100, 200] // 옵션 레이블
        ],
        // columnDefs: [{ 
        //     orderable: false,
        //     width: '100px',
        //     targets: [ 5 ]
        // }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>검색</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });

	$('.datatable-basic').DataTable({
        stateSave: true,
        stateDuration:-1,
       
    });



	 // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');

   // 최소 2글자 이상 입력해야 검색 실행
   $('.dataTables_filter input[type="search"]').on('keyup', function() {
    var minCharacters = 2; // 최소 글자 수 설정
    var searchText = $(this).val().trim();
    if (searchText.length >= minCharacters || searchText === '') {
        // 최소 글자 수 이상 또는 검색어가 없는 경우 검색 실행
        $('.datatable-basic').DataTable().search(searchText).draw();
    }
});

     // Enable Select2 select for the length option
     $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto',
        dropdownAutoWidth : true // Added for auto width
    }).val(50).trigger('change');
});

function excel_download(){
    $.post('/admin/excel_download', function(resp){});
}

