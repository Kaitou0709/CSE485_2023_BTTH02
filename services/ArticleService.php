<?php 
    include_once(__DIR__.'/../configs/DBConnection.php');
    include_once(__DIR__.'/../models/Article.php');
    class ArticleService{
        public function getAllArticles(){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, baiviet.tomtat,
                    baiviet.noidung, tacgia.ten_tgia, baiviet.ngayviet, baiviet.hinhanh FROM baiviet 
                    INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                    INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
                    ORDER BY baiviet.ma_bviet ASC";
            $statment = $conn->query($sql);

            $articles = [];

            while($row = $statment->fetch()){
                $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'],
                                        $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
                array_push($articles, $article);
            }
            return $articles;
        }
        public function getArticleId($id)
        {
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();
            $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, baiviet.tomtat,
                    baiviet.noidung, tacgia.ten_tgia, baiviet.ngayviet, baiviet.hinhanh FROM baiviet 
                    INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                    INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
                    WHERE baiviet.ma_bviet = $id";
            $statment = $conn->query($sql);
            $row = $statment->fetch();
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'],
                        $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
            return $article;
        }
        public function getArticleText($text_search)
        {
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();
            $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, baiviet.tomtat,
                    baiviet.noidung, tacgia.ten_tgia, baiviet.ngayviet, baiviet.hinhanh FROM baiviet 
                    INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                    INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
                    WHERE baiviet.ten_bhat like '%$text_search%'";
            $statment = $conn->query($sql);
            $articles = [];
            while($row = $statment->fetch()){
                $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'],
                                        $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
                array_push($articles, $article);
            }
            return $articles;
        }

        public function getAricleById($id){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, baiviet.tomtat,
                    baiviet.noidung, tacgia.ten_tgia, baiviet.ngayviet, baiviet.hinhanh FROM baiviet 
                    INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                    INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
                    WHERE baiviet.ma_bviet = $id";
            $statment = $conn->query($sql);


            while($row = $statment->fetch()){
                $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'],
                                        $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
            }
            return $article;
        }
        public function insert(array $arguments){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "INSERT INTO `baiviet` (`ma_bviet`, `tieude`, `ten_bhat`, `ma_tloai`, `tomtat`, `noidung`, `ma_tgia`, `ngayviet`, `hinhanh`) 
            VALUES (:title, :nameSong, (SELECT ma_tloai FROM theloai WHERE ten_tloai = :category), 
            :summary, :content, (SELECT ma_tgia FROM tacgia WHERE ten_tgia = :author), :date_post, :image_article)";
            $statment = $conn->prepare($sql);
            $statment->execute($arguments);
        }

        public function update(array $arguments){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();
            
            $sql = "UPDATE baiviet SET tieude = :title, ten_bhat = :nameSong, ma_tloai = (SELECT ma_tloai FROM theloai WHERE ten_tloai = :category),
            tomtat = :summary', noidung = :content, ma_tgia = (SELECT ma_tgia FROM tacgia WHERE ten_tgia = :author), hinhanh = :image_article WHERE ma_bviet = :id";
            $statment = $conn->prepare($sql);
            $statment->execute($arguments);
            
        }
        public function delete($id){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();
            
            $sql = "DELETE FROM baiviet WHERE ma_bviet = $id";
            $statment = $conn->prepare($sql);
            $statment->execute();
        }
    }


?>