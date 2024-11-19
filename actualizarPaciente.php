<? ob_start(); ?>
<?php

session_start();
include('Config.php');

if ($_SESSION['auth']=='yes') {

$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect');

$sql = "UPDATE pacientes SET Nombre='$_POST[nombre]', Apellido='$_POST[apellido]', Edad='$_POST[edad]', Peso='$_POST[peso]', 
		Talla='$_POST[talla]', TA='$_POST[ta]', Pulso='$_POST[pulso]', General='$_POST[general]', Masa_Corporal='$_POST[mc]', Email='$_POST[email]',
		Empresa='$_POST[empresa]' WHERE CI='$_POST[ci]'";
	
	if (isset($_POST['fisicos'])) {
		$fisicos=1;
	} else {
		$fisicos=0;
	}
	if (isset($_POST['biologicos'])) {
		$biologicos = 1;
	} else {
		$biologicos = 0;
	}
	if (isset($_POST['mecanicos'])) {
		$mecanicos=1;
	} else {
		$mecanicos = 0;
	}
	if (isset($_POST['psicosociales'])) {
		$psicosociales=1;
	} else {
		$psicosociales=0;
	}
	if (isset($_POST['quimicos'])) {
		$quimicos=1;
	} else {
		$quimicos=0;
	}
	if (isset($_POST['disergonomicos'])) {
		$disergonomicos = 1;
	} else {
		$disergonomicos = 0;
	}
	
	$sql2 = "UPDATE pacientes_riesgos SET Fisicos=$fisicos, Biologicos=$biologicos, Mecanicos=$mecanicos, Psicosociales = $psicosociales,
		Quimicos = $quimicos, Disergonomicos = $disergonomicos, Nota= '$_POST[nota]' WHERE CI='$_POST[ci]'";
	

include('Config.php');
$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect. '.mysqli_error($cxn));
echo $sql;
$result = mysqli_query($cxn,$sql) or die('Query died: update pacientes. '.mysqli_error($cxn));

echo $sql2;	
$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect. '.mysqli_error($cxn));
$result = mysqli_query($cxn,$sql2) or die('Query died: update pacientes_riesgos. '.mysqli_error($cxn));

	if ($result == true) {
		header("location: mostrarPaciente.php?ret=1&actb=1&ci=$_POST[ci]");
	}
} else {
header("location: index.php");
}

mysqli_close($cxn);
?>
<? ob_flush(); ?>