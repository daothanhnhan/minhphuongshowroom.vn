<?php
    session_start();
    ob_start();
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $folder = dirname(__FILE__);
    include_once('config.php');
    include_once('__autoload.php');
    $action = new action();
    include_once dirname(__FILE__).DIR_FUNCTIONS."database.php";  
    include_once dirname(__FILE__).DIR_FUNCTIONS_PAGING."pagination.php";
    include_once 'functions/phpmailer/class.smtp.php';
    include_once 'functions/phpmailer/class.phpmailer.php';
    include_once "functions/vi_en.php";

    // Install MultiLanguage
    include_once dirname(__FILE__).DIR_FUNCTIONS_LANGUAGE."lang_config.php";
    include_once dirname(__FILE__).DIR_FUNCTIONS_LANGUAGE.$lang_file;
    // Install Friendly Url
    include_once dirname(__FILE__).DIR_FUNCTIONS_URL."url_config.php";
    // Configure Website
    include_once dirname(__FILE__).DIR_FUNCTIONS."website_config.php";
    // echo $translate['link_contact'];die;
    $trang = isset($_GET['trang']) ? $_GET['trang'] : '1';
    $action = new action();
    $cart = new action_cart();
    $menu = new action_menu();
    $action_product = new action_product();
    $action_news = new action_news();
// echo phpversion();die;
    $rowConfig = $action->getDetail('config','config_id',1);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- start - cấu hình cơ bản, dùng chung cho tất cả các website chuẩn seo -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="google-site-verification" content="oghC2h18kmURma91PpnEDtCKWJNYIIfnY4nXH1AQ-vQ" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- cần cấu hình linh hoạt -->
    <meta name="description" content="<?= $meta_des ?>">
    <!-- cần cấu hình linh hoạt -->
    <meta name="keywords" content="<?= $meta_key ?>">
    <meta id="meta_topic_id" property="og:id" content="1139">
    
    <?php 
    if ($urlAnalytic == 'product_languages' && isset($_GET['page'])) { 
      $slug = isset($_GET['slug']) ? $_GET['slug'] : '';
      $rowLang = $action_product->getProductLangDetail_byUrl($slug,$lang);
      $row = $action_product->getProductDetail_byId($rowLang[$nameColIdProduct_productLanguage],$lang);
    ?>
    <meta property="og:image" content="<?= $action->curPageURL() ?>/images/<?= $row['product_img'] ?>" />
    <?php } ?>
    <?php 
    if ($urlAnalytic == 'news_languages' && isset($_GET['page'])) { 
      $slug = isset($_GET['slug']) ? $_GET['slug'] : '';
      $rowLang = $action_news->getNewsLangDetail_byUrl($slug,$lang);
      $row = $action_news->getNewsDetail_byId($rowLang['news_id'],$lang);
    ?>
    <meta property="og:image" content="<?= $action->curPageURL() ?>/images/<?= $row['news_img'] ?>" />
    <?php } ?>
    <?php if (!isset($_GET['page'])) { ?>
    <meta property="og:image" content="<?= $action->curPageURL() ?>/images/12312313-2.png" />
    <?php } ?>
    <?php 
    if ($urlAnalytic == 'productcat_languages' && isset($_GET['page'])) { 
      $slug = isset($_GET['slug']) ? $_GET['slug'] : '';
      $rowCatLang = $action_product->getProductCatLangDetail_byUrl($slug,$lang);
      $rowCat = $action_product->getProductCatDetail_byId($rowLang['productcat_id'],$lang);
      if ($rowCat['productcat_sub'] != '') { 
    ?>
    <meta property="og:image" content="<?= $action->curPageURL() ?>/images/<?= $rowCat['productcat_sub'] ?>" />
    <?php } } ?>
    <!-- cần cấu hình linh hoạt -->
    <title><?= $title ?></title>
    <!-- cần cấu hình linh hoạt -->
    <link rel="icon" href="/images/<?= $rowConfig['icon_web'] ?>" type="image/gif" sizes="16x16">

    <link rel="stylesheet" href="/plugin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/plugin/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/plugin/fonts/font-awesome/css/font-awesome.min.css">
    <script src="/plugin/jquery/jquery-2.0.2.min.js"></script>
    <script src="/plugin/bootstrap/js/bootstrap.js"></script>
    <!-- <link rel="stylesheet" href="/css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="/css/style-mptoto.css">
    <script type='text/javascript' src='//c.trazk.com/c.js' async='async' > </script>
    <!-- end - cấu hình cơ bản, dùng chung cho tất cả các website chuẩn seo -->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTL33WN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



<!--HEADER-->
<?php include_once dirname(__FILE__).DIR_THEMES."header.php"; ?>

<!--CONTENT-->
<div class="gb-content">
<?php
    if (isset($_GET['page'])){
        
        $urlAnalytic = $action->getTypePage_byUrl($_GET['page'],$lang);    
        // echo $urlAnalytic;
        switch ($urlAnalytic) {
          case 'newscat_languages':
                include_once dirname(__FILE__).DIR_THEMES."tintuc.php"; break;
            case 'tin-tuc':
                include_once dirname(__FILE__).DIR_THEMES."tintuc.php"; break;
            case 'news_languages':               
                include_once dirname(__FILE__).DIR_THEMES."chitiettintuc.php"; break;
            case 'servicecat_languages':
                include_once dirname(__FILE__) . DIR_THEMES . "dichvu.php";break;
            case 'service_languages':
                include_once dirname(__FILE__) . DIR_THEMES . "chitiet_dichvu.php";break;
            case 'page_language':
                include_once dirname(__FILE__) . DIR_THEMES . "gioithieu.php";break;
            case 'productcat_languages':              
                include_once dirname(__FILE__).DIR_THEMES."sanpham.php"; break;
            case 'products':              
                include_once dirname(__FILE__).DIR_THEMES."sanpham.php"; break;
            case 'san-pham':              
                include_once dirname(__FILE__).DIR_THEMES."sanpham.php"; break;
            case 'product_languages':
                include_once dirname(__FILE__).DIR_THEMES."chitietsanpham.php"; break;  
            // start - chưa hoàn thiện - url địa chỉ trang website
            case 'gio-hang':               
                include_once dirname(__FILE__).DIR_THEMES."giohang.php"; break;            
            case 'thanh-toan':           
                include_once dirname(__FILE__).DIR_THEMES."thanhtoan.php"; break;
            case 'xac-nhan-don-hang':           
                include_once dirname(__FILE__).DIR_THEMES."xacnhandonhang.php"; break;
            case 'huy-don-hang':           
                include_once dirname(__FILE__).DIR_THEMES."huydonhang.php"; break;
            case 'contact':           
                include_once dirname(__FILE__).DIR_THEMES."lienhe.php"; break;
            case 'lien-he':
                include_once dirname(__FILE__).DIR_THEMES."lienhe.php"; break;
            case 'search-news':
                include_once dirname(__FILE__) . DIR_THEMES . "search-news.php";break;
            case 'search-product':
                include_once dirname(__FILE__) . DIR_THEMES . "search-product.php";break;
            case 'search-service':
                include_once dirname(__FILE__) . DIR_THEMES . "search-service.php";break;
            case 'register':
                include_once dirname(__FILE__) . DIR_THEMES . "dang-ky.php";break;
            case 'login':
                include_once dirname(__FILE__) . DIR_THEMES . "dang-nhap.php";break;
            case 'logout':
                include_once dirname(__FILE__) . DIR_THEMES . "dang-xuat.php";break;
            case 'forget-pass':
                include_once dirname(__FILE__) . DIR_THEMES . "forget-pass.php";break;
            case 'change-password':
                include_once dirname(__FILE__) .DIR_THEMES . "change-password.php";break;
            case 'thong-tin-ca-nhan':
                include_once dirname(__FILE__) .DIR_THEMES . "user-profile.php";break;
            case 'update-infor':
                include_once dirname(__FILE__) .DIR_THEMES . "update-infor.php";break;
            case 'cart-detail':
                include_once dirname(__FILE__) .DIR_THEMES . "cart-detail.php";break;
            case 'price':
                include_once dirname(__FILE__) .DIR_THEMES . "price.php";break;
            case 'danh-muc-san-pham':
                include_once dirname(__FILE__) .DIR_THEMES . "danhmusanpham.php";break;
            case 'set-link':
                include_once dirname(__FILE__) . DIR_THEMES . "set_link.php";
            case 'dong-san-pham123':
                include_once dirname(__FILE__) . DIR_THEMES . "dongsanpham.php";
                break;
            // end - chưa hoàn thiện - url địa chỉ trang website
        }
    }
    else include_once dirname(__FILE__).DIR_THEMES."home.php";
    ?>
</div>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WTL33WN');</script>
<!-- End Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135190546-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135190546-1');
</script>



<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '330212901135013');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=330212901135013&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

<div class="social-button">
    <div class="social-button-content">
       <a href="tel:<?= $rowConfig['content_home3'] ?>" class="call-icon" rel="nofollow">
          <i class="fa fa-whatsapp" aria-hidden="true"></i>
          <div class="animated alo-circle"></div>
          <div class="animated alo-circle-fill  "></div>
           <span>Hotline: <?= $rowConfig['content_home3'] ?></span>
        </a>
    </div>
</div>
<!--FOOTER-->
<div class="gb-footer">
    <?php include_once dirname(__FILE__).DIR_THEMES."footer.php"; ?>

</div> 
<script type="text/javascript" src="/functions/language/lang.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ad6f10e227d3d7edc240e6b/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

  <script>
  $(document).ready(function(){
    $('.user-support').click(function(event) {
      $('.social-button-content').css('display','inline-grid');
    });
    });
</script>
    <div class="gb-article-share-box">
        <div class="button-container">
            <div class="like-button">
                <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2F119HoangQuocViet%2F&width=71&layout=box_count&action=like&size=large&show_faces=true&share=true&height=65&appId=220693348668109" width="71" height="95" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>              
            </div>
        </div>

        <div class="button-container">
            <div class="mail-button">
                <a href="mailto:sales@kidoasa.com">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <div class="button-container">
            <div class="like-button1">
                <script type="text/javascript" src="https://apis.google.com/js/plusone.js" gapi_processed="true"></script>
                <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 71px; height: 24px;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 71px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;" tabindex="0" vspace="0" width="100%" id="I1_1534574329005" name="I1_1534574329005" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;data-size=tall&amp;data-href=0%2F&amp;origin=https%3A%2F%2Fkidoasa.com&amp;url=https%3A%2F%2Fkidoasa.com%2F&amp;gsrc=3p&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_US.FttmFHLbbVw.O%2Fam%3DwQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCOzbWftz_oq-nYBDNKBVNyVqz-g0g%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh&amp;id=I1_1534574329005&amp;_gfid=I1_1534574329005&amp;parent=https%3A%2F%2Fkidoasa.com&amp;pfname=&amp;rpctoken=24519637" data-gapiattached="true" title="G+"></iframe></div>
            </div>
        </div>            
    </div>
</body>

</html>