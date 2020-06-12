<?php

session_start();

$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'ankiety_inz');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

if ( isset( $_SESSION['username'] ) ) {
    
} else {
    
    header("Location: proj_inz.php");
}
?>
<!DOCTYPE html>

<html lang="pl">
<head>
<meta charset="utf-8">
<title>anonimowa ankieta</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="glowna.css">

</head>

<body style="background-color: orange;">
<h1 style="text-align:center; margin-top:20px;">witaj <?php echo $_SESSION['username'] ?></h1>
<a style="text-align: center;" href="logout.php">wyloguj</a>
<br>
<br>
<div id="formu1">
<input type="button" onClick="formularz();" value="Wypełnij ankietę"/>
<script>
function formularz() {
  var x = document.getElementById("formu");
  if (x.style.visibility === "hidden") {
    x.style.visibility = "visible";
  } else {
    x.style.visibility = "hidden";
  }
}
</script>
<br>
<form id="formu" method="POST" action="formularz.php" style="visibility: hidden;">
<hr>

<label><b>Wybierz ankietę:</b></label><br>
<?php
$query = mysqli_query($connection,"SELECT ankieta FROM nazwa_ankieta");
echo "<select id='ankieta' name='ankieta'>";
while ($temp = mysqli_fetch_assoc($query)){
    echo "<option value='".$temp['ankieta']."'>".$temp['ankieta']."</option>";
}
echo "</select>";
?>
<br>

<label><b>Wybierz przedmiot:</b></label><br>
<?php
$query = mysqli_query($connection,"SELECT id,nazwa FROM przedmioty");
echo "<select id='przedmiot' name='przedmiot'>";
while ($temp = mysqli_fetch_assoc($query)){
    echo "<option value='".$temp['nazwa']."'>".$temp['nazwa']."</option>";
}
echo "</select>";
?>
<br>
<label><b>Wybierz prowadzącego:</b></label><br>
<?php
$query = mysqli_query($connection,"SELECT id,imie,nazwisko FROM wykladowcy");
echo "<select id='prowadzacy' name='prowadzacy'>";
while ($temp = mysqli_fetch_assoc($query)){
    echo "<option value='".$temp['imie']." ".$temp['nazwisko']."'>".$temp['imie']." ".$temp['nazwisko']."</option>";
}
echo "</select>";
?>
<br>
<label><b>forma zajęć:</b></label><br>
<select id="zajecia" name="zajecia">
	<option value="Wykład">Wykład</option>
	<option value="Laboratorium">Laboratorium</option>
</select>
<br>
<label><b>ocena:</b></label><br>
<select id="ocena" name="ocena">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
</select>
<br>
<br>
<input type="submit" value="Wyślij ankietę"/>
</form>
<hr>
</div>
<br>

<div id="formu2">
<input type="button" onClick="formularz2();" value="Pokaż ankiety"/>
<script>
function formularz2() {
  if(document.getElementById("formul").style.visibility == "hidden")
  {
	  document.getElementById("formul").style.visibility = "visible";
  }
  else if(document.getElementById("formul").style.visibility == "visible")
  {
	document.getElementById("formul").style.visibility = "hidden";
  }
}
</script>
<br>
<div id="formul" style="visibility:hidden">
<a>Wypełnione formularze z przedmiotów: </a>
<?php
$wynik = mysqli_query($connection,"SELECT przedmiot FROM ankieta WHERE user_name=SHA1('".$_SESSION['username']."')")
or die('Błąd zapytania');

if(mysqli_num_rows($wynik) > 0) {
 
    echo "<table cellpadding=\"2\" border=1 id='formu'>";
	echo "<tr>";	
		echo "<th>przedmiot</th>";
		echo "</tr>";
    while($r = mysqli_fetch_assoc($wynik)) {
		echo "<tr>";
        echo "<td>".$r['przedmiot']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
else{
	echo "<br>";
	echo "<a>Brak ankiet do wyświetlenia.</a>";
}

echo "<br>";
?>
<form id="hashcheck">
	<label>Sprawdź poprawność przesłanej ankiety!</label>
	<br>
	<label>Wpisz hash wyników twojej ankiety: </label>
	<input type="text" name="hashtext" id="hashtext">
	<br>
	<label><b>Wybierz ankietę:</b></label><br>
<?php
$query = mysqli_query($connection,"SELECT ankieta FROM nazwa_ankieta");
echo "<select id='ankieta1' name='ankieta1'>";
while ($temp = mysqli_fetch_assoc($query)){
    echo "<option value='".$temp['ankieta']."'>".$temp['ankieta']."</option>";
}
echo "</select>";
?>
	<br>
	<br>
	<input type="submit" value="Sprawdź">
</form>
</div>
<?php
error_reporting(0);
if($_GET['hashtext'])
{
$hashtext="";
$hashtext=$_GET['hashtext'];
$hashtable=$_GET['ankieta1'];

$wynik2 = mysqli_query($connection,"SELECT * FROM ".$hashtable." WHERE user_name=SHA1('".$_SESSION['username']."')")
or die('Błąd zapytania');
$count = mysqli_fetch_assoc($wynik2);
if(mysqli_num_rows($wynik) > 0){
$string="";
$string .= $count['przedmiot'];
$string .= $count['prowadzacy'];
$string .= $count['forma_zajec'];
$string .= $count['ocena'];
$string .= $_SESSION['username'];
$string .= $_SESSION['password'];
if($hashtext==$count['hash'])
{
if(sha1($string)==$count['hash'])
{
	echo "<br>";
	echo "Twoja ankieta jest poprawnie zapisana!";
	unset($hashtext);
	unset($hashtable);
	echo "<br>";
}
else
{
	echo "Twój hash: ";
	echo "<br>";
	echo $hashtext;
	echo "<br>";
	echo "Hash wyników: ";
	echo "<br>";
	echo sha1($string);
	echo "<br>";
	echo "Blad w ankiecie! Dane zostały zmienione!";
	unset($hashtext);
	unset($hashtable);
	echo "<br>";
}
}
else
{
	echo "Twój hash: ";
	echo "<br>";
	echo $hashtext;
	echo "<br>";
	echo "Hash z bazy: ";
	echo "<br>";
	echo  $count['hash'];
	echo "<br>";
	echo "Blad w ankiecie! Hash nie zgadza się z zapisanym w bazie";
	unset($hashtext);
	unset($hashtable);
	echo "<br>";
}
}
}
?>

</div>
</body>
</html>
