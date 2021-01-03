<?php
    
	class Admin
	{
        
		protected $db;
		public function __construct()
		{
			$this -> db = Database::instance();
        }

        public function getInfo()
        {
            $sql = "SELECT * FROM `booking_info`";
            $result = $this->db->prepare($sql);
            $result->execute();
            $results = $result->fetchAll(); 
            return $results;
        }
        public function editInfo()
        {
            $sql = "SELECT * FROM `booking_info`";
            $result = $this->db->prepare($sql);
            $result->execute();
            $results = $result->fetchAll(); 
            return $results;
        }
    }
?>