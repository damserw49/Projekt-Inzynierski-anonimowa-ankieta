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
<h1 style="text-align:center; margin-top:20px;">witaj: <?php echo $_SESSION['username'] ?></h1>
<a style="text-align: center;" href="logout.php">wyloguj</a>

<br>

<div id="formu2">
<input type="button" onClick="formularz2();" value="Stwórz ankietę"/>
<script>
function formularz2() {
  var x = document.getElementById("formul");
  if (x.style.visibility === "hidden") {
    x.style.visibility = "visible";
  } else {
    x.style.visibility = "hidden";
  }
}
</script>
<br>
<div id="formul" style="visibility:hidden">

<form id="add" method="POST" action="new_ankieta.php">
	<label>Wpisz nazwę ankiety: </label>
	<input type="text" name="addankieta" id="addankieta">
	<input type="submit" value="Dodaj">
</form>
</div>
<br>


</div>

<div id="formu1">
<input type="button" onClick="formularz();" value="Pokaż ankiety"/>
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
<div id="formu" style="visibility:hidden">
<form id="ankietacheck">
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
	<br>
	<input type="submit" value="Sprawdź">
</form>

<?php
error_reporting(0);
if($_GET['ankieta'])
{
$ankietacheck="";
$ankietacheck=$_GET['ankieta'];

$wynik = mysqli_query($connection,"SELECT * FROM ".$ankietacheck."")
or die('Błąd zapytania');

if(mysqli_num_rows($wynik) > 0) {
 
    echo "<table cellpadding=\"2\" border=1 id='formu'>";
	echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>przedmiot</th>";
		echo "<th>prowadzący</th>";
		echo "<th>forma zajęc</th>";
		echo "<th>ocena</th>";
		echo "<th>użytkownik</th>";
		echo "</tr>";
    while($r = mysqli_fetch_assoc($wynik)) {
		echo "<tr>";
        echo "<td>".$r['ID']."</td>";
        echo "<td>".$r['przedmiot']."</td>";
		echo "<td>".$r['prowadzacy']."</td>";
		echo "<td>".$r['forma_zajec']."</td>";
		echo "<td>".$r['ocena']."</td>";
		echo "<td>".$r['user_name']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
}
?>
<br>
<a>Ilość osób bez wypełnionych ankiet: 
<?php
$wynik = mysqli_query($connection,"SELECT (COUNT(loginy.login)-1)-(SELECT COUNT(DISTINCT user_name) FROM ".$ankietacheck.") FROM loginy")
or die('Nie wybrano ankiety!');
$count = mysqli_fetch_assoc($wynik);
echo $count['(COUNT(loginy.login)-1)-(SELECT COUNT(DISTINCT user_name) FROM '.$ankietacheck.')'];
?>
</a>
</div>
</div>

</body>
</html>
