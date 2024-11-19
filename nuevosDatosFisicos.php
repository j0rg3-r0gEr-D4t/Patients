<? ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registro de Datos del Examen F&iacute;sico</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<?php session_start();
include('js.php');
if ($_SESSION['auth']=='yes') {?>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Registro de Datos del Examen F&iacute;sico</a></h1>
		<form id="datosFisicosForm" class="appnitro"  method="post" action="registrarDatosFisicos.php" onsubmit="return validateDatosFisicosForm()">
					<div class="form_description">
			<h2>Registro de Datos del Examen F&iacute;sico</h2>
			<p></p>
		</div>						
			<ul >
			
					<li id="li_2" >
		<label class="description" for="element_2"><h3><b><u>C&eacute;dula de Identidad </u></b></h3></label>
		<div>
			<input id="ci" name="ci" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_2"><small>S&oacute;lo insertar los d&iacute;gitos sin letras, puntos ni guiones.</small></p> 
		</li>		<li class="section_break">
			<h3><b><u>Piel y Faneras:</u></b></h3>
			<p></p>
		</li>		<li id="li_3" >
		<label class="description" for="element_3"> </label>
		<div>
			<textarea id="piel_faneras" name="piel_faneras" class="element textarea small"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>Ojos:</u></b></h3>
			<p></p>
		</li>		<li id="li_50" >
		<label class="description" for="element_50"> </label>
		<span>
			<input id="ojos_normal" name="ojos_normal" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_50_1">Apertura Normal</label>
<input id="ojos_deformidades" name="ojos_deformidades" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_50_2">Deformidades</label>
<input id="" name="ojos_contactos" class="ojos_contactos" type="checkbox" value="1" />
<label class="choice" for="element_50_3">Lentes Contacto</label>

		</span> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Otros </label>
		<div>
			<textarea id="ojos_otros" name="ojos_otros" class="element textarea small"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>O.R.L.:</u></b></h3>
			<p></p>
		</li>		<li id="li_51" >
		<label class="description" for="element_51"> </label>
		<span>
			<input id="orl_bucalnormal" name="orl_bucalnormal" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_51_1">Apert. Bucal nor.</label>
<input id="orl_piorrea" name="orl_piorrea" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_51_2">Piorrea</label>
<input id="orl_protesisdental" name="orl_protesisdental" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_51_3">Pr&oacute;tesis Dental</label>
<input id="orl_tabique" name="orl_tabique" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_51_4">Alt. Tabique</label>

		</span> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Otros </label>
		<div>
			<textarea id="orl_otros" name="orl_otros" class="element textarea small"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>Cuello:</u></b></h3>
			<p></p>
		</li>		<li id="li_52" >
		<label class="description" for="element_52"> </label>
		<span>
			<input id="cuello_adenopatias" name="cuello_adenopatias" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_52_1">Adenopatias</label>
<input id="cuello_tumor" name="cuello_tumor" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_52_2">Tumor</label>
<input id="cuello_laringe" name="cuello_laringe" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_52_3">Mov. Laringea nor.</label>

		</span> 
		</li>		<li id="li_10" >
		<label class="description" for="element_10">Tiroides: </label>
		<div>
			<input id="cuello_tiroides" name="cuello_tiroides" class="element text large" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_11" >
		<label class="description" for="element_11">Otros </label>
		<div>
			<textarea id="cuello_otros" name="cuello_otros" class="element textarea small"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>C.V.:</u></b></h3>
			<p></p>
		</li>		<li id="li_53" >
		<label class="description" for="element_53"> </label>
		<span>
			<input id="cv_pulsovenoso" name="cv_pulsovenoso" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_53_1">Pulso Venoso</label>
<input id="cv_lpe" name="cv_lpe" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_53_2">L.P.E.</label>

		</span> 
		</li>		<li id="li_54" >
		<label class="description" for="element_54">1R </label>
		<span>
			<input id="1r" name="1r" class="element radio" type="radio" value="1" />
<label class="choice" for="element_54_1">Normal</label>
<input id="1r" name="1r" class="element radio" type="radio" value="0" />
<label class="choice" for="element_54_2">Desd.</label>

		</span> 
		</li>		<li id="li_55" >
		<label class="description" for="element_55">2R </label>
		<span>
			<input id="2r" name="2r" class="element radio" type="radio" value="1" />
<label class="choice" for="element_55_1">Normal</label>
<input id="2r" name="2r" class="element radio" type="radio" value="0" />
<label class="choice" for="element_55_2">Desd.</label>

		</span> 
		</li>		<li id="li_56" >
		<label class="description" for="element_56"> </label>
		<span>
			<input id="3r" name="3r" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_56_1">3R</label>
<input id="4r" name="4r" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_56_2">4R</label>
<input id="cv_galope" name="cv_galope" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_56_3">Galope</label>
<input id="cv_froteperic" name="cv_froteperic" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_56_4">Frote Peric.</label>
<input id="cv_soplos" name="cv_soplos" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_56_5">Soplos</label>

		</span> 
		</li>		<li id="li_25" >
		<label class="description" for="element_25">Otros </label>
		<div>
			<textarea id="cv_otros" name="cv_otros" class="element textarea small"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>Pulmonar:</u></b></h3>
			<p></p>
		</li>		<li id="li_14" >
		<label class="description" for="element_14">Expansi&oacute;n: </label>
		<div>
			<input id="pulmonar_expansion" name="pulmonar_expansion" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_15" >
		<label class="description" for="element_15">MV: </label>
		<div>
			<input id="pulmonar_mv" name="pulmonar_mv" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_57" >
		<label class="description" for="element_57"> </label>
		<span>
			<input id="pulmonar_sibilitantes" name="pulmonar_sibilitantes" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_57_1">Sibilitantes</label>
<input id="pulmonar_roncos" name="pulmonar_roncos" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_57_2">Roncos</label>
<input id="pulmonar_crepiantes" name="pulmonar_crepiantes" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_57_3">Crepiantes</label>
<input id="pulmonar_frotepleural" name="pulmonar_frotepleural" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_57_4">Frote Pleural</label>
<input id="pulmonar_vvnormal" name="pulmonar_vvnormal" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_57_5">V.V. normales</label>


		</span> 
		</li><li id="li_15" >
		<label class="description" for="element_15">Percusi&oacute;n Tor&aacute;xica: </label>
		<div>
			<input id="pulmonar_percusiontoraxica" name="pulmonar_percusiontoraxica" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_16" >
		<label class="description" for="element_16">Otros: </label>
		<div>
			<textarea id="pulmonar_otros" name="pulmonar_otros" class="element textarea small"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>Abdomen:</u></b></h3>
			<p></p>
		</li>		<li id="li_18" >
		<label class="description" for="element_18"> </label>
		<div>
			<textarea id="abdomen" name="abdomen" class="element textarea small"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>Columna, T&oacute;rax Post y Regiones Lumbares:</b></u></h3>
			<p></p>
		</li>		<li id="li_20" >
		<label class="description" for="element_20"> </label>
		<div>
			<textarea id="columna" name="columna" class="element textarea small"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>Extremidades:</u></b></h3>
			<p></p>
		</li>		<li id="li_22" >
		<label class="description" for="element_22"> </label>
		<div>
			<textarea id="extremidades" name="extremidades" class="element textarea small"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>Circ. Perif&eacute;rica:</u></b></h3>
			<p></p>
		</li>		<li id="li_58" >
		<label class="description" for="element_58"> </label>
		<span>
			<input id="circper_normal" name="circper_normal" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_58_1">Pulsos Normales</label>
<input id="circper_varices" name="circper_varices" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_58_2">V&aacute;rices</label>

		</span> 
		</li>		<li id="li_24" >
		<label class="description" for="element_24">Otros: </label>
		<div>
			<textarea id="circper_otros" name="circper_otros" class="element textarea small"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>Observaciones:</u></b></h3>
			<p></p>
		</li>		<li id="li_26" >
		<label class="description" for="element_26"> </label>
		<div>
			<textarea id="observaciones" name="observaciones" class="element textarea medium"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>COMENTARIOS
<br><br>
- Antecedentes Personales:</u></b></h3>
			<p></p>
		</li>		<li id="li_30" >
		<label class="description" for="element_30">Quir&uacute;rgicos: </label>
		<div>
			<textarea id="quirurgicos" name="quirurgicos" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_35" >
		<label class="description" for="element_35">Aparato Respiratorio: </label>
		<div>
			<textarea id="respiratorio" name="respiratorio" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_34" >
		<label class="description" for="element_34">Sistema Nervioso Central: </label>
		<div>
			<textarea id="nervioso" name="nervioso" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_33" >
		<label class="description" for="element_33">Al&eacute;rgicos: </label>
		<div>
			<textarea id="alergicos" name="alergicos" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_32" >
		<label class="description" for="element_32">Aparato Digestivo: </label>
		<div>
			<textarea id="digestivos" name="digestivos" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_31" >
		<label class="description" for="element_31">Trauma: </label>
		<div>
			<textarea id="trauma" name="trauma" class="element textarea small"></textarea> 
		</div> 
		</li>		
		<li id="li_36" >
		<label class="description" for="element_36">H&aacute;bitos Psico-Biol&oacute;gicos: <br><br>Tabaco: </label>
		<div>
			<textarea id="tabaco" name="tabaco" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_37" >
		<label class="description" for="element_37">Alcohol: </label>
		<div>
			<textarea id="alcohol" name="alcohol" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_38" >
		<label class="description" for="element_38">Caf&eacute;: </label>
		<div>
			<textarea id="cafe" name="cafe" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_36" >
		<label class="description" for="element_36">Medicamentos: </label>
		<div>
			<textarea id="medicamentos" name="medicamentos" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_37" >
		<label class="description" for="element_37">Deporte: </label>
		<div>
			<textarea id="deporte" name="deporte" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_38" >
		<label class="description" for="element_38">Nutrici&oacute;n: </label>
		<div>
			<textarea id="nutricion" name="nutricion" class="element textarea small"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>Antecedentes Familiares:</u></b></h3>
			<p></p>
		</li>		<li id="li_39" >
		<label class="description" for="element_39"> </label>
		<div>
			<textarea id="familiares" name="familiares" class="element textarea medium"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>PRUEBAS ESPECIALES</u></b></h3>
			<p></p>
		</li>		<li id="li_41" >
		<label class="description" for="element_41">Electrocardiograma: </label>
		<div>
			<textarea id="electrocardiograma" name="electrocardiograma" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_45" >
		<label class="description" for="element_45">Laboratorio: </label>
		<div>
			<textarea id="laboratorio" name="laboratorio" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_44" >
		<label class="description" for="element_44">Ultrasonido: </label>
		<div>
			<textarea id="ultrasonido" name="ultrasonido" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_43" >
		<label class="description" for="element_43">Espirometr&iacute;a: </label>
		<div>
			<textarea id="espirometria" name="espirometria" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_42" >
		<label class="description" for="element_42">Encuesta Psico-Social: </label>
		<div>
			<textarea id="encuesta" name="encuesta" class="element textarea small"></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3><b><u>CONCLUSIONES Y RECOMENDACIONES:</u></b></h3>
			<p></p>
		</li>		<li id="li_47" >
		<label class="description" for="element_47"> </label>
		<div>
			<textarea id="conclusiones" name="conclusiones" class="element textarea medium"></textarea> 
		</div>
		<li id="li_58" >
		<label class="description" for="element_54">Condici&oacute;n: </label>
<span>
			<input id="condicion" name="condicion" class="element radio" type="radio" value="1" />
<label class="choice" for="element_58_1">Apto</label>
<input id="condicion" name="condicion" class="element radio" type="radio" value="0" />
<label class="choice" for="element_58_2">No Apto</label>
<input id="condicion" name="condicion" class="element radio" type="radio" value="2" />
<label class="choice" for="element_58_2">Apto con Limitaciones</label>

		</span> 		
</li>
		</li> 		
		<li class="section_break">
			<h3><b><u>SEGUIMIENTO:</u></b></h3>
			<p></p>
		</li>		<li id="li_49" >
		<label class="description" for="element_49"> </label>
		<div>
			<textarea id="seguimiento" name="seguimiento" class="element textarea medium"></textarea> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="233987" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Registrar" onClick="return confirm('Est&aacute; seguro que desea registrar los datos f&iacute;sicos de este paciente?')"/>
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