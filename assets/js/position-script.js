$(function() {
  $('#add-form-btn').on('click', function(){
    $('div.table-responsive').addClass('d-none');
    $('div.create-position-form').removeClass('d-none');
    $('#add-form-btn').addClass('d-none');
  });
  $('#cancel-save-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.create-position-form').addClass('d-none');
    $('#add-form-btn').removeClass('d-none');
  });
  $('#cancel-edit-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.edit-position-form').addClass('d-none');
    $('#add-form-btn').removeClass('d-none');
  });
  $('.edit-btn').on('click', function() {
    $('div.table-responsive').addClass('d-none');
    $('div.edit-position-form').removeClass('d-none');
    $('#add-form-btn').addClass('d-none');

    const id=$(this).attr("data-id");
    const posi_name=$(this).attr("data-posi-name");
		$('#update_from #posi_id').val(id);
		$('#update_from #posi_name').val(posi_name);
  });
  $('.delete-btn').on('click', function() {
    const id=$(this).attr("data-id");
    const posi_name=$(this).attr("data-posi-name");
    $('#id_d').val(id);
    $('#posi_name_d').text(posi_name);
	});

  $('#save-btn').click(function(){
    const data = $("#create_form").serialize();
    $.ajax({
      data: data,
      type: "post",
      url: "/photak-system/actions/position.php",
      success: function(response) {
        const dataResult = JSON.parse(response);
        if(dataResult.statusCode==200){
          alert('เพิ่มข้อมูล สำเร็จ');
          location.reload();
        }
        else if(dataResult.statusCode==201){
          alert(dataResult);
        }
      }
    });
  });

  $('#edit-btn').click(function(){
    const data = $("#update_from").serialize();
    $.ajax({
      data: data,
      type: "post",
      url: "/photak-system/actions/position.php",
      success: function(response) {
        const dataResult = JSON.parse(response);
        if(dataResult.statusCode==200){
          alert('แก้ไขข้อมูล สำเร็จ');
          location.reload();
        }
        else if(dataResult.statusCode==201){
          alert(dataResult);
        }
      }
    });
  });

  $('#delete-btn').click(function(){
    $.ajax({
      data: {
        type: 'delete',
        id: $('#id_d').val(),
      },
      type: "post",
      url: "/photak-system/actions/position.php",
      success: function(response) {
        alert('ลบข้อมูล สำเร็จ');
        location.reload();
      }
    });
  });
});
