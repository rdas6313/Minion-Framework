<!DOCTYPE html>
<html>
	<head>
		<base href="/">
		<style>
			body{margin:0px auto;width:80%;}
			.head{text-align: center;padding:3px;background-color: rgb(59,89,152);color:white;}

			.postcontent{width:98%;float:left;margin:auto;padding:10px;border:1px solid #ddd;overflow: hidden;
				background-color: #31CAE8;}
			
			
			.container {
						background-color: white;
						margin: 5px 5px;
						width: 98%;
						/* height: 500px; */
						padding: 5px;
						overflow: hidden;
					}
			.sidebar {
							float: left;
							border-right: 1px solid #ddd;
							width: 22%;
							margin: 5px 5px;
							padding: 5px;
					}
			.menu{}
			.menu h3 {
						background-color: rgb(59,89,152);
						padding: 10px;
						color: white;
					}
			.menu ul {
							list-style-type: none;
							/* margin: 2px 0px; */
							padding: 2px;
						}
			.menu ul li{}
			.menu ul li a {
						text-decoration: none;
						background-color: rgb(49,202,232);
						color:black;
						display: block;
						padding: 5px;
						margin: 2px 0px;
					}
			.menu ul li a:hover{
				background-color: white;
				color:black;
				cursor:pointer;

			}
			.content {
						width: 70%;
						float: left;
						padding: 10px;
						margin: 10px 10px;
					}
			.content h3{padding:5px 15px;margin:10px auto;text-align:center;color:blue;}
			.table_class{	padding: 10px;
						box-shadow: 10px 10px 20px grey;
						margin: 30px auto;
						}
			.table_class tr td{
				padding: 5px 10px;
				font-size: 20px;
			}
			.table_class input[type=text]{padding: 5px 30px;}
			.table_class input[type=submit]{    padding: 1px 20px;
				 font-size: 15px;
				}
			.cat_table{border-collapse: collapse;padding:10px;margin:10px auto;box-shadow: 10px 10px 20px grey;}
			.cat_table tr{border-bottom: 1px solid #ddd;}
			
			.cat_table tr th{background-color:#4CAF50;color:white;padding:10px 20px;}
			.cat_table tr td{padding:10px 20px;}
			.cat_table tr:nth-child(even){background-color:rgb(242,242,242);}
			.cat_table tr td a{text-decoration: none;}
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
			<div class="container">