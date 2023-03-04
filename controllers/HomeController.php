<?php
include("services/ArticleService.php");
include("services/StatisticalService.php");
include("services/MemberService.php");
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
    public function index_admin()
    {
        $memberService = new MemberService();
        $memberService->checkSession();
        $statisticalService = new StatisticalService();
        $count_users = $statisticalService->countUser();
        $count_author = $statisticalService->countAuthor();
        $count_category = $statisticalService->countCategory();
        $count_article = $statisticalService->countArticle();
        include('views/admin/index.php');
    }
}
