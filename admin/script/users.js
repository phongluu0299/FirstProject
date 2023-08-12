$(document).ready(function() {
    
    //Open modal
    $(document).on("click","#btn-add", function(){
        $('#modalUsers').modal('show'); 
    })

    function callModalUser(UserID){
        $.ajax({
            url: "functionsite/users/ajaxuser.php",  
            type: 'POST',
            data: {
                UserID:UserID
            },
            success: function(data) {
              return data; 
            }
          });
    }
});