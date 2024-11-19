<? ob_start(); ?>
<?php

session_start();
include('Config.php');

if ($_SESSION['auth']=='yes') {

$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect'.mysqli_error($cxn));
$sql = "SELECT CI FROM pacientes_datos_fisicos WHERE CI='$_POST[ci]'";
$result = mysqli_query($cxn,$sql) or die('Query died: ci'.mysqli_error($cxn));
$num = mysqli_num_rows($result);

if($num > 0) { //Paciente ya registrado, Update Info...
	header("location: modPacientes1.php?pr=2&ci='$_POST[ci]'");
} else {

$sql = "INSERT INTO pacientes_datos_fisicos (";
	

if ($_POST['ci'] != '') {
	$sql .= 'CI';
}
if ($_POST['piel_faneras'] != '') {
	$sql .= ', Piel_Faneras';
}
if (isset($_POST['ojos_normal'])) {
		$sql .= ',Ojos_Normal';
	}
if (isset($_POST['ojos_deformidades'])) {
		$sql .= ',Ojos_Deformidades';
	}
if (isset($_POST['ojos_contactos'])) {
		$sql .= ',Ojos_Contactos';
	}
if ($_POST['ojos_otros'] != '') {
	$sql .= ', Ojos_Otros';
}
if (isset($_POST['orl_bucalnormal'])) {
		$sql .= ',ORL_BucalNormal';
	}
if (isset($_POST['orl_piorrea'])) {
		$sql .= ',ORL_Piorrea';
	}
if (isset($_POST['orl_protesisdental'])) {
		$sql .= ',ORL_ProtesisDental';
	}
if (isset($_POST['orl_tabique'])) {
		$sql .= ',ORL_Tabique';
	}
if ($_POST['orl_otros'] != '') {
	$sql .= ', ORL_Otros';
}
if (isset($_POST['cuello_adenopatias'])) {
	$sql .= ', Cuello_Adenopatias';
}
if (isset($_POST['cuello_tumor'])) {
	$sql .= ', Cuello_Tumor';
}
if (isset($_POST['cuello_laringe'])) {
	$sql .= ', Cuello_LaringeNormal';
}
if ($_POST['cuello_tiroides'] != '') {
	$sql .= ', Cuello_Tiroides';
}
if ($_POST['cuello_otros'] != '') {
	$sql .= ', Cuello_Otros';
}
if (isset($_POST['cv_pulsovenoso'])) {
	$sql .= ', CV_PulsoVenoso';
}
if (isset($_POST['cv_lpe'])) {
	$sql .= ', CV_LPE';
}
if (isset($_POST['1r'])) {
	$sql .= ', CV_1R';
}
if (isset($_POST['2r'])) {
	$sql .= ', CV_2R';
}
if (isset($_POST['3r'])) {
	$sql .= ', CV_3R';
}
if (isset($_POST['4r'])) {
	$sql .= ', CV_4R';
}
if (isset($_POST['cv_galope'])) {
	$sql .= ', CV_Galope';
}
if (isset($_POST['cv_froteperic'])) {
	$sql .= ', CV_FrotePeric';
}if (isset($_POST['cv_soplos'])) {
	$sql .= ', CV_Soplos';
}
if ($_POST['cv_otros'] != '') {
	$sql .= ', CV_Otros';
}
if ($_POST['pulmonar_expansion'] != '') {
	$sql .= ', Pulmonar_Expansion';
}
if ($_POST['pulmonar_mv'] != '') {
	$sql .= ', Pulmonar_MV';
}
if (isset($_POST['pulmonar_sibilitantes'])) {
	$sql .= ', Pulmonar_Sibilitantes';
}
if (isset($_POST['pulmonar_roncos'])) {
	$sql .= ', Pulmonar_Roncos';
}
if (isset($_POST['pulmonar_crepiantes'])) {
	$sql .= ', Pulmonar_Crepiantes';
}
if (isset($_POST['pulmonar_frotepleural'])) {
	$sql .= ', Pulmonar_FrotePleural';
}
if (isset($_POST['pulmonar_vvnormal'])) {
	$sql .= ', Pulmonar_VVNormal';
}
if ($_POST['pulmonar_percusiontoraxica'] != '') {
	$sql .= ', Pulmonar_PercusionToraxica';
}
if ($_POST['pulmonar_otros'] != '') {
	$sql .= ', Pulmonar_Otros';
}
if ($_POST['abdomen'] != '') {
	$sql .= ', Abdomen';
}
if ($_POST['columna'] != '') {
	$sql .= ', Columna';
}
if ($_POST['extremidades'] != '') {
	$sql .= ', Extremidades';
}
if (isset($_POST['circper_normal'])) {
	$sql .= ', CircPer_Normal';
}
if (isset($_POST['circper_varices'])) {
	$sql .= ', CircPer_Varices';
}
if ($_POST['circper_otros'] != '') {
	$sql .= ', CircPer_Otros';
}
if ($_POST['observaciones'] != '') {
	$sql .= ', Observaciones';
}

if ($_POST['quirurgicos'] != '') {
	$sql .= ', Ant_Pers_Quirurgicos';
}
if ($_POST['respiratorio'] != '') {
	$sql .= ', Ant_Pers_Respiratorio';
}
if ($_POST['nervioso'] != '') {
	$sql .= ', Ant_Pers_Nervioso';
}
if ($_POST['alergicos'] != '') {
	$sql .= ', Ant_Pers_Alergicos';
}
if ($_POST['digestivos'] != '') {
	$sql .= ', Ant_Pers_Digestivos';
}
if ($_POST['trauma'] != '') {
	$sql .= ', Ant_Pers_Trauma';
}

if ($_POST['tabaco'] != '') {
	$sql .= ', Habitos_Tabaco';
}
if ($_POST['alcohol'] != '') {
	$sql .= ', Habitos_Alcohol';
}
if ($_POST['cafe'] != '') {
	$sql .= ', Habitos_Cafe';
}
if ($_POST['medicamentos'] != '') {
	$sql .= ', Habitos_Medicamentos';
}
if ($_POST['deporte'] != '') {
	$sql .= ', Habitos_Deporte';
}
if ($_POST['nutricion'] != '') {
	$sql .= ', Habitos_Nutricion';
}

if ($_POST['electrocardiograma'] != '') {
	$sql .= ', Electrocardiograma';
}
if ($_POST['laboratorio'] != '') {
	$sql .= ', Laboratorio';
}
if ($_POST['ultrasonido'] != '') {
	$sql .= ', Ultrasonido';
}
if ($_POST['espirometria'] != '') {
	$sql .= ', Espirometria';
}
if ($_POST['encuesta'] != '') {
	$sql .= ', Encuesta';
}

if ($_POST['conclusiones'] != '') {
	$sql .= ', Conclusiones';
}
if (isset($_POST['condicion'])) {
	$sql .= ', Condicion';
}
if ($_POST['seguimiento'] != '') {
	$sql .= ', Seguimiento';
}


$sql .= ') VALUES (';

if ($_POST['ci'] != '') {
	$sql .= '\''.$_POST['ci'].'\'';
}
if ($_POST['piel_faneras'] != '') {
	$sql .= ','.'\''.$_POST['piel_faneras'].'\'';
}
if (isset($_POST['ojos_normal'])) {
		$sql .= ','.'\''.$_POST['ojos_normal'].'\'';
	}
if (isset($_POST['ojos_deformidades'])) {
		$sql .= ','.'\''.$_POST['ojos_deformidades'].'\'';
	}
if (isset($_POST['ojos_contactos'])) {
		$sql .= ','.'\''.$_POST['ojos_contactos'].'\'';
	}
if ($_POST['ojos_otros'] != '') {
	$sql .= ','.'\''.$_POST['ojos_otros'].'\'';
}
if (isset($_POST['orl_bucalnormal'])) {
		$sql .= ','.'\''.$_POST['orl_bucalnormal'].'\'';
	}
if (isset($_POST['orl_piorrea'])) {
		$sql .= ','.'\''.$_POST['orl_piorrea'].'\'';
	}
if (isset($_POST['orl_protesisdental'])) {
		$sql .= ','.'\''.$_POST['orl_protesisdental'].'\'';
	}
if (isset($_POST['orl_tabique'])) {
		$sql .= ','.'\''.$_POST['orl_tabique'].'\'';
	}
if ($_POST['orl_otros'] != '') {
	$sql .= ','.'\''.$_POST['orl_otros'].'\'';
}
if (isset($_POST['cuello_adenopatias'])) {
	$sql .= ','.'\''.$_POST['cuello_adenopatias'].'\'';
}
if (isset($_POST['cuello_tumor'])) {
	$sql .= ','.'\''.$_POST['cuello_tumor'].'\'';
}
if (isset($_POST['cuello_laringe'])) {
	$sql .= ','.'\''.$_POST['cuello_laringe'].'\'';
}
if ($_POST['cuello_tiroides'] != '') {
	$sql .= ','.'\''.$_POST['cuello_tiroides'].'\'';
}
if ($_POST['cuello_otros'] != '') {
	$sql .= ','.'\''.$_POST['cuello_otros'].'\'';
}
if (isset($_POST['cv_pulsovenoso'])) {
	$sql .= ','.'\''.$_POST['cv_pulsovenoso'].'\'';
}
if (isset($_POST['cv_lpe'])) {
	$sql .= ','.'\''.$_POST['cv_lpe'].'\'';
}
if (isset($_POST['1r'])) {
	$sql .= ','.'\''.$_POST['1r'].'\'';
}
if (isset($_POST['2r'])) {
	$sql .= ','.'\''.$_POST['2r'].'\'';
}
if (isset($_POST['3r'])) {
	$sql .= ','.'\''.$_POST['3r'].'\'';
}
if (isset($_POST['4r'])) {
	$sql .= ','.'\''.$_POST['4r'].'\'';
}
if (isset($_POST['cv_galope'])) {
	$sql .= ','.'\''.$_POST['cv_galope'].'\'';
}
if (isset($_POST['cv_froteperic'])) {
	$sql .= ','.'\''.$_POST['cv_froteperic'].'\'';
}if (isset($_POST['cv_soplos'])) {
	$sql .= ','.'\''.$_POST['cv_soplos'].'\'';
}
if ($_POST['cv_otros'] != '') {
	$sql .= ','.'\''.$_POST['cv_otros'].'\'';
}
if ($_POST['pulmonar_expansion'] != '') {
	$sql .= ','.'\''.$_POST['pulmonar_expansion'].'\'';
}
if ($_POST['pulmonar_mv'] != '') {
	$sql .= ','.'\''.$_POST['pulmonar_mv'].'\'';
}
if (isset($_POST['pulmonar_sibilitantes'])) {
	$sql .= ','.'\''.$_POST['pulmonar_sibilitantes'].'\'';
}
if (isset($_POST['pulmonar_roncos'])) {
	$sql .= ','.'\''.$_POST['pulmonar_roncos'].'\'';
}
if (isset($_POST['pulmonar_crepiantes'])) {
	$sql .= ','.'\''.$_POST['pulmonar_crepiantes'].'\'';
}
if (isset($_POST['pulmonar_frotepleural'])) {
	$sql .= ','.'\''.$_POST['pulmonar_frotepleural'].'\'';
}
if (isset($_POST['pulmonar_vvnormal'])) {
	$sql .= ','.'\''.$_POST['pulmonar_vvnormal'].'\'';
}
if ($_POST['pulmonar_percusiontoraxica'] != '') {
	$sql .= ','.'\''.$_POST['pulmonar_percusiontoraxica'].'\'';
}
if ($_POST['pulmonar_otros'] != '') {
	$sql .= ','.'\''.$_POST['pulmonar_otros'].'\'';
}
if ($_POST['abdomen'] != '') {
	$sql .= ','.'\''.$_POST['abdomen'].'\'';
}
if ($_POST['columna'] != '') {
	$sql .= ','.'\''.$_POST['columna'].'\'';
}
if ($_POST['extremidades'] != '') {
	$sql .= ','.'\''.$_POST['extremidades'].'\'';
}
if (isset($_POST['circper_normal'])) {
	$sql .= ','.'\''.$_POST['circper_normal'].'\'';
}
if (isset($_POST['circper_varices'])) {
	$sql .= ','.'\''.$_POST['circper_varices'].'\'';
}
if ($_POST['circper_otros'] != '') {
	$sql .= ','.'\''.$_POST['circper_otros'].'\'';
}
if ($_POST['observaciones'] != '') {
	$sql .= ','.'\''.$_POST['observaciones'].'\'';
}

if ($_POST['quirurgicos'] != '') {
	$sql .= ','.'\''.$_POST['quirurgicos'].'\'';
}
if ($_POST['respiratorio'] != '') {
	$sql .= ','.'\''.$_POST['respiratorio'].'\'';
}
if ($_POST['nervioso'] != '') {
	$sql .= ','.'\''.$_POST['nervioso'].'\'';
}
if ($_POST['alergicos'] != '') {
	$sql .= ','.'\''.$_POST['alergicos'].'\'';
}
if ($_POST['digestivos'] != '') {
	$sql .= ','.'\''.$_POST['digestivos'].'\'';
}
if ($_POST['trauma'] != '') {
	$sql .= ','.'\''.$_POST['trauma'].'\'';
}

if ($_POST['tabaco'] != '') {
	$sql .= ','.'\''.$_POST['tabaco'].'\'';
}
if ($_POST['alcohol'] != '') {
	$sql .= ','.'\''.$_POST['alcohol'].'\'';
}
if ($_POST['cafe'] != '') {
	$sql .= ','.'\''.$_POST['cafe'].'\'';
}
if ($_POST['medicamentos'] != '') {
	$sql .= ','.'\''.$_POST['medicamentos'].'\'';
}
if ($_POST['deporte'] != '') {
	$sql .= ','.'\''.$_POST['deporte'].'\'';
}
if ($_POST['nutricion'] != '') {
	$sql .= ','.'\''.$_POST['nutricion'].'\'';
}

if ($_POST['electrocardiograma'] != '') {
	$sql .= ','.'\''.$_POST['electrocardiograma'].'\'';
}
if ($_POST['laboratorio'] != '') {
	$sql .= ','.'\''.$_POST['laboratorio'].'\'';
}
if ($_POST['ultrasonido'] != '') {
	$sql .= ','.'\''.$_POST['ultrasonido'].'\'';
}
if ($_POST['espirometria'] != '') {
	$sql .= ','.'\''.$_POST['espirometria'].'\'';
}
if ($_POST['encuesta'] != '') {
	$sql .= ','.'\''.$_POST['encuesta'].'\'';
}

if ($_POST['conclusiones'] != '') {
	$sql .= ','.'\''.$_POST['conclusiones'].'\'';
}
if (isset($_POST['condicion'])) {
	$sql .= ','.'\''.$_POST['condicion'].'\'';
}
if ($_POST['seguimiento'] != '') {
	$sql .= ','.'\''.$_POST['seguimiento'].'\'';
}

$sql .= ')';

	

include('Config.php');
$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect. '.mysqli_error());
echo $sql;
$result = mysqli_query($cxn,$sql) or die('Query died: pacientes. '.mysqli_error());

if ($result == true) {

header("location: modPacientes1.php?ok=2&ci=$_POST[ci]");
}

}

} else {
header("location: index.php");
}

mysqli_close($cxn);
?>
<? ob_flush(); ?>