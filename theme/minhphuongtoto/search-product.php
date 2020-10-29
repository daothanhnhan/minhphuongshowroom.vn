<?php
	$limit = 12;
	function search ($lang, $trang, $limit) {
		if (isset($_POST['q'])) {
			$q = $_POST['q'];
			$q = trim($q);
	        $q = vi_en1($q);	        
		} else {
			$q = $_GET['search'];
        	// $q = str_replace('-', ' ', $q);
		}
        $productcat_id = $_SESSION['search_productcat_id'];

		$start = $trang * $limit;
		global $conn_vn;
		$sql = "SELECT * FROM product_languages INNER JOIN product ON product_languages.product_id = product.product_id WHERE product_languages.friendly_url like '%$q%' And product_languages.languages_code = '$lang' AND product.productcat_ar like '%$productcat_id%'";//echo $sql;
		$result = mysqli_query($conn_vn, $sql);
		$count = mysqli_num_rows($result);

		$sql = "SELECT * FROM product_languages INNER JOIN product ON product_languages.product_id = product.product_id WHERE product_languages.friendly_url like '%$q%' And product_languages.languages_code = '$lang' AND product.productcat_ar like '%$productcat_id%' LIMIT $start,$limit";
		$result = mysqli_query($conn_vn, $sql);
		$rows = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		$return = array(
				'data' => $rows,
				'count' => $count,
				'q' => $q
			);
		return $return;
	}
	$rows = search($lang, $trang, $limit);
?>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_MPTOTO_0001.php";?>
<div class="gb-page-sanpham_mptoto" >
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="productContainer">
                <div class="row">
                    <?php 
                        $d = 0;
                        foreach ($rows['data'] as $row) {
                            $d++;
                            $rowLang1 = $action_product->getProductLangDetail_byId($row['product_id'],$lang);
                            $row1 = $action_product->getProductDetail_byId($row['product_id'],$lang); 
                    ?>
                        <div class="col-sm-4">
                            <div class="gb-product-item_mptoto">
                                <div class="gb-product-item-img">
                                    <div class="gb-product-item-img-main">
                                        <a href="/<?= $rowLang1['friendly_url'] ?>">
                                            <img src="/images/<?= $row1['product_img'] ?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="gb-product-item-img-replate">
                                        <a href="/<?= $rowLang1['friendly_url'] ?>">
                                            <img src="/images/<?= $row1['product_img_2'] ?>" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                                <div class="gb-product-item-img-text">
                                    <h2>
                                        <a href="/<?= $rowLang1['friendly_url'] ?>">
                                            <?= $rowLang1['lang_product_name'] ?>
                                        </a>
                                    </h2>
                                    <?= $rowLang1['lang_product_des'] ?>
                                    <?php include DIR_PRODUCT."MS_PRODUCT_MPTOTO_0002.php";?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php //include DIR_PAGINATION."MS_PAGINATION_MPTOTO_0001.php";?>
                <div>
                    <?php 
                        $config = array(
                            'current_page'  => $trang+1, // Trang hiện tại
                            'total_record'  => $rows['count'], // Tổng số record
                            'total_page'    => 1, // Tổng số trang
                            'limit'         => $limit,// limit
                            'start'         => 0, // start
                            'link_full'     => '',// Link full có dạng như sau: domain/com/page/{page}
                            'link_first'    => '',// Link trang đầu tiên
                            'range'         => 9, // Số button trang bạn muốn hiển thị 
                            'min'           => 0, // Tham số min
                            'max'           => 0,  // tham số max, min và max là 2 tham số private
                            'search'        => str_replace(' ', '-', $rows['q'])

                        );

                        $pagination = new Pagination;
                        $pagination->init($config);
                        echo $pagination->htmlPaging1();
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php include DIR_SIDEBAR."MS_SIDEBAR_MPTOTO_0001.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_MPTOTO_0006.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_MPTOTO_0004.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_MPTOTO_0007.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_MPTOTO_0005.php";?>
            </div>
        </div>
    </div>
</div>