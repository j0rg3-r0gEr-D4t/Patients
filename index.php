<? ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>VEM - Historial de Pacientes</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<?php include('js.php');?>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>VEM - Historial de Pacientes</a></h1>
		
		<form id="myForm" class="appnitro"  method="post" action="Pacientes.php" onsubmit="return validateForm()">
					<div class="form_description">
			<h2>VEM - Historial de Pacientes</h2>
			<p>Introduzca su Login y Password para acceder al sistema.</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Usuario </label>
		<div>
			<input id="username" name="username" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Password </label>
		<div>
			<input id="password" name="password" class="element text small" type="password" maxlength="255" value=""/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="233621" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Ingresar" />
		</li>
			</ul>
		</form>	
		<?php 
if (@$_GET['le'] == 'p') {
	echo '<div id="error_message_title"><center> Password incorrecto. Intente de nuevo!</center></div>';
} else if (@$_GET['le'] == 'l') {
	echo '<div id="error_message_title"><center> El usuario ingresado no se encuentra registrado. Intente de nuevo! </center></div>';
} else if (@$_GET['lo'] == '1') {
	echo '<div id="error_message_title"><center> Sesi&oacute;n cerrada. </center></div>';
	session_start();
	session_destroy();
}
?>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
<? ob_flush(); ?>