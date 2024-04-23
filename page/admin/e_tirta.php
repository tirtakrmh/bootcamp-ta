<?php
include"../../conn.php";
$a=$_POST['id_categories'];
$b=$_POST['categories'];

 mysqli_query($conn,"UPDATE category SET categories='$b' WHERE id_categories='$a'");
 header("location:index.php?page=kategori_tirta");
?>