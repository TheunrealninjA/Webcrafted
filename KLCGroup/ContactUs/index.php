<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact Us to ask questions or to get your free quote today!">
    <title>Contact Us - KLC Group</title>
    <link rel="icon" type="icon" href="../Images/icon.webp">
    <link rel="stylesheet" href="../CSS/Animate.css">
    <link rel="stylesheet" href="../CSS/Footer.css">
    <link rel="stylesheet" href="../CSS/2ndHeader.css">
    <link rel="stylesheet" href="CSS/ContactUs/Main.css">
    <script src="../JavaScript/HamBurger.js"></script>
    <script src="../JavaScript/ContactFormUpdate.js"></script>
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
</head>

<body>
    <header>
        <ul class="Top-Buttons">
            <li><a href="../index.html">Home</a></li>
            <li><a href="../OurServices.html">Our Services</a></li>
            <li><a href="../Gallery.html">Gallery</a></li>
            <li><a href="../Testimonial.html">Testimonial</a></li>
            <li><a href="">Contact Us</a></li>
        </ul>

        <span class="open-slide">
            <a class="hamburger" href="javascript:void(0)" onclick="openSideMenu()">
                <p> &#9776;</p>
            </a>
        </span>

        <div id="side-menu" class="side-nav">
            <a href="" class="btn-close" onclick="closeSideMenu()">&times;</a>
            <a href="../index.html">Home</a>
            <a href="../OurServices.html">Our Services</a>
            <a href="../Gallery.html">Gallery</a>
            <a href="../Testimonial.html">Testimonial</a>
            <a href="">Contact Us</a>
        </div>

        <div class="Title">
            <a class="HomeBtn" href="../index.html"><img alt="Logo" src="../Images/Company Logo.webp"></a>
        </div>
    </header>


    <div class="main-body">
        <?php
        function displayMessage($classname, $image, $message)
        {
            echo '<div class="' . $classname . '" style ="margin-top: 20px;">';
            echo '<img style="width: 30px;" src="../Images/Status/' . $image . '" alt="' . $message . '">';
            echo '<h5>' . $message . '</h5>';
            echo '</div>';
        }

        $status = htmlspecialchars($_GET['status'] ?? '', ENT_QUOTES, 'UTF-8');

        switch ($status) {
            case 'robot':
                displayMessage('errorbox', 'Error.webp', 'You are a robot');
                break;
            case 'misrobot':
                displayMessage('warnbox', 'warning.webp', 'Recaptcha Not Completed');
                break;
            case 'success':
                displayMessage('successbox', 'CheckMark.webp', 'Email Sent Successfully');
                break;
            case 'error':
                displayMessage('errorbox', 'Error.webp', 'Email Failed To Send');
                break;
            default:
                break;
        }
        ?>
        <h2>Contact Us</h2>
        <img alt="" src="../Images/splitter.webp">

        <form class="ContactForm" action="send_email.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" name="name" placeholder="Enter Your Full Name" required autocomplete="name"><br>

            <label for="email">Email:</label><br>
            <input type="email" name="email" placeholder="Enter Your Email" required autocomplete="email"><br>

            <label for="address">Address: (optional)</label><br>
            <input type="text" name="address" placeholder="Enter Address or Leave Blank"
                autocomplete="address-line1"><br>

            <label for="postcode">Postcode: (optional)</label><br>
            <input type="text" name="postcode" placeholder="Enter Postcode or Leave Blank"
                autocomplete="postal-code"><br>

            <label for="subject">Subject:</label><br>
            <select id="subject" name="subject" required onchange="showOther()">
                <option value="" disabled selected>Select One...</option>
                <option value="Rendering">Rendering</option>
                <option value="External Wall Insulation">External Wall Insulation</option>
                <option value="Loft Insulation">Loft Insulation</option>
                <option value="Making A Testimonial">Make a Testimonial</option>
                <option value="Other">Other</option>
            </select><br>

            <div id="moreInfoDropdown">
                <label for="moreInfo">More Info:</label><br>
                <select id="moreInfo" name="moreInfo">
                    <option value="" disabled selected>Select One...</option>
                    <option value="Quote">Get a Quote</option>
                    <option value="Question">Ask a Question</option>
                    <option value="Other">Other</option>
                </select><br>
            </div>

            <div id="OtherOptions">
                <label for="otherSubject">Reason For Contacting:</label><br>
                <input type="text" id="otherSubject" name="otherSubject"><br>
            </div>

            <label for="message">Message:</label><br>
            <textarea id="message" name="message"
                placeholder="Ask Your Question Or Enter Any Details You Would Like Us To Know" required></textarea><br>

            <div class="g-recaptcha" data-sitekey="6Ldv2DUqAAAAACCskWsbXnnCAUfXKP-orgUnazGh" data-action="LOGIN"
                style="text-align: center;"></div><br />

            <input type="submit" value="Submit">
        </form>
    </div>

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
                        src="../Images/Logo's/Facebook.webp" alt="Facebook Logo"></a>
                <a href="https://www.instagram.com/klcgroup1/" target="_blank"><img class="Logo"
                        src="../Images/Logo's/InstagramLogo.webp" alt="Instagram Logo"></a>
                <a href="https://uk.linkedin.com/company/klc-group" target="_blank"><img class="Logo"
                        src="../Images/Logo's/Linkedin.webp" alt="Linkedin Logo"></a>
                <a href="https://www.checkatrade.com/trades/klcgroup" target="_blank"><img class="Logo"
                        src="../Images/Logo's/Checkatrade.webp" alt="Checkatrade Logo"></a>
                <a class="SecondRowLogo" href="https://www.mybuilder.com/profile/view/klc_group" target="_blank"><img
                        class="Logo" src="../Images/Logo's/mybuilder.webp" alt="mybuilder Logo"></a>
                <a href="https://www.yell.com/biz/klc-group-wolverhampton-10010501/" target="_blank"><img class="Logo"
                        src="../Images/Logo's/Yell.webp" alt="Yell Logo"></a>
            </div>
            <div class="section-4">
                <h3 class="LastSection">Accreditation</h3>
                <img class="FirstAccreditation" src="../Images/Accreditation/Pas2030.webp" alt="Pas2030 Accreditation">
                <img class="Accreditation" src="../Images/Accreditation/TrustMark.webp" alt="TrustMark Accreditation">
                <img class="Accreditation" src="../Images/Accreditation/NICEIC.webp" alt="NICEIC Accreditation">
                <img class="Accreditation" src="../Images/Accreditation/Constructionline Gold.webp"
                    alt="Constructionline Gold Accreditation">
                <img class="Accreditation" src="../Images/Accreditation/CHAS.webp" alt="Chas Accreditation">
            </div>
        </div>
        <div class="Copyright">
            <p>&copy2024 KLC Group. All rights reserved. Website designed and coded by Wyatt @ <a
                    href="https://webcrafted.pro">webcrafted.pro</a></p>
        </div>
    </footer>
</body>

</html>