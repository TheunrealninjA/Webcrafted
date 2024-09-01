<?php
// Start a session
session_start();
$is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing - WebCrafted Pro</title>
    <meta name="description"
        content="Welcome to WebCrafted.Pro, where you can get hand-crafted custom websites for your businesses specific needs. We have competive prices and exclusive features that elevate your website to the next level.">

    <link rel="icon" href="images/WCLogo.webp">

    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Pricing/main.css">
    <link rel="stylesheet" href="CSS/Nav.css">
    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="CSS/Animate.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="JavaScript/AnimationWait.js"></script>
    <script src="JavaScript/SlideShow.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins");
    </style>
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
                    <li><a href="Account.php"><img src="images/icons/Account.webp" alt="Account"
                                style="width:30px;height:30px;"></a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="Login.php">Login</a></li>
                    <li><a href="SignUp.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>

            <a class="MiniWCLogo" href="index.php"><img src="images/MiniWCLogo.webp" alt="Logo"></a>
        </header>

        <div class="box snap">
            <h3>Our Packages</h3>
            <div class="slideshow-container" id="slideshow1">
                <div class="slide">
                    <div class="pricebox">
                        <h3 class="packtext">Starter/Personal package</h3>
                        <h4>from £18/month</h4>
                        <div class="two-grid">
                            <div>
                                <img style="width: auto;" src="images/Pricing/Personal.webp" alt="computers">
                            </div>
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
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> All devices compatibility</li>
                                <li><img src="images/minus.webp" alt="minus emoji"> One click setup</li>
                            </ul>
                        </div>
                        <a href="">Get Started</a>
                    </div>
                </div>

                <div class="slide">
                    <div class="pricebox">
                        <h3 class="packtext">Business package</h3>
                        <h4>from £30/month</h4>
                        <div class="two-grid">
                            <div>
                                <img style="width: auto;" src="images/Pricing/Business.webp" alt="computers">
                            </div>
                            <ul>
                                <li><img src="images/minus.webp" alt="minus emoji"> Hosting (Optional)</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> 10 webpages</li>
                                <li><img src="images/Xemoji.webp" alt="X emoji"> Server Region Selection</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> E-commerce</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> Can upload images/videos</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> Ready to use website</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> PHP included</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> 5 day delivery</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> Personalised website</li>
                                <li><img src="images/Xemoji.webp" alt="X emoji"> Domain included</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> All devices compatibility</li>
                                <li><img src="images/minus.webp" alt="minus emoji"> One click setup</li>
                            </ul>
                        </div>
                        <a href="">Get Started</a>
                    </div>
                </div>

                <div class="slide">
                    <div class="pricebox">
                        <h3 class="packtext">Business+ package</h3>
                        <h4>from £45/month</h4>
                        <div class="two-grid">
                            <div>
                                <img style="width: auto;" src="images/Pricing/Business+.webp" alt="computers">
                            </div>
                            <ul>
                                <li><img src="images/tickemoji.webp" alt="minus emoji"> Hosting</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> Unlimited webpages</li>
                                <li><img src="images/tickemoji.webp" alt="X emoji"> Server Region Selection</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> E-commerce</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> Can upload images/videos</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> Ready to use website</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> PHP included</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> 7 day delivery</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> Personalised website</li>
                                <li><img src="images/minus.webp" alt="X emoji"> Domain included</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> All devices compatibility</li>
                                <li><img src="images/tickemoji.webp" alt="minus emoji"> One click setup</li>
                            </ul>
                        </div>
                        <a href="">Get Started</a>
                    </div>
                </div>
                <a class="prev" onclick="plusSlides(-1, 'slideshow1')">&#10094;</a>
                <a class="next" onclick="plusSlides(1, 'slideshow1')">&#10095;</a>
            </div>
        </div>

        <div class="box snap">
            <h3>Just Websites</h3>
            <div class="slideshow-container" id="slideshow2">
                <div class="slide">
                    <div class="serviceBox">
                        <h3 class="packtext">Personal website</h3>
                        <h4>From £35</h4>
                        <div class="two-grid">
                            <div>
                                <img style="width: auto;" src="images/Pricing/PerWebsite.webp"
                                    alt="Laptop with html and css code">
                            </div>
                            <ul>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> 2 webpages</li>
                                <li><img src="images/Xemoji.webp" alt="X emoji"> E-commerce</li>
                                <li><img src="images/Xemoji.webp" alt="X emoji"> PHP included</li>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> All devices compatability</li>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> Ready to use website</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> 3 day delivery</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> Personalised website</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="slide">
                    <div class="serviceBox">
                        <h3 class="packtext">E-commerce website</h3>
                        <h4>From £60</h4>
                        <div class="two-grid">
                            <div>
                                <img style="width: auto;" src="images/Pricing/ComWebsite.webp"
                                    alt="Laptop with php, html and css code">
                            </div>
                            <ul>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> 5 webpages (Doesn't include
                                    products)
                                </li>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> E-commerce</li>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> PHP included</li>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> All devices compatability</li>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> Ready to use website</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> 5-7 day delivery</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> Personalised website</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="slide">
                    <div class="serviceBox">
                        <h3 class="packtext">Business website</h3>
                        <h4>From £100</h4>
                        <div class="two-grid">
                            <div>
                                <img style="width: auto;" src="images/Pricing/Com+Website.webp"
                                    alt="Laptop with php, html and css code">
                            </div>
                            <ul>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> 10 webpages (Doesn't include
                                    products)
                                </li>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> E-commerce</li>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> PHP included</li>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> All devices compatability</li>
                                <li><img src="images/tickemoji.webp" alt="tick emoji"> Ready to use website</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> 7-10 day delivery</li>
                                <li><img src="images/tickemoji.webp" alt="Tick emoji"> Personalised website</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a class="prev" onclick="plusSlides(-1, 'slideshow2')">&#10094;</a>
                <a class="next" onclick="plusSlides(1, 'slideshow2')">&#10095;</a>
            </div>
        </div>


        <div class="box snap">
            <h3>Our Services</h3>
            <div class="two-grid">

                <div class="serviceBox">
                    <h3 class="packtext">Image Optimisation</h3>
                    <h4>*Free</h4>
                    <div class="two-grid">
                        <div>
                            <img style="width: auto;" src="images/Pricing/ImgOpt.webp" alt="Image Optimisation">
                        </div>
                        <ul>
                            <li><img src="images/tickemoji.webp" alt="tick emoji"> Up To 50% Faster</li>
                            <li><img src="images/minus.webp" alt="minus emoji"> 5 Free Images Daily</li>
                            <li><img src="images/minus.webp" alt="minus emoji"> Unlimited Images for £5</li>
                        </ul>
                    </div>
                    <a href="">Get Started</a>
                </div>
                <div class="serviceBox">
                    <h3 class="packtext">Code Optimisation</h3>
                    <h4>from £10</h4>
                    <div class="two-grid">
                        <div>
                            <img style="width: auto;" src="images/Pricing/CodOpt.webp" alt="Image Optimisation">
                        </div>
                        <ul>
                            <li><img src="images/tickemoji.webp" alt="tick emoji"> HTML and CSS</li>
                            <li><img src="images/minus.webp" alt="minus emoji"> JavaScript and PHP</li>
                            <li><img src="images/tickemoji.webp" alt="tick emoji"> Up To 25% Faster</li>
                        </ul>
                    </div>
                    <a href="">Get Started</a>
                </div>
            </div>
        </div>
        <!-- footer here -->
    </div>
</body>

</html>