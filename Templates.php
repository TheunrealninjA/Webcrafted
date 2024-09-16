<?php
//include 'PHPScripts/session_manager.php';
$is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Templates - WebCrafted Pro</title>
    <meta name="description"
        content="Welcome to WebCrafted.Pro, where you can get hand-crafted custom websites for your businesses specific needs. We have competive prices and exclusive features that elevate your website to the next level.">

    <link rel="icon" href="images/WCLogo.webp">

    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="CSS/Animate.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Nav.css">
    <link rel="stylesheet" href="CSS/Templates/Main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <script src="JavaScript/AnimationWait.js"></script>
    <script src="JavaScript/Filter.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins");

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            height: 80%;
            max-width: 90%;
        }

        #modal-content-container {
            border: 1px solid white;
            gap: 20px;
            margin: auto;
            border-radius: 16px;
            box-shadow: 0 0 10px 5px white;
            padding: 20px;
            background-image: linear-gradient(135deg, #181818, #101010);
            width: 80%;
            height: 80%;
        }

        .modal-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .modal-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left;
            width: 100%;
        }

        .modal-info h3 {
            font-size: 24px
        }

        .modal-info h4 {
            margin-top: 10px;
            font-size: 18px;
        }

        .modal-info p {
            margin-top: 5px;
            flex-grow: 1;
        }

        .choose-theme-button {
            padding: 10px 15px;
            background-color: #101010;
            color: #fff;
            border: 1px solid white;
            box-shadow: inset 0 0 4px 2px black;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.6s, transform 0.6s, color 0.3s;
            margin-left: 18vw;
            width: auto;
        }

        .choose-theme-button:hover {
            background-color: white;
            transform: scale(1.05);
            color: black;
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close-modal:hover,
        .close-modal:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
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


        <div class="filter-background">
            <img src="images/icons/Filter_icon.webp" alt="filter">
        </div>

        <div class="filter-options">
            <button class="close-filter">&times;</button>
            <h3>Filters</h3>
            <ul>
                <li><label>Personal <input type="checkbox" class="filter-checkbox" value="personal"></label></li>
                <li><label>All-round <input type="checkbox" class="filter-checkbox" value="all-round"></label>
                </li>
                <li><label>Business <input type="checkbox" class="filter-checkbox" value="business" id="business-checkbox"></label></li>
            </ul>

            <div id="business-type-container" style="display: none;">
                <h3>Business Type</h3>
                <ul>
                    <li><label>AI <input type="checkbox" class="filter-checkbox" value="AI"></label></li>
                    <li><label>Construction <input type="checkbox" class="filter-checkbox" value="Construction"></label></li>
                    <li><label>E-Commerce <input type="checkbox" class="filter-checkbox" value="E-Commerce"></label></li>
                    <li><label>Law <input type="checkbox" class="filter-checkbox" value="Law"></label></li>
                    <li><label>Charity <input type="checkbox" class="filter-checkbox" value="Charity"></label></li>
                    <li><label>Forms <input type="checkbox" class="filter-checkbox" value="Forms"></label></li>
                    <li><label>Blogs <input type="checkbox" class="filter-checkbox" value="Blogs"></label></li>
                </ul>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const filterBackground = document.querySelector('.filter-background');
                const filterOptions = document.querySelector('.filter-options');
                const closeFilter = document.querySelector('.close-filter');
                const modal = document.getElementById('template-modal');
                const modalContentContainer = document.getElementById('modal-content-container');
                const closeModal = document.querySelector('.close-modal');

                filterBackground.addEventListener('click', function () {
                    filterOptions.classList.toggle('open');
                });

                closeFilter.addEventListener('click', function () {
                    filterOptions.classList.remove('open');
                });

                document.querySelectorAll('.filter-item').forEach(item => {
                    item.addEventListener('click', function () {
                        modal.style.display = "block";
                        modalContentContainer.innerHTML = '';

                        const imgElement = item.querySelector('img');
                        const imgSrc = imgElement.getAttribute('data-highres') || imgElement.src;
                        const title = item.querySelector('h3').innerText;
                        const description = item.querySelector('p').innerText;

                        const modalImage = document.createElement('img');
                        modalImage.src = imgSrc;
                        modalImage.classList.add('modal-image');

                        const modalInfo = document.createElement('div');
                        modalInfo.classList.add('modal-info');

                        const modalTitle = document.createElement('h3');
                        modalTitle.innerText = title;

                        const modalSubtitle = document.createElement('h4');
                        modalSubtitle.innerText = 'Product Description:';

                        const modalDescription = document.createElement('p');
                        modalDescription.innerText = description;

                        const chooseThemeButton = document.createElement('button');
                        chooseThemeButton.innerText = 'Choose Template';
                        chooseThemeButton.classList.add('choose-theme-button');

                        modalInfo.appendChild(modalTitle);
                        modalInfo.appendChild(modalSubtitle);
                        modalInfo.appendChild(modalDescription);
                        modalInfo.appendChild(chooseThemeButton);

                        modalContentContainer.appendChild(modalImage);
                        modalContentContainer.appendChild(modalInfo);
                    });
                });

                closeModal.addEventListener('click', function () {
                    modal.style.display = "none";
                });
            });
        </script>

        <div class="templates three-grid" id="items-container">
            <div class="Cont filter-item" data-category="business" data-business-type="E-Commerce" style="margin: 0;">
                <h3>Small E-commerce Light</h3>
                <img src="images/Templates/SmallETemp.webp" data-highres="images/Templates/Upscaled/SmallETemp_AI.webp" alt="Small E-commerce Store">
                <p>Best for small E-commerce businesses</p>
            </div>
            <div class="Cont filter-item" data-category="personal" style="margin: 0;">
                <h3>Personal Bio</h3>
                <img src="images/Templates/BioTemp.webp" data-highres="images/Templates/Upscaled/BioTemp_AI.webp" alt="Bio Template">
                <p>Best for a personal website or a public bio for showing off and promoting your socials</p>
            </div>
            <div class="Cont filter-item" data-category="business" data-business-type="AI" style="margin: 0;">
                <h3>Large E-commerce Light</h3>
                <img src="images/Templates/LargeETemp.webp" data-highres="images/Templates/Upscaled/LargeETemp_AI.webp" alt="Large E-commerce Store">
                <p>Best for big E-commerce businesses</p>
            </div>
            <div class="Cont filter-item" data-category="" style="margin: 0;">

            </div>
        </div>
        <div id="template-modal" class="modal">
            <span class="close-modal">&times;</span>
            <div class="two-grid" id="modal-content-container"></div>
        </div>
    </div>
</body>

</html>