<?php
class CategoryController {
    // Hàm xử lý hành động index
    public function index() {
        // Nhiệm vụ 1: Tương tác với Services/Models
        echo "Tương tác với Services/Models from Category";
        // Nhiệm vụ 2: Tương tác với View
        echo "Tương tác với View from Category";
    }

    public function add(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Category";
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/add_category.php");
    }

    public function list(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Category";
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/list_category.php");
    }
}
?>