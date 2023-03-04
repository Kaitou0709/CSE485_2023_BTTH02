<?php
include("services/MemberService.php");
class MemberController{
    public function run()
    {
        $memberService = new MemberService();
        $memberService->run();
    }
    public function index()
    {
        session_start();
        if(isset($_SESSION['check'])){
        header("Location:admin_index.php");
        }
        else
        {
        include('views/user/login.php');
    }
    }
    public function logOut()
    {
        $memberService = new MemberService();
        $memberService->logOut();
    }
    public function checkSession()
    {
        $memberService = new MemberService();
        $memberService->checkSession();
    }
}
?>