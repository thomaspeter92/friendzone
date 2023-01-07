<?php
class DB
{
  // DB Variables
  private $username = 'root';
  private $password = '';
  private $dbname = 'friendzone';

  // DB Connect
  protected function connect()
  {
    try {
      return new PDO("mysql:host=localhost;dbname=$this->dbname", $this->username, $this->password);
    } catch (PDOException $e) {
      throw new PDOException($e->getMessage(), (int)$e->getCode());
      die();
    }
  }
}
