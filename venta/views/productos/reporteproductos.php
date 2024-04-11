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
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,25,'Reporte de Productos - Activo/Inactivo',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    
    $this->Cell(30,10,'Id Producto',1,0,'C',0);
	$this->Cell(40,10,'Barcode',1,0,'C',0);
    $this->Cell(50,10,'Nombre',1,0,'C',0);
    $this->Cell(30,10,'Precio',1,0,'C',0);
    $this->Cell(20,10,'Stock',1,0,'C',0);
    $this->Cell(15,10,'Estado',1,1,'C',0);
   
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

$consulta = "SELECT codproducto,codigo,descripcion,precio,existencia,status FROM producto";
$resultado = mysqli_query($conexion, $consulta);
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(30,10,$row['codproducto'],1,0,'C',0);
    $pdf->Cell(40,10,$row['codigo'],1,0,'C',0);
    $pdf->Cell(50,10,$row['descripcion'],1,0,'C',0);
    $pdf->Cell(30,10,$row['precio'],1,0,'C',0);
    $pdf->Cell(20,10,$row['existencia'],1,0,'C',0);
    $pdf->Cell(15,10,$row['status'],1,1,'C',0);
} 

$pdf->Output();
?>