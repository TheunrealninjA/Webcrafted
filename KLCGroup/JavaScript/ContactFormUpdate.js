document.addEventListener("DOMContentLoaded", function () {
    var otherOption = document.getElementById("OtherOptions");
    var MoreInfo = document.getElementById("moreInfoDropdown");
    otherOption.style.display = "none";
    MoreInfo.style.display = "none";
});

function showOther() {
    var subjectDropdown = document.getElementById("subject");
    var otherOption = document.getElementById("OtherOptions");
    var MoreInfo = document.getElementById("moreInfoDropdown");
    var selectedOption = subjectDropdown.options[subjectDropdown.selectedIndex].value;
    MoreInfo.style.display = "none";
    
    if (selectedOption === "Rendering" || selectedOption === "External Wall Insulation" || selectedOption === "Loft Insulation") {
        MoreInfo.style.display = "block";
    }
    if (selectedOption === "Other") {
        otherOption.style.display = "block";
        document.getElementById("otherSubject").setAttribute("required", "required");
    } else {
        otherOption.style.display = "none";
        document.getElementById("otherSubject").removeAttribute("required");
    }
}
