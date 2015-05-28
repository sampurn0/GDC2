<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
		<title>Grand Depok City</title>
			<link rel="stylesheet" type="text/css" href="asset/themes/default/easyui.css">
			<link rel="stylesheet" type="text/css" href="asset/themes/icon.css">

			<script type="text/javascript" src="asset/js/jquery.min.js"></script>
			<script type="text/javascript" src="asset/js/jquery.easyui.min.js"></script>
		
	</head>
	<body>
		<div style="margin:150px 0;" ></div>
			<form action="cek_login.php" method="POST">
				<div class="easyui-panel" title="Login to system" style="auto;width:400px;padding:30px 70px 20px 70px;">
					<div style="margin-bottom:10px">
						<input class="easyui-textbox" style="width:100%;height:40px;padding:12px" name="username" data-options="prompt:'Username',iconCls:'icon-man',iconWidth:38">
					</div>
					<div style="margin-bottom:20px">
						<input class="easyui-textbox" type="password" name="password" style="width:100%;height:40px;padding:12px" data-options="prompt:'Password',iconCls:'icon-lock',iconWidth:38">
					</div>
					<div style="margin-bottom:20px">
						<input type="checkbox" checked="checked">
						<span>Remember me</span>
					</div>
					<div>
						<button>
							<span style="font-size:14px;">Login</span>
						</button>
					</div>
				</div>
			</form>
	</body>
</html>