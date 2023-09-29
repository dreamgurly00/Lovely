<?php
ini_set('display_errors', 1); 
class BaseService{
	public $conn;
	
	public function __construct() {
        $this->conn = mysqli_connect('localhost', 'sirsirmo_shelayah', 'B^bbl3-23!', 'sirsirmo_shelayah');
    }
}


