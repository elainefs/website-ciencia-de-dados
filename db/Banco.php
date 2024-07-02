<?php
class Banco {
  private $__servername;
  private $__username;
  private $__password;
  private $__dbname;
  private $__conn;

  function __construct($servername, $username, $password, $dbname){
    $this->__servername = $servername;
    $this->__username = $username;
    $this->__password = $password;
    $this->__dbname = $dbname;

    $this->conn = mysqli_connect($this->__servername, $this->__username, $this->__password, $this->__dbname);
  }

  public function select($sql){
    return mysqli_query($this->conn, $sql);
  }

  public function SQL($sql){
    return mysqli_query($this->conn, $sql);
  }
}
?>