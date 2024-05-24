<?php
// Remember using sha1 here dont forget 
session_start();
include "../data/User.php";
	$email=$_POST['email'];
	$password=$_POST['pword'];
	if(empty($email)||empty($password)){
		echo 404;
	}else{
	$user=new User();
	$select2=$user->login_user();
    $execute1=$select2->execute([$email]);
    $rowCountEmail=$select2->rowCount();
		if($rowCountEmail>=1){
			// Email Already exist
			echo 401;
		}else{
	$hashing=$user->hash($password);
	$insert=$user->insert_user($email,$hashing);
	if($insert){
		echo 200;
	}else{
		echo 500;
	}
	}
}
	?>
