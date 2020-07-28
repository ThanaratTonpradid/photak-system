$(function() {
  $('#add-form-btn').on('click', function(){
    $('div.table-responsive').addClass('d-none');
    $('div.create-form').removeClass('d-none');
    $('#add-form-btn').addClass('d-none');
  });
  $('#cancel-save-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.create-form').addClass('d-none');
    $('#add-form-btn').removeClass('d-none');
  });
  $('#cancel-edit-btn').on('click', function(){
    $('div.table-responsive').removeClass('d-none');
    $('div.edit-form').addClass('d-none');
    $('#add-form-btn').removeClass('d-none');
  });
  $('.edit-btn').on('click', function() {
    $('div.table-responsive').addClass('d-none');
    $('div.edit-form').removeClass('d-none');
    $('#add-form-btn').addClass('d-none');

    const id=$(this).attr("data-id");
    const room_name=$(this).attr("data-room-name");
    const room_phone=$(this).attr("data-room-phone");
    const buil_id=$(this).attr("data-buil-id");
		$('#room_id_u').val(id);
		$('#room_name_u').val(room_name);
		$('#room_phone_u').val(room_phone);
		$('#room_buil_id').val(Number(buil_id));
  });
  $('.delete-btn').on('click', function() {
    const id=$(this).attr("data-id");
    const room_name=$(this).attr("data-room-name");
    const room_phone=$(this).attr("data-room-phone");
    const buil_id=$(this).attr("data-buil-id");
    $('#id_d').val(id);
    $('#room_name_d').text(room_name);
    $('#room_phone_d').text(room_phone);
    $('#room_buil_id').text(buil_id);
	});

  $('#save-btn').click(function(){
    const data = $("#create-form").serialize();
    $.ajax({
      data: data,
      type: "post",
      url: "/photak-system/actions/room.php",
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
    const data = $("#edit-form").serialize();
    $.ajax({
      data: data,
      type: "post",
      url: "/photak-system/actions/room.php",
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
      url: "/photak-system/actions/room.php",
      success: function(response) {
        alert('ลบข้อมูล สำเร็จ');
        location.reload();
      }
    });
  });
});
