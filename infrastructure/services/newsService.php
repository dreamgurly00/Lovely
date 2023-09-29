<?php
ini_set('display_errors', 1);
require_once(__DIR__ .'/baseService.php');

require_once(__DIR__ .'/../models/news.php');

class NewsService extends BaseService

{

    public function getNewsPost($id)

    {

        $newsPost = new News();

        $sql = "SELECT * FROM Lovely_News WHERE id = $id";

        $result = mysqli_query($this->conn, $sql);

        if ($result->num_rows > 0)

        {
			$newsResult = mysqli_fetch_assoc($result);
			
			$newsPost = $this->mapNewsPostToModel($newsResult);
			


        }

        return $newsPost;

    }

    public function getallNewsPost()

    {

        $newsPosts = array();

        $sql = "SELECT * FROM Lovely_News";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            while ($newsPost = mysqli_fetch_assoc($result)) {

                $newsPosts[] = $this->mapNewsPostToModel($newsPost);

            }

        }

        return $newsPosts;

    }

   /* public function viewNewsPost ($id)

    {

        $newsPost = new News();

        $newsPosts = array ();

        $sql = "SELECT *FROM Lovely_News ORDER BY $id";

        $result = mysqli_query($this->conn, $sql);



        if($result->num_rows > 0)

        {

            while($row = $result->fetch_assoc())

            {

                echo $row['news_image'];

                $preview = substr($row['news_post'], 0, 20);

                echo $row['news_title'];

                echo $row['news_post'];

                echo $preview;

            }

        }

    }*/

    public function addNewsPost($news)

    {
		print_r($news);

        $sql = "INSERT INTO Lovely_News(news_title,news_post,news_tags,news_image )";

        $sql .= "VALUES ('$news->newsTitle', '$news->newsPost', '$news->newsTags','$news->newsimage')";

        $result = mysqli_query($this->conn, $sql);

        $this->conn->insert_id;



    }

    public function updateNewsPost($news)

    {

        $sql = "UPDATE Lovely_News SET 

                           news_title = '$news->newsTitle',

                           news_post = '$news->newsPost',

                           news_tags = '$news->newsTags',

                           news_image = '$news->newsImage'

                           WHERE id = $news->id";

        $result = mysqli_query($this->conn, $sql);



    }

    public function deleteNewsPost($id)

    {

        $sql = "Delete FROM Lovely_News WHERE id=$id";
        $result = mysqli_query($this->conn, $sql);
		return $result;
    }

    private function mapNewsPostToModel ($newsItem)

    {

        $newsPost = new News();

        $newsPost->id = $newsItem['id'];

        $newsPost->newsTitle = $newsItem['news_title'];

        $newsPost->newsPost = $newsItem['news_post'];

        $newsPost->newsImage = $newsItem['news_image'];

        $newsPost->newsTags = $newsItem['news_tags'];



        return $newsPost;

    }

}


/*
$newsService = new NewsService();

$model = new News();



$model->newsTitle = "cool title";
$model->newsPost = "cool post";
$model->newsTags = "test tags";

$test =$newsService->getNewsPost(1);
print_r($test); 

$test->newsTitle="Updated Title";
$test->newsPost = "updated Post";
$test->newsTags = "updated tags";
$newsService->updateNewsPost($test);
print_r($test); 

$newsService->deleteNewsPost(1);
*/