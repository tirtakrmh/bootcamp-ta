<?php
include"config.php";
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="images/Profile.png" type="image/icon type">
  </head>

  <body>

  <nav class="navbar navbar-default navbar-fixed-top" style="background:slateblue;">
      <div class="container-fluid">
        <div class="navbar-header">
          
       <a class="navbar-brand" href="#"><img src="images/Header.png" style="width:150px; margin-top: -7px;"></a>
        </div>
        <div class="collapse navbar-collapse">


        <div class="nav navbar-nav navbar-right">
         <ul id="nav">
          <li ><a href="index.php" style="color:#fff;"><span class="glyphicon glyphicon-home"> Home |</span></a></li>
          <li><a href="" style="color:#fff;" ><span class="glyphicon glyphicon-list"> Category |</span></a>
          <ul>
            <li><?php include("kat_tirta.php");?></li>
          </ul>
        </li>
          <li class="a"><a href="carapesan_tirta.php" style="color:#fff;"><span class="glyphicon glyphicon-log-in"> HowtoShop |</span></a></li>
          <li class="a"><a href="login_tirta.php" style="color:#fff;"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
          </ul>
          <div class="clear"></div>
          </div>
      </div>
    </nav>
    <div class="jumbotron">
      <div class="row">
      <div class="col-md-4" style="margin:30px;">
     <img src="images/Profile.png" width="400">   
    </div>
      <div class="col-md-6" style="margin-left:70px; margin-top: 80px;">
        <h1 style="color:slateblue;"><center><b>Welcome to ;)</b></h1></center><center><h1 style="color:slateblue;"><b>TirtaShop.Com</b></h1></center>
        <center><p><h2 style="color:slateblue;">Skincare for all your skin</h2></p></center>
      </div>
    </div>
    </div>
<div style="margin-top: -30px; width:100%,height:50px;text-align:center;background:slateblue;color:#fff;line-height:60px;font-size:20px;">
<b>ETALASE</b>
</div>
    <div class="container">
      <div class="row">
      <?php
      include"conn.php";
      @$idkat = $_GET['id'] ;
      $qryscarekat = mysqli_query($conn,"SELECT * from scare where id_categories='$idkat'");
      $qryscare= mysqli_query($conn,"SELECT * from scare");
      if($idkat==0){
      while($scare = mysqli_fetch_assoc($qryscare)) {
      ?>
      
        <div class="col-md-3" style="margin-top:20px;">
        <div class="scare">
        <center><img src="gambar/<?php echo $scare['image'] ?>" style="margin-top:20px; width:210px;height:190px;"></center>
         <h3 style="text-align:center; color:black;"><?php echo $scare['brand'] ?></h3>
          <center><b>Price</b> Rp.<?php echo $scare['price']; ?></center> 
          <center><b>Stock</b> (<?php echo $scare['stock']; ?>)</center>
          <center><a class="btn btn-danger" href="detail_tirta.php?id=<?php echo $scare['id_scare'] ?>" role="button" style="margin-top:10px; background-color: slateblue; border-color: slateblue;">View details &raquo;</a></center>
         </div>
        </div>
        <?php } }
        else{ while($scare = mysqli_fetch_assoc($qryscarekat)){?>
            <div class="col-md-3" style="margin-top:20px;">
        <div class="scare">
        <center><img src="gambar/<?php echo $scare['image'] ?>" style="margin-top:20px;width:210px;height:190px;"></center>
        <h3 style="text-align:center; color:black; "><?php echo $scare1['brand'] ?></h3>
          <center><b>Price</b> Rp.<?php echo $scare['price']; ?></center> 
          <center><b>Stock</b> (<?php echo $scare['stock']; ?>)</center>
          <center><a class="btn btn-danger" href="detail_tirta.php?id=<?php echo $scare['id_scare'] ?>" role="button" style="margin-top:10px; background-color: slateblue; border-color: slateblue;">View details &raquo;</a></center>
         </div>
        </div>
          <?php }} ?>
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
        </ul>
      </center>
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
          <a href="https://www.instagram.com/tirtakrmh/"><img src="images/instagram.png" style="width:70px;height:75px;"></a>
          </div>
          <div class="col-md-4">
          <a href="https://www.linkedin.com/in/tirtakrmh/"><img src="images/linkedin.png" style="width:70px;height:75px;"></a>
          </div>
          <div class="col-md-4">
          <a href="https://github.com/tirtakrmh/"><img src="images/github.png" style="width:70px;height:75px;"></a>
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
