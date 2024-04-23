<?php
include"../../conn.php";
$kd=$_GET['id'];
$id = $_GET['id_buyer'];
$qry = mysqli_query($conn,"SELECT * from checkout where id_buyer='$id' && status_accept='sudah diterima'");
$a = mysqli_num_rows($qry);
if ($a=="belum diterima") 
{
echo "<script>alert('Customer belum Mengkonfirmasi bahwa Dia sudah menerima barang.'); window.location = 'index.php?page=laporan_tirta'</script>";
}
else{
mysqli_query($conn,"DELETE FROM checkout WHERE id_checkout='$kd'");
mysqli_query($conn,"DELETE FROM cart where id_buyer='$id'");
header("location:index.php?page=laporan_tirta");}
 ?>