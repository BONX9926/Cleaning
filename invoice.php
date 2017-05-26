<?php
// session_start();
include_once 'sql_pdf.php';
  require_once("mpdf/mpdf.php");
  $status = ($data['status_id'] == "true") ? "ชำระเงินเรียบร้อย" : "รอการชำระเงิน";
  ob_start();
  $stylesheet = ".txtCenter{ text-align:center; } img {width: 177px;height: 80px;}";
?>
<h1 align='center'><img src='image/clean-home-logo-design.jpg'/></h1>
<table border='0' cellpadding='0' cellspacing='0' width='90%' align='center'>
	<tr>
		<td>ที่อยู่เจ้าของบ้าน</td>
		<td width="30%"></td>
		<td>เลขที่บิล : <strong><?=$_GET['num']?></strong></td>
	</tr>
	<tr>
		<td>ชื่อ : <?=$_SESSION['fname']." ".$_SESSION['lname']?></td>
		<td></td>
		<td>ชำระภายใน: <?=date_thai(revert_date($data['created_at']))?></td>
	</tr>
	<tr>
		<td>ที่อยู่ : <?=$_SESSION['address']?></td>
		<td></td>

		<td>สถานะ : <?=$status?></td>
	</tr>	

	<tr>
		<td>เบอร์โทร: <?=$_SESSION['phone']?></td>
		<td></td>
		<td></td>
	</tr>
</table>
<br><br>
<table border='1' cellpadding='5' cellspacing='0' width='90%' align='center'>
	<tr>
		<td class='txtCenter'>รายการ</td>
		<td class='txtCenter'>รายละเอียด</td>
		<td class='txtCenter'>ราคา(บาท)</td>
		<td class='txtCenter'>จำนวน</td>
		<td class='txtCenter'>ราคารวม</td>
	</tr>
	<?php if(isset($arr_Nmaid)) { ?>
		<tr>
			<td>แม่บ้าน</td>
			<td class="hidden-phone">
				<?php 
				foreach ($arr_Nmaid as $key => $value) {
					$arrayName[] = implode(' ',$value);
					
				} 
				echo implode(",", $arrayName);
				?>
			</td> 
			<td class="">300</td>
			<td class=""><?php echo count($arrayName);?></td>
			<td><?php echo $maid_price = 300*count($arrayName);?></td>
		</tr>
	<?php } ?>
	<?php if(isset($arr_size)) { ?>
		<tr>
			<td>พื่นที่</td>
			<td class="hidden-phone"><?=$arr_size['size_name']; ?></td>
			<td class=""><?=$data['price_area']; ?></td>
			<td class=""><?=count($data['price_area']);?></td>
			<td><?php echo $arr_size_price = $data['price_area']*1; ?></td>
		</tr>
	<?php } ?>	
	<?php if(isset($arr_room_name)) { ?>
		<tr>
			<td>ประเภทห้อง</td>
			<td class="hidden-phone">
			<?php 
				foreach ($arr_room_name as $key => $value) {
					$arr_room[] = $value['room_name'];
				}
				echo implode(",", $arr_room);
			?>
			</td>
			<td class="">
			<?php 
				foreach ($arr_room_name as $key => $value) {
					$arr_room_price[] = $value['room_price'];
				}
				echo implode(",", $arr_room_price);
			?>
			</td>
			<td class=""><?=count($arr_room_name);?></td>
			<td><?php echo $room_price = array_sum($arr_room_price); ?></td>
		</tr>
	<?php } ?>
	<?php if(isset($arr_item)) { ?>
	<tr>
		<td>อุปกรณ์</td>
		<td class="hidden-phone">
		<?php 
			foreach ($arr_item as $key => $value) {
				// foreach ($value as $key => $v) {
					$arr_name[] =  $value['item_name'];
				// }
			}
			echo implode(',', $arr_name);
			// var_dump($v);
		?>
		</td>
		<td class="">
		<?php 
			foreach ($arr_item as $key => $value) {
				// foreach ($value as $key => $v) {
					$arr_price[] =  $value['item_price'];
				// }
			}
			echo implode(",", $arr_price);
			// var_dump($v);
		?>
		</td>
		<td class=""><?php echo count($arr_price); ?></td>
		<td><?php echo $item_price = array_sum($arr_price); ?></td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan='4' align='center'>รวมทั้งหมด</td>
		<td>
		<?php 
		// $maid_price
		// $arr_size_price
		// $room_price
		// $item_price
			if (isset($arr_Nmaid) && isset($arr_size) && isset($arr_room_name) && isset($arr_item) ) {
				$total = $maid_price+$arr_size_price+$room_price+$item_price;
				echo number_format($total);
			} else if (isset($arr_Nmaid) && isset($arr_size) && isset($arr_room_name)) {
				$total = $maid_price+$arr_size_price+$room_price;
				echo number_format($total);
			}
		?> บาท
		</td>
	</tr>
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