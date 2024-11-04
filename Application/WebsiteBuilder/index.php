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
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            width: 30px;
            background: #202020;
            padding: 20px;
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
            width: 130%;
            border: none;
            padding: 6px 0 2px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            box-shadow: none;
            background: #242424;
            transition: background 0.3s;
        }

        .sidebar button:hover {
            background: #0056b3;
        }

        .right-sidebar {
            width: 300px;
            background: #202020;
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
            width: 97%;
            background: #202020;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px 0 10px 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .file-explorer h3 {
            margin: 0 0 10px 0;
            font-size: 18px;
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
        }

        .file-explorer li:hover {
            background: #e0e0e0;
        }

        .topbar {
            width: 77%;
            background: #202020;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 70.4px;
            /* Adjust based on left sidebar width */
            z-index: 1000;
        }

        .topbar input,
        .topbar select {
            padding: 5px;
            margin: 0 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .main-content {
            margin-left: 120px;
            /* Adjust based on left sidebar width */
            margin-right: 320px;
            /* Adjust based on right sidebar width */
            margin-top: 60px;
            /* Adjust based on topbar height */
            width: calc(100% - 540px);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .builder-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .builder-form input,
        .builder-form textarea,
        .builder-form select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .builder-form input:focus,
        .builder-form textarea:focus,
        .builder-form select:focus {
            border-color: #007BFF;
            outline: none;
        }

        .builder-form input[type="color"] {
            width: 50px;
            height: 50px;
            padding: 6px;
        }

        .website-preview {
            margin-top: 100px;
            width: 88%;
            max-width: 1200px;
            aspect-ratio: 16 / 9;
            /* Set a normal aspect ratio */
            border: 1px solid #ccc;
            padding: 20px;
            position: relative;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .website-preview img {
            max-width: 100%;
        }

        .draggable {
            position: absolute;
            cursor: move;
            user-select: none;
            /* Disable text selection */
            color: black;
            /* Default font color */
        }

        .editable {
            border: 1px dashed #ccc;
            padding: 5px;
            transition: border-color 0.3s;
            color: black;
            /* Default font color */
        }

        .editable:focus {
            border-color: #007BFF;
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
            background: #252525;
            border: 1px solid #ccc;
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
        }

        .context-menu li:hover {
            background: #191919;
        }
    </style>
</head>

<body oncontextmenu="return false;">
    <div class="sidebar">
        <button onclick="" style="background: none !important; margin: -18px 0 0;"><img src="icons/MenuIcon.webp" alt="Menu"></button>
        <button onclick="addTextBox()"><img src="icons/textboxicon.webp" alt="Text Box"></button>
        <button onclick=""><img src="icons/addimageicon.webp" alt=""></button>
        <!-- Add more buttons for other elements as needed -->
    </div>
    <div class="topbar">
        <input type="text" id="topbar-website-title" placeholder="Website Title" oninput="updateTopbarPreview()">
        <input type="text" id="topbar-website-description" placeholder="Website Description" oninput="updateTopbarPreview()">
        <select id="topbar-font-style" onchange="updateTopbarPreview()" style="font-family: Arial;">
            <option value="Arial" style="font-family: Arial;">Arial</option>
            <option value="Poppins" style="font-family: Poppins;">Poppins</option>
            <option value="Times New Roman" style="font-family: 'Times New Roman';">Times New Roman</option>
            <option value="Roboto" style="font-family: Roboto;">Roboto</option>
            <option value="Open Sans" style="font-family: 'Open Sans';">Open Sans</option>
            <option value="Lato" style="font-family: Lato;">Lato</option>
            <option value="Montserrat" style="font-family: Montserrat;">Montserrat</option>
            <option value="Oswald" style="font-family: Oswald;">Oswald</option>
            <!-- Add more fonts as needed -->
        </select>
    </div>
    <div class="main-content" id="main-content">
        <div class="website-preview" id="website-preview">
            <!-- Generated website will appear here -->
            <div class="snap-line horizontal" id="horizontal-snap-line" style="display: none;"></div>
            <div class="snap-line vertical" id="vertical-snap-line" style="display: none;"></div>
        </div>
    </div>
    <div class="right-sidebar">
        <div class="file-explorer">
            <h3>File Explorer</h3>
            <ul>
                <li>index.html</li>
                <li>style.css</li>
                <li>script.js</li>
                <!-- Add more files as needed -->
            </ul>
        </div>
        <div class="builder-form">
            <input type="text" id="website-title" placeholder="Website Title" oninput="updatePreview()">
            <input type="text" id="website-image-url" placeholder="Image URL" oninput="updatePreview()">
            <select id="website-text-style" onchange="updatePreview()">
                <option value="normal">Normal</option>
                <option value="bold">Bold</option>
                <option value="italic">Italic</option>
            </select>
            <label for="font-color">Font Color:</label>
            <input type="color" id="font-color" onchange="updateElementStyle()">
            <label for="background-color">Background Color:</label>
            <input type="color" id="background-color" onchange="updateElementStyle()">
        </div>
    </div>
    <div class="context-menu" id="context-menu">
        <ul>
            <li onclick="addTextBox()">Add Text Box</li>
            <!-- Add more context menu items as needed -->
        </ul>
    </div>
    <script>
        let selectedElement = null;

        function updatePreview() {
            const title = document.getElementById('website-title').value || 'Website Title';
            const imageUrl = document.getElementById('website-image-url').value;
            const textStyle = document.getElementById('website-text-style').value;
            const preview = document.getElementById('website-preview');
            const content = "Sample content"; // Define the content variable

            preview.innerHTML = `
                <h2 class="draggable editable" contenteditable="true" style="font-style: ${textStyle};">${title}</h2>
                <p class="draggable editable" contenteditable="true" style="font-style: ${textStyle};">${content}</p>
                ${imageUrl ? `<img class="draggable" src="${imageUrl}" alt="Website Image">` : ''}
                <div class="snap-line horizontal" id="horizontal-snap-line" style="display: none;"></div>
                <div class="snap-line vertical" id="vertical-snap-line" style="display: none;"></div>
            `;
            makeElementsDraggable();
            applyFontStyle();
        }

        function updateTopbarPreview() {
            const title = document.getElementById('topbar-website-title').value;
            const description = document.getElementById('topbar-website-description').value;
            const fontStyle = document.getElementById('topbar-font-style').value;
            document.body.style.fontFamily = fontStyle;
            document.title = title;
            document.getElementById('topbar-font-style').style.fontFamily = fontStyle;
            applyFontStyle();
            // Update other elements as needed
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
            textBox.contentEditable = 'true';
            textBox.style.position = 'absolute';
            textBox.style.left = '10px';
            textBox.style.top = '10px';
            textBox.style.fontFamily = document.getElementById('topbar-font-style').value;
            textBox.style.fontStyle = document.getElementById('website-text-style').value;
            textBox.style.color = 'black'; // Set default font color to black
            textBox.innerText = 'New Text Box';
            preview.appendChild(textBox);
            makeElementsDraggable();
        }

        function makeElementsDraggable() {
            const draggables = document.querySelectorAll('.draggable');
            const preview = document.getElementById('website-preview');
            const previewRect = preview.getBoundingClientRect();
            const horizontalSnapLine = document.getElementById('horizontal-snap-line');
            const verticalSnapLine = document.getElementById('vertical-snap-line');

            draggables.forEach(el => {
                el.onmousedown = function(event) {
                    selectedElement = el; // Set the selected element
                    let shiftX = event.clientX - el.getBoundingClientRect().left;
                    let shiftY = event.clientY - el.getBoundingClientRect().top;

                    el.style.position = 'absolute';
                    el.style.zIndex = 1000;
                    preview.append(el);

                    document.body.classList.add('no-select'); // Disable text selection

                    function moveAt(pageX, pageY) {
                        let newLeft = pageX - shiftX - previewRect.left;
                        let newTop = pageY - shiftY - previewRect.top;

                        // Constrain within the preview area
                        newLeft = Math.max(0, Math.min(newLeft, preview.offsetWidth - el.offsetWidth));
                        newTop = Math.max(0, Math.min(newTop, preview.offsetHeight - el.offsetHeight));

                        // Snapping logic
                        const snapTolerance = 3; // Decrease snap tolerance to make snapping less aggressive
                        const centerX = preview.offsetWidth / 2;
                        const centerY = preview.offsetHeight / 2;
                        const elCenterX = newLeft + el.offsetWidth / 2;
                        const elCenterY = newTop + el.offsetHeight / 2;

                        if (Math.abs(elCenterX - centerX) < snapTolerance) {
                            newLeft = centerX - el.offsetWidth / 2;
                            verticalSnapLine.style.left = `${centerX}px`;
                            verticalSnapLine.style.display = 'block';
                        } else {
                            verticalSnapLine.style.display = 'none';
                        }

                        if (Math.abs(elCenterY - centerY) < snapTolerance) {
                            newTop = centerY - el.offsetHeight / 2;
                            horizontalSnapLine.style.top = `${centerY}px`;
                            horizontalSnapLine.style.display = 'block';
                        } else {
                            horizontalSnapLine.style.display = 'none';
                        }

                        el.style.left = newLeft + 'px';
                        el.style.top = newTop + 'px';
                    }

                    function onMouseMove(event) {
                        moveAt(event.pageX, event.pageY);
                    }

                    document.addEventListener('mousemove', onMouseMove);

                    el.onmouseup = function() {
                        document.removeEventListener('mousemove', onMouseMove);
                        el.onmouseup = null;
                        horizontalSnapLine.style.display = 'none';
                        verticalSnapLine.style.display = 'none';
                        document.body.classList.remove('no-select'); // Re-enable text selection
                    };

                    el.onmouseleave = function() {
                        document.removeEventListener('mousemove', onMouseMove);
                        el.onmouseup = null;
                        horizontalSnapLine.style.display = 'none';
                        verticalSnapLine.style.display = 'none';
                        document.body.classList.remove('no-select'); // Re-enable text selection
                    };
                };

                el.ondragstart = function() {
                    return false;
                };
            });
        }

        function updateElementStyle() {
            if (selectedElement) {
                const fontColor = document.getElementById('font-color').value;
                const backgroundColor = document.getElementById('background-color').value;
                selectedElement.style.color = fontColor;
                selectedElement.style.backgroundColor = backgroundColor;
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            updatePreview();

            const websitePreview = document.getElementById('website-preview');
            const contextMenu = document.getElementById('context-menu');

            websitePreview.addEventListener('contextmenu', function(e) {
                contextMenu.style.display = 'block';
                contextMenu.style.color = 'black';
                contextMenu.style.left = (e.pageX - 10) + "px";
                contextMenu.style.top = (e.pageY - 10) + "px";
                e.preventDefault();
            }, false);

            websitePreview.addEventListener('click', function(event){
                contextMenu.style.display = 'none';
                contextMenu.style.left = '';
                contextMenu.style.top = '';
            });
        });
    </script>
</body>

</html>