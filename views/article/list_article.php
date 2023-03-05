<?php 
    include_once('views/include/admin/header.php');
?>

<main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="?controller=article&action=add_article" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tên bài hát</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Ngày viết</th>
                            <th scope="col">Hình ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($articles as $article){?>   
                        <tr>
                            <th scope="row"><?= $article->getId()?></th>
                            <td style="max-width: 100px;"><?= $article->getTitle()?></td>
                            <td style="max-width: 100px;"><?= $article->getNameSong()?></td>
                            <td style="max-width: 100px;"><?= $article->getIdCategory()?></td>
                            <td style="max-width: 200px;"><?= $article->getSummary()?></td>
                            <td style="max-width: 200px;"><?= $article->getContent()?></td>
                            <td style="max-width: 100px;"><?= $article->getIdAuthor()?></td>
                            <td style="max-width: 100px;"><?= $article->getDatetime()?></td>
                            <td><img src="assets/<?= $article->getImage()?>" alt="" style="height: 50px; width: 100%; object-fit: contain;"></td>
                            <td>
                                <a href="?controller=article&action=edit_article&id=<?= $article->getId()?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="?controller=article&action=delete_article&id=<?= $article->getId()?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                       <?php } ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
        
    </main>

<?php 
    include_once('views/include/admin/footer.php');
?>