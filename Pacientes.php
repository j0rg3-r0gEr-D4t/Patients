<? ob_start(); ?>
<html>
<head>
	<title>VEM - Historial de Pacientes</title>
<style type='text/css'>
.h1 {
    font-family: Arial Black;
	font-size: 24px;
	font-weight: bold;
	font-color:#666666;
}


</style>
	
</head>

<body>
<?php
session_start();
include('Config.php');
$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect'.mysqli_error($cxn));
$sql = "SELECT username FROM usuarios WHERE username='$_POST[username]'";
$result = mysqli_query($cxn,$sql) or die('Query died: username'.mysqli_error($cxn));
$num = mysqli_num_rows($result);

if($num > 0) { //login name was found 
	$sql = "SELECT username FROM usuarios WHERE username='$_POST[username]' AND password=('$_POST[password]')";
	$result2 = mysqli_query($cxn,$sql) or die('Query died: password'.mysqli_error($cxn));
	$num2 = mysqli_num_rows($result2);
	mysqli_close($cxn);

	if($num2 > 0) { //password matches 

		$_SESSION['auth']='yes'; 
		$_SESSION['logname'] = $_POST['username'];
	
		include('modPacientes1.php');
	
	} else  {// password does not match ?38
		Header("Location: index.php?le=p");
	}
} else { // login name not found 
	Header("Location: index.php?le=l");
}
?>
</body>
</html>
<? ob_flush(); ?>