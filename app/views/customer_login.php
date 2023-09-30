<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<span style="color:blue; font-weight:bold">' . $value . '</span>';
    }
}
?>
<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact__form__title">
                    <h2>Đăng nhập</h2>
                </div>
            </div>
        </div>
        <form action="<?php echo BASE_URL ?>/user/login_customer" method="post">
            <div class="row">
                <div class="col-lg-10 col-md-12 ml-auto">
                    <input type="text" placeholder="Your Email" name="username" required>
                </div>
                <div class="col-lg-10 col-md-12 ml-auto">
                    <input type="password" placeholder="Your Password" name="password" required>
                </div>
                <div class="col-lg-4 text-center m-auto">
                    <input type="submit" class="btn btn-success text-white" value="Login" name="dangnhap">
                    <!-- <button type="reset" class="site-btn">Nhập lại</button> -->
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->