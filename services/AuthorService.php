<?php
    include("configs/DBConnection.php");
    include("models/Author.php");
class AuhtorService{
    public function getAllAuthors(){

       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM tacgia";
        $stmt = $conn->query($sql);

        $authors = [];
        while($row = $stmt->fetch()){
            $author = new Author($row['ma_tgia'], $row['ten_tgia']);
            array_push($authors,$auhtor);
        }

        return $authors;
    }

    public function getAuByID(array $arguments){   
        $database = new DBConnection();
        $pdo  = $database->getConnection();          
        $stmt = $pdo->prepare("SELECT * FROM tacgia WHERE ma_tgia=:matacgia");
        $stmt->execute($arguments);
        $row  = $stmt->fetch();
        $author = new Author($row['ma_tgia'], $row['ten_tgia']);
        $pdo  = null;                               
        return $author;
    }

    public function insert(array $arguments){
        $dbconn = new DBConnection();
        $conn   = $dbconn->getConnection();
        $sql    = "INSERT INTO tacgia( ma_tgia, ten_tgia) VALUES(:matgia, :ten ) ";
        $statement = $conn->prepare($sql);
        $statement->execute($arguments);
    }

    public function update(array $arguments){
        $dbConn = new DBConnection();
        $conn   = $dbconn->getConnection();
        $sql    = "UPDATE tacgia SET `ten_tgia` = '$ten_tgia' WHERE `tacgia`.`ma_tgia` = '$ma_tgia'";
        $statement = $conn->prepare($sql);
        $statement->execute($arguments);
    }

    public function delete($ma_tgia){
        $dbconn = new DBConnection();
        $conn   = $dbconn->getConnection();

        $sql ="DELETE FROM tacgia WHERE ma_tgia = $ma_tgia";
        $statement = $conn->prepare($sql);
        $statement->execute();
    }

}?>