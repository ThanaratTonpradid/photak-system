const handleEditRow = () => {
  $("div.table-responsive").addClass("d-none");
  $("div.edit-product-form").removeClass("d-none");
  $('#add-form-btn').addClass('d-none');
};
$(function () {
  $("#add-form-btn").on("click", function () {
    $("div.table-responsive").addClass("d-none");
    $("div.create-product-form").removeClass("d-none");
    $('#add-form-btn').addClass('d-none');
  });
  $("#cancel-save-btn").on("click", function () {
    $("div.table-responsive").removeClass("d-none");
    $("div.create-product-form").addClass("d-none");
    $('#add-form-btn').removeClass('d-none');
  });
  $("#cancel-edit-btn").on("click", function () {
    $("div.table-responsive").removeClass("d-none");
    $("div.edit-product-form").addClass("d-none");
    $('#add-form-btn').removeClass('d-none');
  });
  $("#customFileCreate").change(function(e) {
    const fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label.create").addClass("selected").html(fileName);
    $("#create-file-preview").removeClass("d-none");
    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById("create-file-preview").src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
  });
  $("#customFileEdit").change(function(e) {
    const fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label.edit").addClass("selected").html(fileName);
    $("#edit-file-preview").removeClass("d-none");
    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById("edit-file-preview").src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
  });
});