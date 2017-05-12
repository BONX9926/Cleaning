<?php
  require_once("mpdf/mpdf.php");
  $stylesheet = ".test{ color:red; }";
  $html = "<div class='test' >testxxx</div>";

	//new mPDF($mode, $format, $font_size, $font, $margin_left, $margin_right, $margin_top, $margin_bottom, $margin_header, $margin_footer, $orientation);
	$mpdf=new mPdf('th', 'A4', '0', 'th_sarabunnew', 10, 10,20, 20);
	// $mpdf->SetAutoFont();
	$mpdf->SetDisplayMode('fullpage');
	$mpdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">{PAGENO}/{nbpg}<div style="text-align: right; font-weight: bold;">', 'O',true);
	$mpdf->setHTMLFooter('<hr style="margin-bottom: -3;" /><table style="width:100%;"><tr><td valign="top" align="left"><div>'.$organization_name.'</div><div>'.$university_name.'</div></td><td valign="top" align="right">GENERATED: '.date("d/m/Y H:i:s").'</td></tr></table>','0',true);
	$mpdf->WriteHTML($stylesheet, 1);
	$mpdf->WriteHTML($html, 2);
	$mpdf->Output('test.pdf', 'I');