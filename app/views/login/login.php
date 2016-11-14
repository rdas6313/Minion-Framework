<!DOCTYPE html>
<html>
	<head>
		<base href="/">
		<style>
			body{margin:0px auto;width:80%;}
			.head{text-align: center;padding:3px;background-color: rgb(59,89,152);color:white;}

			.postcontent{width:98%;float:left;margin:auto;padding:10px;border:1px solid #ddd;overflow: hidden;
				background-color: #31CAE8;}
			.post{background-color:white;padding: 10px;margin-top: 3px;margin-bottom: 12px;height:400px;}
			.post h3{color: Blue;}
			.post h3 a{text-decoration: None;}
			.post h3 a:hover{color:#808EE8;}
			.post h4 a{text-decoration: None;}
			.post h4 a:hover{color:#808EE8;color:rgb(49,202,232)}
			.post p{padding: 2px; text-align: justify;}
			.readmore{text-align: right}
			.readmore a{}
			.readmore a:hover{color:#35E8A4;}
			.sidebar{ float: left;padding-left: 5px;margin-left: 1px;width: 253px;background-color: rgba(17, 171, 204, 0.92);padding-top: 5px;margin-right: 1px;padding: 5px;}
			.widget{background-color: #d5f8ee;padding: 12px;margin-right: -10px;width: 214px;margin-left: 6px;margin-bottom: 5px;margin-right: 2px;margin-top: 6px;
}
			.widget h3{text-align: center}
			.widget ul{list-style-type: none;}
			.widget ul li{padding:2px;}
			.widget ul li a{text-decoration: None;color: #02720b;}
			.widget ul li a:hover{color:#22f533;}

			.nav ul{background-color: black;margin:0px;padding:0px;overflow: hidden;list-style-type: none}
			.nav ul li{float:left;}
			.nav ul li a{display:block;padding:10px;margin:0px;color:white;text-decoration: none;}
			.nav ul li a:hover{background-color: green;color:white;}
			.nav ul li#new{float:right;}
			.nav ul li form input[type=text]{width: 245px;padding: 4px;margin-right: 5px;margin-top: 2px;margin-bottom: 2px;}
			.nav ul li form input[type=submit]{padding: 4px;margin-right: 41px;margin-top: 1px;margin-bottom: 1px;}

			.loginform{margin: 60px auto;padding: 10px;border: 1px solid #ddd;border-radius: 7px;background-color: white;box-shadow: 10px 10px 20px grey;width: 36%; height:75%;}
			.loginform table{margin: 10px auto;}
			.loginform input[type=text],input[type=password]{
				padding: 7px 40px;
				margin:0px;
				font-size:15px;
			}
			.loginform input[type=submit]{padding:5px;margin:5px;cursor: pointer;width:30%;font-size:15px;}
			.admin_header{padding: 5px;margin: 0px auto;width: 50%;}
			.admin_header h2{color:orange;}
			.last{padding:1px;width:100%;margin:0px auto;text-align: center;}
			.last span{color:red;font-size:15px;}
		</style>
	</head>
	<body>
		<header class="head">
			<table>
				<tr>
					<td style="padding-left:315px"><img src="<?php echo BASE_URL;?>/app/views/min.png" style="width:104px;height:90px"></td>
					<td style="padding-left:5px"><h2>Minion FrameWork</h2></td>
				</tr>
			</table>
		</header>
	
		<article class="postcontent">
		<div class="post">
				<div class="loginform">
					<div class="admin_header">
						<h2>Admin Panel</h2>
							
					</div>
					<table>
						<form action="/mini/login/auth" method="post">
							<tr>
								<td>
									<input type="text" name="username" placeholder="Username">
								</td>
							</tr>
							<tr>
								<td>
									<input type="password" name="password" placeholder="Password">
								</td>
							</tr>
							<tr>
								
								<td>
									<input type="submit" value="Login">
								</td>
							</tr>
						</form>
					</table>
					<div class="last">
						<span><?php if(isset($msg) && !empty($msg)){echo $msg;}?></span>
					</div>
				</div>
			</div>
		</article>
	</body>
</html>