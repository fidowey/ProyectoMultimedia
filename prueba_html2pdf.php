<?php 
	require './vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;

	$html2pdf = new Html2Pdf('C','A4','es','true','UTF-8');
	$html2pdf->writeHTML('Hola Mundo');
	$html2pdf->output();
?>