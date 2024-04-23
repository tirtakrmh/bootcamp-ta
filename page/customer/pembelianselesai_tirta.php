<div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:#d74b35;color:#fff;line-height:60px;font-size:20px;">
<b>Pembelian Selesai</b>
</div>
<?php
include"../../conn.php";
$id_buyer = $_SESSION['id_buyer'];
$query_checkout = mysqli_query($conn,"SELECT * from  checkout where id_buyer='$id_buyer'");
$data_checkout = mysqli_fetch_assoc($query_checkout);
?>
<h3><b>Recipient Name:</b></h3>
<table>
	<tr>
		<td><p><b>Name</b></p></td>  	<td>: <?php echo $data_checkout['name']; ?></td>
	</tr>

	<tr>
		<td><p><b>Address</b></p></td>	<td>: <?php echo $data_checkout['address']; ?></td>
	</tr>

	<tr>
		<td><p><b>No Phone</b></p></td>	<td>: <?php echo $data_checkout['no_phone']; ?></td>
	</tr>
</table>
<h3><b>Order Data</b></h3>
<?php
$qry = mysqli_query($conn,"SELECT * from cart where id_buyer='$id_buyer'");
?>
<div class="jumbotron">
<table class="table table-bordered">
	<th>Brand</th><th>Price</th><th>qty</th><th>Total Price</th>
	<?php while($cart=mysqli_fetch_assoc($qry)){?>
		<tr>
		<td><?php
		$q = mysqli_query($conn,"SELECT * from scare where id_scare='$cart[id_scare]'");
		$d = mysqli_fetch_assoc($q);
		$brand = $d['brand']; echo $brand;
		$qbyar = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) as total_bayar from cart where id_buyer='$id_buyer'"));
		$bayar = $qbyar['total_bayar'];
		?>
			
		</td>
		<td><?php echo $cart['price'] ?></td>
		<td><?php echo $cart['qty']?></td>
		<td><?php echo $cart['total_price']?></td>
		</tr>
<?php } ?>
<tr>
	<td colspan="3">Total Price</td><td><?php echo $bayar;  ?></td>
</tr>
<tr>
	<td colspan="3">Shipping Cost (Mi)</td><td>Rp.10,000,00</td>
</tr>
<tr>	
	<td colspan="3">Total Pay</td><td>Rp.<?php $t_bayar=$bayar+10000; echo number_format($t_bayar); ?>,00</td>
</tr>
</table>
<p>Selanjutnya anda harus megirimkan uang yang tertera pada total bayar ke Bank 'Mandiri' <b>No. 15700.7952.1088</b> atas nama <b>TIRTA KARIMAH</b>. Setelah melakukan pembayaran anda bisa mengonfirmasi melalui <b><a href="http://wa.me/+628985346261"> No.WA:(+62) 898.5346.261</a></b>. <a href="index.php" class="btn btn-danger"> SELESAI</a> </p>
</div>