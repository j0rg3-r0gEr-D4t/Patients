<? ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Informe Empresa</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<?php session_start();

if ($_SESSION['auth']=='yes') {?>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Informe Empresa</a></h1>
		<form id="form_240855" class="appnitro"  method="post" action="generarInformeEmpresa.php?ci=<?php echo $_GET['ci'];?>">
					<div class="form_description">
			<h2>Informe Empresa</h2>
			<p>C.I. Paciente: <?php echo $_GET['ci'] ?></p>
		</div>						
			<ul >
			
					<li id="li_4" >
		<label class="description" for="element_4">Fecha de Emisi&oacute;n: </label>
		<span>
			<input id="element_4_1" name="element_4_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_4_1">DD</label>
		</span>
		<span>
			<input id="element_4_2" name="element_4_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_4_2">MM</label>
		</span>
		<span>
	 		<input id="element_4_3" name="element_4_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_4_3">YYYY</label>
		</span>
	
		<span id="calendar_4">
			<img id="cal_img_4" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_4_3",
			baseField    : "element_4",
			displayArea  : "calendar_4",
			button		 : "cal_img_4",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectEuropeDate
			});
		</script>
		 
		</li>		<li id="li_1" >
		<label class="description" for="element_1">Dirigida a: </label>
		<div>
			<input id="dirigido" name="dirigido" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Sugerencias: </label>
		<div>
			<textarea id="sugerencias" name="sugerencias" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Datos de Doctores: </label>
		<div>
		  <label>
		  <select name="doc1" size="1" class="selected" id="doc1">
		    <option value="0">Rafael Sosa</option>
		    <option value="1" selected="selected">Maricarmen Sosa</option>
	      </select>
		  </label>
		</div> 
		</li>	<li id="li_4" >
		<label class="description" for="element_3">Tipo de Informe a Generar: </label>
		<div>
			<input id="informe" name="informe" class="element radio" type="radio" value="0"/>
			<label class="choice" for="element_58_1">Pre-Empleo</label>
                        <div id="cargo">
               		<label class="description" for="element_1">Cargo: </label>		
			<input id="cargo1" name="cargo1" class="element text medium" type="text" maxlength="255" value="" /> 
           		</div> 
			<input id="informe" name="informe" class="element radio" type="radio" value="1" />
			<label class="choice" for="element_58_2">Pre-Vacacional</label>
			<input id="informe" name="informe" class="element radio" type="radio" value="2" />
			<label class="choice" for="element_58_2">Post-Vacacional</label>
			<input id="informe" name="informe" class="element radio" type="radio" value="3" />
			<label class="choice" for="element_58_2">Egreso</label>
		</div> 
		</li>	
					<li class="buttons">
			    <input type="hidden" name="form_id" value="240855" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Generar Informe Empresa" />
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

<?php } else {
	header("location: index.php");
	}


?>
</html>
<? ob_flush(); ?>