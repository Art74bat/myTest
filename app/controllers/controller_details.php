<?php
class Controller_Details extends Controller
{
	function __construct()
	{
		$this->model = new Model_Details();
		$this->view = new View();
	}
	
	function action_index($param)
	{
		
		$paginate = ''; // для generate (....,$paginate=null,..)
		$sql = "SELECT * FROM news WHERE id =:id";
		$connect = $this->model->connect();
		$data = $this->model->get_data($sql, $connect,$param)->fetch();
		$this->view->generate(
			'detail_view.php', 
			'template_view.php',
			$paginate, 
			$data);
	}
}