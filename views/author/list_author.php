<?php
    include_once('views/include/admin/header.php');
?>

<main class="container mt-5 mb-5">
<!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
<div class="row">
    <div class="col-sm">
        <a href="?controller=author&action=add_author" class="btn btn-success">Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên tác giả</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($authors as $author){?>
                <tr>
                    <th scope="row"><?= $author->getIdAuthor()?></th>
                    <td> <?= $author->getNameAuthor() ?> </td>
                    <td>
                        <a href="?controller=author&action=edit_author&id=<?= $author->getIdAuthor()?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td>
                        <a href="?controller=author&action=delete_author&id=<?= $author->getIdAuthor()?>"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</main>

<?php
    include_once('include/footer.php');
?>
