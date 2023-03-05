<?php
include('views/include/header.php');
?>
<link rel="stylesheet" href="assets/css/style.css">
    <main class="container mt-5">
                <div class="row mb-5">
                    <div class="col-sm-4">
                        <img src="./assets/<?= htmlspecialchars($articles->getImage()) ?>" class="img-fluid" alt="...">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="card-title mb-2">
                            <a href="" class="text-decoration-none"><?= htmlspecialchars($articles->getTitle()) ?></a>
                        </h5>
                        <p class="card-text"><span class=" fw-bold">Bài hát: </span><?= htmlspecialchars($articles->getNameSong()) ?></p>
                        <p class="card-text"><span class=" fw-bold">Thể loại: </span><?= htmlspecialchars($articles->getIdCategory()) ?></p>
                        <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?= htmlspecialchars($articles->getSummary()) ?></p>
                        <p class="card-text"><span class=" fw-bold">Nội dung: </span><?= htmlspecialchars($articles->getContent()) ?></p>
                        <p class="card-text"><span class=" fw-bold">Tác giả: </span><?= htmlspecialchars($articles->getIdAuthor()) ?></p>
                    </div>          
        </div>
    </main>
    <?php
    include('views/include/footer.php');
    ?>