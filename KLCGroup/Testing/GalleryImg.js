document.addEventListener("DOMContentLoaded", function () {

    function createImageGallery(folderPath, numImages, containerId) {
        if (document.getElementById(containerId)) {
            const container = document.getElementById(containerId);
            for (let i = 1; i <= numImages; i++) {
                let img = document.createElement('img');
                img.src = `${folderPath}${i}.webp`;
                container.appendChild(img);
            }
        }
    }

    createImageGallery("Images/Gallery/EWI/", 17, 'EWIimages');
    createImageGallery("Images/Gallery/LoftInsulation/", 20, 'LIimages');
    createImageGallery("Images/Gallery/Rendering/", 29, 'Rimages');

});