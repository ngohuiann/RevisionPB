<?php

include('Conf/init.php');

$password = "ng0hu1@nn";
$username = "RevisionPB1";
$email = "melody6666@live.com";

$hashedpwd = password_hash($password, PASSWORD_DEFAULT);

$sql="INSERT INTO admin (Username,Password,Email) VALUES ('$username','$hashedpwd','$email')";
	
	
	if(!mysqli_query($conn,$sql))
		{
		die('Error:' .mysqli_error($conn));
		}
		echo "<script>
	alert('Register Successful!');
	window.location.href='/kyro/customer.php';
	</script>";
	
mysqli_close($conn);


?>