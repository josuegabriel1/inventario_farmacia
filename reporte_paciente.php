<?php

require_once("fpdf.php");

class PDF extends FPDF
{

  /*function Header()
  {
    // $this->Ln(20);

    $this->Image('tema/images/logo4.JPG', 10, 5, 50 , 22);
    $this->SetFont('Arial','B',15);
    $this->Cell(38);
    $this->Cell(120,10,'Lacteos Hernandez',0,0,'C');
    $this->SetFont('Arial','', 8);
    $this->SetXY(180,9);
    $FECHA =date("d-m-Y");
    $this->Cell(15, 10, 'Fecha: '.$FECHA, 0, 'L');
    $this->Line(180, 16, 206, 16);
    $this->Ln('9');
    $this->SetFont('Arial','',10);
    $this->Cell(38);
    $this->Cell(120,10,'Reporte de Categorias Materia Prima',0,0,'C');
    $this->Ln(20);


    $this->SetTitle("Categorias Materia Prima");
    $this->SetLeftMargin(45);
    $this->SetRightMargin(20);

    $this->SetFillColor(200,200,200);
    $this->SetFont('Arial', 'B', 9);
    $this->Cell(15,7,'#','TBL',0,'C','2');
    $this->Cell(70,7,'Nombre','TBRL',0,'C','2');

    //$this->Cell(60,7,'Correo','TBRL',0,'C','2');
  //    $this->Cell(45,7,'Contacto','TBRL',0,'C','2');
    //$this->Cell(40,7,'Direccion','TBRL',0,'C','2');
    $this->Ln(7);


  }*/

  //Pie de página
  function Footer()
  {

    $this->SetY(-7);

    $this->SetFont('Arial','I',16);

    $this->Cell(0,4,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
  }
}



$pdf = new Pdf();
// Agregamos una página
$pdf->AddPage('P', 'letter');
// Define el alias para el número de página que se imprimirá en el pie
$pdf->AliasNbPages();
$pdf->SetFont('Arial','I',9);

$con=mysqli_connect("localhost", "root", "","inventario_farmacia") or die ('Error en la conexion');
$sql="SELECT cat_clientes.* FROM cat_clientes where id='".$_POST['id_pacientee']."'";
$resultado=mysqli_query($con,$sql) or die ('Error en el query database');

$pdf->SetFont('Arial','B',15);

$pdf->Cell(200,5,utf8_decode("Reporte de paciente"),'',0,'C',0);
$pdf->SetFont('Arial','I',14);
$pdf->Ln(10);


if( mysqli_num_rows( $resultado ) > 0){
 while($fila = mysqli_fetch_array( $resultado ) ){

  //  $this->pdf->Cell(0,5,utf8_decode(''),'',0,'L',0);
    //$this->pdf->Cell(7,5,utf8_decode($item->id),'BLR',0,'L',0);
    $pdf->Cell(35,5,utf8_decode("Fecha:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['fecha']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("Hora:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['hora']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("# Expediente:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['num_expediente']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("Nombre:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['nombre']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("Direccion:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['direccion']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("Telefono:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['telefono']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("Responsable:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['responsable']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("Consulta por:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['consulta_por']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("Antecedentes:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['antecedestes']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("T/A:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['ta']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("FC:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['fc']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("T:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['t']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("Spo2:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['spo2']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("HGT:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['hgt']),'',0,'L',0);
    $pdf->Ln(8);

    $pdf->Cell(35,5,utf8_decode("Peso:"),'',0,'L',0);
    $pdf->Cell(70,5,utf8_decode($fila['peso']),'',0,'L',0);
    $pdf->Ln(8);
    $pdf->SetXY(10,140);
    $pdf->Cell(35,5,utf8_decode("Diagnostico:"),'',0,'L',0);
    $pdf->MultiCell(165,5,utf8_decode($fila['diagnostico']),'','L',0);
    $pdf->Ln(4);

    $pdf->Cell(35,5,utf8_decode("Tratamiento:"),'',0,'L',0);
    $pdf->MultiCell(165,5,utf8_decode($fila['tratamiento']),'','L',0);
    $pdf->Ln(8);



  }
}


$nombre="Reportes Categorias Materia Prima ";

//finaliza y muestra en pantalla pdf
$pdf->Output($nombre.date("d-m-Y").".pdf","I");
//}
//$this->pdf->Output("Lista de alumnos.pdf", 'I'); ?>
