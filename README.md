# Projekt-Inzynierski-anonimowa-ankieta

Projekt Inzynierski: System anonimowych ankiet ̇

Generated by Doxygen 1.8.

i
ii

2.9 proj_inz.php File Reference....................................... 8
Index 9

Generated by Doxygen
File Index
1.1 File List

2 File Index

Generated by Doxygen
Chapter 2
File Documentation
2.1 admin.php File Reference
Variables

$connection = mysqli_connect('localhost', 'root', '')
if(! $connection) $select_db = mysqli_select_db($connection, 'ankiety_inz')
if(! $select_db) if(isset( $_SESSION['username'])) else
if(mysqli_num_rows($wynik)>0) $wynik
$count = mysqli_fetch_assoc($wynik)
2.1.1 Variable Documentation

2.1.1.1 $connection

$connection = mysqli_connect('localhost', 'root', '')

2.1.1.2 $count

$count = mysqli_fetch_assoc($wynik)

2.1.1.3 $select_db

if (! $connection) $select_db = mysqli_select_db($connection, 'ankiety_inz')

4 File Documentation

2.1.1.4 $wynik

if (mysqli_num_rows( $wynik)>0) $wynik

Initial value:
= mysqli_query($connection,"SELECT (COUNT(loginy.login)-1)-(SELECT COUNT(DISTINCT user_name) FROM ankieta)
FROM loginy")
or die(’Bł ̨ad zapytania’)

2.1.1.5 else

if (! $select_db) if (isset($_SESSION[ 'username'])) else

Initial value:
{

header("Location: proj_inz.php")
2.2 authen_login.php File Reference

2.3 authen_reg.php File Reference

Variables

if(isset($_POST['userid']) and isset($_POST['pwd']) and isset($_POST['name']) and isset($_PO←↩
ST['surname'])) else
2.3.1 Variable Documentation

2.3.1.1 else

if (isset( $_POST[ 'userid']) and isset( $_POST[ 'pwd']) and isset( $_POST[ 'name']) and isset(
$_POST[ 'surname'])) else

Initial value:
{
echo "blad"

2.4 db_connect.php File Reference

Variables

$connection = mysqli_connect('localhost', 'root', '')
if(! $connection) $select_db = mysqli_select_db($connection, 'ankiety_inz')
Generated by Doxygen
2.5 formularz.php File Reference 5

2.4.1 Variable Documentation

2.4.1.1 $connection

$connection = mysqli_connect('localhost', 'root', '')

2.4.1.2 $select_db

if (! $connection) $select_db = mysqli_select_db($connection, 'ankiety_inz')

2.5 formularz.php File Reference

Variables

if(isset( $_SESSION['username'])) else
$connection = mysqli_connect('localhost', 'root', '')
if(! $connection) $select_db = mysqli_select_db($connection, 'ankiety_inz')
2.5.1 Variable Documentation

2.5.1.1 $connection

$connection = mysqli_connect('localhost', 'root', '')

2.5.1.2 $select_db

if (! $connection) $select_db = mysqli_select_db($connection, 'ankiety_inz')

2.5.1.3 else

if (! $select_db) if (isset( $_POST[ 'przedmiot']) &&isset( $_POST[ 'prowadzacy'])&&isset(
$_POST[ 'zajecia']) &&isset( $_POST[ 'ocena'])) else

Initial value:
{

header("Location: proj_inz.php")

Generated by Doxygen

6 File Documentation

2.6 glowna.php File Reference

Variables

$connection = mysqli_connect('localhost', 'root', '')
if(! $connection) $select_db = mysqli_select_db($connection, 'ankiety_inz')
if(! $select_db) if(isset( $_SESSION['username'])) else
while ( $temp=mysqli_fetch_assoc( $query))
$query = mysqli_query($connection,"SELECT id,imie,nazwisko FROM wykladowcy")
$wynik
$wynik
$count = mysqli_fetch_assoc($wynik2)
2.6.1 Variable Documentation

2.6.1.1 $connection

$connection = mysqli_connect('localhost', 'root', '')

2.6.1.2 $count

$count = mysqli_fetch_assoc($wynik2)

2.6.1.3 $query

$query = mysqli_query($connection,"SELECT id,imie,nazwisko FROM wykladowcy")

2.6.1.4 $select_db

if (! $connection) $select_db = mysqli_select_db($connection, 'ankiety_inz')

2.6.1.5 $wynik

$wynik

Initial value:
= mysqli_query($connection,"SELECT przedmiot FROM ankieta WHERE
user_name=SHA1(’".$_SESSION[’username’]."’)")
or die(’Bł ̨ad zapytania’)

Generated by Doxygen
2.7 index.php File Reference 7

2.6.1.6 $wynik

$wynik

Initial value:
= mysqli_query($connection,"SELECT*FROM ankieta WHERE user_name=SHA1(’".$_SESSION[’username’]."’)")
or die(’Bł ̨ad zapytania’)

2.6.1.7 else

if (mysqli_num_rows( $wynik)>0) else

Initial value:
{

header("Location: proj_inz.php")
2.6.1.8 while

while($temp=mysqli_fetch_assoc($query))

2.7 index.php File Reference

Variables

if(!empty($_SERVER['HTTPS']) &&('on'==$_SERVER['HTTPS'])) else
$uri = $_SERVER['HTTP_HOST']
exit
2.7.1 Variable Documentation

2.7.1.1 $uri

$uri = $_SERVER['HTTP_HOST']

2.7.1.2 else

if (!empty( $_SERVER[ 'HTTPS']) &&( 'on'==$_SERVER[ 'HTTPS'])) else

Initial value:
{
$uri = ’http://’

Generated by Doxygen

8 File Documentation

2.7.1.3 exit

exit

2.8 logout.php File Reference

Variables

exit
2.8.1 Variable Documentation

2.8.1.1 exit

exit

2.9 proj_inz.php File Reference

Generated by Doxygen
Index
1 File Index
1.1 File List
2 File Documentation
2.1 admin.php File Reference
2.1.1 Variable Documentation
2.1.1.1 $connection
2.1.1.2 $count
2.1.1.3 $select_db
2.1.1.4 $wynik
2.1.1.5 else
2.2 authen_login.php File Reference
2.3 authen_reg.php File Reference
2.3.1 Variable Documentation
2.3.1.1 else
2.4 db_connect.php File Reference
2.4.1 Variable Documentation
2.4.1.1 $connection
2.4.1.2 $select_db
2.5 formularz.php File Reference
2.5.1 Variable Documentation
2.5.1.1 $connection
2.5.1.2 $select_db
2.5.1.3 else
2.6 glowna.php File Reference
2.6.1 Variable Documentation
2.6.1.1 $connection
2.6.1.2 $count
2.6.1.3 $query
2.6.1.4 $select_db
2.6.1.5 $wynik
2.6.1.6 $wynik2
2.6.1.7 else
2.6.1.8 while
2.7 index.php File Reference
2.7.1 Variable Documentation
2.7.1.1 $uri
2.7.1.2 else
2.7.1.3 exit
2.8 logout.php File Reference
2.8.1 Variable Documentation
2.8.1.1 exit
Chapter
admin.php Here is a list of all files with brief descriptions:
authen_login.php
authen_reg.php
db_connect.php
formularz.php
glowna.php
index.php
logout.php
proj_inz.php
admin.php, $connection
db_connect.php,
formularz.php,
glowna.php,
admin.php, $count
glowna.php,
glowna.php, $query
admin.php, $select_db
db_connect.php,
formularz.php,
glowna.php,
index.php, $uri
admin.php, $wynik
glowna.php,
$wynik
glowna.php,
admin.php,
$connection,
$count,
$select_db,
$wynik,
else,
authen_login.php,
authen_reg.php,
else,
db_connect.php,
$connection,
$select_db,
admin.php, else
authen_reg.php,
formularz.php,
glowna.php,
index.php,
index.php, exit
logout.php,
formularz.php,
$connection,
$select_db,
- else,
glowna.php,
$connection,
$count,
$query,
$select_db,
$wynik,
$wynik2,
else,
while,
index.php,
$uri,
else,
exit,
logout.php,
exit,
proj_inz.php,
glowna.php, while
