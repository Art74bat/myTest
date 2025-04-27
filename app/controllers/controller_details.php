<?php
class Controller_Details extends Controller
{
  function __construct()
  {
    $this->model = new Model_Details();
    $this->view = new View();
  }

  function action_index(?int $param): void
  {
    // запрос
    $sql = "SELECT * FROM news WHERE id =:id";
    // получить PDO
    $connect = $this->model->connect();
    // получить данные
    $data = $this->model->get_data($sql, $connect, $param)->fetch();
    // сгенерировать вывод
    $this->view->generate(
      'detail_view.php',
      'template_view.php',
      $data,
    );
  }
}
