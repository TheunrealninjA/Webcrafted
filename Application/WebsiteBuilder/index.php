<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Builder</title>
    <link rel="stylesheet" href="../../CSS/all.css">
    <link rel="stylesheet" href="../../CSS/Animate.css">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins");
        @import url("https://fonts.googleapis.com/css?family=Arial");
        @import url("https://fonts.googleapis.com/css?family=Times+New+Roman");
        @import url("https://fonts.googleapis.com/css?family=Roboto");
        @import url("https://fonts.googleapis.com/css?family=Open+Sans");
        @import url("https://fonts.googleapis.com/css?family=Lato");
        @import url("https://fonts.googleapis.com/css?family=Montserrat");
        @import url("https://fonts.googleapis.com/css?family=Oswald");
        @import url("https://fonts.googleapis.com/css?family=Raleway");
        @import url("https://fonts.googleapis.com/css?family=Ubuntu");
        @import url("https://fonts.googleapis.com/css?family=Nunito");
        @import url("https://fonts.googleapis.com/css?family=Playfair+Display");
        @import url("https://fonts.googleapis.com/css?family=Merriweather");
    </style>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            background-color: #1e1e1e;
            color: #d4d4d4;
        }

        .sidebar {
            width: 60px;
            background: #252526;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .sidebar button {
            width: 85%;
            border: none;
            padding: 10px 0;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            box-shadow: none;
            background: #202021;
            transition: background 0.3s;
            color: #d4d4d4;
        }

        .sidebar button:hover {
            background: #181819;
        }

        .right-sidebar {
            width: 300px;
            background: #252526;
            padding: 20px;
            display: flex;
            flex-direction: column;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100%;
            top: 0;
            right: 0;
            z-index: 1000;
        }

        .file-explorer {
            width: 94%;
            background: #333;
            border: 1px solid #444;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .file-explorer h3 {
            margin: 0 0 10px 0;
            font-size: 18px;
            color: #d4d4d4;
        }

        .file-explorer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .file-explorer li {
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.3s;
            color: #d4d4d4;
        }

        .file-explorer li:hover {
            background: #3c3c3c;
        }

        .topbar {
            width: calc(100% - 60px);
            background: #252526;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 60px;
            z-index: 1000;
        }

        .topbar input,
        .topbar select {
            padding: 5px;
            margin: 0 10px;
            border: 1px solid #444;
            border-radius: 4px;
            font-size: 14px;
            background: #3c3c3c;
            color: #d4d4d4;
        }

        .main-content {
            margin-left: 60px;
            margin-right: 300px;
            margin-top: 60px;
            width: calc(100% - 360px);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;

        }

        .builder-form {
            display: flex;
            flex-direction: column;
            width: 94%;
            background: #333;
            border: 1px solid #444;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color:rgb(34, 34, 34) #333;
        }

        .builder-form::-webkit-scrollbar {
            width: 8px;
        }

        .builder-form::-webkit-scrollbar-track {
            background: #333;
        }

        .builder-form::-webkit-scrollbar-thumb {
            border-radius: 10px;
            border: 2px solid #333;
        }

        .builder-form input,
        .builder-form textarea,
        .builder-form select {
            width: 92%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #444;
            border-radius: 4px;
            font-size: 16px;
            background: #3c3c3c;
            color: #d4d4d4;
            transition: border-color 0.3s;
        }

        .builder-form input:focus,
        .builder-form textarea:focus,
        .builder-form select:focus {
            border-color: #007acc;
            outline: none;
        }

        .builder-form input[type="color"] {
            width: 50px;
            height: 50px;
            padding: 6px;
        }

        .preview-container {
            margin-top: 20px;
            width: 90%;
            max-width: 1200px;
            aspect-ratio: 2.08/1;
            border: 1px solid #444;
            padding: 2px;
            position: relative;
            background: #1e1e1e;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .website-preview {
            width: 100%;
            height: auto;
            min-height: 100%;
            position: relative;
            background-color: #ffffff;
            /* Set background color to white */
        }

        .website-preview img {
            max-width: 100%;
        }

        .draggable {
            position: absolute;
            cursor: move;
            user-select: none;
            color: #d4d4d4;
        }

        .editable {
            border: 1px dashed #444;
            padding: 5px;
            transition: border-color 0.3s;
            color: #d4d4d4;
        }

        .editable:focus {
            border-color: #007acc;
            outline: none;
        }

        .snap-line {
            position: absolute;
            background: red;
            z-index: 999;
        }

        .snap-line.horizontal {
            height: 1px;
            width: 100%;
        }

        .snap-line.vertical {
            width: 1px;
            height: 100%;
        }

        .no-select {
            user-select: none;
        }

        .context-menu {
            display: none;
            position: absolute;
            background: #252526;
            border: 1px solid #444;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            padding: 10px;
            border-radius: 4px;
        }

        .context-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .context-menu li {
            padding: 5px 10px;
            cursor: pointer;
            transition: background 0.3s;
            border-radius: 4px;
            color: #d4d4d4;
        }

        .context-menu li:hover {
            background: #3c3c3c;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #252526;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #444;
            width: 80%;
            max-width: 500px;
            color: #d4d4d4;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #d4d4d4;
            text-decoration: none;
            cursor: pointer;
        }

        .resize-handle {
            width: 10px;
            height: 10px;
            background: #007acc;
            position: absolute;
            cursor: nwse-resize;
        }

        .resize-handle.bottom-right {
            right: 0;
            bottom: 0;
        }

        .menu {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100%;
            background: #252526;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            padding: 20px;
            flex-direction: column;
        }

        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li {
            padding: 10px 0;
            cursor: pointer;
            color: #d4d4d4;
            transition: background 0.3s;
        }

        .menu li:hover {
            background: #007acc;
        }

        .menu .close-menu {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: #d4d4d4;
            cursor: pointer;
            transition: color 0.3s;
        }

        .menu .close-menu:hover {
            color: red;
        }

        @media screen and (max-width: 1800px) {
            .topbar {
                left: 60px;
            }

            .main-content {
                margin-left: 60px;
                margin-right: 300px;
                width: calc(100% - 360px);
            }

            .preview-container {
                width: 70%;
                padding: 5px;
            }
        }

        @media (max-width: 768px) {

            .sidebar {
                width: 50px;
            }

            .sidebar button {
                width: 100%;
                padding: 10px 0;
            }

            .topbar {
                width: calc(100% - 350px);
                left: 50px;
            }

            .main-content {
                margin-left: 50px;
                margin-right: 300px;
                width: calc(100% - 350px);
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                width: 100%;
                height: auto;
                flex-direction: row;
                justify-content: space-around;
                position: relative;
            }

            .sidebar button {
                width: auto;
                padding: 10px;
            }

            .topbar {
                width: 100%;
                left: 0;
                top: auto;
                bottom: 0;
                flex-direction: column;
                align-items: flex-start;
            }

            .main-content {
                margin: 0;
                width: 100%;
                margin-top: 60px;
            }

            .right-sidebar {
                width: 100%;
                height: auto;
                position: relative;
                flex-direction: row;
                justify-content: space-around;
            }
        }

        .loading-screen {
            position: fixed;
            width: 100%;
            height: 100%;
            background: #1e1e1e;
            color: #d4d4d4;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2000;
        }

        .selected {
            border: 2px dashed #007acc;
        }

        .folder-arrow {
            margin: 0 5px 10px 0;
            transition: transform 0.3s;
        }

        .folder-content {
            transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
        }

        .folder-content.open {
            max-height: 500px;
            opacity: 1;
        }

        .splitter {
            width: 100%;
            height: 2px;
            border-radius: 1000px;
            opacity: 0.2;
            background-color: #ccc;
            margin: 10px 0;
        }

        .context-menu-insert {
            display: none;
            position: absolute;
            background: #252526;
            border: 1px solid #444;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            padding: 10px;
            border-radius: 4px;
        }

        .context-menu-insert ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .context-menu-insert li {
            padding: 5px 10px;
            cursor: pointer;
            transition: background 0.3s;
            border-radius: 4px;
            color: #d4d4d4;
        }

        .context-menu-insert li:hover {
            background: #3c3c3c;
        }

        .expandable-menu {
            display: none;
            flex-direction: column;
            margin-top: 10px;
        }

        .expandable-menu.open {
            display: flex;
        }

        .expandable-menu label {
            margin-top: 5px;
            color: #d4d4d4;
        }

        .expandable-menu input {
            margin-top: 5px;
            width: 100%;
        }

        .collapsible {
            cursor: pointer;
            user-select: none;
        }

        .collapsible-content {
            display: none;
            overflow: hidden;
            transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
            max-height: 0;
            opacity: 0;
        }

        .collapsible-content.show {
            display: block;
            max-height: 500px;
            opacity: 1;
        }

        .collapsible::after {
            content: '▼';
            float: right;
            position: absolute;
            right: 10%;
            transition: transform 0.3s;
        }

        .collapsible.show::after {
            transform: rotate(180deg);
        }
    </style>
</head>

<body oncontextmenu="return false;">
    <div class="loading-screen" id="loading-screen">
        <h1>Loading...</h1>
    </div>
    <div class="sidebar">
        <button onclick="OpenMenu()" style="background: none !important; margin: -18px 0 0;"><img
                src="icons/MenuIcon.webp" alt="Menu"></button>
        <button onclick="addTextBox()"><img src="icons/textboxicon.webp" alt="Text Box"></button>
        <button onclick="showButtonModel()"><img src="icons/ButtonIcon.webp" alt="Insert Button"></button>
        <button onclick="showImageUploadModal()"><img src="icons/addimageicon.webp" alt="Picture Box"></button>
        <button onclick="addShape()"><img src="icons/ShapeIcon.webp" alt="Insert Shape"></button>
        <button onclick="callAPI()"><img src="icons/API.webp" alt="API"></button> <!-- New API button -->
    </div>
    <div class="menu" id="menu">
        <span class="close-menu" style="font-size: 30px;" onclick="closeMenu()">&times;</span>
        <h2>Menu</h2>
        <div class="splitter"></div>
        <ul>
            <li>Save</li>
            <li onclick="SaveHTML()">Export as File</li>
            <li onclick="ImportHTML()">Import</li>
            <li>Insert</li>
            <li>Tools</li>
            <li><a href="">Help</a></li>
        </ul>
    </div>
    <!-- The Modal -->
    <div id="imageUploadModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeImageUploadModal()">&times;</span>
            <h2>Upload Image</h2>
            <div class="splitter"></div>
            <div id="drop-zone"
                style="border: 2px dashed #444; padding: 80px 20px; text-align: center; height: 45%; margin-top: 20px;">
                Drag and drop an image here or click to select
                <input type="file" id="image-upload-modal" accept="image/*" onchange="handleImageUpload(event)"
                    style="display: none;">
            </div>
        </div>
    </div>
    <div id="buttonModel" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeButtonModel()">&times;</span>
            <h2>Hyperlink</h2>
            <div class="splitter"></div>
            <input type="text" id="URL" placeholder="Enter URL">
            <div style="width: 100%; display: flex; justify-content: center; margin-top: 10px;">
                <div class="file-explorer" style="width: 55%;">
                    <h3>File Explorer</h3>
                    <button onclick="addFile()"
                        style="border: none; background: transparent; box-shadow: none; font-size: 25px; position: absolute; margin: -2.7% 0 0 12.3%; color:#d4d4d4;">+</button>
                    <ul id="file-list">
                        <li onclick="selectFile('index.html')"><img src="icons/HTML5.webp" alt="HTML5 Icon"
                                style="width: 16px; height: 16px; margin-right: 5px;">index.html</li>
                    </ul>
                </div>
            </div>
            <button onclick="applyLink()">Apply</button>
        </div>
    </div>
    <div id="addFileFolderModal" class="modal">
        <div class="modal-content" style="background: #202020;">
            <span class="close" onclick="closeAddFileFolderModal()">&times;</span>
            <h2>Add File or Folder</h2>
            <select id="add-type" onchange="toggleAddType()">
                <option value="file">File</option>
                <option value="folder">Folder</option>
            </select>
            <div id="add-file-section">
                <input type="text" id="new-file-name" placeholder="Enter the new file name">
                <button onclick="addFile()">Add File</button>
            </div>
            <div id="add-folder-section" style="display: none;">
                <input type="text" id="new-folder-name" placeholder="Enter the new folder name">
                <button onclick="addFolder()">Add Folder</button>
            </div>
        </div>
    </div>
    <div id="apiModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeApiModal()">&times;</span>
            <h2>Select API</h2>
            <button onclick="addGoogleMaps()"
                style="display: inline-grid; margin: 10px 20px 0 0; max-width: 105px;"><img src="icons/GoogleMaps.webp"
                    alt="Google Maps" style="margin-left: 23%;">Google Maps</button>
            <button onclick="addGoogleAds()" style="display: inline-grid; margin: 10px 20px 0 0; max-width: 105px;"><img
                    src="icons/GoogleAds.webp" alt="Google Ads" style="margin-left: 23%;">Google Ads</button>
            <button onclick="addGoogleRecaptcha()"
                style="display: inline-grid; margin: 10px 20px 0 0; max-width: 105px;"><img
                    src="icons/GoogleReCAPTCHA.webp" alt="Google ReCAPTCHA" style="margin-left: 23%;">Google
                ReCAPTCHA</button>
        </div>
    </div>
    <div class="topbar">
        <input type="text" id="topbar-website-title" placeholder="Website Title" oninput="updateTopbarPreview()">
        <input type="text" id="topbar-website-description" placeholder="Website Description"
            oninput="updateTopbarPreview()">
        <select id="topbar-font-style" onchange="updateTopbarPreview()" style="font-family: Arial;">
            <option value="Arial" style="font-family: Arial;">Arial</option>
            <option value="Sans-serif" style="font-family: sans-serif;">Sans-serif</option>
            <option value="Poppins" style="font-family: Poppins;">Poppins</option>
            <option value="Times New Roman" style="font-family: 'Times New Roman';">Times New Roman</option>
            <option value="Roboto" style="font-family: Roboto;">Roboto</option>
            <option value="Open Sans" style="font-family: 'Open Sans';">Open Sans</option>
            <option value="Lato" style="font-family: Lato;">Lato</option>
            <option value="Montserrat" style="font-family: Montserrat;">Montserrat</option>
            <option value="Oswald" style="font-family: Oswald;">Oswald</option>
            <option value="Raleway" style="font-family: Raleway;">Raleway</option>
            <option value="Ubuntu" style="font-family: Ubuntu;">Ubuntu</option>
            <option value="Nunito" style="font-family: Nunito;">Nunito</option>
            <option value="Playfair Display" style="font-family: 'Playfair Display';">Playfair Display</option>
            <option value="Merriweather" style="font-family: Merriweather;">Merriweather</option>
            <!-- Add more fonts as needed -->
        </select>
    </div>
    <div class="main-content" id="main-content">
        <div class="preview-container">
            <div class="website-preview" id="website-preview">
                <!-- Generated website will appear here -->
                <div class="snap-line horizontal" id="horizontal-snap-line" style="display: none;"></div>
                <div class="snap-line vertical" id="vertical-snap-line" style="display: none;"></div>
            </div>
        </div>
    </div>
    <div class="right-sidebar">
        <div class="file-explorer">
            <h3>File Explorer</h3>
            <button onclick="showAddFileFolderModal()"
                style="margin-left: 71%;font-size: 25px; z-index: 0; position: absolute; background: transparent; border-color: transparent; box-shadow: none; padding: 5px 15px; margin-top: -48px;">+</button>
            <ul id="file-list">
                <li onclick="selectFile('index.html')"><img src="icons/HTML5.webp" alt="HTML5 Icon"
                        style="width: 16px; height: 16px; margin-right: 5px;">index.html</li>
                <li data-folder="images" onclick="toggleFolder('images')">
                    <span class="folder-arrow down">&or;</span>
                    <img src="icons/Folder.webp" alt="Folder Icon"
                        style="width: 16px; height: 16px; margin-right: 5px;">Images
                </li>
                <ul id="images" class="folder-content">
                    <!-- Add image files here -->
                </ul>
                <!-- Add more files as needed -->
            </ul>
        </div>
        <div class="builder-form">
            <h3 style="color:#d4d4d4;">Properties</h3>
            <div class="splitter"></div>
            <h3 class="collapsible" onclick="toggleSection('premade-section')" id="premade-header" style="color:#d4d4d4;">Premade Styles</h3>
            <div id="premade-splitter" class="splitter"></div>
            <div id="premade-section" class="collapsible-content">
                <div style="display: grid; grid-template-columns: repeat(2, 1fr);">
                    <label for="premade-button-styles" id="premade-styles-label"
                        style="width: 110px; margin-top:15px; color:#d4d4d4;">Select a Style:</label>
                    <select id="premade-button-styles" onchange="updateButtonPreview()">
                        <option value="default" style="background-color: #333; color: #fff;">Default</option>
                        <option value="light" style="background-color: #fff; color: #000;">Light</option>
                        <option value="dark" style="background-color: #000; color: #fff;">Dark</option>
                        <option value="gradient"
                            style="background: linear-gradient(to right, #ff7e5f, #feb47b); color: #fff;">Summer
                        </option>
                        <option value="outline"
                            style="background-color: transparent; color: #007acc; border: 2px solid #007acc;">Outline
                        </option>
                        <option value="rounded" style="background-color: #4caf50; color: #fff; border-radius: 20px;">
                            Rounded</option>
                    </select>
                </div>
                <div id="button-preview" style="margin-top: 10px; margin: 0;">
                    <button id="preview-button"
                        style="width: 100px; height: 40px; background-color: #333; color: #fff; padding-bottom: 10px; margin: 0 0 20px 90px;">Preview</button>
                </div>
                <div id="premade-splitter" class="splitter"></div>
            </div>
            <h3 class="collapsible" onclick="toggleSection('font-section')" id="font-header" style="color:#d4d4d4;">Font</h3>
            <div class="splitter" id="font-splitter"></div>
            <div id="font-section" class="collapsible-content">
                <select id="website-text-style" onchange="updateElementStyle()">
                    <option value="normal">Normal</option>
                    <option value="bold">Bold</option>
                    <option value="italic">Italic</option>
                </select>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr);">
                    <label for="font-color" id="font-color-label"
                        style="width: 180px; margin-top:15px; color:#d4d4d4;">Font
                        Color:</label>
                    <input type="color" id="font-color" onchange="updateElementStyle()">
                </div>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr);">
                    <label for="font-size" id="font-size-label"
                        style="width: 180px; margin-top:15px; color:#d4d4d4;">Font Size:</label>
                    <input type="number" id="font-size" min="1" max="100" onchange="updateElementStyle()"
                        style="width: 40px;">
                </div>
                <div class="splitter" id="font-splitter"></div>
            </div>
            <h3 class="collapsible" onclick="toggleSection('background-section')" id="background-header" style="color:#d4d4d4;">Background</h3>
            <div class="splitter" id="background-splitter"></div>
            <div id="background-section" class="collapsible-content">
                <div style="display: grid; grid-template-columns: repeat(2, 1fr);">
                    <label for="background-color" id="background-color-label"
                        style="width: 180px; margin-top:15px; color:#d4d4d4;">Background Color :</label>
                    <input type="color" id="background-color" onchange="updateElementStyle()">
                </div>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr);">
                    <label for="background-image-url" id="background-image-url-label"
                        style="width: 180px; margin-top:15px; color:#d4d4d4;">Background Image :</label>
                    <label for="background-image-upload" id="background-image-upload-icon"
                        style="background: #252526; padding: 8px 10px; border-radius: 4px; width: 62%">
                        <img src="icons/upload-icon.webp" alt="Upload Background Image" style="cursor: pointer;">
                    </label>
                    <button for="delete-background-image" id="delete-background-image" style="color: #d4d4d4; margin:5px 0 0 7px; border: none; 
                        background: transparent; box-shadow: none; font-size: 23px; display: none;"
                        onclick="ResetBackground()">&#x1D5EB;</button>
                    <input type="file" id="background-image-upload" style="display: none;" accept="image/*"
                        onchange="previewBackgroundImage(event)">
                </div>
                <div class="splitter" id="background-splitter"></div>
            </div>
            <h3 class="collapsible" onclick="toggleSection('text-shadow-section')" id="text-shadow-header" style="color:#d4d4d4;">Text Shadow</h3>
            <div class="splitter" id="text-shadow-splitter"></div>
            <div id="text-shadow-section" class="collapsible-content">
                <div id="text-shadow-menu" class="expandable-menu">
                    <div class="two-grid">
                        <label for="text-shadow-color" style="width: 180px; margin-top:12px; color:#d4d4d4;">Shadow Color:</label>
                        <input type="color" id="text-shadow-color" onchange="updateElementStyle()">
                    </div>
                    <div class="two-grid">
                        <label for="text-shadow-offset-x"style="width: 180px; margin-top:12px; color:#d4d4d4;">Offset X:</label>
                        <input type="number" id="text-shadow-offset-x" value="0" onchange="updateElementStyle()" style="width: 40px;">
                    </div>
                    <div class="two-grid">
                        <label for="text-shadow-offset-y"style="width: 180px; margin-top:12px; color:#d4d4d4;">Offset Y:</label>
                        <input type="number" id="text-shadow-offset-y" value="0" onchange="updateElementStyle()" style="width: 40px;">
                    </div>
                    <div class="two-grid">
                        <label for="text-shadow-blur"style="width: 180px; margin-top:12px; color:#d4d4d4;">Blur Radius:</label>
                        <input type="number" id="text-shadow-blur" value="0" onchange="updateElementStyle()" style="width: 40px;">
                    </div>
                </div>
                <div class="splitter" id="text-shadow-splitter"></div>
            </div>
            <h3 class="collapsible" onclick="toggleSection('border-section')" id="border-header" style="color:#d4d4d4;">Border</h3>
            <div class="splitter"></div>
            <div id="border-section" class="collapsible-content">
                <div style="display: grid; grid-template-columns: repeat(2, 1fr);">
                    <label for="border-style" id="border-style-label"
                        style="width: 180px; margin-top:15px; color:#d4d4d4;">Border Style:</label>
                    <select id="border-style" onchange="updateElementStyle()">
                        <option value="none">None</option>
                        <option value="solid">Solid</option>
                        <option value="dashed">Dashed</option>
                        <option value="dotted">Dotted</option>
                        <option value="double">Double</option>
                        <option value="groove">Groove</option>
                        <option value="ridge">Ridge</option>
                        <option value="inset">Inset</option>
                        <option value="outset">Outset</option>
                    </select>
                </div>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr);">
                    <label for="border-color" id="border-color-label"
                        style="width: 180px; margin-top:15px; color:#d4d4d4;">Border Color:</label>
                    <input type="color" id="border-color" onchange="updateElementStyle()">
                </div>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr);">
                    <label for="border-width" id="border-width-label"
                        style="width: 180px; margin-top:15px; color:#d4d4d4;">Border Width:</label>
                    <input type="number" id="border-width" min="0" onchange="updateElementStyle()" style="width: 40px;">
                </div>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr);">
                    <label for="border-radius" id="border-radius-label"
                        style="width: 180px; margin-top:15px; color:#d4d4d4;">Border
                        Radius:</label>
                    <input type="number" id="border-radius" min="0" onchange="updateElementStyle()"
                        style="width: 40px;">
                </div>
            </div>
        </div>
    </div>
    <div class="context-menu" id="context-menu">
        <ul>
            <li id="change-image-url" onclick="showChangeImageUrlModal()" style="display: none;">Change Image</li>
            <li onclick="addTextBox()">Add Text Box</li>
            <li onclick="deleteElement()" style="color: red;">Delete</li>
        </ul>
    </div>
    <div id="changeImageUrlModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeChangeImageUrlModal()">&times;</span>
            <h2>Change Image</h2>
            <input type="file" id="new-image-file" accept="image/*" onchange="changeImage()">
        </div>
    </div>
    <div class="context-menu-insert" id="context-menu-insert">
        <ul>
            <li onclick="showImageUploadModal()">Insert Image</li>
        </ul>
    </div>
    <script>
        let selectedElement = null;
        let selectedElements = [];

        function OpenMenu() {
            document.getElementById('menu').style.display = 'flex';
        }

        function closeMenu() {
            document.getElementById('menu').style.display = 'none';
        }

        function showImageUploadModal() {
            document.getElementById('imageUploadModal').style.display = 'block';
        }

        function closeImageUploadModal() {
            document.getElementById('imageUploadModal').style.display = 'none';
        }

        function handleImageUpload(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const imageUrl = reader.result;
                addImageBox(imageUrl);
                closeImageUploadModal();
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function addImageBox(imageUrl) {
            const preview = document.getElementById('website-preview');

            const imageBox = document.createElement('div');
            imageBox.className = 'draggable resizable';
            imageBox.style.position = 'absolute';
            imageBox.style.left = '10px';
            imageBox.style.top = '10px';
            imageBox.style.width = '200px'; // Set default width

            const img = document.createElement('img');
            img.src = imageUrl;
            img.style.width = '100%';
            img.style.height = 'auto';
            img.style.display = 'block';

            const resizeHandle = document.createElement('div');
            resizeHandle.className = 'resize-handle bottom-right';

            imageBox.appendChild(img);
            imageBox.appendChild(resizeHandle);
            preview.appendChild(imageBox);
            makeElementsDraggable();
            makeElementsResizable();
        }

        function makeElementsResizable() {
            const resizables = document.querySelectorAll('.resizable');

            resizables.forEach(el => {
                const resizeHandle = el.querySelector('.resize-handle');
                if (resizeHandle) {
                    resizeHandle.onmousedown = function (event) {
                        event.stopPropagation();
                        selectedElement = el; // Set the selected element
                        showProperties(); // Show properties when an element is selected

                        const startX = event.clientX;
                        const startY = event.clientY;
                        const startWidth = parseInt(document.defaultView.getComputedStyle(el).width, 10);
                        const startHeight = parseInt(document.defaultView.getComputedStyle(el).height, 10);
                        const aspectRatio = startWidth / startHeight;

                        function doDrag(e) {
                            const newWidth = startWidth + e.clientX - startX;
                            const newHeight = startHeight + e.clientY - startY;

                            if (el.querySelector('img') || el.id === 'google-map' || el.classList.contains('adsbygoogle') || el.classList.contains('g-recaptcha')) {
                                // Maintain aspect ratio for image and APIs
                                el.style.width = newWidth + 'px';
                                el.style.height = newWidth / aspectRatio + 'px';
                            } else {
                                // Free scaling for other elements
                                el.style.width = newWidth + 'px';
                                el.style.height = newHeight + 'px';
                            }
                        }

                        function stopDrag() {
                            document.documentElement.removeEventListener('mousemove', doDrag, false);
                            document.documentElement.removeEventListener('mouseup', stopDrag, false);
                        }

                        document.documentElement.addEventListener('mousemove', doDrag, false);
                        document.documentElement.addEventListener('mouseup', stopDrag, false);
                    };
                }
            });
        }
        function updateTopbarPreview() {
            const title = document.getElementById('topbar-website-title').value;
            const description = document.getElementById('topbar-website-description').value;
            const fontStyle = document.getElementById('topbar-font-style').value;
            document.body.style.fontFamily = fontStyle;
            document.title = title;
            document.getElementById('topbar-font-style').style.fontFamily = fontStyle;
            applyFontStyle();
        }

        function applyFontStyle() {
            const fontStyle = document.getElementById('topbar-font-style').value;
            const elements = document.querySelectorAll('.draggable, .editable');
            elements.forEach(el => {
                el.style.fontFamily = fontStyle;
                el.style.color = 'black'; // Set default font color to black
            });
        }

        function addTextBox() {
            const preview = document.getElementById('website-preview');
            const textBox = document.createElement('div');
            textBox.className = 'draggable editable';
            textBox.id = 'text-box'
            textBox.contentEditable = 'true';
            textBox.style.position = 'absolute';
            textBox.style.height = '20px';
            textBox.style.width = 'auto';
            textBox.style.left = '10px';
            textBox.style.top = '10px';
            textBox.style.fontSize = '16px';
            textBox.style.fontFamily = document.getElementById('topbar-font-style').value;
            textBox.style.fontStyle = document.getElementById('website-text-style').value;
            textBox.style.color = 'black'; // Set default font color to black
            textBox.innerText = 'New Text Box';
            preview.appendChild(textBox);
            makeElementsDraggable();
        }

        function previewImage(event) {
            const file = event.target.files[0];
            if (file && file.size > 2 * 1024 * 1024) {
                alert("Warning! The image is too large. The recommended maximum size is 2MB.");
                return;
            }
            if (file) {
                const reader = new FileReader();
                reader.onload = function () {
                    const img = new Image();
                    img.onload = function () {
                        if (img.width > 1920 || img.height > 1080) {
                            alert("Warning! The image dimensions exceed 1920x1080 pixels.");
                            return;
                        }
                        const previewImg = document.getElementById('preview-image');
                        if (previewImg) { // Added null check
                            previewImg.src = reader.result;
                        } else {
                            console.error("Element with id 'preview-image' not found.");
                        }
                    };
                    img.src = reader.result;
                };
                reader.readAsDataURL(file);
            }
        }

        function showProperties() {
            const builderForm = document.querySelector('.builder-form');

            const premadeheader = document.getElementById('premade-header');
            const premadelabel = document.getElementById('premade-styles-label');
            const buttonStyles = document.getElementById('premade-button-styles');
            const previewButton = document.getElementById('preview-button');
            const premadeSplitter = document.getElementById('premade-splitter');

            const fontheader = document.getElementById('font-header');
            const fontsplitter = document.getElementById('font-splitter');
            const fontlabel = document.getElementById('font-color-label');
            const fontColorInput = document.getElementById('font-color');
            const textStyleSelect = document.getElementById('website-text-style');
            const fontSizeLabel = document.getElementById('font-size-label');
            const fontSizeInput = document.getElementById('font-size');

            const backgroundheader = document.getElementById('background-header');
            const backgroundsplitter = document.getElementById('background-splitter');
            const backgroundColorLabel = document.getElementById('background-color-label');
            const backgroundColorInput = document.getElementById('background-color');
            const backgroundImageUrlLabel = document.getElementById('background-image-url-label');
            const backgroundImageUploadIcon = document.getElementById('background-image-upload-icon');
            const backgroundImageUploadInput = document.getElementById('background-image-upload');
            const backgroundImageDeleteButton = document.getElementById('delete-background-image');

            const borderheader = document.getElementById('border-header');
            const borderStyleLabel = document.getElementById('border-style-label');
            const borderStyleSelect = document.getElementById('border-style');
            const borderColorLabel = document.getElementById('border-color-label');
            const borderColorInput = document.getElementById('border-color');
            const borderRadiusLabel = document.getElementById('border-radius-label');
            const borderRadiusInput = document.getElementById('border-radius');
            const borderWidthLabel = document.getElementById('border-width-label');
            const borderWidthInput = document.getElementById('border-width');

            const textShadowHeader = document.getElementById('text-shadow-header');
            const textShadowMenu = document.getElementById('text-shadow-menu');
            const textShadowSplitter = document.getElementById('text-shadow-splitter');

            if (selectedElement || selectedElements.length > 0) {
                builderForm.style.display = 'flex';
                if (selectedElement.id === 'text-box') {
                    // Text Box
                    premadeheader.style.display = 'none';
                    premadelabel.style.display = 'none';
                    buttonStyles.style.display = 'none';
                    previewButton.style.display = 'none';
                    premadeSplitter.style.display = 'none';

                    fontheader.style.display = 'flex';
                    fontsplitter.style.display = 'flex';
                    fontlabel.style.display = 'flex';
                    fontColorInput.style.display = 'flex';
                    textStyleSelect.style.display = 'flex';
                    document.getElementById('website-text-style').value = selectedElement.style.fontStyle || 'normal';
                    fontSizeLabel.style.display = 'flex';
                    fontSizeInput.style.display = 'flex';
                    fontSizeInput.value = Math.round(parseInt(window.getComputedStyle(selectedElement).fontSize) * 1.7);

                    backgroundheader.style.display = 'flex';
                    backgroundsplitter.style.display = 'flex';
                    backgroundColorLabel.style.display = 'flex';
                    backgroundColorInput.style.display = 'flex';
                    backgroundImageUrlLabel.style.display = 'none';
                    backgroundImageUploadIcon.style.display = 'none';
                    backgroundImageUploadInput.style.display = 'none';
                    backgroundImageDeleteButton.style.display = 'none';
                    document.getElementById('font-color').value = rgbToHex(selectedElement.style.color || '#000000');
                    document.getElementById('background-color').value = rgbToHex(selectedElement.style.backgroundColor || '#FFFFFF');

                    borderheader.style.display = 'flex';
                    borderStyleLabel.style.display = 'flex';
                    borderStyleSelect.style.display = 'flex';
                    borderStyleSelect.value = selectedElement.style.borderStyle || 'none';
                    borderColorLabel.style.display = 'flex';
                    borderColorInput.style.display = 'flex';
                    borderColorInput.value = rgbToHex(selectedElement.style.borderColor || '#000000');
                    borderRadiusLabel.style.display = 'flex';
                    borderRadiusInput.style.display = 'flex';
                    borderRadiusInput.value = parseFloat(selectedElement.style.borderRadius) || 0;
                    borderWidthLabel.style.display = 'flex';
                    borderWidthInput.style.display = 'flex';
                    borderWidthInput.value = parseFloat(selectedElement.style.borderWidth) || 0;

                    textShadowHeader.style.display = 'flex';
                    textShadowMenu.style.display = 'flex';
                    textShadowSplitter.style.display = 'flex';
                    document.getElementById('text-shadow-color').value = rgbToHex(selectedElement.style.textShadowColor || '#000000');
                    document.getElementById('text-shadow-offset-x').value = parseFloat(selectedElement.style.textShadowOffsetX) || 0;
                    document.getElementById('text-shadow-offset-y').value = parseFloat(selectedElement.style.textShadowOffsetY) || 0;
                    document.getElementById('text-shadow-blur').value = parseFloat(selectedElement.style.textShadowBlur) || 0;
                } else if (selectedElement.id === 'website-preview') {
                    // Website Preview
                    premadeheader.style.display = 'none';
                    premadelabel.style.display = 'none';
                    buttonStyles.style.display = 'none';
                    previewButton.style.display = 'none';
                    premadeSplitter.style.display = 'none';

                    fontheader.style.display = 'none';
                    fontsplitter.style.display = 'none';
                    fontlabel.style.display = 'none';
                    fontColorInput.style.display = 'none';
                    textStyleSelect.style.display = 'none';
                    fontSizeLabel.style.display = 'none';
                    fontSizeInput.style.display = 'none';

                    backgroundheader.style.display = 'flex';
                    backgroundsplitter.style.display = 'none';
                    backgroundColorLabel.style.display = 'flex';
                    backgroundColorInput.style.display = 'flex';
                    backgroundImageUrlLabel.style.display = 'flex';
                    backgroundImageUploadIcon.style.display = 'flex';
                    backgroundImageUploadInput.style.display = 'none';
                    backgroundImageDeleteButton.style.display = 'flex';
                    document.getElementById('background-color').value = rgbToHex(selectedElement.style.backgroundColor || '#FFFFFF');

                    borderheader.style.display = 'none';
                    borderStyleLabel.style.display = 'none';
                    borderStyleSelect.style.display = 'none';
                    borderColorLabel.style.display = 'none';
                    borderColorInput.style.display = 'none';
                    borderRadiusLabel.style.display = 'none';
                    borderRadiusInput.style.display = 'none';
                    borderWidthLabel.style.display = 'none';
                    borderWidthInput.style.display = 'none';

                    textShadowHeader.style.display = 'none';
                    textShadowMenu.style.display = 'none';
                    textShadowSplitter.style.display = 'none';
                } else if (selectedElement.tagName === 'IMG') {
                    // Image
                    premadeheader.style.display = 'none';
                    premadelabel.style.display = 'none';
                    buttonStyles.style.display = 'none';
                    previewButton.style.display = 'none';
                    premadeSplitter.style.display = 'none';

                    fontheader.style.display = 'none';
                    fontsplitter.style.display = 'none';
                    fontlabel.style.display = 'none';
                    fontColorInput.style.display = 'none';
                    textStyleSelect.style.display = 'none';
                    fontSizeLabel.style.display = 'none';
                    fontSizeInput.style.display = 'none';

                    backgroundheader.style.display = 'none';
                    backgroundsplitter.style.display = 'none';
                    backgroundColorLabel.style.display = 'none';
                    backgroundColorInput.style.display = 'none';
                    backgroundImageUrlLabel.style.display = 'none';
                    backgroundImageUploadIcon.style.display = 'none';
                    backgroundImageUploadInput.style.display = 'none';
                    backgroundImageDeleteButton.style.display = 'none';

                    borderheader.style.display = 'none';
                    borderStyleLabel.style.display = 'none';
                    borderStyleSelect.style.display = 'none';
                    borderColorLabel.style.display = 'none';
                    borderColorInput.style.display = 'none';
                    borderRadiusLabel.style.display = 'none';
                    borderRadiusInput.style.display = 'none';
                    borderWidthLabel.style.display = 'none';
                    borderWidthInput.style.display = 'none';

                    textShadowHeader.style.display = 'none';
                    textShadowMenu.style.display = 'none';
                    textShadowSplitter.style.display = 'none';
                } else if (selectedElement.id === 'hyperlink-button') {
                    // Button
                    premadeheader.style.display = 'flex';
                    premadelabel.style.display = 'flex';
                    buttonStyles.style.display = 'flex';
                    previewButton.style.display = 'flex';
                    premadeSplitter.style.display = 'flex';

                    fontheader.style.display = 'flex';
                    fontsplitter.style.display = 'flex';
                    fontlabel.style.display = 'flex';
                    fontColorInput.style.display = 'flex';
                    textStyleSelect.style.display = 'flex';
                    fontSizeLabel.style.display = 'flex';
                    fontSizeInput.style.display = 'flex';
                    fontSizeInput.value = Math.round(parseInt(window.getComputedStyle(selectedElement).fontSize) * 1.7);

                    backgroundheader.style.display = 'flex';
                    backgroundsplitter.style.display = 'flex';
                    backgroundColorLabel.style.display = 'flex';
                    backgroundColorInput.style.display = 'flex';
                    backgroundImageUrlLabel.style.display = 'none';
                    backgroundImageUploadIcon.style.display = 'none';
                    backgroundImageUploadInput.style.display = 'none';
                    backgroundImageDeleteButton.style.display = 'none';
                    document.getElementById('background-color').value = rgbToHex(selectedElement.style.backgroundColor || '#000000');
                    document.getElementById('font-color').value = rgbToHex(selectedElement.style.color || '#FFFFFF');

                    borderheader.style.display = 'flex';
                    borderStyleLabel.style.display = 'flex';
                    borderStyleSelect.style.display = 'flex';
                    borderStyleSelect.value = selectedElement.style.borderStyle || 'none';
                    borderColorLabel.style.display = 'flex';
                    borderColorInput.style.display = 'flex';
                    borderColorInput.value = rgbToHex(selectedElement.style.borderColor || '#000000');
                    borderRadiusLabel.style.display = 'flex';
                    borderRadiusInput.style.display = 'flex';
                    borderRadiusInput.value = parseFloat(selectedElement.style.borderRadius) || 0;
                    borderWidthLabel.style.display = 'flex';
                    borderWidthInput.style.display = 'flex';
                    borderWidthInput.value = parseFloat(selectedElement.style.borderWidth) || 0;

                    textShadowHeader.style.display = 'flex';
                    textShadowMenu.style.display = 'flex';
                    textShadowSplitter.style.display = 'flex';
                    document.getElementById('text-shadow-color').value = rgbToHex(selectedElement.style.textShadowColor || '#000000');
                    document.getElementById('text-shadow-offset-x').value = parseFloat(selectedElement.style.textShadowOffsetX) || 0;
                    document.getElementById('text-shadow-offset-y').value = parseFloat(selectedElement.style.textShadowOffsetY) || 0;
                    document.getElementById('text-shadow-blur').value = parseFloat(selectedElement.style.textShadowBlur) || 0;
                } else if (selectedElement.id === 'Shape-Square') {
                    // Shape
                    premadeheader.style.display = 'none';
                    premadelabel.style.display = 'none';
                    buttonStyles.style.display = 'none';
                    previewButton.style.display = 'none';
                    premadeSplitter.style.display = 'none';

                    fontheader.style.display = 'none';
                    fontsplitter.style.display = 'none';
                    fontlabel.style.display = 'none';
                    fontColorInput.style.display = 'none';
                    textStyleSelect.style.display = 'none';
                    fontSizeLabel.style.display = 'none';
                    fontSizeInput.style.display = 'none';

                    backgroundheader.style.display = 'flex';
                    backgroundsplitter.style.display = 'flex';
                    backgroundColorLabel.style.display = 'flex';
                    backgroundColorInput.style.display = 'flex';
                    backgroundImageUrlLabel.style.display = 'none';
                    backgroundImageUploadIcon.style.display = 'none';
                    backgroundImageUploadInput.style.display = 'none';
                    backgroundImageDeleteButton.style.display = 'none';
                    document.getElementById('background-color').value = rgbToHex(selectedElement.style.backgroundColor || '#010101');

                    borderheader.style.display = 'flex';
                    borderStyleLabel.style.display = 'flex';
                    borderStyleSelect.style.display = 'flex';
                    borderStyleSelect.value = selectedElement.style.borderStyle || 'none';
                    borderColorLabel.style.display = 'flex';
                    borderColorInput.style.display = 'flex';
                    borderColorInput.value = rgbToHex(selectedElement.style.borderColor || '#000000');
                    borderRadiusLabel.style.display = 'flex';
                    borderRadiusInput.style.display = 'flex';
                    borderRadiusInput.value = parseFloat(selectedElement.style.borderRadius) || 0;
                    borderWidthLabel.style.display = 'flex';
                    borderWidthInput.style.display = 'flex';
                    borderWidthInput.value = parseFloat(selectedElement.style.borderWidth) || 0;

                    textShadowHeader.style.display = 'none';
                    textShadowMenu.style.display = 'none';
                    textShadowSplitter.style.display = 'none';
                } else {
                    builderForm.style.display = 'none';
                    fontSizeLabel.style.display = 'none';
                    fontSizeInput.style.display = 'none';
                    borderRadiusLabel.style.display = 'none';
                    borderRadiusInput.style.display = 'none';

                    textShadowHeader.style.display = 'none';
                    textShadowMenu.style.display = 'none';
                    textShadowSplitter.style.display = 'none';
                }
            } else {
                builderForm.style.display = 'none';
                fontSizeLabel.style.display = 'none';
                fontSizeInput.style.display = 'none';
                borderRadiusLabel.style.display = 'none';
                borderRadiusInput.style.display = 'none';

                textShadowHeader.style.display = 'none';
                textShadowMenu.style.display = 'none';
                textShadowSplitter.style.display = 'none';
            }
        }

        function rgbToHex(rgb) {
            if (!rgb) return '#000000';
            const rgbValues = rgb.match(/\d+/g);
            if (!rgbValues) return rgb;
            return `#${((1 << 24) + (parseInt(rgbValues[0]) << 16) + (parseInt(rgbValues[1]) << 8) + parseInt(rgbValues[2])).toString(16).slice(1).toUpperCase()}`;
        }

        function updateElementStyle() {
            if (selectedElement) {
                const fontColor = document.getElementById('font-color').value;
                const backgroundColor = document.getElementById('background-color').value;
                const textStyle = document.getElementById('website-text-style').value;
                const fontSize = Math.round(document.getElementById('font-size').value / 1.7) + 'px';
                const borderStyle = document.getElementById('border-style').value;
                const borderColor = document.getElementById('border-color').value;
                const borderRadius = document.getElementById('border-radius').value + 'px';
                const borderWidth = document.getElementById('border-width').value + 'px';

                const textShadowColor = document.getElementById('text-shadow-color').value;
                const textShadowOffsetX = document.getElementById('text-shadow-offset-x').value + 'px';
                const textShadowOffsetY = document.getElementById('text-shadow-offset-y').value + 'px';
                const textShadowBlur = document.getElementById('text-shadow-blur').value + 'px';

                selectedElement.style.textShadow = `${textShadowOffsetX} ${textShadowOffsetY} ${textShadowBlur} ${textShadowColor}`;

                if (selectedElement === document.getElementById('website-preview')) {
                    selectedElement.style.backgroundColor = backgroundColor;
                } else if (selectedElement.tagName === 'IMG') {
                    selectedElement.src = document.getElementById('website-image-url').value;
                } else {
                    selectedElement.style.color = fontColor;
                    selectedElement.style.backgroundColor = backgroundColor === '#000000' ? 'transparent' : backgroundColor;
                    selectedElement.style.fontWeight = textStyle;
                    selectedElement.style.fontStyle = textStyle;
                    selectedElement.style.fontSize = fontSize;
                    selectedElement.style.borderStyle = borderStyle;
                    selectedElement.style.borderColor = borderColor;
                    selectedElement.style.borderRadius = borderRadius;
                    selectedElement.style.borderWidth = borderWidth;
                }
            }
        }

        function deleteElement() {
            if (selectedElements.length > 0) {
                selectedElements.forEach(element => element.remove());
                selectedElements = [];
                selectedElement = null;
                showProperties(); // Hide properties when no element is selected
            }
        }

        function showChangeImageUrlModal() {
            document.getElementById('changeImageUrlModal').style.display = 'block';
        }

        function closeChangeImageUrlModal() {
            document.getElementById('changeImageUrlModal').style.display = 'none';
        }

        function changeImage() {
            const fileInput = document.getElementById('new-image-file');
            const file = fileInput.files[0];
            if (file && file.size > 2 * 1024 * 1024) {
                alert("Warning! The image is too large. The recommended maximum size is 2MB.");
                return;
            }
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    console.log('Image preview URL:', e.target.result);
                    if (selectedElement && selectedElement.tagName === 'IMG') {
                        selectedElement.src = e.target.result;
                    } else {
                        const imgElement = selectedElement.querySelector('img');
                        if (imgElement) {
                            imgElement.src = e.target.result;
                        }
                    }
                    const img = new Image();
                    img.onload = function () {
                        if (img.width > 1920 || img.height > 1080) {
                            alert("Warning! The image dimensions exceed 1920x1080 pixels.");
                            return;
                        }
                        if (selectedElement.tagName === 'IMG') {
                            selectedElement.src = e.target.result; // Directly update if selectedElement is img
                        } else {
                            const imgElement = selectedElement.querySelector('img');
                            if (imgElement) {
                                imgElement.src = e.target.result; // Update child img if exists
                            } else {
                                alert("No image element found in the selected element.");
                            }
                        }
                        closeChangeImageUrlModal();
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        function closeButtonModel() {
            document.getElementById('buttonModel').style.display = 'none';
        }

        function handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('URL').value = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        function showButtonModel() {
            document.getElementById('buttonModel').style.display = 'block';
        }

        function applyLink() {
            const url = document.getElementById('URL').value;
            const button = document.createElement('a');
            button.href = url;
            button.className = 'draggable resizable';
            button.id = 'hyperlink-button';
            button.style.position = 'absolute';
            button.style.left = '10px';
            button.style.top = '10px';
            button.style.width = 'auto';
            button.style.height = '22px';
            button.style.padding = '10px 20px';
            button.style.backgroundColor = '#010101';
            button.style.color = '#fff';
            button.style.fontSize = '16px';
            button.contentEditable = 'true';
            button.style.borderRadius = '4px';
            button.style.textAlign = 'center';
            button.style.display = 'inline-block';
            button.style.textDecoration = 'none';
            button.innerText = 'Button';

            const resizeHandle = document.createElement('div');
            resizeHandle.className = 'resize-handle bottom-right';

            button.appendChild(resizeHandle);
            document.getElementById('website-preview').appendChild(button);
            makeElementsDraggable();
            makeElementsResizable();
            closeButtonModel();
        }

        function selectFile(fileName) {
            const fileUrl = `/${fileName}`; // Set the URL to /pagename.html
            document.getElementById('URL').value = fileUrl;
        }

        function addShape() {
            const preview = document.getElementById('website-preview');
            const shape = document.createElement('div');
            shape.className = 'draggable resizable';
            shape.id = 'Shape-Square';
            shape.style.position = 'absolute';
            shape.style.left = '10px';
            shape.style.top = '10px';
            shape.style.width = '100px';
            shape.style.height = '100px';
            shape.style.backgroundColor = '#010101';
            shape.style.borderRadius = '4px';

            const resizeHandle = document.createElement('div');
            resizeHandle.className = 'resize-handle bottom-right';

            shape.appendChild(resizeHandle);
            preview.appendChild(shape);
            makeElementsDraggable();
            makeElementsResizable();
        }

        function showAddFileModal() {
            document.getElementById('addFileModal').style.display = 'block';
        }

        function closeAddFileModal() {
            document.getElementById('addFileModal').style.display = 'none';
        }

        function showAddFolderModal() {
            document.getElementById('addFolderModal').style.display = 'block';
        }

        function closeAddFolderModal() {
            document.getElementById('addFolderModal').style.display = 'none';
        }

        function showAddFileFolderModal() {
            document.getElementById('addFileFolderModal').style.display = 'block';
        }

        function closeAddFileFolderModal() {
            document.getElementById('addFileFolderModal').style.display = 'none';
        }

        function toggleAddType() {
            const addType = document.getElementById('add-type').value;
            if (addType === 'file') {
                document.getElementById('add-file-section').style.display = 'block';
                document.getElementById('add-folder-section').style.display = 'none';
            } else {
                document.getElementById('add-file-section').style.display = 'none';
                document.getElementById('add-folder-section').style.display = 'block';
            }
        }

        function addFolder() {
            const folderName = document.getElementById('new-folder-name').value;
            if (folderName) {
                const fileList = document.querySelectorAll('#file-list');
                fileList.forEach(list => {
                    const newFolder = document.createElement('li');
                    newFolder.innerHTML = `<span class="folder-arrow down">&or;</span><img src="icons/Folder.webp" alt="Folder Icon" style="width: 16px; height: 16px; margin-right: 5px;">${folderName}`;
                    newFolder.setAttribute('onclick', `toggleFolder('${folderName}')`);
                    const folderContent = document.createElement('ul');
                    folderContent.id = folderName;
                    folderContent.className = 'folder-content';
                    newFolder.appendChild(folderContent);
                    list.appendChild(newFolder);
                });
                closeAddFileFolderModal();
            }
        }

        document.addEventListener('DOMContentLoaded', () => {

            const websitePreview = document.getElementById('website-preview');
            const contextMenu = document.getElementById('context-menu');

            websitePreview.addEventListener('contextmenu', function (e) {
                contextMenu.style.display = 'block';
                contextMenu.style.color = 'black';
                contextMenu.style.left = (e.pageX - 10) + "px";
                contextMenu.style.top = (e.pageY - 10) + "px";

                const changeImageUrlOption = document.getElementById('change-image-url');
                if (e.target.tagName === 'IMG') {
                    changeImageUrlOption.style.display = 'block';
                } else {
                    changeImageUrlOption.style.display = 'none';
                }

                e.preventDefault();
            }, false);

            websitePreview.addEventListener('click', function (event) {
                contextMenu.style.display = 'none';
                contextMenu.style.left = '';
                contextMenu.style.top = '';
                if (event.target !== websitePreview) {
                    selectedElement = event.target;
                } else {
                    selectedElement = websitePreview;
                }
                showProperties();
            });

            document.getElementById('context-menu').addEventListener('click', function (event) {
                const action = event.target.innerText;
                if (action === 'Delete') {
                    deleteElement();
                } else if (action === 'Add Text Box') {
                    addTextBox();
                }
                contextMenu.style.display = 'none';
                contextMenu.style.left = '';
                contextMenu.style.top = '';
            });

            showProperties(); // Initial call to hide properties
            const buttonModelButton = document.querySelector('.sidebar button[onclick="showButtonModel()"]');
            const addShapeButton = document.querySelector('.sidebar button[onclick="addShape()"]');

            if (buttonModelButton) {
                buttonModelButton.setAttribute('onclick', 'showButtonModel()');
            }

            if (addShapeButton) {
                addShapeButton.setAttribute('onclick', 'addShape()');
            }

            makeElementsDraggable();
        });

        function SaveHTML() {
            const previewContent = document.getElementById('website-preview').innerHTML;
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = previewContent;

            const snapLines = tempDiv.querySelectorAll('.snap-line');
            snapLines.forEach(line => line.remove());

            const apiBoxes = tempDiv.querySelectorAll('.api-box');
            apiBoxes.forEach(box => {
                if (box.id === 'google-map') {
                    const apiKey = prompt("Enter your Google Maps API key:");
                    const mapDiv = document.createElement('div');
                    mapDiv.style.width = box.style.width;
                    mapDiv.style.height = box.style.height;
                    mapDiv.id = 'google-map';
                    mapDiv.style.position = 'absolute';
                    mapDiv.style.left = box.style.left;
                    mapDiv.style.top = box.style.top;
                    mapDiv.innerHTML = `
                <div id="google-map" style="width: 100%; height: 100%;"></div>
                <script src="https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=initMap" async defer>
                <script>
                    function initMap() {
                        new google.maps.Map(document.getElementById('google-map'), {
                            center: { lat: -34.397, lng: 150.644 },
                            zoom: 8
                        });
                    }
                `;
                    box.replaceWith(mapDiv);
                } else if (box.id === 'google-ads') {
                    const adDiv = document.createElement('div');
                    adDiv.style.width = box.style.width;
                    adDiv.style.height = box.style.height;
                    adDiv.className = 'adsbygoogle';
                    adDiv.style.display = 'block';
                    adDiv.setAttribute('data-ad-client', 'ca-pub-XXXXXXXXXXXXXXXX');
                    adDiv.setAttribute('data-ad-slot', 'XXXXXXXXXX');
                    adDiv.style.position = 'absolute';
                    adDiv.style.left = box.style.left;
                    adDiv.style.top = box.style.top;
                    adDiv.innerHTML = `
                    <script src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" async>`;
                    box.replaceWith(adDiv);
                } else if (box.id === 'google-recaptcha') {
                    const siteKey = box.getAttribute('data-sitekey');
                    const recaptchaDiv = document.createElement('div');
                    recaptchaDiv.style.width = box.style.width;
                    recaptchaDiv.style.height = box.style.height;
                    recaptchaDiv.className = 'g-recaptcha';
                    recaptchaDiv.setAttribute('data-sitekey', siteKey);
                    recaptchaDiv.style.position = 'absolute';
                    recaptchaDiv.style.left = box.style.left;
                    recaptchaDiv.style.top = box.style.top;
                    recaptchaDiv.innerHTML = `
                    <script src="https://www.google.com/recaptcha/api.js" async defer>`;
                    box.replaceWith(recaptchaDiv);
                }
            });

            const cleanedContent = tempDiv.innerHTML;

            const upscaleContainer = document.createElement('div');
            upscaleContainer.style.width = '100%';
            upscaleContainer.style.height = 'auto';
            upscaleContainer.style.overflowX = 'hidden';
            upscaleContainer.innerHTML = cleanedContent;

            const elements = upscaleContainer.querySelectorAll('*');
            elements.forEach(el => {
                if (!el.classList.contains('content-container')) {
                    const left = parseFloat(el.style.left) || 0;
                    const top = parseFloat(el.style.top) || 0;
                    const fontSize = Math.round(parseFloat(el.style.fontSize) * 1.7) || 0;
                    const fontStyle = document.getElementById('topbar-font-style').value;
                    const width = parseFloat(el.style.width) || 'auto';
                    const height = parseFloat(el.style.height) || 'auto';
                    const radius = parseFloat(el.style.borderRadius) || 0;
                    el.style.fontSize = `${fontSize}px`;
                    el.style.fontFamily = fontStyle;
                    el.style.left = `${left * 1.7}px`;
                    el.style.top = `${top * 1.7}px`;
                    el.style.width = width !== 'auto' ? `${parseFloat(width) * 1.7}px` : 'auto';
                    el.style.height = height !== 'auto' ? `${parseFloat(height) * 1.7}px` : 'auto';
                    el.style.borderRadius = `${radius * 1.7}px`;
                    el.contentEditable = 'false';
                }
            });

            const fullHTML = `
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="${document.getElementById('topbar-website-description').value}">
        <title>${document.title}</title>
        <style>
            @import url("https://fonts.googleapis.com/css?family=Poppins");
            @import url("https://fonts.googleapis.com/css?family=Arial");
            @import url("https://fonts.googleapis.com/css?family=Times+New+Roman");
            @import url("https://fonts.googleapis.com/css?family=Roboto");
            @import url("https://fonts.googleapis.com/css?family=Open+Sans");
            @import url("https://fonts.googleapis.com/css?family=Lato");
            @import url("https://fonts.googleapis.com/css?family=Montserrat");
            @import url("https://fonts.googleapis.com/css?family=Oswald");
            @import url("https://fonts.googleapis.com/css?family=Raleway");
            @import url("https://fonts.googleapis.com/css?family=Ubuntu");
            @import url("https://fonts.googleapis.com/css?family=Nunito");
            @import url("https://fonts.googleapis.com/css?family=Playfair+Display");
            @import url("https://fonts.googleapis.com/css?family=Merriweather");

            body {
                margin: 0;
                padding: 0;
                overflow-x: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                width: 100vw;
                text-decoration: none;
                font-family: ${document.getElementById('topbar-font-style').value};
            }

            .content-container {
                width: 100%;
                height: 100%;
                overflow: hidden;
            }
        </style>
    </head>

    <body>
        <div class="content-container" style='background-color: ${document.getElementById('website-preview').style.backgroundColor}; background-image: ${document.getElementById('website-preview').style.backgroundImage};'>
            ${upscaleContainer.innerHTML}
        </div>
    </body>

    </html>`;

            const blob = new Blob([fullHTML], { type: 'text/html' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'index.html';
            link.click();
        }

        function ImportHTML() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = '.html';
            input.onchange = function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const content = e.target.result;
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = content;
                        const preview = document.getElementById('website-preview');

                        // Temporarily remove snap lines
                        const horizontalSnapLine = document.getElementById('horizontal-snap-line');
                        const verticalSnapLine = document.getElementById('vertical-snap-line');
                        preview.removeChild(horizontalSnapLine);
                        preview.removeChild(verticalSnapLine);

                        // Clear existing content
                        preview.innerHTML = '';

                        // Move elements from upscale-container to website-preview
                        const upscaleContainer = tempDiv.querySelector('.upscale-container');
                        if (upscaleContainer) {
                            while (upscaleContainer.firstChild) {
                                const child = upscaleContainer.firstChild;
                                if (child.nodeType === Node.ELEMENT_NODE) {
                                    child.classList.add('draggable', 'resizable');
                                    if (child.tagName === 'DIV') {
                                        child.classList.add('editable');
                                        child.contentEditable = 'true';
                                    }
                                    downscaleElement(child);
                                }
                                preview.appendChild(child);
                            }
                            upscaleContainer.remove();
                        } else {
                            while (tempDiv.firstChild) {
                                const child = tempDiv.firstChild;
                                if (child.nodeType === Node.ELEMENT_NODE) {
                                    child.classList.add('draggable', 'resizable');
                                    if (child.tagName === 'DIV') {
                                        child.classList.add('editable');
                                        child.contentEditable = 'true';
                                    }
                                    downscaleElement(child);
                                }
                                preview.appendChild(child);
                            }
                        }

                        // Re-add snap lines
                        preview.appendChild(horizontalSnapLine);
                        preview.appendChild(verticalSnapLine);

                        makeElementsDraggable();
                        makeElementsResizable();
                    };
                    reader.readAsText(file);
                }
            };
            input.click();
        }

        function downscaleElement(element) {
            const left = parseFloat(element.style.left) || 0;
            const top = parseFloat(element.style.top) || 0;
            const fontSize = Math.round(parseFloat(element.style.fontSize) / 1.7) || 0;
            const width = parseFloat(element.style.width) || 'auto';
            const height = parseFloat(element.style.height) || 'auto';
            const radius = parseFloat(element.style.borderRadius) || 0;

            element.style.left = `${left / 1.7}px`;
            element.style.top = `${top / 1.7}px`;
            element.style.fontSize = `${fontSize}px`;
            element.style.width = width !== 'auto' ? `${parseFloat(width) / 1.7}px` : 'auto';
            element.style.height = height !== 'auto' ? `${parseFloat(height) / 1.7}px` : 'auto';
            element.style.borderRadius = `${radius / 1.7}px`;
        }

        function makeElementsDraggable() {
            const draggables = document.querySelectorAll('.draggable');
            const preview = document.getElementById('website-preview');
            const horizontalSnapLine = document.getElementById('horizontal-snap-line');
            const verticalSnapLine = document.getElementById('vertical-snap-line');

            draggables.forEach(el => {
                if (el.tagName === 'IMG') {
                    el.setAttribute('draggable', 'false');
                    el.ondragstart = function (event) {
                        event.preventDefault();
                    };
                    el.onmousedown = function (event) {
                        event.preventDefault();
                    };
                    return;
                }

                el.onmousedown = function (event) {
                    if (event.ctrlKey || event.metaKey) {
                        if (selectedElements.includes(el)) {
                            selectedElements = selectedElements.filter(e => e !== el);
                            el.classList.remove('selected');
                        } else {
                            selectedElements.push(el);
                            el.classList.add('selected');
                        }
                    } else {
                        selectedElements.forEach(e => e.classList.remove('selected'));
                        selectedElements = [el];
                        el.classList.add('selected');
                    }

                    if (selectedElements.length > 0) {
                        let shiftX = event.clientX;
                        let shiftY = event.clientY;

                        document.body.classList.add('no-select'); // Disable text selection

                        function moveAt(pageX, pageY) {
                            const deltaX = pageX - shiftX;
                            const deltaY = pageY - shiftY;

                            selectedElements.forEach(element => {
                                let newLeft = element.offsetLeft + deltaX;
                                let newTop = element.offsetTop + deltaY;

                                // Constrain within the preview area horizontally
                                newLeft = Math.max(0, Math.min(newLeft, preview.offsetWidth - element.offsetWidth));

                                // Allow dragging beyond the initial height of the preview
                                if (newTop + element.offsetHeight > preview.scrollHeight) {
                                    preview.style.height = newTop + element.offsetHeight + 'px';
                                }

                                // Snapping logic
                                const snapTolerance = 1.5; // Adjust snap tolerance as needed
                                const centerX = preview.offsetWidth / 2;
                                const centerY = preview.scrollHeight / 2;
                                const elCenterX = newLeft + element.offsetWidth / 2;
                                const elCenterY = newTop + element.offsetHeight / 2;

                                if (Math.abs(elCenterX - centerX) < snapTolerance) {
                                    newLeft = centerX - element.offsetWidth / 2;
                                    verticalSnapLine.style.left = `${centerX}px`; verticalSnapLine.style.display = 'block';
                                } else {
                                    verticalSnapLine.style.display = 'none';
                                } if (Math.abs(elCenterY - centerY) < snapTolerance) {
                                    newTop = centerY -
                                        element.offsetHeight / 2; horizontalSnapLine.style.top = `${centerY}px`; horizontalSnapLine.style.display = 'block'
                                        ;
                                } else { horizontalSnapLine.style.display = 'none'; } element.style.left = newLeft + 'px';
                                element.style.top = newTop + 'px';
                            }); shiftX = pageX; shiftY = pageY;

                            const rect = preview.getBoundingClientRect();
                            if (
                                pageX < rect.left ||
                                pageX > rect.right ||
                                pageY < rect.top ||
                                pageY > rect.bottom
                            ) {
                                stopDrag();
                            }
                        } function onMouseMove(event) {
                            moveAt(event.pageX, event.pageY);
                        }

                        function stopDrag() {
                            document.removeEventListener('mousemove', onMouseMove);
                            document.removeEventListener('mouseup', stopDrag);
                            horizontalSnapLine.style.display = 'none';
                            verticalSnapLine.style.display = 'none';
                            document.body.classList.remove('no-select');
                        }

                        document.addEventListener('mousemove', onMouseMove);
                        document.addEventListener('mouseup', stopDrag);

                    };
                };
            });
        }

        function updateBackgroundImage(imageUrl) {
            document.getElementById('website-preview').style.backgroundImage = `url(${imageUrl})`;
        }

        function previewBackgroundImage(event) {
            const backgroundImageDeleteButton = document.getElementById('delete-background-image');
            const file = event.target.files[0];
            if (file && file.size > 2 * 1024 * 1024) {
                alert("Warning! The image is too large. The recommended maximum size is 2MB.");
                return;
            }
            if (file) {
                const reader = new FileReader();
                reader.onload = function () {
                    const img = new Image();
                    img.onload = function () {
                        if (img.width > 1920 || img.height > 1080) {
                            alert("Warning! The background image dimensions exceed 1920x1080 pixels.");
                            return;
                        }
                        updateBackgroundImage(reader.result);
                    };
                    img.src = reader.result;
                    backgroundImageDeleteButton.style.color = 'red';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        }

        function addFile() {
            const fileName = prompt("Enter the new file name:");
            if (fileName) {
                const fileList = document.querySelectorAll('#file-list');
                fileList.forEach(list => {
                    const newFile = document.createElement('li');
                    newFile.innerHTML = `<img src="icons/HTML5.webp" alt="HTML5 Icon"
            style="width: 16px; height: 16px; margin-right: 5px;">${fileName}.html`;
                    newFile.setAttribute('onclick', `selectFile('${fileName}')`);
                    list.appendChild(newFile);
                });
            } else {
                const folderName = prompt("Enter the new folder name:");
                if (folderName) {
                    const fileList = document.querySelectorAll('#file-list');
                    fileList.forEach(list => {
                        const newFolder = document.createElement('li');
                        newFolder.innerHTML = `<span class="folder-arrow down">&or;</span>`;
                        newFolder.innerHTML = `<img src="icons/Folder.webp" alt="Folder Icon"
            style="width: 16px; height: 16px; margin-right: 5px;">${folderName}`;
                        newFolder.setAttribute('onclick', `toggleFolder('${folderName}')`);
                        const folderContent = document.createElement('ul');
                        folderContent.id = folderName;
                        folderContent.className = 'folder-content';
                        newFolder.appendChild(folderContent);
                        list.appendChild(newFolder);
                    });
                }
            }
        }

        function toggleFolder(folderId) {
            const folder = document.getElementById(folderId);
            const arrow = document.querySelector(`[data-folder="${folderId}"] .folder-arrow`);
            if (folder.classList.contains('open')) {
                folder.classList.remove('open');
                arrow.classList.remove('open');
                arrow.innerHTML = '&or;';
            } else {
                folder.classList.add('open');
                arrow.classList.add('open');
                arrow.innerHTML = '&and;';
            }
        }

        function callAPI() {
            document.getElementById('apiModal').style.display = 'block';
        }

        function closeApiModal() {
            document.getElementById('apiModal').style.display = 'none';
        }

        function addGoogleMaps() {
            const mapDiv = document.createElement('div');
            mapDiv.className = 'api-box draggable resizable';
            mapDiv.id = 'google-map';
            mapDiv.innerText = 'Google Maps API';
            mapDiv.style.width = '200px';
            mapDiv.style.height = '100px';
            mapDiv.style.position = 'absolute';
            mapDiv.style.left = '10px';
            mapDiv.style.top = '10px';
            mapDiv.style.backgroundColor = '#f0f0f0';
            mapDiv.style.border = '1px solid #ccc';
            mapDiv.style.display = 'flex';
            mapDiv.style.justifyContent = 'center';
            mapDiv.style.alignItems = 'center';

            const resizeHandle = document.createElement('div');
            resizeHandle.className = 'resize-handle bottom-right';
            mapDiv.appendChild(resizeHandle);

            document.getElementById('website-preview').appendChild(mapDiv);

            makeElementsDraggable();
            makeElementsResizable();
            closeApiModal();
        }

        function addGoogleAds() {
            const adDiv = document.createElement('div');
            adDiv.className = 'api-box draggable resizable';
            adDiv.id = 'google-ads';
            adDiv.innerText = 'Google Ads API';
            adDiv.style.width = '200px';
            adDiv.style.height = '100px';
            adDiv.style.position = 'absolute';
            adDiv.style.left = '10px';
            adDiv.style.top = '10px';
            adDiv.style.backgroundColor = '#f0f0f0';
            adDiv.style.border = '1px solid #ccc';
            adDiv.style.display = 'flex';
            adDiv.style.justifyContent = 'center';
            adDiv.style.alignItems = 'center';

            const resizeHandle = document.createElement('div');
            resizeHandle.className = 'resize-handle bottom-right';
            adDiv.appendChild(resizeHandle);

            document.getElementById('website-preview').appendChild(adDiv);

            makeElementsDraggable();
            makeElementsResizable();
            closeApiModal();
        }

        function addGoogleRecaptcha() {
            const recaptchaDiv = document.createElement('div');
            const site_key = prompt("Enter your Google Recaptcha site key:");
            if (!site_key) {
                alert("Site key is required.");
                return;
            }
            recaptchaDiv.className = 'api-box draggable resizable';
            recaptchaDiv.id = 'google-recaptcha';
            recaptchaDiv.innerText = 'Google Recaptcha API';
            recaptchaDiv.setAttribute('data-sitekey', site_key);
            recaptchaDiv.style.width = '200px';
            recaptchaDiv.style.height = '100px';
            recaptchaDiv.style.position = 'absolute';
            recaptchaDiv.style.left = '10px';
            recaptchaDiv.style.top = '10px';
            recaptchaDiv.style.backgroundColor = '#f0f0f0';
            recaptchaDiv.style.border = '1px solid #ccc';
            recaptchaDiv.style.display = 'flex';
            recaptchaDiv.style.justifyContent = 'center';
            recaptchaDiv.style.alignItems = 'center';

            const resizeHandle = document.createElement('div');
            resizeHandle.className = 'resize-handle bottom-right';
            recaptchaDiv.appendChild(resizeHandle);

            document.getElementById('website-preview').appendChild(recaptchaDiv);

            makeElementsDraggable();
            makeElementsResizable();
            closeApiModal();
        }

        window.addEventListener('load', function () {
            document.getElementById('loading-screen').style.display = 'none';
        });

        const style = document.createElement('style');
        style.type = 'text/css';
        style.innerHTML = `
            img {
                -webkit-user-drag: none;
                user-drag: none;
                -khtml-user-drag: none;
                -moz-user-drag: none;
                -o-user-drag: none;
            }
        `;
        document.head.appendChild(style);

        document.addEventListener('dragstart', function (e) {
            if (e.target.tagName.toLowerCase() === 'img') {
                e.preventDefault();
            }
        }, false);

        function ResetBackground() {
            document.getElementById('website-preview').style.backgroundImage = 'none';
            const deleteButton = document.getElementById('delete-background-image');
            if (deleteButton) {
                deleteButton.style.color = '#d4d4d4';
            }
        }

        document.getElementById('drop-zone').addEventListener('click', function () {
            document.getElementById('image-upload-modal').click();
        });

        document.getElementById('drop-zone').addEventListener('dragover', function (event) {
            event.preventDefault();
            event.stopPropagation();
            this.style.borderColor = '#007acc';
        });

        document.getElementById('drop-zone').addEventListener('dragleave', function (event) {
            event.preventDefault();
            event.stopPropagation();
            this.style.borderColor = '#444';
        });

        document.getElementById('drop-zone').addEventListener('drop', function (event) {
            event.preventDefault();
            event.stopPropagation();
            this.style.borderColor = '#444';
            const files = event.dataTransfer.files;
            if (files.length > 0) {
                document.getElementById('image-upload-modal').files = files;
                handleImageUpload({ target: { files: files } });
            }
        });

        document.querySelector('button[onclick="showImageUploadModal()"]').addEventListener('contextmenu', function (e) {
            e.preventDefault();
            const contextMenu = document.getElementById('context-menu-insert');
            contextMenu.style.display = 'block';
            contextMenu.style.left = `${e.pageX}px`;
            contextMenu.style.top = `${e.pageY}px`;
        });

        document.addEventListener('click', function () {
            document.getElementById('context-menu-insert').style.display = 'none';
        });

        function updateButtonPreview() {
            const previewButton = document.getElementById('preview-button');
            const selectedStyle = document.getElementById('premade-button-styles').value;

            if (selectedStyle === 'default') {
                selectedElement.style.background = '#333';
                previewButton.style.background = '#333';
                selectedElement.style.color = '#fff';
                previewButton.style.color = '#fff';
                previewButton.style.border = '1px solid #fff';
                selectedElement.style.border = '1px solid #fff';
                previewButton.style.borderRadius = '8px';
                selectedElement.style.borderRadius = '8px';
                previewButton.style.boxShadow = 'inset 0 0 4px 2px black';
                selectedElement.style.boxShadow = 'inset 0 0 4px 2px black';
            } else if (selectedStyle === 'light') {
                previewButton.style.background = '#fff';
                selectedElement.style.background = '#fff';
                previewButton.style.color = '#000';
                selectedElement.style.color = '#000';
                previewButton.style.border = '1px solid #000';
                selectedElement.style.border = '1px solid #000';
                previewButton.style.borderRadius = '8px';
                selectedElement.style.borderRadius = '8px';
                previewButton.style.boxShadow = 'inset 0 0 4px 2px black';
                selectedElement.style.boxShadow = 'inset 0 0 4px 2px black';
            } else if (selectedStyle === 'dark') {
                previewButton.style.background = '#000';
                selectedElement.style.background = '#000';
                previewButton.style.color = '#fff';
                selectedElement.style.color = '#fff';
                previewButton.style.border = '1px solid #fff';
                selectedElement.style.border = '1px solid #fff';
                previewButton.style.borderRadius = '8px';
                selectedElement.style.borderRadius = '8px';
                previewButton.style.boxShadow = 'inset 0 0 4px 2px black';
                selectedElement.style.boxShadow = 'inset 0 0 4px 2px black';
            } else if (selectedStyle === 'gradient') {
                previewButton.style.background = 'linear-gradient(to right, #ff7e5f, #feb47b)';
                selectedElement.style.background = 'linear-gradient(to right, #ff7e5f, #feb47b)';
                previewButton.style.color = '#fff';
                selectedElement.style.color = '#fff';
                previewButton.style.border = 'none';
                selectedElement.style.border = 'none';
                previewButton.style.borderRadius = '8px';
                selectedElement.style.borderRadius = '8px';
                previewButton.style.boxShadow = 'inset 0 0 4px 2px black';
                selectedElement.style.boxShadow = 'inset 0 0 4px 2px black';
            } else if (selectedStyle === 'outline') {
                previewButton.style.background = 'transparent';
                selectedElement.style.background = 'transparent';
                previewButton.style.color = '#007acc';
                selectedElement.style.color = '#007acc';
                previewButton.style.border = '2px solid #007acc';
                selectedElement.style.border = '2px solid #007acc';
                previewButton.style.borderRadius = '8px';
                selectedElement.style.borderRadius = '8px';
                previewButton.style.boxShadow = 'none';
                selectedElement.style.boxShadow = 'none';
            } else if (selectedStyle === 'rounded') {
                previewButton.style.background = '#4caf50';
                selectedElement.style.background = '#4caf50';
                previewButton.style.color = '#fff';
                selectedElement.style.color = '#fff';
                previewButton.style.border = 'none';
                selectedElement.style.border = 'none';
                previewButton.style.borderRadius = '20px';
                selectedElement.style.borderRadius = '20px';
                previewButton.style.boxShadow = 'inset 0 0 4px 2px black';
                selectedElement.style.boxShadow = 'inset 0 0 4px 2px black';
            }
            showProperties();
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateButtonPreview(); // Initial call to set the preview
        });

        function toggleSection(sectionId) {
            const section = document.getElementById(sectionId);
            const header = section.previousElementSibling.previousElementSibling;
            if (!header.classList.contains('collapsible')) {
                header.classList.add('collapsible');
            }
            section.classList.toggle('show');
            header.classList.toggle('show');
            // Ensure properties are shown correctly after toggling
            showProperties();
        }
    </script>
</body>
</html>