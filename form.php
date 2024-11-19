<form name="myForm" action="Pacientes.php" onsubmit="return validateForm()"  method='post'>
<center><table>
	<tr>
		<td><label>Username :</label></td>
		<td><input type='text' name='username'/><br /></td>
	</tr>
	<tr>
		<td><label>Password :</label></td>
		<td><input type='password' name='password'/><br/></td>
	</tr>
		
</table></center>

<center><input type='submit' value=' Enviar '/><br /></center>


</form>

<?php 
if (@$_GET['le'] == 'p') {
	echo '<center> Password incorrecto. Intente de nuevo! </center>';
} else if (@$_GET['le'] == 'l') {
	echo '<center> El username ingresado no se encuentra registrado. Intente de nuevo! </center>';
} else if (@$_GET['lo'] == 'l') {
	session_destroy();
}
?>