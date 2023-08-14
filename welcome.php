<?php
session_start();
if(!isset($_SESSION['login'])|| $_SESSION['login']!=true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome-<?php echo $_SESSION['email'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    require "./partials/_navbar.php";
    ?>
    <div class="container my-4">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Hello <?php echo $_SESSION['email']?></h4>
        <p>Aww yeah, you successfully make the login system now you have to make the logout system</p>
        <hr>
        <p class="mb-0">Whenever you need tologout click on the below link</p>
        <a href="logout.php">Logout</a>
        </div>
    </div>

</body>
</html>