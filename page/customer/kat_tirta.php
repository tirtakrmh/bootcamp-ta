<?php
include"../../conn.php";
$kat = mysqli_query($conn,"SELECT * from category");
while($get_data=mysqli_fetch_assoc($kat)){

	?><li style=""><a href="index.php?page=detail&id=<?=$get_data['id_categories']?>">
		<?php echo $get_data['categories']?>
	</a></li>
	<?php
	}
?>
