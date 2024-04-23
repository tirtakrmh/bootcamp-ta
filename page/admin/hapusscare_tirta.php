<?php
include"../../conn.php";
$bk=$_GET['id'];
mysqli_query($conn,"DELETE FROM scare WHERE id_scare='$bk'");
header("location:index.php?page=scare_tirta");
 ?>