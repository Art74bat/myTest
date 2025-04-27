<?php
class Model_Details extends Model
{
  // соединение с базой данных
  public function connect(): PDO
  {
    $host = '127.0.0.1';
    $db = 'news';
    $port = '3306';
    $charset = 'utf8mb4';
    $username = 'root';
    $password = '';
    $dsn = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";

    $opt = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
      $pdo = new PDO($dsn, $username, $password, $opt);
    } catch (PDOException $e) {
      echo "Невозможно установить соединение: " . $e->getMessage();
    }
    return $pdo;
  }

  // получить данные из базы
  public function get_data(string $sql, PDO $connect, ?int $arg = null): mixed
  {
    if (!$arg) {
      return $connect->query($sql);
    }
    $statment = $connect->prepare($sql);
    $statment->execute(['id' => $arg]);
    return $statment;
  }
}
