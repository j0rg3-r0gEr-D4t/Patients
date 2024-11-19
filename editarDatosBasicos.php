<? ob_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Datos B&aacute;sicos</title>

<link rel="stylesheet" type="text/css" href="view.css" media="all">

<script type="text/javascript" src="view.js"></script>

<?php session_start();

include('js.php');

if ($_SESSION['auth']=='yes') {?>

</head>

<?php

include('Config.php');

$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect'.mysqli_error($cxn));

$sql = "SELECT Nombre, Apellido, Edad, Peso, Talla, TA, Pulso, General, Masa_Corporal, Email, Empresa, Fecha_Registro FROM pacientes WHERE CI='$_GET[ci]'";

$result = mysqli_query($cxn,$sql) or die('Query died: Info Paciente'.mysqli_error($cxn));

$num = mysqli_num_rows($result);

$row = mysqli_fetch_assoc($result);

extract($row);



$sql2 = "SELECT Fisicos, Biologicos, Mecanicos, Psicosociales, Quimicos, Disergonomicos, Nota FROM pacientes_riesgos WHERE CI='$_GET[ci]'";

$result2 = mysqli_query($cxn,$sql2) or die('Query died: Info Paciente_Riesgos'.mysqli_error($cxn));

$num2 = mysqli_num_rows($result2);

$row2 = mysqli_fetch_assoc($result2);

extract($row2);

?>

<body id="main_body" >

	

	<img id="top" src="top.png" alt="">

	<div id="form_container">

	

		<h1><a>Datos Bsicos</a></h1>

		<form id="nuevoPacForm" class="appnitro"  method="post" action="actualizarPaciente.php" onsubmit="return validateNuevoPacForm()">

					<div class="form_description">

			<h2>Datos B&aacute;sicos</h2>

			<p></p>

		</div>						

			<ul >

			

					<li id="li_1" >

		<label class="description" for="element_1">Paciente </label>

		<span>

			<input id="nombre" name= "nombre" class="element text" maxlength="255" size="8" value="<?php echo $Nombre ?>">

			<label>Nombre</label>

		</span>

		<span>

			<input id="apellido" name= "apellido" class="element text" maxlength="255" size="14" value="<?php echo $Apellido ?>">

			<label>Apellido</label>

		</span> 

		</li>		<li id="li_2" >

		<label class="description" for="element_2">C&eacute;dula de Identidad </label>

		<div>

			<input id="ci" name="ci" class="element text medium" type="text" maxlength="255" readonly="readonly" value="<?php echo $_GET['ci'] ?>"> 

		</div><p class="guidelines" id="guide_2"><small>La C.I. del paciente no se puede modificar.</small></p> 

		</li><li id="li_4" >

		<label class="description" for="element_4">Email </label>

		<div>

			<input id="email" name="email" class="element text medium" type="text" maxlength="255" value="<?php echo $Email ?>"> 

		</div> 

		</li>		<li id="li_4" >

		<label class="description" for="element_4">Edad </label>

		<div>

			<input id="edad" name="edad" class="element text small" type="text" maxlength="255" value="<?php echo $Edad ?>"> 

		</div> 

		</li><li id="li_12" >
		<label class="description" for="element_12">Sexo </label>
		<div>
		  <label>
		  <select name="sexo" size="1" id="sexo">
		    <option value="Masculino">Masculino</option>
		    <option value="Femenino" selected="selected">Femenino</option>
	      </select>
		  </label> 
		</div> 
		</li>
        
        <li id="li_4" >

		<label class="description" for="element_3">Peso </label>

		<div>

			<input id="peso" name="peso" class="element text small" type="text" maxlength="255" value="<?php echo $Peso ?>"> 

		</div>

		</li>		<li id="li_5" >

		<label class="description" for="element_5">Talla </label>

		<div>

			<input id="talla" name="talla" class="element text small" type="text" maxlength="255" value="<?php echo $Talla ?>"> 

		</div> 

		</li>		<li id="li_6" >

		<label class="description" for="element_6">TA </label>

		<div>

			<input id="ta" name="ta" class="element text small" type="text" maxlength="255" value="<?php echo $TA ?>"> 

		</div> 

		</li>		<li id="li_7" >

		<label class="description" for="element_7">Pulso </label>

		<div>

			<input id="pulso" name="pulso" class="element text small" type="text" maxlength="255" value="<?php echo $Pulso ?>"> 

		</div> 

		</li>		<li id="li_8" >

		<label class="description" for="element_8">General </label>

		<div>

			<input id="general" name="general" class="element text large" type="text" maxlength="255" value="<?php echo $row['General']; ?>"> 

		</div> 

		</li>		<li id="li_9" >

		<label class="description" for="element_9">Indice de Masa Corporal (%) </label>

		<div>

			<input id="mc" name="mc" class="element text small" type="text" maxlength="255" value="<?php echo $Masa_Corporal ?>"> 

		</div> 

		</li><li id="li_9" >

		<label class="description" for="element_9">Empresa</label>

		<div>

			<input id="empresa" name="empresa" class="element text large" type="text" maxlength="255" value="<?php echo $Empresa ?>"> 

		</div> 

		</li>		<li id="li_11" >

		<label class="description" for="element_11">Riesgos </label>

		<span>



		

		

		<?php if ($Fisicos == 1) { ?>

			<input id="fisicos" name="fisicos" class="element checkbox" type="checkbox" value="1" checked=yes/>

		<?php } else { ?>

			<input id="fisicos" name="fisicos" class="element checkbox" type="checkbox" value="1" />

		<?php } ?>

		<label class="choice" for="element_11_1">F&iacute;sicos</label>

		

		<?php if ($Biologicos == 1) { ?>

			<input id="biologicos" name="biologicos" class="element checkbox" type="checkbox" value="1" checked=yes/>

		<?php } else { ?>

			<input id="biologicos" name="biologicos" class="element checkbox" type="checkbox" value="1"/>

		<?php } ?>

		<label class="choice" for="element_11_2">Biol&oacute;gicos</label>

		

		<?php if ($Mecanicos == 1) { ?>

			<input id="mecanicos" name="mecanicos" class="element checkbox" type="checkbox" value="1" checked=yes/>

		<?php } else { ?>

			<input id="mecanicos" name="mecanicos" class="element checkbox" type="checkbox" value="1" />

		<?php } ?>

		<label class="choice" for="element_11_3">Mec&aacute;nicos</label>

		

		<?php if ($Psicosociales == 1) { ?>

			<input id="psicosociales" name="psicosociales" class="element checkbox" type="checkbox" value="1" checked=yes/>

		<?php } else { ?>

			<input id="psicosociales" name="psicosociales" class="element checkbox" type="checkbox" value="1" />

		<?php } ?>

		<label class="choice" for="element_11_4">Psicosociales</label>

		

		<?php if ($Quimicos == 1) { ?>

			<input id="quimicos" name="quimicos" class="element checkbox" type="checkbox" value="1" checked=yes/>

		<?php } else { ?>

			<input id="quimicos" name="quimicos" class="element checkbox" type="checkbox" value="1"/>

		<?php } ?>

		<label class="choice" for="element_11_5">Qu&iacute;micos</label>

		

		<?php if ($Disergonomicos == 1) { ?>

			<input id="disergonomicos" name="disergonomicos" class="element checkbox" type="checkbox" value="1" checked=yes/>

		<?php } else { ?>

			<input id="disergonomicos" name="disergonomicos" class="element checkbox" type="checkbox" value="1"/>

		<?php } ?>

		<label class="choice" for="element_11_6">Disergon&oacute;micos</label>



		</span> 

		</li>		<li id="li_10" >

		<label class="description" for="element_10">Nota </label>

		<div>

			<input id="nota" name="nota" class="element text large" type="text" maxlength="255" value="<?php echo $Nota ?>"> 

		</div> 

		</li>

			

					<li class="buttons">

			    <input type="hidden" name="form_id" value="233610" />

			    

				<input id="saveForm" class="button_text" type="submit" name="submit" value="Actualizar" onClick="return confirm('Est&aacute; seguro que desea actualizar los datos b&aacute;sicos de este paciente?')"/>

		</li>

			</ul>

		</form>	

		<center>

		<table>

					<tr>

						<td valign="top"><a href="mostrarPaciente.php?ret=1&ci=<?php echo $_GET['ci'];?>"><img src="regresar.png" alt="Salir del Sistema" height=50 width=50/></a></td>

						<td valign="middle"><label class="description" for="element_2"><a href="mostrarPaciente.php?ret=1&ci=<?php echo $_GET['ci'];?>">Regresar </a></label></center></td>

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

<?php } else {

header("location: index.php");

}

mysqli_close($cxn);

?>

<? ob_flush(); ?>