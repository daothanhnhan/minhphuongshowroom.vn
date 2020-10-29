<nav class="menu-category_mptoto" >
    <div class="row">
        <div class="col-md-3 col-sm-1 col-xs-12 prz-ap">
            <div class="menucategory-top_mptoto">
                <div class="txtmenucategory-top_mptoto"><i class="fa fa-bars"></i>&nbsp; <span>Danh mục sản phẩm</span></div>
                <!-- trang chu -->

                <div class="gb-menu-category_mptoto">
                    <nav class="main-navigation uni-menu-text">
                        <div class="cssmenu">
                            <ul>
                                <?php
                                    $action_product = new action_product();
                                    $list_product_parent = $action_product->getProductCat_byProductCatIdParent(0, 'asc');
                                    foreach ($list_product_parent as $item) {
                                ?>
                                    <li class="has-sub">
                                        <a href="/<?= $item['friendly_url'] ?>">
                                            <img src="/images/<?= $item['productcat_img'] ?>" class="icon_cate_websmienphi">
                                            <?= $item['productcat_name'] ?>
                                        </a>
                                        <ul class="row">
                                            <?php
                                                $d = 0;
                                                $list_product_sub = $action_product->getProductCat_byProductCatIdParent($item['productcat_id'], '');
                                                foreach ($list_product_sub as $item_sub) {
                                                    $d++;
                                            ?>
                                                <li class="col-md-5">
                                                    <div class="item">
                                                        <h3><a href="/<?= $item_sub['friendly_url'] ?>"><?= $item_sub['productcat_name'] ?></a></h3>
                                                        <ul>
                                                            <?php
                                                                $list_product_sub_2 = $action_product->getProductCat_byProductCatIdParent($item_sub['productcat_id'], '');
                                                                foreach ($list_product_sub_2 as $item_sub_2) {
                                                            ?>
                                                                <li><a href="/<?= $item_sub_2['friendly_url'] ?>"> <?= $item_sub_2['productcat_name'] ?></a></li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <?php 
                                                    if ($d%2==0) {
                                                        echo '<hr style="width:100%;border:0;margin:0;" />';
                                                    }
                                                ?>
                                            <?php } ?>
                                            <li class="image_cate">
                                                <img src="/images/<?= $item['productcat_sub'] ?>" alt="" class="lazy_menu img-responsive">
                                            </li>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-11 col-xs-12">
            <div class="menu-right-mptoto">
                <div class="cssmenu">
                    <?php
                        $list_menu = $menu->getListMainMenu_byOrderASC();
                        $menu->showMenu_byMultiLevel_mainMenuMPToTo($list_menu,0,$lang,0);
                    ?>
                </div>
            </div>
        </div>
    </div>
</nav>