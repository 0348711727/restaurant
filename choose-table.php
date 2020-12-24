<?php
include 'core/init.php';
include('source/mysource.php');
include 'assets/template/header.php';

if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
			$user = $userObj -> userData($user_id);
    }

if (!Users::isLoggedIn())
{
  echo '<script>alert("You need to login first.")</script>';
  echo '<script>window.location="login.php"</script>';
}

if (isset($_POST['reservation']))
{
  $res_id = $_POST['res_id'];
  $reservation_name = $_POST['reservation_name'];
  $reservation_phone = $_POST['reservation_phone'];
  $reservation_date = $_POST['reservation_date'];
  $reservation_time = $_POST['reservation_time'];
  $_SESSION['res_id'] = $res_id;
}



?>

<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

<title>Choose Table</title>
<?php include 'assets/template/menu.php'; ?>
<body>
  <br><br><br><br><br><br><br><br><br><br><br><br><br>
  <center>
        <form action="select-menu.php" method="POST">
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="text" class="form-control" id="" name="" placeholder="Email" value="<?php echo $_SESSION['email'] ?>"><br>
                  </div>
                  

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Available Table</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <?php
                          $results = $tableObj->get();
                          foreach($results as $table_id)
                          {
                            ?><option>  <?php
                              echo $table_id['table_name'];
                              echo '<br>';
                            ?></option> <?php
                          }
                        ?>
                    </select>
                  </div>
              </div>
            </div>
        </form>
        <div class="col-md-6">
          <input type="submit" value="Confirm" name="selectChair" class="btn btn-primary py-3 px-5" >
        </div>
  </center>
    
            

    <!-- <div id="cc"></div> -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

    <script>
     $(document).ready(function(){

      $('#smartwizard').smartWizard({
      selected: 0,
      theme: 'arrows',
      autoAdjustHeight:true,
      transitionEffect:'fade',
      showStepURLhash: false,

      });

      });
      </script>
</body>
    <!-- <script>
    //   $(document).ready(function(){
    //       $(".table_check").click(function(){
    //         var radioValue = $("input[name='table_check']:checked").val();
    //           if(radioValue){
    //               $.ajax({
    //                 url:"getchair.php",
    //                 method:"post",
    //                 data:{radioValue:radioValue},
    //                 success: function(data){
    //                   $('#cc').html(data);
    //                 }

    //               });
    //           }
    //       });
    //   });
    // 
