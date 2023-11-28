<div class="breadcrumb-area breadcrumb-padding-7">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <div class="breadcrumb-title breadcrumb-title-responsive">
                <h2 data-aos="fade-up" data-aos-delay="200"><?= $product['title'] ?></h2>
            </div>
            <ul data-aos="fade-up" data-aos-delay="300">
                <li>
                    <a href="/">HOME</a>
                </li>
                <li>
                    >
                </li>
                <li><a href="/shop">SHOP</a> </li>
                <li>
                    >
                </li>
                <li>SINGLE PRODUCT</li>
            </ul>
        </div>
    </div>
</div>
<div class="product-details-area section-padding-lr-2 pb-115">
    <div class="container-fluid">
        <div class="back-to-shop" data-aos="fade-up" data-aos-delay="200">
            <a href="shop.html"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/arrow-left-6.svg" alt=""> Back to Shop</a>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="product-details-tab" data-aos="fade-up" data-aos-delay="300">
                    <div class="pro-dec-big-img-slider">
                        <div class="easyzoom-style">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="<?= BASE_URL ?>assets/images/product-details/b-large-1.png">
                                    <img src="<?= BASE_URL ?>uploads/product/<?= $product['image'] ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="easyzoom-style">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="<?= BASE_URL ?>assets/images/product-details/b-large-2.png">
                                    <img src="<?= BASE_URL ?>uploads/product/<?= $product['image'] ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="easyzoom-style">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="<?= BASE_URL ?>assets/images/product-details/b-large-3.png">
                                    <img src="<?= BASE_URL ?>uploads/product/<?= $product['image'] ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="easyzoom-style">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="<?= BASE_URL ?>assets/images/product-details/b-large-4.png">
                                    <img src="<?= BASE_URL ?>assets/images/product-details/large-4.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="easyzoom-style">
                            <div class="easyzoom easyzoom--overlay">
                                <a href="<?= BASE_URL ?>assets/images/product-details/b-large-2.png">
                                    <img src="<?= BASE_URL ?>assets/images/product-details/large-2.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-dec-slider-small product-dec-small-style1">
                        <div class="product-dec-small active">
                            <img src="<?= BASE_URL ?>uploads/product/<?= $product['image'] ?>" alt="">
                        </div>
                        <div class="product-dec-small">
                            <img src="<?= BASE_URL ?>assets/images/product-details/small-2.png" alt="">
                        </div>
                        <div class="product-dec-small">
                            <img src="<?= BASE_URL ?>assets/images/product-details/small-3.png" alt="">
                        </div>
                        <div class="product-dec-small">
                            <img src="<?= BASE_URL ?>assets/images/product-details/small-4.png" alt="">
                        </div>
                        <div class="product-dec-small">
                            <img src="<?= BASE_URL ?>assets/images/product-details/small-2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="product-details-content product-details-mrg-left">
                    <!-- <div class="product-rating-stock-review" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-rating">
                            <a class="yellow" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></a>
                            <a class="yellow" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></a>
                            <a class="yellow" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></a>
                            <a class="yellow-half" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-half.svg" alt=""></a>
                            <a class="gray" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></a>
                        </div>
                        <div class="product-review">
                            <span>5 Reviews</span>
                        </div>
                        <div class="product-stock">
                            <a href="#"><img src="<?= BASE_URL ?>assets/images/icon-img/check-circle.svg" alt=""></a>
                            <span>In Stock</span>
                        </div>
                    </div> -->
                    <h2 data-aos="fade-up" data-aos-delay="300"><?= $product['title'] ?></h2>
                    <div class="product-details-price" data-aos="fade-up" data-aos-delay="400">
                        <span><?= $product['price'] ?></span>
                    </div>
                    <p data-aos="fade-up" data-aos-delay="500"><?= $product['title'] ?></p>
                    <!-- <div class="product-details-size clearfix">
                        <select class="nice-select nice-select-style-1">
                            <option>Select Size</option>
                            <option>L</option>
                            <option>M</option>
                            <option>S</option>
                            <option>XL</option>
                            <option>XXL</option>
                        </select>
                    </div> -->
                    <!-- <div class="product-details-color" data-aos="fade-up" data-aos-delay="600">
                        <span>Select Color</span>
                        <ul>
                            <li><a title="White" class="white" href="#">white</a></li>
                            <li><a title="Pink" class="pink" href="#">pink</a></li>
                            <li><a title="Yellow" class="yellow" href="#">yellow</a></li>
                            <li><a title="Black" class="black" href="#">black</a></li>
                            <li><a title="Blue" class="blue" href="#">blue</a></li>
                        </ul>
                    </div> -->
                    <form method="post" action="<?= BASE_URL ?>cart/add">
                        <div class="product-details-quality-cart" data-aos="fade-up" data-aos-delay="200">
                            <input type="hidden" value="<?= $product['id'] ?>" name="product_id" ?>
                            <div class="product-quality">
                                <input class="cart-plus-minus-box input-text qty text" name="quantity" value="1">
                            </div>
                            <div class="product-details-cart">
                                <button type="submit">Add to cart</button>
                            </div>

                        </div>
                    </form>
                    <div class="product-details-wishlist-compare" data-aos="fade-up" data-aos-delay="300">
                        <div class="product-details-wishlist">
                            <a href="#">
                                <img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/heart-2.svg" alt="">
                                Add to wishlist
                            </a>
                        </div>
                        <div class="product-details-compare">
                            <a href="#">
                                <img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/compare.svg" alt="">
                                ADD TO COMPARE
                            </a>
                        </div>
                    </div>
                    <div class="product-details-meta-wrap" data-aos="fade-up" data-aos-delay="400">

                        <div class="product-details-meta">
                            <span>Categories: </span>
                            <ul>
                                <li><a href="#"></a></li>

                            </ul>
                        </div>
                        <div class="product-details-meta">
                            <span>Tag: </span>
                            <ul>
                                <li><a href="#">Underwear,</a></li>
                                <li><a href="#">Bikini, </a></li>
                                <li><a href="#">Sexy, </a></li>
                                <li><a href="#">Hot Trend</a></li>
                            </ul>
                        </div>
                        <div class="product-details-meta">
                            <span>Product ID: </span>
                            <ul>
                                <li>274</li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-details-social" data-aos="fade-up" data-aos-delay="500">
                        <a class="facebook" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/facebook.svg" alt=""></a>
                        <a class="twitter" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/twitter.svg" alt=""></a>
                        <a class="pinterest" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/pinterest.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="description-review-area pb-180 border-bottom-1 ">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="tab-style-2 nav mb-70" data-aos="fade-up" data-aos-delay="200">
                <a class="active" href="#des-details1" data-bs-toggle="tab">Description </a>
                <a href="#des-details2" data-bs-toggle="tab" class=""> Additonal Information </a>
                <a href="#des-details3" data-bs-toggle="tab" class=""> Review (3) </a>
                <a href="#des-details4" data-bs-toggle="tab"> Vendor Info </a>
                <a href="#des-details5" data-bs-toggle="tab"> About Brand </a>
            </div>
            <div class="tab-content">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="pro-description-banner" data-aos="fade-up" data-aos-delay="300">
                                    <img src="assets/images/product-details/pro-details-banner.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="pro-description-content" data-aos="fade-up" data-aos-delay="400">
                                    <h2>We work with passion</h2>
                                    <p>Duis efficitur gravida tincidunt. Nam sodales vel odio at sollicitudin. Vestibulum sed rutrum nisl. Nulla diam arcu, facilisis nec blandit non, interdum et orci.</p>
                                    <p>Duis efficitur gravida tincidunt. Nam sodales vel odio at sollicitudin. Vestibulum sed rutrum nisl. Nulla diam arcu, facilisis nec blandit non, interdum et orci. Nam aliquam lorem vitae risus molestie convallis.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div id="des-details2" class="tab-pane">
                    <div class="specification-wrap table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="width1">Brands</td>
                                    <td>Airi, Brand, Draven, Skudmart, Yena</td>
                                </tr>
                                <tr>
                                    <td class="width1">Color</td>
                                    <td>Blue, Gray, Pink</td>
                                </tr>
                                <tr>
                                    <td class="width1">Size</td>
                                    <td>L, M, S, XL, XXL</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="review-wrapper">
                        <h3>1 review for Sleeve Button Cowl Neck</h3>
                        <div class="single-review">
                            <div class="review-img">
                                <img src="<?= BASE_URL ?>assets/images/product-details/review-1.jpg" alt="">
                            </div>
                            <div class="review-content">
                                <div class="review-rating">
                                    <a class="yellow" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></a>
                                    <a class="yellow" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></a>
                                    <a class="yellow" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></a>
                                    <a class="yellow" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-half.svg" alt=""></a>
                                    <a class="gray" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></a>
                                </div>
                                <h5><span>HasTech</span> - April 29, 2020</h5>
                                <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula lacus scelerisque</p>
                            </div>
                        </div>
                    </div>
                    <div class="ratting-form-wrapper">
                        <h3>Add a Review</h3>
                        <p>Your email address will not be published. Required fields are marked <span>*</span></p>
                        <div class="your-rating-wrap">
                            <span>Your rating</span>
                            <div class="your-rating">
                                <a class="yellow" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></a>
                                <a class="yellow" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></a>
                                <a class="yellow" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></a>
                                <a class="yellow" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-half.svg" alt=""></a>
                                <a class="gray" href="#"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></a>
                            </div>
                        </div>
                        <div class="ratting-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="rating-form-style mb-10">
                                            <label>Name <span>*</span></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="rating-form-style mb-10">
                                            <label>Email <span>*</span></label>
                                            <input type="email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="save-email-option">
                                            <p><input type="checkbox"> <label>Save my name, email, and website in this browser for the next time I comment.</label></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="rating-form-style mb-10">
                                            <label>Your review <span>*</span></label>
                                            <textarea name="Your Review"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-submit">
                                            <input type="submit" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="des-details4" class="tab-pane">
                    <div class="vendor-info-content">
                        <h3>Vendor Information</h3>
                        <ul>
                            <li><b>Store Name:</b>HasTech Fashion </li>
                            <li> <b>Vendor:</b> HasTech Fashion</li>
                            <li><b>Address:</b> PO Box 16122 Collins Street West <br>Melbourne Victoria </li>
                            <li class="rating"><span><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/star-gray-full.svg" alt=""></span>5.00 rating from 1 review</li>
                        </ul>
                    </div>
                </div>
                <div id="des-details5" class="tab-pane ">
                    <div class="about-brand-wrap">
                        <p>In elit risus, volutpat sed vestibulum sit amet, bibendum in lorem. Etiam aliquet convallis nibh at tempus. Proin gravida tincidunt egestas. Curabitur porta nibh ac enim semper, vitae pretium ante sollicitudin.</p>
                        <p>Duis efficitur gravida tincidunt. Nam sodales vel odio at sollicitudin. Vestibulum sed rutrum nisl. Nulla diam arcu, facilisis nec blandit non, interdum et orci. Duis efficitur gravida tincidunt. Nam sodales vel odio at sollicitudin. Vestibulum sed rutrum nisl. Nulla diam arcu, facilisis nec blandit non, interdum et orci. Nam aliquam lorem vitae risus molestie convallis.</p>
                    </div>
                </div> -->
<!-- </div>
</div>
</div> -->
<!-- </div>
<div class="related-product section-padding-lr-1 pb-100"> -->
<!-- <div class="container-fluid">
    <div class="section-title-4 mb-100 text-center">
        <h2>Related Products</h2>
    </div>
    <div class="related-product-active">
        <div class="product-plr-1" data-aos="fade-up" data-aos-delay="200">
            <div class="product-wrap">
                <div class="product-img img-zoom mb-4">
                    <a href="product-details.html">
                        <img class="default-img" src="<?= BASE_URL ?>assets/images/product/product-5.png" alt="">
                    </a>
                    <div class="product-action-wrap">
                        <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/eye.svg" alt=""></button>
                        <button title="Add To Cart"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/bag-2.svg" alt=""></button>
                        <button title="Wishlist"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/heart.svg" alt=""></button>
                    </div>
                </div>
                <div class="product-content text-center">
                    <h3><a href="product-details.html">VERTICAL QUILTED OVERSHIRT</a></h3>
                    <div class="product-price">
                        <span>$39.99</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-plr-1" data-aos="fade-up" data-aos-delay="300">
            <div class="product-wrap">
                <div class="product-img img-zoom mb-4">
                    <a href="product-details.html">
                        <img class="default-img" src="<?= BASE_URL ?>assets/images/product/product-6.png" alt="">
                    </a>
                    <div class="product-action-wrap">
                        <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/eye.svg" alt=""></button>
                        <button title="Add To Cart"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/bag-2.svg" alt=""></button>
                        <button title="Wishlist"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/heart.svg" alt=""></button>
                    </div>
                </div>
                <div class="product-content text-center">
                    <h3><a href="product-details.html">KNIT TECHNICAL FABRIC SNEAKERS</a></h3>
                    <div class="product-price">
                        <span>$39.99</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-plr-1" data-aos="fade-up" data-aos-delay="400">
            <div class="product-wrap">
                <div class="product-img img-zoom mb-4">
                    <a href="product-details.html">
                        <img class="default-img" src="<?= BASE_URL ?>assets/images/product/product-7.png" alt="">
                    </a>
                    <div class="product-action-wrap">
                        <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/eye.svg" alt=""></button>
                        <button title="Add To Cart"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/bag-2.svg" alt=""></button>
                        <button title="Wishlist"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/heart.svg" alt=""></button>
                    </div>
                </div>
                <div class="product-content text-center">
                    <h3><a href="product-details.html">BOILED WOOL SWEATER</a></h3>
                    <div class="product-price">
                        <span>$39.99</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-plr-1" data-aos="fade-up" data-aos-delay="500">
            <div class="product-wrap">
                <div class="product-img img-zoom mb-4">
                    <a href="product-details.html">
                        <img class="default-img" src="<?= BASE_URL ?>assets/images/product/product-8.png" alt="">
                    </a>
                    <div class="product-action-wrap">
                        <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/eye.svg" alt=""></button>
                        <button title="Add To Cart"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/bag-2.svg" alt=""></button>
                        <button title="Wishlist"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/heart.svg" alt=""></button>
                    </div>
                </div>
                <div class="product-content text-center">
                    <h3><a href="product-details.html">PLUSH BALLOON SLEEVE DRESS</a></h3>
                    <div class="product-price">
                        <span>$39.99</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-plr-1">
            <div class="product-wrap">
                <div class="product-img img-zoom mb-4">
                    <a href="product-details.html">
                        <img class="default-img" src="<?= BASE_URL ?>assets/images/product/product-4.png" alt="">
                    </a>
                    <div class="product-action-wrap">
                        <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/eye.svg" alt=""></button>
                        <button title="Add To Cart"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/bag-2.svg" alt=""></button>
                        <button title="Wishlist"><img class="injectable" src="<?= BASE_URL ?>assets/images/icon-img/heart.svg" alt=""></button>
                    </div>
                </div>
                <div class="product-content text-center">
                    <h3><a href="product-details.html">OVERSIZED HOODED SWEATSHIRT</a></h3>
                    <div class="product-price">
                        <span>$39.99</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
</div>