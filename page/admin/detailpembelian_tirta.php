<?php
include "../../conn.php";
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM cart WHERE id_buyer='$id'");
$d_bayar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_price) AS total_bayar FROM cart WHERE id_buyer='$id'"));
$bayar = $d_bayar['total_bayar'];
$total_bayar = $bayar + 10000;
?>
<div style="margin-top:30px;width:100%;height:50px;text-align:center;background:slateblue;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
    <b>PURCHASE DETAILS</b>
</div>
<table class="table table-bordered">
    <th style="background: #E6E6FA;"><center>Brand</center></th>
    <th style="background: #E6E6FA;"><center>Qty</center></th>
    <th style="background: #E6E6FA;"><center>Total Price</center></th>
    <th style="background: #E6E6FA;"><center>Total Pay</center></th>
    <?php while ($c = mysqli_fetch_assoc($q)) { ?>
        <tr>
            <td><center><?php $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM scare WHERE id_scare='$c[id_scare]'")); $nama = $data['brand']; echo $nama; ?></center></td>
            <td><center><?php echo $c['qty']; ?></center></td>
            <td><center><?php echo $c['total_price']; ?></center></td>
            <td><center><?php echo $total_bayar; ?></center></td>
        </tr>
    <?php } ?>
</table>
