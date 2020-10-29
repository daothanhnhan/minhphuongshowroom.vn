<?php
    $email = new action_email();
    $email->gui_email();
?>
<div class="gb-news-letter">
    <div class="uni-footer-newletter">
        <h4>Để lại số điện thoại để nhận giá tốt hơn</h4>
        <form action="" method="post" accept-charset="utf-8">
            <div class="input-group">
                <input type="tel" class="form-control" name="email" placeholder="Nhập số điện thoại của bạn">
                <span class="input-group-btn">
                    <button class="btn btn-theme" type="submit" name="send_email" style="color: #333;"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </span>
            </div>
        </form>
    </div>
</div>