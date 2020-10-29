
<!--CONTENT-->
<div class="Content-Main_mptoto">

    <!--SLIDE-->
    <?php include DIR_SLIDESHOW."MS_SLIDESHOW_MPTOTO_0001.php";?>

    <!--news-->
    <?php include DIR_NEWS."MS_NEWS_MPTOTO_0004.php";?>

    <div class="formnhanthongtindangky-mobile">
    	<div class="container">
    		<!--INTRODUCT-->
    		<?php include DIR_EMAIL."MS_EMAIL_MPTOTO_0004.php";?>    		
    	</div>
    </div>
    
    <?php include DIR_PRODUCT."MS_PRODUCT_MPTOTO_0014.php";?>
    <?php include DIR_PRODUCT."MS_PRODUCT_MPTOTO_0015.php";?>
    <?php include DIR_PRODUCT."MS_PRODUCT_MPTOTO_0016.php";?>

    <!--PRODUCT-->
    <?php include DIR_PRODUCT."MS_PRODUCT_MPTOTO_0001.php";?>

    <!--danh-->
    <?php include DIR_PRODUCT."MS_PRODUCT_MPTOTO_0011.php";?>

    <!--Thiết bị nhà bếp-->
    <?php include DIR_PRODUCT."MS_PRODUCT_MPTOTO_0006.php";?>

    <!--BANNER 1-->
    <?php include DIR_BANNER."MS_BANNER_MPTOTO_0004.php";?>

    <!--Gạch ốp lát-->
    <?php include DIR_PRODUCT."MS_PRODUCT_MPTOTO_0012.php";?>


    <!---->
    <div class="container">
        <?php include DIR_CHARACTERISTICS."MS_CHARACTERISTICS_MPTOTO_0002.php";?>
    </div>

    <!--ĐỐI TÁC-->
    <?php include DIR_OTHER."MS_OTHER_MPTOTO_0001.php";?>

    <!--Hỗ trợ thanh toán-->
    <?php include DIR_OTHER."MS_OTHER_MPTOTO_0002.php";?>

</div>

<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  /*display: none;*/
  text-align: center;
}
.gb-popup-overlay{
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 9999;
    -webkit-overflow-scrolling: touch;
    outline: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
}
.gb-popup-overlay-content{
        position: fixed;
    width: 550px;
    /*background: #fff;*/
    z-index: 9999;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
@media screen and (max-width: 500px){
  .gb-popup-overlay-content{
    /*position: relative;*/
    width: 85%;
    background: #fff;
}
}
.gb-popup-overlay-content .close_poup{
    width: 40px;
    height: 40px;
    background: red;
    color: #fff;
    position: absolute;
    z-index: 9999999999999;
    right: -26px;
    top: -20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

<!-- <div id="loader"></div> -->

<!-- <div class="gb-popup-overlay"></div>
    <div class="gb-popup-overlay-content">
        <div class="close_poup"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div id="myDiv">
            <a href="<?= $rowConfig['content_home10']?>"><img src="/images/181026 pop up-011.png" alt="" class="img-responsive"></a>
    
        </div>
    </div> -->
<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
$(document).ready(function(){
    $('.close_poup').click(function(){
        $('.gb-popup-overlay').css('display','none');
        $('.gb-popup-overlay-content').css('display','none');
    });
    $('.gb-popup-overlay').click(function(){
        $('.gb-popup-overlay-content').css('display','none');
        $(this).css('display','none');
    })
});
</script>
<script type="text/javascript">
function popuptu () {
  $('.gb-popup-overlay').css('display','none');
  $('.gb-popup-overlay-content').css('display','none');
  // alert('tuan');
}
<?php
  if (isset($_SESSION['popup'])) {
?>
popuptu();
<?php 
  }
  if (!isset($_SESSION['popup'])) { 
    $_SESSION['popup'] = 'true';
  }
// unset($_SESSION['popup']);
?>
</script>