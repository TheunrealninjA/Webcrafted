<?php
include 'PHPScripts/session_manager.php';
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
    <script src="JavaScript/HamBurger.js"></script>
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

            <span class="open-slide">
                <a class="hamburger" href="#" onclick="openSideMenu()">
                    <p> &#9776;</p>
                </a>
            </span>

            <div id="side-menu" class="side-nav">
                <a href="#" class="btn-close" onclick="closeSideMenu()">&times;</a>
                <div class="mobile-nav-buttons">
                    <a href="/">Home</a>
                    <a href="Websites.php">Websites</a>
                    <a href="Pricing.php">Pricing</a>
                    <a href="Templates.php">Templates</a>
                    <a href="ContactUs.php">Contact Us</a>
                </div>
            </div>

            <ul class="account">
                <?php if ($is_logged_in): ?>
                    <li><a href="Account.php"><img src="images/icons/Account.webp" alt="Account" style="margin-top: -8px;"></a></li>
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
                <li><label>All-round <input type="checkbox" class="filter-checkbox" value="all-round"></label></li>
                <li><label>Business <input type="checkbox" class="filter-checkbox" value="business" id="business-checkbox"></label></li>
            </ul>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const filterBackground = document.querySelector('.filter-background');
                const filterOptions = document.querySelector('.filter-options');
                const closeFilter = document.querySelector('.close-filter');
                const modal = document.getElementById('template-modal');
                const modalContentContainer = document.getElementById('modal-content-container');
                const closeModal = document.querySelector('.close-modal');

                filterBackground.addEventListener('click', function() {
                    filterOptions.classList.toggle('open');
                });

                closeFilter.addEventListener('click', function() {
                    filterOptions.classList.remove('open');
                });

                document.querySelectorAll('.filter-item').forEach(item => {
                    item.addEventListener('click', function() {
                        const category = item.getAttribute('data-category');
                        if (category !== 'all') {
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

                            const dropdown = document.createElement('div');
                            dropdown.classList.add('dropcont');

                            const backgroundColorDropdown = createDropdown('Background Color', ['White', 'Black', 'Blue', 'Red', 'Green']);
                            const headerColorDropdown = createDropdown('Header Color', ['White', 'Black', 'Blue', 'Red', 'Green']);
                            const fontDropdown = createDropdown('Font Style', ['Arial', 'Verdana', 'Times New Roman', 'Courier New', 'Georgia', 'Comic Sans MS', 'Poppins', 'Brush Script MT', 'Tahoma'], true);

                            const chooseThemeButton = document.createElement('button');
                            chooseThemeButton.innerText = 'Choose Template';
                            chooseThemeButton.classList.add('choose-theme-button');

                            modalInfo.appendChild(modalTitle);
                            modalInfo.appendChild(modalSubtitle);
                            modalInfo.appendChild(modalDescription);
                            modalInfo.appendChild(dropdown);
                            
                            dropdown.appendChild(backgroundColorDropdown);
                            dropdown.appendChild(headerColorDropdown);
                            dropdown.appendChild(fontDropdown);
                            
                            modalInfo.appendChild(chooseThemeButton);

                            modalContentContainer.appendChild(modalImage);
                            modalContentContainer.appendChild(modalInfo);
                        }
                    });
                });

                closeModal.addEventListener('click', function() {
                    modal.style.display = "none";
                });

                function createDropdown(labelText, options, isFontDropdown = false) {
                    const container = document.createElement('div');
                    container.classList.add('dropdown-container');

                    const label = document.createElement('label');
                    label.innerText = labelText;
                    container.appendChild(label);

                    const select = document.createElement('select');
                    options.forEach(optionText => {
                        const option = document.createElement('option');
                        option.value = optionText.toLowerCase();
                        option.innerText = optionText;
                        if (isFontDropdown) {
                            option.style.fontFamily = optionText;
                        }
                        select.appendChild(option);
                    });
                    container.appendChild(select);

                    return container;
                }
            });
        </script>

        <div class="snap templates three-grid" id="items-container">
            <div class="Cont filter-item" data-category="business" style="margin: 25px 0;">
                <h3>Small E-commerce Light</h3>
                <img src="images/Templates/SmallETemp.webp" data-highres="images/Templates/Upscaled/SmallETemp_AI.webp" alt="Small E-commerce Store">
                <p>Best for small E-commerce Businesses</p>
            </div>
            <div class="Cont filter-item" data-category="personal" style="margin: 25px 0;">
                <h3>Personal Bio</h3>
                <img src="images/Templates/BioTemp.webp" data-highres="images/Templates/Upscaled/BioTemp_AI.webp" alt="Bio Template">
                <p>Best for a personal website or a Public Bio for showing off and promoting your socials</p>
            </div>
            <div class="Cont filter-item" data-category="business" style="margin: 25px 0;">
                <h3>Large E-commerce Light</h3>
                <img src="images/Templates/LargeETemp.webp" data-highres="images/Templates/Upscaled/LargeETemp_AI.webp" alt="Large E-commerce Store">
                <p>Best for big E-commerce Businesses</p>
            </div>
            <div class="Cont filter-item" data-category="business" style="margin: 25px 0;">
                <h3>Construction Template</h3>
                <img src="images/Templates/ConstructionTemp.webp" data-highres="images/Templates/Upscaled/ConstructionTemp_AI.webp" alt="Construction Template">
                <p>Best for Construction Companies</p>
            </div>
            <div class="Cont filter-item" data-category="personal" style="margin: 25px 0;">
                <h3>Personal Bio</h3>
                <img src="images/Templates/PersonalBlogTemp.webp" data-highres="images/Templates/Upscaled/PersonalBlogTemp_AI.webp" alt="Personal Blog Template">
                <p>Best for a Professional Bio for showing off your achievements and promoting your socials to a wider audience</p>
            </div>
            <div class="Cont filter-item" data-category="all" style="margin: 25px 0;">
                <h3>Can't Find What Your Looking For?</h3>
                <img src="images/QuestionMark.webp" alt="Not Found" style="margin: 16% 0;height: 110px;width: auto;">
                <p>Tell us what You want us to add to the Templates by sending an email to use at <a class="LinkText" href="mailto:wyattd@webcrafted.pro">wyattd@webcrafted.pro</a> or Explain to our team what you want to your Website to look like in our <a class="LinkText" href="ContactUs.php">Contact Us</a> Page</p>
            </div>
        </div>
        <div id="template-modal" class="modal">
            <span class="close-modal">&times;</span>
            <div class="two-grid" id="modal-content-container"></div>
        </div>
    </div>
</body>

</html>