document.addEventListener("DOMContentLoaded", function () {
    // Variables
    let observedElements = [
        "#wait1",
        "#wait2",
        "#wait3",
        "#wait4",
        "#wait5",
        "#wait6"
    ];

    // Set up the Observers
    window.addEventListener("load", (event) => {
        createObserver();
    }, false);

    // Create the Observer
    function createObserver() {
        let options = {
            root: document.querySelector("#scrollArea"),
            rootMargin: "0px",
            threshold: 0.45,
        };

        let observer = new IntersectionObserver(handleIntersect, options);
        
        observedElements.forEach((selector) => {
            let element = document.querySelector(selector);
            if (element) {
                observer.observe(element);
            }
        });
    }

    // Handle Intersection
    function handleIntersect(entries, observer) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('ToDefault');
            } else {
                entry.target.classList.remove('ToDefault');
            }
        });
    }
});