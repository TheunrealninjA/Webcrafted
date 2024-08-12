<?php
require 'vendor/autoload.php';

// Include Google Cloud dependencies using Composer
use Google\Cloud\RecaptchaEnterprise\V1\RecaptchaEnterpriseServiceClient;
use Google\Cloud\RecaptchaEnterprise\V1\Event;
use Google\Cloud\RecaptchaEnterprise\V1\Assessment;

// Define the function to create an assessment
function create_assessment(string $recaptchaKey, string $token, string $project, string $action) {
    $client = new RecaptchaEnterpriseServiceClient();
    $projectName = $client->projectName($project);

    $event = (new Event())->setSiteKey($recaptchaKey)->setToken($token);
    $assessment = (new Assessment())->setEvent($event);

    try {
        $response = $client->createAssessment($projectName, $assessment);

        // Check if the token is valid
        if ($response->getTokenProperties()->getValid() == false) {
            return 'invalid';
        }

        // Check if the expected action was executed
        if ($response->getTokenProperties()->getAction() == $action) {
            // Return the risk score
            return $response->getRiskAnalysis()->getScore();
        } else {
            return 'action_mismatch';
        }
    } catch (Exception $e) {
        return 'error';
    }
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptchaToken = $_POST['g-recaptcha-response'];
    $recaptchaKey = '6LcKgCQqAAAAAIhPaywsjSayGud7KppI9X67OAhZ';
    $projectID = 'webcraftedpro-1723346277978';
    $action = 'submit';

    $result = create_assessment($recaptchaKey, $recaptchaToken, $projectID, $action);

    if ($result === 'invalid') {
        header("Location: SignUp.php?page=signup&status=robot");
        exit();
    } elseif ($result === 'action_mismatch') {
        header("Location: SignUp.php?page=signup&status=error");
        exit();
    } elseif ($result === 'error') {
        header("Location: SignUp.php?page=signup&status=error");
        exit();
    } else {
        // Assuming a low score means a bot or spam, you can define a threshold.
        $riskThreshold = 0.5; // You can adjust this value based on your tolerance for risk
        if ($result < $riskThreshold) {
            header("Location: SignUp.php?page=signup&status=robot");
            exit();
        }

        // Continue processing the form data (e.g., save to database)
        // Example:
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);

        // Database connection
        $servername = "server330";
        $dbUsername = "webcsosl_Admin";
        $dbPassword = "S*@zUCE.E[X*";
        $dbname = "webcsosl_Login-info";

        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            header("Location: Status.php?page=signup&status=success");
        } else {
            header("Location: Status.php?page=signup&status=error");
        }

        $stmt->close();
        $conn->close();
    }
}
?>
