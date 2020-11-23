<?php

function pdf_create($html, $filename = '', $stream= TRUE, $invoice_id, $type)
{
  require_once "./vendor/autoload.php";
  if(get_magic_quotes_gpc()){
    $html_para_pdf = stripslashes($html_para_pdf);
  }

  $dompdf = new DOMPDF();
  $dompdf->load_html($html_para_pdf);
  $dompdf->set_paper('envelope','portrait');
  $dompdf->render();

  $timestamp = date('YmdGis'). $invoice_id;
  $filehtml = $timestamp . '.pdf';
  if($stream){
    $dompdf-> stream($filehtml);
  }else {
    if($type == 'invoice'){
      $CI =& get_instance();
      $CI->load-helper('file');
      write_file("invoice/" . $filename, $dompdf->output());
      return $filehtml;
    } else {
      if($type == 'salary'){
        $CI=
      }
    }
  }

}




 ?>
