<?php
    
	class Admin
	{
        
		protected $db;
		public function __construct()
		{
			$this -> db = Database::instance();
        }

        public function get($table,$fields = array()){
			$columns = implode(', ', array_keys($fields));
			//sql query
			$sql = "select * from `{$table}` where `{$columns}`= :{$columns}";
			//check if sql is set
			if($stmt = $this -> db -> prepare($sql)){
				foreach ($fields as $key => $value) {
					//bind columns
					$stmt -> bindValue(":{$key}",$value);
				}
				// execute
				$stmt -> execute();
				return $stmt -> fetch(PDO::FETCH_OBJ);
			}
		}
		
        public function getInfo()
        {
            $sql = "SELECT * FROM `booking_info`";
            $result = $this->db->prepare($sql);
            $result->execute();
            $results = $result->fetchAll(); 
            return $results;
        }
        public function editInfo($reservation_id)
        {
			if(isset($_POST['update']))
			{
				$reservation_name = $_POST['name'];
				$reservation_phone = $_POST['phone'];
				$reservation_date = $_POST['date'];
				$reservation_time = $_POST['time'];
				$reservation_email = $_POST['email'];
				$reservation_table = $_POST['table'];
				$reservation_dish = $_POST['dishes'];
				$reservation_quantity = $_POST['quantity'];
				$sql = "UPDATE `booking_info` SET `res_email` = '$reservation_email',
				`res_name` = '$reservation_name', `res_phone` = '$reservation_phone',
				`res_date` = '$reservation_date',`res_time` = '$reservation_time',
				`res_table` = '$reservation_table', `res_dish` = '$reservation_dish',
				`res_quantity` = '$reservation_quantity' 
				WHERE `booking_info`.`id` = $reservation_id";
				$result = $this->db->prepare($sql);
				$result->execute();
				$results = $result->fetchAll(); 
				return $results;
			}
		}
		public function deleteInfo($reservation_id)
		{
				$sql = "DELETE FROM `booking_info` WHERE `booking_info`.`id` = $reservation_id;";
				$result = $this->db->prepare($sql);
				$result->execute();
				$results = $result->fetchAll(); 
				return $results;
		}
        public function bookingData($admin_id)
		{
			return $this -> get('booking_info',array('id' => $admin_id));
		}
    }
?>