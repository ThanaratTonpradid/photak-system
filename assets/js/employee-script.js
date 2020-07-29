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
    const em_fname=$(this).attr("data-em-fname");
    const em_lname=$(this).attr("data-em-lname");
    const em_user=$(this).attr("data-em-user");
    const em_pass=$(this).attr("data-em-pass");
    const em_status=$(this).attr("data-em-status");
    const em_group=$(this).attr("data-em-group");
    const posi_id=$(this).attr("data-posi-id");
    const d_id=$(this).attr("data-d-id");
		$('#em_id_u').val(id);
		$('#em_fname_u').val(em_fname);
		$('#em_lname_u').val(em_lname);
		$('#em_user_u').val(em_user);
    $('#em_pass_u').val(em_pass);
    const radios = $('input:radio[id=em_status_u]');
    const radio = radios.filter(`[value=${em_status}]`);
    radio.attr('checked', true);
		$('#em_group_u').val(em_group);
		$('#posi_id_u').val(posi_id);
		$('#d_id_u').val(d_id);
  });
  $('.delete-btn').on('click', function() {
    const id=$(this).attr("data-id");
    const em_fname=$(this).attr("data-em-fname");
    const em_lname=$(this).attr("data-em-lname");
    const em_user=$(this).attr("data-em-user");
    const em_pass=$(this).attr("data-em-pass");
    const em_status=$(this).attr("data-em-status");
    const em_group=$(this).attr("data-em-group");
    const posi_id=$(this).attr("data-posi-id");
    const d_id=$(this).attr("data-d-id");
		$('#id_d').val(id);
    $('#em_fname_d').text(em_fname);
    $('#em_lname_d').text(em_lname);
		$('#em_user_d').text(em_user);
		$('#em_pass_d').text(em_pass);
		$('#em_status_d').text(em_status);
		$('#em_group_d').text(em_group);
		$('#posi_id_d').val(posi_id);
		$('#d_id_d').val(d_id);
	});

  $('#save-btn').click(function(){
    const data = $("#create-form").serialize();
    $.ajax({
      data: data,
      type: "post",
      url: "/photak-system/actions/employee.php",
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
      url: "/photak-system/actions/employee.php",
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
      url: "/photak-system/actions/employee.php",
      success: function(response) {
        alert('ลบข้อมูล สำเร็จ');
        location.reload();
      }
    });
  });
});
