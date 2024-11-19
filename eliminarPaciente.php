<? ob_start(); ?>
<?php session_start();

if ($_SESSION['auth']=='yes') {
	include('Config.php');
	$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect');
	$sql = "DELETE FROM pacientes WHERE CI='$_GET[ci]'";
	$result = mysqli_query($cxn,$sql) or die('Query died: Eliminar Paciente'.mysqli_error($cxn));
	
	if ($result == true) {
	
		$sql = "DELETE FROM pacientes_riesgos WHERE CI='$_GET[ci]'";
		$result = mysqli_query($cxn,$sql) or die('Query died: Eliminar Paciente Datos Fisicos'.mysqli_error($cxn));
		
		if ($result == true) {
			
			$sql = "DELETE FROM pacientes_datos_fisicos WHERE CI='$_GET[ci]'";
			$result = mysqli_query($cxn,$sql) or die('Query died: Eliminar Paciente Riesgos'.mysqli_error($cxn));
		
			if ($result == true) {		
				header("location: modPacientes1.php?pe=1&ci='$_GET[ci]'");
			}
		}
	}
	
} else {
header("location: index.php");
}

mysqli_close($cxn);
?>
<? ob_flush(); ?>