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
<title>Quản Lý Đặt Món</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<center>
<div class="home-nav">
	<a href="<?php echo BASE_URL; ?>/index.php">Trở Về Trang Chủ</a>
</div>
    <form method="POST" action="editdatmon.php">
    <table id="example" class="table table-striped table-bordered" style="width:70%" >
            <thead>
                <tr>
                    <th>ID</th>
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
                          echo $table_id['id'];
                        }
                      ?>
                    </td>
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
                    <?php
                    $results = $adminObj->getInfo();
                    foreach($results as $table_id)
                          {
                            ?>
                              <input type="hidden" name="reservation_id"        value="<?php echo $table_id['id']; ?>">
                              <input type="hidden" name="reservation_email"     value="<?php echo $table_id['res_email']; ?>">
                              <input type="hidden" name="reservation_name"      value="<?php echo $table_id['res_name']; ?>">
                              <input type="hidden" name="reservation_phone"     value="<?php echo $table_id['res_phone']; ?>">
                              <input type="hidden" name="reservation_date"      value="<?php echo $table_id['res_date']; ?>">
                              <input type="hidden" name="reservation_time"      value="<?php echo $table_id['res_time']; ?>">
                              <input type="hidden" name="reservation_table"     value="<?php echo $table_id['res_table']; ?>">
                              <input type="hidden" name="reservation_dish"      value="<?php echo $table_id['res_dish']; ?>">
                              <input type="hidden" name="reservation_quantity"  value="<?php echo $table_id['res_quantity'];?>">
                              
                            <?php
                          }
                          ?>
                    <td>
                      <input type="submit" value="Edit" name="editdatmon" class="btn btn-info"></button>
                    </td>
                    <td>
                      <input type="button" class="btn btn-danger deletebutton" value="Delete" deleteid='<?php echo $table_id['id']; ?>' />
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
    $('.deletebutton').on('click', function()
    {
      if(confirm('ban co dong y xoa hay khong ???'))
      {
        var id = $(this).attr('deleteid');
        $.ajax({
          url:'success-delete.php',
          method: 'POST',
          data: {id:id},
          success:function(data){
            window.location.href='qldatmon.php';
          }
        });
      }
      else
      {
        return false;
      }
    });
  } );
</script>