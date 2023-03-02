$(document).ready(function(){
    $('form').on('submit', function (e) {

        e.preventDefault();

        var formData = {
            'username': $('input[name=username]').val(),
            'password' : $('input[name=password]').val(),
        };
        console.log(formData);
  
        $.ajax({
            dataType : 'text',
          type: 'post',
          url: 'php/login.php',
          data: formData,
          success: function (res) {
            if(res == '400'){
                window.location.href = './profile.html';
            }
            if(res=="401"){
                console.log("hello-401");
                $(".error-msg-user").css("display", "block");
            }
            if(res=="402"){
                
                console.log("hello-402");
                $(".error-msg-pass").css("display", "block");
            }
            
          },
          error: function (xhr, ajaxOptions, thrownError) {
              alert(xhr.status + " " + xhr.statusText);
          }
        });
  
      });
 });