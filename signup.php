<?php
$showsucess=false;
$showerror=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "_dbconnect.php";
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['u_email'];
    $password=$_POST['u_pass'];
    $cpassword=$_POST['uc_pass'];

    $existsSql="SELECT * FROM `user1` where `Email`='$email'";
    $existsResult=mysqli_query($connect,$existsSql);
    $existsRows=mysqli_num_rows($existsResult);
    if($existsRows>0){
        $showerror="Email Already Exists";
    } 
    else{
        if(($cpassword==$password) ){
            $hash=password_hash($password, PASSWORD_DEFAULT);
            $sql="INSERT INTO `user1` (`FirstName`, `LastName`, `Email`,`Password`, `Time`) VALUES ('$fname', '$lname', '$email','$hash', current_timestamp())";
            $result=mysqli_query($connect,$sql);
            if($result){
                $showsucess=true;
            } 
        }else{
            $showerror='Passwords do not Match';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    require "./partials/_navbar.php"; ?>
    <?php
    if($showsucess){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your Data is been Successfully Added.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if($showerror){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Errrrrrrror!!!!</strong> '.$showerror.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }  
    ?>
    <div class="container" >
        <form action="./signup.php" method="post"> 
            <section class="text-center">
                <div class="card mx-4 mx-md-5 shadow-5-strong" style="
                    margin-top: 50px;
                    background: hsla(194, 68%, 85%, 0.8);
                    backdrop-filter: blur(30px);
                    ">
                <div class="card-body py-5 px-md-5">
                    <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Sign up now</h2>
                        <form>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="fname" class="form-control" name="fname"  />
                                <label class="form-label" for="fname">First name</label>
                            </div>
                            </div>
                            <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="lname" class="form-control"  name="lname"/>
                                <label class="form-label" for="lname">Last name</label>
                            </div>
                            </div>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" id="email" class="form-control"  name="u_email"/>
                            <label class="form-label" for="email">Email address</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" id="pass" name="u_pass" class="form-control" />
                            <label class="form-label" for="pass">Password</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" id="cpass" name="uc_pass" class="form-control" />
                            <label class="form-label" for="cpass"> Confirm Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-4">
                            Sign up
                        </button>
                        <div class="text-center">
                            <p>or sign up with:</p>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                            </button>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                            </button>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                            </button>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                            </button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </section>
        </form>
    </div>
</body>
</html>