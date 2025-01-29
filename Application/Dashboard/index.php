<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Webcrafted Pro</title>
    <link rel="stylesheet" href="CSS/Main.css">
    <link rel="stylesheet" href="../../CSS/all.css">
    <script src="../../JavaScript/HamBurger.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins");
    </style>
    <script>
        function hideEmail(email) {
            const [user, domain] = email.split("@");
            const maskedUser = user.slice(0, 2) + "****";
            return maskedUser + "@" + domain;
        }

        function hidePhoneNumber(phone) {
            return phone.slice(0, 3) + "******" + phone.slice(-2);
        }

        document.addEventListener("DOMContentLoaded", () => {
            const emailParagraph = document.getElementById("email");
            if (emailParagraph) {
                const prefix = "Email: ";
                const text = emailParagraph.innerText;
                if (text.startsWith(prefix)) {
                    const originalEmail = text.slice(prefix.length).trim();
                    emailParagraph.innerText = prefix + hideEmail(originalEmail);
                    emailParagraph.style.display = "block";
                }
            }

            const phoneParagraph = document.getElementById("phone");
            if (phoneParagraph) {
                const prefix = "Phone Number: ";
                const text = phoneParagraph.innerText;
                if (text.startsWith(prefix)) {
                    const originalPhone = text.slice(prefix.length).trim();
                    phoneParagraph.innerText = prefix + hidePhoneNumber(originalPhone);
                    phoneParagraph.style.display = "block";
                }
            }
        });
    </script>
</head>

<body>
    <header class="snap">
        <div class="Top-Buttons">
            <img src="../../images/MiniWCLogo.webp" alt="Webcrafted Pro Logo">
            <ul>
                <li class="First-Layer"><a href="../../index.php">Home</a></li>
                <li id="services" class="Second-Layer"><a href="../../Pricing.php">Pricing</a></li>
                <li id="websites" class="Second-Layer"><a href="../../Websites.php">Websites</a></li>
                <li id="templates"><a href="../../Templates.php">Templates</a></li>
                <li id="contact"><a href="../../ContactUs.php">Contact Us</a></li>
            </ul>
        </div>
        <ul class="account">
            <li><a href="Account.php"><img src="../../images/icons/Account.webp" alt="Account"
                        style="margin-top: -8px;"></a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <span class="open-slide">
            <a class="hamburger" href="#" onclick="openSideMenu()">
                <p>&#9776;</p>
            </a>
        </span>
        <div id="side-menu" class="side-nav">
            <a href="#" class="btn-close" onclick="closeSideMenu()">&times;</a>
            <div class="mobile-nav-buttons">
                <a href="../../">Home</a>
                <a href="../../Websites.php">Websites</a>
                <a href="../../Pricing.php">Pricing</a>
                <a href="../../Templates.php">Templates</a>
                <a href="../../ContactUs.php">Contact Us</a>
            </div>
        </div>
    </header>
    <div class="dashboard-container">
        <div class="sidebar">
            <button class="menu-item" id="Account-button">Account</button>
            <button class="menu-item">Domain Management</button>
            <a class="menu-item" href="../WebsiteBuilder/">Website Builder</a>
            <a class="menu-item" href="../../logout.php">Logout</a>
        </div>
        <div class="main">
            <div class="content">
                <div id="Account-Content">
                    <h1 style="text-align: center;">Account</h1>
                    <div class="two-grid">
                        <div class="account-info">
                            <h2>Account Information</h2><hr>
                            <p>Username: Example User</p>
                            <p style="display: none;" id="email">Email: Email@gmail.com</p>
                            <p style="display: none;" id="phone">Phone Number: 07123 456789</p>
                            <div>
                                <h2>Account Controls</h2><hr style="margin-bottom: 30px;">
                                <a class="control-buttons" href="../../Email_Verification">
                                    Change Password <span class="arrow">&gt;</span>
                                </a>
                                <a class="control-buttons" href=""><span class="arrow">&gt;</span></a>
                            </div>
                        </div>
                        <div class="subscription-info">
                            <h2>Subscription</h2><hr>
                            <p>Plan: Premium</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>