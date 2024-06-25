<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (isset($_GET['status'])) {
        $status = $_GET['status'];

        if ($status === 'success') {
            echo '<title>Success | Contact Form Status</title>';
        } elseif ($status === 'error') {
            echo '<title>Error | Contact Form Status</title>';
        } else {
            echo '<title>Invalid Status | Contact Form Status</title>';
        }
    } else {
        echo '<title>No Status Specified | Contact Form Status</title>';
    }
    ?>
    <link rel="icon" type="icon" href="Images/icon.webp">
    <link rel="stylesheet" href="CSS/Animate.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/2ndHeader.css">
    <link rel="stylesheet" href="CSS/ContactUs/Status/Main.css">
    <link rel="prefetch" href="https://klcgroup.co.uk/Images/Status/CheckMark.webp"> <!-- Change this -->
    <link rel="prefetch" href="https://klcgroup.co.uk/Images/Status/Error.webp"> <!-- Change this -->
    <link rel="prefetch" href="https://klcgroup.co.uk/Images/Status/QuestionMark.webp"> <!-- Change this -->
</head>

<body>
    <header>
        <ul class="Top-Buttons">
            <li><a href="index.html">Home</a></li>
            <li><a href="OurServices.html">Our Services</a></li>
            <li><a href="Gallery.html">Gallery</a></li>
            <li><a href="Testimonial.html">Testimonial</a></li>
            <li><a href="ContactUs.html">Contact Us</a></li>
        </ul>

        <span class="open-slide">
            <a class="hamburger" href="javascript:void(0)" onclick="openSideMenu()">
                <p> &#9776;</p>
            </a>
        </span>
        <div id="side-menu" class="side-nav">
            <a href="" class="btn-close" onclick="closeSideMenu()">&times;</a>
            <a href="index.html">Home</a>
            <a href="OurServices.html">Our Services</a>
            <a href="Gallery.html">Gallery</a>
            <a href="Testimonial.html">Testimonial</a>
            <a href="ContactUs.html">Contact Us</a>
        </div>

        <div class="Title">
            <a class="HomeBtn" href="index.html"><img alt="" src="Images/Company Logo.webp"></a>
        </div>
    </header>

    <?php
    if (isset($_GET['status'])) {
        $status = $_GET['status'];

        if ($status === 'success') {
            echo '<img alt="" class="status" src="Images/Status/CheckMark.webp" alt="Check Mark">';
            echo '<h2>Thank you for your submission! We will contact you shortly!</h2>';
            echo '<a class="BackButton" href="index.html">Back to Home &#10095;</a>';
        } elseif ($status === 'error') {
            echo '<img alt="" class="status" src="Images/Status/Error.webp" alt="Error">';
            echo '<h2>There was an error processing your request. Please try again.</h2>';
            echo '<a class="BackButton" href="ContactUs.html">Go Back &#10095;</a>';
        } else {
            echo '<img alt="" class="status" src="Images/Status/QuestionMark.webp" alt="?">';
            echo '<h2>Invalid status. Please go back to the contact us page.</h2>';
            echo '<a class="BackButton" href="ContactUs.html">Go Back &#10095;</a>';
        }
    } else {
        echo '<img alt="" class="status" src="Images/Status/QuestionMark.webp" alt="?">';
        echo '<h2>No status specified.  Please go back to the contact us page.</h2>';
        echo '<a class="BackButton" href="ContactUs.html">Go Back &#10095;</a>';
    }
    ?>

    <footer>
        <div class="footerlist">
            <div class="section-1">
                <h3>About Us</h3>
                <h4>We are a Family Run Business that Thrives on customer care and High Standard workmanship. We have 18
                    years experience within the industry. We specialise in the following External wall insulation Loft
                    insulation Rendering Loft conversions Refurbishments.</h4>
            </div>
            <div class="section-2">
                <h3>Contact Us</h3>
                <h4>Phone Us : <a href="tel:07800639785">07800 639785</a></h4>
                <h4>Email Us : <a href="mailto:Richard.Gallagher@klcgroup.co.uk">Richard.Gallagher@klcgroup.co.uk</a>
                </h4>
            </div>
             <div class="Social section-3">
                <h3>Social Media</h3>
                <a href="https://www.facebook.com/klcgroup1/" target="_blank"><img class="FirstLogo"
                        src="Images/Logo's/Facebook.webp" alt="Facebook Logo"></a>
                <a href="https://www.instagram.com/klcgroup1/" target="_blank"><img class="Logo"
                        src="Images/Logo's/InstagramLogo.webp" alt="Instagram Logo"></a>
                <a href="https://uk.linkedin.com/company/klc-group" target="_blank"><img class="Logo"
                        src="Images/Logo's/Linkedin.webp" alt="Linkedin Logo"></a>
                <a href="https://www.checkatrade.com/trades/klcgroup" target="_blank"><img class="Logo"
                        src="Images/Logo's/Checkatrade.webp" alt="Checkatrade Logo"></a>
                <a class="SecondRowLogo" href="https://www.mybuilder.com/profile/view/klc_group" target="_blank"><img
                        class="Logo" src="Images/Logo's/mybuilder.webp" alt="mybuilder Logo"></a>
                <a href="https://www.yell.com/biz/klc-group-wolverhampton-10010501/" target="_blank"><img class="Logo"
                        src="Images/Logo's/Yell.webp" alt="Yell Logo"></a>
            </div>
            <div class="section-4">
                <h3 class="LastSection">Accreditation</h3>
                <img alt="" class="FirstAccreditation" src="Images/Accreditation/Pas2030.webp" alt="Pas2030 Accreditation">
                <img alt="" class="Accreditation" src="Images/Accreditation/TrustMark.webp" alt="TrustMark Accreditation">
                <img alt="" class="Accreditation" src="Images/Accreditation/NICEIC.webp" alt="NICEIC Accreditation">
                <img alt="" class="Accreditation" src="Images/Accreditation/Constructionline Gold.webp"
                    alt="Constructionline Gold Accreditation">
                <img class="Accreditation" src="Images/Accreditation/CHAS.webp" alt="Chas Accreditation">
            </div>
        </div>
        <div class="Copyright">
            <p>&copy2024 KLC Group. All rights reserved. Website designed and coded by Wyatt @ <a href="https://webcrafted.pro">webcrafted.pro</a></p>
        </div>
    </footer>
</body>

</html>