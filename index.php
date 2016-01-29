<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	session_start();
	if(!isset($_SESSION['earn'])){
		$_SESSION['earn']=0;
	}
	if(!isset($_SESSION['gold'])){
		$_SESSION['gold']=0;
	}
	else{
		$_SESSION['gold']=$_SESSION['gold']+$_SESSION['earn'];
	}
	if(!isset($_POST['building'])){
		$_POST['building']='';
	}
	if(!isset($_SESSION['log'])){
		$_SESSION['log']='';
	}
	else{
		if($_SESSION['earn']>=0){
		$_SESSION['log'].='<p class="green">You entered a '.$_SESSION['building'].' and earned '.$_SESSION['earn'].' gold. ('.date("m-d-Y h:i:sa").')</p>';
		}
		else{
		$_SESSION['log'].='<p class="red">You entered a '.$_SESSION['building'].' and lost '.($_SESSION['earn']-($_SESSION['earn']*2)).' gold. ('.date("m-d-Y h:i:sa").')</p>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Ninja Gold</title>
	<style type="text/css">
	#container{
		margin: 0 auto;
		padding: 0 10px;
		width: 780px;
	}
	h3{
		text-align: center;
		font-family: tahoma, sans-serif;
	}
	h5{
		text-align: center;
		font-family: tahoma, sans-serif;
	}
	.red{
		color: rgb(200,100,100);
	}
	.green{
		color: green;
	}
	.box{
		width: 170px;
		height: 150px;
		background-color: whitesmoke;
		margin: 10px 22px 30px 0;
		display: inline-block;
		border: solid black 2px;
	}
	.box:last-child{
		margin-right: 0; 
	}
	.box:first-child{
		margin-left: 2px; 
	}
	form{
		text-align: center;
	}
	body{
		background-color: whitesmoke;
	}
	.buttons{
		color: rgb(241, 241, 241);
	  	background: #3b88d8;
	  	background: -moz-linear-gradient(0% 100% 90deg, #377ad0, #52a8e8);
	  	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#52a8e8), to(#377ad0));
	  	-webkit-background-clip: padding-box;
	  	border-top: 1px solid #4081af;
		border-right: 1px solid #2e69a3;
		border-bottom: 1px solid #20559a;
		border-left: 1px solid #2e69a3;
		border-radius: 10px;
		-moz-box-shadow: inset 0 1px 0 0 #72b9eb, 0 1px 2px 0 #b3b3b3;
    	-webkit-box-shadow: inset 0 1px 0 0 #72b9eb, 0 1px 2px 0 #b3b3b3;
    	text-shadow: 0 -1px 1px #3275bc;
	}
	.buttons:hover{
		background: #2a81d7;
		background: -moz-linear-gradient(0% 100% 90deg, #206bcb, #3e9ee5);
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#3e9ee5), to(#206bcb));
		border-top: 1px solid #2a73a6;
		border-right: 1px solid #165899;
		border-bottom: 1px solid #07428f;
		border-left: 1px solid #165899;
		-moz-box-shadow: inset 0 1px 0 0 #62b1e9;
		-webkit-box-shadow: inset 0 1px 0 0 #62b1e9;
		cursor: pointer;
		text-shadow: 0 -1px 1px #1d62ab;
	}
	.textarea{
		border: solid black 2px;
		height:280px;
		overflow: auto;
	}
	</style>
</head>
<body>
<div id="container">
	<div id="header">
		<form action="process.php" method="post">
			<label for="gold">Your Gold: </label>
			<input type="text" name="gold" value="<?= $_SESSION['gold']?>" width="75" readonly>
		</form>
	</div>
	<div id="body">
		<div class="box">
			<h3>Farm</h3>
			<h5>(Earns 10-20 Gold)</h5>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="farm">
				<input class="buttons" type="submit" value="Find Gold!">
			</form>
		</div>
		<div class="box">
			<h3>Cave</h3>
			<h5>(Earns 5-10 Gold)</h5>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="cave">
				<input class="buttons" type="submit" value="Find Gold!">
			</form>
		</div>
		<div class="box">
			<h3>House</h3>
			<h5>(Earns 2-5 Gold)</h5>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="house">
				<input class="buttons" type="submit" value="Find Gold!">
			</form>
		</div>
		<div class="box">
			<h3>Casino</h3>
			<h5>(Earns/Takes 0-50 Gold)</h5>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="casino">
				<input class="buttons" type="submit" value="Find Gold!">
			</form>
		</div>
	</div>
	<div id="footer">
		<label for="activities">Activities: </label>
		<div class="textarea">
			<?= $_SESSION['log'];?>
		</div>
	</div>
	<div>
		<form action="restart.php" method="post">
				<input class="buttons" name="reset" type="submit" value="Click to reset!">
		</form>
	</div>
</div>
</body>
</html>