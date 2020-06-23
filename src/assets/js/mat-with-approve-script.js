const handleApproveRow = () => {
  $('div.table-responsive').addClass('d-none');
  $('div.create-mat-with-approve-form').removeClass('d-none');
  $('#search-form').addClass('d-none');
}
$(function() {
  $('#cancel-save-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.create-mat-with-approve-form').addClass('d-none');
    $('#search-form').removeClass('d-none');
  });
});
