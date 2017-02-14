<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bushido - HTML5 E-Commerce Template</title>
    <!--SEO Meta Tags-->
    <meta name="description" content="Responsive HTML5 E-Commerce Template" />
    <meta name="keywords" content="responsive html5 template, e-commerce, shop, bootstrap 3.0, css, jquery, flat, modern" />
    <meta name="author" content="8Guild" />
    <!--Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!--Favicon-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('assets/');?>favicon.ico" type="image/x-icon">
    <!--Master Slider Styles-->
    <link href="<?php echo base_url('assets/');?>masterslider/style/masterslider.css" rel="stylesheet" media="screen">
    <!--Styles-->

    <link href="<?php echo base_url('assets/');?>css/styles.css" rel="stylesheet" media="screen">
    <!--Color Scheme-->
    <link class="color-scheme" href="<?php echo base_url('assets/');?>css/colors/color-scheme2.css" rel="stylesheet" media="screen">
    <!--Color Switcher-->
    <!--Modernizr-->
    <script src="<?php echo base_url('assets/');?>js/libs/modernizr.custom.js"></script>
    <!--Adding Media Queries Support for IE8-->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('assets/');?>js/plugins/respond.js"></script>
    <![endif]-->
    <!--Google Analytics-->
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-46803427-2']);
        _gaq.push(['_trackPageview']);
        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';

            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>

<!--Body-->
<body>


<!--Login Modal-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h2>Login or <a href="register.html">Register</a></h2>
                <p class="large">Use social accounts</p>
                <div class="social-login">
                    <a class="facebook" href="#"><i class="fa fa-facebook-square"></i></a>
                    <a class="google" href="#"><i class="fa fa-google-plus-square"></i></a>
                    <a class="twitter" href="#"><i class="fa fa-twitter-square"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <form class="login-form">
                    <div class="form-group group">
                        <label for="log-email">Email</label>
                        <input type="email" class="form-control" name="log-email" id="log-email" placeholder="Enter your email" required>
                        <a class="help-link" href="#">Forgot email?</a>
                    </div>
                    <div class="form-group group">
                        <label for="log-password">Password</label>
                        <input type="text" class="form-control" name="log-password" id="log-password" placeholder="Enter your password" required>
                        <a class="help-link" href="#">Forgot password?</a>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember"> Remember me</label>
                    </div>
                    <input class="btn btn-success" type="submit" value="Login">
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Header-->
<header data-offset-top="500" data-stuck="600"><!--data-offset-top is when header converts to small variant and data-stuck when it becomes visible. Values in px represent position of scroll from top. Make sure there is at least 100px between those two values for smooth animation-->

    <!--Search Form-->
    <form class="search-form closed" method="get" role="form" autocomplete="off">
        <div class="container">
            <div class="close-search"><i class="icon-delete"></i></div>
            <div class="form-group">
                <label class="sr-only" for="search-hd">Search for procuct</label>
                <input type="text" class="form-control" name="search-hd" id="search-hd" placeholder="Search for procuct">
                <button type="submit"><i class="icon-magnifier"></i></button>
            </div>
        </div>
    </form>

    <!--Split Background-->
    <div class="left-bg"></div>
    <div class="right-bg"></div>

    <div class="container">
        <a class="logo" href="<?php echo base_url('');?>"><img src="<?php echo base_url('assets/');?>img/logo.png" alt="Bushido"/></a>

        <!--
        <ul class="switchers">
            <li>$
                <ul class="dropdown">
                    <li><a href="#">&euro;</a></li>
                    <li><a href="#">$</a></li>
                </ul>
            </li>
            <li>En
                <ul class="dropdown">
                    <li><a href="#">En</a></li>
                    <li><a href="#">Fr</a></li>
                    <li><a href="#">Gr</a></li>
                </ul>
            </li>
        </ul> -->

        <!--Mobile Menu Toggle-->
        <div class="menu-toggle"><i class="fa fa-list"></i></div>
        <div class="mobile-border"><span></span></div>

        <!--Main Menu-->
        <nav class="menu">
            <ul class="main">
                <li class="has-submenu"><a href="index.html">Home<i class="fa fa-chevron-down"></i></a><!--Class "has-submenu" for proper highlighting and dropdown-->
                    <ul class="submenu">
                        <li><a href="index.html">Home - Slideshow</a></li>
                        <li><a href="home-fullscreen.html">Home - Fullscreen Slider</a></li>
                        <li><a href="home-showcase.html">Home - Product Showcase</a></li>
                        <li><a href="home-categories.html">Home - Categories Slider</a></li>
                        <li><a href="home-offers.html">Home - Special Offers</a></li>
                    </ul>
                </li>
                <li class="has-submenu"><a href="shop-filters-left-3cols.html">Shop<i class="fa fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="shop-filters-left-3cols.html">Shop - Filters Left 3 Cols</a></li>
                        <li><a href="shop-filters-left-2cols.html">Shop - Filters Left 2 Cols</a></li>
                        <li><a href="shop-filters-right-3cols.html">Shop - Filters Right 3 Cols</a></li>
                        <li><a href="shop-filters-right-2cols.html">Shop - Filters Right 2 Cols</a></li>
                        <li><a href="shop-no-filters-4cols.html">Shop - No Filters 4 Cols</a></li>
                        <li><a href="shop-no-filters-3cols.html">Shop - No Filters 3 Cols</a></li>
                        <li><a href="shop-single-item-v1.html">Shop - Single Item Vers 1</a></li>
                        <li><a href="shop-single-item-v2.html">Shop - Single Item Vers 2</a></li>
                        <li><a href="shopping-cart.html">Shopping Cart</a></li>
                        <li><a href="checkout.html">Checkout Page</a></li>
                        <li><a href="wishlist.html">Wishlist</a></li>
                    </ul>
                </li>
                <li class="has-submenu"><a href="blog-sidebar-right.html">Blog<i class="fa fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="blog-sidebar-left.html">Blog - Sidebar Left</a></li>
                        <li><a href="blog-sidebar-right.html">Blog - Sidebar Right</a></li>
                        <li><a href="blog-single.html">Blog - Single Post</a></li>
                    </ul>
                </li>
                <li class="has-submenu"><a href="#">Pages<span class="label">NEW</span><i class="fa fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="register.html">Login / Registration</a></li>
                        <li><a href="account-personal-info.html">Account: Personal Info<span class="label">NEW</span></a></li>
                        <li><a href="account-addresses.html">Account: Addresses<span class="label">NEW</span></a></li>
                        <li><a href="order-history.html">Orders History<span class="label">NEW</span></a></li>
                        <li><a href="order-tracking.html">Order Tracking<span class="label">NEW</span></a></li>
                        <li><a href="delivery-info.html">Delivery Info<span class="label">NEW</span></a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="coming-soon.html">Coming Soon</a></li>
                        <li><a href="404.html">404 Page</a></li>
                        <li><a href="support.html">Support Page</a></li>
                        <li><a href="cs-page.html">Components &amp; Styles</a></li>
                    </ul>
                </li>
                <li class="hide-sm"><a href="support.html">Support</a></li>
            </ul>
            <ul class="catalog">
                <li class="has-submenu"><a href="shop-filters-left-3cols.html">Phones<i class="fa fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="#">Nokia</a></li>
                        <li class="has-submenu"><a href="#">iPhone</a><!--Class "has-submenu" for adding carret and dropdown-->
                            <ul class="sub-submenu">
                                <li><a href="#">iPhone 4</a></li>
                                <li><a href="#">iPhone 4s</a></li>
                                <li><a href="#">iPhone 5c</a></li>
                                <li><a href="#">iPhone 5s</a></li>
                            </ul>
                        </li>
                        <li><a href="#">HTC</a></li>
                        <li class="has-submenu"><a href="#">Samsung</a>
                            <ul class="sub-submenu">
                                <li><a href="#">Galaxy Note 3</a></li>
                                <li><a href="#">Galaxy S5</a></li>
                                <li><a href="#">Galaxy S3 Neo</a></li>
                                <li><a href="#">Galaxy Gear</a></li>
                                <li><a href="#">Galaxy S Duos 2</a></li>
                            </ul>
                        </li>
                        <li><a href="#">BlackBerry</a></li>
                        <li class="offer">
                            <div class="col-1">
                                <p class="p-style2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="col-2">
                                <img src="<?php echo base_url('assets/');?>img/offers/menu-drodown-offer.jpg" alt="Special Offer"/>
                                <a class="btn btn-block" href="#"><span>584$</span>Special offer</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li><a href="shop-filters-left-3cols.html">Cameras</a></li>
                <li><a href="shop-filters-left-3cols.html">Personal computers</a></li>
                <li><a href="shop-filters-left-3cols.html">Gaming consoles</a></li>
                <li><a href="shop-filters-left-3cols.html">TV sets</a></li>
            </ul>
        </nav>

        <!--Toolbar-->
        <div class="toolbar group">
            <button class="search-btn btn-outlined-invert"><i class="icon-magnifier"></i></button>
            <div class="middle-btns">
                <a class="btn-outlined-invert" href="<?php echo base_url('cadastro');?>"><i class="icon-paper-pencil"></i> <span>Cadastro</span></a>
                <a class="login-btn btn-outlined-invert" href="#" data-toggle="modal" data-target="#loginModal"><i class="icon-profile"></i> <span>Login</span></a>
            </div>

        </div><!--Toolbar Close-->
    </div>
</header><!--Header Close-->
