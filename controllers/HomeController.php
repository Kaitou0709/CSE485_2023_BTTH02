<?php
include("services/ArticleService.php");
class HomeController{
    public function index(){
        $articelService = new ArticleService();
        $articles = $articelService->getAllArticles();
        include("views/home/index.php");
    }
    public function search($text_search)
    {
        $articelService = new ArticleService();
        $articles = $articelService->getArticleText($text_search);
        include("views/home/index.php");
    }
    public function detail($id)
    {
        $articelService = new ArticleService();
        $articles = $articelService->getArticleId($id);
        include("views/article/detail.php");
    }
}
