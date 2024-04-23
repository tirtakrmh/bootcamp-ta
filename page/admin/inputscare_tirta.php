<?php
include"../../conn.php";
$qry_category = mysqli_query($conn,"SELECT * from category");

	?>
	<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:Slateblue;color:#fff;line-height:60px;font-size:20px;">
ADD SKINCARE
</div>
<form method="post" class="form-group" action="tambahscare_tirta.php" enctype="multipart/form-data" style="margin-top:20px;">
	<select name="kat" class="form-control">
	<?php 
	while($category=mysqli_fetch_assoc($qry_category)){
	?>
			<option><?php echo $category['categories']; ?></option>
			<?php } ?>
	</select><br>
	<input type="text" name="brand" placeholder="Brand" class="form-control"><br>
	<input type="text" name="treatment_type" placeholder="Treatment Type" class="form-control"><br>
	<input type="text" name="skin_type" placeholder="Skin Type" class="form-control"><br>
	<input type="file" name="image" placeholder="Image" class="form-control"><br>
	<input type="text" name="price" placeholder="Price" class="form-control"><br>
	<input type="text" name="stock" placeholder="Stock" class="form-control"><br>
	<input type="submit" name="simpan" value="simpan" class="btn btn-success"><br>
	</form>