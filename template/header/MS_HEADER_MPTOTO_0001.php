<!--MENU MOBILE-->
<?php include_once DIR_MENU."MS_MENU_MPTOTO_0002.php"; ?>
<!-- End menu mobile-->

<!--MENU DESTOP-->
<header>
    <div class="gb-header_mptoto">
        <div class="gb-topheader-mptoto">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 hidden-sm hidden-xs">
                        <div class="gb-header-top_mptoto-left">
                            <ul>
                                <li><i class="fa fa-map-signs" aria-hidden="true"></i> <?= $rowConfig['content_home1'] ?></li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i> <?= $rowConfig['content_home2'] ?></li>
                                <li><i class="fa fa-phone-square" aria-hidden="true"></i> <?= $rowConfig['content_home3'] ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="gb-topheader-mptoto-right">
                            <ul>
                                <li><?php include DIR_CART."MS_CART_MPTOTO_0004.php";?></li>
                                <li>
                                    <?php include DIR_REGISTER."MS_REGISTER_DENMOC_0001.php";?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gb-header_mptoto-sticky  sticky-menu">
        	<div class="gb-header_mptoto-topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo-mptoto">
                            <a href="/"><img src="/images/<?= $rowConfig['web_logo'] ?>" alt="" class="img-responsive"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="gb-header_mptoto-search">
                            <?php include DIR_SEARCH."MS_SEARCH_MPTOTO_0001.php";?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="gb-header-between-hotline">
                            <p>Hotline:  <?= $rowConfig['content_home3'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gb-header_mptoto-bottom">
            <div class="container">
                <div class="gb-header_mptoto-menu">
                    <?php include DIR_MENU."MS_MENU_MPTOTO_0001.php";?>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="clearfix"></div>
</header>

<script src="/plugin/sticky/jquery.sticky.js"></script>
<script>
    $(document).ready(function () {
        $(".sticky-menu").sticky({topSpacing:0});
    });
</script>