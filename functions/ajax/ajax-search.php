<?php
include_once('../database.php');

if (isset($_GET['keyword'])) {
    $keyword = trim($_GET['keyword']);
    $keyword = mysqli_real_escape_string($conn_vn, $keyword);
    $query = "SELECT * FROM product WHERE product_name LIKE '%$keyword%' LIMIT 10 ";
    $result = mysqli_query($conn_vn, $query);
    if ($result) {
        if (mysqli_affected_rows($conn_vn) != 0) {
            while ($row1 = mysqli_fetch_array($result)) {
                echo '<ul>
                            <li>
                                <a href="/' . $row1['friendly_url'] . '" title="">
                                    <div class="product-image">
                                        <img alt="" src="/images/' . $row1['product_img'] . '">
                                    </div>
                                    <div class="product-name">' . $row1['product_name'] . '</div>';
                if ($row1['product_price_sale'] == 0) {
                    echo '<div class="product-price">
                            <span class="price">' . number_format($row1['product_price']) . ' VNĐ</span>
                        </div>';

                    echo ' </a>
                            </li>
                        </ul>';
                } else {
                    echo '<div class="product-price">
                            <span class="special">' . number_format($row1['product_price']) . ' VNĐ</span>
                            <span class="price">' . number_format($row1['product_price_sale']) . ' VNĐ</span>
                        </div>';
                    echo ' </a>
                            </li>
                        </ul>';
                }



            }
        }
    }
}
?>