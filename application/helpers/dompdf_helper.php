<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($html, $filename='', $paper, $orientation, $stream=TRUE) 
{
    // require_once("dompdf/dompdf_config.inc.php");
    include_once APPPATH.'helpers/dompdf/dompdf_config.inc.php';

    $dompdf = new DOMPDF();
    if($paper=="custom" && $orientation==false){
        $customPaper = array(0,0,595.28,453.55);
        $dompdf->set_paper($customPaper);
    }
    else{
        $dompdf->set_paper($paper,$orientation);
    }
    
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        $dompdf->stream($filename.".pdf",array('Attachment'=>0));
    }
}
?>