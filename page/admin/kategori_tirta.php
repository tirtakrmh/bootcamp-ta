<?php
include"../../conn.php";
$no = 1;
$qry_kategori = mysqli_query($conn,"SELECT * from category");
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:slateblue;color:#fff;line-height:60px;font-size:20px; margin-bottom:25px;">
<b>CATEGORY DATA</b>
</div>
<a href="index.php?page=kategori_tirta&aksi=input" class="btn btn-success" style="margin:17px;"><span class="glyphicon glyphicon-plus">ADD CATEGORY</span></a>
<?php
@$aksi = $_GET['aksi'];
if($aksi=="input")
{
	include("inputkat_tirta.php");
}
else if($aksi=="edit")
{
	include("edit_tirta.php");
}
?>
<div class="th">
<table class="table table-bordered" style="margin-top:15px;margin-left:17px; width:96%;">
 
	<th style=" background: #E6E6FA;"><center>No</center></th>
	<th style=" background: #E6E6FA;"><center>Category</center></th>
	<th style=" background: #E6E6FA;"><center>Action</center></th>
	<?php
	 while($data = mysqli_fetch_assoc($qry_kategori)) { ?>
	<tr>
	 <td><?php echo $no++ ?></td>
	 <td><?php echo $data['categories'] ?></td>
	 <td><a href="index.php?page=kategori_tirta&aksi=edit&id=<?php echo $data['id_categories']; ?>"><center>| <span class="glyphicon glyphicon-pencil"></span></a> | | <a href="hapuskat_tirta.php?id=<?php echo $data['id_categories']; ?>"><span class="glyphicon glyphicon-trash"></span> |</center></a></td>
	</tr>
	<?php } ?>
</table>
</div>