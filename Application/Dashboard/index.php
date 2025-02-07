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

        .fade {
            opacity: 0;
            transform: translateY(-20%);
            transition: opacity 0.5s, transform 0.5s ease-in-out;
        }

        .show {
            opacity: 1;
            transform: translateY(0%);
            transition: opacity 0.5s, transform 0.5s ease-in-out;
        }
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
            
            // Domain and Account buttons
            const domainButton = document.getElementById("Domain-button");
            const accountButton = document.getElementById("Account-button");

            domainButton.addEventListener("click", () => {
                document.getElementById("Account-Content").classList.remove("show");
                document.getElementById("Account-Content").classList.add("fade");
                setTimeout(() => {
                    document.getElementById("Account-Content").style.display = "none";
                    document.getElementById("Domain-Content").style.display = "block";
                    setTimeout(() => {
                        document.getElementById("Domain-Content").classList.remove("fade");
                        document.getElementById("Domain-Content").classList.add("show");
                    }, 10);
                }, 500);
            });

            accountButton.addEventListener("click", () => {
                document.getElementById("Domain-Content").classList.remove("show");
                document.getElementById("Domain-Content").classList.add("fade");
                setTimeout(() => {
                    document.getElementById("Domain-Content").style.display = "none";
                    document.getElementById("Account-Content").style.display = "block";
                    setTimeout(() => {
                        document.getElementById("Account-Content").classList.remove("fade");
                        document.getElementById("Account-Content").classList.add("show");
                    }, 10);
                }, 500);
            });

            const redirectButton = document.getElementById("Redirect-button");
            redirectButton.addEventListener("click", () => {
                document.getElementById("Account-Content").classList.remove("show");
                document.getElementById("Account-Content").classList.add("fade");
                document.getElementById("Domain-Content").classList.remove("show");
                document.getElementById("Domain-Content").classList.add("fade");

                setTimeout(() => {
                    document.getElementById("Account-Content").style.display = "none";
                    document.getElementById("Domain-Content").style.display = "none";
                    document.getElementById("Redirect-Content").style.display = "block";
                    setTimeout(() => {
                        document.getElementById("Redirect-Content").classList.remove("fade");
                        document.getElementById("Redirect-Content").classList.add("show");
                    }, 10);
                }, 500);

                setTimeout(() => {
                    window.location.href = "../../WebsiteBuilder.php";
                }, 5000);
            });
        });
    </script>
</head>

<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <img src="../../images/MiniWCLogo.webp" alt="Webcrafted Pro Logo" style="margin: 0 auto; display: block;">
            <button class="menu-item" id="Account-button"><img src="../../images/icons/Account.webp" alt="Account Icon"
                    style="width: 30px; margin-bottom: -4%; margin-left: -1.5%;"> Account</button>
            <button class="menu-item" id="Domain-button"><img src="icons/Domain.webp" alt="Domain Icon"
                    style="width: 24px; margin-bottom: -2.7%;"> Domain Management</button>
            <button class="menu-item" id="Redirect-button"><img src="icons/WebsiteBuilder.webp"
                    alt="Website Builder Logo" style="width: 24px; margin-bottom: -2.7%;"> Website Builder</button>
            <a class="menu-item" href="../../logout.php"><img src="icons/Logout.webp" alt="Logout Logo"
                    style="width: 23px; margin-bottom: -2.4%;"> Logout</a>
        </div>
        <div class="main">
            <div class="content">
                <div id="Account-Content">
                    <h1 style="text-align: center; margin-top: 6%;">Account</h1>
                    <div class="two-grid">
                        <div class="account-info">
                            <h2>Account Information</h2>
                            <hr>
                            <p>Username: Example User</p>
                            <p style="display: none;" id="email">Email: Email@gmail.com</p>
                            <p style="display: none;" id="phone">Phone Number: 07123 456789</p><br>
                            <div>
                                <h2>Account Controls</h2>
                                <hr style="margin-bottom: 30px;">
                                <a class="control-buttons" href="../../Email_Verification">
                                    Change Password <span class="arrow">&gt;</span>
                                </a>
                                <a class="control-buttons-bad" href="">
                                    Delete Account <span class="arrow2">&gt;</span>
                                </a>
                            </div>
                        </div>
                        <div class="subscription-info">
                            <h2>Subscription</h2>
                            <hr>
                            <p>Plan: Premium</p>
                        </div>
                    </div>
                </div>
                <div id="Domain-Content" style="display: none;" class="fade">
                    <h1 style="text-align: center; margin-top: 6%;">Domain Management</h1>
                    <div class="dashboard-info">
                        <div>
                            <div class="three-grid">
                                <p>Domain Name</p>
                                <p>Expiry Date</p>
                                <p>Actions</p>
                            </div><hr>
                            <div class="three-grid">
                                <p>example.com</p>
                                <p>Expiry Date : 12/12/2022</p>
                                <a href="">Renew Now <span style="font-size: 22px">&gt;</span></a>
                            </div><hr>
                        </div>
                    </div>
                </div>
                <div style="display: none;" id="Redirect-Content">
                    <h1 style="text-align: center; margin-top: 6%;">Website Builder</h1>
                    <div class="dashboard-info">
                        <div>
                            <h3>Your Are About to be redirected in 5 seconds</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>