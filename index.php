<?php
session_start();
header('Cache-control: private');
 // IE 6 FIX

if (isSet($_GET['lang'])) {
    $lang = $_GET['lang'];
    
    // register the session and set the cookie
    $_SESSION['lang'] = $lang;
    
    setcookie('lang', $lang, time() + (3600 * 24 * 30));
} 
else if (isSet($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} 
else if (isSet($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} 
else {
    $lang = 'es';
}

switch ($lang) {
    case 'en':
        $lang_file = 'lang.en.php';
        break;

    case 'de':
        $lang_file = 'lang.de.php';
        break;

    case 'es':
        $lang_file = 'lang.es.php';
        break;

    default:
        $lang_file = 'lang.es.php';
}

include_once 'languages/' . $lang_file;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
          
    <!-- ===========================
    THEME INFO
    =========================== -->
    <meta name="description" content="<?php echo $lang['HEAD_DESCRIPTION']; ?>">
    <meta name="keywords" content="<?php echo $lang['HEAD_KEYWORDS']; ?>">
    <meta name="author" content="denux team">

    <!-- ===========================
    SITE TITLE
    =========================== -->
    <title><?php echo $lang['PAGE_TITLE']; ?></title>
    
    <!-- ===========================
    FAVICONS
    =========================== -->
    <link rel="icon" href="img/favicon.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-ipad-retina.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-iphone-retina.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-ipad.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-iphone.png" />
     
    <!-- ===========================
    STYLESHEETS
    =========================== -->    
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/preloader.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.css">
        
    <!-- ===========================
    ICONS: 
    =========================== -->
    <link rel="stylesheet" href="css/simple-line-icons.css">    
    
    <!-- ===========================
    GOOGLE FONTS
    =========================== -->    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Antic|Raleway:300">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  <!-- ===========================
   GOOGLE ANALYTICS (Optional)
   =========================== -->
  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-61733318-2', 'auto');
      ga('send', 'pageview');

  </script>
  
   </head>
    <body data-spy="scroll">
        <!-- Preloader -->
        <div id="preloader">           
            <div id="status">
                <div class="loadicon icon-moustache wow tada infinite" data-wow-duration="1s"></div>
            </div>
        </div>
        
       <header>               
        <!-- ===========================
        HERO AREA
        =========================== -->
        <div id="hero">           
            <div class="container herocontent">               
                <h2 class="wow fadeInUp" data-wow-duration="2s"><?php echo $lang['SITE_NAME']; ?></h2>                
                <h4 class="wow fadeInDown" data-wow-duration="3s"><?php echo $lang['SLOGAN']; ?></h4>            
            </div>
            
            <div class="heroshot">
                <!-- HOME DIV -->
                <div class="row">
                    <!-- PASOS ITEM -->
                    <div class="col-md-6 wow bounceIn" data-wow-duration="2s">
                        <ul id="ul_pasos">
                           <li><?php echo $lang['PASO_1']; ?></li>
                           <li><?php echo $lang['PASO_2']; ?> </li>
                           <li><?php echo $lang['PASO_3']; ?> </li>
                           <li><?php echo $lang['PASO_4']; ?> </li>
                           <li><?php echo $lang['PASO_5']; ?> </li>
                           <li><?php echo $lang['PASO_6']; ?> </li>
                       </ul>       
                    </div><!-- PASOS  ITEM END -->
                    
                    <!-- DOWNLOAD ITEM -->
                    <div class="col-md-6 wow bounceIn" data-wow-duration="3s" id="download_buttons">
                        <a href="https://play.google.com/apps/testing/apps.denux.ahorrando" target="_blanck" alt="<?php echo $lang['DESCARGAR_EN_GOOGLE_PLAY']; ?>">
                            <img src="img/android-app-on-google-play.jpg" alt="<?php echo $lang['DESCARGAR_EN_GOOGLE_PLAY']; ?>">
                        </a>
                        <a href="#" alt="<?php echo $lang['DESCARGAR_EN_APP_STORE_SOON']; ?>">
                            <img src="img/download_ios_soon.png" alt="<?php echo $lang['DESCARGAR_EN_APP_STORE_SOON']; ?>">
                        </a>
                    </div><!-- DOWNLOAD ITEM END -->
                </div> <!-- END HOME DIV -->
            </div>
        </div><!--HERO AREA END-->        
        
        <!-- ===========================
         NAVBAR START
         =========================== -->
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
               <div class="container">
                   
                      <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                           <span class="sr-only"><?php echo $lang['TOGGLE_NAVIGATION']; ?></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                        </button>
                        
                           <a class="navbar-brand" href="#hero">
                            <!-- Replace Drifolio Bootstrap with your Site Name and remove icon-grid to remove the placeholder icon -->
                            <span class="brandicon icon-grid"></span>
                            <span class="brandname"><?php echo $lang['PAGE_TITLE']; ?></span>
                        </a>
                    </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#metas"><span class="btnicon icon-user"></span><?php echo $lang['MENU_METAS']; ?></a></li>
                        <li><a href="#categorias"><span class="btnicon icon-cup"></span><?php echo $lang['MENU_CATEGORIAS']; ?></a></li>
                        <li><a href="#transacciones"><span class="btnicon icon-rocket"></span><?php echo $lang['MENU_TRANSACCIONES']; ?></a></li>
                        <li><a href="#balance"><span class="btnicon icon-bubble"></span><?php echo $lang['MENU_BALANCE']; ?></a></li>
                        <li><a href="mailto:apps.denux@gmail.com"><span class="btnicon icon-envelope-open"></span><?php echo $lang['MENU_CONTACTO']; ?></a></li>
                        <li class="active"><a href="https://play.google.com/apps/testing/apps.denux.ahorrando" target="_blanck"><span class="btnicon icon-cloud-download"></span><?php echo $lang['MENU_DESCARGAR_APP']; ?></a></li>
                        <li></li>
                    </ul>
                
                </div><!--.nav-collapse -->
            </div>
        </nav><!--navbar end-->        
     </header><!--header end-->     

    <!-- ===========================
    METAS
    =========================== -->
    <div id="metas" class="container">
       <div class="row">
           <div class="col-md-3">
               <h4><?php echo $lang['DEFINE_TUS_METAS']; ?></h4>
           </div>
           <div class="col-md-9">
               <ul class="ul_clientes"><!--METAS LOGO-->
                   <li><img src="img/metas_cosas.png" alt="<?php echo $lang['COMPRAR_COSAS']; ?>" title="<?php echo $lang['COMPRAR_COSAS']; ?>"></li>
                   <li><img src="img/metas_viajes.jpg" alt="<?php echo $lang['VIAJAR']; ?>" title="<?php echo $lang['VIAJAR']; ?>"></li>
                   <li><img src="img/metas_viajes2.jpg" alt="<?php echo $lang['DESCUBRIR']; ?>" title="<?php echo $lang['DESCUBRIR']; ?>"></li>
                   <li><img src="img/metas_emprendimientos.jpg" alt="<?php echo $lang['EMPRENDIMIENTOS']; ?>" title="<?php echo $lang['EMPRENDIMIENTOS']; ?>"></li>                     
               </ul><!--METAS LOGO END-->
           </div>
      </div>
      <hr><!-- SECTION SEPARETOR LINE -->
   
      <div class="row">
        <!-- LEFT PART OF THE METAS SECTION -->
         <div class="col-md-6">
            <div class="row">
             <h2 class="wow fadeInDown" data-wow-duration="2s"><?php echo $lang['METAS_FRASE_1']; ?></h2>

             <h4 class="wow fadeInUp" data-wow-duration="3s"><?php echo $lang['METAS_FRASE_2']; ?></h4>
          
             </div> <!-- METAS INFO END -->
             
            
            <div class="myapps row">
                <h5><?php echo $lang['EXAMPLE_OF_GOALS']; ?></h5>
                
                <ul class="metas"><!-- FAVORITE APP ICONS START -->
                    <li class="wow animated bounceInUp" data-wow-duration="1s"><?php echo $lang['COMPRAR_UNA_TABLET']; ?></li>
                    <li class="wow bounceInUp" data-wow-duration="2s"><?php echo $lang['VIAJAR_A_LA_PLAYA']; ?></li>
                    <li class="wow bounceInUp" data-wow-duration="3s"><?php echo $lang['COMPRAR_UNA_MOTO']; ?></li>
                    <li class="wow animated bounceInUp" data-wow-duration="4s"><?php echo $lang['EMPEZAR_UNA_EMPRESA']; ?></li>
                    <li class="wow bounceInUp" data-wow-duration="5s" ><?php echo $lang['VIAJAR_A_EGIPTO']; ?></li>
                </ul><!-- FAVORITE APP ICONS END -->
            </div>
         </div><!-- LEFT PART OF THE METAS SECTION END -->
        <!--Left part end-->
         
         <!-- RIGHT PART OF THE METAS SECTION -->
         <div class="col-md-6 wow fadeInUp myphoto" data-wow-duration="4s">
             <img src="img/user.png" alt="Mamun Srizon">
         </div><!-- RIGHT PART OF THE METAS SECTION END -->        
        </div>   
     </div><!-- METAS SECTION END -->
        
    <hr><!-- SECTION SEPARETOR LINE -->
        
    <!-- ===========================
    CATEGORIAS
    =========================== -->
    <div id="categorias" class="container">
       
        <!-- CATEGORIAS SECTION HEADING START -->
        <div class="sectionhead  row wow fadeInUp">
            <span class="bigicon icon-cup "></span>
            <h3><?php echo $lang['DEFINE_TUS_CATEGORIAS']; ?></h3>
            <hr class="separetor">
         </div><!--CATEGORIAS SECTION HEADING END-->
         
        <!-- CATEGORIAS ITEMS START -->
        <div class="row">
               <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                   <img src="img/s1.png" alt="">
                   <h4><?php echo $lang['CAT_ALIMIENTACION']; ?></h4>
                   <p><?php echo $lang['CAT_ALIMIENTACION_DESC']; ?></p>
                </div> <!-- ITEM END -->

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                   <img src="img/salud.png" alt="">
                   <h4><?php echo $lang['CAT_SALUD']; ?></h4>
                   <p><?php echo $lang['CAT_SALUD_DESC']; ?></p>
                </div> <!-- ITEM END -->

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                   <img src="img/bebidas.png" alt="">
                   <h4><?php echo $lang['CAT_BEBIDAS']; ?></h4>
                   <p><?php echo $lang['CAT_BEBIDAS_DESC']; ?></p>
                </div> <!-- ITEM END -->
        </div>
        <div class="row">
               <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                   <img src="img/s4.png" alt="">
                   <h4><?php echo $lang['CAT_EXTRAS']; ?>n</h4>
                   <p><?php echo $lang['CAT_EXTRAS_DESC']; ?></p>
                </div> <!-- ITEM END -->

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                   <img src="img/s5.png" alt="">
                   <h4><?php echo $lang['CAT_TELEFONIA']; ?></h4>
                   <p><?php echo $lang['CAT_TELEFONIA_DESC']; ?></p>
                </div> <!-- ITEM END -->

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                   <img src="img/transporte.png" alt="">
                   <h4><?php echo $lang['CAT_TRANSPORTE']; ?></h4>
                   <p><?php echo $lang['CAT_TRANSPORTE_DESC']; ?></p>
                </div> <!-- ITEM END -->
        </div>
        <div class="row">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                   <img src="img/vicios.png" alt="">
                   <h4><?php echo $lang['CAT_VICIOS']; ?></h4>
                   <p><?php echo $lang['CAT_VICIOS_DESC']; ?></p>
                </div> <!-- ITEM END -->

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                   <img src="img/s5.png" alt="">
                   <h4><?php echo $lang['CAT_IMPUESTOS']; ?></h4>
                   <p><?php echo $lang['CAT_IMPUESTOS_DESC']; ?></p>
                </div> <!-- ITEM END -->

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                   <img src="img/salarios.png" alt="">
                   <h4><?php echo $lang['CAT_SALARIOS']; ?></h4>
                   <p><?php echo $lang['CAT_SALARIOS_DESC']; ?></p>
                </div> <!-- ITEM END -->

        </div><!-- CATEGORIAS ITEMS END-->
    </div><!-- CATEGORIAS SECTION END -->
    
    <!-- ===========================
    TRANSACCIONES
    =========================== -->
    <div id="transacciones" class="container">
        <div class="sectionhead wow bounceInUp" data-wow-duration="2s">
          <span class="bigicon icon-rocket"></span>
           <h3><?php echo $lang['TRANSACCIONES']; ?></h3>
           <hr class="separetor">            
        </div><!-- TRANSACCION SECTION HEAD END -->   
        <div class="row">
            <div class="col-md-6 wow bounceIn" data-wow-duration="1s">
                <p class="wow fadeInUp" data-wow-duration="2s"><?php echo $lang['TRNS_FRASE_1']; ?></p>
                <p class="wow fadeInUp" data-wow-duration="4s"><?php echo $lang['TRNS_FRASE_2']; ?></p>
                <p class="wow fadeInUp" data-wow-duration="6s"><?php echo $lang['TRNS_FRASE_3']; ?></p>
                <p class="wow fadeInUp" data-wow-duration="8s"><?php echo $lang['TRNS_FRASE_4']; ?></p>
            </div>
            <div class="col-md-6 wow bounceIn" data-wow-duration="2s">
                <img src="" alt="INGRESOS/EGRESOS">
            </div>
        </div>
    </div><!-- TRANSACCION SECTION END -->

    <!-- ===========================
    BALANCE SECTION START
    =========================== -->
    <div id="balance" class="container">
        <div class="sectionhead wow bounceInUp" data-wow-duration="2s">
           <span class="bigicon icon-bubbles"></span>
           <h3><?php echo $lang['BALANCE_GENERAL']; ?></h3>
           <h4><?php echo $lang['BALANCE_GENERAL_DESC']; ?></h4>
           <hr class="separetor">            
        </div><!-- BALANCE SECTIONHEAD END -->
        
        <!-- BALANCE ITEMS START -->
        <div class="row">
            <!-- 1ST INGRESOS ITEM -->
            <div class="col-md-6 wow bounceIn" data-wow-duration="2s">
                <div class="quote">
                    <h3><?php echo $lang['INGRESOS']; ?></h3>
                    <blockquote>
                       <p>Vas a tener el total de INGRESOS distribuidos en las diferentes categorias</p>                        
                    </blockquote>
                    <h5>Historial </h5>
                    <p>No te olvides de trabajar para tus METAS</p>
                </div>                
            </div><!-- 1ST INGRESOS ITEM END -->
            
            <!-- 2ND EGRESOS ITEM -->
            <div class="col-md-6 wow bounceIn" data-wow-duration="3s">
                <div class="quote">
                    <h3><?php echo $lang['EGRESOS']; ?></h3>
                    <blockquote>
                       <p>Vas a tener el total de EGRESOS distribuidos en las diferentes categorias</p>                        
                    </blockquote>
                    <h5>Historal</h5>
                    <p>Por que a veces gastamos en cosas que realmente no necesitamos</p>
                </div>                
            </div><!-- 2ND EGRESOS ITEM END -->
        </div>

    </div><!-- BALANCE SECTION END -->
       
    <!-- ===========================
    FOOTER START
    =========================== -->    
    <footer>
        <div class="container">
            <span class="bigicon icon-speedometer "></span>
             
            <div class="footerlinks"><!-- FOOTER LINKS START -->            
                <ul>
                    <li><a href="#hero"><?php echo $lang['MENU_INICIO']; ?></a></li>
                    <li><a href="#metas"><?php echo $lang['MENU_METAS']; ?></a></li>
                    <li><a href="#categorias"><?php echo $lang['MENU_CATEGORIAS']; ?></a></li>
                    <li><a href="#transacciones"><?php echo $lang['MENU_TRANSACCIONES']; ?></a></li>
                    <li><a href="#balance"><?php echo $lang['MENU_BALANCE']; ?></a></li>
                    <li><a href="mailto:apps.denux@gmail.com"><?php echo $lang['MENU_CONTACTO']; ?></a></li>                   
                </ul>
            </div><!-- FOOTER LINKS END -->
             
            <div class="copyright"><!-- FOOTER COPYRIGHT START -->
                <p></p>
            </div><!-- FOOTER COPYRIGHT END -->
             
            <div class="footersocial wow fadeInUp" data-wow-duration="3s"><!-- FOOTER SOCIAL ICONS START -->
                <ul>
                    <li><a href="http://facebook.com/jaime.santana.9041"><span class="icon-social-facebook"></span></a></li>
                    <li><a href="http://twitter.com/dexterx17"><span class="icon-social-twitter"></span></a></li>
                    <li><a href="#"><span class="icon-social-youtube"></span></a></li>
                    <li><a href="#"><span class="icon-social-tumblr"></span></a></li>
                 </ul>
             </div><!-- FOOTER SOCIAL ICONS END -->
         </div>
     </footer><!-- FOOTER END -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!--Other necessary scripts-->
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.jribbble-1.0.1.ugly.js"></script>
    <script src="js/drifolio.js"></script>
    <script src="js/wow.min.js"></script>
    <script>new WOW().init();</script>    
  </body>
</html>