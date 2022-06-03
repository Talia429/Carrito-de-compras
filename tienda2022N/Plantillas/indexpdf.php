<?php


class pdf extends FPDF{


    public function header()
    {
    $this->SetFillColor(9, 64, 153 );
     $this->Rect(0,0,220,50, 'F');
     $this->SetY(25);
     $this->SetFont('Arial', 'B', 30);
     $this->SetTextColor(255,255,255);
     $this->Write(5, 'TIENDA VIRTUAL');
     
 
     
     }
     public function footer()
     {
         $this->SetFillColor(9, 64, 153);
         $this->Rect(0,250,220,50, 'F');
         $this->SetY(-20);
         $this->SetFont('Arial', '', 12);
         $this->SetTextColor(255,255,255);
         $this->SetX(120);
        $this->Write(5, 'TIENDA VIRTUAL');
       $this->Ln();
       $this->SetX(120);
         $this->Write(5, 'talia.verdezoto.tiendavirtual.com');
        $this->Ln();
       $this->SetX(120);
        $this->Write(5, '(593)989263184');
     
    }
    
      }
    
 
 
    $fpdf =new pdf('P', 'mm', 'letter', true);
    $fpdf->AddPage('portrait', 'letter');
    $fpdf->SetMargins(10,30,20,20);
     $fpdf->Output();
 
?>