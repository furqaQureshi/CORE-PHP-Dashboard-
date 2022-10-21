<?php

use LDAP\Result;

include 'db.php';
session_start();
if (isset($_SESSION["username"])) {
    header('location: dashboard.php');
}

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $password = MD5($_POST["password"]);
    $roles = $_POST['roles'];
    $sql = "select * from users where username = '$username' and password = '$password' and roles = '$roles'";
    $result = mysqli_query($con, $sql);
    $check = mysqli_num_rows($result);
    $row = $result->fetch_assoc();
    if ($check > 0) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['first_name'] = $row['firstname'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_roles'] = $row['roles'];
        $_SESSION['user_image'] = $row['imgpaths'];
        header('location: dashboard.php');
    } else {
        echo "<div class='alert alert-danger'>Your Username and password and Roles not match</div>";
    }
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Ample Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h1>SignIn Form</h1>
                <form action="" method="post">
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">UserName</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" class="form-control p-0 border-0" name="username" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" name="password" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-md-12 p-0">
                                            <label class="col-md-12 p-0">User Roles</label>
                                            <select class="form-select shadow-none row border-top" name="roles">
                                                <option value="">select Your Options</option>
                                                <option value="admin" <?php if (isset($_SESSION['roles']) == 'admin') ?>>Admin</option>
                                                <option value="employee" <?php if (isset($_SESSION['roles']) == 'employee') ?>>Employee</option>
                                                <option value="user" <?php if (isset($_SESSION['roles']) == 'user') ?>>User</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success" name="submit">SignIn Profile</button>
                                <a href="register.php" class="float-end">Register</a>
                            </div>
                        </div>
                </form>

                <!-- end form -->
            </div>
        </div>
    </div>
    </form>
    </div>
    </div>
    <footer class="footer text-center mb-2"> 2021 © Ample Admin brought to you by <a>wrappixel.com</a>
    </footer>
    </div>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>