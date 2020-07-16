const handleEditRow = () => {
  $('div.table-responsive').addClass('d-none');
  $('div.edit-employee-form').removeClass('d-none');
  $('#add-form-btn').addClass('d-none');
}
$(function() {
  $('#add-form-btn').on('click', function(){
    $('div.table-responsive').addClass('d-none');
    $('div.create-employee-form').removeClass('d-none');
    $('#add-form-btn').addClass('d-none');
  });
  $('#cancel-save-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.create-employee-form').addClass('d-none');
    $('#add-form-btn').removeClass('d-none');
  });
  $('#cancel-edit-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.edit-employee-form').addClass('d-none');
    $('#add-form-btn').removeClass('d-none');
  });
});