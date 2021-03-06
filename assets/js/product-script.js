$(function () {
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
