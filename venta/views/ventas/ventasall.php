<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../assets/img/logo.png',20,3,30);
    // Arial bold 15
    $this->SetFont('Arial','B',7);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,25,'Reporte de Usuarios - Activo/Inactivo',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    
    $this->Cell(13,10,'Id Usuario',1,0,'C',0);
	$this->Cell(40,10,'Nombre',1,0,'C',0);
    $this->Cell(45,10,'Correo',1,0,'C',0);
    $this->Cell(85,10,'Clave encriptada',1,0,'C',0);
    $this->Cell(10,10,'Estado',1,1,'C',0);
   
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

require '../../models/conexion.php';

$consulta = "SELECT idusuario,nombre,correo,clave,status FROM usuario";
$resultado = mysqli_query($conexion, $consulta);
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',7);
while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(13,10,$row['idusuario'],1,0,'C',0);
    $pdf->Cell(40,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(45,10,$row['correo'],1,0,'C',0);
    $pdf->Cell(85,10,$row['clave'],1,0,'C',0);
    $pdf->Cell(10,10,$row['status'],1,1,'C',0);
} 

$pdf->Output();
?>