<?php
session_start();
if($_POST['reset']==true){
	
	header('location: ./index.php');
	session_destroy();
}

?>