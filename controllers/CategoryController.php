<?php
    include_once("services/CategoryService.php");
    include_once("services/ArticleService.php");
    class CategoryController {
        // Hàm xử lý hành động index
        public function index() {
            // Nhiệm vụ 1: Tương tác với Services/Models
            $categoryService = new CategoryService();
            $categories = $categoryService->getAllCategories("SELECT * FROM theloai");
            // Nhiệm vụ 2: Tương tác với View
            include("views/category/list_category.php");
        }

        public function add_category() {
            // Nhiệm vụ 1: Tương tác với Services/Models
            // echo "Tương tác với Services/Models from Category";
            $categoryService = new CategoryService();
            if (isset($_POST['btn'])) {
                $ten_tloai = trim($_POST['ten_tloai']);
                if (!empty($ten_tloai)) {
                    $arguments['tentheloai'] = $ten_tloai;
                    $categoryService->Insert($arguments);
                    header("location:?controller=category");
                }
                else {
                    $mess = "Bạn chưa nhập đầy đủ thông tin";
                    header("location:?controller=category&action=add_category&mess=$mess");
                }
            }
            // Nhiệm vụ 2: Tương tác với View
            include("views/category/add_category.php");
        }

        public function edit_category() {
            // Nhiệm vụ 1: Tương tác với Services/Models
            // echo "Tương tác với Services/Models from Category";
            $categoryService = new CategoryService();
            // Lấy ra thông tin cần sửa
            $ma_tloai = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            // Nếu nhấn submit thì sẽ tiến hành kiểm tra và sửa thông tin nếu thỏa mãn ĐK
            if (isset($_POST['btn'])) {
                $ten_tloai = trim($_POST['ten_tloai']);
                if (!empty($ten_tloai)) {
                    $arguments['tentheloai'] = $ten_tloai;
                    $arguments['matheloai'] = $ma_tloai;
                    $categoryService->Update($arguments);
                    header("location:?controller=category");
                }
                else {
                    $mess = "Bạn chưa nhập đầy đủ thông tin";
                    header("location:?controller=category&action=edit_category&id=$ma_tloai&mess=$mess");
                }
            }
            // Nhiệm vụ 2: Tương tác với View
            include("views/category/edit_category.php");
        }

        public function delete_category() {
            // Nhiệm vụ 1: Tương tác với Services/Models
            // echo "Tương tác với Services/Models from Category";
            $categoryService = new CategoryService();
            $articleService = new ArticleService();

            $ma_tloai = $_GET['id'];
            $articles = $articleService->getArticleIdTheloai($ma_tloai);
            if (isset($_POST['confirm'])) {
                if (count($articles) == 0) {            // Nếu ko có ràng buộc khóa ngoại với Bài viết
                    $arguments['matheloai'] = $ma_tloai;
                    $categoryService->delete($arguments);
                    header("location:?controller=category");
                }
                else {
                    $list_id = "";
                    foreach ($articles as $article) {
                        $list_id = $list_id.$article->getID();
                    }
                    header("location:?controller=category&action=delete_category&id=$ma_tloai&list_id=$list_id");
                }
            }
            // Nhiệm vụ 2: Tương tác với View
            include("views/category/delete_category.php");
        }
    }
?>