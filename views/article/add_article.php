
<?php include('views/include/admin/header.php')?>
<link rel="stylesheet" href="assets/css/style_article.css">
<main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
                <form action="add_article.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tiêu đề</span>
                        <input type="text" class="form-control" name="txtTitle" >
                        
                    </div>
                    
                    
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên bài hát</span>
                        <input type="text" class="form-control" name="txtSongName" >
                    </div>
                    
                   
                    

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tóm tắt</span>
                        <input type="text" class="form-control" name="txtSummary" >
                    </div>
                    
                    
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Nội dung</span>
                        <input type="text" class="form-control" name="txtContent" >
                    </div>

                    

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Ngày viết</span>
                        <input type="text" class="form-control" name="txtDatetime" placeholder="<?= date('Y-m-d H:i:s') ?>" disabled>
                    </div>

                    <div style = "margin: 15px 0;">
                        <label for="category">Chọn thể loại</label>
                        
                        <select name="category" id="category">
                            <option value=""></option>
                            <?php foreach($categories as $category){?> 
                                <option value=""></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                             
                    <div style = "margin: 15px 0;">
                        <label for="author" style="margin-right: 19px;">Tên tác giả</label>
                        <select name="author" id="author" >
                                <option value=""></option>
                                    <?php foreach($authors as $author){?> 
                                <option value=""></option>
                                <?php } ?>
                        </select>
                    </div>
                    
                      
                    <div style="margin: 15px 0">
                        <label for="image" class="drop-container">
                            <span class="drop-title" style="width: 200px">Drop files here</span>
                                        or
                            <input type="file" name="image" id="image" class="input-file" accept="image/*">
                        </label>
                        
                    </div>
                    
                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success" name="add">
                        <a href="?controller=article" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include('views/include/admin/footer.php')?>