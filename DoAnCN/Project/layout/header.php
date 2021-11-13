<?php
    include ('../page/connect.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../img/fav-icon.png" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cake - Bakery</title>

    <!-- Icon css link -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/linearicons/style.css" rel="stylesheet">
    <link href="../vendors/flat-icon/flaticon.css" rel="stylesheet">
    <link href="../vendors/stroke-icon/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="../vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="../vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="../vendors/revolution/css/navigation.css" rel="stylesheet">
    <link href="../vendors/animate-css/animate.css" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="../vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="../vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">
    <link href="../vendors/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="../vendors/nice-select/css/nice-select.css" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
        session_start();
        if(isset($_GET["LogOut"])) {
            unset($_SESSION["username"]);
            echo "<script>location='index.php';</script>";
        }

    ?>
</head>
<body>

<!--================Main Header Area =================-->
<header class="main_header_area">
    <div class="top_header_area row m0 header-color">
        <div class="container">
            <div class="float-left">
                <a href=""><i class="fa fa-phone" aria-hidden="true"></i> + (1800) 456 7890</a>
                <a href=""><i class="fa fa-envelope-o" aria-hidden="true"></i> info@cakebakery.com</a>
            </div>
            <div class="float-right">
                <ul class="h_social list_style">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                <?php
                $number=0;
                if(isset($_SESSION["giohang"])){
                    $giohang=$_SESSION["giohang"];
                    foreach ($giohang as $key => $value){
                        $number+=(int)$value["number"];
                    }
                }
                ?>
                <ul class="h_search list_style">
                    <li class="shopcart"><a href="../page/cart.php" class="lnr lnr-cart" id="numcart"><?php echo $number?></a></li>
                    <li><a class="popup-with-zoom-anim" href="#test-search"><i class="fa fa-search"></i></a></li>
                </ul>
                <?php
                    if(!isset($_SESSION["username"])) {
                ?>
                <ul class="h_search list_style">
                    <li><a href="../page/login.php" class="pink_btn" style="">LOGIN</a></li>
                </ul>
                <?php } else {?>
                    <ul class="h_search list_style">
                        <li>
                            <a href="../page/infocustomer.php">
                                <i class="fa fa-user-circle"></i>
                                <?php echo$_SESSION["username"]?>
                            </a>
                            <a href="<?php echo $_SERVER["PHP_SELF"]?>?LogOut=0" class="pink_btn">
                                <i class="revicon-logout"></i>LogOut
                            </a>
                        </li>
                    </ul>
                <?php }?>
            </div>
        </div>
    </div>
    <div class="main_menu_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="../page/index.php">
                    <img src="../img/logo.png" alt="">
                    <img src="../img/logo-2.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="my_toggle_menu">
                            	<span></span>
                            	<span></span>
                            	<span></span>
                            </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="dropdown submenu">
                            <a href="../page/index.php">Home</a>
                        </li>
                        <li><a href="../page/cake.php">Our Cakes</a></li>
                        <li class=""><a href="../page/menu.php">Menu</a></li>
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About Us</a>
                            <ul class="dropdown-menu">
                                <li><a href="../page/about-us.php">About Us</a></li>
                                <li><a href="../page/our-team.php">Our Chefs</a></li>
                                <li><a href="../page/testimonials.php">Testimonials</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav justify-content-end">
                        <li class="dropdown submenu">
                            <a href="../page/service.php" >Course</a>
                        </li>
                        <li class="dropdown submenu">
                            <a href="../page/blog-2column.php">Blog</a>
                        </li>
                        <li class="dropdown submenu">
                            <a href="../page/shop.php">Shop</a>
                        </li>
                        <li><a href="../page/contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
