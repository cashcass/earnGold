<?php
session_start();
$_SESSION['building']=$_POST['building'];
if($_POST['building']=='farm'){
$_SESSION['earn'] = rand(10,20);
}
if($_POST['building']=='cave'){
$_SESSION['earn'] = rand(5,10);
}
if($_POST['building']=='house'){
$_SESSION['earn'] = rand(2,5);
}
if($_POST['building']=='casino'){
	$give_take=rand(0,100);
	if($give_take >= 30){
		$_SESSION['earn'] = rand(0,50);
	}
	else{
		$_SESSION['earn'] = rand(0,50)*(-1);
	}
}
header('location: ./index.php');
?>
3608676180