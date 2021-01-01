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
  $_SESSION['res_name'] = $_POST['reservation_name'];
  $_SESSION['res_phone'] = $_POST['reservation_phone'];
  $_SESSION['res_date'] = $_POST['reservation_date'];
  $_SESSION['res_time'] = $_POST['reservation_time'];
  $_SESSION['res_id'] = $_POST['res_id'];
  
}
?>

<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

<title>Choose Table</title>
<body>
  <br><br><br><br><br><br><br><br><br><br><br><br><br>
  <center>
        <form action="select-menu.php" method="POST">
            <div class="col-md-6">
              
                <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" name="reservation_name" class="form-control" placeholder="Your Name" value="<?php echo $_SESSION['res_name'];?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Phone</label>
                      <input type="text" name="reservation_phone" class="form-control" placeholder="Phone" value="<?php echo $_SESSION['res_phone'];?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Date</label>
                      <input type="date" name="reservation_date" class="form-control" placeholder="Date" value="<?php echo $_SESSION['res_date'];?>" readonly >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Time</label>
                      <input type="text" name="reservation_time" class="form-control" placeholder="Time" value="<?php echo $_SESSION['res_time'];?>" readonly>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Email address</label>
                      <input type="text" class="form-control" name="reservation_email" placeholder="Email" value="<?php echo $_SESSION['email'] ?>"><br>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Available Table</label>
                      <select class="form-control" name="reservation_table">
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
            </div>
            <div class="col-md-6">
              <input type="hidden" name="res_id" value="4">
              <input type="submit" value="Submit" name="choosetable" class="btn btn-primary py-3 px-5" >
            </div>
        </form>
        
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
    
