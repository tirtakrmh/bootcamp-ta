<?php
include"conn.php";
$kat = mysqli_query($conn,"SELECT * from category");
while($data_kat = mysqli_fetch_assoc($kat)){
?>
<li><a href="index.php?id=<?php echo $data_kat['id_categories'] ?>"><?php echo $data_kat['categories']; ?></a></li>
<?php } ?>