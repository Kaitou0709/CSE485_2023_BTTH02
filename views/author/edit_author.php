<?php
    include('include/header.php');
?>

<main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
                <form action="edit_author.php" method="post">
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuId">Mã tác giả</span>
                        <input type="text" class="form-control" name="txtAuId" value=<?=$author->getIdAuthor()?>>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuName">Tên tác giả</span>
                        <input type="text" class="form-control" name="txtAuName" value =<?=$author->getNameAuthor()?>>
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu" name ="update" class="btn btn-success">
                        <a href="?controller=author" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php
    include('include/footer.php');
?>