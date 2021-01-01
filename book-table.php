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





?>

<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

<title>Choose Table</title>

  <body>
    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <h2>Book a table</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row no-gutters justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2>Choose a Reservation Date and Time</h2>
          </div>
        </div>
            
            <form action="choose-table.php" method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="reservation_name" class="form-control" placeholder="Your Name" required="" value="<?php echo $_SESSION['firstname'].' '.$_SESSION['lastname'];?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="reservation_phone" class="form-control" placeholder="Phone" required="" value="<?php echo $_SESSION['phone'];?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" name="reservation_date" class="form-control" placeholder="Date" value="" required="" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Time</label>
                    <select name="reservation_time" class="form-control" placeholder="Time" required="">
                      <option value="10:00am">10:00am</option>
                      <option value="10:45am">10:45am</option>
                      <option value="11:30am">11:30am</option>
                      <option value="12:15pm">12:15pm</option>
                      <option value="1:15pm">1:15pm</option>
                      <option value="2:15pm">2:15pm</option>
                      <option value="3:15pm">3:15pm</option>
                      <option value="4:15pm">4:15pm</option>
                      <option value="5:15pm">5:15pm</option>
                      <option value="6:15pm">6:15pm</option>
                      <option value="7:15pm">7:15pm</option>
                      <option value="8:00pm">8:00pm</option>
                      <option value="8:45pm">8:45pm</option>
                      <option value="9:30pm">9:30pm</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-12 mt-3">
                  <div class="form-group">
                    <input type="hidden" name="res_id" value="4">
                    <input type="submit" name="reservation" value="Submit" class="btn btn-primary py-3 px-5">

                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
