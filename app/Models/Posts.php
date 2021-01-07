<?php

class Posts{
  private $_db;

  public function __construct()
  {
    $this->_db = Database::getInstance();
  }

  public function index()
  {
    return $this->_db->select('post ORDER BY date DESC');
  }

  public function postbaru($name,$post,$time,$ip)
  {
    $value = "NULL,'$name','$post','$time','$ip'";
    return $this->_db->insert('post',$value);
  }



}

 ?>
