<?php

class Database{
  private static $_instance = null;
  private $mysqli;

  public function __construct(){
    $this->mysqli = new mysqli('localhost', 'root', '', 'feeling') or die ('error database');
  }

  public static function getInstance()
  {
  if(!isset(self::$_instance)){
    self::$_instance = new Database();
  }

  return self::$_instance;
  }

  public function select($table){
    $reply = [];
    $query = "SELECT * FROM $table";
    $result = $this->mysqli->query($query);

    while($row = $result->fetch_assoc())
    $reply[] = $row;

    return $reply;
  }

  public function insert($table,$value){
    $reply = [];
    $query = "INSERT INTO $table VALUES ($value)";
    $result = $this->mysqli->query($query);

  //  while($row = $result->fetch_assoc())
  //  $reply[] = $row;

  //  return $result;
  }

  public function delete($table,$condition){
    $reply = [];
    $query = "DELETE FROM $table WHERE $condition";
    $result = $this->mysqli->query($query);

    while($row = $result->fetch_assoc())
    $reply[] = $row;

    return $reply;
  }

  public function update($table,$value){
    $reply = [];
    $query = "UPDATE $table SET $value";
    $result = $this->mysqli->query($query);

    while($row = $result->fetch_assoc())
    $reply[] = $row;

    return $reply;
  }



  }

 ?>
