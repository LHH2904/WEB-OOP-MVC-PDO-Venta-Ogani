<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo BASE_URL ?>/public/images/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <!-- <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6>
            </div>
        </div> -->
        <div class="checkout__form">

            <h4>Billing Details</h4>
            <form action="<?php echo BASE_URL ?>/user/giohang/dathang" method="post" autocomplete="off">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Name<span>*</span></p>
                                    <input type="text" name="name" required placeholder="Họ và tên">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Địa chỉ" class="checkout__input__add" name="address"
                                required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="number" name="phone" required placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" required name="email" placeholder="Email của bạn">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery."
                                name="noidung">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng cộng</span></div>
                            <ul>
                                <?php
                                $total = 0;
                                foreach ($_SESSION["shopping_cart"] as $cart) {
                                    extract($cart);
                                    // var_dump($cart);
                                    $total += $product_price * $product_quantity;
                                ?>
                                <li><?= $product_title ?><span><?= number_format($product_price, 0, ',', '.') . ' đ' ?></span>
                                </li>
                                <!-- <li>Fresh Vegetable <span>$151.99</span></li>
                                <li>Organic Bananas <span>$53.99</span></li> -->
                                <?php
                                }
                                ?>
                            </ul>
                            <div class="checkout__order__total">Total <span><?= $total ?></span></div>
                            <!-- <button type="submit" class="site-btn">PLACE ORDER</button> -->
                            <input type="submit" class="site-btn" name="frmSubmit" value="Gửi đơn hàng">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->