<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CU GRADUATION </title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<script src="<?=base_url();?>/js/jquery.js"></script>

	<!-- Bootstrap Core CSS -->
	<link href="<?=base_url();?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url();?>/css/jquery-ui.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?=base_url();?>/css/sb-admin.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?=base_url();?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="<?=base_url();?>/js/bootstrap.min.js"></script>
	<style type="text/css">
		/* Override some defaults */
		html, body {
			background-color: #333;
			background-image: url("./img/bg.jpg");
			 background-repeat: no-repeat;
   			 background-attachment: fixed;
   			 background-position: center; 
   			 background-size: 100% 140%; 
		}
		body {
			padding-top: 40px; 
		}
		.container {
			width: 500px;
		}

		/* The white background content wrapper */
		.container > .content {
			background-color: #fff;
			padding: 20px;
			margin: 0 -20px; 
			-webkit-border-radius: 10px 10px 10px 10px;
			-moz-border-radius: 10px 10px 10px 10px;
			border-radius: 10px 10px 10px 10px;
			-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
			-moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
			box-shadow: 0 1px 2px rgba(0,0,0,.15);
		}

		.login-form {
			margin-left: 65px;
		}

		legend {
			margin-right: -50px;
			font-weight: bold;
			color: #404040;
		}

	</style>

	
</head>
<body>
	<div class="container">
		<div class="content">
		<h1>CU GRADUATION SYSTEM</h1>
		<br><center><small>ระบบจัดการบัณฑิตในพิธีพระราชทานปริญญาบัติ</small></center>
		</div>
			<br>
		<div class="content">
			<div class="row">
				<form class="form-horizontal">
					<fieldset>

						<!-- Form Name -->
						<center><h1>เข้าสู่ระบบ</h1></center>
						<hr>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="username">ชื่อผู้ใช้งาน</label>  
							<div class="col-md-5">
								<input id="username" name="username" type="text" placeholder="กรอกชื่อผู้ใช้งาน" class="form-control input-md">

							</div>
						</div>

						<!-- Password input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="passwordinput">รหัสผ่าน</label>
							<div class="col-md-5">
								<input id="passwordinput" name="passwordinput" type="password" placeholder="กรอกรหัสผ่าน" class="form-control input-md">

							</div>
						</div>

						<!-- Button -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="singlebutton"></label>
							<div class="col-md-4">
								<a href="./home" id="submit" name="submit" class="btn btn-primary">Login</a>
							</div>
						</div>

					</fieldset>
				</form>

			</div>
		</div>
	</div> <!-- /container -->
</body>
</html>