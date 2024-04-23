<?php
include"../../conn.php";
$bk=$_GET['id'];
mysqli_query($conn,"DELETE FROM category WHERE id_categories='$bk'");
header("location:index.php?page=kategori_tirta");
 ?>