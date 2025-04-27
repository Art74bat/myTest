<?php
use App\Core\Connection;
class Model_Details extends Model
{
  // соединение с базой данных трейт Connection
  use Connection;

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
