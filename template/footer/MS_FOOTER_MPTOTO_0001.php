<footer class="site-footer footer-default">
    <div class="footer-main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-main-content-element">
                        <aside class="widget-footer">
                            <div class="widget-title uni-uppercase"><a href="/"><img src="/images/<?= $rowConfig['web_logo'] ?>" alt="logo-footer.png" class="img-responsive"></a></div>
                            <div class="widget-content">
                                <div class="foote-intro-mptoto">
                                    <p>
                                        <?= $rowConfig['web_email'] ?>
                                    </p>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-main-content-element">
                        <aside class="widget-footer">
                            <div class="widget-title uni-uppercase">Thông tin</div>
                            <div class="widget-content">
                                <div class="foote-lienhe-mptoto">
                                    <ul>
                                        <li style="color: #fff; font-weight: bold;"><span>PHONE:</span> <?= $rowConfig['content_home3'] ?></li>
                                        <li><span>FAX:</span> <?= $rowConfig['content_home3'] ?></li>
                                        <li><span>EMAIL:</span> <?= $rowConfig['content_home2'] ?></li>
                                        <li><span>ADRESS:</span> <?= $rowConfig['content_home1'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-main-content-element">
                        <aside class="widget-footer">
                            <div class="widget-title uni-uppercase">Chính sách</div>
                            <div class="widget-content">
                                <div class="foote-khachhang-mptoto">
                                    <?php include DIR_EMAIL."MS_EMAIL_MPTOTO_0004.php";?>
                                    <?php include DIR_SOCIAL."MS_SOCIAL_MPTOTO_0001.php";?>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="copyright-content">
                <p class="copyright-text">© Copyright 2017. All rights reserved. Design by Goldbridge</p>
            </div>
        </div>
    </div>
</footer>