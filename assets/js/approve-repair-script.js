const handleEditRow = () => {
  $('div.table-responsive').addClass('d-none');
  $('div.edit-approve-repair-form').removeClass('d-none');
}
const handleApproveRow = () => {
  $('div.table-responsive').addClass('d-none');
  $('div.create-approve-repair-form').removeClass('d-none');
}
$(function() {
  $('#cancel-save-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.create-approve-repair-form').addClass('d-none');
  });
  $('#cancel-edit-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.edit-approve-repair-form').addClass('d-none');
  });
});
