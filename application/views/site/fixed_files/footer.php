
<!--Footer-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="info">
                    <a class="logo" href="index.html"><img src="img/logo.png" alt="Bushido"/></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    <div class="social">
                        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube-square"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-tumblr-square"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-vimeo-square"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-pinterest-square"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h2>Latest news</h2>
                <ul class="list-unstyled">
                    <li>25 May <a href="#">Nemo enim ipsam voluptatem</a></li>
                    <li>01 May <a href="#">Neque porro quisquam est</a></li>
                    <li>16 Apr <a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li>10 Jan <a href="#">Sed ut perspiciatis unde</a></li>
                </ul>
            </div>
            <div class="contacts col-lg-3 col-md-3 col-sm-3">
                <h2>Contacts</h2>
                <p class="p-style3">
                    4120 Lenox Avenue, New York, NY,<br/>
                    10035 76 Saint Nicholas Avenue<br/>
                    <a href="mailto:mail@bushido.com">mail@bushido.com</a><br/>
                    +48 543765234<br/>
                    +48 555 234 54 34<br/>
                </p>
            </div>
        </div>
        <div class="copyright">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <p>&copy; 2014 BUSHIDO. All Rights Reserved. Designed by <a href="http://8guild.com/" target="_blank">8Guild</a></p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="payment">
                        <img src="img/payment/visa.png" alt="Visa"/>
                        <img src="img/payment/paypal.png" alt="PayPal"/>
                        <img src="img/payment/master.png" alt="Master Card"/>
                        <img src="img/payment/discover.png" alt="Discover"/>
                        <img src="img/payment/amazon.png" alt="Amazon"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer><!--Footer Close-->

<?php

echo $js;
?>

<?php
if($logado == true):
?>

    <script>

        function carregando(){

            var dado = '<div style="background:#f7f7f7;position: fixed;z-index: 10000000000000000;border:2px solid #5d5d5d;top: 50%;left: 42%;padding: 1%;float: left;"><h2 style="padding:0;margin:0;float: left; "><img style="float:left;" src="assets/img/loader.gif">&nbsp; Carregando...</h2></div>';

            return dado;

        }
        function logout() {

            $.ajax({
                type: "POST",
                url: "Ajax/logout",
                beforeSend: function(){ $('.content-loading').html(carregando()); },
                error: function(data){

                    $('.content-loading').html('');
                    alert('erro');
                },
                success: function( data )
                {
                    if(data == 11){
                        $('.content-loading').html('');

                        window.location.reload();

                    }else{
                        $('.content-loading').html('');

                        $("#errorlog").html(data);
                    }
                }
            });

        }

    </script>

<?php endif;?>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/966923546/?value=0&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>

</body><!--Body Close-->
</html>