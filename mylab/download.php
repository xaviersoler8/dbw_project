<?php
// Show errors
include('php/connection_be.php');

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
ob_start();
require "experiments_out.php";
$html = ob_get_clean("experiments_out.php");
$baseDir = dirname($_SERVER['SCRIPT_FILENAME']);
$file = "$baseDir/experiments_out.php";


$dompdf = new DOMPDF();
$dompdf->load_html( file_get_contents( $html ) );
//REnder the html as pdf
$dompdf->render();
//output the generated pdf to browser
$dompdf->stream("mi_archivo.pdf");

?>