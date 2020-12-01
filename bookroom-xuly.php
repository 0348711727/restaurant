<?php 
  session_start();
  include('source/mysource.php');
  $p = new restaurant();
  if(isset($_POST['idroom']))
  {
    $inforroom=$_POST['inforroom'];
    $songuoi=$_POST['songuoi'];
    $gia=$_POST['txtgia'];

    $p ->bookroom($inforroom,$songuoi, $gia);
    if(isset($_POST['idroom'])){
        //echo "<script>alert('Đặt phòng thành công');</script>";
        //echo "<script>window.location='index.php';</script>";
    }
  }
 ?>