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
<div id="formu1">
<input type="button" onClick="formularz();" value="Pokaz ankiety"/>
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
<?php

$wynik = mysqli_query($connection,"SELECT * FROM ankieta")
or die('Błąd zapytania');

if(mysqli_num_rows($wynik) > 0) {
 
    echo "<table cellpadding=\"2\" border=1 id='formu'>";
	echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>przedmiot</th>";
		echo "<th>prowadzacy</th>";
		echo "<th>forma_zajec</th>";
		echo "<th>ocena</th>";
		echo "<th>user_name</th>";
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
?>
<br>
<a>Ilość osób bez wypełnionych ankiet: 
<?php
$wynik = mysqli_query($connection,"SELECT (COUNT(loginy.login)-1)-(SELECT COUNT(DISTINCT user_name) FROM ankieta) FROM loginy")
or die('Błąd zapytania');
$count = mysqli_fetch_assoc($wynik);
echo $count['(COUNT(loginy.login)-1)-(SELECT COUNT(DISTINCT user_name) FROM ankieta)'];
?>
</a>
</div>
</div>
</body>
</html>
