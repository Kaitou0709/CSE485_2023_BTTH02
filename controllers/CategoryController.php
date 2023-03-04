<?php
class CategoryController {
    // Hàm xử lý hành động index
    public function index() {
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategories();
        // Nhiệm vụ 2: Tương tác với View
        include("view/category/list_category.php");
    }

    public function add_category() {
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        // echo "Tương tác với Services/Models from Category";
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

    public function list_category() {
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Category";
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/list_category.php");
    }
}
?>