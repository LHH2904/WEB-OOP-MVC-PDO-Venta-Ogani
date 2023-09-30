<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo BASE_URL ?>/public/images/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (isset($_SESSION['shopping_cart'])) {
                            ?>
                                <form action="<?php echo BASE_URL ?>/giohang/updategiohang" method="post">
                                    <?php
                                    $total = 0;
                                    foreach ($_SESSION['shopping_cart'] as $key => $value) {
                                        $sub_total = $value['product_quantity'] * $value['product_price'];
                                        $total += $sub_total;
                                    ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $value['product_image'] ?>" width="100" height="100" alt="">
                                                <h5><?php echo $value['product_title'] ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                <?php echo number_format($value['product_price'], 0, ',', '.') . ' đ' ?>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="number" value="<?php echo $value['product_quantity'] ?>" name="qty[<?php echo $value['product_id'] ?>]">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                <?php echo number_format($sub_total, 0, ',', '.') . ' đ' ?>
                                            </td>
                                            <td class="shoping__cart__item__close">

                                                <button type="submit" class="btn btn-sm btn-danger" value="<?php echo $value['product_id'] ?>" name="delete_cart">Xóa</button>
                                                <!-- <span class="icon_close"></span> -->
                                                <button type="submit" class="btn btn-sm btn-success mt-2" value="<?php echo $value['product_id'] ?>" name="update_cart">Cập
                                                    nhật</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </form>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between">
                <div class="shoping__cart__btns">
                    <a href="<?php echo BASE_URL ?>" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
        </div>
        <hr>
        <form action="<?php echo BASE_URL ?>/giohang/dathang" method="post" autocomplete="off">
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
                        <input type="text" placeholder="Địa chỉ" class="checkout__input__add" name="address" required>
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
                        <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." name="noidung">
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total <span><?php echo number_format($total, 0, ',', '.') . ' đ' ?></span></li>
                        </ul>
                        <input type="submit" class="site-btn" name="frmSubmit" value="Gửi đơn hàng">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- </form> -->
    </div>
</section>
<!-- Shoping Cart Section End -->