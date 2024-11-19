<? ob_start(); ?>

<?php



session_start();

include('Config.php');



if ($_SESSION['auth']=='yes') {



$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect'.mysqli_error($cxn));

$sql = "SELECT CI FROM pacientes WHERE CI='$_POST[ci]'";

$result = mysqli_query($cxn,$sql) or die('Query died: ci'.mysqli_error($cxn));

$num = mysqli_num_rows($result);



if($num > 0) { //Paciente ya registrado

	header("location: modPacientes1.php?pr=1&ci=$_POST[ci]");

} else {



$sql = "INSERT INTO pacientes (";

	$sql2 = "INSERT INTO pacientes_riesgos (CI";



if ($_POST['ci'] != '') {

	$sql .= 'CI';

}

if ($_POST['nombre'] != '') {

	$sql .= ', Nombre';

}

if ($_POST['apellido'] != '') {

	$sql .= ', Apellido';

}

if ($_POST['email'] != '') {

	$sql .= ', Email';

}

if ($_POST['edad'] != '') {

	$sql .= ', Edad';

}

if ($_POST['sexo'] != '') {

	$sql .= ', Sexo';

}
if ($_POST['peso'] != '') {

	$sql .= ', Peso';

}

if ($_POST['talla'] != '') {

	$sql .= ', Talla';

}

if ($_POST['ta'] != '') {

	$sql .= ', TA';

}

if ($_POST['pulso'] != '') {

	$sql .= ', Pulso';

}

if ($_POST['general'] != '') {

	$sql .= ', General';

}

if ($_POST['mc'] != '') {

	$sql .= ', Masa_Corporal';

}

if ($_POST['empresa'] != '') {

	$sql .= ', Empresa';

}



$sql .= ') VALUES (';



if ($_POST['ci'] != '') {

	$sql .= '\''.$_POST['ci'].'\'';

}

if ($_POST['nombre'] != '') {

	$sql .= ','.'\''.$_POST['nombre'].'\'';

}

if ($_POST['apellido'] != '') {

	$sql .= ','.'\''.$_POST['apellido'].'\'';

}



if ($_POST['email'] != '') {

	$sql .= ','.'\''.$_POST['email'].'\'';

}

if ($_POST['edad'] != '') {

	$sql .= ','.'\''.$_POST['edad'].'\'';

}

if ($_POST['sexo'] != '') {

	$sql .= ','.'\''.$_POST['sexo'].'\'';

}

if ($_POST['peso'] != '') {

	$sql .= ','.'\''.$_POST['peso'].'\'';

}

if ($_POST['talla'] != '') {

	$sql .= ','.'\''.$_POST['talla'].'\'';

}

if ($_POST['ta'] != '') {

	$sql .= ','.'\''.$_POST['ta'].'\'';

}

if ($_POST['pulso'] != '') {

	$sql .= ','.'\''.$_POST['pulso'].'\'';

}

if ($_POST['general'] != '') {

	$sql .= ','.'\''.$_POST['general'].'\'';

}

if ($_POST['mc'] != '') {

	$sql .= ','.'\''.$_POST['mc'].'\'';

}

if ($_POST['empresa'] != '') {

	$sql .= ','.'\''.$_POST['empresa'].'\'';

}



$sql .= ')';



if (isset($_POST['fisicos']) || isset($_POST['biologicos']) || isset($_POST['mecanicos']) || isset($_POST['psicosociales']) ||

 isset($_POST['quimicos']) || isset($_POST['disergonomicos'])) {



	

	if (isset($_POST['fisicos'])) {

		$sql2 .= ',fisicos';

	}

	if (isset($_POST['biologicos'])) {

		$sql2 .= ',biologicos';

	}

	if (isset($_POST['mecanicos'])) {

		$sql2 .= ',mecanicos';

	}

	if (isset($_POST['psicosociales'])) {

		$sql2 .= ',psicosociales';

	}

	if (isset($_POST['quimicos'])) {

		$sql2 .= ',quimicos';

	}

	if (isset($_POST['disergonomicos'])) {

		$sql2 .= ',disergonomicos';

	}

	

	if ($_POST['nota'] != '') {

		$sql2 .= ',nota';

	}

	

	$sql2 .= ') VALUES ('.$_POST['ci'];

	

	if (isset($_POST['fisicos'])) {

		$sql2 .= ',1';

	}

	if (isset($_POST['biologicos'])) {

		$sql2 .= ',1';

	}

	if (isset($_POST['mecanicos'])) {

		$sql2 .= ',1';

	}

	if (isset($_POST['psicosociales'])) {

		$sql2 .= ',1';

	}

	if (isset($_POST['quimicos'])) {

		$sql2 .= ',1';

	}

	if (isset($_POST['disergonomicos'])) {

		$sql2 .= ',1';

	}

	

	if ($_POST['nota'] != '') {

		$sql2 .= ','.'\''.$_POST['nota'].'\'';

	}

	

	$sql2 .=')';

	

	

} else {

	if ($_POST['nota'] != '') {

		$sql2 .= ', nota) VALUES ('.$_POST['ci'].','.'\''.$_POST['nota'].'\''.')';

	} else {

		$sql2 .= ') VALUES ('.$_POST['ci'].')';

	}

}

	



include('Config.php');

$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect. '.mysqli_error($cxn));

echo $sql;

$result = mysqli_query($cxn,$sql) or die('Query died: pacientes. '.mysqli_error($cxn));



if ($result == true) {



echo $sql2;	

$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect. '.mysqli_error($cxn));

$result = mysqli_query($cxn,$sql2) or die('Query died: pacientes_riesgos. '.mysqli_error($cxn));



	if ($result == true) {

		header("location: modPacientes1.php?ok=1&ci=$_POST[ci]");

	}

}



}



} else {

header("location: index.php");

}



mysqli_close($cxn);

?>

<? ob_flush(); ?>