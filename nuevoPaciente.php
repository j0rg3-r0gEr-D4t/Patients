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
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Datos Básicos</a></h1>
		<form id="nuevoPacForm" class="appnitro"  method="post" action="registrarPaciente.php" onsubmit="return validateNuevoPacForm()">
					<div class="form_description">
			<h2>Datos Básicos</h2>
			<p></p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Paciente </label>
		<span>
			<input id="nombre" name= "nombre" class="element text" maxlength="255" size="8" value=""/>
			<label>Nombre</label>
		</span>
		<span>
			<input id="apellido" name= "apellido" class="element text" maxlength="255" size="14" value=""/>
			<label>Apellido</label>
		</span> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Cédula de Identidad </label>
		<div>
			<input id="ci" name="ci" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_2"><small>Sólo insertar los dígitos sin letras, puntos ni guiones.</small></p> 
		</li><li id="li_4" >
		<label class="description" for="element_4">Email </label>
		<div>
			<input id="email" name="email" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Edad </label>
		<div>
			<input id="edad" name="edad" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li><li id="li_12" >
		<label class="description" for="element_4">Sexo </label>
		<div>
		  <label>
		  <select name="sexo" id="sexo">
		    <option value="Masculino">Masculino</option>
		    <option value="Femenino">Femenino</option>
	      </select>
		  </label> 
		</div> 
		</li>
        <li id="li_4" >
		<label class="description" for="element_3">Peso </label>
		<div>
			<input id="peso" name="peso" class="element text small" type="text" maxlength="255" value=""/> 
		</div>
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Talla </label>
		<div>
			<input id="talla" name="talla" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">TA </label>
		<div>
			<input id="ta" name="ta" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Pulso </label>
		<div>
			<input id="pulso" name="pulso" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">General </label>
		<div>
			<input id="general" name="general" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Indice de Masa Corporal (%) </label>
		<div>
			<input id="mc" name="mc" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li><li id="li_9" >
		<label class="description" for="element_9">Empresa</label>
		<div>
			<input id="empresa" name="empresa" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_11" >
		<label class="description" for="element_11">Riesgos </label>
		<span>

		<input id="fisicos" name="fisicos" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_11_1">Físicos</label>
<input id="biologicos" name="biologicos" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_11_2">Biológicos</label>
<input id="mecanicos" name="mecanicos" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_11_3">Mecánicos</label>
<input id="psicosociales" name="psicosociales" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_11_4">Psicosociales</label>
<input id="quimicos" name="quimicos" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_11_5">Químicos</label>
<input id="disergonomicos" name="disergonomicos" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_11_6">Disergonómicos</label>

		</span> 
		</li>		<li id="li_10" >
		<label class="description" for="element_10">Nota </label>
		<div>
			<input id="nota" name="nota" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="233610" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Registrar" onClick="return confirm('Est&aacute; seguro que desea registrar los datos b&aacute;sicos de este paciente?')"/>
		</li>
			</ul>
		</form>	
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
<?php } else {
header("location: index.php");
}
?>
<? ob_flush(); ?>