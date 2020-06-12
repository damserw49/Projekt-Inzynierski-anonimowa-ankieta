<?php
session_start();

if ( isset( $_SESSION['username'] ) ) {
    
} else {
    
header("Location: proj_inz.php");
}
echo "<body style='background-color:orange'>";


$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'ankiety_inz');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}



if(isset($_POST['addankieta']))
{
$add=mysqli_real_escape_string($connection,$_POST['addankieta']);

$sql="INSERT INTO nazwa_ankieta (ankieta) VALUES ('".$add."')";
if (mysqli_query($connection, $sql)) 
{
    $sql2="CREATE TABLE ".$add." (ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT, przedmiot VARCHAR(50), prowadzacy VARCHAR(50), forma_zajec VARCHAR(50), ocena INT, user_name VARBINARY(500), hash VARBINARY(200))";
	if (mysqli_query($connection, $sql2)) 
	{
		echo "Dodano ankietę do bazy danych";
		echo "<br>";
		echo "<a href='admin.php'>powrot do strony glownej</a>";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($connection);
		echo "<a href='admin.php'>powrot do strony glownej</a>";
	}
}
else
{
	echo "blad";
	echo "<br>";
	echo "<a href='admin.php'>powrot do strony glownej</a>";
}
}
else
{
	echo "blad";
	echo "<br>";
	echo "<a href='admin.php'>powrot do strony glownej</a>";
}

?>