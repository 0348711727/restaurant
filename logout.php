<?php 
session_start();
	if(isset($_SESSION["user_id"])||isset($_SESSION['phanquyen']))
			{
				session_destroy();
				echo '<script>window.location.href="index.php";</script>';
			}
				

 ?>