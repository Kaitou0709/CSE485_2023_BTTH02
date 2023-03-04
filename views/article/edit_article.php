<style>
input[type=file]{
    width: 350px;

}
input[type=file]::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #084cdf;
  padding: 10px 20px;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}

input[type=file]::file-selector-button:hover {
    background-color: rgb(0, 200, 255);
}

.drop-container {
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 200px;
  width: 100%;
  padding: 20px;
  border-radius: 10px;
  border: 2px dashed #555;
  color: #444;
  cursor: pointer;
  transition: background .2s ease-in-out, border .2s ease-in-out;
}

.drop-container:hover {
  background: #eee;
  border-color: #111;
}

.drop-container:hover .drop-title {
  color: #222;
}

.drop-title {
  color: #444;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  transition: color .2s ease-in-out;
}
span{
    width: 100px;
}

select{
    width: 150px;
    height: 30px;
}

</style>
<?php include('views/include/admin/header.php')?>
<main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
                <form action="add_article.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tiêu đề</span>
                        <input type="text" class="form-control" name="txtTitle" value="<?= $article->getTitle()?>">
                        
                    </div>
                    
                    
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên bài hát</span>
                        <input type="text" class="form-control" name="txtSongName" value="<?= $article->getNameSong()?>">
                    </div>
                    
                   
                    

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tóm tắt</span>
                        <input type="text" class="form-control" name="txtSummary" value="<?= $article->getSummary()?>">
                    </div>
                    
                    
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Nội dung</span>
                        <input type="text" class="form-control" name="txtContent" value="<?= $article->getContent()?>">
                    </div>

                    

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Ngày viết</span>
                        <input type="text" class="form-control" name="txtDatetime" placeholder="<?= date('Y-m-d H:i:s') ?>" disabled>
                    </div>

                    <div style = "margin: 15px 0;">
                        <label for="category">Chọn thể loại</label>
                        
                        <select name="category" id="category">
                            <option value="<?= $article->getIdCategory()?>"><?= $article->getIdCategory()?></option>
                            <?php foreach($categories as $category){?> 
                                <option value=""></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                             
                    <div style = "margin: 15px 0;">
                        <label for="author" style="margin-right: 19px;">Tên tác giả</label>
                        <select name="author" id="author" >
                                <option value="<?= $article->getIdAuthor()?>"><?= $article->getIdAuthor()?></option>
                                    <?php foreach($authors as $author){?> 
                                <option value=""></option>
                                <?php } ?>
                        </select>
                    </div>
                    
                    <div>
                        <label for="">Ảnh hiện tại</label>
                        <img src="assets/<?= $article->getImage()?>" alt="" srcset="" style="width: 150px; 
                        height: 150px; object-fit: contain; margin: -2em 0 -2em 0.5em;">
                    </div>
                      
                    <div style="margin: 15px 0">
                        <label for="image" class="drop-container">
                            <span class="drop-title" style="width: 200px">Drop files here</span>
                                        or
                            <input type="file" name="image" id="image" class="input-file" accept="image/*">
                        </label>
                        
                    </div>
                    
                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu" class="btn btn-success" name="update">
                        <a href="?controller=article" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include('views/include/admin/footer.php')?>