<?php
include_once 'sql_statement_all_PDF.php';
include_once '../../lib/php/public_function.php';
require_once("../../mpdf/mpdf.php");
  ob_start();
  $stylesheet = "table{font-size: 16pt;} .txtC{text-align: center;} div.edge{width: 275px;}div.test{font-size:16pt;padding-left: 20px;padding-right: 20px;border-style: solid;border-width: 2px;}";
?>
<h1 align="center">Statement</h1>
<div class="edge">
	<div class="test">
	<?php foreach ($data2 as $key => $v) {
	?>
		<label>ชื่อ-นามสกุล : <?=$v['fname'] ?> <?=$v['lname'] ?></label><br/>
		<label>ที่อยู่ : <?=$v['address'] ?></label><br/>
		<label>เบอร์โทรศัพท์ : <?=$v['phone'] ?></label><br/>
	<?php
	} ?>

	</div>
</div><br>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<th>ประจำเดือน</th>
		<th>เงินเดือน</th>
		<th>หักภาษี 7%</th>
		<th>รวมสุทธิ</th>
	</tr>
	<?php foreach ($data1 as $key => $v) {
	?>
	<tr>
		<td class="txtC"><?=date_thai(revert_date($v['created_at']))?></td>
		<td class="txtC"><?=number_format($v['salary'])?></td>
		<td class="txtC"><?=number_format($v['vat'])?></td>
		<td class="txtC"><?=number_format($v['salary']+$v['vat'])?></td>
	</tr>
	<?php
	} ?>
</table>
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
?>