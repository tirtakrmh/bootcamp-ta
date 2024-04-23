<?php
include"../../conn.php";
$id = $_GET['id'];
mysqli_query($conn,"UPDATE checkout set status_accept='sudah diterima' where id_buyer='$id'");
header("location:index.php?pesan=suwon");
?>