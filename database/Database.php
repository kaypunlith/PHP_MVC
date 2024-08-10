<?php 
   class Database {
      protected $conn;
      public function __construct()
      {
        $this->conn=mysqli_connect('localhost','root','','php_lerarn');
      }
   }

?>