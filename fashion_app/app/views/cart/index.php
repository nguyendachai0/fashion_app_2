<div class="breadcrumb-area breadcrumb-padding-6">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <div class="breadcrumb-title">
                <h2>Cart Page </h2>
            </div>
            <ul>
                <li>
                    <a href="index.html">HOME</a>
                </li>

                <li>CART</li>
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
                                    <th class="width-price">Product</th>
                                    <th class="width-price"> Price</th>
                                    <th class="width-quantity">Quantity</th>
                                    <th class="width-subtotal">Subtotal</th>
                                    <th class="width-remove"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cartDetails as $item) : ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="product-details.html"><img src="<?= BASE_URL ?>uploads/product/<?= $item['image'] ?>" alt=""></a>
                                        </td>
                                        <td class="product-name">
                                            <h5><a href="product-details.html"><?= $item['product_name'] ?></a></h5>
                                        </td>
                                        <td class="product-price"><span class="amount"><?= $item['product_price'] ?> Đ</span></td>
                                        <td class="cart-quality">
                                            <div class="product-quality">
                                                <input class="cart-plus-minus-box input-text qty text item-quantity" product_id="<?= $item['product_id'] ?>" name="item-quantity" value="<?= $item['quantity'] ?>">
                                            </div>
                                        </td>
                                        <td class="product-total"><span><?= (int) $item['product_price'] * $item['quantity'] ?> Đ</span></td>

                                        <td class="product-remove">

                                            <form method="post" action="/cart/delete">
                                                <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                                <button class="btn btn-light"><i class="las la-trash"></i></button>
                                            </form>
                                        </td>

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

                            <form id="updateCart" method="post" action="/cart/update">
                                <div class="cart-clear">
                                    <?php foreach ($cartDetails as $item) : ?>
                                        <input type="hidden" name="product_id[]" value="<?= $item['product_id'] ?>">
                                        <input type="hidden" name="new_quantity[]" id="quantitiesInput" />
                                    <?php endforeach; ?>
                                    <button type="submit">Update Cart</button>
                                    <a href="cart/clear">Clear Cart</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="cart-calculate-discount-wrap mb-40">
                    <h4>Calculate shipping </h4>
                    <form method="post" action="<?= BASE_URL ?>order/store">
                        <div class="calculate-discount-content">

                            <div class="input-style">
                                <input type="text" name="firstName" placeholder="First Name">
                            </div>
                            <div class="input-style">
                                <input type="text" name="lastName" placeholder="Last Name">
                            </div>
                            <div class="input-style">
                                <input type="text" name="phone" placeholder="Phone">
                            </div>
                            <div class="input-style">
                                <input type="text" name="address1" placeholder="Address Line 1">
                            </div>
                            <div class="input-style">
                                <input type="text" name="address2" placeholder="Address Line 2">
                            </div>
                            <div class="input-style">
                                <input type="text" name="city" placeholder="City">
                            </div>
                            <div class="input-style">
                                <input type="text" name="state" placeholder="State">
                            </div>
                            <div class="input-style">
                                <input type="text" name="zipcode" placeholder="Postcode / ZIP">
                            </div>
                            <div class="input-style">
                                <input type="text" name="countryCode" placeholder="Country Code">
                            </div>
                            <div class="calculate-discount-btn">
                                <a class="btn btn-link" href="#">Update</a>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="cart-calculate-discount-wrap mb-40">

                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="grand-total-wrap">
                    <div class="grand-total-content">
                        <div class="grand-shipping">
                            <span>Shipping</span>
                            <ul>
                                <li><input type="radio" name="shipping" value="info" checked="checked"><label>Free shipping</label></li>
                                <li><input type="radio" name="shipping" value="info" checked="checked"><label>Flat rate: <span>$100.00</span></label></li>
                                <li><input type="radio" name="shipping" value="info" checked="checked"><label>Local pickup: <span>$120.00</span></label></li>
                            </ul>
                        </div>
                        <div class="shipping-country">
                            <p>Shipping to Bangladesh</p>
                        </div>
                        <div class="grand-total">
                            <h4>Total <span><?= $totalPrice ?> Đ</span></h4>
                        </div>
                    </div>
                    <div class="grand-total-btn">

                        <input type="hidden" name="total_price" value="<?= $totalPrice ?>">

                        <button type="submit">Proceed to checkout</button>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Assuming your form has an ID, adjust accordingly
        var form = document.getElementById("updateCart");

        form.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission
            // Gather quantity data
            var quantities = [];
            var quantityInputs = document.querySelectorAll('.item-quantity');
            quantityInputs.forEach(function(input) {

                var quantity = input.value;
                quantities.push(quantity);
            });

            // Do something with the quantities (e.g., update form data)
            // ...
            var quantitiesInput = document.querySelectorAll("#quantitiesInput");
            quantitiesInput.forEach(function(input) {
                input.value = quantities.shift();

            })

            quantitiesInput.value = JSON.stringify(quantities);
            console.log(quantitiesInput.value)
            // throw new Error('Script terminated with a custom error message');
            // Now you can submit the form programmatically
            form.submit();
        });
        // 
    });
</script>