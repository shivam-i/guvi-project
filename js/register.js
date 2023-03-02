$(document).ready(function(){
    $('form').on('submit', function (e) {

        e.preventDefault();

        document.getElementById("dob").addEventListener("change", function() {
          var input = this.value;
          var dateEntered = new Date(input);
          console.log(input); //e.g. 2015-11-13
          console.log(dateEntered); //e.g. Fri Nov 13 2015 00:00:00 GMT+0000 (GMT Standard Time)
      });

        var formData = {
            'username': $('input[name=username]').val(),
            'age' : $('input[name=age]').val(),
            'date' : $('input[name=date]').val(),
            'email' : $('input[name=email]').val(),
            'password' : $('input[name=password]').val(),
        };
        console.log(formData);
  
        $.ajax({
          type: 'post',
          url: 'php/register.php',
          data: formData,
          success: function () {
            alert('form was submitted');
            window.location.href = './login.html';
          },
          error: function (xhr, ajaxOptions, thrownError) {
              alert(xhr.status + " " + xhr.statusText);
          }
        });
  
      });
 });

// $(function () {

    

//   });