<?php
    class Verify
    {
        protected $db;
        protected $user;

        public function __construct() 
        {            
            $this->db = Database::instance();
            $this->user = new Users;
        }
        public function generateLink()
        {
            return str_shuffle(substr(md5(time().mt_rand().time()), 0, 25));
		}
		public function generateCode()
		{
			return mb_strtoupper(substr(md5(mt_rand().time()),0,5));
		}
        public function verifyCode($code)
        {
            return $this->user->get('verification', array('code' => $code));
        }
        public function authOnly(){
			$user_id = $_SESSION['user_id'];
			$stmt = $this->db->prepare("SELECT * FROM `verification` WHERE `user_id` = :user_id ORDER BY `createdAt` DESC");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
			$stmt->execute();
			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$files = array('verification.php');

			//if(!$this->user->isLoggedIn()){
			//	$this->user->redirect('index.php');
			//}

			if(!empty($user)){
				if($user->status === '0' && !in_array(basename($_SERVER['SCRIPT_NAME']), $files)){
					$this->user->redirect('/verification');
				}

				if($user->status === '1' && in_array(basename($_SERVER['SCRIPT_NAME']), $files)){
					$this->user->redirect('/home.php');
				}
			}else if (!in_array(basename($_SERVER['SCRIPT_NAME']), $files)){
				$this->user->redirect('/verification');
			}

		}
        public function sendToMail($email, $message){
			$mail  = new PHPMailer\PHPMailer\PHPMailer(true);
			$mail->isSMTP();
			$mail->SMTPAuth   = true;
			$mail->SMTPDebug  = 0;
			$mail->Host       = M_HOST;
			$mail->Username   = M_USERNAME;
			$mail->Password   = M_PASSWORD;
			$mail->SMTPSecure = M_SMTPSECURE;
			$mail->Port       = M_PORT;

			if(!empty($email)){
				$mail->From     = "onlyyouforever6@gmail.com";
				$mail->FromName = "MinhNghia(SaiGon Restaurant & Hotel)";
				$mail->addReplyTo('onlyyouforever6@gmail.com');
				$mail->addAddress($email);

				$mail->Subject = "Account Verification";
				$mail->Body    = $message;
				$mail->AltBody = $message;

				if(!$mail->send()){
					return false;
				}else{
					return true;
				}
			}
		}
		
		public function sendToPhone($number,$message)
		{
			$username = "ohmybaby1999@gmail.com";
			$apiHash  = "5f65b7088d74d9366b6c0bf6adaf7b34ba1b583f9c74580e29c01326b283ac36";
			$apiUrl   = "https://api.txtlocal.com/send/";
			$test     = '0';
			$data     = "username={$username}&hash={$apiHash}&message={$message}&numbers={$number}&test={$test}";

			if(!empty($number))
			{
				$ch = curl_init($apiUrl);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$respone = curl_exec($ch);

				$result = json_decode($respone);
				//var_dump($respone);
				if($result->status === 'success')
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
    }
    
?>