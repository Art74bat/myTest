<?php
// сформировать ссылки (только для домашней) и узнать текцшюю страницу
class Paginate
{
  public $model;
  public function __construct()
  {
    $this->model = new Model_Main();
  }
  // определить количество  ссылок на странице
  public function count(): float
  {
    $sqlCount = "SELECT COUNT(id) FROM news";
    $connect = $this->model->connect();
    $count = $this->model->get_data($sqlCount, $connect)->fetchColumn();
    $count_page = ceil($count / 4);
    return $count_page;
  }

  // текущяя страница
  public function current_page($request_uri): int|string
  {
    $page_num = explode('/', $request_uri);
    if (empty($page_num[3])) {
      return "1";
    }
    return $page_num[3];
  }
}
