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

    public function metas_personalizado($tabela,$id,$wherekey,$wherevalue){

        $this->db->from($tabela);
        $this->db->where($wherekey,$wherevalue);
        $this->db->order_by($id,'desc');
        $this->db->limit(1,0);
        $get = $this->db->get();
        $num = $get->num_rows();
        if($num <= 0 ):


            return array([

                'meta_title' => '',
                'meta_description' => '',
                'meta_image' => '',
                'meta_keywords' => '',
                'meta_author' => ''


            ]);

        else:


            return $get->result_array();


        endif;


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


    public function pagination($database,$pag,$total,$segment1,$segment2,$segment3,$segment4,$segment5,$tipo,$div){

        if(!empty($segment2)):
            //First Bar
            $fb = '/';
        else:
            $fb = '';
            endif;
        if(!empty($segment3)):
            //Second Bar
            $sb = '/';
        else:
            $sb = '';
            endif;
        $url = base_url() . $segment1 . $segment2 .$sb. $segment3;

        $return = '';
?>
<ul class="pagination">
    <script>
        function paginacao(pagina,tipo,div,pag) {

            if(pagina == 'busca'){
                window.history.pushState('Object', 'Pagina', '?q=<?php echo $segment3;?>&pag='+pag+'');

            }else{
                window.history.pushState('Object', 'Pagina', '?pag='+pag+'');
            }

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Ajax/divs_')?>"+pagina+"",
                data: {tipo:tipo,pag:pag,segment1:'<?php echo $segment1;?>',segment2:'<?php echo $segment2?>',segment3:'<?php echo $segment3;?>',segment4:'<?php echo $segment4?>',segment5:'<?php echo $segment5;?>'},
                beforeSend: function(){ $('.content-loading').html(carregando()); },
                error: function(data){

                    $('.content-loading').html('');
                    alert(data);
                },
                success: function( data )
                {
                    $('.content-loading').html('');
                    $("#"+div+"").html(data);

                }
            });


            return false;
        }
    </script>
<?php


    if ($pag <= 1):

        $before_pag = 1;
    else:
        $before_pag = $pag - 1;

    endif;
?>
       <li class="prev-page"><a class="icon-arrow-left" onclick="paginacao('<?php echo $database;?>','<?php echo $tipo;?>','<?php echo $div;?>','<?php echo $before_pag; ?>');return false;" href="<?php echo $url; ?>?pag=<?php echo $before_pag;?>"></a></li>
<?php


if ($total > 5):

    $nms = 6;

else:

    $nms = $total + 1;
endif;





for ($p = 1; $p < $nms; $p++) {
    ?>
    <?php
    if ($p == $pag):
        $class = ' class="active"';

    else:
        $class = '';

    endif;

     ?>

    <li<?php echo $class; ?>><a
            onclick="paginacao('<?php echo $database;?>','<?php echo $tipo;?>','<?php echo $div;?>','<?php echo $p; ?>');return false;"
            href="<?php echo $url; ?>?pag=<?php echo $p;?>"><?php echo $p; ?></a></li>
<?php


}
if($nms > 5): echo '<li><a>...</a></li>'; endif;



if ($pag <= 1):

    if ($total > 1):
        $next_page = $pag + 1;

    else:

        $next_page = $pag;

    endif;

else:

    if ($total > 1):
        $next_page = $pag + 1;

    else:

        $next_page = $pag;

    endif;

endif;

?>
<li class="next-page"><a class="icon-arrow-right" onclick="paginacao('<?php echo $database;?>','<?php echo $tipo;?>','<?php echo $div;?>','<?php echo $next_page; ?>');return false;" href="<?php echo $url; ?>?pag=<?php echo $next_page;?>"></a></li>
</ul>
<?php

        return $return;
    }


}



?>