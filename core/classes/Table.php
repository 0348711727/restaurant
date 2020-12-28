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
    }
?>