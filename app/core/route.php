<?php
// что то типа роутинга
class Route
{
	static function start()
	{
		// контроллер, модель и действие для index.php(по умолчанию)
		$controller_name = 'Main';
		$action_name = 'index';
		// $model_name = 'Main';
		// Массив параметров из URI запроса.
		$param = null;

	
		// разделить запрос
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		// var_dump($_SERVER['REQUEST_URI']);

		// имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		//  имя метода
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		if ( !empty($routes[3]) )
		{
			$param = $routes[3];
		}
		
		// префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;


		// подключить файл с классом модели 
		$model_file = strtolower($model_name).'.php';
		$model_path = "app/models/".$model_file;
		if(file_exists($model_path))
		{
			include "app/models/".$model_file;
		}


		// подключить файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "app/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "app/controllers/".$controller_file;
		}
		else
		{
			// если что перенаправить..
			Route::ErrorPage404();
		}
		
		// создать контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// определить действие контроллера
			$controller->$action($param);
		}
		else
		{
			// если что перенаправить..
			Route::ErrorPage404();
		}
	
	}
	
	static function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}
