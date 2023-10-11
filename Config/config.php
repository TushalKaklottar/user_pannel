<?php

    class Config {

        //Attributes
        private $a = 10;
        private $b = 5;

        private $host = "127.0.0.1";
        private $username = "root";
        private $password = "";
        private $db_name = "db_user";
        private $table_name = "user";
        private $user_table = "users";

        private $conn;

        //Methods
        public function sum() {
            $sum = $this->a + $this->b;

            echo "Sum: " . $sum;
        }

        public function __construct() {

            $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);

            if($this->conn) {
                // echo "Connected !!";
            }
            else {
                echo "Not connected !!";
            }

        }

        public function insert($name,$age,$course) {

            $query = "INSERT INTO $this->table_name(name,age,course) VALUES('$name',$age,'$course')";

            $res = mysqli_query($this->conn,$query); // bool

            return $res;
        }

        public function register_user($name,$email,$psw) {
            $query = "INSERT INTO $this->user_table VALUES(101,'$name','$email','$psw')";

            $res = mysqli_query($this->conn,$query);

            return $res;
        }

        public function getAllRecords() {

            $query = "SELECT * FROM $this->table_name";

            return mysqli_query($this->conn,$query);   //Object    => records (associative array)

        }        

        public function fetch_single_record($id) {

            $query = "SELECT * FROM $this->table_name WHERE id=$id";

            return mysqli_query($this->conn,$query);

        }

        public function delete($id) {

            $query = "DELETE FROM $this->table_name WHERE id=$id";

            $fetch_single_record = $this->fetch_single_record($id);

            if(mysqli_num_rows($fetch_single_record) == 1) {
                mysqli_query($this->conn,$query);
                return true;
            }
            else {
                return false;
            }

        }

        public function update($id,$name,$age,$course) {
            
            $query = "UPDATE $this->table_name SET name='$name', age=$age, course='$course' WHERE id=$id";

            $fetch_single_record = $this->fetch_single_record($id);

            if(mysqli_num_rows($fetch_single_record) == 1) {
                mysqli_query($this->conn,$query);
                return "$id updated...";
            }
            else {
                return "$id failled to update...";
            }


        }


    }   
     
?>