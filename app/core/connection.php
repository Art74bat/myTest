<?php
namespace App\Core;
use PDO;

trait Connection
{
  private $host = '127.0.0.1';
  private $db = 'news';
  private $port = '3306';
  private $charset = 'utf8mb4';
  private $username = 'root';
  private $password = '';

  private $opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ];

  public function connect()
  {
    $dsn = "mysql:host=$this->host;dbname=$this->db;port=$this->port;charset=$this->charset";
    try {
      $pdo = new PDO($dsn, $this->username, $this->password, $this->opt);
    } catch (\PDOException $e) {
      echo "Невозможно установить соединение: " . $e->getMessage();
    }
    return $pdo;
  }
}
