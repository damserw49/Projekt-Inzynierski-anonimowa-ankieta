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


if(isset($_POST['przedmiot']) && isset($_POST['prowadzacy'])&& isset($_POST['zajecia']) && isset($_POST['ocena']))
{
$przedmiot = mysqli_real_escape_string($connection,$_POST['przedmiot']);
$prowadzacy= mysqli_real_escape_string($connection,$_POST['prowadzacy']);
$zajecia = mysqli_real_escape_string($connection,$_POST['zajecia']);
$ocena = mysqli_real_escape_string($connection,$_POST['ocena']);
$hash = "";
$hash .= $przedmiot;
$hash .=$prowadzacy;
$hash .=$zajecia;
$hash .=$ocena;
$hash .=$_SESSION['username'];
//$sql="INSERT INTO ankieta (przedmiot,prowadzacy,forma_zajec,ocena,user_name) VALUES ('".$przedmiot."','".$prowadzacy."','".$zajecia."',".$ocena.",AES_ENCRYPT('".$_SESSION['username']."','inz'))";
$sql="INSERT INTO ankieta (przedmiot,prowadzacy,forma_zajec,ocena,user_name,hash) VALUES ('".$przedmiot."','".$prowadzacy."','".$zajecia."',".$ocena.",SHA1('".$_SESSION['username']."'),SHA1('".$hash."'))";
if (mysqli_query($connection, $sql)) {
    echo "Dodano ankiete";
	echo "</br>";
	echo "<a href='glowna.php'>powrot do strony glownej</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
	echo "<a href='glowna.php'>powrot do strony glownej</a>";
}
}
else
{
	echo "blad";
	echo "</br>";
	echo "<a href='glowna.php'>powrot do strony glownej</a>";
}
?>