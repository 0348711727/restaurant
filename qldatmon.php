<?php
  include 'core/init.php';
  
  if(isset($_SESSION['phanquyen']))
  {
      if($_SESSION['phanquyen'] == 3)
      {
        
      }
      else
      {
        echo "<script>window.location='adminlogin.php';</script>";
      }
  }
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<center>
  <form method="POST">
    <table id="example" class="table table-striped table-bordered" style="width:70%" >
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Table Booking</th>
                    <th>Dishes</th>
                    <th>Quantity</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                      <?php 
                        $results = $adminObj->getInfo();
                        foreach($results as $table_id)
                        {
                          echo $table_id['res_email'];
                        }
                      ?>
                    </td>
                    <td>
                      <?php 
                          $results = $adminObj->getInfo();
                          foreach($results as $table_id)
                          {
                            echo $table_id['res_name'];
                          }
                      ?>
                    </td>
                    <td>
                      <?php 
                          $results = $adminObj->getInfo();
                          foreach($results as $table_id)
                          {
                            echo $table_id['res_phone'];
                          }
                      ?>
                    </td>
                    <td>
                      <?php 
                          $results = $adminObj->getInfo();
                          foreach($results as $table_id)
                          {
                            echo $table_id['res_date'];
                          }
                      ?>
                    </td>
                    <td>
                      <?php 
                          $results = $adminObj->getInfo();
                          foreach($results as $table_id)
                          {
                            echo $table_id['res_time'];
                          }
                      ?>
                    </td>
                    <td>
                      <?php 
                          $results = $adminObj->getInfo();
                          foreach($results as $table_id)
                          {
                            echo $table_id['res_table'];
                          }
                      ?>
                    </td>
                    <td>
                      <?php 
                          $results = $adminObj->getInfo();
                          foreach($results as $table_id)
                          {
                            echo $table_id['res_dish'];
                          }
                      ?>
                    </td>
                    <td>
                      <?php 
                          $results = $adminObj->getInfo();
                          foreach($results as $table_id)
                          {
                            echo $table_id['res_quantity'];
                          }
                      ?>
                    </td>
                    <td>
                      <a href="editdatmon.php" <button type="button" class="btn btn-info">Edit</button></a>
                    </td>
                    <td>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                
            </tbody>
            <!-- <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot> -->
        </table>
  </form> 
    </center>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() 
  {
    $('#example').DataTable();
  } );
</script>