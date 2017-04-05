<?php

class Functions_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db->reconnect();
        @session_start();
    }


    public function metas($tabela){

        $this->db->from($tabela);
        $this->db->order_by('id','desc');
        $this->db->limit(1,0);
        $get = $this->db->get();
        $num = $get->num_rows();
        if($num <= 0 ):

           return array([

                'meta_title' => '',
                'meta_description' => '',
                'meta_image' => '',
                'meta_keywords' => '',
                'meta_author' => '',
                'css_externo' => ' ',
                'js_externo' => '<!--Modernizr-->
    <script src="<?php echo base_url(\'assets/\');?>js/libs/modernizr.custom.js"></script>
    <!--Adding Media Queries Support for IE8-->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(\'assets/\');?>js/plugins/respond.js"></script>
    <![endif]-->
    <!--Google Analytics-->
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push([\'_setAccount\', \'UA-46803427-2\']);
        _gaq.push([\'_trackPageview\']);
        (function () {
            var ga = document.createElement(\'script\');
            ga.type = \'text/javascript\';
            ga.async = true;
            ga.src = (\'https:\' == document.location.protocol ? \'https://\' : \'http://\') + \'stats.g.doubleclick.net/dc.js\';

            var s = document.getElementsByTagName(\'script\')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>',
                'js' => '
                <!--Javascript (jQuery) Libraries and Plugins-->
<script src="'.base_url('assets/').'/js/libs/jquery-1.11.1.min.js"></script>
<script src="'.base_url('assets/').'/js/libs/jquery-ui-1.10.4.custom.min.js"></script>
<script src="'.base_url('assets/').'/js/libs/jquery.easing.min.js"></script>
<script src="'.base_url('assets/').'/js/plugins/bootstrap.min.js"></script>
<script src="'.base_url('assets/').'/js/plugins/smoothscroll.js"></script>
<script src="'.base_url('assets/').'/js/plugins/jquery.validate.min.js"></script>
<script src="'.base_url('assets/').'/js/plugins/icheck.min.js"></script>
<script src="'.base_url('assets/').'/js/plugins/jquery.placeholder.js"></script>
<script src="'.base_url('assets/').'/js/plugins/jquery.stellar.min.js"></script>
<script src="'.base_url('assets/').'/js/plugins/jquery.touchSwipe.min.js"></script>
<script src="'.base_url('assets/').'/js/plugins/jquery.shuffle.min.js"></script>
<script src="'.base_url('assets/').'/js/plugins/lightGallery.min.js"></script>
<script src="'.base_url('assets/').'/js/plugins/owl.carousel.min.js"></script>
<script src="'.base_url('assets/').'/js/plugins/masterslider.min.js"></script>
<script src="'.base_url('assets/').'/mailer/mailer.js"></script>
<script src="'.base_url('assets/').'/js/scripts.js"></script>
<script src="'.base_url('assets/').'/color-switcher/color-switcher.js"></script>

<!--Google Remarketing Tag (Placed before </body>)-->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 966923546;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
                ',
                'css' => '<!--Favicon-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="'.base_url('assets/').'/favicon.ico" type="image/x-icon">
    <!--Master Slider Styles-->
    <link href="'.base_url('assets/').'/masterslider/style/masterslider.css" rel="stylesheet" media="screen">
    <!--Styles-->

    <link href="'.base_url('assets/').'/css/styles.css" rel="stylesheet" media="screen">
    <!--Color Scheme-->
    <link class="color-scheme" href="<?php echo base_url(\'assets/\');?>css/colors/color-scheme2.css" rel="stylesheet" media="screen">
    <!--Color Switcher-->',
                'database' => '',
                'password' => '',
                'logo_marca' => '',
                'favicon' => ''

            ]);

            else:


            return $get->result_array();


        endif;


    }

    public function limitarTexto($texto, $limite)
    {
        $contador = strlen($texto);
        if ($contador >= $limite) {
            $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
            return $texto;
        } else {
            return $texto;
        }
    }




}

?>