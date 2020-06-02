<?php  

 require('db_connect.php');

if (isset($_POST['userid']) and isset($_POST['pwd']) and isset($_POST['name']) and isset($_POST['surname'])){
	
// Assigning POST values to variables.
$username = $_POST['userid'];
$password = $_POST['pwd'];
$name = $_POST['name'];
$surname = $_POST['surname'];

// CHECK FOR THE RECORD FROM TABLE
$sql = "INSERT INTO `loginy` (`login`, `password`, `Imie`, `Nazwisko`) VALUES ('".$username."', '".$password."', '".$name."', '".$surname."')";

if (mysqli_query($connection, $sql)) 
{
    echo "Dodano uzytkownika";
	echo "</br>";
	echo "<a href='proj_inz.php'>powrot do strony logowania</a>";
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
	echo "<a href='proj_inz.php'>powrot do strony logowania</a>";
}
}
else
{
	echo "blad";
	echo "</br>";
	echo "<a href='proj_inz.php'>powrot do strony logowania</a>";
}
 
?>
