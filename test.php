<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include_once 'connect.php';
$items =array("0"=>"000001","1"=>"000002");
// print_r($items);
$arr_items = array();
foreach ($items as $key => $value) {
	$sql = "";
	$sql = "SELECT `item_price` FROM `items` WHERE `item_id`='{$value}' ";
	if($res = mysqli_query($conn,$sql)) {
		// echo $sql;
		while($row = mysqli_fetch_assoc($res)) {
			// while ($row = mysqli_fetch_assoc($res)) {
				$arr_items[] = $row['item_price'];
			// }
		}
			// var_dump($row);
		// echo "<br/>";
	} else {
		echo "SQL ITEMS ERROR";
	}
}
print_r($arr_items);
echo "<br/>";
foreach ($arr_items as $key => $value) {
	echo $value."<br/>";
}
echo "$arr_items[1]";
?>
</body>
</html>