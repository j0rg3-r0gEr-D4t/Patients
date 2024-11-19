<?php

$host = 'localhost';

$user = 'vemcomve_patient';

$password = 'vemPacientes*';

$dbname = 'vemcomve_patients';

$bd = mysqli_connect($host, $user, $password) or die('Opps some thing went wrong');

mysqli_select_db($dbname, $bd) or die('Opps some thing went wrong');

?>