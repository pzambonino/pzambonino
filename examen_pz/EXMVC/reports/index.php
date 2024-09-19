<?php
require('fpdf/fpdf.php');
require_once("../models/asistente.models.php");

class PDF_Invoice extends FPDF
{
// Header
function Header(): void
{
   //Logo
    $this->Image(file: '../public/imagen/caratula.jpg', x: 10, y: 6, w: 50);
    $this->SetFont(family: 'Arial', style: 'B', size: 21);
    $this->Cell(w: 190, h: 10, txt: 'examen', border: 0, ln: 1, align: 'C');
    $this->SetFont(family: 'Arial', style: '', size: 10);
    $this->Cell(w: 190, h: 6, txt: 'LISTA DE ASISTENTES', border: 0, ln: 1, align: 'C');
    $this->Cell(w: 190, h: 6, txt: 'CONFERENCIAS S.A', border: 0, ln: 1, align: 'C');
    $this->Cell(w: 190, h: 6, txt: 'Telefono: +593 999 999 999', border: 0, ln: 1, align: 'C');
    $this->Cell(w: 190, h: 6, txt: 'Email: info@CONFERENCIAS.com', border: 0, ln: 1, align: 'C');
    $this->Ln(h: 10);
    //$this->Cell(w: 190, h: 6, txt: 'Factura No. 001-001-000000001', border: 0, ln: 1, align: 'R');
    //$this->Cell(w: 190, h: 6, txt: 'Fecha de Emision: ' . date(format: 'd/m/Y'), border: 0, ln: 1, align: 'R');
    //$this->Ln(h: 10);
}

// Footer
function Footer(): void
{
    $this->SetY(y: -30);
    $this->SetFont(family: 'Arial', style: 'I', size: 8);
    $this->Cell(w: 0, h: 10, txt: 'CONFERENCIAS S.A', border: 0, ln: 1, align: 'L');
    //$this->Cell(w: 0, h: 10, txt: '', border: 0, ln: 1, align: 'L');
    $this->Cell(w: 0, h: 10, txt: 'Nota: Gracias por su compra.', border: 0, ln: 1, align: 'L');
}

// Cabecera de la tabla
function ProductTableHeader(): void
{
    $this->SetFont(family: 'Arial', style: 'B', size: 10);
    $this->Cell(w: 20, h: 10, txt: 'N°', border: 1);
    $this->Cell(w: 30, h: 10, txt: 'NOMBRES', border: 1);
    $this->Cell(w: 30, h: 10, txt: 'APELLIDO', border: 1);
    $this->Cell(w: 30, h: 10, txt: 'EMAIL', border: 1);
    $this->Cell(w: 30, h: 10, txt: 'TELEFNONO', border: 1);
    //$this->Cell(w: 35, h: 10, txt: 'Total', border: 1);
    $this->Ln();
}

// Filas de la tabla
function AsistRow($idAsistentes, $nombre, $apellido, $email, $telefono)
{
    //$subtotal = $cantidad * $valor_venta;
    //$iva_value = $subtotal * ($iva / 100);
    //$total = $subtotal + $iva_value;

    $this->SetFont(family: 'Arial', style: '', size: 10);
    $this->Cell(w: 20, h: 10, txt: $idAsistentes, border: 1, ln: 0, align: 'C');
    $this->Cell(w: 30, h: 10, txt: $nombre, border: 1);
    $this->Cell(w: 30, h: 10, txt: $apellido, border: 1, ln: 0, align: 'C');
    $this->Cell(w: 30, h: 10, txt: $email, border: 1, ln: 0, align: 'C');
    $this->Cell(w: 30, h: 10, txt: $telefono, border: 1, ln: 0, align: 'C');
    //$this->Cell(w: 30, h: 10, txt: '$' . number_format(num: $valor_venta, decimals: 2), border: 1, ln: 0, align: 'C');
    //$this->Cell(w: 30, h: 10, txt: '$' . number_format(num: $subtotal, decimals: 2), border: 1, ln: 0, align: 'C');
    //$this->Cell(w: 30, h: 10, txt: '$' . number_format(num: $iva_value, decimals: 2), border: 1, ln: 0, align: 'C');
    //$this->Cell(w: 35, h: 10, txt: '$' . number_format(num: $total, decimals: 2), border: 1, ln: 0, align: 'C');
    $this->Ln();
}

/*
// Subtotal, IVA y Total
function InvoiceTotals($subtotal, $iva, $total): void
{
    $this->Ln(h: 10);
    $this->Cell(w: 155, h: 10, txt: 'Subtotal', border: 1, ln: 0, align: 'R');
    $this->Cell(w: 35, h: 10, txt: '$' . number_format(num: $subtotal, decimals: 2), border: 1, ln: 1, align: 'R');
    $this->Cell(w: 155, h: 10, txt: 'IVA (15%)', border: 1, ln: 0, align: 'R');
    $this->Cell(w: 35, h: 10, txt: '$' . number_format(num: $iva, decimals: 2), border: 1, ln: 1, align: 'R');
    $this->Cell(w: 155, h: 10, txt: 'Total a Pagar', border: 1, ln: 0, align: 'R');
    $this->Cell(w: 35, h: 10, txt: '$' . number_format(num: $total, decimals: 2), border: 1, ln: 1, align: 'R');
}
    */
}

// Crea el PDF
$pdf = new PDF_Invoice();
$pdf->AddPage();

// Información del cliente
$pdf->SetFont(family: 'Arial', style: 'B', size: 10);
$pdf->Cell(w: 100, h: 10, txt: 'Datos del ASISTENTES', border: 0, ln: 1);
$pdf->SetFont(family: 'Arial', style: '', size: 10);
//$pdf->Cell(w: 100, h: 6, txt: 'Nombre: Juan Perez', border: 0, ln: 1);
//$pdf->Cell(w: 100, h: 6, txt: 'Cedula/RUC: 1234567890', border: 0, ln: 1);
//$pdf->Cell(w: 100, h: 6, txt: 'Direccion: Calle Ejemplo 456, Guayaquil, Ecuador', border: 0, ln: 1);
//$pdf->Cell(w: 100, h: 6, txt: 'Telefono: +593 987 654 321', border: 0, ln: 1);
$pdf->Ln(h: 10);

// Encabezado de la tabla de productos
$pdf->ProductTableHeader();

// Obtener productos de la base de datos
$asistentes = new Asistentes();
$listaasistentes = $asistentes->todos();

//$subtotal = 0;
//$iva_total = 0;
//$total = 0;

// Iterar sobre los productos y añadir filas
while ($aistente = mysqli_fetch_assoc(result: $listaasistentes)) {
$idAsistentes = $aistente['idAsistentes'];
$nombre = $aistente['nombre'];
$apellido = $aistente['apellido'];
$email = $aistente['email'];
$telefono = $aistente['telefono']; // Suponiendo un 15% de IVA 

$pdf->AsistRow(idAsistentes:$idAsistentes, nombre:$nombre, apellido:$apellido, email:$email, telefono:$telefono);

//$subtotal += $cantidad * $valor_venta;
//$iva_total += $subtotal * ($iva / 100);
//$total = $subtotal + $iva_total;
}
// Totales
//$pdf->InvoiceTotals(subtotal: $subtotal, iva: $iva_total, total: $total);

// Salida PDF
$pdf->Output();
