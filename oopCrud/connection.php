<?php
    class db {
        public $hostname;
        public $username;
        public $password;
        public $db_name;
        public $conn;
    
        public function __construct($hostname, $username, $password, $db_name) {
            $this->hostname = $hostname;
            $this->username = $username;
            $this->password = $password;
            $this->db_name = $db_name;
            $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->db_name);
    
            if (!$this->conn) {
                echo mysqli_connect_error();
            } else {
                echo "Connection Successful!";
            }
        }
    
        public function insert() {
            if (!$this->conn) {
                echo "Connection failed";
                return;
            }
    
            $sqli = "INSERT INTO category(category_name, category_entrydate) VALUES('Market', '05-05-23')";
            if(mysqli_query($this->conn, $sqli) == TRUE){
                echo "Data Inserted";
            }
            else{
                echo mysqli_error($this->conn);
            }
        } 
    }
    
    $database = new db('localhost', 'root', '', 'store_db');
    $database->insert();
    

    