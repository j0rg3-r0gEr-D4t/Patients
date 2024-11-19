<? ob_start(); ?>
<?php

session_start();
include('Config.php');

if ($_SESSION['auth']=='yes') {

$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect');


	
	if (isset($_POST['ojos_normal'])) {
		$ojos_normal=1;
	} else {
		$ojos_normal=0;
	}
	if (isset($_POST['ojos_deformidades'])) {
		$ojos_deformidades=1;
	} else {
		$ojos_deformidades=0;
	}
	if (isset($_POST['ojos_contactos'])) {
		$ojos_contactos=1;
	} else {
		$ojos_contactos=0;
	}
	if (isset($_POST['orl_bucalnormal'])) {
		$orl_bucalnormal = 1;
	} else {
		$orl_bucalnormal = 0;
	}
	if (isset($_POST['orl_piorrea'])) {
		$orl_piorrea = 1;
	} else {
		$orl_piorrea = 0;
	}
	if (isset($_POST['orl_protesisdental'])) {
		$orl_protesisdental=1;
	} else {
		$orl_protesisdental = 0;
	}
	if (isset($_POST['orl_tabique'])) {
		$orl_tabique=1;
	} else {
		$orl_tabique=0;
	}
	if (isset($_POST['cuello_adenopatias'])) {
		$cuello_adenopatias=1;
	} else {
		$cuello_adenopatias=0;
	}
	if (isset($_POST['cuello_tumor'])) {
		$cuello_tumor = 1;
	} else {
		$cuello_tumor = 0;
	}
	if (isset($_POST['cuello_laringe'])) {
		$cuello_laringe = 1;
	} else {
		$cuello_laringe = 0;
	}
	if (isset($_POST['cv_pulsovenoso'])) {
		$cv_pulsovenoso = 1;
	} else {
		$cv_pulsovenoso = 0;
	}
	if (isset($_POST['cv_lpe'])) {
		$cv_lpe = 1;
	} else {
		$cv_lpe = 0;
	}
	if (isset($_POST['1r'])) {
		$Unr = $_POST['1r'];
	}
	if (isset($_POST['2r'])) {
		$Dosr = $_POST['2r'];
	}
	if (isset($_POST['3r'])) {
		$Tresr = 1;
	} else {
		$Tresr = 0;
	}
	if (isset($_POST['4r'])) {
		$Cuatror = 1;
	} else {
		$Cuatror = 0;
	}
	if (isset($_POST['cv_galope'])) {
		$cv_galope = 1;
	} else {
		$cv_galope = 0;
	}
	if (isset($_POST['cv_froteperic'])) {
		$cv_froteperic = 1;
	} else {
		$cv_froteperic = 0;
	}
	if (isset($_POST['cv_soplos'])) {
		$cv_soplos = 1;
	} else {
		$cv_soplos = 0;
	}
	if (isset($_POST['pulmonar_sibilitantes'])) {
		$pulmonar_sibilitantes = 1;
	} else {
		$pulmonar_sibilitantes = 0;
	}
	if (isset($_POST['pulmonar_roncos'])) {
		$pulmonar_roncos = 1;
	} else {
		$pulmonar_roncos = 0;
	}
	if (isset($_POST['pulmonar_crepiantes'])) {
		$pulmonar_crepiantes = 1;
	} else {
		$pulmonar_crepiantes = 0;
	}
	if (isset($_POST['pulmonar_frotepleural'])) {
		$pulmonar_frotepleural = 1;
	} else {
		$pulmonar_frotepleural = 0;
	}
	if (isset($_POST['pulmonar_vvnormal'])) {
		$pulmonar_vvnormal = 1;
	} else {
		$pulmonar_vvnormal = 0;
	}
	if (isset($_POST['circper_normal'])) {
		$circper_normal = 1;
	} else {
		$circper_normal = 0;
	}
	if (isset($_POST['circper_varices'])) {
		$circper_varices = 1;
	} else {
		$circper_varices = 0;
	}
	if (isset($_POST['condicion'])) {
		$condicion = $_POST['condicion'];
	}
	

$sql = "UPDATE pacientes_datos_fisicos SET Piel_Faneras='$_POST[piel_faneras]', Ojos_Normal=$ojos_normal, Ojos_Deformidades=$ojos_deformidades,
		Ojos_Contactos=$ojos_contactos, Ojos_Otros='$_POST[ojos_otros]', ORL_BucalNormal= $orl_bucalnormal, ORL_Piorrea=$orl_piorrea,
		ORL_ProtesisDental= $orl_protesisdental, ORL_Tabique=$orl_tabique, ORL_Otros='$_POST[orl_otros]', Cuello_Adenopatias=$cuello_adenopatias,
		Cuello_Tumor=$cuello_tumor, Cuello_LaringeNormal=$cuello_laringe, Cuello_Tiroides='$_POST[cuello_tiroides]', Cuello_Otros='$_POST[cuello_otros]',
		CV_PulsoVenoso=$cv_pulsovenoso, CV_LPE=$cv_lpe, CV_1R=$Unr, CV_2R=$Dosr, CV_3R = $Tresr, CV_4R = $Cuatror, CV_Galope=$cv_galope,
		CV_FrotePeric = $cv_froteperic, CV_Soplos=$cv_soplos, CV_Otros='$_POST[cv_otros]', Pulmonar_Expansion='$_POST[pulmonar_expansion]',
		Pulmonar_MV='$_POST[pulmonar_mv]', Pulmonar_Sibilitantes=$pulmonar_sibilitantes, Pulmonar_Roncos=$pulmonar_roncos, Pulmonar_Crepiantes=$pulmonar_crepiantes,
		Pulmonar_FrotePleural=$pulmonar_frotepleural, Pulmonar_VVNormal=$pulmonar_vvnormal, Pulmonar_PercusionToraxica ='$_POST[pulmonar_percusiontoraxica]',
		Pulmonar_Otros='$_POST[pulmonar_otros]', Abdomen='$_POST[abdomen]', Columna='$_POST[columna]',	Extremidades='$_POST[extremidades]',
		CircPer_Normal=$circper_normal, CircPer_Varices=$circper_varices, CircPer_Otros='$_POST[circper_otros]', Observaciones='$_POST[observaciones]',
		Ant_Pers_Quirurgicos='$_POST[quirurgicos]', Ant_Pers_Respiratorio='$_POST[respiratorio]',Ant_Pers_Nervioso='$_POST[nervioso]',
		Ant_Pers_Alergicos='$_POST[alergicos]', Ant_Pers_Digestivos='$_POST[digestivos]', Ant_Pers_Trauma='$_POST[trauma]', Habitos_Tabaco='$_POST[tabaco]',
		Habitos_Alcohol='$_POST[alcohol]', Habitos_Cafe='$_POST[cafe]', Habitos_Medicamentos='$_POST[medicamentos]', Habitos_Deporte='$_POST[deporte]',
		Habitos_Nutricion='$_POST[nutricion]', Antecedentes_Familiares= '$_POST[familiares]', Electrocardiograma='$_POST[electrocardiograma]',
		Laboratorio='$_POST[laboratorio]', Ultrasonido='$_POST[ultrasonido]', Espirometria='$_POST[espirometria]', Encuesta='$_POST[encuesta]',
		Conclusiones= '$_POST[conclusiones]', Condicion=$condicion, Seguimiento='$_POST[seguimiento]' WHERE CI='$_POST[ci]'";
	
	
	

include('Config.php');
$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect. '.mysqli_error($cxn));
echo $sql;
$result = mysqli_query($cxn,$sql) or die('Query died: update pacientes_datos_fisicos. '.mysqli_error($cxn));


	if ($result == true) {
		header("location: mostrarPaciente.php?ret=1&actf=1&ci=$_POST[ci]");
	}
	
} else {
header("location: index.php");
}

mysqli_close($cxn);
?>
<? ob_flush(); ?>