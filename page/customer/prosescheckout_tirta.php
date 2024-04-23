<?php
include"../../conn.php";
session_start();
$id_buyer = $_SESSION['id_buyer'];
$nama = $_POST['name'];
$address = $_POST['address'];
$tlp = $_POST['no_phone'];
$date = $_POST['date'];
mysqli_query($conn,"INSERT INTO checkout set id_buyer='$id_buyer',name='$nama',address='$address',no_phone='$tlp',date='$date'");
header("location:carapesan_tirta.php?page=pembelianselesai_tirta");
?>