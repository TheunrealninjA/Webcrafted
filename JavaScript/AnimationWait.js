document.addEventListener("DOMContentLoaded", function () {
    let observedElements = [
        "#wait1",
        "#wait2",
        "#wait3",
        "#wait4",
        "#wait5",
        "#wait6",
        "#wait7",
        "#wait8",
        "#wait9",
        "#bar1",
        "#bar2",
        "#price1",
        "#price2",
        "#price3"
    ];

    window.addEventListener("load", (event) => {
        createObserver();
    }, false);

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

    function handleIntersect(entries, observer) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                if (entry.target.id === 'bar1') {
                    entry.target.classList.add('ToDefaultBar1');
                } else if (entry.target.id === 'bar2') {
                    entry.target.classList.add('ToDefaultBar2');
                } else {
                    entry.target.classList.add('ToDefault');
                }
            } else {
                entry.target.classList.remove('ToDefaultBar1');
                entry.target.classList.remove('ToDefaultBar2');
                entry.target.classList.remove('ToDefault');
            }
        });
    }
});