<?php
include"../../conn.php";
$no = 1;
$qry_scare = mysqli_query($conn,"SELECT * from scare");
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:slateblue;color:#fff;line-height:60px;font-size:20px;">
<b>SKINCARE DATA</b>
</div>
<a href="index.php?page=inputscare_tirta" class="btn btn-success" style="margin-top:20px;"><span class="glyphicon glyphicon-plus">ADD SKINCARE</span></a>
<?php
@$aksi = $_GET['aksi'];
if($aksi=="input")
{
	include("inputscare_tirta.php");
}
?>
<div class="th">
<table class="table table-bordered" style="margin-top:20px;">
 
	<th style=" background: #E6E6FA;"><center>No</center></th>
	<th style=" background: #E6E6FA;"><center>Brand</center></th>
	<th style=" background: #E6E6FA;"><center>Treatment Type</center></th>
	<th style=" background: #E6E6FA;"><center>Skin Type</center></th>
	<th style=" background: #E6E6FA;"><center>Image</center></th>
	<th style=" background: #E6E6FA;"><center>Price</center></th>
	<th style=" background: #E6E6FA;"><center>Stock</center></th>
	<th style=" background: #E6E6FA;"><center>Action</center></th>
	<?php while($data = mysqli_fetch_assoc($qry_scare)) { ?>
	<tr>
	 <td><?php echo $no++ ?></td>
	 <td><?php echo $data['brand'] ?></td>
	 <td><?php echo $data['treatment_type'] ?></td>
	 <td><?php echo $data['skin_type'] ?></td>
	 <td><center><img src="../../gambar/<?php echo $data['image'] ?>" style="width:100px;"></center></td>
	 <td>Rp.<?php echo number_format($data['price']); ?>,-</td>
	 <td><?php echo $data['stock'] ?></td>
	 <td><a href="index.php?page=editscare_tirta&id=<?php echo $data['id_scare']; ?>"><center>| <span class="glyphicon glyphicon-pencil"></span></a> | | <a href="hapusscare_tirta.php?id=<?php echo $data['id_scare']; ?>"><span class="glyphicon glyphicon-trash"></span> |</center></a></td>
	</tr>
	<?php } ?>
</table>
</div>