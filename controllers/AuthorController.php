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
            $ten_tgia = trim($_POST['txtAuName'] ?? '');
            if(!empty($ten_tgia)){
                $arguments['ten_tgia'] = $ten_tgia;
                $authorService->insert($arguments);
                header("location:?controller=author");
            }
        else{
            $mess = "nhap lai di";
            header("location:?controller=author&action=add_author&mess=$mess");
        }
        }
        include("views/author/add_author.php");
    }
    public function edit_author(){
        $ma_tgia = filter_input(INPUT_GET, 'ma_tgia', FILTER_VALIDATE_INT);
        $authorService = new AuthorService();
        $author = $authorService->getAuById($ma_tgia);
        $ten_tgia = trim($_POST['txtAuName']);
        if(isset($_POST['update'])){
            $arguments['ten_tiga'] = $ten_tgia;
            $authorService->update($arguments);
            header("location:?controller=author");
        }
        else{
            header("location:?controller=author&action=edit_author&id=$ma_tgia");
        }
        include('views/author/edit_author.php');
    }
    
    public function delete_author(){
        $authorService = new AuthorService();
        $ma_tgia = filter_input(INPUT_GET, 'ma_tgia', FILTER_VALIDATE_INT);
        if(isset($POST['confirm'])){
            $authorService->delete($ma_tgia);
            header("location:?controller=author");
        }
        include('views/author/delete_author.php');
    }
}?>