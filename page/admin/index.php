<?php
include"../../config.php";
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
          
          <a class="navbar-brand" href="#" style="color:#fff; font-size:30px;">Tirta's<b>CARE.Com</b></a>
        </div>
        <div class="collapse navbar-collapse">


        <div class="nav navbar-nav navbar-right">
         <ul id="nav">

          <li style="background:slateblue;color:#fff;"><a href="#"><span class="glyphicon glyphicon-user" style="color:#fff;"> <?php echo $nama; ?></span></a>
              <ul>
                <li style="background:slateblue;color:#fff;"><a href="outpage_tirta.php"><span class="glyphicon glyphicon-log-out">SIGN OUT</span></a></li>
              </ul>
          </li>
        </ul>
          
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?page=kategori_tirta">Category</a></li>
            <li><a href="index.php?page=scare_tirta">Scare</a></li>
            <li><a href="index.php?page=customer_tirta">Customer</a></li>
            <li><a href="index.php?page=laporan_tirta">Report</a></li>
          </ul>
        </div>
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
        	<?php
if(isset($_GET['page'])) {
	$page = $_GET['page'] . ".php";
	include ("$page");

} else {
	include ('home_tirta.php');
}?>
</div>
</div>
        </div>
      </div>
    </div>
  </body>
</html>
