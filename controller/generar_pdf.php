<?php

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once('registroUsuario.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('CONAF');
$pdf->SetTitle('Reporte CONAF');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// create some HTML content
$html = '<h1>Visitantes registrados</h1>
<h2>Lista</h2>
<ol>
    <li><i>nombre = '.$nombre.'</i></li> 
    <li><i>apellido paterno = '.$appat.'</i></li>  
    <li><i>apellido materno = '.$apmat.'</i></li>
    <li><i>rut = '.$rut.'</i></li>  
	<li><i>direccion = '.$direccion.'</i></li> 
    <li><i>fecha de nacimiento = '.$fechanac.'</i></li> 
	<li><i>sexo = '.$sexo.'</i></li> 
	<li><i>telefono = '.$telefono.'</i></li> 
	<li><i>Email = '.$email.'</i></li> 
</ol>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('regstroVisita.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+