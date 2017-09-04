<html>
<?php
include('Conf/init.php');
include('Includes/header.html');
include('Includes/fonts.html');

if (isset($_POST['submit'])) {
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")

{
// username and password sent from Form
$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);

$sql="SELECT UserID FROM admin WHERE username='$username'";
$pwdb = mysqli_query($conn,"SELECT Password FROM admin WHERE username='$username'");
$row = mysqli_fetch_array($pwdb);
if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  }
mysqli_close($conn);

if($rowcount==1) {
	if ($verifypassword = password_verify($password,$row['Password'])){
		session_start();
		$_SESSION['Username']=$username;
		header('location: /RevisionPB/Dashboard');

}else{
	echo "<script>alert('Password incorrect. Please try again.');</script>";
}
}
else {

echo "<script>alert('Username incorrect. Please try again.');</script>";

}}
}
 ?>
<head>

    <link rel="stylesheet" type="text/css" href="CSS/login.css" />
    <link rel="stylesheet" type="text/css" href="CSS/include.css" />
</head>
    
<body>
    <div class="bg-img">
        <div class="border">
            <div class="Login"><b>LOGIN</b></div>
                <div class="form">
                <form action="" method="post">
                    <input type="text" name="username" class="username" placeholder="Username" /> 
                    <input type="password" name="password" class="password" placeholder="Password" /> 
                    <a href="#" class="link">Forget Password?</a><br />
                    <input type="submit" name="submit" class="submit" value="Submit" />
                </form>
                </div>
        </div>
    </div>
</body>

</html>