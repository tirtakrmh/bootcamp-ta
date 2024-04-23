<?php
include"../../conn.php";
$id_buyer = $_SESSION['id_buyer'];
$qry = mysqli_query($conn,"SELECT * from cart where id_buyer='$id_buyer'");
@$aksi = $_GET['aksi'];
if($aksi=="hapus"){
	$id_cart = $_GET['id'];
	$query_qty = mysqli_query($conn,"SELECT * from cart where id_shopcart='$id_shopcart'");
	$data_qty = mysqli_fetch_assoc($query_qty);
	$qty = $data_qty['qty'];
	$id_scare = $data_qty['id_scare'];
	$query_scare = mysqli_query($conn,"SELECT * from scare where id_scare='$id_scare'");
	$data_scare = mysqli_fetch_assoc($query_scare);
	$stock = $data_scare['stock'];
	$stock_ubah = $stock+$qty;
	mysqli_query($conn,"UPDATE scare set stock='$stock_ubah' where id_scare='$id_scare'");
	mysqli_query($conn,"DELETE from cart where id_shopcart='$id_shopcart'");
	header("location:detail_tirta.php?page=cart");
}
?>
<div class="jumbotron">
<table class="table table-bordered">
	<th>Brand</th><th>Price</th><th>QTY</th><th>Total Price</th><th>Action</th>
	<?php while($cart=mysqli_fetch_assoc($qry)){?>
		<tr>
		<td><?php
		$q = mysqli_query($conn,"SELECT * from scare where id_scare='$cart[id_scare]'");
		$d = mysqli_fetch_assoc($q);
		$brand = $d['brand']; echo $brand;
		$qbyar = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) as total_bayar from cart where id_buyer='$id_buyer'"));
		$bayar = $qbyar['total_bayar'];
		?></td>
		<td><?php echo $cart['price'] ?></td>
		<td><?php echo $cart['qty']?></td>
		<td><?php echo $cart['total_price']?></td>
		<td><a href="keranjang_tirta.php?aksi=hapus&id=<?php echo $cart['id_shopcart']; ?>"><center><span class="glyphicon glyphicon-remove"></span></a>
		</tr>
<?php } ?>
<tr>
	<td colspan="3"><b>Total Pay</b></td><td><?php echo @$bayar; ?></td>
	<td><center><a href="detail_tirta.php?aksi=checkout" class="btn btn-info" style="background-color: slateblue; border-color: slateblue;">CHECKOUT</a></center></td>

</tr>
</table>
</div>