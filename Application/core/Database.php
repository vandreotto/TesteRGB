<?php

namespace Application\core;

use PDO;
class Database extends PDO
{
  private $DB = 'MeuSite';
  private $DB_USER = 'root';
  private $DB_PASSWORD = '';
  private $HOST = 'localhost:3306';

  private $conn;

  public function __construct()
  {
    $this->conn = new PDO('mysql:host='.$this->HOST.';dbname='.$this->DB, $this->DB_USER, $this->DB_PASSWORD);
  }

  private function setParameters($stmt, $key, $value)
  {
    $stmt->bindParam($key, $value);
  }
  private function mountQuery($stmt, $parameters)
  {
    foreach( $parameters as $key => $value ) {
      $this->setParameters($stmt, $key, $value);
    }
  }

  public function executeQuery(string $query, array $parameters = [])
  {
    $stmt = $this->conn->prepare($query);
    $this->mountQuery($stmt, $parameters);
    $stmt->execute();
    return $stmt;
  }

}
