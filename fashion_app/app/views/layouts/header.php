<header class="header-area section-padding-lr-1 transparent-bar header-padding-tb sticky-bar sticky-white-bg">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-4">
                <div class="language-wrap">
                    <ul>
                        <li><a href="#">ENG</a></li>
                        <li><a href="#">FR</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-4">
                <div class="logo text-center">
                    <a href="/"><img src="<?= BASE_URL ?>assets/images/logo/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="col-4">
                <div class="header-action-wrap">
                    <div class="header-action-cart">
                        <a class="cart-active" href="#">
                            <img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/bag.svg" alt="">
                            <span class="product-count">0<?= ($_SESSION['totalItems']) ? $_SESSION['totalItems'] : '0'  ?> </span>
                        </a>
                    </div>
                    <div class="header-action-menu">
                        <a class="menu-active-button" href="#">
                            <span class="info-width-1"></span>
                            <span class="info-width-2"></span>
                            <span class="info-width-3"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- mini cart start -->
<div class="sidebar-cart-active">
    <div class="sidebar-cart-all">
        <a class="cart-close" href="#"><i class="las la-times"></i></a>
        <div class="cart-content">
            <h3>Shopping Cart</h3>
            <?php if (isset($_SESSION['cartDetails'])) : ?>
                <ul>
                    <?php foreach ($_SESSION['cartDetails'] as $item) : ?>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="product-details.html"><img src="<?= BASE_URL ?>uploads/product/<?= $item['image'] ?>" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="product-details.html"><?= $item['product_name'] ?></a></h4>
                                <span> <?= $item['quantity'] ?> x <?= $item['product_price'] ?></span>
                            </div>
                            <div class="cart-delete">
                                <a href="#"><i class="las la-trash"></i></a>
                            </div>
                        </li>
                    <?php endforeach; ?>

                </ul>
                <div class="cart-total">
                    <h4>Subtotal: <span><?= $_SESSION['total_price'] ?> Đ</span></h4>
                </div>
            <?php endif; ?>
            <div class="btn-style cart-checkout-btn">
                <a class="btn btn-outline-primary" href="/cart">View cart</a>
                <a class="btn btn-outline-primary" href="/checkout">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- Menu start -->
<div class="off-canvas-active">
    <a class="off-canvas-close"><i class="las la-times"></i></a>
    <div class="off-canvas-wrap">
        <div class="menu-wrap">
            <div id="menu" class="slinky-mobile-menu text-left">
                <ul>
                    <li>
                        <a href="/">HOME</a>
                        <!-- <ul>
                            <li><a href="index.html">Home version 1 </a></li>
                            <li><a href="index-2.html">Home version 2</a></li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="#">PAGES</a>
                        <ul>
                            <li><a href="about-us">About Us</a></li>
                            <li><a href="cart">Cart Page</a></li>
                            <li><a href="contact">Contact Us</a></li>
                            <?php if (!isset($_SESSION['user_id'])) : ?>
                                <li><a href="login">Login</a></li>
                                <li><a href="register">Register</a></li>
                            <?php else : ?>
                                <li><a href="logout">Logout</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li>
                        <a href="shop">SHOP</a>

                    </li>
                    <li>
                        <a href="blog">BLOG</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>