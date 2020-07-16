const handleEditRow = () => {
  $('div.table-responsive').addClass('d-none');
  $('div.edit-mat-with-form').removeClass('d-none');
  $('#add-form-btn').addClass('d-none');
  $('#search-form').addClass('d-none');
}
$(function() {
  $('#add-form-btn').on('click', function(){
    $('div.table-responsive').addClass('d-none');
    $('div.create-mat-with-form').removeClass('d-none');
    $('#add-form-btn').addClass('d-none');
    $('#search-form').addClass('d-none');
  });
  $('#cancel-save-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.create-mat-with-form').addClass('d-none');
    $('#add-form-btn').removeClass('d-none');
    $('#search-form').removeClass('d-none');
  });
  $('#cancel-edit-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.edit-mat-with-form').addClass('d-none');
    $('#add-form-btn').removeClass('d-none');
    $('#search-form').removeClass('d-none');
  });
});
