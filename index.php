<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ronkonkoma Chamber | Admin Log In</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/sb-admin.css" rel="stylesheet">
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/sb-admin.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" name = "login_form" id = "login_form">
                                <fieldset>
                                    <div id = "login_error" class="alert alert-danger hidden"></div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="User Name" name="user_name" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <button id="login" class="btn btn-lg btn-success btn-block">Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function(){
            $("#login").click(function(e){
                e.preventDefault();
                var data = $("#login_form").serialize();
                console.log(data);
                $.post("ajax/check_login.php", data,  function(data){
                    var data_obj = $.parseJSON(data);
                    if (data_obj.username_valid == false){
                        var msg = "Your Username or Password are incorrect";
                    }else if(data_obj.password_valid == false){
                        var msg = "Your Password does not match your Username";
                    }
                    if (msg){
                        $("#login_error").html(msg).removeClass('hidden');
                    }else{
                        $("#login_error").addClass('hidden');
                        document.cookie="ronkChamberAdmin=" + $("[name ='user_name']").val();
                        window.location.replace("members.php");
                    }
                });
            });    
        });
    </script>
</html>
