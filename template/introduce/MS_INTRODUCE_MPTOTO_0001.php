<?php
    $page = new action_page();
    $detail_page = $page->getPageDetail_byId(57, $lang);
?>
<div class="gb-home-introduct_mptoto">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="gb-home-introduct_mptoto-left">
                    <h2><?= $detail_page['page_name'] ?></h2>
                    <p>
                        <?= $detail_page['page_content'] ?>
                    </p>
                    <!-- <a href="/<?= $detail_page['friendly_url'] ?>" class="xemtiep_mptoto">Xem tiếp</a> -->
                </div>
            </div>
            <!-- <div class="col-sm-6">
                <div class="gb-home-introduct_mptoto-right">
                    <img src="/images/<?= $detail_page['page_img'] ?>" alt="" class="img-responsive">
                </div>
            </div> -->
        </div>
    </div>
</div>