<?php 

require('Admin/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->SetFont('Times','B',30);
    $this->Image('img/Productos/logo1.png',0,0,100); //imagen(archivo, png/jpg || x,y,tamaño)
    $this->setXY(60,15);
    $this->Cell(100,8,' Reporte',0,1,'C',0);


    $this->SetFont('Times','',20);
    $this->Cell(182,25,' Oferta especial por esta semana',0,1,'C',0);


    $this->setY(30,15);
    $this->SetFont('Times','',6);
    $this->Cell(332,3,'Correo: tienda789@gmail.com',0,1,'C',0);
    $this->SetFont('Times','',6);
    $this->Cell(325,3,'Telefono:0989568974',0,1,'C',0);
    $this->SetFont('Times','',6);
    $this->Cell(338,3,'Direccio:Avenida Amazonas N35-17',0,1,'C',0);



    $this->Image('img/Productos/TV.png',150,5,50); //imagen(archivo, png/jpg || x,y,tamaño)
    $this->Ln(10);


    $this->Cell(50,30,'Nombre',1,0, 'C',0); 
    $this->Cell(50,30,'Precio',1,0, 'C',0);
    $this->Cell(50,30,'Stock',1,1, 'C',0);        
 
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','B',10);
    // Número de página
    $this->Cell(170,10,'Todos los derechos reservados @',0,0,'C',0);
    $this->Cell(25,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
   
}
}

require('Admin/Conexion/Conexion.php');
$consulta = "select * from productos";
$resultado = $conn-> query ($consulta);




// Creación del objeto de la clase heredada
$pdf = new PDF();//hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage();//añade l apagina / en blanco
$pdf->SetMargins(10,10,10);
$pdf->SetAutoPageBreak(true,20);//salto de pagina automatico

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(50,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(50,10,$row['precio'],1,0,'C',0);
    $pdf->Cell(50,10,$row['stock'],1,1,'C',0);
}








$pdf->SetX(15);

$pdf->SetFont('Helvetica','B',15);



$pdf->SetFillColor(230, 238, 245);//color de fondo rgb
$pdf->SetDrawColor(9, 26, 153 );//color de linea  rgb

$pdf->SetFont('Arial','',12);

// cell(ancho, largo, contenido,borde?, salto de linea?)

$pdf->Output();
?>