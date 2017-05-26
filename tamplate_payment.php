<?php
	require_once("mpdf/mpdf.php");
	ob_start();
  	$stylesheet = ".txtCenter{ text-align:center; } .txtLeft{ text-align:left; }";
?>
<table border="0" cellpadding="5" cellspacing="0" width="80%">
	<tr>
		<th width="30%" rowspan="3"><img src="image/logo_ex.jpg"></th>
		<th width="40%" class="txtCenter"><h1>PAYSLIP</h1></th>
		<!-- <th width="30%"></th> -->
	</tr>
	<tr>
		<!-- <td>zz</td> -->
		<td class="txtCenter"><h2>บริษัท ดีพอแม็กซ์ จำกัด</h2></td>
	</tr>	
	<tr>
		<!-- <td>zz</td> -->
		<td class="txtCenter"><h2>DEEPOMAX CO.,LTD</h2></td>
	</tr>
</table>
<br>
<table border="1" cellpadding="5" cellspacing="0" width="80%">
	<tr>
		<td>รายได้</td>
		<td>จำนวน</td>
		<td>จำนวนเงิน</td>
		<td>รายการหัก</td>
		<td>จำนวนเงิน</td>
	</tr>
	<tr>
		<td>เงินเดือน</td>
		<td>23.00</td>
		<td>5,000</td>
		<td>อุปกรณ์เสียหาย</td>
		<td>500.00</td>
	</tr>	
	<tr>
		<td>รายได้</td>
		<td>จำนวน</td>
		<td>จำนวนเงิน</td>
		<td>รายการหัก</td>
		<td>จำนวนเงิน</td>
	</tr>
	<tr>
		<td colspan="2">รวมเงินได้</td>
		<td>7,000.00</td>
		<td>รวมเงินหัก</td>
		<td>550.00</td>
	</tr>
</table>
<br>
<table border="1" cellpadding="5" cellspacing="0" width="80%">
	<tr>
		<td>รายได้สะสมต่อปี</td>
		<td>ภาษีสะสมต่อปี</td>
		<td>เงินประกันสังคมต่อปี</td>
		<td>เงินสะสมกองทุนต่อปี</td>
		<td>ค่าลดหย่อนอื่นๆ</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>
<!-- <table border="1" cellpadding="5" cellspacing="0" width="20%">
	<tr>
		<td>aaaaa</td>
	</tr>
</table> -->
<?php
  $html = ob_get_contents();
  ob_end_clean();
	//new mPDF($mode, $format, $font_size, $font, $margin_left, $margin_right, $margin_top, $margin_bottom, $margin_header, $margin_footer, $orientation);
	$mpdf=new mPdf('th', 'A4', '0', 'th_sarabunnew', 10, 10,20, 20);
	// $mpdf->SetAutoFont();
	$mpdf->SetDisplayMode('fullpage');
	// $mpdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">{PAGENO}/{nbpg}<div style="text-align: right; font-weight: bold;">', 'O',true);
	// $mpdf->setHTMLFooter('<hr style="margin-bottom: -3;" /><table style="width:100%;"><tr><td valign="top" align="left"><div>'.$organization_name.'</div><div>'.$university_name.'</div></td><td valign="top" align="right">GENERATED: '.date("d/m/Y H:i:s").'</td></tr></table>','0',true);
	$mpdf->WriteHTML($stylesheet, 1);
	$mpdf->WriteHTML($html, 2);
	$mpdf->Output('text.pdf', 'I');