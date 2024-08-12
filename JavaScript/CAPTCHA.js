document.addEventListener("DOMContentLoaded", function() {
    function checkAnswer() {
        var answer = document.getElementById("answer").value;
        var submitButton = document.getElementById("submit");
        
        // Enable the button if the answer is exactly "10"
        if (answer === "10") {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    // Attach the checkAnswer function to the input's keyup event
    document.getElementById("answer").addEventListener("keyup", checkAnswer);
});