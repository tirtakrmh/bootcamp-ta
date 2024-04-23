<?php
include"../../conn.php";
$q = mysqli_query($conn,"SELECT * FROM checkout");
@$act = $_GET['act'];
if($act=="detail")
{
	include("detailpembelian_tirta.php");
}else{
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:slateblue;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
<b>TRANSACTION REPORT</b>
</div>
<table class="table table-bordered">
		<th style=" background: #E6E6FA; "><center>Customer Name</center></th>
 		<th style=" background: #E6E6FA; "><center>Order Date</center></th>
 		<th style=" background: #E6E6FA; "><center>Status Accept</center></th>
 		<th style=" background: #E6E6FA; "><center>Action</center></th>
	<?php while($c=mysqli_fetch_assoc($q)){?>
	<tr>
		<td><center><?php $data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from customer where id_buyer='$c[id_buyer]'"));$nama=$data['name']; echo $nama; ?></center></td>
 		<td><center><?php echo $c['date']; ?></center></td>
 		<td><center><?php echo $c['status_accept']; ?></center></td>
 		<td><center><a href="index.php?page=laporan_tirta&act=detail&id=<?php echo $c['id_buyer']; ?> "><span class="glyphicon glyphicon-eye-open"></span></a> | <a href="konfirmasitransaksi_tirta.php?id=<?php echo $c['id_checkout']; ?>&id_buyer=<?php echo $c['id_buyer']; ?>"><span class="glyphicon glyphicon-check"></span></a></center></td>
	</tr>
	<?php }} ?>
</table>