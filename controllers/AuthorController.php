<?php

include_once('services/AuthorService.php');
class AuthorController{
    
    public function index(){
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthors();

        include("views/author/list_author.php");
    }

    public function add_author(){
        $authorService = new AuthorService();
        if(isset($_POST['add'])){
            $ten_tgia = trim($_POST["txtAuName"]);
            if(!empty($ten_tgia)){
                $arguments['tentacgia'] = $ten_tgia;
                $authorService->insert($arguments);
                header("location:?controller=author");
            }
            else{
                $mess = "";
                header("location:?controller=author&action=add_author&mess=$mess");
            }
        }
        include("views/author/add_author.php");
    }
    public function edit_author(){
        $idAuthor = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $authorService = new AuthorService();
        $author = $authorService->getAuById($idAuthor);
        $nameauthor = trim($_POST['txtAuName']??'');
        if(isset($_POST['update'])){
            $arguments['ten_tgia'] = $nameauthor;
            $arguments['ma_tgia']= $idAuthor;
            $authorService->update($arguments);
            header("location:?controller=author");
        }
        include('views/author/edit_author.php');
    }
    
    public function delete_author(){
        $authorService = new AuthorService();
        $ma_tgia = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if(isset($_POST['submit'])){
            $authorService->delete($ma_tgia);
            header("location:?controller=author");
        }
        include('views/author/delete_author.php');
    }
}?>