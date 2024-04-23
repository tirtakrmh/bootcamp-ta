<?php
include"../../conn.php";
session_start();
$id_buyer = $_SESSION['id_buyer'];
$q_aman = mysqli_query($conn,"SELECT * from checkout where id_buyer='$id_buyer'");
$aman = mysqli_num_rows($q_aman);
if($aman==0)

{
$id_scare = $_POST['id_scare'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$total_price = $qty*$price;
$qryscare = mysqli_query($conn,"SELECT * from cart where id_scare='$id_scare'");
$q_stock = mysqli_query($conn,"SELECT * from scare where id_scare='$id_scare'");
$d_stock = mysqli_fetch_assoc($q_stock);
$stock = $d_stock['stock'];
$siso_stock = $stock-$qty;
mysqli_query($conn,"UPDATE scare set stock='$siso_stock' where id_scare='$id_scare'");
$data = mysqli_fetch_assoc($qryscare);
$idcare = $data['id_scare'];
if($id_scare==$idcare)
{
	$q_qty = mysqli_query($conn,"SELECT * from cart where id_scare='$id_scare'");
	$data_qty = mysqli_fetch_assoc($q_qty);
	$qty1 = $data_qty['qty'];
	$qty2 = $qty1 + $qty;
	$tot = $price * $qty2;
mysqli_query($conn,"UPDATE cart set id_buyer='$id_buyer',id_scare='$id_scare',qty='$qty2',price='$price',total_price='$tot' where id_scare='$id_scare'");
header("location:detail_tirta.php?page=cart");
}

else{
mysqli_query($conn,"INSERT into cart set id_buyer='$id_buyer',id_scare='$id_scare',qty='$qty',price='$price',total_price='$total_price'");
header("location:detail_tirta.php?page=cart");
}
}
else if($aman>=1)
{
	header("location:index.php?pesan=blok");
}
?>