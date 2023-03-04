<?php
    include 'views/include/header.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="assets/css/style_login.css">
    <main class="container mt-5 mb-5">
        <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Sign In</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="login.php?action=run" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtUser" ><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="username" name ="txtUser" >
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtPass" ><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="password" name ="txtPass">
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div>
                            <div class="d-flex justify-content-center">
                            <?php
                            if(isset($_GET['error'])){
                            echo "<h5 style='color:red'>{$_GET['error']}</h5>";
                            }
                            ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn float-end login_btn" name ="btnLogin">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center ">
                            Don't have an account?<a href="#" class="text-warning text-decoration-none text-sign-up"> Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="text-warning text-decoration-none">Forgot your password?</a>
                        </div>
                        
                    </div>
                </div>
        </div>
    </main>
<?php
    include 'views/include/admin/footer.php';
?>    