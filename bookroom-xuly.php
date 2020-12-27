<?php 
  session_start();
  include('source/mysource.php');
  $p = new restaurant();
  $conn = $p->ketnoicsdl();
  if(isset($_POST['idroom']))
  {
    $inforroom=$_POST['inforroom'];
    $songuoi=$_POST['songuoi'];
    $gia=$_POST['txtgia'];
    $depart =$_SESSION['depart'];
    $returnroom = $_SESSION['return'];
    $name = $_POST['name'];
    echo $inforroom;
    $lastid= $p ->bookroom($name, $gia, $depart,$returnroom,$songuoi, $inforroom);
    if(isset($lastid)){

        echo "<script>alert('Đặt phòng thành công');</script>";
        echo "<script>window.location='index.php';</script>";
    }
    
  }
 ?>