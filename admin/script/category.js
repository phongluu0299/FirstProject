$(document).ready(function() {
    
    //Open modal
    $(document).on("click","#btn-add", function(){
        $('#modalUsers #form-update-user').trigger("reset");
        $('#modalUsers #form-update-user .msg_error').empty();
        
        $('#modalUsers').modal('show'); 
    })

    $(document).on("click",".btn-edit", function(){
        $('#modalUsers #form-update-user').trigger("reset");
        $('#modalUsers #form-update-user .msg_error').empty();
        callModalUser($(this).data("id"))
    })

    function callModalUser(UserID){
        $.ajax({
            url: "functionsite/users/ajaxuser.php",  
            type: 'POST',
            data: {
                UserID:UserID
            },
            success: function(data) {
              var object = jQuery.parseJSON(data);
              $("#form-update-user #FullName").val(object["FullName"]);
              $("#form-update-user #UserName").val(object["UserName"]);
              $("#form-update-user #Password").val(object["PassWord"]);
              $("#form-update-user #Email").val(object["Email"]);
              $("#form-update-user #Phone").val(object["Phone"]);
              $("#form-update-user #Gender").val(object["Gender"]);
              $('#form-update-user #Gender').trigger('change');
              $("#form-update-user #UserID").val(object["UserID"]);

              $('#modalUsers').modal('show'); 
            }
          });
    }
    $(document).on("click",".btn-delete", function(e){
        e.preventDefault();

        if (window.confirm("Bạn chắc chán muốn xóa?")) {
            location.href = this.href;
        }
    })
    $(document).on("click","#btn-save", function(e){
        e.preventDefault();
        valid = true;
        if($("#form-update-user #FullName").val() == ""){
            valid = false;
            $("#form-update-user #msg_FullName").empty().append('Vui lòng nhập họ tên!');
        }
        if($("#form-update-user #UserName").val() == ""){
            valid = false;
            $("#form-update-user #msg_UserName").empty().append('Vui lòng nhập tên tài khoản!');
        }
        if($("#form-update-user #Password").val() == ""){
            valid = false;
            $("#form-update-user #msg_Password").empty().append('Vui lòng nhập mật khẩu!');
        }
        if($("#form-update-user #Email").val() == ""){
            valid = false;
            $("#form-update-user #msg_Email").empty().append('Vui lòng nhập email!');
        }
        if($("#form-update-user #Gender").val() == ""){
            valid = false;
            $("#form-update-user #msg_Gender").empty().append('Vui lòng chọn giới tính!');
        }
        if(valid){
            document.form_update_user.submit();
        }
    })
});