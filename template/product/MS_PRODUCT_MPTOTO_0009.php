<link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">
<div class="gb-home-product gb-home-product-relate">
    <div class="titleCategoryProduct_mptoto">SẢN PHẨM LIÊN QUAN</div>
    <div class="gb-home-product-relate-slide owl-carousel owl-theme">
        <?php
            $action_relative = new action_product();
            $list_pro_relative = $action_relative->getListProductRelate_byIdCat_hasLimit($productcat_id, 8);
            foreach ($list_pro_relative as $item) {
                $rowLang1 = $action_relative->getProductLangDetail_byId($item['product_id'],$lang);
                $row1 = $action_relative->getProductDetail_byId($item['product_id'],$lang); 
        ?>
            <div class="item">
                <div class="gb-product-item_mptoto">
                    <div class="gb-product-item-img">
                        <div class="gb-product-item-img-main">
                                <a href="/<?= $rowLang1['friendly_url'] ?>"><img src="/images/<?= $row1['product_img'] ?>" alt="" class="img-responsive"></a>
                            </div>
                            <div class="gb-product-item-img-replate">
                                <a href="/<?= $rowLang1['friendly_url'] ?>"><img src="/images/<?= $row1['product_img_2'] ?>" alt="" class="img-responsive"></a>
                            </div>
                    </div>
                    <div class="gb-product-item-img-text">
                        <h2><a href="/<?= $rowLang1['friendly_url'] ?>"><?= $rowLang1['lang_product_name'] ?></a></h2>
                        <?= $rowLang1['lang_product_des'] ?>
                    </div>
                    <div class="gb-product-item-prices_mptoto text-center">
                        <p class="gb-prices-news"><?= number_format($row1['product_price']) ?> VNĐ</p>
                        <p class="gb-prices-old"><?= number_format($row1['product_price']) ?> VNĐ</p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script src="/plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function (){
        var owl = $('.gb-home-product-relate-slide');
        owl.owlCarousel({
            loop:true,
            margin:30,
            navSpeed:500,
            nav:true,
            dots:false,
            autoplay: true,
            rewind: true,
            navText:[],
            responsive:{
                0:{
                    items:1
                },
                767:{
                    items: 2
                },
                992:{
                    items:4
                }
            }
        });
    });
</script>