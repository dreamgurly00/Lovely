<?php
ini_set('display_errors', 1);
require_once(__DIR__ .'/../../infrastructure/services/newsService.php');

class newsController 
{
	private $request;
	private $newsService;
	public function __construct() 
	{
		$this->request = $_REQUEST;
		$this->newsService = new NewsService();
	}
	public function init () 
	{
        $request = $_SERVER['REQUEST_URI'];
        $routes = explode('/',$request);
        $actions = '';
        if(isset($routes[4]))
        {
            $action = $routes[4]; //4th item in array is action
            $action = strtolower($action);
        }
		$method = $_SERVER['REQUEST_METHOD'];
		switch($method) 
		{
			case "POST":
				$this->updateNews();
				break;
			case "PUT":
				$this->createNews();
				break;
			case "DELETE":
				$this->deleteNews();
				break;
			default:
                if($action == "list")
                {
                    $this->getallNewsPost();
                }
                else
                {
                    $this->getNews();
                }
                break;
				break;
		}
	}
	
	public function updateNews() 
	{
		$json = file_get_contents('php://input');
		$model = json_decode($json);
        $response = $this->newsService->updateNewsPost($model);
		echo json_encode($response);
	}
	public function createNews() 
	{
		$json = file_get_contents('php://input');
		$model = json_decode($json);
        $response = $this->newsService->addNewsPost($model);
        echo json_encode($response);
		echo "create";
		
	}
	public function deleteNews() 
	{
		if(isset($this->request['id']))
        {
            $id = $this->request['id'];
            $response=$this->newsService->deleteNewsPost($id);
			if($response!= null)
            {
                header('Content-Type: application/json');
                echo(json_encode($response));
            }
            else
            {
                echo "News article not found";
            }
        
		}
		else
        {
            echo "invalid";
        }
	}
	public function getNews() 
	{
        if(isset($this->request['id']))
        {
            $id = $this->request['id'];
            $response=$this->newsService->getNewsPost($id);
            if($response!= null)
            {
                header('Content-Type: application/json');
                echo(json_encode($response));
            }
            else
            {
                echo "News article not found";
            }
        }
        else
        {
            echo "invalid";
        }
		
	}
	public function getallNewsPost () 
	{
		$response = $this->newsService->getallNewsPost();
		 header('Content-Type: application/json');
         echo(json_encode($response));
	}
	
}
$controller = new newsController();
$controller->init();

?>