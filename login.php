<!doctype html>
<html class="no-js " lang="en">
<?php if(isset($_COOKIE['login']))
{
	header("location:index.php");
	
}
else{

?>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: RUHAN TRAVELS :: Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/authentication.css">
    <link rel="stylesheet" href="assets/css/color_skins.css">
</head>

<body class="theme-orange">
<div class="authentication">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <div class="logo"><img src="assets/images/logo/logo2.jpg" alt="Nexa"></div>
                        <h1>Sign Up</h1>
                    </div>                        
                </div>
                <div class="col-lg-12">
                    <h5 class="title">Sign in to your Account</h5>
					  <div class="form-group form-float">
                        <div class="form-line">
                            <select type="text" class="form-control" id="login_type">
							<option value="">--What You Are--</option>
							<option value="1">Driver</option>
							<option value="2">Vendor</option>
							</select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="email" class="form-control" id="usr">
                            <label class="form-label">Email</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" id="pwd">
                            <label class="form-label">Password</label>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-cyan">
                        <label for="rememberme">Remember Me</label>
                    </div>
                    
                    <div class="col-lg-12">
                    <button class="btn btn-raised btn-primary waves-effect" id="submitBtn">SIGN IN</button>                
					<a href="sign-up.html" class="btn btn-raised btn-default waves-effect">SIGN UP</a>                   
                </div>
                <div class="col-lg-12 m-t-20">
                    <a class="" href="forgot-password.html">Forgot Password?</a>
                </div>                    
            </div>
			</div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script>

<script>
	$("#submitBtn").on("click",function(e){
		
		if($("#login_type option:selected").val()==0){
			$("#login_type").focus();
			$("#login_type").css("border","1px solid red");
		}		
		else if($("#usr").val()=="" || $("#usr").val()==null)
		{
			$("#usr").focus();
			$("#usr").css("border","1px solid red");
		}
		else if($("#pwd").val()=="" || $("#pwd").val()==null)
		{
			$("#pwd").focus();
			$("#pwd").css("border","1px solid red");
		}
		else
		{
			var login_type=$("#login_type option:selected").val();
			var u_name=$("#usr").val();
			var u_pass=$("#pwd").val();
			if( isEmail(u_name)){
				var filter =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
					$(".loader_img").css("display","block");
					$.ajax({
						type:"POST",
						data:{login_type:login_type,u_name:u_name,u_pass:u_pass},
						url:"login-do.php",
						success: function(reciveData){
							if(reciveData=="sl"){
								$(".loader_class h3").html("Login Successfully !..");	
								$(".loader_img").css("display","none");	
								$(".btnSaveClick").attr("disable",false);
								window.location.replace('index.php');								
							}
							else if(reciveData=="il"){
								$(".loader_class h3").html("Invalid Login !..");	
								$(".loader_img").css("display","none");	
								$(".btnSaveClick").attr("disable",false);
								window.location.replace('login.php');
							}
							else{
								$(".loader_class h3").html("Try Again !..");	
								$(".loader_img").css("display","none");	
								$(".btnSaveClick").attr("disable",false);
								window.location.replace('login.php');
							}								
						}
					});
			}
		else{
			$("#usr").focus();
		}
	function isEmail(u_name) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(u_name);
}			
		}
	});
</script>
<?php } ?>
</body>
</html>