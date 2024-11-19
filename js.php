<script type="text/javascript">

function validateForm()
{
var x=document.forms["myForm"]["username"].value;
var y=document.forms["myForm"]["password"].value;

if ((x==null || x=="") && (y==null || y=="") ) {
	alert("Favor introducir su USERNAME y PASSWORD");
	return false;
  }
else if (!(x==null || x=="") && (y==null || y=="")) {
	alert("Favor introducir su PASSWORD");
	return false;
}
else if ((x==null || x=="") && !(y==null || y=="")) {
	alert("Favor introducir su USERNAME");  
	return false;
  }
}

function validateBusqForm()
{
var x=document.forms["busqForm"]["ci"].value;

if (x==null || x=="") {
	alert("Favor introducir la C.I. del paciente a buscar.");
	return false;
}
}

function validateNuevoPacForm()
{
var y=document.forms["nuevoPacForm"]["nombre"].value;
var z=document.forms["nuevoPacForm"]["apellido"].value;
var x=document.forms["nuevoPacForm"]["ci"].value;

if (y==null || y=="") {
	alert("Favor introducir el nombre del paciente a registrar");
	return false;
}
if (z==null || z=="") {
	alert("Favor introducir el apellido del paciente a registrar");
	return false;
}
if (x==null || x=="") {
	alert("Favor introducir la C.I. del paciente a registrar");
	return false;
}
}

function validateDatosFisicosForm()
{
var x=document.forms["datosFisicosForm"]["ci"].value;

if (x==null || x=="") {
	alert("Favor introducir la C.I. del paciente.");
	return false;
}
}
</script>   		
