<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
  .login-form {
    width: 340px;
      margin: 50px auto;
  }
    .login-form form {
      margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form>
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
          <label id="log_msg"></label>
            <input type="text" class="form-control" id="user_name" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="button" id="btn_submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><a href="#">Create an Account</a></p>
</div>

<script>

$("#btn_submit").click(function(){
  
      //passing the data as array
      var data = {
        uname:$("#user_name").val(), 
        password:$("#password").val()
        };

      $.ajax({
        url: 'login_action.php',
        type: 'POST',
        data: data,
        dataType: "json",
        success: function(data) {  
          if(data.result == true)         
              alert('Successs');           
          else
            alert('failed');

          //displaying the message
          $("#log_msg").html(data.msg);
        },
        error: function(e) {  
        }
      });

})
</script>


</body>
</html>                                                               