<?php include('include/header.php')?>

<main class="container">
    <form action="" method="post"
        style="width: 50%; background: #3d456a2e; border: 1px solid; border-radius: 10px; margin: 60px auto; padding: 30px;">
        <h3 style="margin-bottom: 30px">
        Bạn có chắc muốn xóa không ?
        </h3>
        <div>
            <input class="btn btn-success" type="submit" name='confirm' value="xóa">
            <a href="?controller=author" class="btn btn-warning" >quay lại</a>
        </div>
    </form>
</main>
<?php include('include/footer.php')?>