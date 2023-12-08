<div class="slider-area">
    <div class="slider-active-1 nav-style-1">
        <div class="single-slider-wrap slider-height-1 custom-d-flex custom-align-item-center single-animation-wrap">
            <div class="slider-img">
                <img src="<?= BASE_URL ?>assets/images/slider/slider-1.png" alt="">
            </div>
            <div class="slider-content slider-animated-1">
                <h3 class="animated">BEST SALE THIS WEEK</h3>
                <h1 class="animated">Spring <br> summer</h1>
                <div class="btn-style">
                    <a class="btn btn-outline-primary slider-btn animated" href="shop">Shop
                        now</a>
                </div>
            </div>
        </div>
        <div class="single-slider-wrap slider-height-1 custom-d-flex custom-align-item-center single-animation-wrap">
            <div class="slider-img">
                <img src="<?= BASE_URL ?>assets/images/slider/slider-2.png" alt="">
            </div>
            <div class="slider-content slider-animated-1">
                <h3 class="animated">BEST SALE THIS WEEK</h3>
                <h1 class="animated">Winter <br> summer</h1>
                <div class="btn-style">
                    <a class="btn btn-outline-primary slider-btn animated" href="product-details.html">Shop
                        now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area section-padding-1">
    <div class="section-title st-mb-145 text-center">
        <h2 data-aos="fade-up" data-aos-delay="200">Top Trend 2021</h2>
    </div>
    <div class="trend-product-wrap">
        <div class="container-fluid p-0">
            <div class="product-img-position">
                <img src="<?= BASE_URL ?>assets/images/product/trend.png" alt="">
            </div>
            <div class="row gx-0">
                <div class="offset-lg-6 col-lg-6">
                    <div class="trend-product-content">
                        <h2 data-aos="fade-up" data-aos-delay="200">New Boho</h2>
                        <p data-aos="fade-up" data-aos-delay="300">Suspendisse sit amet accumsan massa, et
                            ullamcorper purus. Ut eu auctor risus. Praesent in ligula nec velit venenatis
                            sagittis in quis justo. Suspendisse fermentum</p>
                        <div class="btn-style" data-aos="fade-up" data-aos-delay="400">
                            <a class="btn btn-outline-primary animated" href="product-details.html">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="features-area section-padding-2">
    <div class="container">
        <div class="features-all-wrap">
            <div class="row mb-n6">
                <div class="col-lg-4 col-md-4 mb-6">
                    <div class="features-wrap text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="features-img">
                            <img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/cut.svg" alt="">
                        </div>
                        <h3>New Discount</h3>
                        <p>Suspendisse sit amet accumsan massa, et ullamcorper purus</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mb-6">
                    <div class="features-wrap text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="features-img">
                            <img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/gift.svg" alt="">
                        </div>
                        <h3>Gift Vouchers</h3>
                        <p>Suspendisse sit amet accumsan massa, et ullamcorper purus</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mb-6">
                    <div class="features-wrap text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="features-img">
                            <img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/car.svg" alt="">
                        </div>
                        <h3>Free Delivery</h3>
                        <p>Suspendisse sit amet accumsan massa, et ullamcorper purus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area section-padding-lr-1 section-padding-3">
    <div class="container-fluid">
        <div class="section-title mb-12 text-center">
            <h2 data-aos="fade-up" data-aos-delay="200">New Arrival</h2>
        </div>
        <div class="tab-style-1 nav mb-10" data-aos="fade-up" data-aos-delay="300">
            <a class="active" href="#pro-1" data-bs-toggle="tab">ALL </a>
            <a href="#pro-2" data-bs-toggle="tab" class=""> MEN </a>
            <a href="#pro-3" data-bs-toggle="tab" class=""> WOMEN </a>
            <a href="#pro-4" data-bs-toggle="tab"> KIDS </a>
            <a href="#pro-5" data-bs-toggle="tab"> SALE OFF </a>
        </div>
        <div class="tab-content jump padding-54-row-col">
            <div id="pro-1" class="tab-pane active">
                <div class="row mb-n10">
                    <?php foreach ($eightProducts as $product) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-10">
                            <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                <div class="product-img img-zoom mb-4">
                                    <a href="product/<?= $product['id'] ?>">
                                        <img class="default-img" src="uploads/product/<?= $product['image'] ?>" alt="">
                                    </a>
                                    <div class="product-action-wrap">
                                        <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/eye.svg" alt=""></button>
                                        <a href="product/<?= $product['id'] ?>" title="Add To Cart"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/bag-2.svg" alt=""></a>
                                        <button title="Wishlist"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/heart.svg" alt=""></button>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html"><?= $product['title'] ?></a></h3>
                                    <div class="product-price">
                                        <span><?= $product['price'] ?> Đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="pro-2" class="tab-pane">
                <div class="row mb-n10">
                    <?php foreach ($eightProducts as $product) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-10">
                            <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                <div class="product-img img-zoom mb-4">
                                    <a href="product-details.html">
                                        <img class="default-img" src="uploads/product/<?= $product['image'] ?>" alt="">
                                    </a>
                                    <div class="product-action-wrap">
                                        <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/eye.svg" alt=""></button>
                                        <button title="Add To Cart"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/bag-2.svg" alt=""></button>
                                        <button title="Wishlist"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/heart.svg" alt=""></button>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html"><?= $product['title'] ?></a></h3>
                                    <div class="product-price">
                                        <span><?= $product['price'] ?> Đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="pro-3" class="tab-pane">
                <div class="row mb-n10">
                    <?php foreach ($eightProducts as $product) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-10">
                            <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                <div class="product-img img-zoom mb-4">
                                    <a href="product-details.html">
                                        <img class="default-img" src="uploads/product/<?= $product['image'] ?>" alt="">
                                    </a>
                                    <div class="product-action-wrap">
                                        <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/eye.svg" alt=""></button>
                                        <button title="Add To Cart"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/bag-2.svg" alt=""></button>
                                        <button title="Wishlist"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/heart.svg" alt=""></button>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html"><?= $product['title'] ?></a></h3>
                                    <div class="product-price">
                                        <span><?= $product['price'] ?> Đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="pro-4" class="tab-pane">
                <div class="row mb-n10">
                    <?php foreach ($eightProducts as $product) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-10">
                            <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                <div class="product-img img-zoom mb-4">
                                    <a href="product-details.html">
                                        <img class="default-img" src="uploads/product/<?= $product['image'] ?>" alt="">
                                    </a>
                                    <div class="product-action-wrap">
                                        <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/eye.svg" alt=""></button>
                                        <button title="Add To Cart"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/bag-2.svg" alt=""></button>
                                        <button title="Wishlist"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/heart.svg" alt=""></button>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html"><?= $product['title'] ?></a></h3>
                                    <div class="product-price">
                                        <span><?= $product['price'] ?> Đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="pro-5" class="tab-pane">
                <div class="row mb-n10">
                    <?php foreach ($eightProducts as $product) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-10">
                            <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                <div class="product-img img-zoom mb-4">
                                    <a href="product-details.html">
                                        <img class="default-img" src="uploads/product/<?= $product['image'] ?>" alt="">
                                    </a>
                                    <div class="product-action-wrap">
                                        <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/eye.svg" alt=""></button>
                                        <button title="Add To Cart"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/bag-2.svg" alt=""></button>
                                        <button title="Wishlist"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/heart.svg" alt=""></button>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="product-details.html"><?= $product['title'] ?></a></h3>
                                    <div class="product-price">
                                        <span><?= $product['price'] ?> Đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area bg-gray section-padding-4 overflow-hidden">
    <div class="container-fluid p-0">
        <div class="product-area-wrap">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-4">
                    <div class="section-title mb-10">
                        <h2 data-aos="fade-up" data-aos-delay="200">Special Offer</h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="product-slider-active nav-style-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-plr-1">
                            <div class="product-wrap">
                                <div class="product-img img-zoom mb-5">
                                    <a href="product-details.html">
                                        <img class="default-img" src="<?= BASE_URL ?>assets/images/product/product-9.png" alt="">
                                    </a>
                                </div>
                                <div class="product-content-2">
                                    <h3><a href="product-details.html">COAT 2021</a></h3>
                                    <span>OFF 30%</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-plr-1">
                            <div class="product-wrap">
                                <div class="product-img img-zoom mb-5">
                                    <a href="product-details.html">
                                        <img class="default-img" src="<?= BASE_URL ?>assets/images/product/product-10.png" alt="">
                                    </a>
                                </div>
                                <div class="product-content-2">
                                    <h3><a href="product-details.html">MEN SUITS</a></h3>
                                    <span>OFF 30%</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-plr-1">
                            <div class="product-wrap">
                                <div class="product-img img-zoom mb-5">
                                    <a href="product-details.html">
                                        <img class="default-img" src="<?= BASE_URL ?>assets/images/product/product-9.png" alt="">
                                    </a>
                                </div>
                                <div class="product-content-2">
                                    <h3><a href="product-details.html">COAT 2021</a></h3>
                                    <span>OFF 30%</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-plr-1">
                            <div class="product-wrap">
                                <div class="product-img img-zoom mb-5">
                                    <a href="product-details.html">
                                        <img class="default-img" src="<?= BASE_URL ?>assets/images/product/product-10.png" alt="">
                                    </a>
                                </div>
                                <div class="product-content-2">
                                    <h3><a href="product-details.html">MEN SUITS</a></h3>
                                    <span>OFF 30%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="subscribe-area section-padding-5 bg-img" style="background-image:url(<?= BASE_URL ?>assets/images/bg/bg-1.png)">
    <div class="container">
        <div class="subscribe-content">
            <div class="section-title mb-12 text-center">
                <h2 class="white" data-aos="fade-up" data-aos-delay="200">Email for newsletter</h2>
                <p data-aos="fade-up" data-aos-delay="300">Suspendisse sit amet accumsan massa, et ullamcorper
                    purus. Ut eu auctor risus. Praesent in ligula nec velit venenatis sagittis in quis justo.
                    Suspendisse fermentum</p>
            </div>
            <div id="mc_embed_signup" class="subscribe-form" data-aos="fade-up" data-aos-delay="400">
                <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style-2" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="https://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                    <div id="mc_embed_signup_scroll" class="mc-form">
                        <input class="email" type="email" required="" placeholder="Email address…" name="EMAIL" value="">
                        <div class="mc-news" aria-hidden="true">
                            <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                        </div>
                        <div class="clear">
                            <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Subscribe">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="instagram-area section-padding-lr-2 bg-gray-2 section-padding-6">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="instagram-img-wrap">
                    <div class="row mb-n6">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-6">
                            <div class="instagram-img" data-aos="fade-up" data-aos-delay="200">
                                <a href="#"><img src="<?= BASE_URL ?>assets/images/instagram/instagram-1.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-6">
                            <div class="instagram-img" data-aos="fade-up" data-aos-delay="300">
                                <a href="#"><img src="<?= BASE_URL ?>assets/images/instagram/instagram-2.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-6">
                            <div class="instagram-img" data-aos="fade-up" data-aos-delay="200">
                                <a href="#"><img src="<?= BASE_URL ?>assets/images/instagram/instagram-3.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-6">
                            <div class="instagram-img" data-aos="fade-up" data-aos-delay="300">
                                <a href="#"><img src="<?= BASE_URL ?>assets/images/instagram/instagram-4.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="instagram-title text-center">
                    <h2 data-aos="fade-up" data-aos-delay="200">SHOP INSTAGRAM</h2>
                    <p data-aos="fade-up" data-aos-delay="300">Suspendisse sit amet accumsan massa, et
                        ullamcorper purus. Ut eu auctor risus. Praesent in ligula nec v</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner-area section-padding-lr-1 section-padding-7">
    <div class="container-fluid">
        <div class="section-title mb-12 text-center">
            <h2 data-aos="fade-up" data-aos-delay="200">HOT PROMOTION THIS WEEK</h2>
        </div>
        <div class="row mb-n6">
            <div class="col-lg-6 mb-6">
                <div class="banner-wrap img-zoom" data-aos="fade-up" data-aos-delay="200">
                    <a href="product-details.html"><img src="<?= BASE_URL ?>assets/images/banner/banner-1.png" alt=""></a>
                    <div class="banner-content-1">
                        <h4>MERRY X’MAS</h4>
                        <h2>off 30%</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-6">
                <div class="banner-wrap img-zoom" data-aos="fade-up" data-aos-delay="300">
                    <a href="product-details.html"><img src="<?= BASE_URL ?>assets/images/banner/banner-2.png" alt=""></a>
                    <div class="banner-content-2">
                        <h3>Great Holiday</h3>
                        <h2>Upto 50%</h2>
                        <div class="btn-style">
                            <a class="btn btn-outline-primary animated btn-padding-2" href="product-details.html">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="brand-logo section-padding-lr-1 section-padding-8">
    <div class="container-fluid">
        <div class="brand-logo-active">
            <div class="brand-logo-plr-1" data-aos="fade-up" data-aos-delay="200">
                <div class="single-brand-logo">
                    <img src="<?= BASE_URL ?>assets/images/brand-logo/brand-logo-1.png" alt="">
                </div>
            </div>
            <div class="brand-logo-plr-1" data-aos="fade-up" data-aos-delay="300">
                <div class="single-brand-logo">
                    <img src="<?= BASE_URL ?>assets/images/brand-logo/brand-logo-2.png" alt="">
                </div>
            </div>
            <div class="brand-logo-plr-1" data-aos="fade-up" data-aos-delay="400">
                <div class="single-brand-logo">
                    <img src="<?= BASE_URL ?>assets/images/brand-logo/brand-logo-3.png" alt="">
                </div>
            </div>
            <div class="brand-logo-plr-1" data-aos="fade-up" data-aos-delay="500">
                <div class="single-brand-logo">
                    <img src="<?= BASE_URL ?>assets/images/brand-logo/brand-logo-4.png" alt="">
                </div>
            </div>
            <div class="brand-logo-plr-1" data-aos="fade-up" data-aos-delay="600">
                <div class="single-brand-logo">
                    <img src="<?= BASE_URL ?>assets/images/brand-logo/brand-logo-5.png" alt="">
                </div>
            </div>
            <div class="brand-logo-plr-1" data-aos="fade-up" data-aos-delay="700">
                <div class="single-brand-logo">
                    <img src="<?= BASE_URL ?>assets/images/brand-logo/brand-logo-2.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>