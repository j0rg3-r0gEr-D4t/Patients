<? ob_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Informaci&oacute;n de Paciente</title>

<link rel="stylesheet" type="text/css" href="view.css" media="all">

<script type="text/javascript" src="view.js"></script>

<?php include('js.php');



session_start();



if ($_SESSION['auth']=='yes') {?>



</head>



<?php

include('Config.php');

$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect'.mysql_error($cxn));

if (@$_GET['ret'] == '1') {

	$ci = @$_GET['ci'];

	$sql = "SELECT Nombre, Apellido, Edad, Peso, Talla, TA, Pulso, General, Masa_Corporal, Email, Empresa, Fecha_Registro FROM pacientes WHERE CI='$ci'";

} else {

	$sql = "SELECT Nombre, Apellido, Edad, Peso, Talla, TA, Pulso, General, Masa_Corporal, Email, Empresa, Fecha_Registro FROM pacientes WHERE CI='$_POST[ci]'";

}

$result = mysqli_query($cxn,$sql) or die('Query died: Info Paciente'.mysqli_error($cxn));

$num = mysqli_num_rows($result);

$row = mysqli_fetch_assoc($result);

extract($row);



if (@$_GET['ret'] == '1') {

	$ci = @$_GET['ci'];

	$sql2 = "SELECT Fisicos, Biologicos, Mecanicos, Psicosociales, Quimicos, Disergonomicos, Nota FROM pacientes_riesgos WHERE CI='$ci'";

} else {

	$sql2 = "SELECT Fisicos, Biologicos, Mecanicos, Psicosociales, Quimicos, Disergonomicos, Nota FROM pacientes_riesgos WHERE CI='$_POST[ci]'";

}

$result2 = mysqli_query($cxn,$sql2) or die('Query died: Info Paciente_Riesgos'.mysqli_error($cxn));

$num2 = mysqli_num_rows($result2);

$row2 = mysqli_fetch_assoc($result2);

if ($row2 != null) {

	extract($row2);

}



if (@$_GET['ret'] == '1') {

	$ci = @$_GET['ci'];

	$sql3 = "SELECT * FROM pacientes_datos_fisicos WHERE CI='$ci'";

} else {

	$sql3 = "SELECT * FROM pacientes_datos_fisicos WHERE CI='$_POST[ci]'";

}

$result3 = mysqli_query($cxn,$sql3) or die('Query died: Info Paciente_Datos_Fisicos'.mysqli_error($cxn));

$num3 = mysqli_num_rows($result3);

$row3 = mysqli_fetch_assoc($result3);

if ($row3 != null) {

	extract($row3);

}



if($num > 0) { //Paciente encontrado 

?>



<body id="main_body" >

	

	<img id="top" src="top.png" alt="">

	<div id="form_container">

	

	<div class="form_description">

	<br>

	<center>

	<?php if (@$_GET['actf'] == '1') {

		

		echo "<div id=\"error_message_title\"><center> Datos f&iacute;sicos actualizados exitosamente.</center></div>";	

	} ?>

	<?php if (@$_GET['actb'] == '1') {

		

		echo "<div id=\"error_message_title\"><center> Datos B&aacute;sicos actualizados exitosamente.</center></div>";	

	} ?>

	<h2>Paciente: <?php echo $Nombre;?> <?php echo $Apellido;?></h2>

	<br>

	<?php if (@$_GET['ret'] == '1') { ?>

		<p>CI: <?php echo $_GET['ci'];?></p>	

	<?php } else { ?>

		<p>CI: <?php echo $_POST['ci'];?></p>	

	<?php } ?>

	

	<p>Email: <?php echo $Email;?></p>	

	<p>Empresa: <?php echo $Empresa;?></p>	

	<p>Fecha de Registro: <?php echo $Fecha_Registro;?></p>	

	<br>

	

	<table>

	<tr>

	<td align="center">

		

	<?php if (@$_GET['ret'] == '1') { ?>

		<a href="editarDatosBasicos.php?ci=<?php echo $_GET['ci'];?>"><img src="edit.png" alt="Editar Datos Basicos" height=40 width=40 align=left/></a>

		<label class="description" for="element_2"><a href="editarDatosBasicos.php?ci=<?php echo $_GET['ci'];?>">Editar Datos B&aacute;sicos </a></label> 

	<?php } else { ?>

		<a href="editarDatosBasicos.php?ci=<?php echo $_POST['ci'];?>"><img src="edit.png" alt="Editar Datos Basicos" height=40 width=40 align=left/></a>

		<label class="description" for="element_2"><a href="editarDatosBasicos.php?ci=<?php echo $_POST['ci'];?>">Editar Datos B&aacute;sicos </a></label> 

	<?php } ?>

	</td>

	<td align="center">

	<?php if (@$_GET['ret'] == '1') { ?>

		<a href="editarDatosFisicos.php?ci=<?php echo $_GET['ci'];?>"><img src="edit_fisico.png" alt="Editar Datos Fisicos" height=40 width=40 align=left/></a>

		<label class="description" for="element_2"><a href="editarDatosFisicos.php?ci=<?php echo $_GET['ci'];?>">Editar Datos F&iacute;sicos </a></label>

	<?php } else { ?>

		<a href="editarDatosFisicos.php?ci=<?php echo $_POST['ci'];?>"><img src="edit_fisico.png" alt="Editar Datos Fisicos" height=40 width=40 align=left/></a>

		<label class="description" for="element_2"><a href="editarDatosFisicos.php?ci=<?php echo $_POST['ci'];?>">Editar Datos F&iacute;sicos </a></label>

	<?php } ?>	

	</td>

	<td align="center">

	<?php if (@$_GET['ret'] == '1') { ?>

		<a href="informeEmpresa.php?ci=<?php echo $_GET['ci'];?>"><img src="reportsCompany.png" alt="Generar Informe Empresa" height=40 width=40 align=left/></a>

		<label class="description" for="element_2"><a href="informeEmpresa.php?ci=<?php echo $_GET['ci'];?>">Generar Informe Empresa </a></label>

	<?php } else { ?>

		<a href="informeEmpresa.php?ci=<?php echo $_POST['ci'];?>"><img src="reportsCompany.png" alt="Generar Informe Empresa" height=40 width=40 align=left/></a>

		<label class="description" for="element_2"><a href="informeEmpresa.php?ci=<?php echo $_POST['ci'];?>">Generar Informe Empresa </a></label>

	<?php } ?>	

	</td>

	<td align="center">

	<?php if (@$_GET['ret'] == '1') { ?>

		<a href="informeEmpleado.php?ci=<?php echo $_GET['ci'];?>"><img src="reportEmployee.png" alt="Generar Informe Empleado" height=40 width=40 align=left/></a>

		<label class="description" for="element_2"><a href="informeEmpleado.php?ci=<?php echo $_GET['ci'];?>">Generar Informe Empleado </a></label>

	<?php } else { ?>

		<a href="informeEmpleado.php?ci=<?php echo $_POST['ci'];?>"><img src="reportEmployee.png" alt="Generar Informe Empleado" height=40 width=40 align=left/></a>

		<label class="description" for="element_2"><a href="informeEmpleado.php?ci=<?php echo $_POST['ci'];?>">Generar Informe Empleado </a></label>

	<?php } ?>	

	</td>

	<td align="center">

	<?php if (@$_GET['ret'] == '1') { ?>

		<a href="eliminarPaciente.php?ci=<?php echo $_GET['ci'];?>" onClick="return confirm('Est&aacute; seguro que desea eliminar a este paciente?')"><img src="delete.png" alt="Eliminar Paciente" height=40 width=40 align=left/></a>

		<label class="description" for="element_2"><a href="eliminarPaciente.php?ci=<?php echo $_GET['ci'];?>" onClick="return confirm('Est&aacute; seguro que desea eliminar a este paciente?')"> Eliminar Paciente </a></label>

	<?php } else { ?>

		<a href="eliminarPaciente.php?ci=<?php echo $_POST['ci'];?>" onClick="return confirm('Est&aacute; seguro que desea eliminar a este paciente?')"><img src="delete.png" alt="Eliminar Paciente" height=40 width=40 align=left/></a>

		<label class="description" for="element_2"><a href="eliminarPaciente.php?ci=<?php echo $_POST['ci'];?>" onClick="return confirm('Est&aacute; seguro que desea eliminar a este paciente?')">Eliminar Paciente </a></label>

	<?php } ?>	

	</td>

	</tr>

	</table>

	</center>

	

	

	</div>



	<div class="form_description">

<table>

	<tr>

		<td width=40>&nbsp;</td>

		<td width=250 align="left" valign="top">

			<h3><u>Datos B&aacute;sicos</u></h3>

			<ul >

	

			<li id="li_2" >

				<label class="description" for="element_2">Edad: <?php echo $Edad;?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Peso: <?php echo $Peso;?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Talla: <?php echo $Talla;?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">TA: <?php echo $TA;?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Pulso: <?php echo $Pulso;?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">General: <?php echo $General;?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Masa Corporal: <?php echo $Masa_Corporal;?> %</label>

			</li>	

			

			</ul>

		</td>

		<td width=40>&nbsp;</td>

		<td width=250 align="left" valign="top">

			<h3><u>Riesgos</u></h3>

			<ul >	

			<li id="li_2" >

				<label class="description" for="element_2">F&iacute;sicos: <?php if ($Fisicos == 1) { echo 'Si'; } else { echo 'No';}?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">biol&oacute;gicos: <?php if ($Biologicos == 1) { echo 'Si'; } else { echo 'No';}?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Mec&aacute;nicos: <?php if ($Mecanicos == 1) { echo 'Si'; } else { echo 'No';}?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Psicosociales: <?php if ($Psicosociales == 1) { echo 'Si'; } else { echo 'No';}?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Qu&iacute;micos: <?php if ($Quimicos == 1) { echo 'Si'; } else { echo 'No';}?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Disergon&oacute;micos: <?php if ($Disergonomicos == 1) { echo 'Si'; } else { echo 'No';}?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Nota: <?php echo $Nota;?></label>

			</li>

		</ul>

		</td>

		<td width=40>&nbsp;</td>

	</tr>

</table>

</div>

<div class="form_description">



			<center><h3><u>Datos del Examen F&iacute;sico</u></h3></center>



<table>

	<tr>

		<td width=40>&nbsp;</td>

		<td width=250 align="left" valign="top">

		<ul >			

			<li id="li_2" >

				<label class="description" for="element_2">Piel y Faneras: <?php echo $row3['Piel_Faneras'];?></label>

			</li>

			<br>

			<li id="li_2" >

				<label class="description" for="element_2">Ojos:</label>

				<ul>

					<li>

						<label class="description" for="element_2">Apertura Normal: <?php if ($row3['Ojos_Normal'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Deformidades: <?php if ($row3['Ojos_Deformidades'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Lentes de Contacto: <?php if ($row3['Ojos_Contactos'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Otros: <?php echo $row3['Ojos_Otros'];?></label>

					</li>

				</ul>

			</li>

			<br>

			<li id="li_2" >

				<label class="description" for="element_2">O.R.L.:</label>

				<ul>

					<li>

						<label class="description" for="element_2">Apertura Bucal Normal: <?php if ($row3['ORL_BucalNormal'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Piorrea: <?php if ($row3['ORL_Piorrea'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Pr&oacute;tesis Dental: <?php if ($row3['ORL_ProtesisDental'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Alt. Tabique: <?php if ($row3['ORL_Tabique'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Otros: <?php echo $row3['ORL_Otros'];?></label>

					</li>

				</ul>

			</li>

			<br>

			<li id="li_2" >

				<label class="description" for="element_2">Cuello:</label>

				<ul>

					<li>

						<label class="description" for="element_2">Adenopat&iacute;as: <?php if ($row3['Cuello_Adenopatias'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Tumor: <?php if ($row3['Cuello_Tumor'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Mov. Laringea Normal: <?php if ($row3['Cuello_LaringeNormal'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Tiroides: <?php echo $row3['Cuello_Tiroides'];?></label>

					</li>

					<li>

						<label class="description" for="element_2">Otros: <?php echo $row3['Cuello_Otros'];?></label>

					</li>

				</ul>

			</li>

			<br>

			<li id="li_2" >

				<label class="description" for="element_2">C.V.:</label>

				<ul>

					<li>

						<label class="description" for="element_2">Pulso Venoso: <?php if ($row3['CV_PulsoVenoso'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">L.P.E.: <?php if ($row3['CV_LPE'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">1R: <?php if ($row3['CV_1R'] == 1) { echo 'Normal'; } else { echo 'Desd.';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">2R: <?php if ($row3['CV_2R'] == 1) { echo 'Normal'; } else { echo 'Desd.';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">3R: <?php if ($row3['CV_3R'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">4R: <?php if ($row3['CV_4R'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Galope: <?php if ($row3['CV_Galope'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Frote Peric.: <?php if ($row3['CV_FrotePeric'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Soplos: <?php if ($row3['CV_Soplos'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Otros: <?php echo $row3['CV_Otros'];?></label>

					</li>

				</ul>

			</li>

			</ul>

			</td>

			<td width=40>&nbsp;</td>

			<td width=250 align="left" valign="top">

			<ul>

			<li id="li_2" >

				<label class="description" for="element_2">Pulmonar:</label>

				<ul>

					<li>

						<label class="description" for="element_2">Expansi&oacute;n: <?php echo $row3['Pulmonar_Expansion'];?></label>

					</li>

					<li>

						<label class="description" for="element_2">MV: <?php echo $row3['Pulmonar_MV'];?></label>

					</li>

					<li>

						<label class="description" for="element_2">Sibilitantes: <?php if ($row3['Pulmonar_Sibilitantes'] == 1) { echo 'Normal'; } else { echo 'Desd.';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Roncos: <?php if ($row3['Pulmonar_Roncos'] == 1) { echo 'Normal'; } else { echo 'Desd.';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Crepiantes: <?php if ($row3['Pulmonar_Crepiantes'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Frote Pleural: <?php if ($row3['Pulmonar_FrotePleural'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">V.V. Normales: <?php if ($row3['Pulmonar_VVNormal'] == 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Percusi&oacute;n Tor&aacute;xica: <?php echo $row3['Pulmonar_PercusionToraxica'];?></label>

					</li>

					<li>

						<label class="description" for="element_2">Otros: <?php echo $row3['Pulmonar_Otros'];?></label>

					</li>

				</ul>

			</li>

			<br>

			<li id="li_2" >

				<label class="description" for="element_2">Abdomen: <?php echo $row3['Abdomen'];?></label>

			</li>

			<br>

			<li id="li_2" >

				<label class="description" for="element_2">Columna, Torax Post y Regiones Lumbares: <?php echo $row3['Columna'];?></label>

			</li>

			<br>

			<li id="li_2" >

				<label class="description" for="element_2">Extremidades: <?php echo $row3['Extremidades'];?></label>

			</li>

			<br>

			<li id="li_2" >

				<label class="description" for="element_2">Circulaci&oacute;n Perif&eacute;rica:</label>

				<ul>

					<li>

						<label class="description" for="element_2">Pulsos Normales: <?php if ($row3['CircPer_Normal']== 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">V&aacute;rices: <?php if ($row3['CircPer_Varices']== 1) { echo 'Si'; } else { echo 'No';}?></label>

					</li>

					<li>

						<label class="description" for="element_2">Otros: <?php echo $row3['CircPer_Otros'];?></label>

					</li>

				</ul>

			</li>

			<br>

			<li id="li_2" >

				<label class="description" for="element_2">Observaciones: <?php echo $row3['Observaciones'];?></label>

			</li>

			

		</ul>

		</td>

		<td width=40>&nbsp;</td>

		</tr>

		</table>

</div>		

<div class="form_description">



		<center><h3><u>COMENTARIOS</u></h3></center>

<table>

	<tr>

		<td colspan=4>

			<blockquote><h4><u>Antecedentes Personales</u></h4></blockquote>

		</td>

	</tr>

	<tr>

		<td width=40>&nbsp;</td>

		<td width=250 align="left" valign="top">

				

		<ul>	

			<li id="li_2" >

				<label class="description" for="element_2">Quir&uacute;rgicos: <?php echo $row3['Ant_Pers_Quirurgicos'];?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Respiratorio: <?php echo $row3['Ant_Pers_Respiratorio'];?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Nervioso: <?php echo $row3['Ant_Pers_Nervioso'];?></label>

			</li>

		</ul>

		</td>

		<td width=40>&nbsp;</td>

		<td width=250 align="left" valign="top">

		<ul>

			<li id="li_2" >

				<label class="description" for="element_2">Al&eacute;rgicos: <?php echo $row3['Ant_Pers_Alergicos'];?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Digestivos: <?php echo $row3['Ant_Pers_Digestivos'];?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Trauma: <?php echo $row3['Ant_Pers_Trauma'];?></label>

			</li>

		</ul>

		</td>

		<td width=40>&nbsp;</td>

		</tr>

	

	<tr>

	<td colspan=4>

		<blockquote><h4><u>H&aacute;bitos Psico-Biol&oacute;gicos</u></h4></blockquote>

	</td>

	</tr>

	

	<tr>

		<td width=40>&nbsp;</td>

		<td width=250 align="left" valign="top">

				

		<ul>	

			<li id="li_2" >

				<label class="description" for="element_2">Tabaco: <?php echo $row3['Habitos_Tabaco'];?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Alcohol: <?php echo $row3['Habitos_Alcohol'];?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Cafe: <?php echo $row3['Habitos_Cafe'];?></label>

			</li>

		</ul>

		</td>

		<td width=40>&nbsp;</td>

		<td width=250 align="left" valign="top">

		<ul>

			<li id="li_2" >

				<label class="description" for="element_2">Medicamentos: <?php echo $row3['Habitos_Medicamentos'];?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Deporte: <?php echo $row3['Habitos_Deporte'];?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Nutrici&oacute;n: <?php echo $row3['Habitos_Nutricion'];?></label>

			</li>

		</ul>

		</td>

		<td width=40>&nbsp;</td>

		</tr>

		<tr>

		<td colspan=4>

		<blockquote><h4><u>Antecedentes Familiares:</u> <?php echo $row3['Antecedentes_Familiares'];?></h4></blockquote>

		</td>

		</tr>

		<tr>

		<td colspan=4>

		<blockquote><h4><u>Pruebas Especiales</u> </h4></blockquote>

		</td>

		</tr>

		<tr>

		<td width=40>&nbsp;</td>

		<td width=250 align="left" valign="top">

				

		<ul>	

			<li id="li_2" >

				<label class="description" for="element_2">Electrocardiograma: <?php echo $row3['Electrocardiograma'];?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Laboratorio: <?php echo $row3['Laboratorio'];?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Ultrasonido: <?php echo $row3['Ultrasonido'];?></label>

			</li>

		</ul>

		</td>

		<td width=40>&nbsp;</td>

		<td width=250 align="left" valign="top">

		<ul>

			<li id="li_2" >

				<label class="description" for="element_2">Espirometr&iacute;a: <?php echo $row3['Espirometria'];?></label>

			</li>

			<li id="li_2" >

				<label class="description" for="element_2">Encuesta Psico-Social: <?php echo $row3['Encuesta'];?></label>

			</li>

		</ul>

		</td>

		<td width=40>&nbsp;</td>

		</tr>

		<tr>

		<td colspan=4>

		<blockquote><h4><u>Conclusiones y Recomendaciones:</u> <?php echo $row3['Conclusiones'];?></h4></blockquote>

		</td>

		</tr>

		<tr>

		<td colspan=4>

		<blockquote><h4><u>Condici&oacute;n:</u> <?php if ($row3['Condicion'] == 1) { echo 'Apto.'; } else if ($row3['Condicion'] == 0) { echo 'No Apto.';} else if ($row3['Condicion'] == 2) { echo 'Apto con Limitaciones.';}?></h4></blockquote>

		</td>

		</tr>

		<tr>

		<td colspan=4>

		<blockquote><h4><u>Seguimiento:</u> <?php echo $row3['Seguimiento'];?></h4></blockquote>

		</td>

		</tr>

	</table>

	

</div>

		<center>

		<table>

					<tr>

						<td valign="top"><a href='modPacientes1.php?ret=1'><img src="regresar.png" alt="Salir del Sistema" height=50 width=50/></a></td>

						<td valign="middle"><label class="description" for="element_2"><a href='modPacientes1.php?ret=1'>Regresar </a></label></center></td>

					</tr>

		</table>

		<table>

					<tr>

						<td valign="top"><a href='index.php?lo=1'><img src="logout.png" alt="Salir del Sistema" height=50 width=50/></a></td>

						<td valign="middle"><label class="description" for="element_2"><a href='index.php?lo=1'>Salir del Sistema </a></label></td>

					</tr>

		</table>

		</center>

	</div>

	<img id="bottom" src="bottom.png" alt="">

	</body>

</html>



<?php 

} else {

	header("location: modPacientes1.php?pnr=1&ci='$_POST[ci]'");

}



} else {

header("location: index.php");

}



mysqli_close($cxn);

?>

<? ob_flush(); ?>