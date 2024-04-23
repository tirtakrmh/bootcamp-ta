<link href="../../css/bootstrap.min.css" rel="stylesheet">
<?php
include"../../conn.php";
$e=$_GET['id'];
$edit=mysqli_query($conn,"SELECT * FROM scare WHERE id_scare='$e'");
$book = mysqli_fetch_assoc($edit);
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
Edit Skincare
</div>
<form action="e_scare_tirta.php" method="post" enctype="multipart/form-data">
 		<input type="hidden" name="id_scare" class="form-control" value =" <?php  echo $book['id_scare'];?>">
 		<b>Skincare Category:</b><select name="category" class="form-control">
 			<?php
 			$d = mysqli_query($conn,"SELECT * from category");
 			while($data = mysqli_fetch_assoc($d)){ ?>;
 			<option> <?php echo $data['categories']; ?> </option>
 			<?php } ?>
 		</select><br>
 		<b>Brand :</b> <input type="text" name="brand" class="form-control" value =" <?php  echo $book['brand'];?>" ><br>
 		<b>Treatment Type :</b><input type="text" name="treatment_type" class="form-control" value =" <?php  echo $book['treatment_type'];?>"><br>
 		<b>Skin Type : </b><input type="text" name="skin_type" class="form-control" value =" <?php  echo $book['skin_type'];?>"><br>
 		<b>Image : </b><input type="file" name="image" class="form-control" value =" <?php  echo $book['image'];?>" ><br>
 		<b>Price : </b><input type="text" name="price" class="form-control" value =" <?php  echo $book['price'];?>" ><br>
 		<b>Stock : </b><input type="text" name="stock" class="form-control" value =" <?php  echo $book['stock'];?>" ><br>
 		<td><input type="submit" class="btn btn-success" value="simpan">
</form>