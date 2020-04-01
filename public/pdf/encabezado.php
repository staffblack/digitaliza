<?php
require 'fpdf/fpdf.php';


class PDF extends FPDF
{
    
    function Header() 
    {
        $this->Image('banner.jpg' , 10 ,10, 20 , 15,'JPG');
        $this->SetFillColor(230,230,230);
        $this->SetFont('Arial', 'B', '8');
        $this->Cell(180,6, '',0,1,'c',0);
        $this->Cell(180,6, '',0,1,'c',0);
        $this->Ln(8);
     
        
    }
    
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I', 10);
        $this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'c');
    }
    
    
}

?>