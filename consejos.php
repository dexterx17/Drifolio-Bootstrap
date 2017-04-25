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
    <meta name="author" content="Jaime Santana">

    <!-- ===========================
    SITE TITLE
    =========================== -->
    <title><?php echo $lang['MENU_TIPS'].' | '.$lang['PAGE_TITLE']; ?></title>
    
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
                    <div class="col-md-12 col-sm-12 wow bounceIn" data-wow-duration="2s">
                        <img src="img/tips/tip1.jpg" alt="Tip 1" width="500">       
                    </div><!-- PASOS  ITEM END -->
                </div>
                <div class="row">
                    <!-- DOWNLOAD ITEM -->
                    <div class="col-md-6 wow bounceIn" data-wow-duration="2s" id="download_buttons">
                        <a href="https://play.google.com/store/apps/details?id=apps.denux.ahorrando" target="_blanck" alt="<?php echo $lang['DESCARGAR_EN_GOOGLE_PLAY']; ?>">
                            <img src="img/android-app-on-google-play.jpg" alt="<?php echo $lang['DESCARGAR_EN_GOOGLE_PLAY']; ?>">
                        </a>
                    </div>
                    <div class="col-md-6 wow bounceIn" data-wow-duration="3s" id="download_buttons">
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
                        
                           <a class="navbar-brand" href="#">
                            <!-- Replace Drifolio Bootstrap with your Site Name and remove icon-grid to remove the placeholder icon -->
                            <span class="brandicon icon-grid"></span>
                            <span class="brandname"><?php echo $lang['PAGE_TITLE']; ?></span>
                        </a>
                    </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="?lang=es"><span class="btnicon icon-user"></span><?php echo $lang['MENU_ESPANOL']; ?></a></li>
                        <li><a href="?lang=en"><span class="btnicon icon-cup"></span><?php echo $lang['MENU_INGLES']; ?></a></li>
                        <!--<li><a href="#"><span class="btnicon icon-rocket"></span><?php echo $lang['MENU_QUICHUA']; ?></a></li>
                        <li><a href="#"><span class="btnicon icon-bubble"></span><?php echo $lang['MENU_ALEMAN']; ?></a></li>-->
                        <li><a href="mailto:apps.denux@gmail.com"><span class="btnicon icon-envelope-open"></span><?php echo $lang['MENU_CONTACTO']; ?></a></li>
                        <li class="active"><a href="https://play.google.com/store/apps/details?id=apps.denux.ahorrando" target="_blanck"><span class="btnicon icon-cloud-download"></span><?php echo $lang['MENU_DESCARGAR_APP']; ?></a></li>
                        <li></li>
                    </ul>
                
                </div><!--.nav-collapse -->
            </div>
        </nav><!--navbar end-->        
     </header><!--header end-->     

    <!-- ===========================
    FOOTER START
    =========================== -->    
    <footer>
        <div class="container">
            <div class="copyright"><!-- FOOTER COPYRIGHT START -->
                <p> @<?php echo date('Y'); ?> <?php echo $lang['PAGE_TITLE']; ?> </p>
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