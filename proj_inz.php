<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>anonimowa ankieta</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="proj_inz.css">

</head>
<body>
</br>
<h1>Witaj w anonimowej ankiecie</h1>
<hr style="height:5px;width:200%;">

</br>
<div id="contener">
<a>Zaloguj sie</a>
<div id="form1">
<form id="login-form" method="post" action="authen_login.php" >
        <table border="0.5" >
            <tr>
                <td><label for="userid">User Name</label></td>
                <td><input type="text" name="userid" id="userid" required></td>
            </tr>
            <tr>
                <td><label for="pwd">Password</label></td>
                <td><input type="password" name="pwd" id="pwd" required></input></td>
            </tr>
			
            <tr>
				
                <td><input type="submit" value="Zaloguj" />
                
				
            </tr>
        </table>
    </form>
	</div>
</br>
<a>Zarejestruj sie</a>
</br>
<div id="form2">
<form id="reg-form" method="post" action="authen_reg.php" >
        <table border="0.5" >
            <tr>
                <td><label for="userid">User Name</label></td>
                <td><input type="text" name="userid" id="userid" required></td>
            </tr>
            <tr>
                <td><label for="pwd">Password</label></td>
                <td><input type="password" name="pwd" id="pwd" required></input></td>
            </tr>
			<tr>
                <td><label for="userid">Imie</label></td>
                <td><input type="text" name="name" id="name" required></td>
            </tr>
			<tr>
                <td><label for="userid">Nazwisko</label></td>
                <td><input type="text" name="surname" id="surname" required></td>
            </tr>
            <tr>
				
                <td><input type="submit" value="Zarejestruj" />
                
				
            </tr>
        </table>
    </form>
</div>
</div>
</body>
</html>
