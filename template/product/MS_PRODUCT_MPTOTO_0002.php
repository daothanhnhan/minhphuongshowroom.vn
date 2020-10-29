<?php
	if($row1['product_price'] != 0 && $row1['product_price_sale'] != 0){
?>
<div class="gb-product-item-prices_mptoto">
    <p class="gb-prices-news"><?= number_format($row1['product_price_sale']) ?> VNĐ</p>
    <p class="gb-prices-old"><?= number_format($row1['product_price']) ?> VNĐ</p>
</div>
<?php }else if($row1['product_price'] != 0 && $row1['product_price_sale'] == 0){ ?>
<div class="gb-product-item-prices_mptoto">
	<p class="gb-prices-news"><?= number_format($row1['product_price']) ?> VNĐ</p>
</div>
<?php }else{?>
	<div class="gb-product-item-lienhe_mptoto">
	    <a href="tel:<?= $rowConfig['content_home3'] ?>" title="">LIÊN HỆ</a>
	</div>
<?php } ?>


<style type="text/css" media="screen">
	.gb-product-item-lienhe_mptoto a{
		display: inline-block;
		padding: 10px 20px;
		color: #fff;
		background: #f53b3b;
		margin-top: 15px;
	}
</style>