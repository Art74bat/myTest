<?php
class Controller_Main extends Controller
{
	public function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}
	function action_index($param)
	{
		if (empty($param)) {
			$offset = 0;
		}
		else {
			$offset = ($param - 1) * 4;
		};
		$paginate = new Paginate();
		$sqlAll = "SELECT id,date,title,announce,image FROM news ORDER BY `news`.`date` DESC LIMIT 4 OFFSET $offset";
		$connect = $this->model->connect();
		$data = $this->model->get_data($sqlAll, $connect)->fetchAll();
		$this->view->generate(
			'main_view.php', 
			'template_view.php',
			$paginate,
			$data);
	}

}