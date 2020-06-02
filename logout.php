<?php
session_start();
session_destroy();
header('Location: proj_inz.php');
exit;
?>