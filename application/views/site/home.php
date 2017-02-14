<?php $this->load->view('site/fixed_files/header'); ?>


<!--Page Content-->

<div class="page-content">

    <!--Hero Slider-->
    <section class="hero-slider">
        <div class="master-slider" id="hero-slider">

            <!--Slide 1-->
            <div class="ms-slide" data-delay="7">
                <div class="overlay"></div>
                <img src="<?php echo base_url('assets/');?>masterslider/blank.gif" data-src="<?php echo base_url('assets/');?>img/hero/slideshow/slide_2.jpg" alt="Nikon D4S"/>
                <h2 style="width: 456px; left: 110px; top: 110px;" class="light-color ms-layer" data-effect="top(50,true)" data-duration="700" data-delay="250" data-ease="easeOutQuad">Nikon D4S</h2>
                <p style="width: 456px; left: 110px; top: 210px;" class="light-color ms-layer" data-effect="back(500)" data-duration="700" data-delay="500" data-ease="easeOutQuad">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
                <div style="left: 110px; top: 300px;" class="ms-layer button" data-effect="bottom(50,true)" data-duration="600" data-delay="950" data-ease="easeOutQuad"><a class="btn btn-primary" href="#"><span>1845$</span>Buy it now</a></div>
            </div>

            <!--Slide 2-->
            <div class="ms-slide" data-delay="7">
                <span class="overlay"></span>
                <img src="<?php echo base_url('assets/');?>masterslider/blank.gif" data-src="<?php echo base_url('assets/');?>img/hero/slideshow/slide_2.jpg" alt="Nest"/>
                <h2 style="width: 456px; left: 110px; top: 110px;" class="light-color ms-layer" data-effect="bottom(50,true)" data-duration="700" data-delay="250" data-ease="easeOutQuad">Nest</h2>
                <p style="width: 456px; left: 110px; top: 210px;" class="light-color ms-layer" data-effect="bottom(50,true)" data-duration="700" data-delay="500" data-ease="easeOutQuad">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
                <div style="left: 110px; top: 300px;" class="ms-layer button" data-effect="rotatebottom(30|90,long,br,true)" data-duration="600" data-delay="950" data-ease="easeOutQuad"><a class="btn btn-primary" href="#"><span>1640$</span>Buy it now</a></div>
            </div>

            <!--Slide 3-->
            <div class="ms-slide" data-delay="7">
                <div class="overlay"></div>
                <img src="<?php echo base_url('assets/');?>masterslider/blank.gif" data-src="<?php echo base_url('assets/');?>img/hero/slideshow/slide_2.jpg" alt="3D Printer"/>
                <h2 style="width: 456px; left: 110px; top: 110px;" class="light-color ms-layer" data-effect="left(50,true)" data-duration="700" data-delay="250" data-ease="easeOutQuad">3D Printer</h2>
                <p style="width: 456px; left: 110px; top: 210px;" class="light-color ms-layer" data-effect="left(50,true)" data-duration="700" data-delay="500" data-ease="easeOutQuad">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
                <div style="left: 110px; top: 300px;" class="ms-layer button" data-effect="left(50,true)" data-duration="600" data-delay="950" data-ease="easeOutQuad"><a class="btn btn-primary" href="#"><span>2500$</span>Buy it now</a></div>
            </div>

        </div>
    </section><!--Hero Slider Close-->

    <!--Categories-->
    <section class="cat-tiles">
        <div class="container">
            <h2>Browse categories</h2>
            <div class="row">

                <?php for($i=0;$i<=5;$i++):?>
                <div class="category col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <a href="#">
                        <img src="<?php echo base_url('assets/');?>img/categories/1.png" alt="1"/>
                        <p>Category name</p>
                    </a>
                </div>
                <?php endfor;?>

            </div>
        </div>
    </section><!--Categories Close-->

    <!--Catalog Grid-->
    <section class="catalog-grid">
        <div class="container">
            <h2 class="primary-color">Principais Leilões</h2>
            <div class="row">


                <?php for($i=0;$i<=11;$i++):?>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="tile">
                        <div class="badges">
                            <span class="sale"></span>
                        </div>
                        <div class="price-label">715,00 $</div>
                        <a href="#"><img src="<?php echo base_url('assets/');?>img/catalog/1.png" alt="1"/></a>
                        <div class="footer">
                            <a href="#">Nikon D5300</a>
                            <span>by Pirate3d</span>
                            <div class="tools">
                                <div class="rate">
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <!--Add To Cart Button-->
                                <a class="add-cart-btn" href="#"><span>To cart</span><i class="icon-shopping-cart"></i></a>
                                <!--Share Button-->
                                <div class="share-btn">
                                    <div class="hover-state">
                                        <a class="fa fa-facebook-square" href="#"></a>
                                        <a class="fa fa-twitter-square" href="#"></a>
                                        <a class="fa fa-google-plus-square" href="#"></a>
                                    </div>
                                    <i class="fa fa-share"></i>
                                </div>
                                <!--Add To Wishlist Button-->
                                <a class="wishlist-btn" href="#">
                                    <div class="hover-state">Wishlist</div>
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endfor;?>
            </div>
        </div>
    </section><!--Catalog Grid Close-->

    <!--Tabs Widget-->
    <section class="tabs-widget">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#bestsel" data-toggle="tab">Bestseller items</a></li>
            <li><a href="#onsale" data-toggle="tab">Items on sale</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="bestsel">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>X-MAS LIGHT IPHONE LENS<span>$14.95</span></div></div>
                                </div>
                                <img src="<?php echo base_url('assets/');?>img/media/1.jpg" alt="1"/>
                            </a>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Hedadset for iPhone<span>$19.40</span></div></div>
                                </div>
                                <img src="<?php echo base_url('assets/');?>img/media/2.jpg" alt="2"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$24.15</span></div></div>
                                </div>
                                <img src="<?php echo base_url('assets/');?>img/media/3.jpg" alt="3"/>
                            </a>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$24.15</span></div></div>
                                </div>
                                <img src="<?php echo base_url('assets/');?>img/media/4.jpg" alt="4"/>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$24.15</span></div></div>
                                </div>
                                <img src="<?php echo base_url('assets/');?>img/media/5.jpg" alt="5"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="onsale">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$14.95</span></div></div>
                                </div>
                                <img src="<?php echo base_url('assets/');?>img/media/6.jpg" alt="6"/>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$19.40</span></div></div>
                                </div>
                                <img src="<?php echo base_url('assets/');?>img/media/7.jpg" alt="7"/>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$19.40</span></div></div>
                                </div>
                                <img src="<?php echo base_url('assets/');?>img/media/8.jpg" alt="8"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$14.95</span></div></div>
                                </div>
                                <img src="<?php echo base_url('assets/');?>img/media/9.jpg" alt="9"/>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$19.40</span></div></div>
                                </div>
                                <img src="<?php echo base_url('assets/');?>img/media/10.jpg" alt="10"/>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$19.40</span></div></div>
                                </div>
                                <img src="<?php echo base_url('assets/');?>img/media/11.jpg" alt="11"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--Tabs Widget Close-->

    <!--Posts/Twitter Widget-->
    <section class="posts-widget">
        <div class="tw-bg"></div>
        <div class="container">
            <div class="row">
                <div class="latest-posts col-lg-8 col-md-8">
                    <div class="row">
                        <div class="col-lg-3">
                            <h2 class="extra-bold">Latests posts</h2>
                            <a class="btn btn-success btn-block" href="#">To blog</a>
                        </div>
                        <div class="col-lg-9">
                            <!--Post-->
                            <div class="post row">
                                <div class="col-lg-6 col-sm-6">
                                    <a href="#"><img src="<?php echo base_url('assets/');?>img/posts-widget/1.jpg" alt="1"/></a>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <h3><a href="#">Another Title</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                    <div class="author"><i class="fa fa-user"></i><a href="#">By Bedismo</a></div>
                                    <div class="comments"><i class="fa fa-comment"></i><a href="#">Comments (34)</a></div>
                                </div>
                            </div><!--Post End-->
                            <!--Post-->
                            <div class="post row">
                                <div class="col-lg-6 col-sm-6">
                                    <a href="#"><img src="<?php echo base_url('assets/');?>img/posts-widget/2.jpg" alt="2"/></a>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <h3><a href="#">Awesome Title</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                    <div class="author"><i class="fa fa-user"></i><a href="#">By Jeddah</a></div>
                                    <div class="comments"><i class="fa fa-comment"></i><a href="#">Comments (101)</a></div>
                                </div>
                            </div><!--Post End-->
                        </div>
                    </div>
                </div>
                <div class="twitter-feed col-lg-4 col-md-4">
                    <a class="tw-follow" href="https://twitter.com/8Guild" target="_blank">
                        <div class="button">Follow us<i class="fa fa-twitter"></i></div>
                        <h2 class="extra-bold">On Twitter <i class="fa fa-twitter"></i></h2>
                    </a>
                    <!--Tweet-->
                    <div class="tweet">
                        <a href="#">@Bedismo</a>
                        <p class="p-style3">Uberly impressed with the AMAZING support I constantly get from awesome!!!</p>
                        <div class="group">
                            <div class="actions">
                                <a href="#">Reply</a>
                                <a href="#">Retweet</a>
                                <a href="#">Favorite</a>
                            </div>
                            <span class="date">5 Mar 2014</span>
                        </div>
                    </div><!--Tweet Close-->
                    <!--Tweet-->
                    <div class="tweet">
                        <a href="#">@Bedismo</a>
                        <p class="p-style3">Uberly impressed with the AMAZING support I constantly get from awesome!!!</p>
                        <div class="group">
                            <div class="actions">
                                <a href="#">Reply</a>
                                <a href="#">Retweet</a>
                                <a href="#">Favorite</a>
                            </div>
                            <span class="date">5 Mar 2014</span>
                        </div>
                    </div><!--Tweet Close-->
                </div>
            </div>
        </div>
    </section>

    <!--Gallery Widget-->
    <section class="gray-bg gallery-widget">
        <div class="container">
            <h2>Product gallery</h2>
            <div class="filters">
                <a class="active" href="#" data-group="all">All</a>
                <a href="#" data-group="camera">Camera</a>
                <a href="#" data-group="flash">Flash</a>
                <a href="#" data-group="lenses">Lenses</a>
                <a href="#" data-group="video">Video</a>
            </div>
            <div class="gallery-grid">
                <!--Item-->
                <div class="gallery-item" data-groups='["camera"]' data-src="img/gallery-widget/1.jpg">
                    <a href="<?php echo base_url('assets/');?>img/gallery-widget/1.jpg">
                        <div class="overlay"><span><i class="icon-expand"></i></span></div>
                        <img src="<?php echo base_url('assets/');?>img/gallery-widget/th_1.jpg" alt="1"/>
                    </a>
                </div>
                <!--Item-->
                <div class="gallery-item" data-groups='["camera"]' data-src="<?php echo base_url('assets/');?>img/gallery-widget/2.jpg">
                    <a href="<?php echo base_url('assets/');?>img/gallery-widget/2.jpg">
                        <div class="overlay"><span><i class="icon-expand"></i></span></div>
                        <img src="<?php echo base_url('assets/');?>img/gallery-widget/th_2.jpg" alt="2"/>
                    </a>
                </div>
                <!--Item-->
                <div class="gallery-item" data-groups='["video"]' data-src="https://www.youtube.com/watch?v=hdEAWW7tZSA">
                    <a href="https://www.youtube.com/watch?v=hdEAWW7tZSA">
                        <div class="overlay"><span><i class="icon-music-play"></i></span></div>
                        <img src="<?php echo base_url('assets/');?>img/gallery-widget/th_3.jpg" alt="3"/>
                    </a>
                </div>
                <!--Item-->
                <div class="gallery-item" data-groups='["lenses"]' data-src="img/gallery-widget/4.jpg">
                    <a href="img/gallery-widget/4.jpg">
                        <div class="overlay"><span><i class="icon-expand"></i></span></div>
                        <img src="img/gallery-widget/th_4.jpg" alt="4"/>
                    </a>
                </div>
                <!--Item-->
                <div class="gallery-item" data-groups='["flash"]' data-src="img/gallery-widget/5.jpg">
                    <a href="<?php echo base_url('assets/');?>img/gallery-widget/5.jpg">
                        <div class="overlay"><span><i class="icon-expand"></i></span></div>
                        <img src="<?php echo base_url('assets/');?>img/gallery-widget/th_5.jpg" alt="5"/>
                    </a>
                </div>
                <!--Item-->
                <div class="gallery-item" data-groups='["flash"]' data-src="img/gallery-widget/6.jpg">
                    <a href="<?php echo base_url('assets/');?>img/gallery-widget/6.jpg">
                        <div class="overlay"><span><i class="icon-expand"></i></span></div>
                        <img src="<?php echo base_url('assets/');?>img/gallery-widget/th_6.jpg" alt="6"/>
                    </a>
                </div>
            </div>
        </div>
    </section><!--Gallery Widget Close-->

    <!--Brands Carousel Widget-->
    <section class="brand-carousel">
        <div class="container">
            <h2>Brands in our shop</h2>
            <div class="inner">
                <a class="item" href="#"><img src="<?php echo base_url('assets/');?>img/brands/jquery.png" alt="jQuery"/></a>
                <a class="item" href="#"><img src="<?php echo base_url('assets/');?>img/brands/wp.png" alt="WordPress"/></a>
                <a class="item" href="#"><img src="<?php echo base_url('assets/');?>img/brands/woo.png" alt="WooCommerce"/></a>
                <a class="item" href="#"><img src="<?php echo base_url('assets/');?>img/brands/android.png" alt="Android"/></a>
                <a class="item" href="#"><img src="<?php echo base_url('assets/');?>img/brands/macgasm.png" alt="Macgasm"/></a>
                <a class="item" href="#"><img src="<?php echo base_url('assets/');?>img/brands/dropbox.png" alt="Dropbox"/></a>
            </div>
        </div>
    </section><!--Brands Carousel Close-->

</div><!--Page Content Close-->

<!--Sticky Buttons-->
<div class="sticky-btns">
    <form class="quick-contact ajax-form" method="post" name="quick-contact">
        <h3>Contact us</h3>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
        <div class="form-group">
            <label for="qc-name">Full name</label>
            <input class="form-control input-sm" type="text" name="name" id="qc-name" placeholder="Enter full name">
        </div>
        <div class="form-group">
            <label for="qc-email">Email</label>
            <input class="form-control input-sm" type="email" name="email" id="qc-email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="qc-message">Your message</label>
            <textarea class="form-control input-sm" name="message" id="qc-message" placeholder="Enter your message"></textarea>
        </div>
        <!-- Validation Response -->
        <div class="response-holder"></div>
        <!-- Response End -->
        <input class="btn btn-success btn-sm btn-block" type="submit" value="Send">
    </form>
    <span id="qcf-btn"><i class="fa fa-envelope"></i></span>
    <span id="scrollTop-btn"><i class="fa fa-chevron-up"></i></span>
</div><!--Sticky Buttons Close-->

<!--Subscription Widget-->
<section class="subscr-widget">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-8 col-sm-8">
                <h2 class="light-color">Subscribe to our news</h2>

                <!--Mail Chimp Subscription Form-->
                <form class="subscr-form" role="form" action="//8guild.us3.list-manage.com/subscribe/post?u=168a366a98d3248fbc35c0b67&amp;id=d704057a31" target="_blank" method="post" autocomplete="off">
                    <div class="form-group">
                        <label class="sr-only" for="subscr-name">Enter name</label>
                        <input type="text" class="form-control" name="FNAME" id="subscr-name" placeholder="Enter name" required>
                        <button class="subscr-next"><i class="icon-arrow-right"></i></button>
                    </div>
                    <div class="form-group fff" style="display: none">
                        <label class="sr-only" for="subscr-email">Enter email</label>
                        <input type="email" class="form-control" name="EMAIL" id="subscr-email" placeholder="Enter email" required>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;"><input type="text" name="b_168a366a98d3248fbc35c0b67_d704057a31" tabindex="-1" value=""></div>
                        <button type="submit" id="subscr-submit"><i class="icon-check"></i></button>
                    </div>
                </form>
                <!--Mail Chimp Subscription Form Close-->
                <p class="p-style2">Please fill the field before continuing</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-1">
                <p class="p-style3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            </div>
        </div>
    </div>
</section><!--Subscription Widget Close-->




<?php $this->load->view('site/fixed_files/footer'); ?>
