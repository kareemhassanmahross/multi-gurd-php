<?php

class DB {
	private $db;

	public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
            echo "connection successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
		
	}

	public function get($query) {
        // $query = "SELECT * FROM ".$tableName;
		$stmt = $this->db->query($query);
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
	}

	public function create($arr,$query) {
        try{
            $stmt = $this->db->prepare($query);
            $exceuted = $stmt->execute($arr);
            // echo $exceuted;
             if($exceuted == 1){
                return true;
            }
        }catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
	}

	public function getByID($arr , $query) {
		$stmt = $this->db->prepare($query);
		$stmt->execute($arr);
        return $stmt->fetch(PDO::FETCH_ASSOC);

	}
}
$DB = new DB();
// $DB->create("INSERT INTO users (fname,lname,email,image,phone) 
// VALUES ('$fname','$lname','$email','$image','$phone')");