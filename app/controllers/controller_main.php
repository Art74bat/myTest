<?php
class Controller_Main extends Controller
{
	private Paginate $paginate;
	public function __construct()
	{
		$this->paginate = new Paginate();
		$this->model = new Model_Main();
		$this->view = new View();
	}
	public function action_index(? int $param): void
	{
		if (empty($param)) {
			$offset = 0;
		}
		else {
			$offset = ($param - 1) * 4;
		};
		
		$sqlAll = "SELECT id,date,title,announce,image FROM news ORDER BY `news`.`date` DESC LIMIT 4 OFFSET $offset";
		$connect = $this->model->connect();
		$data = $this->model->get_data($sqlAll, $connect)->fetchAll();
		$this->view->generate(
			'main_view.php', 
			'template_view.php',
			$data,
			$this->paginate,
		);
	}

	public function top_data(): mixed
	{
		$sqlAll = "SELECT title,announce,image FROM news ORDER BY date DESC LIMIT 1;";
		$connect = $this->model->connect();
		return $this->model->get_data($sqlAll, $connect)->fetch();
	}
	public static function top(): mixed
	{
		$main = new Controller_Main();
		return $main->top_data();
	}

}