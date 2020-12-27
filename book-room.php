<!DOCTYPE html>
<html>
<?php 
  include 'core/init.php';
  include('source/mysource.php');
  $p = new restaurant();

 ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<style>
* {
box-sizing: border-box;
}
body {
  background-color: #f1f1f1;
}
#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}
h1 {
  text-align: center;  
}
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}
input.invalid {
  background-color: #ffdddd;
}
.tab {
  display: none;
}
button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}
button:hover {
  opacity: 0.8;
}
#prevBtn {
  background-color: #bbbbbb;
}
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}
.step.active {
  opacity: 1;
}
.step.finish {
  background-color: #4CAF50;
}
</style>
<body>
<form id="regForm" action="bookroom-xuly.php" method="POST">
<a href="index.php" style="text-decoration:none;">🏠Back to home</a>
<h2>Chào mừng bạn. Hãy đặt cho mình một căn phòng đi nào </h2></br>
  <!-- One "tab" for each step in the form: -->
	  <center>
    <div class="tab">Đặt phòng:
<?php   
$ta=$p-> xuatphong();
?>
        <select name="inforroom">
          <option value="0" id ="defaultvaluechonphong">Chọn phòng</option>
          <?php foreach($ta as $key=>$val){ ?>
          <option  value="<?php echo $val['idroom']; ?>"><?php echo $val['name']; ?></option>
          
          <?php } ?>
        </select>
        <input type="hidden" name="idroom" value="<?php echo $val['idroom']; ?>">
        <input type="hidden" name="name" value="<?php echo $val['name']; ?>">
        <input type="hidden" name="txtgia" value="<?php echo $val['gia']; ?>">
		  <div id="showroom"> 
            
		  </div>
      <center>
  </div>	  
  <div class="tab">Chọn số người:
    <select name="songuoi">
    <option value="1">Chọn số người</option>
    <option value="1">1 Người</option>
    <option value="2">2 Người</option>
    <option value="3">3 Người</option>
    </select>
  </div>
  <div class="tab">Chọn khung thời gian:
    <label for="">Thời gian bắt đầu đặt</label>
      <input type="text" id="depart" placeholder="Nhận phòng" >
    <label for="">Thời gian rời đi</label>
      <input type="text" id="return" placeholder="Trả phòng" >
  </div>
  <div class="tab">
  Xem chi tiết phòng đã chọn<b/r>
  <button id ="showall" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  View Detail Room
</button>
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Detail Room</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <center>
        <div class="modal-body">
            
        </div>
        </center>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Confirm";
    
    document.getElementById("idroom").innerHTML = "Show Detail Room";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}
function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
<script>
$(document).ready(function(){
  $('#nextBtn').bind('click',function(){
    if( $('select[name="inforroom"]').val() == 0)
    {
      alert("Bạn phải chọn phòng khi qua bước sau");
      window.location = "book-room.php";
    }
  });
  selected = $('select[name="inforroom"]');
  $(selected).change(function(){
      	$.ajax({
			url:"showroom.php",
			method: "post",
			data: {idphong: selected.val()},
			success: function(data){
        if(data[0] == '1')
        {
          alert("Phòng này đã có ");
          window.location = "book-room.php";
        }
        else
        {
				$('#showroom').html(data);
			}
    }
		});
    });  
});		
</script>
  <script>
    $(document).ready(function(){
      $('#showall').on('click', function(){
      selected1 =$('select[name="inforroom"]').val();
      selected2 =$('select[name="songuoi"]').val();
      depart = $('#depart').val();
      returnroom = $('#return').val();
      $.ajax({
			url:"showall.php",
			method: "post",
			data: {idphong: selected1,
            songuoi:selected2,
            tgnhan:depart,
            tgtraphong:returnroom},
			success: function(data){
				$('.modal-body').html(data);
        $('.modal-body').append("<div>"+"Số người : "+ selected2+"</div>");
        $('.modal-body').append("<div>"+"Thời gian nhận phòng : "+ depart +" 1:00"+"</div>"); 
        $('.modal-body').append("<div>"+"Thời gian trả phòng : "+ returnroom +" 12:00"+"</div>"); 
			}
		});
      
    });
    });
    

</script>
<!-- Kiểm tra ngày tháng k được chọn ngày quá khứ -->
<script>
  $(document).ready(function(){
    var minDate = new Date();
    $("#depart").datepicker({
      showAnim: 'drop',
      minDate : minDate,
      numberOfMonth:1,
      dateFormat:'dd/mm/yy',
      onClose:function(selectedDate){
        $('#return').datepicker("option", "minDate", selectedDate);
      }
    });
  });
  $(document).ready(function(){
    var minDate = new Date();
    $("#return").datepicker({
      showAnim: 'drop',
      minDate : minDate,
      numberOfMonth:1,
      dateFormat:'dd/mm/yy',
      onClose:function(selectedDate){
        $('#return').datepicker("option", "minDate", selectedDate);
      }
    });
  });
</script>
<!-- <script>
$(document).ready(function(){
  selected = $('select[name="inforroom"]');
  $(selected).change(function(){
$("#selected-show span").html(selected.val());
  });
});
</script> -->
</body>
</html>
