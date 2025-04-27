<?php
// класс для вывода страниц
// подключить шаблон главной страницы
class View
{
  function generate(string $content_view, string $template_view, array $data = null, Paginate $paginate = null, )
  {
    include 'app/views/' . $template_view;
  }
}
