const handleEditRow = () => {
  $('div.table-responsive').addClass('d-none');
  $('div.edit-building-form').removeClass('d-none');
  $('#add-form-btn').addClass('d-none');
}
$(function() {
  $('#add-form-btn').on('click', function(){
    $('div.table-responsive').addClass('d-none');
    $('div.create-building-form').removeClass('d-none');
    $('#add-form-btn').addClass('d-none');
  });
  $('#cancel-save-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.create-building-form').addClass('d-none');
    $('#add-form-btn').removeClass('d-none');
  });
  $('#cancel-edit-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.edit-building-form').addClass('d-none');
    $('#add-form-btn').removeClass('d-none');
  });
});