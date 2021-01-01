<?php
    
	class Table
	{
        
		protected $db;
		public function __construct()
		{
			$this -> db = Database::instance();
        }

        public function get()
        {
            if(isset($_SESSION['res_id']))
            {
                $res_id = $_SESSION['res_id'];
                $sql = "SELECT * FROM `restaurant_table` WHERE res_id = '$res_id' AND status ='0'" ;
                $result = $this -> db -> prepare($sql);
                $result->execute();
                $results = $result->fetchAll(); 
                return $results;
            }
            
        }
        public function insertBooking()
        {
            if(isset($_SESSION['res_id']))
            {
                $reservation_email = $_POST['reservation_email'];
                $reservation_name = $_POST['reservation_name'];
                $reservation_phone = $_POST['reservation_phone'];
                $reservation_date = $_POST['reservation_date'];
                $reservation_time = $_POST['reservation_time'];
                $reservation_table = $_POST['reservation_table'];
                $reservation_dishname = $_POST['reservation_dishname'];
                $reservation_quantity = $_POST['reservation_quantity'];
                $sql = "INSERT INTO `booking_info` (`id`, `res_email`, `res_name`, `res_phone`, `res_date`, `res_time`, `res_table`, `res_dish`, `res_quantity`) 
                VALUES ('', '$reservation_email', '$reservation_name', '$reservation_phone', '$reservation_date', '$reservation_time', '$reservation_table', '$reservation_dishname', '$reservation_quantity;');" ;
                $result = $this -> db -> prepare($sql);
                $result->execute();
                $results = $result->fetchAll(); 
                return $results;
            }
            
        }
    }
?>