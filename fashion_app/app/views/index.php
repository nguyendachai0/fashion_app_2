<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Outeli - Fashion eCommerce Bootstrap 5 Template</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Outeli Fashion eCommerce Bootstrap 5 Template is a stunning e-commerce website template that is the best choice for any online store.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= BASE_URL ?>assets/images/favicon.png">

    <!-- All CSS is here
	============================================ -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendor/proximanova.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendor/line-awesome.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/plugins/slick.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/plugins/slinky.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/plugins/jquery-ui.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/plugins/magnific-popup.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/plugins/easyzoom.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/plugins/select2.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/plugins/aos.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css" />
</head>

<body>
    <div class="main-wrapper wrapper-2">
        <?php require "../app/views/layouts/header.php"; ?>

        <?php require $layout; ?>

        <?php require "../app/views/layouts/footer.php"; ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-5 col-md-12 col-12">
                                <div class="quickview-img">
                                    <a href="product-details.html"><img src="<?= BASE_URL ?>assets/images/product-details/large-1.png" alt=""></a>
                                </div>
                                <!-- Thumbnail Large Image End -->
                            </div>
                            <div class="col-lg-7 col-md-12 col-12">
                                <div class="product-details-content quickview-content">
                                    <h2>PLUSH BALLOON SLEEVE DRESS</h2>
                                    <div class="product-details-price">
                                        <span>$49.99</span>
                                    </div>
                                    <p>In elit risus, volutpat sed vestibulum sit amet, bibendum in lorem. Etiam aliquet
                                        convallis nibh at tempus. Proin gravida tincidunt egestas. Curabitur porta nibh
                                        ac enim semper.</p>
                                    <div class="product-details-quality-cart">
                                        <div class="product-quality">
                                            <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                                        </div>
                                        <div class="product-details-cart">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="product-details-wishlist-compare">
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
                                    <div class="product-details-meta-wrap">
                                        <div class="product-details-meta">
                                            <span>SKU: </span>
                                            <ul>
                                                <li>N/A</li>
                                            </ul>
                                        </div>
                                        <div class="product-details-meta">
                                            <span>Categories: </span>
                                            <ul>
                                                <li><a href="#">Fashion,</a></li>
                                                <li><a href="#">Under wear</a></li>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    </div>
    <!-- Global Vendor, plugins JS -->
    <script src="<?= BASE_URL ?>assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/svg-inject.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/slick.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/wow.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/slinky.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/jquery-ui.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/jquery-ui-touch-punch.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/countdown.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/magnific-popup.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/easyzoom.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/scrollup.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/aos.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/select2.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/plugins/jquery.nice-select.min.js"></script>
    <!-- Main JS -->
    <script src="<?= BASE_URL ?>assets/js/main.js"></script>
</body>

</html>