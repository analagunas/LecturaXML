<?php

require_once "../dompdf/dompdf_config.inc.php";

$dompdf = dirname(dirname($_SERVER["PHP_SELF"]));

if($dompdf == '/' || $dompdf == '\\'){
  $dompdf = '';
}

$dompdf .= "/dompdf.php?base_path=". rawurlencode("www/test/");

include "head.inc";

 ?>
 <script type="text/javascript">

 function resizePreview(){
   var preview = $("#preview");
   preview.height($(window).height() - preview.offset().top -2);
 }

 function getPath(hash){
   var file, type;
   var parts = hash.split(/,/);

   file = parts[0];

   if(parts.length == 2){
     type = parts[1];
   }

   switch(type){
     default:
     case "html":
      return "test"+file;
    case "pdf":
      return "<?php echo $dompdf; ?> &options[Attachment] =0&input_file="+file+"#toolbar=0&view=FitH&statusbar=0&messages=0&navpanes=0";
   }
 }

 function setHash(hash){
   location.hah = "#"+hash;
 }

 $(function(){
   var preview = $("#preview");
   resizePreview();

   $(window).scroll(function(){
     var scrollTop = Math.min($(this).scrollTop(), preview.height()+preview.parent().offset().top) -2;
     preview.css("margin-top", scrollTop  + "px" );
   });

   $(window).resize(resizePreview);

   var hash = location.hash;
   var type = "html";
   if(hash){
     hash = hash.substr(1);
     preview.attr("src", getPath(hash));
   }
 });
 </script>

<iframe id="preview" name="preview" src="about:blank" frameborder="0" marginheight="0" marginwidth="0"></iframe>

<a name="samples"></a>
<h2>Samples</h2>
<p> Hola </p>

<?php
$extensions = array()
?>
