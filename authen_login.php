<?php  

 require('db_connect.php');

if (isset($_POST['userid']) and isset($_POST['pwd'])){
	
// Assigning POST values to variables.
$username = $_POST['userid'];
$password = $_POST['pwd'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `loginy` WHERE login='$username' and password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);


if ($count == 1 && $username== 'admin'){
$_SESSION['username']=$username;
//echo "Login Credentials verified";
echo "<meta http-equiv='refresh' content='0;url=admin.php'>";

}
else if ($count == 1 && $username != 'admin'){
$_SESSION['username']=$username;
//echo "Login Credentials verified";
echo "<meta http-equiv='refresh' content='0;url=glowna.php'>";

}
else{
echo "<script type='text/javascript'>alert('blad logowania!')</script>";
echo "<meta http-equiv='refresh' content='0;url=proj_inz.php'>";
//echo "Invalid Login Credentials";
}
}
?>
