<?php


include('Config.php');
$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect'.mysql_error($cxn));
$sql = "SELECT Nombre, Apellido, Talla, Peso, TA, Pulso FROM pacientes WHERE CI='$_GET[ci]'";
$result = mysqli_query($cxn,$sql) or die('Query died: Info Paciente'.mysqli_error($cxn));
$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
extract($row);

$sql = "SELECT * FROM pacientes_datos_fisicos WHERE CI='$_GET[ci]'";
$result = mysqli_query($cxn,$sql) or die('Query died: Datos Fisicos Paciente'.mysqli_error($cxn));
$num = mysqli_num_rows($result);
$row3 = mysqli_fetch_assoc($result);
if ($num > 0) {
	extract($row3);
}

mysqli_close($cxn);

require('fpdf.php');

class PDF extends FPDF
{
// Page footer
function Footer()
{
    // Inserta la imagen de la firma respectiva en el pie de cada página que se genere.
    $this->Image($_POST['doc1'].'firma.jpg',140,230,60,0);
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,utf8_decode('Av. Fco de Miranda. Pasaje Galerías Venecia, Local 11. Chacao-Caracas-Venezuela. Teléfonos: 0212-2669622. Visite nuestra página web: www.vem.com.ve'),0,0,'C');
}
}


$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('vemLogo.png',67,10,80,0);

$pdf->setY(40);
$pdf->setAutoPageBreak(true,20);

$pdf->Cell(0,20,'INFORME MEDICO',0,1,'C');

$pdf->Cell(0,1,$_POST['element_4_1'].'/'.$_POST['element_4_2'].'/'.$_POST['element_4_3'],0,1,'R');

$pdf->SetFont('Arial','B',14);

$pdf->setY(70);

$pdf->Cell(0,6,utf8_decode($Apellido.' '.$Nombre),0,1,'L');
$pdf->Cell(0,6,'C.I. '.$_GET['ci'],0,1,'L');
$pdf-> Ln(4);
$pdf->Cell(0,6,'P/A: '.$TA.' mmHg			'.'		F/C: '.$Pulso.' Lat por min',0,1,'L');
$pdf-> Ln(4);
$pdf->Cell(0,6,'Talla: '.$Talla.' 			'.'		Peso: '.$Peso.' Kg',0,1,'L');
$pdf-> Ln(8);



//PIEL Y FANERAS

if ($row3['Piel_Faneras'] != '') {
	$pdf->SetFont('Arial','BU',14);
	$pdf->Cell(0,6,utf8_decode('Piel y Faneras:'),0,1,'L');
	$pdf->SetFont('Arial','',14);
	$pdf->Multicell(0,6,' '.utf8_decode($row3['Piel_Faneras']).' ',0,'J');
	$pdf-> Ln(4);
}

//OJOS
$ojos = '';
if ($row3['Ojos_Normal'] == 1) {
	 $ojos .= 'Apertura Normal. ';
}
if ($row3['Ojos_Deformidades'] == 1) {
	$ojos .= 'Deformidades. ';
}
if ($row3['Ojos_Contactos'] == 1) {
	$ojos .= 'Lentes de Contacto. ';
}
$ojos.=$row3['Ojos_Otros'];

if ($ojos != '') {
	$pdf->SetFont('Arial','BU',14);
	$pdf->Cell(0,6,utf8_decode('Ojos:'),0,1,'L');
	$pdf->SetFont('Arial','',14);
	$pdf->Multicell(0,6,' '.utf8_decode($ojos).' ',0,'J');
	$pdf-> Ln(4);
}

//ORL
$orl = '';
if ($row3['ORL_BucalNormal'] == 1) {
	$orl .= 'Apertura bucal normal. ';
}
if ($row3['ORL_Piorrea'] == 1) {
	$orl .= 'Piorrea. ';
}
if ($row3['ORL_ProtesisDental'] == 1) {
	$orl .= 'Prótesis dental. ';

}
if ($row3['ORL_Tabique'] == 1) {
	$orl .= 'Alt. Tabique. ';
}

$orl.= $row3['ORL_Otros'];

if ($orl != '') {
	$pdf->SetFont('Arial','BU',14);
	$pdf->Cell(0,6,utf8_decode('O.R.L.:'),0,1,'L');
	$pdf->SetFont('Arial','',14);
	$pdf->Multicell(0,6,' '.utf8_decode($orl).' ',0,'J');
	$pdf-> Ln(4);
}

//Cuello
$cuello = '';
if ($row3['Cuello_Adenopatias'] == 1) {
		$cuello .= 'Adenopatías. '; 
}
if ($row3['Cuello_Tumor'] == 1) {
		$cuello .= 'Tumor. '; 
}
if ($row3['Cuello_LaringeNormal'] == 1) {
		$cuello .= 'Mov. Laríngea normal. '; 
}
if ($row3['Cuello_Tiroides'] != '') {
		$cuello .= 'Tiroides '.$row3['Cuello_Tiroides'].' '; 
}

$cuello .= $row3['Cuello_Otros'];

if ($cuello != '') {
	$pdf->SetFont('Arial','BU',14);
	$pdf->Cell(0,6,utf8_decode('Cuello:'),0,1,'L');
	$pdf->SetFont('Arial','',14);
	$pdf->Multicell(0,6,' '.utf8_decode($cuello).' ',0,'J');
	$pdf-> Ln(4);
}

//C.V.
$cv = '';
if ($row3['CV_PulsoVenoso'] == 1) {
	$cv .= 'Pulso venoso. ';
}
if ($row3['CV_LPE'] == 1) {
	$cv .= 'L.P.E. ';
}
if ($row3['CV_1R'] == 1) {
	$cv .= '1R Normal. ';
} else {
	$cv .= '1R Desd. ';
}
if ($row3['CV_2R'] == 1) {
	$cv .= '2R Normal. ';
} else {
	$cv .= '2R Desd. ';
}
if ($row3['CV_3R'] == 1) {
	$cv .= '3R Si. ';
} else {
	$cv .= '3R No. ';
}
if ($row3['CV_4R'] == 1) {
	$cv .= '4R Si. ';
} else {
	$cv .= '4R No. ';
}
if ($row3['CV_Galope'] == 1) {
	$cv .= 'Galope. ';
}
if ($row3['CV_FrotePeric'] == 1) {
	$cv .= 'Frote Peric. ';
}
if ($row3['CV_Soplos'] == 1) {
	$cv .= 'Soplos. ';
}
$cv = $row3['CV_Otros'];

if ($cv != '') {
	$pdf->SetFont('Arial','BU',14);
	$pdf->Cell(0,6,utf8_decode('C.V.:'),0,1,'L');
	$pdf->SetFont('Arial','',14);
	$pdf->Multicell(0,6,' '.utf8_decode($cv).' ',0,'J');
	$pdf-> Ln(4);
}

//Pulmonar
$pulmonar ='';
if ($row3['Pulmonar_Expansion'] != '') {
	$pulmonar .=$row3['Pulmonar_Expansion'].' ';
}
if ($row3['Pulmonar_MV'] != '') {
	$pulmonar .=$row3['Pulmonar_MV'].' ';
}
if ($row3['Pulmonar_Sibilitantes'] == 1) {
	$pulmonar .= 'Sibilitantes. ';
}
if ($row3['Pulmonar_Roncos'] == 1) {
	$pulmonar .= 'Roncos. ';
}
if ($row3['Pulmonar_Crepiantes'] == 1) {
	$pulmonar .= 'Crepiantes. ';
}
if ($row3['Pulmonar_FrotePleural'] == 1) {
	$pulmonar .= 'Frote Pleural. ';
}
if ($row3['Pulmonar_VVNormal'] == 1) {
	$pulmonar .= 'V.V. normales. ';
}
if ($row3['Pulmonar_PercusionToraxica'] != '') {
	$pulmonar .=$row3['Pulmonar_PercusionToraxica'].' ';
}
$pulmonar .=$row3['Pulmonar_Otros'];

if ($pulmonar != '') {
	$pdf->SetFont('Arial','BU',14);
	$pdf->Cell(0,6,utf8_decode('Pulmonar:'),0,1,'L');
	$pdf->SetFont('Arial','',14);
	$pdf->Multicell(0,6,' '.utf8_decode($pulmonar).' ',0,'J');
	$pdf-> Ln(4);
}

//Abdomen
$abdomen =$row3['Abdomen'];
if ($abdomen != '') {
	$pdf->SetFont('Arial','BU',14);
	$pdf->Cell(0,6,utf8_decode('Abdomen:'),0,1,'L');
	$pdf->SetFont('Arial','',14);
	$pdf->Multicell(0,6,' '.utf8_decode($abdomen).' ',0,'J');
	$pdf-> Ln(4);
}

//Columna
$columna = $row3['Columna'];
if ($columna != '') {
	$pdf->SetFont('Arial','BU',14);
	$pdf->Cell(0,6,utf8_decode('Columna, Torax Post y Regiones Lumbares:'),0,1,'L');
	$pdf->SetFont('Arial','',14);
	$pdf->Multicell(0,6,' '.utf8_decode($columna).' ',0,'J');
	$pdf-> Ln(4);
}

//Extremidades
$extremidades = $row3['Extremidades'];
if ($extremidades != '') {
	$pdf->SetFont('Arial','BU',14);
	$pdf->Cell(0,6,utf8_decode('Extremidades:'),0,1,'L');
	$pdf->SetFont('Arial','',14);
	$pdf->Multicell(0,6,' '.utf8_decode($extremidades).' ',0,'J');
	$pdf-> Ln(4);
}

//Circ. Periferica
$circ = '';
if ($row3['CircPer_Normal']== 1) {
	$circ .= 'Pulsos normales. ';
}
if ($row3['CircPer_Varices']== 1) {
	$circ .= 'Várices. ';
}
$circ = $row3['CircPer_Otros'];

if ($circ != '') {
	$pdf->SetFont('Arial','BU',14);
	$pdf->Cell(0,6,utf8_decode('Circulación Periférica:'),0,1,'L');
	$pdf->SetFont('Arial','',14);
	$pdf->Multicell(0,6,' '.utf8_decode($circ).' ',0,'J');
	$pdf-> Ln(4);
}


$pdf-> Ln(8);
$pdf->SetFont('Arial','BU',14);
$pdf->Cell(0,6,utf8_decode('Conclusiones y Recomendaciones:'),0,1,'L');
$pdf->SetFont('Arial','',14);
$pdf->Multicell(0,6,utf8_decode($row3['Conclusiones']),0,'J');

$pdf-> Ln(8);
$pdf->SetFont('Arial','BU',14);
$pdf->Cell(0,6,utf8_decode('Plan:'),0,1,'L');
$pdf->SetFont('Arial','',14);
$pdf->Multicell(0,6,utf8_decode($_POST['plan']),0,'J');

$pdf-> Ln(30);
$pdf->MultiCell(0,6, utf8_decode($_POST['dres']),0,'C');

$filename=$Nombre.$Apellido.'_InformeEmpresa.pdf';
// It will be called downloaded.pdf
//header('Content-Disposition: attachment; filename="informeEmpleado.pdf"');

//readfile($pdf);
// The PDF source is in original.pdf
$pdf->Output($filename,"I");
//$pdf->Output();

?>