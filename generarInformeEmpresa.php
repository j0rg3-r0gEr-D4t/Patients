<?
include('Config.php');
$cxn = mysqli_connect($host,$user,$password,$dbname) or die('Query died: connect'.mysqli_error($cxn));
$sql = "SELECT CI, Nombre, Apellido, Edad FROM pacientes WHERE CI='$_GET[ci]'";
$result = mysqli_query($cxn,$sql) or die('Query died: Info Paciente'.mysqli_error($cxn));
$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
extract($row);
$sql2 = "SELECT Condicion FROM pacientes_datos_fisicos WHERE CI='$_GET[ci]'";
$result2 = mysqli_query($cxn,$sql2) or die('Query died: Info Paciente'.mysqli_error($cxn));
$num2 = mysqli_num_rows($result2);
$row2 = mysqli_fetch_assoc($result2);
extract($row2);
mysqli_close($cxn);

$tipo=$_POST['informe'];
if ($Condicion==0) {$c='NO APTO';}
else if ($Condicion==1) {$c='APTO';}
else if ($Condicion==2) {$c='APTO CON LIMITACIONES';}

require('fpdf.php');

class PDF extends FPDF
{
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,utf8_decode('Av. Fco de Miranda. Pasaje Galerías Venecia, Local 11. Chacao-Caracas-Venezuela. Teléfonos: 0212-2669622. Visite nuestra página web: www.vem.com.ve'),0,0,'C');
}
}

if ($tipo == 0) {

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('vemLogo.png',67,10,80,0);
$pdf->setY(40);
$pdf->Cell(0,20,'INFORME MEDICO',0,1,'C');
$pdf->Cell(0,1,$_POST['element_4_1'].'/'.$_POST['element_4_2'].'/'.$_POST['element_4_3'],0,1,'R');
$pdf->SetFont('Arial','B',14);
$pdf->setY(70);
$pdf->Cell(0,10,utf8_decode('Señores: '.$_POST['dirigido']),0,1,'L');
$pdf->Cell(0,10,'Presente.-',0,1,'L');
$text = 'Según resultados de Evaluación Médica Integral, Estudios de Laboratorio (Hematología Completa, Glicemia, Urea Sanguínea, Creatinina, Colesterol, Triglicéridos, Orina, VDRL) y ORL, practicados al trabajador: '.$Nombre.' '.$Apellido.', C.I '.$CI.', de '.$Edad.' años de edad, se encuentra '.$c.' para aspirar al cargo de: '.$_POST['cargo1'].'';
$pdf-> Ln(10);
$pdf->SetFont('Arial','',14);
$pdf->MultiCell(0,6, utf8_decode($text),0,'J');
$pdf-> Ln(10);
$sugerencias = 'Atentamente,';
$pdf->MultiCell(0,6, utf8_decode($sugerencias),0,'J');
$pdf-> Ln(30);
$pdf->MultiCell(0,6, utf8_decode($_POST['dres']),0,'C');
$pdf->Image($_POST['doc1'].'firma.jpg',67,160,40,0);
$filename=$Nombre.$Apellido.'_InformeEmpresa.pdf';
$pdf->Close();
$pdf->Output($filename,'I');

} else if ($tipo == 1) {

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('vemLogo.png',67,10,80,0);
$pdf->setY(40);
$pdf->Cell(0,20,'INFORME MEDICO',0,1,'C');
$pdf->Cell(0,1,$_POST['element_4_1'].'/'.$_POST['element_4_2'].'/'.$_POST['element_4_3'],0,1,'R');
$pdf->SetFont('Arial','B',14);
$pdf->setY(70);
$pdf->Cell(0,10,utf8_decode('Señores: '.$_POST['dirigido']),0,1,'L');
$pdf->Cell(0,10,'Presente.-',0,1,'L');
$text = 'Según resultados de Evaluación Médica Integral, practicados al trabajador: '.$Nombre.' '.$Apellido.', C.I '.$CI.', de '.$Edad.' años de edad, se encuentra '.$c.' para el periodo Vacacional.';
$pdf-> Ln(10);
$pdf->SetFont('Arial','',14);
$pdf->MultiCell(0,6, utf8_decode($text),0,'J');
$pdf-> Ln(10);
$sugerencias = 'Sugerencias: '.$_POST['sugerencias'];
$pdf->MultiCell(0,6, utf8_decode($sugerencias),0,'J');
$pdf-> Ln(30);
$pdf->MultiCell(0,6, utf8_decode($_POST['dres']),0,'C');
$pdf->Image($_POST['doc1'].'firma.jpg',67,160,40,0);
$filename=$Nombre.$Apellido.'_InformeEmpresa.pdf';
$pdf->Close();
$pdf->Output($filename,'I');

} else if ($tipo == 2) {

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('vemLogo.png',67,10,80,0);
$pdf->setY(40);
$pdf->Cell(0,20,'INFORME MEDICO',0,1,'C');
$pdf->Cell(0,1,$_POST['element_4_1'].'/'.$_POST['element_4_2'].'/'.$_POST['element_4_3'],0,1,'R');
$pdf->SetFont('Arial','B',14);
$pdf->setY(70);
$pdf->Cell(0,10,utf8_decode('Señores: '.$_POST['dirigido']),0,1,'L');
$pdf->Cell(0,10,'Presente.-',0,1,'L');
$text = 'Según resultados de Evaluación Médica Integral, practicados al trabajador: '.$Nombre.' '.$Apellido.', C.I '.$CI.', de '.$Edad.' años de edad, se encuentra '.$c.' para el reintegro a la actividad laboral que desempeña.';
$pdf-> Ln(10);
$pdf->SetFont('Arial','',14);
$pdf->MultiCell(0,6, utf8_decode($text),0,'J');
$pdf-> Ln(10);
$sugerencias = 'Sugerencias: '.$_POST['sugerencias'];
$pdf->MultiCell(0,6, utf8_decode($sugerencias),0,'J');
$pdf-> Ln(30);
$pdf->MultiCell(0,6, utf8_decode($_POST['dres']),0,'C');
$pdf->Image($_POST['doc1'].'firma.jpg',67,160,40,0);
$filename=$Nombre.$Apellido.'_InformeEmpresa.pdf';
$pdf->Close();
$pdf->Output($filename,'I');

} else if ($tipo == 3) {

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('vemLogo.png',67,10,80,0);
$pdf->setY(40);
$pdf->Cell(0,20,'INFORME MEDICO',0,1,'C');
$pdf->Cell(0,1,$_POST['element_4_1'].'/'.$_POST['element_4_2'].'/'.$_POST['element_4_3'],0,1,'R');
$pdf->SetFont('Arial','B',14);
$pdf->setY(70);
$pdf->Cell(0,10,utf8_decode('Señores: '.$_POST['dirigido']),0,1,'L');
$pdf->Cell(0,10,'Presente.-',0,1,'L');
$text = 'Según resultados de Evaluación Médica Integral, practicado al trabajador: '.$Nombre.' '.$Apellido.', C.I '.$CI.', de '.$Edad.' años de edad, se encuentra '.$c.' para su egreso.';
$pdf-> Ln(10);
$pdf->SetFont('Arial','',14);
$pdf->MultiCell(0,6, utf8_decode($text),0,'J');
$pdf-> Ln(30);
$pdf->MultiCell(0,6, utf8_decode($_POST['dres']),0,'C');
$pdf->Image($_POST['doc1'].'firma.jpg',67,150,40,0);
$filename=$Nombre.$Apellido.'_InformeEmpresa.pdf';
$pdf->Close();
$pdf->Output($filename,'I');

}


?>