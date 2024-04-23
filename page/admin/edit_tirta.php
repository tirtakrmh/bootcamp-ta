<?php
include"../../conn.php";
$a=$_GET['id'];
$kat=mysqli_query($conn,"SELECT * FROM category WHERE id_categories='$a'");
$bo = mysqli_fetch_assoc($kat);
?>
<form action="e_tirta.php" method="post">
		<div class="col-md-8" style="margin-bottom:20px;">
 		<b>Category Name</b>
 		<input type="hidden" name="id_categories" value =" <?php  echo $bo['id_categories'];?> ">
 		<input type="text" name="categories" value ="<?php  echo $bo['categories'];?>" style="width:600px;" class="form-control">
 		</div>
 		<div class="col-md-1" style="margin-top:20px">
	<input type="submit" name="simpan" value="simpan" class="btn btn-success">
	</div>
</form>