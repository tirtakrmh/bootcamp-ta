<?php
include"../../conn.php";
@$kd = $_GET['id'];
$qry = mysqli_query($conn,"SELECT * from scare where id_scare='$kd'");
$data = mysqli_fetch_assoc($qry);
session_start();
if(!isset($_SESSION['username']))
{
  header("location:../../login_tirta.php");
}
$nama = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>TIRTA'S CARE</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link rel="icon" href="../../images/Profile.png" type="image/icon type">
  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top" style="background:slateblue;">
      <div class="container-fluid">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="#"><img src="../../images/Header.png" style="width:150px; margin-top: -7px;"></a>
        </div>
        <div class="collapse navbar-collapse">


        <div class="nav navbar-nav navbar-right">
         <ul id="nav">
          <li ><a href="index.php" style="color:#fff;"><span class="glyphicon glyphicon-home"> Home | </span></a></li>
          <li class="a"><a href="detail_tirta.php?page=cart" style="color:#fff;"><span class="glyphicon glyphicon-shopping-cart"> ShopCart [<?php
          include"../../conn.php";
          $qcek=mysqli_query($conn,"SELECT * from cart where id_buyer='$_SESSION[id_buyer]'");
          $cek=mysqli_num_rows($qcek); 
          $q_cekout= mysqli_query($conn,"SELECT * from checkout where id_buyer='$_SESSION[id_buyer]'");
          $cekout = mysqli_num_rows($q_cekout);
          if($cekout>=1)
          {
          echo "0";
          }
          else{
          echo $cek;
          }  ?>] | </span></a></li>
          <li><a href="" style="color:#fff;" ><span class="glyphicon glyphicon-list"> Category | </span></a>
<ul>
<li><?php include("kat_tirta.php");?></li>

</ul>
</li>
<li class="a"><a href="carapesan_tirta.php" style="color:#fff;"><span class="glyphicon glyphicon-question-sign"> HowtoShop | </span></a></li>

        <?php
        include"../../conn.php";
          $q_cek_cekout = mysqli_query($conn,"SELECT * from checkout where id_buyer='$_SESSION[id_buyer]'");
          $cek_cekout = mysqli_num_rows($q_cek_cekout);
          if($cek_cekout>=1){
          $queri_cek = mysqli_query($conn,"SELECT * from checkout where id_buyer='$_SESSION[id_buyer]' && status_accept='sudah diterima'");
          $cek = mysqli_num_rows($queri_cek);
          if($cek>=1)
          {?>
          <li><a href="index.php?pesan=sudah konfirmasi"><span class="glyphicon glyphicon-check" style="color:#fff;"> Confirmation | </span></a></li><?php
          }else{
          ?>
          <li><a href="carapesan_tirta.php?page=konfirmasi"><span class="glyphicon glyphicon-check" style="color:#fff;"> Confirmation | </span></a></li>
          <?php } }?>
          
          <li><a href="#"><span class="glyphicon glyphicon-user" style="color:#fff;"> <?php echo $nama; ?></span></a>
              <ul>
                  <li><a href="../admin/outpage_tirta.php"><span class="glyphicon glyphicon-log-out">SIGN OUT</span></a></li>
              </ul>
          </li>
          </ul>
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>
     <?php
@$aksi = $_GET['aksi'];
$date = date("d-m-Y");
if($aksi=="checkout")
{?>
   <div class="jumbotron">
      <div class="row">
      <div class="col-md-4" style="margin:30px;">
     <img src="../../images/Profile.png" width="400">   
    </div>
      <div class="col-md-6" style="margin-left:70px; margin-top: 80px;">
        <h1 style="color:slateblue;"><center><b>Welcome to ;)</b></h1></center><center><h1 style="color:slateblue;"><b>TirtaShop.Com</b></h1></center>
        <center><p><h2 style="color:slateblue;">Skincare for all your skin</h2></p></center>
      </div>
    </div>
    </div>
  <div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:slateblue;color:#fff;line-height:60px;font-size:20px;">
<b>CHECKOUT</b>
</div><br>
<form action="prosescheckout_tirta.php" method="post">
<label>Recipient Name</label>
<input type="text" name="name" placeholder="Nama Anda" class="form-control">
<label>Address</label>
<input type="text" name="address" placeholder="Jalan/Dusun/Desa/Kecamatan/Kabupaten/Provinsi/kode pos" class="form-control"><br>
<label>No Phone</label>
<input type="text" name="no_phone" placeholder="Nomor Telepon Anda" class="form-control"><br>
<label>Date</label>
<input type="text" name="date"  class="form-control" value="<?php echo $date; ?>" readonly>
<input type="submit" class="btn btn-info" value="SELESAI" style="background-color: slateblue;"></form> 
 <?php }else{
    @$page = $_GET['page'];
    if($page=="cart"){
      include("keranjang_tirta.php");
    }
    else if($page==""){
    ?>
    <div class="jumbotron">
      <div class="row">
      <div class="col-md-3" style="margin:30px;">
     <img src="../../gambar/<?php echo $data['image']; ?>" style="width:250px; height:250px;">   
    </div>
      <div class="col-md-6" style="margin-left:10px ; margin-top:10px;">
        <table>
          <tr>
            <h3><td><b>Brand</b></td>   <td>: <?php echo $data['brand']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Treatment</b></td>    <td>: <?php echo $data['treatment_type']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Skin</b></td>   <td>: <?php echo $data['skin_type']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Price</b></td>   <td>: <?php echo $data['price']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Stock</b></td>    <td>: <?php echo $data['stock']; ?></td></h3>
          </tr>
        </table><br><br>
        <form action="tambahkeranjang_tirta.php" method="post">

              <input type="number" name='qty' value="0" min="0" max="<?php echo $data['stock']; ?>">
              <input type="hidden" name='price' value="<?php echo $data['price'];?>">
              <input type="hidden" name='id_scare' value="<?php echo $data['id_scare'];?>">
              <?php if($data['stock']==0){ ?>
                 <a href="#" class="btn btn-danger">Tidak dapat membeli</a>
                <?php }
                else{?>
         <button type="submit" class="btn btn-success">BUY</button>
         <?php } ?>
         </form>
        </div>
    </div>
    </div>
<?php } ?>
    <div style="margin-top: -30px; width:100%,height:50px;text-align:center;background:slateblue;color:#fff;line-height:60px;font-size:20px;">
<b>ETALASE</b>
</div>
<div class="container">
     <div class="row">
      <?php
      $qryscare= mysqli_query($conn,"SELECT * from scare");
      while($scare = mysqli_fetch_assoc($qryscare)) {
      ?>

      <div class="col-md-3" style="margin-top:20px;">
        <div class="scare">
        <center><img src="../../gambar/<?php echo $scare['image'] ?>" style="margin-top:20px; width:200px;height:190px;"></center>
         <h3 style="text-align:center; color:black;"><?php echo $scare['brand'] ?></h3>
          <center><b>Price</b> Rp.<?php echo $scare['price']; ?></center> 
          <center><b>Stock</b> (<?php echo $scare['stock']; ?>)</center>
          <center><a class="btn btn-danger" href="detail_tirta.php?id=<?php echo $scare['id_scare'] ?>" role="button" style="margin-top:10px; background-color: slateblue; border-color: slateblue;">View details &raquo;</a></center></div>
        </div>

        <?php } }?>
      </div>

      <hr>

      
    </div> 
    <div class="footer" style="width:100%;height:270px;color:#fff;background:slateblue;">
      <div class="row" style="background:slateblue;">
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
      <center>
        <ul>
          <li style="color:#fff"><h3><b>About</b></h3></li>
        </ul></center>
          <hr>
          <center><p>Tirta's Care is Jakarta's trusted and most complete online shopping destination offering authentic beauty products e.g. make up, skin care, hair care, fragrance and beauty tools serving women across Indonesia. SC</p></center>
      </div>
      </div>
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="color:#fff"><h3><b>Address</b></h3></li>
        </ul></center>
          <hr>
          <center><p>St. Moritz Office Building, Unit #1502, Jl. Puri Indah Raya, Kec. Kembangan, Kota Jakarta Barat, Jakarta, 11610. SC</p></center>      
      </div>
      </div>
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <ul>
          <li style="color:#fff"><h3><b>Contact Us</b></h3></li>
          <hr>
         <div class="row">
          <div class="col-md-4">
          <a href="https://www.instagram.com/tirtakrmh/"><img src="../../images/instagram.png" style="width:70px;height:75px;"></a>
          </div>
          <div class="col-md-4">
          <a href="https://www.linkedin.com/in/tirtakrmh/"><img src="../../images/linkedin.png" style="width:70px;height:75px;"></a>
          </div>
          <div class="col-md-4">
          <a href="https://github.com/tirtakrmh/"><img src="../../images/github.png" style="width:70px;height:75px;"></a>
          </div>
         </div>
        </ul>
        </center>
      </div>
      </div>
      </div>
        <div class="copyright" style="line-height:50px;">
        <center>&copy; 2024 CopyRights Tirta Karimah | Open source & Re-Design by www.tirtatech.my.id </center>
        </div>
      </div>
  </body>
</html>
