<?php
    include("configs/DBConnection.php");
    include("models/Author.php");
class AuthorService{
    public function getAllAuthors(){

       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM tacgia";
        $stmt = $conn->query($sql);

        $authors = [];
        while($row = $stmt->fetch()){
            $author = new Author($row['ma_tgia'], $row['ten_tgia']);
            array_push($authors,$author);
        }

        return $authors;
    }

    public function getAuById($idAu){   
        $database = new DBConnection();
        $pdo = $database->getConnection();      
        $stmt = $pdo->prepare("SELECT ten_tgia) FROM tacgia WHERE ma_tgia=$idAu");
        $row = $stmt->fetch();             
        return $row;
    }

    public function insert(array $arguments){
        $dbconn = new DBConnection();
        $conn   = $dbconn->getConnection();
        $sl = "SELECT MAX(ma_tgia) AS max_id FROM tacgia";
        $result = $conn->query($sl);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $max_id = $row['max_id'];
        $sql    = "INSERT INTO tacgia( ma_tgia, ten_tgia) VALUES($max_id+1, :tentacgia ) ";
        $statement = $conn->prepare($sql);
        $statement->execute($arguments);
    }

    public function update(array $arguments){
        $dbConn = new DBConnection();
        $conn   = $dbConn->getConnection();
        $sql    = "UPDATE tacgia SET `ten_tgia` = :ten_tgia WHERE `ma_tgia` = :ma_tgia";
        $statement = $conn->prepare($sql);
        $statement->execute($arguments);
    }

    public function delete($ma_tgia){
        $dbconn = new DBConnection();
        $conn   = $dbconn->getConnection();
        $sql ="DELETE FROM tacgia WHERE `tacgia`.`ma_tgia` = $ma_tgia";
        $statment = $conn->prepare($sql);
        $statment->execute();
    }

}?>