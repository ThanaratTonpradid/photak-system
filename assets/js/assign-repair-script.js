const handleEditRow = () => {
  $('div.table-responsive').addClass('d-none');
  $('div.edit-assign-repair-form').removeClass('d-none');
}
const handleAssignRow = () => {
  $('div.table-responsive').addClass('d-none');
  $('div.create-assign-repair-form').removeClass('d-none');
}
$(function() {
  $('#cancel-save-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.create-assign-repair-form').addClass('d-none');
  });
  $('#cancel-edit-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.edit-assign-repair-form').addClass('d-none');
  });
});
