<?php
// var_dump($_POST);exit();
if($_POST){
$name = $_POST['avatar']['name'];
$tmp = $_POST['avatar']['tmp_name'];
// $path = "images/".basename(name);
// print $name;
// if(move_uploaded_file($tmp,$path)){
//         print("Done! File saved...");
// }else{
//         print("Error on uploading!");
// }
}
?>