<div class="breadcrumb-area breadcrumb-padding-6">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <div class="breadcrumb-title">
                <h2>My order</h2>
            </div>
            <ul>
                <li>
                    <a href="/">HOME</a>
                </li>
                <li>
                    >
                </li>
                <li>My Order </li>
            </ul>
        </div>
    </div>
</div>
<div class="cart-area pb-130">
    <div class="container">
        <div class="row pb-120">
            <div class="col-12">

                <div class="cart-table-content">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="width-thumbnail"></th>
                                    <th class="width-price">item</th>
                                    <th class="width-price">Unit Price</th>
                                    <th class="width-quantity">Quantity</th>
                                    <th class="width-subtotal">Subtotal</th>
                                    <th class="width-subtotal">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($myOrder as $item) : ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="product-details.html"><img src="<?= BASE_URL ?>uploads/product/<?= $item['image'] ?>" alt=""></a>
                                        </td>
                                        <td class="product-name">
                                            <h5><a href="product-details.html"><?= $item['title'] ?></a></h5>
                                        </td>
                                        <td class="product-price"><span class="amount"><?= $item['unit_price'] ?> Đ</span></td>
                                        <td class="cart-quality">
                                            <div class="product-quality">
                                                <input class="cart-plus-minus-box input-text qty text item-quantity" product_id="<?= $item['product_id'] ?>" name="item-quantity" value="<?= $item['quantity'] ?>">
                                            </div>
                                        </td>
                                        <td class="product-total"><span><?= (int) $item['unit_price'] * $item['quantity'] ?> Đ</span></td>
                                        <td><?= $item['status'] ?></td>



                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-shiping-update-wrapper">
                            <div class="cart-shiping-update">
                                <a href="/">Continue Shopping</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>