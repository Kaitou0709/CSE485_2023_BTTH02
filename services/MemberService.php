<?php
include_once(__DIR__ . '/../configs/DBConnection.php');
include_once(__DIR__ . '/../models/Member.php');
class MemberService
{
    public function run()
    {
        session_start();
        if (isset($_POST['btnLogin'])) {
            if (empty($_POST['txtUser']) || empty(($_POST['txtPass']))) {
                header("Location:login.php?error=Vui lòng điền mật khẩu tài khoản");
            } else {
                $dbconn = new DBConnection();
                $conn = $dbconn->getConnection();
                $query = "SELECT * FROM nguoidung WHERE ten_dnhap = :user AND mat_khau = :pass";
                $statement = $conn->prepare($query);
                $statement->execute(
                    array(
                        ':user' => $_POST["txtUser"],
                        ':pass' => $_POST["txtPass"]
                    )
                );
                $count = $statement->rowCount();
                if ($count > 0) {
                    $_SESSION["check"] = $_POST["txtUser"];
                    header("location:admin_index.php");
                } else {
                    header("Location:login.php?error=Sai Mật khẩu tài khoản");
                }
            }
        }
    }
    public function checkSession()
    {
    session_start();
    if(!isset($_SESSION['check'])){
        header("Location:login.php");
    }
    }
    public function logOut()
    {
    session_start();
    if(isset($_SESSION['check'])){
        unset($_SESSION['check']);
        header("Location:login.php");
    }
    }
}
?>