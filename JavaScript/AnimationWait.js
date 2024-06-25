document.addEventListener("DOMContentLoaded", function () {

    // Varibles
    let TextMove;
    let TextMove2;
    let TextMove3;
    let TextMove4;
    let SectionMove;
    let SectionMove2;
    let SectionMove3;
    let prevRatio = {
        TextMove: 0.0,
        TextMove2: 0.0,
        TextMove3: 0.0,
        TextMove4: 0.0,
        SectionMove: 0.0,
        SectionMove2: 0.0,
        SectionMove3: 0.0,
    };

    // Set up the Observers
    window.addEventListener(
        "load",
        (event) => {
            TextMove = document.querySelector("#counter");
            TextMove2 = document.querySelector("#Beestext");
            TextMove3 = document.querySelector("#HelpedText");
            TextMove4  = document.querySelector("#RightDown4")
            SectionMove = document.querySelector("#RightDown");
            SectionMove2 = document.querySelector("#RightDown2");
            SectionMove3 = document.querySelector("#RightDown3");

            createObserver();
        },
        false,
    );

    // Create the Observer
    function createObserver() {
        let options = {
            root: document.querySelector("#scrollArea"),
            rootMargin: "0px",
            threshold: .45,
        };

        let slideIn = new IntersectionObserver(handleIntersect, options);
        slideIn.observe(TextMove);
        slideIn.observe(TextMove2);
        slideIn.observe(TextMove3);
        slideIn.observe(TextMove4);
        slideIn.observe(SectionMove);
        slideIn.observe(SectionMove2);
        slideIn.observe(SectionMove3);
    }

    // Add The Differant Cases So Multiple Animations Can Play
    function handleIntersect(entries, observer) {
        entries.forEach((entry) => {
            switch (entry.target.id) {
                case "Anim1":
                    slideInRightPlay(entry, 'TextMove');
                    break;
                case "Anim2":
                    slideInRightPlay(entry, 'TextMove2');
                    break;
                case "Anim3":
                    slideInRightPlay(entry, 'TextMove3')
                    break;
                case "Anim4":
                    slideInRightPlay(entry, 'SectionMove')
                    break;
                case "Anim5":
                    slideInRightPlay(entry, 'SectionMove2')
                    break;
                case "Anim6":
                    slideInRightPlay(entry, 'SectionMove3')
                    break;
                case "Anim7":
                    slideInRightPlay(entry, 'TextMove4')
                    break;
            }
        });
    }

    // Function for Right Animation
    function slideInRightPlay(entry, elementName) {
        if (entry.intersectionRatio > prevRatio[elementName]) {
            entry.target.classList.add('ToDefault');
        } else {
            entry.target.classList.remove('ToDefault');
        }

        prevRatio[elementName] = entry.intersectionRatio;
    }
});
