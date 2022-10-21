<?php
include 'db.php';
session_start();
if (isset($_SESSION["username"])) {
    header('location: dashboard.php');
}
if (isset($_POST["submit"])) {
    $firstname = $_POST['firstname'];
    $username = $_POST["username"];
    $useremail = $_POST["email"];
    $userpassword = MD5($_POST["password"]);
    $roles = $_POST['roles'];
    if (file_exists("uploads/" . $_FILES["imgaddress"]["name"])) {
        $file =  $_FILES["imgaddress"]["name"];
    } else {
        $file =  move_uploaded_file($_FILES["imgaddress"]["tmp_name"], "uploads/" . $_FILES["imgaddress"]["name"]);
    };
    $sql = "insert into users (firstname, username, email, password, roles, imgpaths) values ('$firstname','$username','$useremail','$userpassword', '$roles','$file')";
    $save = mysqli_query($con, $sql);
    if ($save > 0) {
        header('location: signin.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <h1>Register Form</h1>
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">First Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="firstname" placeholder="user name" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">User Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="username" placeholder="user name" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">User Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="email" placeholder="user email" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" name="password" class="form-control p-0 border-0" placeholder="user password">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Choose Iamage</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" name="imgaddress" placeholder="123 456 7890" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-md-12 p-0">
                                            <label class="col-md-12 p-0">User Roles</label>
                                            <select class="form-select shadow-none row border-top" name="roles">
                                                <option value="">select Your Options</option>
                                                <option value="admin">Admin</option>
                                                <option value="employee">Employee</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" name="submit">Register</button>
                                            <a href="signin.php" class="float-end lead">
                                                Sign IN
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a>wrappixel.com</a>
            </footer>
        </div>
        <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/app-style-switcher.js"></script>
        <!--Wave Effects -->
        <script src="js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="js/custom.js"></script>
    </form>
</body>

</html>