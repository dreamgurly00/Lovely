<?php
include('infrastructure/services/newsService.php');
include('infrastructure/services/baseService.php');

$model = new News();

$model->newsTitle = "cool title";
$model->newsPost = "cool post";
$model->newsTags = "test tags";




