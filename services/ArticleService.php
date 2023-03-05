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
        public function getArticleIdTheloai($ma_tloai)
        {
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();
            $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, baiviet.tomtat,
                    baiviet.noidung, tacgia.ten_tgia, baiviet.ngayviet, baiviet.hinhanh FROM baiviet 
                    INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                    INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
                    WHERE baiviet.ma_tloai  = $ma_tloai";
            $statment = $conn->query($sql);
            $articles = [];
            while($row = $statment->fetch()){
                $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'],
                                        $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
                array_push($articles, $article);
            }
            return $articles;
        }
    }
?>