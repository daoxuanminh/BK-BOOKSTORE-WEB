<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v5.6.11, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.6.11, mobirise.com">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:src" content="">
    <meta property="og:image" content="">
    <meta name="twitter:title" content="Page 1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <meta name="description" content="">


    <title>Information Order</title>
    <script src="https://kit.fontawesome.com/da3f2c352c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/socicon/css/styles.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap">
    </noscript>
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="./css/cartcss.css">
    <link rel="stylesheet" href="css/infor_order.css">
    <link rel="stylesheet" href="css/page1_index.css">

</head>

<body>
    <?php
    include "connect_db/connect_db.php";
    $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
    ?>
    <section data-bs-version="5.1" class="menu menu3 cid-sFAA5oUu2Y" once="menu" id="menu3-1">

        <nav class="navbar navbar-dropdown navbar-expand-lg">
            <div class="container">
                <div class="navbar-brand bk-book">

                <span class="navbar-caption-wrap"><a class="navbar-caption text-secondary display-5" href="./page1.php"><img src="./img/logo.jpg" alt="eroor" id="logo"></a></span>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                        <li class="nav-item"><a class="nav-link link text-primary display-7" href="./page1.php">Home&nbsp;</a></li>
                        <li class="nav-item"><a class="nav-link link text-primary display-7" href="./page1.php">Features</a></li>
                        <li class="nav-item"><a class="nav-link link text-primary display-7" href="./page1.php">Shop</a>
                        </li>
                        <li class="nav-item"><a class="nav-link link text-primary display-7" href="page1.php">About</a></li>
                    </ul>
                    <div class="icons-menu">
                        <a class="iconfont-wrapper" href="https://www.facebook.com/nguyenngocanh2002/" target="_blank">
                            <span class="p-2 mbr-iconfont socicon-facebook socicon"></span>
                        </a>
                        <a class="iconfont-wrapper" href="https://t.me/Anhtanul" target="_blank">
                            <span class="p-2 mbr-iconfont socicon-telegram socicon"></span>
                        </a>
                        <a class="iconfont-wrapper" href="https://www.instagram.com/nna2k2/" target="_blank">
                            <span class="p-2 mbr-iconfont socicon-instagram socicon"></span>
                        </a>

                    </div>
                    <?php
                    if (isset($user['account'])) {
                    ?>
                        <div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary display-4" href="logout.php">
                                Logout</a></div>
                    <?php } else { ?>

                        <div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary display-4" href="login.php">
                                Login</a></div>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </section>



    <section data-bs-version="5.1" class="content4 cid-sFADQxFnEn" id="content4-5">


        <div class="container">
            <div class="row justify-content-center">
                <div class="title col-md-12 col-lg-10">
                    <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                        <strong>Your Order</strong>
                    </h3>
                    <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display-5">Mua sắm thuận tiện hơn với <strong>BK BOOK</strong>.</h4>

                </div>
            </div>
        </div>
    </section>

    <section id="table">

        <table>
            <tr>
                <th>STT</th>
                <th>Purchased</th>
                <th>Shipping Status</th>
                <th>Order Date</th>
                <th>Shipping Date</th>
                <th>Name product</th>
                <th>Sum Price</th>
            </tr>
            <?php
            $sql = "select * from order_i where customer_id =  " . $_SESSION['user']['customer_id'] . "";
            $result = mysqli_query($conn, "$sql");
            $i = 1;
            ?>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <th><?php echo $i ?></th>
                    <th> <?php echo $row['purchased'] ?></th>
                    <th> <?php echo $row['shipping_status'] ?></th>
                    <th><?php echo $row['order_date'] ?></th>
                    <th><?php echo $row['shipping_date'] ?></th>
                    <th>
                    <div>Sách 1</div>
                    <div>Sách 1</div>
                    <div>Sách 1</div>
                    </th>
                    <th> <?php echo $row['sum_price'] ?></th>
                </tr>


            <?php $i++;
            } ?>

        </table>
    </section>


    <section data-bs-version="5.1" class="contacts3 map1 cid-sFAOgbarYq" id="contacts3-c">



        <div class="container">
            <div class="mbr-section-head">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                    <strong>Contacts</strong>
                </h3>

            </div>
            <div class="row justify-content-center mt-4">
                <div class="card col-12 col-md-6">
                    <div class="card-wrapper">
                        <div class="image-wrapper">
                            <span class="mbr-iconfont mobi-mbri-phone mobi-mbri" style="color: rgb(5, 56, 107); fill: rgb(5, 56, 107);"></span>
                        </div>
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style mb-1 display-5">
                                <strong>Phone</strong>
                            </h6>
                            <p class="mbr-text mbr-fonts-style display-7">
                                0 (800) 123 45 67
                            </p>
                        </div>
                    </div>
                    <div class="card-wrapper">
                        <div class="image-wrapper">
                            <span class="mbr-iconfont mobi-mbri-letter mobi-mbri" style="color: rgb(5, 56, 107); fill: rgb(5, 56, 107);"></span>
                        </div>
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style mb-1 display-5">
                                <strong>Email</strong>
                            </h6>
                            <p class="mbr-text mbr-fonts-style display-7">
                                <a href="mailto:info@site.com" class="text-primary">info@site.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="map-wrapper col-12 col-md-6">
                    <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.706086416563!2d105.8418001142449!3d21.004415593986383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76e3624a59%3A0x4f3ae5ee12bfcc19!2zVGjGsCB2aeG7h24gVOG6oSBRdWFuZyBC4butdQ!5e0!3m2!1svi!2sus!4v1658204913145!5m2!1svi!2sus" allowfullscreen=""></iframe></div>
                </div>
            </div>
        </div>
    </section>

    <section data-bs-version="5.1" class="footer3 cid-sFAOjz8nX7" once="footers" id="footer3-d">
        <div class="container">
            <div class="media-container-row align-center mbr-white">
                <div class="row row-links">
                    <ul class="foot-menu">
                        <li class="foot-menu-item mbr-fonts-style display-7"><a href="#top" class="text-white">Home</a></li>
                        <li class="foot-menu-item mbr-fonts-style display-7"><a href="index.html#content4-5" class="text-white">Features</a></li>
                        <li class="foot-menu-item mbr-fonts-style display-7"><a href="index.html#content4-6" class="text-white">Shop</a></li>
                        <li class="foot-menu-item mbr-fonts-style display-7"><a href="index.html#features16-9" class="text-white">About</a></li>
                        <li class="foot-menu-item mbr-fonts-style display-7"><a href="index.html#contacts3-c" class="text-white">Contacts</a></li>
                    </ul>
                </div>
                <div class="row social-row">
                    <div class="social-list align-right pb-2">

                        <div class="soc-item">
                            <a href="https://twitter.com/mobirise" target="_blank">
                                <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.youtube.com/c/mobirise" target="_blank">
                                <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://instagram.com/mobirise" target="_blank">
                                <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                                <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.behance.net/Mobirise" target="_blank">
                                <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row row-copirayt">
                    <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                        © Copyright 2025 Mobirise. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="display-7" style="padding: 0;align-items: center;justify-content: center;flex-wrap: wrap;    align-content: center;display: flex;position: relative;height: 4rem;"><a href="https://mobiri.se/2826850" style="flex: 1 1;height: 4rem;position: absolute;width: 100%;z-index: 1;"><img alt="" style="height: 4rem;" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="></a>
        <p style="margin: 0;text-align: center;" class="display-7">Created with &#8204;</p><a style="z-index:1" href="https://mobirise.com"> Web Site Software</a>
    </section>



    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/ytplayer/index.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/theme/js/script.js"></script>

</body>

</html>