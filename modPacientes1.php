<? ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Manejo de Información de Pacientes</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<?php include('js.php');
if (@$_GET['pr'] == '1' || @$_GET['pr'] == '2' || @$_GET['ok'] == '1' || @$_GET['ok'] == '2' || @$_GET['ret'] == '1' || @$_GET['pnr'] == '1'
	|| @$_GET['upb'] == '1' || @$_GET['upf'] == '1' || @$_GET['pe'] == '1') {
session_start();
}
if ($_SESSION['auth']=='yes') {?>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<center><h2>Bienvenido Usuario "<?php echo $_SESSION['logname'] ?>"</h2></center>
		<form id="busqForm" class="appnitro"  method="post" action="mostrarPaciente.php" onsubmit="return validateBusqForm()">

		<div class="form_description">
			<h2>Manejo de Información de Pacientes</h2>
			<p></p>
		</div>						
			<ul >
			
					<li class="section_break">
					<table>
					<tr>
						<td valign="top"><img src="new_user.png" alt="Registrar Paciente" height=50 width=50/></td>
						<td valign="middle"><h3>Ingreso de Nuevos Pacientes</h3></td>
					</tr>
					</table>
					
			
		</li>		<li id="li_2" >
		<label class="description" for="element_2"><a href="nuevoPaciente.php">- Datos Básicos </a></label>
	<?php 
if (@$_GET['pr'] == '1') {
	$ci = @$_GET['ci'];
	echo "<div id=\"error_message_title\"><center> El paciente con la C.I. '$ci' ya se encuentra registrado! Revise la informaci&oacute;n suministrada e intente nuevamente.</center></div>";
} else if (@$_GET['ok'] == '1') {
	$ci = @$_GET['ci'];
	echo "<div id=\"error_message_title\"><center> El paciente con la C.I. '$ci' fue registrado satisfactoriamente.</center></div>";
} 
?>	
		</li>		<li id="li_3" >
		<label class="description" for="element_3"><a href="nuevosDatosFisicos.php">- Datos del Examen Físico </a></label>
	<?php if (@$_GET['ok'] == '2') {
		$ci = @$_GET['ci'];
		echo "<div id=\"error_message_title\"><center> Los datos f&iacute;sicos del paciente con la C.I. '$ci' fueron registrados satisfactoriamente.</center></div>";
	} else if (@$_GET['pr'] == '2') {
	$ci = @$_GET['ci'];
	echo "<div id=\"error_message_title\"><center> Los datos f&iacute;sicos del paciente con la C.I. '$ci' ya se encuentran registrados! Para modificar dirigirse a la secci&oacute;n de b&uacute;squeda de pacientes. </center></div>";
	}
	?>
		</li>		<li class="section_break">
		
			<table>
					<tr>
						<td valign="top"><img src="search_user.png" alt="Buscar Paciente" height=50 width=50/></td>
						<td valign="middle"><h3>Buscar Paciente</h3></td>
					</tr>
					</table>
			<p></p>
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Cédula de Identidad </label>
		<div>
			<input id="ci" name="ci" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_5"><small>Ingresar únicamente los dígitos de la C.I. sin letras, puntos ni guiones.</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="233987" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Buscar Paciente" />
		</li>
			</ul>
	<?php if (@$_GET['pnr'] == '1') {
			$ci = @$_GET['ci'];
			echo "<div id=\"error_message_title\"><center> El paciente con la C.I. '$ci' no se encuentra registrado en el sistema.</center></div>";
			} else if (@$_GET['upb'] == '1') {
				$ci = @$_GET['ci'];
				echo "<div id=\"error_message_title\"><center> Los datos b&aacute;sicos del paciente con la C.I. '$ci' fueron actualizados exitosamente.</center></div>";
			} else if (@$_GET['upf'] == '1') {
				$ci = @$_GET['ci'];
				echo "<div id=\"error_message_title\"><center> Los datos f&iacute;sicos del paciente con la C.I. '$ci' fueron actualizados exitosamente.</center></div>";
			} else if (@$_GET['pe'] == '1') {
				$ci = @$_GET['ci'];
				echo "<div id=\"error_message_title\"><center> El paciente con la C.I. '$ci' fue eliminado exitosamente.</center></div>";
			}?>
		</form>	
		<center>
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