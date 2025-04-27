<?php
class Model_Main extends Model
{
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
			// echo 'DB is connected';
		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		return $pdo;
	}
	public function get_data(string $sql, PDO $connect,  ? int $arg=null): mixed
	{	
		if(!$arg){
			return $connect->query($sql);
		}
		$statment = $connect->prepare($sql);
		$statment->execute(['id'=>$arg]);
		return $statment;		
	}
}