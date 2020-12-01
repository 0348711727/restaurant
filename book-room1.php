<!DOCTYPE html>
<?php 
  session_start();
  include("source/mysource.php");
  $p = new restaurant;
 ?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/stepform.css">
    <style>
.form-group{
  margin-top:200px;

}

    </style>
  </head>

  <body>
  <?php   
$ta=$p-> xuatphong("select * from room");
?>
<input type="hidden" name="idroom" value="<?php echo $val['idroom']; ?>">
<?php foreach($ta as $key=>$val){ ?>
    <select class="datphong" name="inforroom">
		<option value="<?php echo $val['name']; ?>"></option>
      <input type="hidden" name="txtgia" value="<?php echo $val['gia']; ?>">
		<?php } ?>  
    </select> 
		  <div id="selected-show"> 
      abc:<span>Tên phòng: <h4><?php echo $val['name']; ?></h4> 
            <img src="assets/images/<?php echo $val['hinh'];?>" alt=""></br> 
			      Giá phòng: <h6><?php  echo $val['gia']?></h6><br></span>
		  </div>
      <center>
  </div>	  



</body>
<script>
