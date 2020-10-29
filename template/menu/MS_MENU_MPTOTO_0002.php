<nav class="visible-sm visible-xs mobile-menu-container mobile-nav">
    <div class="menu-mobile-nav">
        <span class="icon-bar"><i class="fa fa-bars" aria-hidden="true"></i> Danh mục sản phẩm</span>
    </div>
    <div id="cssmenu" class="animated">
        <div class="uni-icons-close"><i class="fa fa-times" aria-hidden="true"></i></div>
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
                                                $list_product_sub = $action_product->getProductCat_byProductCatIdParent($item['productcat_id'], '');
                                                foreach ($list_product_sub as $item_sub) {
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
                                            <?php } ?>
                                            <li class="image_cate">
                                                <img src="/images/<?= $item['productcat_sub'] ?>" alt="" class="lazy_menu img-responsive">
                                            </li>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
        <?php
                        $list_menu = $menu->getListMainMenu_byOrderASC();
                        $menu->showMenu_byMultiLevel_mainMenuMPToTo($list_menu,0,$lang,0);
                    ?>
        <div class="clearfix"></div>
    </div>
</nav>

<script>
    $(document).ready(function () {
        //-----------------menu mobile---------------------
        $('.mobile-menu-container .menu-mobile-nav').on('click', function (e) {
            if($(e.target).is('.icon-bar')){
                $('#cssmenu').slideToggle();
                $('#cssmenu ul').slideToggle();
                $('#cssmenu ul ul').hide();
            }
        });
        $('.uni-icons-close'). on('click', function (e) {
            if($(e.target).is('i')){
                $('#cssmenu').hide( 500);
                $('#cssmenu ul').hide(500);
            }
        });

        (function($) {

            $.fn.menumaker = function(options) {

                var cssmenu = $(this), settings = $.extend({
                    title: "Menu",
                    format: "dropdown",
                    sticky: false
                }, options);

                return this.each(function() {

                    cssmenu.find('li ul').parent().addClass('has-sub');

                    var multiTg = function() {
                        cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                        cssmenu.find('.submenu-button').on('click', function() {
                            $(this).toggleClass('submenu-opened');
                            $(this).toggleClass('active');
                            if ($(this).siblings('ul').hasClass('open')) {
                                $(this).siblings('ul').removeClass('open').slideToggle();
                            }
                            else {
                                $(this).siblings('ul').addClass('open').slideToggle();
                            }
                        });
                    };

                    if (settings.format === 'multitoggle') multiTg();
                    else cssmenu.addClass('dropdown');

                    if (settings.sticky === true) cssmenu.css('position', 'fixed');

                    var resizeFix = function() {
                        if ($( window ).width() > 768) {
                            cssmenu.find('ul').show();
                        }

                        if ($(window).width() <= 768) {
                            cssmenu.find('ul').hide().removeClass('open');
                        }
                    };
                    // resizeFix();
                    // return $(window).on('resize', resizeFix);

                });
            };
        })(jQuery);

        (function($){
            $(document).ready(function() {
                $("#cssmenu").menumaker({
                    title: "",
                    format: "multitoggle"
                });

                $("#cssmenu").prepend("<div id='menu-line'></div>");

                var foundActive = false, activeElement, linePosition = 0, menuLine = $("#cssmenu #menu-line"), lineWidth, defaultPosition, defaultWidth;

                $("#cssmenu > ul > li").each(function() {
                    if ($(this).hasClass('active')) {
                        activeElement = $(this);
                        foundActive = true;
                    }
                });

                if (foundActive === false) {
                    activeElement = $("#cssmenu > ul > li").first();
                }

                defaultWidth = lineWidth = activeElement.width();

                // defaultPosition = linePosition = activeElement.position().left;

                menuLine.css("width", lineWidth);
                menuLine.css("left", linePosition);

                $("#cssmenu > ul > li").on('mouseenter', function () {
                        activeElement = $(this);
                        lineWidth = activeElement.width();
                        linePosition = activeElement.position().left;
                        menuLine.css("width", lineWidth);
                        menuLine.css("left", linePosition);
                    },
                    function() {
                        menuLine.css("left", defaultPosition);
                        menuLine.css("width", defaultWidth);
                    });
            });
        })(jQuery);
    });
</script>