<?php 
    include_once('services/ArticleService.php');
    class ArticleController{
        public function index(){
            $articleService = new ArticleService();
            $articles = $articleService->getAllArticles();

            include("views/article/list_article.php");
        }

        public function add_article(){
            $articleService = new ArticleService();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            if(isset($_POST['add'])){
                $title = trim($_POST['txtTitle'] ?? '');
                $nameSong = trim($_POST['txtSongName'] ?? '');
                $category = $_POST['category'] ?? '';
                $summary = trim($_POST['txtSummary'] ?? '');
                $content = $_POST['txtContent'] ?? '';
                $author = trim($_POST['author'] ?? '');
                $date_post = date('Y-m-d H:i:s');

                $extensions = ['png', 'jpg'];
                $image_article = $_FILES['image']['name'];

                $ext = pathinfo($image_article, PATHINFO_EXTENSION);
                if(!empty($title) and !empty($nameSong) and !empty($summary)){
                    $arguments['title'] = $title;
                    $arguments['nameSong'] = $nameSong;
                    $arguments['category'] = $category;
                    $arguments['summary'] = $summary;
                    $arguments['content'] = $content;
                    $arguments['author'] = $author;
                    $arguments['date_post'] = $date_post;
                    $arguments['image_article'] = 'images/songs/'. $image_article;

                    if(!empty($image_article)){
                        if(in_array($ext, $extensions)){
                            move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/songs/'.$image_article);
                            $articleService->insert($arguments);
                            header("location:?controller=article");
                        }
                        else{
                            $mess = "Hình ảnh chỉ nhận file png hoặc jpg";
                            header("location:?controller=article&action=add_article&mess=$mess");
                        }
                    }
                    else{
                        $articleService->insert($arguments);
                        header("location:?controller=article");
                    }

                }
                else{
                    $mess = "Bạn vui lòng nhập đầy đủ thông tin";
                    header("location:?controller=article&action=add_article&mess=$mess");
                }

            }
            include("views/article/add_article.php");
        }

        public function edit_article(){
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $articleService = new ArticleService();
            $article = $articleService->getAricleById($id);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $title = trim($_POST['txtTitle'] ?? '');
            $nameSong = trim($_POST['txtSongName'] ?? '');
            $category = $_POST['category'] ?? '';
            $summary = trim($_POST['txtSummary'] ?? '');
            $content = $_POST['txtContent'] ?? '';
            $author = trim($_POST['author'] ?? '');
            $date_post = date('Y-m-d H:i:s');

            $extensions = ['png', 'jpg'];
            $image_article = $_FILES['image']['name'] ?? '';

            $ext = pathinfo($image_article, PATHINFO_EXTENSION);
            if(isset($_POST['update'])){
                if(!empty($title) and !empty($nameSong) and !empty($summary)){
                        
                        if(empty($image_article)){
                            $arguments['id'] = $id;
                            $newImage = $articleService->getAricleById($id)->getImage();
                        }
                        else{
                            if(in_array($ext, $extensions)){
                                move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/songs'.$image_article);
                            }
                            else{
                                $mess = "Hình ảnh chỉ nhận file: .png, .jpg";
                                header("location:?controller=article&action=edit_article&id=$id&mess=$mess");
                                die();
                            }
                        }

                        $arguments['title'] = $title;
                        $arguments['nameSong'] = $nameSong;
                        $arguments['category'] = $category;
                        $arguments['summary'] = $summary;
                        $arguments['content'] = $content;
                        $arguments['author'] = $author;
                        $arguments['image_article'] = $image_article;
                        $articleService->update($arguments);
                        header("location:?controller=article");
                    }
                    else{
                        $mess = "Bạn vui lòng nhập đầy đủ thông tin";
                        header("location:?controller=article&action=edit_article&id=$id&mess=$mess");
                    }
                
                    
                }
        include('views/article/edit_article.php');
    }

        public function delete_article(){
            $articleService = new ArticleService();
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if(isset($_POST['confirm'])){
                $articleService->delete($id);
                header("location:?controller=article");
            }
            include('views/article/delete_article.php');
        }
    }
?>
