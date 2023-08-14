<?php
$login=false;
$showerror=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "_dbconnect.php";
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $sql="SELECT * FROM `user1` WHERE `Email`='$email'";
    $result=mysqli_query($connect,$sql);
    $rows=mysqli_num_rows($result);
    if($rows==1){
        while ($data = mysqli_fetch_assoc($result)) {
           if(password_verify($password, $data['Password'])) {
            $login=true;
            session_start();
            $_SESSION['login']=true;
            $_SESSION['email']=$email;
            header("location: welcome.php");
           }else{
            $showerror="Invalid Credentials....Please input valid credentials111";
            }
        }
    }
    else{
        $showerror="Invalid Credentials....Please input valid credentials";
    }  
}

?>
<!DOCTYPE html>   
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <?php
    require "./partials/_navbar.php";
    ?>
    <?php
        if($showerror){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Errrrrrrror!!!!</strong> '.$showerror.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } 
    ?>
    <div class="container" >
        <form action="./login.php" method="post">
        <section class="vh-100" style="background-color: #9A616D;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="partials/img1.webp"
                            alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <form>

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Login</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                <label class="form-label" for="form2Example17">Email address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                                <label class="form-label" for="form2Example27">Password</label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                            </div>

                            <a class="small text-muted" href="#!">Forgot password?</a>
                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="signup.php"
                                style="color: #393f81;">Register here</a></p>
                            <a href="#!" class="small text-muted">Terms of use.</a>
                            <a href="#!" class="small text-muted">Privacy policy</a>
                            </form>

                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
</section>
        </form>
    </div>
</body>
</html>