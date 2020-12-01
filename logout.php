<?php 
session_start();
	if(isset($_SESSION["users"]))
			{
				session_destroy();
			}
			echo '<script>window.location.href="index.php";</script>';
 ?>