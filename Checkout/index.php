<!DOCTYPE html>
<html>

<head>
    <title>Buy cool new product</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <?php
    $packages = [
        'starter' => [
            'name' => 'Starter Package',
            'img' => 'Personal.webp',
            'price' => 18.00,
            'webpages' => 2,
            'priceId' => 'prod_Rd7r6UKI7f3p4J'
        ],
        'business' => [
            'name' => 'Business Package',
            'img' => 'Business.webp',
            'price' => 30.00,
            'webpages' => 10,
            'priceId' => 'prod_Rd88IHmNVNcbc0'
        ],
        'business+' => [
            'name' => 'Business+ Package',
            'img' => 'Business+.webp',
            'price' => 45.00,
            'webpages' => 'unlimited',
            'priceId' => 'prod_Rd97NrpLOK0CLM'
        ],
        // ...more packages...
    ];
    $selectedPackage = $_GET['package'] ?? 'starter';
    $product = $packages[$selectedPackage] ?? $packages['starter'];
    ?>
    <section class="two-panel">
        <div class="left-panel">
            <img src="../images/MiniWCLogo.webp" alt="webcrafted logo" style="margin-bottom: 20px;"> 
            <div class="product">
                <img src="../images/Pricing/<?= $product['img']?>" alt="Product Image">
                <div class="description">
                    <h3>Product Name : <?= $product['name']; ?></h3>
                    <h4>Product Description : Allows access to our website builder with <?= $product['webpages'] ?> webpages.
                        <br>‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎
                        Alternatively, we could make a personalised website for you.
                    </h4>
                    <h4>Price : $<?= $product['price']; ?> / month</h4>
                </div>
            </div>
        </div>
        <div class="right-panel">
            <div class="price-calculation">
                <h3>Price Summary</h3>
                <p>Package: <?= $product['name']; ?></p>
                <p>Webpages: <?= $product['webpages']; ?></p>
                <p>Add-ons: $<?= isset($addons) ? $addons : '0.00'; ?></p> <!-- added -->
                <p>Tax : Will be calculated after checkout</p> <!-- added -->
                <p>Total: $<?= number_format($product['price'] + (isset($addons) ? $addons : 0), 2); ?></p> <!-- added -->
            </div>
            <form action="/checkout.php" method="POST">
                <input type="hidden" name="priceId" value="<?= $product['priceId']; ?>">
                <button type="submit" id="checkout-button">Checkout</button>
            </form>
        </div>
    </section>
</body>

</html>