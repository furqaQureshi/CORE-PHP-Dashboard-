<?php
include "db.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('location: signin.php');
}

if (isset($_POST["submit"])) {
    $proname = $_POST["proname"];
    $proprice = $_POST["proprice"];
    $username = $_SESSION['username'];
    $proqty = $_POST["proqty"];
    $file = $_FILES['imgpath']['name'];
    $file_tmp = $_FILES['imgpath']['tmp_name'];
    move_uploaded_file($file_tmp, "upload/" . $file);
    $sql = "insert into product (proname,proqty,proprice,username,imgpath) values ('$proname','$proprice','$proqty','$username','$file')";
    if (mysqli_query($con, $sql)) {
        header('location: basic_table.php');
    } else {
        echo "<div class='alert alert-danger text-center'>Your Data No Add</div>";
    }
}
$user_img =  $_SESSION['user_image']; 
$FileUrl =  BASE_URL . "lite/uploads/". $user_img;

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
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="dashboard.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="plugins/images/logo-icon.png" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="plugins/images/logo-text.png" alt="homepage" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><span class="text-white font-medium">
                                    <?php
                                    echo 'Hello ';
                                    echo $_SESSION['username'];
                                    ?>
                                </span></a>
                            <a href="logout.php" class="btn btn-dark">logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Products</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic_table.php" aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Product Records</span>
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
        </aside>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="page-wrapper">
                <div class="page-breadcrumb bg-white">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">
                                <?php
                                echo $_SESSION['username'];
                                echo " Product Page"
                                ?>
                            </h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="container-fluid">
                    <form class="container" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Column -->
                            <div class="col-lg-4 col-xlg-3 col-md-12">
                                <div class="white-box">
                                    <div class="user-bg">
                                        <img width="100%" alt="user" src="plugins/images/large/img1.jpg">
                                        <div class="overlay-box">
                                            <div class="user-content">
                                                    <!-- user images -->
                                                    <img src="<?php echo $FileUrl ?>" class="thumb-lg img-circle">
                                                <h4 class="text-white mt-2">
                                                    <?php
                                                    echo $_SESSION['username'];
                                                    ?>
                                                </h4>
                                                <h5 class="text-white mt-2"><?php echo $_SESSION['user_email']?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-btm-box mt-5 d-md-flex">
                                        <div class="col-md-4 col-sm-4 text-center">
                                            <h1>258</h1>
                                        </div>
                                        <div class="col-md-4 col-sm-4 text-center">
                                            <h1>125</h1>
                                        </div>
                                        <div class="col-md-4 col-sm-4 text-center">
                                            <h1>556</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xlg-9 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Product Name</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input type="text" name="proname" placeholder="Product Nmae" class="form-control p-0 border-0">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Product Price</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input type="number" name="proprice" placeholder="123 456 7890" class="form-control p-0 border-0">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Product Iamage</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input type="file" name="imgpath" placeholder="123 456 7890" class="form-control p-0 border-0">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Product Quantity</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input type="number" name="proqty" placeholder="123 456 7890" class="form-control p-0 border-0">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" name="submit">Add Product</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a>wrappixel.com</a>
                </footer>
            </div>
        </form>
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
</body>

</html>