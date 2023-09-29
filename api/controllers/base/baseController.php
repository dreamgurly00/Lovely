<?php
ini_set('display_errors', 1);
class BaseController 
{
	public function requestContents() 
	{
		 $json = file_get_contents('php://input');
        $model = json_decode($json);
		return $model;
	}
	public function jsonResponse($response)
	{
		header('Content-Type: application/json');
                echo(json_encode($response));
		
	}
}