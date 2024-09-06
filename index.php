<?php
session_start();
$is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Welcome to WebCrafted.Pro, where you can get hand-crafted custom websites for your businesses specific needs. We have competive prices and exclusive features that elevate your website to the next level.">
    <title>Home - WebCrafted Pro</title>

    <link rel="icon" href="images/WCLogo.webp">

    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Home/Main.css">
    <link rel="stylesheet" href="CSS/Nav.css">
    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="CSS/Animate.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="JavaScript/AnimationWait.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins");
    </style>

    <script type="text/javascript">
        var _iub = _iub || [];
        _iub.csConfiguration = { "siteId": 3712696, "cookiePolicyId": 49640854, "lang": "en-GB" };
    </script>
    <script type="text/javascript" src="https://cs.iubenda.com/autoblocking/3712696.js"></script>
    <script type="text/javascript" src="//cdn.iubenda.com/cs/gpp/stub.js"></script>
    <script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
</head>

<body>
    <div class="main-body">
        <header class="snap">
            <ul class="Top-Buttons">
                <li id="templates"><a href="Templates.php">Templates</a></li>
                <li id="services" class="Second-Layer"><a href="Pricing.php">Pricing</a></li>
                <li class="First-Layer"><a href="index.php">Home</a></li>
                <li id="websites" class="Second-Layer"><a href="Websites.php">Websites</a></li>
                <li id="contact"><a href="ContactUs.php">Contact Us</a></li>
            </ul>

            <ul class="account">
                <?php if ($is_logged_in): ?>
                    <li><a href="Account.php"><img src="images/icons/Account.webp" alt="Account"></a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="Login.php">Login</a></li>
                    <li><a href="SignUp.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>

            <div class="Title">
                <img src="images/WCLogo.webp" alt="">
                <h1>Welcome to WebCrafted.Pro</h1>
                <h2>Websites done right.</h2>
                <a href="Templates.php">Get Started</a>
                <h3>Scroll down to see more <p>&#x25BC;</p>
                </h3>
            </div>
        </header>

        <div class="box snap">
            <h3 class="farleft" id="wait1">Why Us?</h3>
            <p>Here are the key points on why Webcrafted.Pro stand out from the rest:</p>
            <ul>
                <li class="farleft" id="wait2">Fast Delivery</li>
                <li class="farleft" id="wait3">Fully Optmised Websites</li>
                <li class="farleft" id="wait4">Our 100% Search Engine Optimisation (SEO) guarantee</li>
                <li class="farleft" id="wait5">Unlimited webpages at no extra cost</li>
                <li class="farleft" id="wait6">Images uploaded will be made 10x compressed</li>
            </ul>
            <p>Load Time Comparison:</p>
            <div class="purbar barmove" id="bar1" style="transition: transform 0.5s;">
                <p>Our Speed : 247ms</p>
                <p style="font-weight: bold; color: rgb(18, 175, 18); text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8);">
                    +363% Faster</p>
            </div>
            <div class="pinbar barmove" id="bar2" style="transition: transform 0.5s;">
                <p>Competitors Speed : 896ms</p>
            </div>
        </div>

        <div class="box snap plans">
            <div class="pricebox farleft" id="price1">
                <h3 class="packtext">Starter/Personal package</h3>
                <h4>from £18/month</h4>
                <ul>
                    <li><img src="images/minus.webp" alt="minus emoji"> Hosting (Optional)</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> 2 webpages</li>
                    <li><img src="images/Xemoji.webp" alt="X emoji"> Server Region Selection</li>
                    <li><img src="images/Xemoji.webp" alt="X emoji"> E-commerce</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> Can upload images/videos</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> Ready to use website</li>
                    <li><img src="images/Xemoji.webp" alt="X emoji"> PHP included</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> 3 day delivery</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> Personalised website</li>
                    <li><img src="images/Xemoji.webp" alt="X emoji"> Domain included</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> All devices compatability</li>
                    <li><img src="images/minus.webp" alt="minus emoji"> One click setup</li>
                </ul>
                <a href="">Get Started</a>
            </div>

            <div class="pricebox farleft" style="transition-duration: 1.2s;" id="price2">
                <h3 class="packtext">Buisness package</h3>
                <h4>from £30/month</h4>
                <ul>
                    <li><img src="images/minus.webp" alt="minus emoji"> Hosting (Optional)</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> 10 webpages</li>
                    <li><img src="images/Xemoji.webp" alt="X emoji"> Server Region Selection</li>
                    <li><img src="images/tickemoji.webp" alt="X emoji"> E-commerce</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> Can upload images/videos</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> Ready to use website</li>
                    <li><img src="images/tickemoji.webp" alt="X emoji"> PHP included</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> 5 day delivery</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> Personalised website</li>
                    <li><img src="images/Xemoji.webp" alt="X emoji"> Domain included</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> All devices compatability</li>
                    <li><img src="images/minus.webp" alt="minus emoji"> One click setup</li>
                </ul>
                <a href="">Get Started</a>
            </div>

            <div class="pricebox farleft" style="transition-duration: 1.8s;" id="price3">
                <h3 class="packtext">Buisness+ package</h3>
                <h4>from £45/month</h4>
                <ul>
                    <li><img src="images/tickemoji.webp" alt="minus emoji"> Hosting</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> Unlimited webpages</li>
                    <li><img src="images/tickemoji.webp" alt="X emoji"> Server Region Selection</li>
                    <li><img src="images/tickemoji.webp" alt="X emoji"> E-commerce</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> Can upload images/videos</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> Ready to use website</li>
                    <li><img src="images/tickemoji.webp" alt="X emoji"> PHP included</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> 7 day delivery</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> Personalised website</li>
                    <li><img src="images/minus.webp" alt="X emoji"> Domain included</li>
                    <li><img src="images/tickemoji.webp" alt="Tick emoji"> All devices compatability</li>
                    <li><img src="images/tickemoji.webp" alt="minus emoji"> One click setup</li>
                </ul>
                <a href="">Get Started</a>
            </div>

            <div class="next">
                <a class="see-more" href="Pricing.php">&rarr;<p>See More</p></a>

            </div>
        </div>

        <div class="snap">
            <div class="lastbox">
                <h3 class="farleft" id="wait7">Our SEO Guarentee</h3>
                <div class="text">
                    <img class="expand" id="wait8" src="images/SEO.webp" alt="SEO 100% score">
                    <p class="farright" id="wait9">Our SEO Guarantee ensures that your business website ranks at the top
                        of users' Google searches, leading to increased visibility and targeted traffic. By optimizing
                        your site for relevant keywords, improving user experience, and providing measurable results, we
                        give you a competitive advantage in boosting your businesses success.</p>
                </div>
            </div>
        </div>

        <footer class="box snap">
            <div class="footerlist">
                <div class="section">
                    <h3>About Us</h3>
                    <h4>WebCrafted.Pro is where you can get hand-crafted custom websites for your businesses
                        specific needs.
                        We have competive prices and exclusive features that elevate your website to the next
                        level.</h4>
                </div>
                <div class="section">
                    <h3>Contact Us</h3>
                    <h4>Email Us : <a href="mailto:wyattd@webcrafted.pro">wyattd@webcrafted.pro</a></h4>
                </div>
                <div class="section">
                    <h3>Extras</h3>
                    <h4><a href="">Sitemap</a></h4>
                    <h4><a href="Terms.html">Terms & Conditions</a></h4>
                    <h4><a href="Privacy.html">Privacy Policy</a></h4>
                </div>
                <div class="section">
                    <h3>Services</h3>
                    <h4><a href="">Image Optimisation</a></h4>
                    <h4><a href="">Code Optimisation</a></h4>
                    <h4><a href="">Hourly Hire</a></h4>
                </div>
            </div>
            <div class="Copyright">
                <p>&copy2024 WebCrafted.Pro. All rights reserved. Website designed and coded by Wyatt @ <a
                        href="https://webcrafted.pro">webcrafted.pro</a></p>
            </div>
        </footer>
    </div>
</body>
</html>